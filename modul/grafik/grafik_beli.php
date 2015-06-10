<html>
<head>
<title>Grafik Kelompok</title>
<!--
<script type="text/javascript" src="../../js/jquery-1.7.2.min.js"></script>
-->
<script type="text/javascript" src="../../js/jquery-1.4.js"></script>
<script type="text/javascript" src="../../js/jquery.fusioncharts.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#myHTMLTable').convertToFusionCharts({
		swfPath: "../Charts/",
		type: "MSColumn3D",width:"550",height:"400",
		data: "#myHTMLTable",
		dataFormat: "HTMLTable"
	});
});
</script>
<style>
#myHTMLTable {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:10px;
	-moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow:0px 0px 3px #aaa;
    -webkit-box-shadow:0px 0px 3px #aaa;
    box-shadow:0px 0px 3px #aaa;
}
</style>
</head>
<body>
<center>
<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$tgl1 	= jin_date_sql($_GET[tgl1]); //'2012/08/30'; //jin_date_str($_GET[tgl]);
//$tgl2	= jin_date_sql($_GET[tgl2]);

//$where = "WHERE tgljual BETWEEN '$tgl1' AND '$tgl2'";
$where = "WHERE tglbeli ='$tgl1' ";

echo "<h3>Grafik Penjualan Tanggal $_GET[tgl1] </h3>";
echo "<table id=\"myHTMLTable\" border=\"0\" align=\"center\" width='300'";
echo "<tr bgcolor=\"#FF9900\"><th width=\"100\">Kode Barang</th> <th width=\"60\"><center>Jumlah</th></tr>";


$text = "select sum(jmlbeli) as jml, a.tglbeli,b.kode_barang
		from h_beli as a
		join d_beli as b
		on a.kodebeli=b.kodebeli 
		$where
		group by a.tglbeli,b.kode_barang";
$pmb = mysql_query($text);
//echo $text;
while ($row_pmb=mysql_fetch_array($pmb)) {
$jml = $row_pmb[jml];
/*
$query = "SELECT COUNT(*) as jml, kelompok
		from pmb
		where kelompok='$row_pmb[jenis]'";
$hasil = mysql_query($query);
$r_hasil = mysql_fetch_array($hasil);
$jml = $r_hasil[jml];
$data  = mysql_num_rows($hasil);
*/
echo "<tr bgcolor=\"#D5F35B\"> <td>$row_pmb[kode_barang]</td> <td align=\"center\">".number_format($jml)."</td></tr>";
}
//echo $text;
?>
	</table>
	</center>
</body>
</html>
