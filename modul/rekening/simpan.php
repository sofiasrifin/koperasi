<?php
include "../../inc/inc.koneksi.php";


$table		="akun";
$kode		=str_replace("'","\'",$_POST['kode']);
$nama		=str_replace("'","\'",$_POST['nama']);
$saldo		=str_replace("'","\'",$_POST['saldo']);

$where		= "WHERE kode_akun= '$kode'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){

	$input	= "UPDATE $table SET 
				nama_akun	='$nama',
				saldo_awal	='$saldo'
				$where";
	
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(kode_akun,nama_akun,saldo_awal)
			VALUES
			('$kode','$nama','$saldo')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>