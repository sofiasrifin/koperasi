<?php
include "../../inc/inc.koneksi.php";

$table	= 'barang';
$id		= $_POST['id'];
$where	= "WHERE kode_barang='$id'";
$text	= "SELECT * FROM $table $where";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['barcode']	= $r['barcode'];		//untuk menampilkan form edit
	$data['kode']		= $r['kode_barang'];
	$data['namabarang']	= $r['nama_barang'];
	$data['supplier']	= $r['kode_supplier'];
	$data['kategori']	= $r['kid'];
	$data['satuan']		= $r['pbsid'];
	$data['gudang']		= $r['gudang'];
	$data['stok']		= $r['stok_awal'];
	$data['hargabeli']	= $r['harga_beli'];
	$data['hargajual']	= $r['harga_jual'];
	echo json_encode($data);
}
}else{
	$data['barcode']	= '';
	$data['namabarang']	= '';
	$data['supplier']	= '';
	$data['kategori']	= '';
	$data['satuan']		= '';
	$data['gudang']		= '';
	$data['stok']		= '';
	$data['hargabeli']	= '';
	$data['hargajual']	= '';
	echo json_encode($data);
}
?>