<?php
include "../../inc/inc.koneksi.php";
$table	= 'inbox';
$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM $table WHERE ID= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE ID= '$id'";
	mysql_query($input);
}
?>