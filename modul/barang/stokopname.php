<?php
include "../../inc/inc.koneksi.php";

$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM barang");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = ("UPDATE barang set 
						stok_awal="0",
						gudang="0" ");
	mysql_query($input);
	echo "Data Sukses di Stok Opname";
?>