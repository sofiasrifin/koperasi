<?php
session_start();
include "../../inc/inc.koneksi.php";
//include "../../inc/fungsi_hdt.php";
include "../../inc/fungsi_tanggal.php";

$table			="poin_acara";
$kode			=str_replace("'","\'",$_POST['kode']);
$kodeanggota	=str_replace("'","\'",$_POST['kodeanggota']);
$tgl			=jin_date_sql($_POST['tgl']);
$idacara		=$_POST['idacara'];
$idsie			=$_POST['idsie'];
$jml			=str_replace("'","\'",$_POST['jml']);

$where		= "WHERE id_poin= '$kode'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){
	$input	= "UPDATE $table SET 
				no_anggota		='$kodeanggota',
				tgl				='$tgl',
				id_acara		='$idacara',
				id_sie			='$idsie',
				jumlahpoin		='$jml'
				$where";
	
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(id_poin,no_anggota,tgl,id_acara,id_sie,jumlahpoin)
			VALUES
			('$kode','$kodeanggota','$tgl','$idacara','$idsie','$jml')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>