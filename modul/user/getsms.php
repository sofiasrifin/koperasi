<?php
include'../include/conf.php'; 
include'../include/db.php'; 
$q1=$_GET['q1'];

/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$jcon = mysql_query("SELECT * FROM jumlah_konten");
$tcon=mysql_fetch_array($jcon);

$sql2 = "SELECT * FROM data_pelanggan WHERE nama like '%$q1%' ORDER BY id DESC LIMIT $tcon[inbox]";
$res2 = mysql_query($sql2);

if ($res2 != null) {
   $jml2 = mysql_num_rows($res2);
   if ($jml2 == 0) {	   
   }

   // Batas baris per halaman
   $batas2 = 150;
   if (($jml2%$batas2) == 0) {
       $jmlpage2 = (int)($jml2/$batas2);
   } else {
       $jmlpage2 = ((int)$jml2/$batas2)+1;
   }
$kel2 = $jml2/5;
if ($kel2==floor($jml2/5)){
	$hal2 = $kel;
} else {
	$hal2 = floor($jml2/5)+1;
}
   // Inisialisasi variabel page
   (isset($_GET['pages'])) ?
   $page2 = (int)$_GET['pages'] : $page2 =1;

   if ($page2 > $jmlpage2)
       $page2=$jmlpage2;

   while ($rows2 = mysql_fetch_array($res2)) {
       $arrdata2[]=$rows2;
   }
   mysql_free_result($res2);

   // Set end dan start page
   $end2  = (int)($page2*$batas2)-1;
   $start2= (int)$end2-($batas2-1);

   if ($end2>$jml2)
       $end2=$jml2-1;

   for ($i2=$start2; $i2<=$end2; $i2++) {
       $arr2[] = $arrdata2[$i2];
   }

if ($jml2<>0)
{
   echo"<center><table width=100% class='adminlist'>";
   echo "<tr class='baca1'>
    <th  width='4%' align='left'>
	";
	?>
	<input name="pilih" onclick="pilihan()" type="checkbox">
	<?php
	echo"</th>
    <th width='1%' align='left'></th>
    <th width='20%' align='left'>Pengirim</th>
    <th width='45%' align='left'>Isi</th>
    <th width='15%' align='left'>Tanggal</th>
    <th width='12%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{

$pel=mysql_query("SELECT * FROM inbox where SenderNumber='+62$row2[no_hp]'");
$hasil=mysql_num_rows($pel);
while($tampilkan=mysql_fetch_array($pel))
{



echo "<tr class='row0'>";

echo"<td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[ID]'></a></td>";  
$gbr=mysql_query("SELECT * FROM modem where nama='$row2[RecipientID]'");
$jgbr=mysql_num_rows($gbr);
$tgbr=mysql_fetch_array($gbr);
if($jgbr==1)
{
echo"<td class='baca1' align='left'> <img src='icon_modem/$tgbr[gambar]' border='0'></td>";   
}
if($jgbr==0)
{
echo"<td class='baca1' align='left'> <img src='icon_modem/default.png' border='0'></td>";   
}
?>
<td class='baca1' align='left'><a name='<?php echo $row2[ID];?>' href='#' alt='<?php echo $row2[SenderNumber];?>'><?php echo $row2[nama];?></a></td>
<?php
echo"<td class='baca1' align='left'>$tampilkan[TextDecoded]</td>
    <td class='baca1' align='left'>$tampilkan[ReceivingDateTime]</td>
	<td class='baca1' align='left'>"; 
	?>
<a href="#<?php echo $row2[ID];?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_group_sms.php?no_hp=<?php echo $row2[no_hp];?>&id_sms=<?php echo $row2[ID];?>&SenderID=<?php echo $tampilkan[RecipientID];?>', 'Pindahkan SMS', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='img/folder.png' border='0'></a>&nbsp;
	
<a href="#<?php echo $row2[ID];?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ok.php?no_hp=<?php echo $row2[no_hp];?>&phoneid=<?php echo $tampilkan[RecipientID];?>', 'Balas SMS', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')">
<?php
echo"<img src='images/reply.png' border='0'></a>&nbsp;";

if ($hasil==0) 
{
?> 
<script type="text/javascript">
agreewin.onclose=function(){ //Define custom code to run when window is closed
	return true //Allow closing of window in both cases
}

</script>

<a href="#<?php echo $row2[no_hp];?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_buku_telepon.php?no_hp=<?php echo $row2[no_hp];?>', 'Tambah Buku Telepon', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='images/plus.gif' border='0'></a>

<?php
}

echo"&nbsp;</td>";
	
echo"</td>";


echo"</tr>";
$o++;
}
   

   }
}
}
}
if($jml2==0)
{
   echo"<center><table width=100% class='adminlist'>";
   echo "<tr>
    <th  width='4%' align='left'></th>
    <th width='20%' align='left'>Pengirim</th>
    <th width='45%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>
    <th width='15%' align='left'></th>


  </tr>";

echo "<tr class='row0'>
    <td class='normal' align='left'></td>
	";    
echo "<td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
  </tr></table>
";
}
?>