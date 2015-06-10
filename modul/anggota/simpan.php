<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$table		="anggota";
$reg		=str_replace("'","\'",$_POST['reg']);
$nomor		=str_replace("'","\'",$_POST['nomor']);
$anggota	=str_replace("'","\'",$_POST['anggota']);
$tempat		=str_replace("'","\'",$_POST['tempat']);
$tgl		=jin_date_str($_POST['tgl']);
$fakjur		=str_replace("'","\'",$_POST['fakjur']);
$agama		=$_POST['agama'];
$jk			=$_POST['jk'];
$alamat		=str_replace("'","\'",$_POST['alamat']);
$hp			=str_replace("'","\'",$_POST['hp']);
$pwd		=md5($_POST['pwd']);


$where		= "WHERE reg= '$reg'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){
	if(!empty($pwd)){
	$input	= "UPDATE $table SET 
				no_anggota		='$nomor',
				nama			='$anggota',
				templahir		='$tempat',
				tgllahir		='$tgl',
				fakjur			='$fakjur',
				agama			='$agama',
				jk				='$jk',
				alamat			='$alamat',
				telp			='$hp',
				password		='$pwd'
				$where";
	}else{
	$input	= "UPDATE $table SET 
				no_anggota		='$nomor',
				nama			='$anggota',
				templahir		='$tempat',
				tgllahir		='$tgl',
				fakjur			='$fakjur',
				agama			='$agama',
				jk				='$jk',
				alamat			='$alamat',
				telp			='$hp'
				$where";
	}
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(reg,no_anggota,nama,templahir,tgllahir,fakjur,agama,jk,alamat,telp,password)
			VALUES
			('$reg','$nomor','$anggota','$tempat','$tgl','$fakjur','$agama','$jk','$alamat','$hp','$pwd')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>