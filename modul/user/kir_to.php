<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
include'cek_session.php'; 
$sql=mysql_query("SELECT nama,alamat,email,foto FROM user WHERE user_id='$nama'");
$row=mysql_fetch_array($sql);

$inbox=mysql_query("select * from inbox");
$juminbox=mysql_num_rows($inbox);
$hpunread=mysql_query("select * from inbox where status='unread'");
$jumunread=mysql_num_rows($hpunread);
?>
<html dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=5"><title>SMS Gateway</title><link rel="shortcut icon" href="favicon.ico">
<link href="index1.css" rel="stylesheet" type="text/css">
<link href="index_1.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.style2 {font-size: 11px}
#Layer1 {
	position:absolute;
	left:803px;
	top:42px;
	width:192px;
	height:45px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:10px;
	top:375px;
	width:283px;
	height:114px;
	z-index:1;
}
-->
</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td id="i0272" align="center"><div class="cssWLGradientCommon cssWLGradientIMGSSL" id="GradientDiv"><table style="width: 890px;" cellpadding="0" cellspacing="0"><tbody><tr><td height="128" valign="top" style="height: 50px;"><span class="cssHeaderText" id="i0257"></span><? include'atas.php'; ?></td></tr></tbody></table>
</div><div style="height: 20px;"></div></td></tr><tr><td id="shellTD" align="center"><table style="width: 890px;" id="shellTBL" cellpadding="0" cellspacing="0"><tbody><tr><td><table id="ctTBL" cellpadding="0" cellspacing="0"><tbody><tr>
  <td width="21%" valign="top" id="mainTD"><? include'left.php'; ?>&nbsp;
</td>
  <td width="1%" id="mainTD">&nbsp;</td>
  <td width="2%" valign="top" id="mainTD"><table height="430" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="20" id="separatorTD"><label>&nbsp;</label></td>
      </tr>
    </tbody>
  </table></td>
  <td width="76%" valign="top" id="mainTD">
<?php

if($flash==1)
{
	if ($tipe==1)
	{
		echo"<a class='baca'>Pesan anda sedang dikirim ke nomer dibawah ini, silahkan cek di outbox untuk laporan pengirimannya<br></a>";
		$i=1;
		$pesan = "$Text";
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
		$pesan = "$Text";
		$dta_no=mysql_query("SELECT * FROM data_pelanggan where grup='$grup'");
		while($tmpl_no=mysql_fetch_array($dta_no))
		{
			$hp="$tmpl_no[no_hp]";
			$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
			$t_nam=mysql_fetch_array($nam);
			echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
			$query = mysql_query("INSERT INTO schedule (id,no_hp, isi_pesan, tgl, jam_menit, Class) VALUES ('$id','0$hp', '$pesan', '$ttl', 
			'$jam_menit','0')");
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
		$dta_no=mysql_query("SELECT * FROM nilai_siswa where try_out='$try_out'");
		while($tmpl_no=mysql_fetch_array($dta_no))
		{
		$nam=mysql_query("SELECT * from data_pelanggan where nis='$tmpl_no[nis]'");
		$t_nam=mysql_fetch_array($nam);
		$hp="$t_nam[no_hp]";
		$pesan = "Nilai Try Out ke $try_out NIS $tmpl_no[nis] BIG:$tmpl_no[big], BIN:$tmpl_no[bin], MAT:$tmpl_no[mat], IPA:$tmpl_no[ipa]. $text";
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
		$pesan = "$Text";
		$dta_no=mysql_query("SELECT * FROM data_pelanggan where grup='$grup'");
		while($tmpl_no=mysql_fetch_array($dta_no))
		{
			$hp="$tmpl_no[no_hp]";
			$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
			$t_nam=mysql_fetch_array($nam);
			echo"<a class='baca'>$i. $t_nam[nama]<br></a>";
			$query = mysql_query("INSERT INTO schedule (id,no_hp, isi_pesan, tgl, jam_menit) VALUES ('$id','0$hp', '$pesan', '$ttl',
			 '$jam_menit')");
			$i++;
		}
	}
}
?>&nbsp;</td>
</tr></tbody></table></td></tr><tr></tr><tr><td class="cssFooterPadding" id="footerTD"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td align="left"><table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td style="text-align: left;"><span class="style2" id="ftrCopy">
        <?=$titlebawah;?>
      </span></td>
    </tr>
  </tbody>
</table>
<table cellpadding="0" cellspacing="0">
              <tbody><tr></tr></tbody>
            </table></td>
</tr>
</tbody></table></td></tr></tbody></table></td></tr></tbody></table></body>
</html>
