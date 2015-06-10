<script type="text/javascript">
$(function() {
	$("#theTable tr:even").addClass("stripe1");
	$("#theTable tr:odd").addClass("stripe2");
	$("#theTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<?php
include '../../inc/inc.koneksi.php';

$limit = 10;
$sqlc = "show columns from barang  ";
$rsdc = mysql_query($sqlc);
$cols = mysql_num_rows($rsdc);
$page = $_GET['page']; // ? $_REQUEST['page'] : 0; //$_GET['hal'] ? $_GET['hal'] : 0;

$kode1	= $_GET['kode1'];
$kode2	= $_GET['kode2'];
$satuan	= $_GET['satuan'];
$nama	= $_GET['nama'];
$urut	= $_GET['urut'];

$pilih	= $_GET['pilih'];

if($pilih=='kode'){
	$where	= " WHERE kode_barang BETWEEN '$kode1' AND '$kode2'";
}elseif($pilih=='satuan'){
	$where	= " WHERE satuan='$satuan'";
}elseif($pilih=='namabarang'){
	$where	= " WHERE nama_barang LIKE '%$nama%'";
}else{
	$where	= "";
}

$start = ($page-1)*$limit;

$sql = "select kode_barang, nama_barang,harga_jual,harga_beli,stok_awal,
		(select sum((stok_awal+gudang)*harga_beli) from barang where kode_barang) as tstok,
		(select sum(harga_beli) from barang where kode_barang) as tbeli
		from barang 
		$where
		order by $urut limit $start,$limit";
		
$query = mysql_query($sql) or die(mysql_error());

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
<!--		<th>Satuan</th>			-->
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Stok Awal</th>
		</tr>";
	
	
	//echo $sql;
	
	$no=1+$start;
	while($rows=mysql_fetch_array($query)){
		$total = $rows[jmlbeli]*$rows[hargabeli];
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[kode_barang]</td>
				<td>$rows[nama_barang]</td>
		<!--	<td align='center'>$rows[satuan]</td>		-->
				<td align='right'>".number_format($rows[harga_beli])."</td>
				<td align='right'>".number_format($rows[harga_jual])."</td>
				<td align='center'>$rows[stok_awal]</td>
			</tr>";
	$no++;
	$thpp =$rows[tstok];
	}
	echo "<tr>
		<td colspan='5' align='center'><b>Total HPP Barang</b></td>
		<td align='right'><b>".number_format($thpp)."</b></td>
	</tr>";
echo "</table>";

?>


