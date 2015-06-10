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
<style type="text/css">
.stripe1 {
	background-color:#EEE;
}
.stripe2 {
	background-color:#CFCFCF;
}
.highlight{
	background-color:#FFC;
}
</style>
<?php
include '../../inc/inc.koneksi.php';


$hal	= $_GET['hal'];// ? $_GET['page'] : 0;
$lim	= 13;
$sqlc = "show columns from barang  ";
$rsdc = mysql_query($sqlc);
$cols = mysql_num_rows($rsdc);


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

$start	= ($hal-1)*$lim;
/*
$cari	= str_replace("'","\'",$_GET['cari']);
$field	= $_GET['field'];

if(empty($cari)){
	$where = '';
}else{
	$where = "WHERE $field LIKE '%$cari%' ORDER BY $field";
}
*/
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
	$query = "select kode_barang, nama_barang,harga_jual,harga_beli,stok_awal,
		(select sum((stok_awal+gudang)*harga_beli) from barang where kode_barang) as tstok,
		(select sum(harga_beli) from barang where kode_barang) as tbeli
		from barang $where  LIMIT $start,$lim ";
	$data = mysql_query($query) or die(mysql_error());
	
	//echo $query;
	
	$row	= mysql_num_rows($data);
	$no=1+$start; 
	while($rows=mysql_fetch_array($data)){
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
//echo "<input type='hidden' id='jml'>";
?>
