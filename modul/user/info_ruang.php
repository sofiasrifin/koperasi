<?php
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
include'cek_session.php'; 
include'ses_cekhead.php';

$nama="Info Ruang";
$inbox1=mysql_query("SELECT * FROM inbox where autorespond='0'");
while($t_inbox1=mysql_fetch_array($inbox1))
{

$pieces1 = explode(" ", $t_inbox1[TextDecoded]);
$kunci=mysql_query("SELECT * FROM addin_autorespond where nama='$nama'");
$t_kunci=mysql_fetch_array($kunci);


$str = strtolower($pieces1[0]);
$str1 = strtolower($t_kunci[keyword]);
$str2 = strtolower($pieces1[1]);
$str3 = strtolower($pieces1[2]);

if($str==$str1)
{
$info=mysql_query("SELECT * FROM info_ruang where ruang='$str2 $str3'");
$jum_info=mysql_num_rows($info);
$t_info=mysql_fetch_array($info);
$stringAkhir="$headauto$t_info[ket]$footauto";
	if($jum_info>0)
	{

		$jmlSMS1 = ceil(strlen($stringAkhir)/160);

			if($jmlSMS1==1)
			{
				$query = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) 
				VALUES ('$t_inbox1[SenderNumber]', '$stringAkhir', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
			}
			if($jmlSMS1<>1)
			{
				// menghitung jumlah pecahan
				$jmlSMS = ceil(strlen($stringAkhir)/153);
				
				// memecah pesan asli
				$pecah  = str_split($stringAkhir, 153);
				
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
							VALUES ('$t_inbox1[SenderNumber]', '$udh', '$msg', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')";
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
			$i++;
	}
	if($jum_info==0)
	{
	$isi="Maaf nama ruang $str2 $str3 tidak ada di database kami.";
	$text="$headauto$isi$footauto";
	
	$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
	('0$hp', '$text', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
	}
	$sql1 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
}

}

?>