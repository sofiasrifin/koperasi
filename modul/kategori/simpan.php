<?php
include "../../inc/inc.koneksi.php";


$table			="kategori";
$kode			=str_replace("'","\'",$_POST['kode']);
$nama			=str_replace("'","\'",$_POST['nama']);

$where		= "WHERE kid= '$kode'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){

	$input	= "UPDATE $table SET 
				knama	='$nama',
				$where";
	
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(kid,knama)
			VALUES
			('$kode','$nama')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>