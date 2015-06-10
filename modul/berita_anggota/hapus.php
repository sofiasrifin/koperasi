<?php
include "../../inc/inc.koneksi.php";
$table	= 'berita';
$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM $table WHERE id_berita= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE id_berita= '$id'";
	mysql_query($input);
}
?>