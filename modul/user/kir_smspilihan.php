<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
$p_num=$_POST['p_num'];
$Text=$_POST['Text'];
$phoneid=$_POST['phoneid'];
$flash=$_POST['flash'];
$tipe=$_POST['tipe'];
$jam=$_POST['jam'];
$menit=$_POST['menit'];
$ttl=$_POST['ttl'];
include'cek_session.php'; 

include'ses_cekhead.php';
$pesan = "$headbiasa$Text$footbiasa";

if($flash==1)
{
	if ($tipe==1)
	{
		echo"<a class='baca'>Pesan anda sedang dikirim ke nomer dibawah ini, silahkan cek di link laporan pengiriman untuk status SMS<br></a>";
		$pjg_array=count($p_num);
		// pesan asli
		$jmlSMS1 = ceil(strlen($pesan)/160);
		$i=1;
		if($jmlSMS1==1)
		{
			for ($k=0;$k<$pjg_array;$k++)
			{
    			$cnt = $k+1;
				$query = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID, Class) VALUES 
				('$p_num[$k]', '$pesan', '$newID', 'true', '$phoneid', 'Gammu', '0')");
				$hp=substr($p_num[$k], 1);
				$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
				$t_nam=mysql_fetch_array($nam);
				echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
				$i++;
			}
		}
		if($jmlSMS1<>1)
		{					
		$x=1;

			for ($k=0;$k<$pjg_array;$k++)
			{
    			$cnt = $k+1;
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
          				VALUES ('$p_num[$k]', '$udh', '$msg', '$newID', 'true', '$phoneid', 'Gammu','0')";
						$hp=substr($p_num[$k], 1);
						$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
						$t_nam=mysql_fetch_array($nam);
						echo"<a class='baca'>$x. $t_nam[nama]<br></a>";
						$x++;
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
		$i=1;
		echo"<a class='baca'>Pesan anda akan dikirim pada saat yang dijadwalkan $jam_menit<br></a>";
		$pjg_array=count($p_num);
		for ($k=0;$k<$pjg_array;$k++)
		{
			$cnt = $k+1;
			$query = mysql_query("INSERT INTO schedule (id,no_hp, isi_pesan, tgl, jam_menit, Class, SenderID) VALUES ('','$p_num[$k]', '$pesan', '$ttl', '$jam_menit', '0', '$phoneid')");
			$hp=substr($p_num[$k], 1);
			$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
			$t_nam=mysql_fetch_array($nam);
			echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
			$lap=mysql_query("INSERT INTO laporan (id,tgl,grupnama,isi_sms,status) VALUES ('','$ttl $jam_menit','$t_nam[nama]','$Text',
			'Belum Terkirim')");
			$i++;
		}
	}
}

if($flash<>1)
{
	if ($tipe==1)
	{
		echo"<a class='baca'>Pesan anda sedang dikirim ke nomer dibawah ini, silahkan cek di outbox untuk laporan pengirimannya<br></a>";
		$pjg_array=count($p_num);
		// pesan asli
		$jmlSMS1 = ceil(strlen($pesan)/160);
		$i=1;
		if($jmlSMS1==1)
		{
			for ($k=0;$k<$pjg_array;$k++)
			{
				$cnt = $k+1;
				$query = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
				('$p_num[$k]', '$pesan', '$newID', 'true', '$phoneid', 'Gammu')");
				$hp=substr($p_num[$k], 1);
				$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
				$t_nam=mysql_fetch_array($nam);
				echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
				$i++;
			}
		}
		if($jmlSMS1<>1)
		{
		$x=1;
			for ($k=0;$k<$pjg_array;$k++)
			{
				$cnt = $k+1;
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
						VALUES ('$p_num[$k]', '$udh', '$msg', '$newID', 'true', '$phoneid', 'Gammu')";
						$hp=substr($p_num[$k], 1);
						$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
						$t_nam=mysql_fetch_array($nam);
						echo"<a class='baca'>$x. $t_nam[nama]<br></a>";
						$x++;
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
		$i=1;
		echo"<a class='baca'>Pesan anda akan dikirim pada saat yang dijadwalkan lo yaaaa<br></a>";
		$pjg_array=count($p_num);
		for ($k=0;$k<$pjg_array;$k++)
		{
			$cnt = $k+1;
			$query = mysql_query("INSERT INTO schedule (id,no_hp, isi_pesan, tgl, jam_menit, Class, SenderID) VALUES ('','$p_num[$k]', '$pesan', '$ttl', '$jam_menit', '-1', '$phoneid')");
			$hp=substr($p_num[$k], 1);
			$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
			$t_nam=mysql_fetch_array($nam);
			echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
			$lap=mysql_query("INSERT INTO laporan (id,tgl,grupnama,isi_sms,status) VALUES ('','$ttl $jam_menit','$t_nam[nama]','$Text',
			'Belum Terkirim')");
			$i++;
		}
	}
}
?>