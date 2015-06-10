<?php
include'../include/db.php'; 
$jum=$_POST['jum'];
$id_poll1=$_POST['id_poll'];
$id_poll=strtolower($id_poll1);
$judul_grafik=$_POST['judul_grafik'];
$ket_poll=$_POST['ket_poll'];
$jawaban1=$_POST['jawaban'];

$sql1 = mysql_query("INSERT INTO ket_poll SET id_poll='$id_poll',judul_grafik='$judul_grafik',ket_poll='$ket_poll'");

for($o=1; $o<=$jum; $o++)
{
$array = array_map('strtolower', $jawaban1);

$sql = mysql_query("INSERT INTO poll SET id_poll='$id_poll',jawaban='$array[$o]'");
}

?>
