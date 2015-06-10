<?php

include'../include/db.php'; 
include'../include/conf.php'; 

// mencari sms yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
  // baca ID dari SMS
  $id = $data['ID'];
  // membaca isi SMS dan mengubah menjadi huruf kapital
  $sms = strtoupper($data['TextDecoded']);

  // jika isi SMS adalah 'SHUTDOWN'
  if ($sms == "SHUTDOWN" and processed=='false')
  {
     // jalankan perintah shutdown
  exec("shutdown -s -f");
  $query2 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
  mysql_query($query2);
  }
else
{
      $query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID)
                VALUES ('085649921023', '$udh', 'salah mas', '$newID', 'true', 'Gammu')";
}
  // memberi tanda SMS bahwa sudah diproses
}

?>
