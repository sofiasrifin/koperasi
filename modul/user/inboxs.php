<?
include'../include/conf.php'; 
include'../include/db.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
//-->
</script>

<link href="css/user.css" rel="stylesheet" type="text/css" />
<script src="getsms.js"></script>
<script src="getsms1.js"></script>
<script type="text/JavaScript">
<!--
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

<link href="index.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="del.php" method="post" name="tambah" id="tambah">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr>
      <td valign="middle"><a onload="MM_preloadImages('images/delete_over.gif')"> <a onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('hapus','','images/delete_over.gif',1)">
        <input name="Submit" type="image" value="Submit" src="images/delete.gif" name="hapus" width="70" height="25" border="0" id="hapus" onclick="return confirm('Apakah anda yakin akan menghapus SMS ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')">
      </a></td>
      <td height="41" align="right" valign="middle"><a href="compose.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('compose','','images/compose_over.gif',1)">
        <input name="id" type="hidden" id="id" value="inbox" />
        </a>
          <input name="q1" class="baca1" id="q1" onfocus="if(this.value=='tulis nama pengirim disini') this.value='';" onblur="if(this.value=='') this.value='tulis nama pengirim disini';" value="tulis nama pengirim disini" onkeyup="showUser(this.value)" size="25" type="text" maxlength="255"/>
          <input name="q2" class="baca1" id="form" onfocus="if(this.value=='tulis isi sms disini') this.value='';" onblur="if(this.value=='') this.value='tulis isi sms disini';" value="tulis isi sms disini" onkeyup="showUser1(this.value)" size="25" type="text" maxlength="255"/></td>
    </tr>
    <tr>
      <td height="26" colspan="2"><div id="txtHint">
        <?php
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT * FROM inbox ORDER BY ID DESC";
$res2 = mysql_query($sql2);

if ($res2 != null) {
   $jml2 = mysql_num_rows($res2);
   if ($jml2 == 0) {	   
   }

   // Batas baris per halaman
   $batas2 = 10000;
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
    <th width='20%' align='left'>Pengirim</th>
    <th width='45%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>
    <th width='15%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{


echo "<tr class='row0'>
    <td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[ID]'>"; ?>
        <? echo"</a></td>";   
$string=$row2[SenderNumber];
$ok=$string{0};  
if ($ok=='+')
{
$hp=substr($row2[SenderNumber], 3);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$hp");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
if ($hasil==1)
{
echo "<td class='baca1' align='left'><a href='#' alt='$row2[SenderNumber]'>$tampilkan[nama]</a></td>";
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row2[SenderNumber]</td>";
}

}
else
{
echo "<td class='baca1' align='left'>$row2[SenderNumber]</td>";
}

echo"<td class='baca1' align='left'>$row2[TextDecoded]</td>
    <td class='baca1' align='left'>$row2[ReceivingDateTime]</td>
	<td class='baca1' align='left'><a href='balas.php?no_hp=0$hp&isi=$row2[TextDecoded]'><img src='images/reply.png' border='0'></a>&nbsp;";
?>
        <?	if ($hasil==0) { echo"<a href='inbox.php?no_hp=$hp&jeneng=$tampilkan[nama]&id=phonebook'><img src='images/plus.gif' border='0'></a>"; 
}

echo"&nbsp;</td>";
	
echo"</td>

  </tr>
";
$o++;
}
   

   }
   echo '</table> <br>';
}
}
if($jml2==0)
{
   echo"<center><table width=100% class='adminlist'>";
   echo "<tr>
    <th  width='4%' align='left'></th>
    <th width='25%' align='left'>Pengirim</th>
    <th width='35%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>


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
        <a href="compose.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('compose','','images/compose_over.gif',1)"></a></div></td>
    </tr>
  </table>
</form>
</body>
</html>
