<?php

// melakukan koneksi ke mysql
include "inc.koneksi.php";

// setting time zone
date_default_timezone_set("Asia/Jakarta");

// membaca tanggal dan waktu sekarang berdasarkan Time Zone
$sekarang = date("Y-m-d H:i:s", mktime(date("H")+0, date("i"), date("s"), date("m"), date("d"), date("Y")));


// query untuk mencari sms yang memiliki scheduled saat sekarang atau sebelumnya
// dan berstatus 0 (belum terkirim)

$query = "SELECT * FROM sms_auto WHERE schedule <= '$sekarang' AND status = '0'";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
   // membaca ID dari SMS
   $id = $data['id'];
   // membaca isi SMS
   $sms = $data['sms'];
   
   // query untuk mencari seluruh data phonebook dari tabel 'pbk'
   $query2 = "SELECT * FROM pbk";
   $hasil2 = mysql_query($query2);
   while ($data2 = mysql_fetch_array($hasil2))
   {
      // membaca nomor hp dari phonebook
      $no = $data2['number'];
	  
	  // lakukan pengiriman sms pada nomor hp
	  $query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, SenderID, CreatorID) VALUES ('$no', '$sms', 'MyPhone1', 'Gammu 1.25.0')";
	  mysql_query($query3);
   }
   
   // update status sms menjadi 1 (sudah terkirim)
   $query2 = "UPDATE sms_auto SET status = '1' WHERE id = '$id'";
   mysql_query($query2);
}

?>