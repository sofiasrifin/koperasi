<?php
include "../../inc/inc.koneksi.php";
$table	= 'd_jual';
$id		= $_POST['id'];
$where 	=  "WHERE kodejual= '$id'";
$whereD	=  "WHERE kodejual= '$id'";
$sql 	= mysql_query("SELECT * FROM $table $where");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table $where";
	mysql_query($input);
	$inputD = "DDELETE FROM $tableD $where";
	mysql_query($inputD);
	echo "Data Sukses Dihapus";
}
?>