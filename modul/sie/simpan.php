<?php
include "../../inc/inc.koneksi.php";


$table		="sie";
$kode		=str_replace("'","\'",$_POST['kode']);
$nama		=str_replace("'","\'",$_POST['nama']);
$poin		=str_replace("'","\'",$_POST['poin']);

$where		= "WHERE id_sie= '$kode'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){

	$input	= "UPDATE $table SET 
				nama_sie	='$nama',
				poin		='$poin'
				$where";
	
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(id_sie,nama_sie,poin)
			VALUES
			('$kode','$nama','$poin')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>