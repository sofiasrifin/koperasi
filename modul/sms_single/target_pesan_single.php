<?php
include "inc.koneksi.php";
$hp = $_POST['hp'];
$isi_pesan = $_POST['isi_pesan'];

$masuk = mysql_query("insert into outbox (InsertIntoDB,SendingDateTime,DestinationNumber,TextDecoded,SendingTimeOut,DeliveryReport,CreatorID)
		values (sysdate(),sysdate(),'$hp','$isi_pesan',sysdate(),'yes','system')");
if ($masuk){
	echo "<h4> Pesan Dikirim </h4>";
	echo "<meta http-equiv='refresh' content='1; url=media.php?module=sms_single'>";
}
else {
	echo "<h4> Pesan gagal dikirim </h4>";
	echo "<meta http-equiv='refresh' content='2; url=media.php?module=sms_single'>";
}
?>