<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table		="pengambilan";
$tgl		=jin_date_str($_POST[tgl]);
$no			=$_POST[no];
$jenis		=$_POST[jenis];
$jml		=$_POST[jml];
$userid		= $_SESSION[namauser];
$input = "INSERT INTO $table (tgl,no_anggota,id_jenis,jumlah,user_id,tglinsert)
			VALUES('$tgl','$no','$jenis','$jml','$userid',now())";
mysql_query($input);
echo "<b>Data sukses disimpan</b>";
?>