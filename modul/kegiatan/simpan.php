<?php
include "../../inc/inc.koneksi.php";


$table			="acara";
$kode			=str_replace("'","\'",$_POST['kode']);
$namakegiatan	=str_replace("'","\'",$_POST['namakegiatan']);


$where		= "WHERE id_acara= '$kode'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){
	$input	= "UPDATE $table SET 
				id_acara	='$kode',
				nama_acara	='$namakegiatan',
				$where";
	
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(id_acara,nama_acara)
			VALUES
			('$kode','$namakegiatan')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>