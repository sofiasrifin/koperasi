<?php

include'../include/db.php'; 
include'../include/conf.php'; 

// menjalankan SMS jadwal //
$ttl=date("j-n-Y");
$jam=date("H:i");
$jdw=mysql_query("SELECT * FROM schedule where tgl='$ttl'");
while($tm_jdw=mysql_fetch_array($jdw))
{
	if($jam==$tm_jdw[jam_menit])
	{
	$pesan=$tm_jdw[isi_pesan];
	$jmlSMS1 = ceil(strlen($pesan)/160);
		if($jmlSMS1==1)
		{
		$query_schedule = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, CreatorID, Class) 
		VALUES ('$tm_jdw[no_hp]', '$tm_jdw[isi_pesan]', '$newID', 'true', 'Gammu','$tm_jdw[Class]')");
		$query_del=mysql_query("delete from schedule where id='$tm_jdw[id]'");
		}
		if($jmlSMS1<>1)
		{
		// menghitung jumlah pecahan
		$jmlSMS = ceil(strlen($pesan)/153);

		// memecah pesan asli
		$pecah  = str_split($pesan, 153);

		// proses untuk mendapatkan ID record yang akan disisipkan ke tabel OUTBOX
		$query = "SHOW TABLE STATUS LIKE 'outbox'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$newID = $data['Auto_increment'];

		// proses penyimpanan ke tabel mysql untuk setiap pecahan
		for ($i=1; $i<=$jmlSMS; $i++)
		{
   		// membuat UDH untuk setiap pecahan, sesuai urutannya
   		$udh = "050003A7".sprintf("%02s", $jmlSMS).sprintf("%02s", $i);

   		// membaca text setiap pecahan
   		$msg = $pecah[$i-1];

   		if ($i == 1)
   			{
      		// jika merupakan pecahan pertama, maka masukkan ke tabel OUTBOX
      		$query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID, Class)
            VALUES ('$tm_jdw[no_hp]', '$udh', '$msg', '$newID', 'true', 'Gammu','$tm_jdw[Class]')";
   			}
   		else
   			{
      		// jika bukan merupakan pecahan pertama, simpan ke tabel OUTBOX_MULTIPART
      		$query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
            VALUES ('$udh', '$msg', '$newID', '$i')";
   			}

   	// jalankan query
   	mysql_query($query);
	$query_del=mysql_query("delete from schedule where id='$tm_jdw[id]'");
	}
}
}
}

// Menjalankan cek sms yang gagal dan dikirim kembali //
$sentitem=mysql_query("select DestinationNumber,TextDecoded,ID,Status from sentitems");
while($tmp_sent=mysql_fetch_array($sentitem))
{
	$status=$tmp_sent[Status];
	if($status=='SendingError' or $status=='DeliveryFailed')
	{
	$stat_schedule = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, CreatorID) 
	VALUES ('$tmp_sent[DestinationNumber]', '$tmp_sent[TextDecoded]', '$newID', 'true', 'Gammu')");
	$stat_del=mysql_query("delete from sentitems where id='$tmp_sent[ID]'");
	}
}

include'../terbilang.php'; 

?>
