<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';

// $tgl1	= jin_date_sql($_GET['tgl1']);
// $tgl2	= jin_date_sql($_GET['tgl2']);
$kode_akun	= $_GET['kode_akun'];
$text	= $_GET['text'];
$urut	= $_GET['urut'];
$pilih	= $_GET['pilih'];
$tgl = date('d-M-Y');

// if($pilih=='tgl'){
// 	$where	= " WHERE tgljual BETWEEN '$tgl1' AND '$tgl2'";
// }else{
// 	$where	= "";
// }

require_once ("fpdf.php");
$pdf = new FPDF('L','mm','A4');
$pdf->Open();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);
$pdf->text(10,30,'SISTEM INFROMASI KOPERASI MAHASISWA UNESA');
$pdf->text(10,36,'LAPORAN BUKU BESAR');

//setting judul
$yi = 50;
$ya = 44;
$row = 6;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->CELL(6,6,'NO',1,0,'C',1);
// $pdf->CELL(25,6,'No Jurnal',1,0,'C',1);
$pdf->CELL(25,6,'Tanggal',1,0,'C',1);
$pdf->CELL(70,6,'Uraian',1,0,'C',1);
// $pdf->CELL(20,6,'Kode AKun',1,0,'C',1);
$pdf->CELL(70,6,'Nama Akun',1,0,'C',1);
//$pdf->CELL(20,6,'SATUAN',1,0,'C',1);
$pdf->CELL(25,6,'Debet',1,0,'C',1);
$pdf->CELL(25,6,'Kredit',1,0,'C',1);
$ya = $yi + $row;
$sql = mysql_query("SELECT c.tgl, c.uraian, b.nama_akun, debet, kredit
		FROM d_jurnal AS a
		JOIN jurnal AS c 
		JOIN akun as b
		ON a.no_jurnal = c.no_jurnal and a.kode_akun=b.kode_akun
		WHERE a.kode_akun = '$kode_akun' ") or die(mysql_error());

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
	// $pdf->cell(25,6,$data[no_jurnal],1,0,'C',1);
	$pdf->cell(25,6,jin_date_str($data['tgl']),1,0,'C',1);
	$pdf->CELL(70,6,$data['uraian'],1,0,'C',1);
	// $pdf->CELL(20,6,$data[kode_akun],1,0,'C',1);
	$pdf->CELL(70,6,$data['nama_akun'],1,0,'L',1);
	//$pdf->CELL(20,6,$data[satuan],1,0,'C',1);
	$pdf->CELL(25,6,number_format($data['debet']),1,0,'R',1);
	$pdf->CELL(25,6,number_format($data['kredit']),1,0,'R',1);
	$ya = $ya+$row;
	$no++;
	$i++;
	//$dm[kode] = $data[kdprog];
}
$pdf->text(200,$ya+6,"SURABAYA , ".$tgl);
$pdf->text(200,$ya+18,"KETUA KOPMA UNESA");
$pdf->output();
?>