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
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border-bottom:0.2mm solid #000;
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


$judul_H = "Laporan Barang <br>";



$query = "select * from barang 
		$where
		order by $urut";


$data = mysql_query($query);

function myheader($judul_H){
echo  "<div class='header'>
		  <h2>".$judul_H."</h2>
		  </div>
		<table class='grid' >
		<tr>
			<th width='5%'>No</th>
			<th >Kode Barang</th>
			<th >Nama Barang</th>
			<th >Satuan</th>
			<th >Harga Beli</th>
			<th >Harga Jual</th>
			<th >Stok Awal</th>
		</tr>";		
}
	//echo $query;
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	while($r_data=mysql_fetch_array($data)){
	//$total = $r_data[total];
	//$stotal = $stotal+$total;
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
			<td align='center'>$r_data[kode_barang]</td>
			<td align='left'>$r_data[nama_barang]</td>
			<td align='center'>$r_data[satuan]</td>
			<td align='right'>".number_format($r_data[harga_beli])."</td>
			<td align='right'>".number_format($r_data[harga_jual])."</td>
			<td align='center'>$r_data[stok_awal]</td>
			<td align='center'></td>
			</tr>";
	$no++;
	}

myfooter();	
		echo "</table>";
	//echo "<div class='akhir' align='right'>
	//		Total <b>".number_format($gtotal)."</b>
	//	</div>";
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