<?php
include "../../inc/inc.koneksi.php";

$table	= 'supplier';
$id		= isset($_POST['id']);
$where	= "WHERE kode_supplier='$id'";
$text	= "SELECT * FROM $table $where";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['nama']	= $r['nama_supplier'];
	$data['alamat']		= $r['alamat'];
	echo json_encode($data);
}
}else{
	$data['nama']	= '';
	$data['alamat']		= '';
	echo json_encode($data);
}
?>