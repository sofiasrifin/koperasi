<?php
include "../../inc/inc.koneksi.php";


$table		="jenis_simpan";
$kode		=str_replace("'","\'",$_POST['kode']);
$jenis		=str_replace("'","\'",$_POST['jenis']);
$jumlah		=str_replace("'","\'",$_POST['jumlah']);

$where		= "WHERE id_jenis= '$kode'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){

	$input	= "UPDATE $table SET 
				jenis_simpanan	='$jenis',
				jumlah			='$jumlah'
				$where";
	
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(id_jenis,jenis_simpanan,jumlah)
			VALUES
			('$kode','$jenis','$jumlah')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>