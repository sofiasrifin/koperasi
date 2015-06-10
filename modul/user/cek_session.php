<?php
if(!isset($_SESSION['namauser']) AND !isset($_SESSION['passuser']) AND !isset($_SESSION['status']))
{ 
header("Location:../denied.php");
}
$nama=$_SESSION['namauser'];

?>