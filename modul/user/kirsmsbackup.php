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
include'ses_cekhead.php';
$pesan = "$headbiasa$Text$footbiasa";

if($phoneid=='all')
{
$pjg_array=count($p_num);
$mod=mysql_query("select nama from modem");
$jmod=mysql_num_rows($mod);
$sm=ceil($pjg_array/$jmod);
	for ($j=0;$j<$pjg_array;$j++)
	{		
	echo"$j $pjg_array dan $jmod dan $sm<br>";
	}
}
if($phoneid<>'all')
{

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
		echo"<a class='baca'>Pesan anda akan dikirim pada saat yang dijadwalkan<br></a>";
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
		echo"<a class='baca'>Pesan anda akan dikirim pada saat yang dijadwalkan<br></a>";
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
