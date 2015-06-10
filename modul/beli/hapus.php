<?php
include "../../inc/inc.koneksi.php";
$table	= 'h_beli';
$tableD	= 'd_beli';
$id		= $_POST['id'];
$where 	=  "WHERE kodebeli= '$id'";
$sql 	= mysql_query("SELECT * FROM $table $where");
$row	= mysql_num_rows($sql);
if ($row>0){
	$inputD = "DELETE FROM $tableD $where";
	mysql_query($inputD);
	$input = "DELETE FROM $table $where";
	mysql_query($input);
	echo "Data Sukses Dihapus";
}
?>