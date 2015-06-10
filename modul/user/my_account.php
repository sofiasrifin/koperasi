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
<meta http-equiv="X-UA-Compatible" content="IE=5"><title><?php echo"$title";?></title><meta name="description" content=""><meta name="PageID" content="i5030"><meta name="SiteID" content="64855"><meta name="ReqLC" content="1033"><meta name="LocLC" content="1033"><link rel="shortcut icon" href="favicon.ico">
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
<body onLoad="MM_preloadImages('images/change_over.gif','images/back_over.gif')">
<table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td id="i0272" align="center"><div class="cssWLGradientCommon cssWLGradientIMGSSL" id="GradientDiv"><table style="width: 890px;" cellpadding="0" cellspacing="0"><tbody><tr><td height="128" valign="top" style="height: 50px;"><span class="cssHeaderText" id="i0257"></span><?php include'atas.php'; ?></td></tr></tbody></table>
</div><div style="height: 20px;"></div></td></tr><tr><td id="shellTD" align="center"><table style="width: 890px;" id="shellTBL" cellpadding="0" cellspacing="0"><tbody><tr><td><table id="ctTBL" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tbody><tr>
  <td width="188" height="460" valign="top" id="mainTD"><?php include'left.php'; ?>&nbsp;</td>
  <td width="2%" valign="top" id="mainTD"><table height="430" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="20" id="separatorTD"><label>&nbsp;</label></td>
      </tr>
    </tbody>
  </table></td>
  <td width="672" valign="top" id="mainTD"><table width="674" border="0" align="center" cellpadding="0" cellspacing="0" class="baca">
    <tr>
      <td height="25" colspan="4" align="center" bgcolor="#EFEFDE"><?php
	  
	$user=mysql_query("SELECT * FROM user WHERE user_id='$nama'");
	$tampil=mysql_fetch_array($user);
	
	?>
        Hallo <?php echo"&nbsp;<b>$tampil[nama]</b>"; ?> ini adalah acount anda </td>
    </tr>
    <tr>
      <td width="1%" height="30">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="18">&nbsp;</td>
      <td width="31%" align="right" valign="top">User ID : </td>
      <td width="1%">&nbsp;</td>
      <td width="67%"><?php echo"&nbsp;$tampil[user_id]"; ?></td>
    </tr>
    <tr>
      <td height="18">&nbsp;</td>
      <td align="right" valign="top">Nama : </td>
      <td>&nbsp;</td>
      <td><?php echo"&nbsp;$tampil[nama]"; ?></td>
    </tr>
    <tr>
      <td height="18">&nbsp;</td>
      <td align="right" valign="top">Alamat : </td>
      <td>&nbsp;</td>
      <td><?php echo"&nbsp;$tampil[alamat]"; ?></td>
    </tr>
    <tr>
      <td height="18">&nbsp;</td>
      <td align="right" valign="top">Status Anggota : </td>
      <td>&nbsp;</td>
      <td><?php echo"&nbsp;$tampil[status]"; ?></td>
    </tr>
    <tr>
      <td height="18">&nbsp;</td>
      <td align="right" valign="top">Telepon / HP  : </td>
      <td>&nbsp;</td>
      <td><?php echo"&nbsp;$tampil[telp_hp]"; ?></td>
    </tr>
    <tr>
      <td height="18">&nbsp;</td>
      <td align="right" valign="top">E-Mail  : </td>
      <td>&nbsp;</td>
      <td><?php echo"&nbsp;$tampil[email]"; ?></td>
    </tr>
    <tr>
      <td height="26" colspan="4" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td height="32" colspan="4" align="center" valign="middle" bgcolor="#EFEFDE"><a href="#" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'edit_account.php?no=<?php echo"$tampil[no]";?>', 'Edit Account', 'width=350px,height=340px,center=1,resize=0,scrolling=0', 'recal')" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('change','','images/change_over.gif',1)"><img src="images/change.gif" name="change" width="115" height="25" border="0" id="change" /> </a> <img src="images/garis.gif" /> <a href="javascript:history.back(1)" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('back','','images/back_over.gif',1)"><img src="images/back.gif" name="back" width="70" height="25" border="0" id="back" /></a></a></td>
    </tr>
    <tr>
      <td height="25" colspan="4" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table></td>
</tr></tbody></table></td></tr><tr></tr><tr><td class="cssFooterPadding" id="footerTD"><table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td style="text-align: left;"><span class="style2" id="ftrCopy">
        <?php echo"$titlebawah";?>
      </span></td>
    </tr>
  </tbody>
</table></td></tr></tbody></table></td></tr></tbody></table></body>
</html>
