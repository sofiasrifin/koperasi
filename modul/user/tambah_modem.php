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
<meta http-equiv="X-UA-Compatible" content="IE=5"><title><?php echo $title;?></title><meta name="description" content=""><meta name="PageID" content="i5030"><meta name="SiteID" content="64855"><meta name="ReqLC" content="1033"><meta name="LocLC" content="1033"><link rel="shortcut icon" href="favicon.ico">
<link href="index1.css" rel="stylesheet" type="text/css">
<link href="index_1.css" rel="stylesheet" type="text/css">
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript">

		
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

			function ceknohp()
			{
				var
					$http,
					$self = arguments.callee;

				if (window.XMLHttpRequest) {
					$http = new XMLHttpRequest();
				} else if (window.ActiveXObject) {
					try {
						$http = new ActiveXObject('Msxml2.XMLHTTP');
					} catch(e) {
						$http = new ActiveXObject('Microsoft.XMLHTTP');
					}
				}

				if ($http) {
					$http.onreadystatechange = function()
					{
						if (/4|^complete$/.test($http.readyState)) {
							document.getElementById('ceknohp').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 1500);
						}
					};
					$http.open('GET', 'cek_modem.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}

			}

setTimeout(function() {ceknohp();}, 1500);
</script>
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
<body onLoad="MM_preloadImages('images/tambah_pelanggan_over.gif')">
<table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td id="i0272" align="center"><div class="cssWLGradientCommon cssWLGradientIMGSSL" id="GradientDiv"><table style="width: 890px;" cellpadding="0" cellspacing="0"><tbody><tr><td height="128" valign="top" style="height: 50px;"><span class="cssHeaderText" id="i0257"></span><?php include'atas.php'; ?></td></tr></tbody></table>
</div><div style="height: 20px;"></div></td></tr><tr><td id="shellTD" align="center"><table style="width: 890px;" id="shellTBL" cellpadding="0" cellspacing="0"><tbody><tr><td><table id="ctTBL" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tbody><tr>
  <td width="189" height="460" valign="top" id="mainTD"><?php include'left.php'; ?>    &nbsp;</td>
  <td width="2%" valign="top" id="mainTD"><table height="430" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="20" id="separatorTD"><label>&nbsp;</label></td>
      </tr>
    </tbody>
  </table></td>
  <td width="76%" valign="top" id="mainTD">
<div id="ceknohp">

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <!--DWLayoutTable-->
    <tr>
      <td height="41" valign="middle">
	  
<?php
$mod = mysql_query("SELECT * FROM modem ORDER BY Id DESC");
$tmod=mysql_fetch_array($mod);
?>		
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
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

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
?> <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)">          </a></div></td>
    </tr>
  </table>
</td>
</tr></tbody></table></td></tr><tr></tr><tr><td class="cssFooterPadding" id="footerTD"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td align="left"><table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td style="text-align: left;"><span class="style2" id="ftrCopy">
        <?php echo $titlebawah;?>
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
