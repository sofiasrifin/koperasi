<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';

$tgl1	= jin_date_sql($_GET['tgl1']);
$tgl2	= jin_date_sql($_GET['tgl2']);
$field	= $_GET['field'];
$text	= $_GET['text'];
$urut	= $_GET['urut'];
$pilih	= $_GET['pilih'];
$tgl = date('d-M-Y');

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

require_once ("fpdf.php");
$pdf = new FPDF('L','mm','A4');
$pdf->Open();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);
$pdf->text(10,30,'SISTEM INFROMASI KOPERASI MAHASISWA UNESA');
$pdf->text(10,36,'LAPORAN PENJUALAN');

//setting judul
$yi = 50;
$ya = 44;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->CELL(6,6,'NO',1,0,'C',1);
$pdf->CELL(25,6,'#JUAL',1,0,'C',1);
$pdf->CELL(25,6,'TANGGAL',1,0,'C',1);
$pdf->CELL(30,6,'KODE BARANG',1,0,'C',1);
$pdf->CELL(80,6,'NAMA BARANG',1,0,'C',1);
//$pdf->CELL(20,6,'SATUAN',1,0,'C',1);
$pdf->CELL(20,6,'JUMLAH',1,0,'C',1);
$pdf->CELL(30,6,'HARGA',1,0,'C',1);
$pdf->CELL(30,6,'TOTAL',1,0,'C',1);
$ya = $yi + $row;
$sql = mysql_query("SELECT h_jual.kodejual,tgljual, d_jual.kode_barang,nama_barang,jmljual,hargajual,(jmljual*hargajual) as total
		from h_jual
		join d_jual
		join barang
		on h_jual.kodejual=d_jual.kodejual AND d_jual.kode_barang=barang.kode_barang
		$where") or die(mysql_error());

//setting isi data
$i = 1;
$no = 1;
$max = 31;
$row = 6;
while($data = mysql_fetch_array($sql)){
	$pdf->setXY(10,$ya);
	$pdf->setFont('arial','',9);
	$pdf->setFillColor(255,255,255);
	$pdf->cell(6,6,$no,1,0,'C',1);
	$pdf->cell(25,6,$data[kodejual],1,0,'C',1);
	$pdf->cell(25,6,jin_date_str($data[tgljual]),1,0,'C',1);
	$pdf->CELL(30,6,$data[kode_barang],1,0,'C',1);
	$pdf->CELL(80,6,$data[nama_barang],1,0,'L',1);
	//$pdf->CELL(20,6,$data[satuan],1,0,'C',1);
	$pdf->CELL(20,6,$data[jmljual],1,0,'C',1);
	$pdf->CELL(30,6,number_format($data[hargajual]),1,0,'R',1);
	$pdf->CELL(30,6,number_format($data[total]),1,0,'R',1);
	$ya = $ya+$row;
	$no++;
	$i++;
	//$dm[kode] = $data[kdprog];
}
$pdf->text(200,$ya+6,"SURABAYA , ".$tgl);
$pdf->text(200,$ya+18,"KETUA KOPMA UNESA");
$pdf->output();
?>