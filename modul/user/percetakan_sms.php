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
<script language="JavaScript" type="text/javascript" src="js/datetimepicker.js">	</script>

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
<body onLoad="MM_preloadImages('images/back_over.gif')">
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
  <td width="76%" valign="top" id="mainTD"><form action="tampil_percetakan.php" method="post" name="ddmessage" target="_blank" id="ddmessage">
    <table width="660" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="86%" height="136" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="63%" height="26" valign="middle" bgcolor="#EEEEEE" class="baca1"><span class="badan">&nbsp;&nbsp;&nbsp;Seting SMS </span></td>
            </tr>
            <tr>
              <td height="62" valign="top" class="baca1"><br />
                  <span class="MsoNormal"><span class="baca">
                  <input name="tipe" value="all" checked="checked" type="radio" />
                    Semua SMS <br />
                    <input name="tipe" value="tgl" type="radio" />
                    Pertanggal 
                    &nbsp;&nbsp;&nbsp;Mulai :
                    <input gtbfieldid="31" name="mulai" id="mulai" size="10" maxlength="10" type="text" />
                    &nbsp;<a href="javascript:NewCal('mulai','ddmmyyyy')"></a></span><font size="1"> <span class="baca"> &nbsp;&nbsp;&nbsp;</span><span class="baca"> &nbsp;&nbsp;&nbsp;</span><span class="baca"> &nbsp;&nbsp;&nbsp;</span>Sampai : <span class="baca">
                      <input gtbfieldid="31" name="akhir" id="akhir" size="10" maxlength="10" type="text" />
                      &nbsp;<a href="javascript:NewCal('akhir','ddmmyyyy')"></a></span><br />
                      Pertanggal gunakan format tahun-tanggal-tanggal (2012-06-28) <br />
                      <br />
                      </font></span>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="28" bgcolor="#EEEEEE"><span class="badan">&nbsp;&nbsp;&nbsp;Jenis</span></td>
                    </tr>
                    <tr>
                      <td height="28"><br />
                          <select name="table" id="table">
                            <option value="inbox">Inbox</option>
                            <option value="outbox">Outbox</option>
                          </select>
                          <br />
                          <br /></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle" bgcolor="#EEEEEE"><a onload="MM_preloadImages('images/kirim_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('kirim','','images/kirim_over.gif',1)">
          <input name="Submit" type="image" value="Submit" src="images/kirim.gif" name="kirim" width="70" height="25" border="0" id="kirim" onClick="selectAllOptions(this.form['p_num[]'])">
          <img src="images/garis.gif" /> </a> <a href="javascript:history.back(1)" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('back','','images/back_over.gif',1)"><img src="images/back.gif" name="back" width="70" height="25" border="0" id="back" /></a>&nbsp;</td>
      </tr>
    </table>
  </form></td>
</tr></tbody></table></td></tr><tr></tr><tr><td class="cssFooterPadding" id="footerTD"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td align="left"><table cellpadding="0" cellspacing="0"><tbody><tr>
  <td style="text-align: left;"><span class="style2" id="ftrCopy"><?php echo $titlebawah;?>
</span></td>
  </tr></tbody></table> 		           <table cellpadding="0" cellspacing="0">
              <tbody><tr></tr></tbody>
            </table></td>
</tr>
</tbody></table></td></tr></tbody></table></td></tr></tbody></table></body>
</html>
