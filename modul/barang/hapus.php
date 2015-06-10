<?php
include "../../inc/inc.koneksi.php";
$table	= 'barang';
$id		= $_POST['id'];
$where 	=  "WHERE kode_barang= '$id'";
$sql 	= mysql_query("SELECT * FROM $table $where");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table $where";
	mysql_query($input);
	echo "Data Sukses Dihapus";
}
?>