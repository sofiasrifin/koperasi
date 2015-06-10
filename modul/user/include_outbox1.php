<?php
include'../include/conf.php'; 
include'../include/db.php';
?>
<link rel="stylesheet" href="windowfiles/dhtmlwindow.css" type="text/css" />

<script type="text/javascript" src="windowfiles/dhtmlwindow.js">

/***********************************************
* DHTML Window Widget- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<link rel="stylesheet" href="modalfiles/modal.css" type="text/css" />
<script type="text/javascript" src="modalfiles/modal.js"></script>
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">

<script type="text/javascript">


function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<script type="text/javascript" src="jquery.min.js"></script>

<script src="html5notepad.js"></script>
<body onLoad="MM_preloadImages('images/deleteall_over.gif')"><form action="del.php" method="post" name="tambah" id="tambah">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <!--DWLayoutTable-->
    <tr>
      <td height="41" valign="middle"><a onload="MM_preloadImages('images/delete_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hapus','','images/delete_over.gif',1)">
        <input name="Submit" type="image" value="Submit" src="images/delete.gif" name="hapus" width="70" height="25" border="0" id="hapus" onclick="return confirm('Apakah anda yakin akan menghapus SMS ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')">
      </a><img src="images/garis.gif" /> <a href="del.php?id=delete_all1" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image34','','images/deleteall_over.gif',1)"><img src="images/deleteall.gif" name="Image34" width="100" height="25" border="0" id="Image34" onClick="return confirm('Apakah anda yakin akan menghapus semua SMS terkirim ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')" /></a></td>
    </tr>
    <tr>
      <td height="26"><?php
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];
$jcon = mysql_query("SELECT * FROM jumlah_konten");
$tcon=mysql_fetch_array($jcon);

$sql2 = "SELECT * FROM outbox ORDER BY ID DESC LIMIT $tcon[outbox]";
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
    <th  width='4%' align='left'></th>
    <th  width='4%' align='left'></th>
    <th width='20%' align='left'>No Tujuan</th>
    <th width='45%' align='left'>Isi Pesan</th>
    <th width='20%' align='left'>Waktu Pengiriman</th>
    <th width='10%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{
$hp1=substr($row2[DestinationNumber], 1);
$hp=substr($row2[DestinationNumber], 0);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp='$hp'");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
echo "<tr class='row0'>
    <td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[ID]'></a></td>";  
$gbr=mysql_query("SELECT * FROM modem where nama='$row2[SenderID]'");
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
			   
if ($hasil>=1)
{
echo "<td class='baca1' align='left'><a href='#' alt='$row2[DestinationNumber]'>$tampilkan[nama]</a></td>";
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row2[DestinationNumber]</td>";
}

echo"<td class='baca1' align='left'>$row2[TextDecoded]</td>
<td class='baca1' align='left'>$row2[SendingDateTime]</td>
";
echo"<td class='baca1' align='left'>";
?>
<a href="#<?php echo $hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ok.php?no_hp=<?php echo $hp1;?>', 'Balas SMS', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')">

<?php echo"<img src='images/reply.png' border='0'></a>&nbsp;</td>";
	
echo"</td>

  </tr>
";
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
    <th  width='4%' align='left'></th>
    <th width='20%' align='left'>No Tujuan</th>
    <th width='45%' align='left'>Isi Pesan</th>
    <th width='20%' align='left'>Waktu Pengiriman</th>


  </tr>";

echo "<tr class='row0'>
    <td class='normal' align='left'></td>
	";    
echo "<td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
  </tr></table>
";
}
?> <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)">
          <input name="id" type="hidden" id="id" value="outbox1" />
        </a></td>
    </tr>
  </table>
</form>
