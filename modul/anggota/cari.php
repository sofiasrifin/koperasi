<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$table	= 'anggota';
$id		= $_POST['id'];
$text	= "SELECT * FROM $table WHERE reg= '$id'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['nomor']		= $r['no_anggota'];		//sebelah kiri sesuai dengan id kalau kanan sesuai dengan database 
	$data['anggota']	= $r['nama'];
	$data['tempat']		= $r['templahir'];
	$data['tgl']		= jin_date_str($r['tgllahir']);
	$data['fakjur'] 	= $r['fakjur'];
	$data['agama']		= $r['agama'];
	$data['jk']			= $r['jk'];
	$data['alamat']		= $r['alamat'];
	$data['hp']			= $r['telp'];
	echo json_encode($data);
}
}else{
	$data['reg']		= '';
	$data['nomor']		= '';
	$data['anggota']	= '';
	$data['tempat']		= '';
	$data['tgl']		= '';
	$data['fakjur'] 	= '';
	$data['agama']		= '';
	$data['jk']			= '';
	$data['alamat']		= '';
	$data['hp']			= '';
	echo json_encode($data);
}
?>