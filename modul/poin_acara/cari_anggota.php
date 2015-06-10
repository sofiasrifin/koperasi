<?php
include "../../inc/inc.koneksi.php";
$kode	= $_POST['kode'];

$text	= "SELECT *
			FROM anggota WHERE no_anggota= '$kode'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	
	$data['nama']	= $r['nama'];
	
	echo json_encode($data);
}
}else{
	$data['nama']	= '';

	echo json_encode($data);
	
}

?>