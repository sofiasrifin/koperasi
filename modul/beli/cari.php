<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$table	= 'h_beli';
$id		= $_POST['id'];
$where	= "WHERE kodebeli='$id'";
$text	= "SELECT a.*,b.nama_supplier
			FROM $table  as a
			JOIN supplier as b
			ON a.kode_supplier=b.kode_supplier
			$where";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['tgl']		= jin_date_str($r[tglbeli]);
	$data['kodesup']	= $r[kode_supplier];
	$data['namasup']	= $r[nama_supplier];
	
	echo json_encode($data);
}
}else{
	$data['tgl']	= '';
	$data['kodesup']		= '';
	$data['namasup']		= '';
	echo json_encode($data);
}
?>