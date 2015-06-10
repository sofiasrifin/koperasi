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
h3{
font-size: 10pt;
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
font-size:13px;
}

</style>
<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$kode	= $_GET['kode'];

$where	= " WHERE a.kodejual ='$kode'";


$judul_H = "CETAK BUKTI PENJUALAN <br>";
$judul_H .= "NO. $kode<br>";
$q	= mysql_query("SELECT * FROM h_jual WHERE kodejual='$kode'");
$d 	= mysql_fetch_array($q);
$tgl 	= jin_date_str($d[tgljual]);



$query = "SELECT a.*,b.*,c.nama_barang 
		from h_jual as a
		join d_jual as b
		JOIN barang as c
		on a.kodejual=b.kodejual and b.kode_barang=c.kode_barang
		$where
		order by idjual";
$data 	= mysql_query($query);

function myheader($judul_H,$tgl){
echo  "<div class='header'>
		  <h2>".$judul_H."</h2>
		  </div>
		  <div class='theader'>
		  <h3> Tanggal : ".$tgl."</h3>
		  </div>
		<table class='grid' >
		<tr>
			<th width='5%'>No</th>
			<th >Kode Barang</th>
			<th >Nama Barang</th>
			<th >Jumlah</th>
<!--		<th >Satuan</th>	-->
			<th >Harga</th>
			<th >Total</th>
		</tr>";		
}
	//echo $query;
function myfooter(){	
	echo "</table>";
}
	$no=1;
	$page =1;
	while($r_data=mysql_fetch_array($data)){
	$total = $r_data[hargajual]*$r_data[jmljual];
	$gtotal = $gtotal+$total;
	if(($no%40) == 1){
   	if($no > 1){
        myfooter();
        echo "<div class=\"pagebreak\" align='right'>
		<div class='page' align='center'>Hal - $page</div>
		</div>";
		$page++;
  	}
   	myheader($judul_H,$tgl);
	}
	echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$r_data[kode_barang]</td>
			<td align='left'>$r_data[nama_barang]</td>
			<td align='left'>$r_data[jmljual]</td>
<!--		<td align='center'>$r_data[satuan]</td>		-->
			<td align='right'>".number_format($r_data[hargajual])."</td>
			<td align='center'>".number_format($total)."</td>
			<td align='center'></td>
			</tr>";
	$no++;
	}

myfooter();	
		echo "</table>";
	echo "<div class='akhir' align='right'>
			Total : <b>".number_format($gtotal)."</b>
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