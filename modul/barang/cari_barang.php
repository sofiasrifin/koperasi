<?php
include "../../inc/inc.koneksi.php";
$kode	= $_POST['kode'];

$text	= "SELECT *
			FROM barang WHERE kode_barang= '$kode'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['kode']		= $r[kode_barang];
	$data['barcode']	= $r[barcode];
	$data['nama']		= $r[nama_barang];
	$data['kategori']	= $r[kid];
	$data['satuan']		= $r[pbsid];
	$data['gudang']		= $r[gudang];
	$data['stok']		= $r[stok_awal];
	$data['hargabeli']	= $r[harga_beli];
	$data['hargajual']	= $r[harga_jual];
	echo json_encode($data);
}
}else{
	$data['barcode']	= '';
	$data['nama']	 	= '';
	$data['kategori']	= '';
	$data['satuan']	 	= '';
	$data['gudang']	 	= '';
	$data['stok']	 	= '';
	$data['hargabeli']	= '';
	$data['hargajual']	= '';
	echo json_encode($data);
	
}

?>