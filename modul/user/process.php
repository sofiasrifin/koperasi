<?php
// menggunakan class phpExcelReader
session_start();
error_reporting(0);
$id=$_POST['id'];

include "excel_reader.php";
include'../include/conf.php'; 
include'../include/db.php';
include'cek_session.php'; 

if($id=='include_isi')
{

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data no_hp (kolom ke-1)
  $no_hp = $data->val($i, 1);
  // membaca data isi_sms (kolom ke-2)
  $isi = $data->val($i, 2);

   $query = "INSERT INTO importxl (no_hp, isi_pesan) VALUES ('$no_hp', '$isi')";
	$hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal
echo "<h3>Proses pengiriman selesai.</h3>";
echo "<p>Jumlah data yang sukses di kirim : ".$sukses."<br>";
echo "Jumlah data yang gagal di kirim : ".$gagal."</p>";



// menjalankan kirim sms dari excel //
$jdw=mysql_query("SELECT * FROM importxl");
while($tm_jdw=mysql_fetch_array($jdw))
{
	echo"$tm_jdw[no_hp]<br>";
	$pesan=$tm_jdw[isi_pesan];
	$jmlSMS1 = ceil(strlen($pesan)/160);
		if($jmlSMS1==1)
		{
		$query_schedule = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID, Class) 
		VALUES ('$tm_jdw[no_hp]', '$tm_jdw[isi_pesan]', '$newID', 'true', '$phoneid', 'Gammu','$tm_jdw[Class]')");
		$query_del=mysql_query("delete from importxl where id='$tm_jdw[id]'");
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
      		$query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, SenderID, CreatorID, Class)
            VALUES ('$tm_jdw[no_hp]', '$udh', '$msg', '$newID', 'true', '$phoneid', 'Gammu','$tm_jdw[Class]')";
   			}
   		else
   			{
      		// jika bukan merupakan pecahan pertama, simpan ke tabel OUTBOX_MULTIPART
      		$query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
            VALUES ('$udh', '$msg', '$newID', '$i')";
   			}

   	// jalankan query
   	mysql_query($query);
	$query_del=mysql_query("delete from importxl where id='$tm_jdw[id]'");
	}
}
}
}




if($id=='import_nohp')
{
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  $nama = $data->val($i, 1);
  $no_hp= $data->val($i, 2);
  $alamat= $data->val($i, 3);
  $grup= $data->val($i, 4);

  $query = "INSERT INTO data_pelanggan (id, nama, no_hp, alamat, grup) VALUES ('', '$nama', '$no_hp', '$alamat', '$grup')";
  $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal
echo "<h3>Proses pengiriman selesai.</h3>";
echo "<p>Jumlah data yang sukses di kirim : ".$sukses."<br>";
echo "Jumlah data yang gagal di kirim : ".$gagal."</p>";
}



if($id=='tulis_isi')
{

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data no_hp (kolom ke-1)
  $no_hp = $data->val($i, 1);

   $query = "INSERT INTO importxl (no_hp, isi_pesan) VALUES ('$no_hp', '$isi')";
	$hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal
echo "<h3>Proses pengiriman selesai.</h3>";
echo "<p>Jumlah data yang sukses di kirim : ".$sukses."<br>";
echo "Jumlah data yang gagal di kirim : ".$gagal."</p>";



// menjalankan kirim sms dari excel //
$jdw=mysql_query("SELECT * FROM importxl");
while($tm_jdw=mysql_fetch_array($jdw))
{
	echo"$tm_jdw[no_hp]<br>";
	$pesan="$headbiasa$tm_jdw[isi_pesan]$footbiasa";
	$jmlSMS1 = ceil(strlen($pesan)/160);
		if($jmlSMS1==1)
		{
		$query_schedule = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID, Class) 
		VALUES ('$tm_jdw[no_hp]', '$tm_jdw[isi_pesan]', '$newID', 'true', '$phoneid', 'Gammu','$tm_jdw[Class]')");
		$query_del=mysql_query("delete from importxl where id='$tm_jdw[id]'");
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
      		$query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, SenderID, CreatorID, Class)
            VALUES ('$tm_jdw[no_hp]', '$udh', '$msg', '$newID', 'true', '$phoneid', 'Gammu','$tm_jdw[Class]')";
   			}
   		else
   			{
      		// jika bukan merupakan pecahan pertama, simpan ke tabel OUTBOX_MULTIPART
      		$query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
            VALUES ('$udh', '$msg', '$newID', '$i')";
   			}

   	// jalankan query
   	mysql_query($query);
	$query_del=mysql_query("delete from importxl where id='$tm_jdw[id]'");
	}
}
}
}


?>