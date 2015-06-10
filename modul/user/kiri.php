<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p>
<?
if ($status==admin)
{
echo"
<span class='judul'>Menu Utama</span><br />
    <a href='index.php' class='kiri'>&gt; Beranda </a><br />
    <a href='my_account.php' class='kiri'>&gt; Account Saya </a><br />
    <a href='foto.php' class='kiri'>&gt; Ganti Foto </a><br />
    <a href='panduan.php' class='kiri'>&gt; Panduan Penggunaan</a><br />
    <a href='user.php' class='kiri'>&gt; User Account </a><br />
    <a href='logout.php' class='kiri'>&gt; Logout </a><br /><br />

<span class='judul'>Menu SMS</span><br />
    <a href='inbox.php' class='kiri'>&gt; Kotak Masuk</a><br />
	<a href='outbox.php' class='kiri'>&gt; Laporan Pengiriman</a><br />
	<a href='kirim_sms1.php' class='kiri'>&gt; Kirim SMS</a><br />
	<a href='kirim_sms.php' class='kiri'>&gt; Kirim SMS ke group</a><br />
	<a class='kiri'><a href='Data_Pelanggan.php' class='kiri'>&gt; Data Phonebook</a><br />
	<a href='data_group.php' class='kiri'>&gt; Data Group</a><br />

    <br />
	
<span class='judul'>Seting SMS</span><br />
    <a href='template_sms.php' class='kiri'>&gt; Template SMS</a><br />
    <a href='seting_autorespond.php' class='kiri'>&gt; Auto Respond</a><br />
    <a href='seting_autoreply.php' class='kiri'>&gt; Auto Reply</a><br />
    <a href='seting_autoforward.php' class='kiri'>&gt; Auto Forward</a><br />

    <br />
	";
}
if ($status==user)
{
echo"
<span class='judul'>Menu Utama</span><br />
    <a href='index.php' class='kiri'>&gt; Home </a><br />
    <a href='forum.php' class='kiri'>&gt; Forum</a><br />
    <a href='my_account.php' class='kiri'>&gt; My Account </a><br />
    <a href='foto.php' class='kiri'>&gt; Ganti Foto </a><br />
    <a href='article.php' class='kiri'>&gt; Article </a><br />
    <a href='tambah_lptm.php' class='kiri'>&gt; Tambah LPTM</a><br />    
    <a href='print.php' class='kiri'>&gt; Print LPTM</a><br />    
	<a href='rpp.php' class='kiri'>&gt; RPP Koe</a><br />
    <a href='news.php' class='kiri'>&gt; News </a><br />
    <a href='logout.php' class='kiri'>&gt; Logout </a><br />
    <br />
	";
}
?>
</p>
<p><br />
</p>
</body>
</html>
