<?php
include "inc.koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';

// membaca file excel yang diimport
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// inisial counter untuk jumlah data yang sukses dan yang gagal diimport
$countsukses = 0;
$countgagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data nama
  $nama = $data->val($i, 1);
  
  // membaca data no. telp
  $telp = $data->val($i, 2);
  
  if (substr($telp, 0, 1) == '0')
  {
	$telp[0] = "X";
	$telp = str_replace("X", "+62", $telp);
  }
  else $telp = $telp;
    
  // membaca data alamat
  $alamat = $data->val($i, 3);
  
  // membaca data group
  $group = str_replace(" ", "", $data->val($i, 4));
  
  // membaca data tanggal join
  $tanggal = $data->val($i, 5);
  
  // membaca data tanggal lahir
  $tgllhr = $data->val($i, 6);  

  $splittgl = explode('-', $tgllhr);
  if (count($splittgl) == 3) $tgllhr = $splittgl[2]."-".$splittgl[1]."-".$splittgl[0]; 
  else $tgllhr = "0000-00-00";   
  
  // insert data nama dan telp ke tabel sms_phonebook
  $query = "INSERT INTO sms_phonebook VALUES('$telp', '$nama', '$alamat', '$group', '$tanggal', '$tgllhr')";
  $hasil = mysql_query($query);
  
  $query = "SELECT id FROM sms_autoresponder WHERE idgroup = '$group'";
  $hasil = mysql_query($query);
  while ($dataku = mysql_fetch_array($hasil))
  {
      $idpesan = $dataku['id'];
      $query2 = "INSERT INTO sms_autolist VALUES ('$telp', '$idpesan', '0')";
      mysql_query($query2);
  }
  
  // menghitung jumlah data sukses dan gagal ketika import
  if ($hasil) $countsukses++;
  else $countgagal++;  
}

// menampilkan jumlah data yang sukses dan gagal ketika import
echo "<p>&nbsp</p>";
echo "<h3>Proses import data selesai.</h3>";
echo "<p>&nbsp</p>";
echo "<p>Jumlah data yang sukses diimport : ".$countsukses."<br>";
echo "Jumlah data yang gagal diimport : ".$countgagal."</p>";
?>