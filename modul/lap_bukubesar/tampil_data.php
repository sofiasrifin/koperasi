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
$sqlc = "show columns from d_jurnal  ";
$rsdc = mysql_query($sqlc) or die(mysql_error());
$cols = mysql_num_rows($rsdc);

$page = $_GET['page']; // ? $_REQUEST['page'] : 0; //$_GET['hal'] ? $_GET['hal'] : 0;

$tgl1	= jin_date_sql($_GET['tgl1']);
$tgl2	= jin_date_sql($_GET['tgl2']);
$kode_akun	= $_GET['kode_akun'];
$text	= $_GET['text'];
// $kode1	= $_GET['kode1'];

$urut	= $_GET['urut'];

$pilih	= $_GET['pilih'];
/*
if($pilih=='tgl'){
	$where	= " WHERE tgl BETWEEN '$tgl1' AND '$tgl2'";
}
elseif($pilih=='kodeakun'){
	$where = "WHERE a.kode_akun LIKE '$text%'";
}elseif($pilih=='costum'){
	if($field=='kode_akun'){
		$where	= " WHERE a.kode_akun LIKE '%$text%'";
	}elseif($field=='no_jurnal'){
		$where	= " WHERE a.no_jurnal LIKE '%$text%'";
	}
else{
	$where	= "";
}
*/
// if($pilih=='kode'){
// 	$where	= " WHERE kode_akun='$kode1' ";
// }else{
// 	$where	= "";
// }

$start = ($page-1)*$limit;

$sql = "SELECT c.tgl, c.uraian, b.nama_akun, debet, kredit
		FROM d_jurnal AS a
		JOIN jurnal AS c 
		JOIN akun as b
		ON a.no_jurnal = c.no_jurnal and a.kode_akun=b.kode_akun
		WHERE a.kode_akun = '$kode_akun' ";
		
$query = mysql_query($sql) ;//or die(mysql_error());

$sql	= "SELECT  sum(debet) as tdebet, sum(kredit) as tkredit
				FROM d_jurnal AS a
				JOIN jurnal AS c 
				JOIN akun as b
				ON a.no_jurnal = c.no_jurnal and a.kode_akun=b.kode_akun
				WHERE a.kode_akun = '$kode_akun' ";
	$data	= mysql_fetch_array(mysql_query($sql));

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Tanggal</th>
			<th>Transaksi</th>
			<th>Nama Akun</th>		
			<th>Debet</th>
			<th>Kredit</th>
		</tr>";
	
	
	//echo $where.'<br>'.$sql;

	$no=1+$start;
	if($query == FALSE){
		die(mysql_error());
	}
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>".jin_date_str($rows['tgl'])."</td>
				<td align='center'>$rows[uraian]</td>
				<td>$rows[nama_akun]</td>	
				<td align='center'>".number_format($rows['debet'])."</td>
				<td align='right'>".number_format($rows['kredit'])."</td>
			</tr>";
	$no++;
	//$tdebet = $tdebet+$rows[debet];
	//$tkredit = $tkredit+$rows[kredit];
	}
echo "<tr>
		<td colspan='4' align='center'><b>Total</b></td>
		<td align='right'><b>".number_format($data['tdebet'])."</b></td>
		<td align='right'><b>".number_format($data['tkredit'])."</b></td>
	</tr>
	</table>";
?>