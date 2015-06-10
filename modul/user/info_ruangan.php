
<?php
include"../include/db.php"; 
$kode = $_GET['kode'];
$query=mysql_query("SELECT * FROM info_ruang WHERE ruang='$kode'");
$a=mysql_fetch_array($query);
$b=mysql_num_rows($query);
if ($b<>0)
	{
	echo"Maaf nama ruang $kode sudah ada.";
	}
?>