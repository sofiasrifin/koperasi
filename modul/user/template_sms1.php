<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
include'cek_session.php'; 
$sql=mysql_query("SELECT nama,alamat,email,foto FROM user WHERE user_id='$nama'");
$row=mysql_fetch_array($sql);
?>

<html>
<head>
<meta name="keywords" content="<?=keyword?>">
<meta name="title" content="<?=$title?>">
<meta name="description" content="<?=$description?>">
<meta name="author" content="<?=$author?>">
<meta http-equiv="revisit-after" content="<?=$days?>" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$titleatas?></title>
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
<script>
function stoperror(){
return true
}
window.onerror=stoperror
</script>
<script type="text/javascript">
var offsetfromcursorX=12 //Customize x offset of tooltip
var offsetfromcursorY=10 //Customize y offset of tooltip

var offsetdivfrompointerX=10 //Customize x offset of tooltip DIV relative to pointer image
var offsetdivfrompointerY=14 //Customize y offset of tooltip DIV relative to pointer image

document.write('<div id="dhtmltooltip"></div>') //write out tooltip DIV
document.write('<img id="dhtmlpointer" src="images/arrow.gif">') //write out pointer image

var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

var pointerobj=document.all? document.all["dhtmlpointer"] : document.getElementById? document.getElementById("dhtmlpointer") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thewidth, thecolor){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var nondefaultpos=false
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var winwidth=ie&&!window.opera? ietruebody().clientWidth : window.innerWidth-20
var winheight=ie&&!window.opera? ietruebody().clientHeight : window.innerHeight-20

var rightedge=ie&&!window.opera? winwidth-event.clientX-offsetfromcursorX : winwidth-e.clientX-offsetfromcursorX
var bottomedge=ie&&!window.opera? winheight-event.clientY-offsetfromcursorY : winheight-e.clientY-offsetfromcursorY

var leftedge=(offsetfromcursorX<0)? offsetfromcursorX*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth){
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=curX-tipobj.offsetWidth+"px"
nondefaultpos=true
}
else if (curX<leftedge)
tipobj.style.left="5px"
else{
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetfromcursorX-offsetdivfrompointerX+"px"
pointerobj.style.left=curX+offsetfromcursorX+"px"
}

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight){
tipobj.style.top=curY-tipobj.offsetHeight-offsetfromcursorY+"px"
nondefaultpos=true
}
else{
tipobj.style.top=curY+offsetfromcursorY+offsetdivfrompointerY+"px"
pointerobj.style.top=curY+offsetfromcursorY+"px"
}
tipobj.style.visibility="visible"
if (!nondefaultpos)
pointerobj.style.visibility="visible"
else
pointerobj.style.visibility="hidden"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
pointerobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>

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
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/tambah_artikel_over.gif')">
<!-- ImageReady Slices (Untitled-1) -->
<table width="860" height="701" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td colspan="10">
			<img src="test/images/lptm_01.gif" width="859" height="88" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="88" alt=""></td>
	</tr>
	<tr>
		<td rowspan="11">
			<img src="test/images/lptm_02.gif" width="47" height="612" alt=""></td>
		<td>
			<img src="test/images/lptm_03.gif" width="40" height="20" alt=""></td>
		<td rowspan="4" bgcolor="#ECECEC"><? 
				echo" <img src='$row[foto]' width='118px' height='140px'>";
				?></td>
		<td rowspan="5">
			<img src="test/images/lptm_05.gif" width="19" height="169" alt=""></td>
		<td colspan="2" rowspan="2" bgcolor="#ECECEC"><? 
				echo" <a class='baca'><b>$row[nama]</b><br>$row[alamat]<br><i>$row[email]</i>";
				?></td>
		<td colspan="2" rowspan="3">
			<img src="test/images/lptm_07.gif" width="386" height="119" alt=""></td>
		<td rowspan="8" background="test/images/lptm_08.gif">&nbsp;</td>
		<td rowspan="11">
			<img src="test/images/lptm_09.gif" width="32" height="612" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="20" alt=""></td>
	</tr>
	<tr>
		<td rowspan="4">
			<img src="test/images/lptm_10.gif" width="40" height="149" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="39" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="test/images/lptm_11.gif" width="193" height="60" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="60" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2" background="test/images/lptm_12.gif">&nbsp;</td>
		<td colspan="2" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
		<td rowspan="5" bgcolor="#FFFFFF">&nbsp;</td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="21" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="test/images/lptm_15.gif" width="118" height="29" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="29" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3" background="test/images/lptm_16.gif">&nbsp;</td>
		<td colspan="5" rowspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="2%" background="images/ground.gif">&nbsp;</td>
            <td width="21%" valign="top" background="images/ground.gif"><? include'kiri.php'; ?></td>
            <td width="5%">&nbsp;</td>
            <td width="71%" valign="top" bgcolor="#FFFFFF"><form action="del.php" method="post" name="tambah" id="tambah">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <!--DWLayoutTable-->
                <tr>
                  <td height="41" valign="middle"><a onload="MM_preloadImages('images/delete_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hapus','','images/delete_over.gif',1)">
                    <input name="Submit" type="image" value="Submit" src="images/delete.gif" name="hapus" width="70" height="25" border="0" id="hapus" onclick="return confirm('Apakah anda yakin akan menghapus Template SMS ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')">
                    </a> <img src="images/garis.gif"> <a href="tambah_buku.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('produk','','images/tambah_template_over.gif',1)"><img src="images/tambah_template.gif" name="produk" width="120" height="25" border="0"></a></td>
                </tr>
                <tr>
                  <td height="26"><?php
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT * FROM template_sms ORDER BY id DESC";
$res2 = mysql_query($sql2);

if ($res2 != null) {
   $jml2 = mysql_num_rows($res2);
   if ($jml2 == 0) {	   
   }

   // Batas baris per halaman
   $batas2 = 15;
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
    <th width='25%' align='left'>Judul Template</th>
    <th width='75%' align='left'>Isi </th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{
$gbr=$row2[gambar];
echo "<tr class='row0'>
    <td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[id]'>"; ?>
                      <? echo"</a></td>";    
echo "<td class='baca1' align='left'>$row2[judul]</td>
    <td class='baca1' align='left'>$row2[isi]</td>";
	?>
	
<?
	
echo"

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
    <th width='25%' align='left'>Nama Produk</th>
    <th width='25%' align='left'>Harga</th>
    <th width='20%' align='left'>Tanggal</th>
    <th width='15%' align='left'>Jam</th>


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
?> <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)">
                      <input name="id" type="hidden" id="id" value="template_sms" />
                    </a></td>
                </tr>
              </table>
            </form></td>
          </tr>
        </table>		
		<p>&nbsp;</p>
      </td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="24" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="test/images/spacer.gif" width="1" height="307" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="26" alt=""></td>
	</tr>
	<tr>
		<td colspan="8">
			<img src="test/images/lptm_21.gif" width="780" height="25" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="25" alt=""></td>
	</tr>
	<tr>
		<td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="2%">&nbsp;</td>
            <td width="98%"><a class="bawah">
              <?=$titlebawah?>
            </a></td>
          </tr>
          
        </table></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="45" alt=""></td>
	</tr>
	<tr>
		<td colspan="8">
			<img src="test/images/lptm_23.gif" width="780" height="16" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="16" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="test/images/spacer.gif" width="47" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="40" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="118" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="19" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="23" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="170" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="351" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="35" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="24" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="32" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>