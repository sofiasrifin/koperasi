<?php
include "../../inc/inc.koneksi.php";
$kode	= $_POST['kode'];

$text	= "SELECT *
			FROM barang WHERE kode_barang= '$kode'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['barcode']	= $r[barcode];
	$data['nama']		= $r[nama_barang];
	$data['satuan']		= $r[pbsid];
	$data['harga']		= $r[harga_jual];
	echo json_encode($data);
}
}else{
	$data['nama']	= '';
	$data['satuan']	= '';
	$data['harga']	= '';
	echo json_encode($data);
	
}

?>