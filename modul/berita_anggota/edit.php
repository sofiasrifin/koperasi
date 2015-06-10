<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//include "inc.koneksi.php";
	if ($_GET[edit]<>'' || (isset($_POST['save'])) || (isset($_POST['cancel']))){
	$kode=$_GET[edit];
	$q_esupp=mysql_query("SELECT * FROM berita WHERE id_berita='$kode'");	
	$q_esp=mysql_fetch_array($q_esupp);
	
	if (isset($_POST['save'])){
		if (empty($_POST['loko'])) {		
		$mssg='Perubahan data gagal!';
?>
		<script language="javascript">
 			setTimeout('self.location.href ="?module=berita_anggota"',1000);
		</script>
<?php
	}
	else{
		$judul		=str_replace("'","\'",$_POST[judulberita]);
		$loko		=str_replace("'","\'",$_POST[loko]);	//Isi Berita
		$id			=str_replace("'","\'",$_POST[id]);
		
		$q_upsupp=mysql_query("UPDATE berita SET 
										judul='$judul',
										isi_berita='$loko'
										WHERE id_berita= '$id'");	
		$mssg='Perubahan disimpan! ';
	?>
		<script language="javascript">
 			setTimeout('self.location.href ="?module=berita_anggota"',500);
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
<form name="form" action="?module=edit_berita" method="post">
<table id='theTable' border="1" width='100%'>
	<tr>
    	<td colspan="2"><h3>Edit Berita</h3></td>
    </tr>
    <tr>
		<td width="10%">Judul</td>
		<td><input type='text' name='judulberita' id='judulberita' size='70' value="<?php print ($q_esp['judul']) ?>"></td>
	</tr>
	<tr>
		<td width="10%">Isi Berita </td>
	
	<td><textarea name='loko' id='loko' style='width: 600px; height: 350px;'><?php print $q_esp['isi_berita'] ?> </textarea></td>;

	</tr>
    <tr>
    	<td width="5%">
        <button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=6>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
        </td>
        <td>
        <button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=7>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button>
        </td>
        <td><input name='id' type='hidden' value="<?php print $q_esp['id_berita'] //$kode?>"></td>
    </tr>	
	</table>
</form>
<?php
} else if ($_GET[hapus]<>'') {
	$kode=$_GET[hapus];
	$q_dsupp=mysql_query("delete from berita where id_berita='$kode'");	
?>
		<script language="javascript">
 			setTimeout('self.location.href ="?module=berita_anggota"',300);
		</script>
<?php
	}

?>
</body>
</html>
