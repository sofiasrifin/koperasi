<?php
include "../../inc/inc.koneksi.php";


$table		="supplier";
$kode		=str_replace("'","\'",$_POST['kode']);
$nama		=str_replace("'","\'",$_POST['nama']);
$alamat		=str_replace("'","\'",$_POST['alamat']);

$where		= "WHERE kode_supplier= '$kode'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){

	$input	= "UPDATE $table SET 
				nama_supplier	='$nama',
				alamat			='$alamat'
				$where";
	
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(kode_supplier,nama_supplier,alamat)
			VALUES
			('$kode','$nama','$alamat')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>