<?php
include "../../inc/inc.koneksi.php";

$table	= 'h_beli';
$id		= $_POST['id'];

$text	= "SELECT max(kodebeli) as noakhir FROM $table";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
	$r=mysql_fetch_array($sql);
	$noakhir = $r[noakhir];
	$no	= (int) substr($noakhir,2,5);
	$no++;
	$kode	= 'BL'. sprintf("%05s",$no);
	$data['kode']	= $kode;
	echo json_encode($data);
}else{
	$data['kode']	= 'BL00001';
	echo json_encode($data);
}
?>