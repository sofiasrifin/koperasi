<?php
include "../../inc/inc.koneksi.php";

$q	= $_GET["q"];
if (!$q) return;
$sql	= mysql_query("SELECT * FROM supplier WHERE kode_supplier like '%$q%'");
while($r=mysql_fetch_array($sql)){
	$kode = $r['kode_supplier'];
	echo "$kode\n";
}
?>