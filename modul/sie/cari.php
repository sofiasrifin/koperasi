<?php
include "../../inc/inc.koneksi.php";

$table	= 'sie';
$id		= $_POST['id'];
$where	= "WHERE id_sie='$id'";
$text	= "SELECT * FROM $table $where";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['nama']		= $r['nama_sie'];
	$data['poin']		= $r['poin'];
	echo json_encode($data);
}
}else{
	$data['nama']	= '';
	$data['poin']	= '';
	echo json_encode($data);
}
?>