<style type="text/css">
*{
font-family: Arial;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
width:20.4cm ;
font-size: 9pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center;
padding-left:0.2cm;
border:1px solid #000;
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border-bottom:0.2mm solid #000;
border:1px solid #000;
}
h1{
font-size: 18pt;
}
h2{
font-size: 14pt;
}
.header{
display: block;
width:20.4cm ;
margin-bottom: 0.3cm;
text-align: center;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:20cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:20cm ;
}
.page {
width:20cm ;
}

</style>
<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
include "../../inc/fungsi_koperasi.php";


$kode1	= $_GET['kode1'];
$kode2	= $_GET['kode2'];
$pilih	= $_GET['pilih'];

$judul_H = "Laporan Saldo Simpanan Anggota <br>";

if($pilih=='pilih'){
	$where	= " WHERE no_anggota BETWEEN '$kode1' AND '$kode2'";
	$judul_H .= "Berdasarkan Nomor $kode1 s/d $kode2 <br>";
}else{
	$where	= "";
}


$query = "select * from anggota
		$where
		order by no_anggota";
//echo $query;

$data = mysql_query($query) or die(mysql_error());

function myheader($judul_H){
echo  "<div class='header'>
		  <h2>".$judul_H."</h2>
		  </div>
		<table class='grid' >
		<tr>
			<th width='5%'>No</th>
			<th >Nomor Anggota</th>
			<th >No Identitas</th>
			<th >Nama Anggota</th>
			<th >L/P</th>
			<th >HP</th>
			<th >Saldo</th>
		</tr>";		
}
	//echo $query;
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	while($r_data=mysql_fetch_array($data)){
		$tgllhr = jin_date_str($r_data[tgllahir]);
	$saldo = saldo($r_data[no_anggota]);
	//$total = $r_data[total];
	$stotal = $stotal+$saldo;
	if(($no%40) == 1){
   	if($no > 1){
        myfooter();
        echo "<div class=\"pagebreak\" align='right'>
		<div class='page' align='center'>Hal - $page</div>
		</div>";
		$page++;
  	}
   	myheader($judul_H);
	}
	echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$r_data[no_anggota]</td>
			<td align='center'>$r_data[reg]</td>
			<td align='left'>$r_data[nama]</td>
			<td align='center'>$r_data[jk]</td>
			<td align='left'>$r_data[telp]</td>
			<td align='right'>".number_format($saldo)."</td>
			</tr>";
	$no++;
	}

myfooter();	
		echo "</table>";
	echo "<div class='akhir' align='right'>
			Total <b>".number_format($stotal)."</b>
		</div>";
	echo "<div class='page' align='center'>Hal - ".$page."</div>";
	/*
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=laporan.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	*/
	//echo $content;
//}
?>