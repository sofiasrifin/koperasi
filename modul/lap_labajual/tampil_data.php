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
include '../../inc/fungsi_tanggal.php';

$limit = 10;
$sqlc = "show columns from h_jual  ";
$rsdc = mysql_query($sqlc);
$cols = mysql_num_rows($rsdc);
$page = $_GET['page']; // ? $_REQUEST['page'] : 0; //$_GET['hal'] ? $_GET['hal'] : 0;

$tgl1	= jin_date_sql($_GET['tgl1']);
$tgl2	= jin_date_sql($_GET['tgl2']);
$field	= $_GET['field'];
$text	= $_GET['text'];

$urut	= $_GET['urut'];

$pilih	= $_GET['pilih'];

if($pilih=='tgl'){
	$where	= " WHERE tgljual BETWEEN '$tgl1' AND '$tgl2'";
}elseif($pilih=='costum'){
	if($field=='kodejual'){
		$where	= " WHERE h_jual.kodejual LIKE '%$text%'";
	}elseif($field=='tglbeli'){
		$where	= " WHERE $field='".jin_date_sql($text)."'";
	}elseif($field=='kode_barang'){
		$where	= " WHERE d_jual.kode_barang LIKE '%$text%'";
	}else{
		$where	= " WHERE $field LIKE '%$text%'";
	}
}else{
	$where	= "";
}

$start = ($page-1)*$limit;

$sql = "SELECT h_jual.kodejual,tgljual, d_jual.kode_barang,nama_barang,jmljual,hargajual, (jmljual*hargajual) as totaljual, (jmljual*harga_beli) as totalbeli,
		(SELECT sum(jmljual*hargajual) FROM d_jual WHERE kode_barang) as sumtotaljual,
		(SELECT sum(jmljual*harga_beli) FROM d_jual JOIN barang ON d_jual.kode_barang=barang.kode_barang) as sumtotalbeli
		from h_jual
		join d_jual
		join barang
		on h_jual.kodejual=d_jual.kodejual AND d_jual.kode_barang=barang.kode_barang
		$where
		order by $urut limit $start,$limit";
		
$query = mysql_query($sql) or die(mysql_error());

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>No.Penjualan</th>
			<th>Tanggal</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
	<!--	<th>Satuan</th>		-->
			<th>Jumlah </th>
			<th>Total Harga Jual</th>
			<th>Total Harga Beli</th>
			<th>Laba</th>
		</tr>";
	
	
	//echo $where.'<br>'.$sql;
	
	$no=1+$start;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[kodejual]</td>
				<td align='center'>".jin_date_str($rows[tgljual])."</td>
				<td align='center'>$rows[kode_barang]</td>
				<td>$rows[nama_barang]</td>
		<!--	<td align='center'>$rows[satuan]</td>	-->
				<td align='center'>".number_format($rows[jmljual])."</td>
				<td align='right'>".number_format($rows[totaljual])."</td>
				<td align='right'>".number_format($rows[totalbeli])."</td>
				<td align='right'>".number_format(($rows[totaljual])-($rows[totalbeli]))."</td>
			</tr>";
	$no++;
	$gtot = $gtot+($rows[totaljual])-($rows[totalbeli]);
	$sumtotal = ($rows[sumtotaljual])-($rows[sumtotalbeli]);
	}
echo "<tr>
		<td colspan='7' align='right'><b>Total Laba</b></td>
		<td colspan='7' align='center'><b>".number_format($sumtotal)."</b>
<!--	<td align='right'><b>".number_format($gtot)."</b></td>  -->
	</tr>
	</table>";
?>