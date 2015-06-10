<?php
include "../../inc/inc.koneksi.php";

$table	= 'kategori';
$id		= $_POST['id'];
$where	= "WHERE kid='$id'";
$text	= "SELECT * FROM $table $where";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['nama']	= $r['knama'];
	echo json_encode($data);
}
}else{
	$data['nama']	= '';
	echo json_encode($data);
}
?>