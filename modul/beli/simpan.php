<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$table		="h_beli";
$tableD		="d_beli";
$kode		=str_replace("'","\'",$_POST[kode]);
$kodesup	=str_replace("'","\'",$_POST[kodesup]);
$tgl		=jin_date_sql($_POST[tgl]);
$kodebrg	=str_replace("'","\'",$_POST[kodebrg]);
$jml		=str_replace("'","\'",$_POST[jml]);
$harga		=str_replace("'","\'",$_POST[harga]);
$users		= $_SESSION[namauser];

$where		= "WHERE kodebeli= '$kode'";
$whereD		= "WHERE kodebeli= '$kode' AND kode_barang='$kodebrg'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){

	$input	= "UPDATE $table SET 
				kode_supplier	='$kodesup',
				tglbeli			='$tgl'
				$where";
	mysql_query($input);
	/* cari detail */
	$sqlD = mysql_query("SELECT *
				   FROM $tableD 
				   $whereD");
	$rowD	= mysql_num_rows($sqlD);
	if ($rowD>0){
		$inputD	= "UPDATE $table SET 
					jmlbeli		='$jml',
					hargabeli	='$harga'
					$where";
		mysql_query($inputD);
	}else{
		$inputD = "INSERT INTO $tableD 
			(kodebeli,kode_barang,jmlbeli,hargabeli)
			VALUES
			('$kode','$kodebrg','$jml','$harga')";
		mysql_query($inputD);
	}
	echo "<b>Data Sukses diubah</b>";
}else{
	/* input header beli */
	$input = "INSERT INTO $table 
			(kodebeli,tglbeli,kode_supplier,user_id)
			VALUES
			('$kode','$tgl','$kodesup','$users')";
	mysql_query($input);
	/* input detail beli */
	$inputD = "INSERT INTO $tableD 
			(kodebeli,kode_barang,jmlbeli,hargabeli)
			VALUES
			('$kode','$kodebrg','$jml','$harga')";
	mysql_query($inputD);
	
	
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>