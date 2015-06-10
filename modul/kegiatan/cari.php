<?php
include "../../inc/inc.koneksi.php";

$table	= 'acara';
$id		= isset($_POST['id']);
$where	= "WHERE id_acara='$id'";
$text	= "SELECT * FROM $table $where";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['namakegiatan']	= $r['nama_acara'];
	echo json_encode($data);
}
}else{
	$data['namakegiatan']	= '';
	echo json_encode($data);
}
?>