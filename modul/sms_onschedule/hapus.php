<?php
include "../../inc/inc.koneksi.php";
$table	= 'sms_message';
$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM $table WHERE id= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE id= '$id'";
	mysql_query($input);
}
?>