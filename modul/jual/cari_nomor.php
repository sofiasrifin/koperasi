<?php
include "../../inc/inc.koneksi.php";

$table	= 'h_jual';
$id		= $_POST['id'];

$text	= "SELECT max(kodejual) as noakhir FROM $table";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
	$r=mysql_fetch_array($sql);
	$noakhir = $r[noakhir];
	$no	= (int) substr($noakhir,2,5);
	$no++;
	$kode	= 'JL'. sprintf("%05s",$no);
	$data['kode']	= $kode;
	echo json_encode($data);
}else{
	$data['kode']	= 'BL00001';
	echo json_encode($data);
}
?>