<?php
include "../../inc/inc.koneksi.php";

$q	= $_GET["q"];
if (!$q) return;
$sql	= mysql_query("SELECT * FROM anggota WHERE no_anggota like '%$q%'");
while($r=mysql_fetch_array($sql)){
	$kode = $r['no_anggota'];
	echo "$kode\n";
}
?>