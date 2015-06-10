<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include 'inc.koneksi.php';
	include 'library.php';
	
	if(isset($_POST['save'])){
		$judul		=str_replace("'","\'",$_POST[judulberita]);
		$loko		=str_replace("'","\'",$_POST[loko]);	//Isi Berita
	
		$insert = mysql_query ("INSERT INTO berita
									(user_id,judul, isi_berita, hari, tanggal, jam)VALUES
									('$_SESSION[namauser]',
									'$judul',
									'$loko',
									'$hari_ini',
									'$tgl_sekarang',
									'$jam_sekarang')");
		if($insert){
			echo "<p><b>Berita Berhasil Disimpan</b></p>";
		?>
        <script language="javascript">
			setTimeout('self.location.href="?module=berita_anggota"',1000);
        </script>
	<?php
		}
	} else if (isset($_POST['cancel'])){
		echo "<p><b>Tambah Berita Dibatalkan</b></p>";
?>
		<script language="javascript">
			setTimeout('self.location.href ="?module=berita_anggota"',500);
        </script>
<?php		
	}
?>
<form name="form" action="?module=tambah_berita" method="post">
<table id='theTable' border="1" width='100%'>
	<tr>
    	<td colspan="2"><h3>Tambah Berita</h3></td>
    </tr>
    <tr>
		<td width="10%">Judul</td>
		<td><input type='text' name='judulberita' id='judulberita' size='70'></td>
	</tr>
	<tr>
		<td width="10%">Isi Berita </td>
		<td><textarea name='loko' id='loko' style='width: 600px; height: 350px;'></textarea></td>
	</tr>
    <tr>
    	<td width="5%">
        <button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=6>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
        </td>
        <td>
        <button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=7>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button>
        </td>
    </tr>	
	</table>
</form>
</body>
</html>
