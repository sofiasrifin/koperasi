<?php
include "../../inc/inc.koneksi.php";
//$table	= 'supplier';
$id		= isset($_POST['id']);
$where 	=  "WHERE kode_supplier= '$id'";
$sql 	= mysql_query("SELECT * FROM supplier $where");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM supplier $where";
	mysql_query($input);
	echo "Data Sukses Dihapus";
}
?>