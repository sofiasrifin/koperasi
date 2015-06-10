<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';

$limit = 10;
$sqlc = "show columns from barang  ";
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
	$where	= " WHERE tglbeli BETWEEN '$tgl1' AND '$tgl2'";
}elseif($pilih=='costum'){
	if($field=='kodebeli'){
		$where	= " WHERE h_beli.kodebeli LIKE '%$text%'";
	}elseif($field=='tglbeli'){
		$where	= " WHERE $field='".jin_date_sql($text)."'";
	}else{
		$where	= " WHERE $field LIKE '%$text%'";
	}
}else{
	$where	= "";
}

$start = ($page-1)*$limit;

$sql = "SELECT h_beli.kodebeli ,tglbeli,kode_supplier, d_beli.kode_barang,nama_barang,satuan,jmlbeli,hargabeli,(jmlbeli*hargabeli) as total
		from h_beli
		join d_beli
		join barang
		on h_beli.kodebeli=d_beli.kodebeli AND d_beli.kode_barang=barang.kode_barang
		$where
		order by $urut ";
		
$query = mysql_query($sql);

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=lap-beli.xls");

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>No.Pembelian</th>
			<th>Tanggal</th>
			<th>Kode Supplier</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Satuan</th>
			<th>Jumlah </th>
			<th>Harga Beli</th>
			<th>Total</th>
		</tr>";
	
	
	//echo $where.'<br>'.$sql;
	
	$no=1;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[kodebeli]</td>
				<td align='center'>".jin_date_str($rows[tglbeli])."</td>
				<td align='center'>$rows[kode_supplier]</td>
				<td align='center'>$rows[kode_barang]</td>
				<td>$rows[nama_barang]</td>
				<td align='center'>$rows[satuan]</td>
				<td align='center'>".number_format($rows[jmlbeli])."</td>
				<td align='right'>".number_format($rows[hargabeli])."</td>
				<td align='right'>".number_format($rows[total])."</td>
			</tr>";
	$no++;
	$gtot = $gtot+$rows[total];
	}
echo "<tr>
		<td colspan='9' align='center'><b>Total</b></td>
		<td align='right'><b>".number_format($gtot)."</b></td>
	</tr>
	</table>";
exit();	
?>