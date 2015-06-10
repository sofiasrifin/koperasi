<?php
// database //
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
include'cek_session.php'; 
include'ses_cekhead.php';

$nama="Autoforward";
$inbox1=mysql_query("SELECT * FROM inbox where autorespond='0'");
while($t_inbox1=mysql_fetch_array($inbox1))
{

$pieces1 = explode(" ", $t_inbox1[TextDecoded]);
$kunci=mysql_query("SELECT * FROM addin_autorespond where nama='$nama'");
$t_kunci=mysql_fetch_array($kunci);


$str = strtolower($pieces1[0]);
$str1 = strtolower($t_kunci[keyword]);
$str2 = strtolower($pieces1[1]);

if($str==$str1)
{
$hp=substr($t_inbox1[SenderNumber], 3);
$grup=mysql_query("SELECT * FROM grup_autoforward where nama_grup='$str2'");
$jum_grup=mysql_num_rows($grup);

	if($jum_grup>0)
	{
		$allow=mysql_query("SELECT no_hp from nohp_autoforward where no_hp='0$hp'");	
		$j_allow=mysql_num_rows($allow);
		if($j_allow==1)
		{
		$dta_no=mysql_query("SELECT * FROM grup_autoforward where nama_grup='$str2'");
		$stringAwal = "$t_inbox1[TextDecoded]";
		$stringAkhir = str_replace("$pieces1[0] $pieces1[1] ", "", $stringAwal);
		$pesan="$headauto$stringAkhir$footauto";
		while($tmpl_no=mysql_fetch_array($dta_no))
		{
		// pesan asli
		$jmlSMS1 = ceil(strlen($pesan)/160);
			if($jmlSMS1==1)
			{
				$query = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, MultiPart, SenderID, CreatorID) 
				VALUES ('$tmpl_no[no_hp]', '$pesan', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
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
							VALUES ('0$hp1', '$udh', '$msg', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')";
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
		}
		if($j_allow==0)
		{
		}
	}
	if($jum_grup==0)
	{
	$text3="Maaf grup dengan nama $str2 tidak ada di database. Silahkan dibuat terlebih dahulu";
	$pesan1="$headauto$text3$footauto";
	$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
	('0$hp', '$pesan1', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
	}
	$sql1 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
}

}

?>