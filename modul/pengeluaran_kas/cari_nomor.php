<?php
include "../../inc/inc.koneksi.php";

$table	= 'jurnal';
$id		= $_POST['id'];

$text	= "SELECT max(no_jurnal) as noakhir FROM $table";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
	$r=mysql_fetch_array($sql);
	$noakhir = $r[noakhir];
	$no	= (int) substr($noakhir,2,5);
	$no++;
	$kode	= 'J'. sprintf("%05s",$no);
	$data['kode']	= $kode;
	echo json_encode($data);
}else{
	$data['kode']	= 'J00001';
	echo json_encode($data);
}
?>