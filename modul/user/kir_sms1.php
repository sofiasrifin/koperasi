<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
include'cek_session.php'; 
include'ses_cekhead.php';
$Text=$_POST['Text'];
$grup=$_POST['grup'];
$phoneid=$_POST['phoneid'];
$flash=$_POST['flash'];
$tipe=$_POST['tipe'];
$jam=$_POST['jam'];
$menit=$_POST['menit'];
$ttl=$_POST['ttl'];
?>
<style type="text/css">
<!--
.baca {
	font-family: verdana;
	font-size: 11px;
}

-->
</style>
<?php
$pesan = "$headbiasa$Text$footbiasa";

if($flash==1)
{
	if ($tipe==1)
	{
		echo"<a class='baca'>Pesan anda sedang dikirim ke nomer dibawah ini, silahkan cek di outbox untuk laporan pengirimannya<br></a>";
		$i=1;
		$dta_no=mysql_query("SELECT * FROM data_pelanggan where grup='$grup'");
		while($tmpl_no=mysql_fetch_array($dta_no))
		{
		$hp="$tmpl_no[no_hp]";
		$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
		$t_nam=mysql_fetch_array($nam);
		echo"<a class='baca'>$i. $t_nam[nama]<br></a>";

		// pesan asli
		$jmlSMS1 = ceil(strlen($pesan)/160);

			if($jmlSMS1==1)
			{
				$query = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID, Class) 
				VALUES ('0$hp', '$pesan', '$newID', 'true', '$phoneid', 'Gammu', '0')");
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
							VALUES ('0$hp', '$udh', '$msg', '$newID', 'true', '$phoneid', 'Gammu', '0')";
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

	if ($tipe==0)
	{
		$no=mysql_query("SELECT id from laporan order by id desc");
		$t_no=mysql_fetch_array($no);
		$j_no=mysql_num_rows($no);
		if($j_no==0)
		{
		$id=0+1;
		}
		if($j_no<>0)
		{
		$id=$t_no[id]+1;
		}
		$jam_menit="$jam:$menit";
		$lap=mysql_query("INSERT INTO laporan (id,tgl,grupnama,isi_sms,status) VALUES ('$id','$ttl $jam_menit','$grup','$Text','Belum Terkirim')");

		echo"<a class='baca'>Pesan anda akan dikirim pada saat yang dijadwalkan<br></a>";
		$i=1;
		$dta_no=mysql_query("SELECT * FROM data_pelanggan where grup='$grup'");
		while($tmpl_no=mysql_fetch_array($dta_no))
		{
			$hp="$tmpl_no[no_hp]";
			$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
			$t_nam=mysql_fetch_array($nam);
			echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
			$query = mysql_query("INSERT INTO schedule (id,no_hp, isi_pesan, tgl, jam_menit, Class, SenderID) VALUES ('','0$hp', '$pesan', '$ttl', '$jam_menit','0','$phoneid')");
			$i++;
		}
	}
}


if($flash<>1)
{
	if ($tipe==1)
	{
		echo"<a class='baca'>Pesan anda sedang dikirim ke nomer dibawah ini, silahkan cek di outbox untuk laporan pengirimannya<br></a>";
		$i=1;
		$dta_no=mysql_query("SELECT * FROM data_pelanggan where grup='$grup'");
		while($tmpl_no=mysql_fetch_array($dta_no))
		{
		$hp="$tmpl_no[no_hp]";
		$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
		$t_nam=mysql_fetch_array($nam);
		echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
		// pesan asli
		$jmlSMS1 = ceil(strlen($pesan)/160);

			if($jmlSMS1==1)
			{
				$query = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) 
				VALUES ('0$hp', '$pesan', '$newID', 'true', '$phoneid', 'Gammu')");
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
							VALUES ('0$hp', '$udh', '$msg', '$newID', 'true', '$phoneid', 'Gammu')";
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

	if ($tipe==0)
	{
		$no=mysql_query("SELECT id from laporan order by id desc");
		$t_no=mysql_fetch_array($no);
		$j_no=mysql_num_rows($no);
		if($j_no==0)
		{
		$id=0+1;
		}
		if($j_no<>0)
		{
		$id=$t_no[id]+1;
		}
		$jam_menit="$jam:$menit";
		
		$lap=mysql_query("INSERT INTO laporan (id,tgl,grupnama,isi_sms,status) VALUES ('$id','$ttl $jam_menit','$grup','$Text','Belum Terkirim')");

		echo"<a class='baca'>Pesan anda akan dikirim pada saat yang dijadwalkan<br></a>";
		$i=1;
		$dta_no=mysql_query("SELECT * FROM data_pelanggan where grup='$grup'");
		while($tmpl_no=mysql_fetch_array($dta_no))
		{
			$hp="$tmpl_no[no_hp]";
			$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
			$t_nam=mysql_fetch_array($nam);
			echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
			$query = mysql_query("INSERT INTO schedule (id,no_hp, isi_pesan, tgl, jam_menit, SenderID) VALUES ('','0$hp', '$pesan', '$ttl',
			 '$jam_menit','$phoneid')");
			$i++;
		}
	}
}
?>