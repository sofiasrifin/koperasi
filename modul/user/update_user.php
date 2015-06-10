<?php
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 

$id=$_POST['id'];	
$no=$_POST['no'];	

// update user //
if($id==update_user)
{
$pass=$_POST['pass'];	
$nama=$_POST['nama'];	
$alamat=$_POST['alamat'];	
$email=$_POST['email'];	
$telp_hp=$_POST['telp_hp'];	

if (empty($pass))
{
$insert=mysql_query("UPDATE user SET nama='$nama',alamat='$alamat',email='$email',telp_hp='$telp_hp' WHERE no='$no'");
}
else
{
$password1=md5($pass);
$insert=mysql_query("UPDATE user SET password='$password1',nama='$nama',alamat='$alamat',email='$email',telp_hp='$telp_hp' WHERE no='$no'");
}
header("Location:my_account.php"); 
}

// foto
if($id==update_foto)
{
if (empty($file_name))
{
}
else{
$insert=mysql_query("UPDATE user SET foto='foto/$file_name' WHERE no='$no'");
copy($file, "foto/$file_name");
unlink($foto);
}
header("Location:foto.php"); 
}

// insert user //
if($id==user)
{
$password1=md5($pass);
$insert=mysql_query("INSERT INTO user (user_id,password,status,nama,alamat,email,telp_hp,foto) VALUES ('$user_id','$password1','$stat','$nama','$alamat','$email','$telp_hp','foto/default.gif')");
}

// dari user admin//
if($id==user_admin)
{
$update=mysql_query("UPDATE user SET status='admin' WHERE no='$no'");
header("Location:include_user_account.php"); 
}

// dari user user//
if($id==user_user)
{
$update=mysql_query("UPDATE user SET status='user' WHERE no='$no'");
header("Location:include_user_account.php"); 
}


?>