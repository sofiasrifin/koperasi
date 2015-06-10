<?php
include'../include/conf.php'; 
include'../include/db.php'; 

$mod = mysql_query("SELECT * FROM modem ORDER BY Id DESC");
$tmod=mysql_fetch_array($mod);
?>	
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <!--DWLayoutTable-->
    <tr>
      <td height="41" valign="middle">
	
<form action="../tmodem_step1.php" method="get"><input name="" type="image" src="images/modem.gif">
<input name="nomodem" type="hidden" value="<?php echo $tmod[Id];?>">

</form>

</td>
      <td align="right" valign="middle"><a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)"> </a></td>
    </tr>
    <tr>
      <td height="26" colspan="2">

<?php
/* PagingWeb.php */
/* PagingWeb.php */
$sql2 = "SELECT * FROM modem ORDER BY Id ASC";
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
    <th  width='1%' align='left'>No</th>
    <th width='25%' align='left'>Nama Modem</th>
    <th width='20%' align='left'>Time Out</th>
    <th width='20%' align='left'>IMEI</th>
    <th width='15%' align='left'>Port</th>
    <th width='20%' align='left'>Status</th>
    <th width='2%' align='left'></th>
    <th width='2%' align='left'></th>
    <th width='2%' align='left'></th>
    <th width='2%' align='left'></th>


  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{
$cmod=mysql_query("SELECT * FROM phones where ID='$row2[nama]'");
$tcmod=mysql_fetch_array($cmod);
if ($tcmod[Signal] >= 1 && $tcmod[Signal] <= 20)
{
$img="images/sinyal4.gif";
}
if ($tcmod[Signal] >= 21 && $tcmod[Signal] <= 40)
{
$img="images/sinyal3.gif";
}
if ($tcmod[Signal] >= 41 && $tcmod[Signal] <= 60)
{
$img="images/sinyal2.gif";
}
if ($tcmod[Signal] >= 61 && $tcmod[Signal] <= 80)
{
$img="images/sinyal1.gif";
}
if ($tcmod[Signal] >= 81 && $tcmod[Signal] <= 100)
{
$img="images/sinyal.gif";
}
if ($tcmod[Signal] <= 0)
{
$img="images/sinyal5.gif";
}
$tglnow=date("Ymd");
$jamnow=date("Hi");
$sub=substr("$tcmod[TimeOut]", 10, 6);
$pieces = explode(" ", $tcmod[TimeOut]);
$tgldb  = "$pieces[0]";
$peng = array("-");
$hatgl   = array("");
$newphrase = str_replace($peng,$hatgl , $tgldb);

$jj=substr("$pieces[1]", 0, 5);

$jamdb  = "$jj";
$peng1 = array(":");
$hatgl1   = array("");
$newphrase1 = str_replace($peng1,$hatgl1 , $jamdb);

if ($tglnow == $newphrase and $jamnow > $newphrase1)
{
$style='warning';
}

else if ($tglnow <> $newphrase)
{
$style='warning';
}

else if ($tcmod[Signal] <= 0)
{
$style='warning';
}
else
{
$style='baca1';
}
echo "<tr class='row0'>
    <td class='$style' align='left'>$row2[Id]</td>
	<td class='$style' align='left'>$row2[nama]</td>
	<td class='$style' align='left'>$tcmod[TimeOut]</td>
	<td class='$style' align='left'>$tcmod[IMEI]</td>
	<td class='$style' align='left'>$row2[port]</td>
	<td class='$style' align='left'>";

include'monitor_service.php';

echo"</td>
	<td class='baca1' align='left'><img src='$img' width='33px' height='15px'></td>

<td class='baca1' align='left'>";
?>

<?php
if($status==0)
{
?>

<a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', '../start_modem.php?id=<?php echo $row2[Id];?>', 'Start Modem', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')" title='Start Modem'><img src="images/start_modem.gif" border="0"></a>
<?php
}
if($status==1)
{
?>
<a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', '../stop_modem.php?id=<?php echo $row2[Id];?>', 'Stop Modem', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')" title='Stop Modem'><img src="images/stop.gif" border="0"></a>
<?php
}
?>


</td>
<?php 
echo"
<td class='baca1' align='left'>
";
?>
<a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', '../diagnosis_modem.php?id=<?php echo $row2[Id];?>', 'Diagnosis Modem', 'width=350px,height=320px,center=1,resize=0,scrolling=0', 'recal')" title='Diagnosis Modem'><img src="images/conf.gif" border="0"></a>

</td>

<?php
echo"<td class='baca1' align='left'>"; 
if($jml2==$row2[Id] and $jml2<>1)
{

?>

<a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', '../del_modem.php?id=<?php echo $row2[Id];?>', 'Hapus Modem', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')" title='Hapus Modem'><img src="images/del_modem.gif" border="0"><?php echo"</a>";
}
echo"</td>
</tr>";
$o++;
}
   

   }
   echo '</table> <br>';
   echo"<a class='baca1'>hal</a>";
   // View link dan periksa halaman aktif
   for ($n=1; $n<=$jmlpage2; $n++) {
      echo ($n != $page2) ?
      " <a class='baca1' href='$flname2?pages=$n'>$n</a> " :
      " <a class='baca1'><b>$n</b></a>";
   }

}
}
if($jml2==0)
{
   echo"<center><table width=100% class='adminlist'>";
   echo "<tr class='baca1'>
    <th  width='1%' align='left'></th>
    <th width='25%' align='left'>Nama ID Modem</th>
    <th width='5%' align='left'></th>


  </tr>";

echo "<tr class='row0'>
    <td class='normal' align='left'></td>
	<td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
  </tr></table>
";
}

?>