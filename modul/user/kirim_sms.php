<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
$no_hp=$_POST['no_hp'];
$Text=$_POST['Text'];
$phoneid=$_POST['phoneid'];
include'cek_session.php'; 
include'ses_cekhead.php';
$pesan = "$headbiasa$Text$footbiasa";

		// pesan asli
		$jmlSMS1 = ceil(strlen($pesan)/160);

		if($jmlSMS1==1)
		{
				$query = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
				('$no_hp', '$pesan', '', 'true', '$phoneid', 'Gammu')");
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
   						$query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, SenderID, CreatorID)
          				VALUES ('$no_hp', '$udh', '$msg', '$newID', 'true', '$phoneid', 'Gammu')";
					}
					else
   					{
						// jika bukan merupakan pecahan pertama, simpan ke tabel OUTBOX_MULTIPART
						$query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
						VALUES ('$udh', '$msg', '$newID', '$i')";
   					}

   					// jalankan query
   					mysql_query($query);
   				}
				
			}
?>