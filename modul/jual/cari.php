<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$table	= 'h_jual';
$id		= $_POST['id'];
$where	= "WHERE kodejual='$id'";
$text	= "SELECT *
			FROM $table
			$where";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['tgl']		= jin_date_str($r[tgljual]);
	
	echo json_encode($data);
}
}else{
	$data['tgl']	= '';
	echo json_encode($data);
}
?>