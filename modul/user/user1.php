<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
include'cek_session.php'; 
$sql=mysql_query("SELECT nama,alamat,email,foto FROM user WHERE user_id='$nama'");
$row=mysql_fetch_array($sql);
?>
<html dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=5"><title>Login SMS Gateway V 1.0</title><meta name="description" content="Powerful free e-mail with security from Microsoft - Windows Live Hotmail is a best in class e-mail service that helps you organize and manage all your online stuff in one place"><meta name="PageID" content="i5030"><meta name="SiteID" content="64855"><meta name="ReqLC" content="1033"><meta name="LocLC" content="1033"><link rel="shortcut icon" href="favicon.ico">
<link href="index1.css" rel="stylesheet" type="text/css">
<link href="index_1.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.style2 {font-size: 11px}
-->
</style>

</head>
<body>
<table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td id="i0272" align="center"><div class="cssWLGradientCommon cssWLGradientIMGSSL" id="GradientDiv"><table style="width: 890px;" cellpadding="0" cellspacing="0"><tbody><tr><td height="128" valign="top" style="height: 50px;"><span class="cssHeaderText" id="i0257"></span><? include'atas.php'; ?></td></tr></tbody></table>
</div><div style="height: 20px;"></div></td></tr><tr><td id="shellTD" align="center"><table style="width: 890px;" id="shellTBL" cellpadding="0" cellspacing="0"><tbody><tr><td><table id="ctTBL" cellpadding="0" cellspacing="0"><tbody><tr>
  <td width="21%" valign="top" id="mainTD"><? include'left.php'; ?>&nbsp;</td>
  <td width="1%" id="mainTD">&nbsp;</td>
  <td width="2%" valign="top" id="mainTD"><table height="430" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="31" id="separatorTD"><label>&nbsp;</label></td>
      </tr>
    </tbody>
  </table></td>
  <td width="76%" valign="top" id="mainTD"><iframe frameborder="0" style="width:668px;height:430px" allowtransparency="true" src="inboxs.php"></iframe>     </td>
</tr></tbody></table></td></tr><tr></tr><tr><td class="cssFooterPadding" id="footerTD"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td align="left"><table cellpadding="0" cellspacing="0"><tbody><tr>
  <td style="text-align: left;"><span class="style2" id="ftrCopy">Dibuat oleh khoiril anwar. <br>
      <em>Website</em> http://ikhwaniril.blogspot.com<br>
      <em>E-mail</em> ikhwaniril@gmail.com, 
      <em>YM</em> ikhwaniril@yahoo.com
</span></td>
  </tr></tbody></table>            <table cellpadding="0" cellspacing="0">
              <tbody><tr></tr></tbody>
            </table></td>
</tr>
</tbody></table></td></tr></tbody></table></td></tr></tbody></table></body>
</html>
