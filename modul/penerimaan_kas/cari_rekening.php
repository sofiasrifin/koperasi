<?php
include "../../inc/inc.koneksi.php";
$kode	= $_POST['kode'];

$text	= "SELECT *
			FROM akun WHERE kode_akun= '$kode'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	
	$data['nama']	= $r[nama_akun];
	//$data['saldo']	= $r[saldo_awal];
	
	echo json_encode($data);
}
}else{
	$data['nama']	= '';
	//$data['saldo']	= '';

	echo json_encode($data);
	
}

?>