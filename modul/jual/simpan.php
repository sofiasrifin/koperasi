<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_hdt.php";
include "../../inc/fungsi_tanggal.php";

$table			="h_jual";
$tableD			="d_jual";
$kode			=str_replace("'","\'",$_POST[kode]);
$kodeanggota	=str_replace("'","\'",$_POST[kodeanggota]);
$tgl			=jin_date_sql($_POST[tgl]);
$barcode		=str_replace("'","\'",$_POST[barcode]);
$kodebrg		=str_replace("'","\'",$_POST[kodebrg]);
$jml			=str_replace("'","\'",$_POST[jml]);
$harga			=str_replace("'","\'",$_POST[harga]);
$users			= $_SESSION[namauser];

$where		= "WHERE kodejual= '$kode'";
$whereD		= "WHERE kodejual= '$kode' AND kode_barang='$kodebrg'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){
	/*--cari stok barang--*/
	$akhir	= cari_stok_akhir($kodebrg);
	if($akhir>=$jml){
	$input	= "UPDATE $table SET 
				no_anggota		='$kodeanggota',
				tgljual			='$tgl'
				$where";
	mysql_query($input);
	
	/* cari detail */
	$sqlD = mysql_query("SELECT *
				   FROM $tableD 
				   $whereD");
	$rowD	= mysql_num_rows($sqlD);
	if ($rowD>0){
		$inputD	= "UPDATE $table SET 
					jmljual		='$jml',
					hargajual	='$harga'
					$where";
		mysql_query($inputD);
	}else{
		$inputD = "INSERT INTO $tableD 
			(kodejual,no_anggota,barcode,kode_barang,jmljual,hargajual)
			VALUES
			('$kode','$kodeanggota','$barcode','$kodebrg','$jml','$harga')";
		mysql_query($inputD);
		
	}
		//mysql_query("UPDATE barang FROM stok_awal=stok_awal - ".$jml." WHERE kode_barang=$kodebrg");
		
		echo "<b>Data Sukses diubah</b>";
	}else{
		echo "<b>Stok Barang Tidak Mencukupi, Sisa $akhir</b>";
	}
}else{
	/*--cari stok barang--*/
	$akhir	= cari_stok_akhir($kodebrg);
	if($akhir>=$jml){
		/* input header beli */
		$input = "INSERT INTO $table 
				(kodejual,tgljual,no_anggota,user_id)
				VALUES
				('$kode','$tgl','$kodeanggota','$users')";
		mysql_query($input);
		
		/* input detail beli */
		$inputD = "INSERT INTO $tableD 
				(kodejual,no_anggota,barcode,kode_barang,jmljual,hargajual)
				VALUES
				('$kode','$kodeanggota','$barcode','$kodebrg','$jml','$harga')";
		mysql_query($inputD);
		//mysql_query("UPDATE barang FROM stok_awal=stok_awal - ".$jml." WHERE kode_barang=$kodebrg");
		echo "<b>Data sukses disimpan</b>";
	}else{
		echo "<b>Stok Barang Tidak Mencukupi, Sisa $akhir</b>";
	}
}
//echo "<br>".$input;
?>