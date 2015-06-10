<?php
	include "inc.koneksi.php";
	
	$id = str_replace(" ","+", $_GET['id']);
	mysql_query ("DELETE FROM sms_phonebook WHERE noTelp = '$id'");
		//header('location: master.php?module=daftarphonebook');	
	mysql_query ("DELETE FROM sms_autolist WHERE phoneNumber = '$id'");
	echo "<p>&nbsp;</p><p>Data phonebook sudah dihapus</p>";
	echo "<br> <a href='?module=daftarphonebook'>Kembali</a>";

?>
<script language="javascript">
	setTimeout('self.location.href="?module=daftarphonebook"'100),
</script>