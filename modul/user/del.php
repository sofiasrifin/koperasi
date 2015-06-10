<?php
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
$_REQUEST = array_merge($_GET, $_POST);
$id=$_REQUEST['id'];	
$chk=$_POST['chk'];

if($id==delete_all)
{
$command = mysql_query("DELETE FROM sentitems"); 
header("Location:include_outbox.php"); 
}

if($id==sound)
{
$no=$_GET['no'];
$filename=$_GET['filename'];

$command = mysql_query("DELETE FROM sound where id='$no'"); 
unlink("$filename");
header("Location:include_sms_notification.php"); 
}

if($id==delete_all1)
{
$command = mysql_query("DELETE FROM outbox"); 
header("Location:include_outbox1.php"); 
}

// artikel user //
if($id==inbox)
{
for($o=1; $o<=120; $o++)
	{ 
     $command = mysql_query("DELETE FROM inbox where id='$chk[$o]'"); 
	}
header("Location:include_inbox.php"); 
}

if($id==inbox_grup)
{
$grup=$_POST['grup'];
for($o=1; $o<=120; $o++)
	{ 
     $command = mysql_query("DELETE FROM inbox_grup_sms where id='$chk[$o]'"); 
	}
header("Location:include_inbox_grup.php?grup=$grup"); 
}

if($id==autorespond)
{
for($o=1; $o<=120; $o++)
	{ 
     $command = mysql_query("DELETE FROM autorespond where id='$chk[$o]'"); 
	}
header("Location:include_seting_autorespond.php"); 
}

if($id==template_sms)
{
for($o=1; $o<=12; $o++)
	{ 
     $command = mysql_query("DELETE FROM template_sms where id='$chk[$o]'"); 
	}
header("Location:include_template_sms.php"); 
}


if($id==outbox)
{
for($o=1; $o<=200; $o++)
	{ 
     $command = mysql_query("DELETE FROM sentitems where id='$chk[$o]'"); 
	}
header("Location:include_outbox.php"); 
}

if($id==outbox1)
{
for($o=1; $o<=200; $o++)
	{ 
     $command = mysql_query("DELETE FROM outbox where id='$chk[$o]'"); 
	}
header("Location:include_outbox1.php"); 
}


if($id==user)
{
for($o=1; $o<=12; $o++)
	{ 
     $command = mysql_query("DELETE FROM user where no='$chk[$o]'"); 
	}
header("Location:user.php"); 
}

// data pelanggan//
if($id==data_pelanggan)
{
for($o=1; $o<=1000; $o++)
	{ 
     $command = mysql_query("DELETE FROM data_pelanggan where id='$chk[$o]'"); 
	}
header("Location:include_data_pelanggan.php"); 
}

// data Nilai//
if($id==data_nilai)
{
for($o=1; $o<=1000; $o++)
	{ 
     $command = mysql_query("DELETE FROM nilai_siswa where id='$chk[$o]'"); 
	}
header("Location:include_addin_autorespond_nilai.php"); 
}

// data pelanggan//
if($id==data_produk)
{
for($o=1; $o<=12; $o++)
	{ 
     $command = mysql_query("DELETE FROM data_produk where id='$chk[$o]'"); 
	}
header("Location:data_buku.php"); 
}

// data pelanggan//
if($id==data_group)
{
for($o=1; $o<=12; $o++)
	{ 
     $command = mysql_query("DELETE FROM grup where id='$chk[$o]'"); 
	}
header("Location:include_group.php"); 
}

// data pelanggan//
if($id==seting_autorespond)
{
for($o=1; $o<=12; $o++)
	{ 
     $command = mysql_query("DELETE FROM autorespond where id='$chk[$o]'"); 
	$command1 = mysql_query("DELETE FROM filter_autorespond where id='$cek[$o]'"); 

	}
header("Location:seting_autorespond.php"); 

}

if($id==seting_autoreply)
{
for($o=1; $o<=12; $o++)
	{ 
     $command = mysql_query("DELETE FROM autoreply where id='$chk[$o]'"); 
	$command1 = mysql_query("DELETE FROM filter_autoreply where id='$chk[$o]'"); 

	}
header("Location:seting_autoreply.php"); 

}

if($id==lap_jadwal)
{
	$no=$_GET['no'];	
    $command = mysql_query("DELETE FROM laporan where id='$no'"); 
	$command1 = mysql_query("DELETE FROM schedule where id='$no'"); 
	header("Location:include_outbox_schedule.php"); 

}

if($id==code)
{
    $command = mysql_query("DELETE FROM code_npm where id='$no'"); 
	header("Location:include_addin_autorespond_daftar.php"); 
}

if($id==data_account)
{
for($o=1; $o<=12; $o++)
	{ 
     $command = mysql_query("DELETE FROM user where no='$chk[$o]'"); 
	}
header("Location:include_user_account.php"); 

}

if($id==autoforward)
{
for($o=1; $o<=120; $o++)
	{ 
     $command = mysql_query("DELETE FROM grup_autoforward where nama_grup='$chk[$o]'"); 
	}
header("Location:include_seting_autoforward.php"); 
}

if($id==data_autoforward)
{
$grup=$_POST['grup'];
for($o=1; $o<=120; $o++)
	{ 
     $command = mysql_query("DELETE FROM grup_autoforward where no_hp='$chk[$o]'"); 
	}
header("Location:edit_autoforward.php?grup=$grup"); 
}

if($id==allowed_autoforward)
{
for($o=1; $o<=120; $o++)
	{ 
     $command = mysql_query("DELETE FROM nohp_autoforward where no_hp='$chk[$o]'"); 
	}
header("Location:tambah_allowed.php"); 
}

if($id==info_ruang)
{
for($o=1; $o<=120; $o++)
	{ 
     $command = mysql_query("DELETE FROM info_ruang where id='$chk[$o]'"); 
	}
header("Location:include_seting_info.php"); 
}

if($id==folder_sms)
{
$nama=$_GET['nama'];
$no=$_GET['no'];
$command = mysql_query("DELETE FROM inbox_grup_sms where id_grup='$nama'"); 
$command1 = mysql_query("DELETE FROM grup_sms where Id='$no'"); 
header("Location:include_folder_sms.php"); 
}

if($id==poll)
{
$id_poll=$_GET['id_poll'];
$command = mysql_query("DELETE FROM inbox_poll where id_poll='$id_poll'"); 
$command1 = mysql_query("DELETE FROM poll where id_poll='$id_poll'"); 
$command2 = mysql_query("DELETE FROM ket_poll where id_poll='$id_poll'"); 
$command3 = mysql_query("DELETE FROM arr_poll where id_poll='$id_poll'"); 
header("Location:include_poll.php"); 
}

?>