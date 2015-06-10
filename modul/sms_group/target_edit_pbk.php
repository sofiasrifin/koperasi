<?php

	$notelplama = str_replace(" ","+", $_POST['notelplama']);
	$notelp = str_replace(" ","+", $_POST['notelp']);
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$group = $_POST['group'];
	$grouplama = $_POST['grouplama'];
	
	$tgllhr = $_POST['tgllhr'];
   
    $splittgl = explode('-', $tgllhr);
    $tgllhr = $splittgl[2]."-".$splittgl[1]."-".$splittgl[0];
	
	$query = "DELETE FROM sms_autolist WHERE phoneNumber = '$notelp' OR phoneNumber = '$notelplama'";
    mysql_query($query);
	
	$listgroup = '';
	if (!empty($group))
    {
	foreach($group as $namagroup)
	{
	   $listgroup .= $namagroup.'|';
	   $query = "SELECT * FROM sms_autoresponder WHERE idgroup = '$namagroup'";
	   $hasil = mysql_query($query);
	   while ($data = mysql_fetch_array($hasil))
	   {
			$idpesan = $data['id'];
			$sender = $data['sender'];
			$query2 = "INSERT INTO sms_autolist VALUES ('$notelp', '$idpesan', '0', '$sender')";
			mysql_query($query2);
	   }
	}
	$listgroup = '|'.$listgroup;
	}
	
	$query = "UPDATE sms_phonebook SET nama = '$nama', datebirth = '$tgllhr', noTelp = '$notelp', alamat = '$alamat', idgroup = '$listgroup' 
	          WHERE noTelp = '$notelplama'";
	mysql_query($query);
	echo "<p><h1>Phonebook sudah diupdate</h1></p>";
?>
	<script language="javascript">
			setTimeout('self.location.href="?module=daftarphonebook"',1000);
        </script>
<?php
/*
include "inc.koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$notelp	= $_POST['notelp'];
$group = $_POST['group'];
$tgllhr = $_POST['tgllhr'];

	$hasil= mysql_query("update sms_phonebook set nama = '$nama', alamat = '$alamat', tgllhr = '$tgllhr' WHERE noTelp = '$_POST[notelp]'");
	if($hasil){
			echo "<p><b>Group Berhasil Disimpan</b></p>";
		?>
        <script language="javascript">
			setTimeout('self.location.href="?module=phonebook"',1000);
        </script>
    <?php
	}
*/
?>