<?php
// database //
include'../include/db.php'; 
include'../include/conf.php'; 

//cek filternohp
$peng=mysql_query("SELECT * FROM pengaturan where id='2'");
$tpeng=mysql_fetch_array($peng);
if($tpeng[aktif]=='1')
{
$addin=mysql_query("SELECT * FROM addin_autorespond where aktif='1'");
while($t_addin=mysql_fetch_array($addin))
{
include"$t_addin[link_addin]";
}
$filt=mysql_query("SEL
// autorespond //
$inbox=mysql_query("SELECT * FROM inbox where autorespond='0'");
while($t_inbox=mysql_fetch_array($inbox))
{
$pieces = explode(" ", $t_inbox[TextDecoded]);
$kunci=strtolower($pieces[0]);
$autorespond=mysql_query("SELECT * FROM autorespond where aktif='1' and kunci='$kunci'");
$t_autorespond=mysql_fetch_array($autorespond);
$j_auto=mysql_num_rows($autorespond);
if($j_auto==0)
{
}
if($j_auto<>0)
{


		// pesan asli
		$pesan = "$t_autorespond[isi_sms]";
		$jmlSMS1 = ceil(strlen($pesan)/160);

		if($jmlSMS1==1)
		{
				$query = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, CreatorID) VALUES 
				('$t_inbox[SenderNumber]', '$pesan', '$newID', 'true', 'Gammu')");
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
   						$query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID)
          				VALUES ('$t_inbox[SenderNumber]', '$udh', '$msg', '$newID', 'true', 'Gammu')";
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



$sql = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox[ID]'");

}
}


}

// menjalankan SMS jadwal //
$ttl=date("j-n-Y");
$jam=date("H:i");
$jdw=mysql_query("SELECT * FROM schedule where tgl='$ttl'");
while($tm_jdw=mysql_fetch_array($jdw))
{
	if($jam==$tm_jdw[jam_menit])
	{
	$pesan=$tm_jdw[isi_pesan];
	$jmlSMS1 = ceil(strlen($pesan)/160);
		if($jmlSMS1==1)
		{
		$query_schedule = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, CreatorID, Class) 
		VALUES ('$tm_jdw[no_hp]', '$tm_jdw[isi_pesan]', '$newID', 'true', 'Gammu','$tm_jdw[Class]')");
		$query_del=mysql_query("delete from schedule where id='$tm_jdw[id]'");
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
      		$query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID, Class)
            VALUES ('$tm_jdw[no_hp]', '$udh', '$msg', '$newID', 'true', 'Gammu','$tm_jdw[Class]')";
   			}
   		else
   			{
      		// jika bukan merupakan pecahan pertama, simpan ke tabel OUTBOX_MULTIPART
      		$query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
            VALUES ('$udh', '$msg', '$newID', '$i')";
   			}

   	// jalankan query
   	mysql_query($query);
	$query_del=mysql_query("delete from schedule where id='$tm_jdw[id]'");
	}
}
}
}

// Menjalankan cek sms yang gagal dan dikirim kembali //
$sentitem=mysql_query("select DestinationNumber,TextDecoded,ID,Status from sentitems");
while($tmp_sent=mysql_fetch_array($sentitem))
{
	$status=$tmp_sent[Status];
	if($status=='SendingError' or $status=='DeliveryFailed')
	{
	$stat_schedule = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, CreatorID) 
	VALUES ('$tmp_sent[DestinationNumber]', '$tmp_sent[TextDecoded]', '$newID', 'true', 'Gammu')");
	$stat_del=mysql_query("delete from sentitems where id='$tmp_sent[ID]'");
	}
}




?>

<script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript" src="stayontop.js"></script>
<script type="text/javascript">

alwaysOnTop.init({
	targetid: 'examplediv',
	orientation: 3,
	position: [35, 100],
	fadeduration: [1000, 1000],
	frequency: 0.95,
	hideafter: 15000
})

</script>
<style type="text/css">
<!--
#bro {
	position:absolute;
	left:10px;
	top:375px;
	width:0px;
	height:0;
	z-index:1;
	overflow: hidden;
}
.isi {
	font-family: verdana;
	font-size: 11px;
	text-decoration: none;
	color: #000000;
}
.hp {
	font-family: arial;
	font-size: 11px;
	color: #000000;

}
.style1 {
	color: #0066FF;
	font-weight: bold;
	line-height: 18px;
}
.close {	font-family: verdana;
	font-size: 9px;
	text-decoration: none;
	color: #000000;
	text-align: right;
}
#examplediv {
	border-radius: 8px;
	border: 1px solid #BCEBE9;
}
-->
</style>

</head>

<body>
<?
$tglbln=date("d-M");
$thn=date("Y");

$out=mysql_query("SELECT ID,process from sentitems where process='0' limit 100");
while($j_out=mysql_fetch_array($out))
{	
	$cektgl=mysql_query("SELECT tglbulan,outbox from grafik where tglbulan='$tglbln' and tahun='$thn'");
	$j_cektgl=mysql_num_rows($cektgl);
	$t_cektgl=mysql_fetch_array($cektgl);
	if($j_cektgl==1)
	{
	$hsl=$t_cektgl[outbox]+1;
	$upd=mysql_query("UPDATE grafik SET outbox='$hsl' WHERE tglbulan='$tglbln' and tahun='$thn'");
	$updout=mysql_query("UPDATE sentitems SET process='1' WHERE ID='$j_out[ID]'");
	}
	if($j_cektgl==0)
	{
	$ins=mysql_query("INSERT INTO grafik SET id='',tglbulan='$tglbln',tahun='$thn',outbox='1'");
	$updout=mysql_query("UPDATE sentitems SET process='1' WHERE ID='$j_out[ID]'");
	}
}

$in=mysql_query("SELECT ID,process from inbox where process='0' limit 100");
while($j_in=mysql_fetch_array($in))
{	
	$cektgl1=mysql_query("SELECT tglbulan,inbox from grafik where tglbulan='$tglbln' and tahun='$thn'");
	$j_cektgl1=mysql_num_rows($cektgl1);
	$t_cektgl1=mysql_fetch_array($cektgl1);
	if($j_cektgl1==1)
	{
	$hsl1=$t_cektgl1[inbox]+1;
	$upd1=mysql_query("UPDATE grafik SET inbox='$hsl1' WHERE tglbulan='$tglbln' and tahun='$thn'");
	$updout1=mysql_query("UPDATE inbox SET process='1' WHERE ID='$j_in[ID]'");
	}
	if($j_cektgl1==0)
	{
	$ins1=mysql_query("INSERT INTO grafik SET id='',tglbulan='$tglbln',tahun='$thn',inbox='1'");
	$updout1=mysql_query("UPDATE inbox SET process='1' WHERE ID='$j_in[ID]'");
	}
}


$hpatas=mysql_query("select * from inbox where notification='1' limit 2");
$jumhp=mysql_num_rows($hpatas);
$seting=mysql_query("select sound from seting");
$hasil_seting=mysql_fetch_array($seting);
if ($jumhp>='1')
{
?>
<div id="examplediv" style="width:250px; padding: 5px; background: #E3EFF2"><a class="isi"><span class="style1">
<? 
echo"Pesan baru masuk"; 
?>
</span><br />
<?
while($row10=mysql_fetch_array($hpatas))
{
$string=$row10[SenderNumber];
$ok=$string{0};  
if ($ok=='+')
{
$hp=substr($row10[SenderNumber], 3);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$hp");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
if ($hasil==1)
{
echo "<a class='hp'><b>$tampilkan[nama]</b> $row10[TextDecoded]</a><p>";
}
if ($hasil==0)
{
echo "<a class='hp'><b>$row10[SenderNumber]</b> $row10[TextDecoded]</a><p>";
}

}
else
{
echo "<a class='hp'><b>$row10[SenderNumber]</b> $row10[TextDecoded]</a><p>";
}
$up=mysql_query("update inbox set notification='0' where ID='$row10[ID]'");

}
	?>
</a></div>

<?
if ($hasil_seting[sound]==1)
{
$sound=mysql_query("SELECT * FROM sound where aktif='1'");
$t_sound=mysql_fetch_array($sound);
?>
<div id="bro">
<audio controls="controls" autoplay="autoplay">
  <source src="sound_sms/<?=$t_sound[nama_file];?>" type="audio/mpeg" />
<embed src="sound_sms/<?=$t_sound[nama_file];?>" />
</audio>
</div>
<? 
}
} ?> 
