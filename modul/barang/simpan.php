<?php
include "../../inc/inc.koneksi.php";


$table		="barang";
$barcode	=str_replace("'","\'",$_POST['barcode']);
$kode		=str_replace("'","\'",$_POST['kode']);
$namabarang	=str_replace("'","\'",$_POST['namabarang']);
$supplier	=$_POST['supplier'];
$kategori	=$_POST['kategori'];
$satuan		=$_POST['satuan'];
$gudang		=str_replace(",","",$_POST['gudang']);
$stok		=str_replace(",","",$_POST['stok']);
$hargabeli	=str_replace(",","",$_POST['hargabeli']);
$hargajual	=str_replace(",","",$_POST['hargajual']);

$where		= "WHERE kode_barang= '$kode'";

$sql = mysql_query("SELECT *
				   FROM $table 
				   $where");

$row	= mysql_num_rows($sql);
if ($row>0){

	$input	= "UPDATE $table SET 
				barcode			='$barcode',
				nama_barang		='$namabarang',
				kode_supplier	='$supplier',
				kid				='$kategori',
				pbsid			='$satuan',
				harga_beli		='$hargabeli',
				harga_jual		='$hargajual',
				gudang			='$gudang',
				stok_awal		= '$stok'
				$where";
	
	mysql_query($input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table 
			(barcode,kode_barang,nama_barang,kode_supplier,kid,pbsid,harga_beli,harga_jual,gudang,stok_awal)
			VALUES
			('$barcode','$kode','$namabarang','$supplier','$kategori','$satuan','$hargabeli','$hargajual','$gudang','$stok')";
	mysql_query($input);
	echo "<b>Data sukses disimpan</b>";
}
//echo "<br>".$input;
?>