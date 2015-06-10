<?php
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
$id=$_REQUEST['id'];	
if($id==update_konten)
{
$inbox=$_POST['inbox'];	
$outbox=$_POST['outbox'];	
$sentitem=$_POST['sentitem'];	
$phonebook=$_POST['phonebook'];	
$foldersms=$_POST['foldersms'];	
$insert=mysql_query("UPDATE jumlah_konten SET inbox='$inbox', outbox='$outbox', sentitem='$sentitem', phonebook='$phonebook', foldersms='$foldersms'");
header("Location:include_sms_notification.php?id=beranda");
}

if($id==stat_sound)
{
$nilai=$_GET['nilai'];	
$insert=mysql_query("UPDATE seting SET sound='$nilai'");
header("Location:include_sms_notification.php?id=beranda");
}

if($id==pindah_folder)
{
$id_sms=$_POST['id_sms'];
$select=$_POST['select'];

$sms=mysql_query("SELECT * FROM inbox where ID='$id_sms'");
$t_sms=mysql_fetch_array($sms);
$grup=mysql_query("SELECT * FROM grup_sms where nama='$select'");
$t_grup=mysql_fetch_array($grup);
$j_grup=$t_grup[jumlah]+1;
$hp=substr($t_sms[SenderNumber], 3);

// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO inbox_grup_sms SET id='',id_grup='$select',no_hp='$hp',isi='$t_sms[TextDecoded]',tgl='$t_sms[ReceivingDateTime]',SenderID='$SenderID'";
$query = mysql_query($sql) ;
$command = mysql_query("DELETE FROM inbox where ID='$id_sms'"); 
$insert=mysql_query("UPDATE grup_sms SET jumlah='$j_grup' WHERE nama='$select'");
}

if($id==tambah_pelanggan)
{
$namapengguna=$_POST['namapengguna'];
$no_hp=$_POST['no_hp'];
$alamat=$_POST['alamat'];
$grup=$_POST['grup'];

// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO data_pelanggan SET id='',nama='$namapengguna',no_hp='$no_hp',alamat='$alamat',grup='$grup'";
$query = mysql_query($sql) ;
}

if($id==autorespond)
{
$kunci=$_POST['kunci'];
$isi_sms=$_POST['isi_sms'];
$act=$_POST['act'];
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO autorespond SET id='',kunci='$kunci',isi_sms='$isi_sms',aktif='$act'";
$query = mysql_query($sql) ;
}

if($id==phonebook)
{
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO data_pelanggan SET id='',nama='$nama',no_hp='$no_hp',alamat='$alamat',grup='$grup'";
$query = mysql_query($sql) ;
header("Location:inbox.php");
}

if($id==template_sms)
{
$judul=$_POST['judul'];
$isi=$_POST['isi'];
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO template_sms SET id='',judul='$judul',isi='$isi'";
$query = mysql_query($sql) ;
header("Location:include_template_sms.php");
}

if($id==tambah_produk)
{
// Masukkan data pelanggan ke tabel pelanggan//
copy($file, "buku/$file_name");

$buku=mysql_query("SELECT id from data_produk ORDER BY id desc");
$tmpl=mysql_fetch_array($buku);
$no=$tmpl[id]+1;
rename("buku/$file_name", "buku/book$no.jpg");
$sql = "INSERT INTO data_produk SET id='',judul_buku='$judul_buku',penerbit='$penerbit',tahun_cetak='$thn_cetak',pengarang='$pengarang', gambar='buku/book$no'";
$query = mysql_query($sql) ;

header("Location:data_buku.php");

}

if($id==tambah_group)
{
$nama=$_POST['nama'];
// Masukkan data pelanggan ke tabel pelanggan//
$cek=mysql_query("select * from grup where nama='$nama'");
$jcek=mysql_num_rows($cek);
if($jcek==0)
	{
	$sql = "INSERT INTO grup SET id='',nama='$nama'";
	$query = mysql_query($sql) ;
	}
	if($jcek<>0)
	{
	}	
}

if($id==tambah_folder_sms)
{
$nama=$_POST['nama'];
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO grup_sms SET Id='',nama='$nama',jumlah='0'";
$query = mysql_query($sql) ;
}

if($id==tambah_nilai)
{
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO nilai_siswa SET id='',nis='$nis',big='$big',bin='$bin',mat='$mat',ipa='$ipa'";
$query = mysql_query($sql) ;
}
if($id==update_produk)
{
// Masukkan data pelanggan ke tabel pelanggan//
$tgl=date("d/m/o");
$jam=date("H:i");
$sql = "UPDATE data_produk SET nama_produk='$nama',harga='$harga',tgl='$tgl',jam='$jam' where id='$no'";
$query = mysql_query($sql) ;
header("Location:data_produk.php");
}

if($id==update_pelanggan)
{
$namapelanggan=$_POST['namapelanggan'];
$no_hp=$_POST['no_hp'];
$alamat=$_POST['alamat'];
$grup=$_POST['grup'];
$no=$_POST['no'];
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "UPDATE data_pelanggan SET nama='$namapelanggan',no_hp='$no_hp',alamat='$alamat',grup='$grup' where id='$no'";
$query = mysql_query($sql) ;
header("Location:data_pelanggan.php");
}

if($id==update_daftar)
{
// Masukkan data pelanggan ke tabel pelanggan//
$group=$_POST['group'];
$reg_berhasil=$_POST['reg_berhasil'];
$reg_ada=$_POST['reg_ada'];

$sql = "UPDATE daftar_nohp SET grup='$group',reg_berhasil='$reg_berhasil',reg_ada='$reg_ada'";
$query = mysql_query($sql) ;
header("Location:include_addin_autorespond_daftar.php");
}

if($id==update_format_salah)
{
$isi_sms=$_POST['isi_sms'];
$sql = "UPDATE format_salah SET isi_sms='$isi_sms'";
$query = mysql_query($sql) ;
header("Location:include_addin_autorespond_salah.php");
}

if($id==aktif_autorespond)
{
$aktif=$_GET['aktif'];
$no=$_GET['no'];
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "UPDATE autorespond SET aktif='$aktif' where id='$no'";
$query = mysql_query($sql) ;
header("Location:include_seting_autorespond.php");
}

if($id==aktif_addin_autorespond)
{
$aktif=$_GET['aktif'];
$no=$_GET['no'];
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "UPDATE addin_autorespond SET aktif='$aktif' where id='$no'";
$query = mysql_query($sql) ;
header("Location:include_addin_autorespond.php");
}

if($id==update_group)
{
$nama=$_POST['nama'];
$no=$_POST['no'];
$nama_lama=$_POST['nama_lama'];
// Masukkan data pelanggan ke tabel pelanggan//
$cek=mysql_query("select * from grup where nama='$nama'");
$jcek=mysql_num_rows($cek);
if($jcek==0)
	{
	$sql = "UPDATE grup SET nama='$nama' where id='$no'";
	$query = mysql_query($sql) ;
	$sql1 = mysql_query("UPDATE data_pelanggan SET grup='$nama' where grup='$nama_lama'");

	}
header("Location:data_group.php");
}

if($id==update)
{
// Masukkan data pelanggan ke tabel pelanggan//
$query = mysql_query($sql) ;
header("Location:update.php");
}

if($id==seting)
{
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "UPDATE seting SET status='$value' where nama_seting='autorespond'";
$query = mysql_query($sql) ;
header("Location:seting_autorespond.php");
}

if($id==seting_autoreply)
{
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "UPDATE seting SET status='$value' where nama_seting='autoreply'";
$query = mysql_query($sql) ;
header("Location:seting_autoreply.php");
}

if($id==sms_tolak)
{
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "UPDATE seting SET status='$isi_sms' where nama_seting='tolak'";
$query = mysql_query($sql) ;
header("Location:seting_autorespond.php");
}

if($id==update_pindah_folder)
{
$select=$_POST['select'];
$id_sms=$_POST['id_sms'];
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "UPDATE inbox_grup_sms SET id_grup='$select' where Id='$id_sms'";
$query = mysql_query($sql) ;
header("Location:include_inbox_grup.php");
}

if($id==sound)
{
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "UPDATE sound SET aktif='0'";
$sql1 = "UPDATE sound SET aktif='1' where Id='$no'";
$query = mysql_query($sql) ;
$query1 = mysql_query($sql1) ;
header("Location:include_sms_notification.php?id=beranda");
}

if($id==update_autoforward)
{
$no_hp=$_GET['no_hp'];
$grup=$_GET['grup'];
$cek=mysql_query("SELECT no_hp from grup_autoforward where no_hp='$no_hp'");
$j_cek=mysql_num_rows($cek);
// Masukkan data pelanggan ke tabel pelanggan//
if($j_cek=='0')
{
$sql = "INSERT INTO grup_autoforward SET nama_grup='$grup',no_hp='$no_hp'";
$query = mysql_query($sql) ;
}
else
{
}
header("Location:edit_autoforward.php?grup=$grup");
}


if($id==nohp_autoforward)
{
$no_hp=$_POST['no_hp'];
$cek=mysql_query("SELECT no_hp from nohp_autoforward where no_hp='$no_hp'");
$j_cek=mysql_num_rows($cek);
// Masukkan data pelanggan ke tabel pelanggan//
if($j_cek==0)
{
$sql = "INSERT INTO nohp_autoforward SET id='',no_hp='$no_hp'";
$query = mysql_query($sql) ;
}
else
{
}
header("Location:tambah_allowed.php");
}


if($id==info_ruang)
{
$ruang=$_POST['ruang'];
$ket=$_POST['ket'];
$cek=mysql_query("SELECT ruang from info_ruang where ruang='$ruang'");
$j_cek=mysql_num_rows($cek);
// Masukkan data pelanggan ke tabel pelanggan//
if($j_cek==0)
{
$sql = "INSERT INTO info_ruang SET id='',ruang='$ruang',ket='$ket'";
$query = mysql_query($sql) ;
}
else
{
}
}


if($id==edit_info_ruang)
{
$ket=$_POST['ket'];
$no=$_POST['no'];

$sql = "UPDATE info_ruang SET ket='$ket' where id='$no'";
$query = mysql_query($sql) ;
}

if($id==edit_graph)
{
$judul_grafik=$_POST['judul_grafik'];
$jenis_grafik=$_POST['jenis_grafik'];
$autorefresh=$_POST['autorefresh'];
$ket_poll=$_POST['ket_poll'];
$id_poll=$_POST['id_poll'];
$autorefresh1=$autorefresh*1000;
$sql = "UPDATE ket_poll SET judul_grafik='$judul_grafik',jenis_grafik='$jenis_grafik',autorefresh='$autorefresh1',ket_poll='$ket_poll' where id_poll='$id_poll'";
$query = mysql_query($sql) ;
}

if($id==header_footer)
{
$nama=$_POST['nama'];
$sms_biasa=$_POST['sms_biasa'];
$autorespond=$_POST['autorespond'];
$format_sms_biasa=$_POST['format_sms_biasa'];
$format_sms_auto=$_POST['format_sms_auto'];
$aktif=$_POST['aktif'];
$sql = "UPDATE header_footer SET sms_biasa='$sms_biasa',autorespond='$autorespond',format_sms_biasa='$format_sms_biasa',format_sms_auto='$format_sms_auto',aktif='$aktif' where nama='$nama'";
$query = mysql_query($sql) ;
}

?>