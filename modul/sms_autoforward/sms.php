<html>
<head>
<!-- refresh script setiap 30 detik -->
<meta http-equiv="refresh" content="10; url=<?php $_SERVER['PHP_SELF']; ?>">
</head>

<body>

<h1>SMS server running....</h1>

<?php

//koneksi ke mysql dan db nya
mysql_connect("localhost", "root", "");
mysql_select_db("kopma_unesa");

// query untuk membaca SMS yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysql_query($query) or die(mysql_error());
while ($data = mysql_fetch_array($hasil))
{
  // membaca ID SMS
  $id = $data['ID'];

  // membaca no pengirim
  $noPengirim = $data['SenderNumber'];

  // membaca pesan SMS dan mengubahnya menjadi kapital
  $msg = strtoupper($data['TextDecoded']);

  // proses parsing 

  // memecah pesan berdasarkan karakter <spasi>
  $pecah = explode(" ", $msg);

  // jika kata terdepan dari SMS adalah 'NILAI' maka cari nilai Kalkulus
  if ($pecah[0] == "NILAI")
  {
     // baca NIM dari pesan SMS
     $nim = $pecah[1];

     // cari nilai kalkulus berdasar NIM
     $query2 = "SELECT nilai FROM nilaikalkulus WHERE nim = '$nim'";
     $hasil2 = mysql_query($query2);

     // cek bila data nilai tidak ditemukan
     if (mysql_num_rows($hasil2) == 0) $reply = "NIM tidak ditemukan";
     else
     {
        // bila nilai ditemukan
        $data2 = mysql_fetch_array($hasil2);
        $nilai = $data2['nilai'];
        $reply = "Nilai Kalkulus Anda: ".$nilai;
     }
  }
  else $reply = "Maaf perintah salah";

  // membuat SMS balasan

  $query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded) VALUES ('$noPengirim', '$reply')";
  $hasil3 = mysql_query($query3);

  // ubah nilai 'processed' menjadi 'true' untuk setiap SMS yang telah diproses

  $query3 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
  $hasil3 = mysql_query($query3);
}
?>

</body>
</html>