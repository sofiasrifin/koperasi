<?php
include "inc.koneksi.php";

	 $hp = $_POST['hp'];
	 $isi_pesan = $_POST['isi_pesan'];
	 
	 $masuk = mysql_query("insert into outbox (InsertIntoDB,SendingDateTime,DestinationNumber,TextDecoded,SendingTimeOut,DeliveryReport,CreatorID)
		values (sysdate(),sysdate(),'$hp','$isi_pesan',sysdate(),'yes','system')");
if ($masuk){
	echo "<p>Pesan sedang dikirimkan</p>";
	?>
    	<script language="javascript">
		 setTimeout('self.location.href="?module=daftarphonebook"',1000);
		</script>
    <?php
}
else {
	echo "<p>Pesan gagal dikirim</p>";
	?>
    	<script language="javascript">
		 setTimeout('self.location.href="?module=daftarphonebook"',1000);
		</script>
    <?php
}
?>