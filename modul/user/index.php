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

$ok=mysql_query("select * from sentitems where status='SendingOKNoReport'");
$jumok=mysql_num_rows($ok);
$notok=mysql_query("select * from sentitems where status='SendingError'");
$jumnotok=mysql_num_rows($notok);
?>
<html dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=5"><title><?php echo"$title";?></title><link rel="shortcut icon" href="favicon.ico">
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

<script type="text/javascript">

			function Ajaxt()
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
							document.getElementById('kotakmasuk').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 10000);
						}
					};
					$http.open('GET', 'kotak_masuk.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}

			}


		</script>

		<script type="text/javascript">
			setTimeout(function() {Ajaxt();}, 10000);
		</script>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td id="i0272" align="center"><div class="cssWLGradientCommon cssWLGradientIMGSSL" id="GradientDiv"><table style="width: 890px;" cellpadding="0" cellspacing="0"><tbody><tr><td height="128" valign="top" style="height: 50px;"><span class="cssHeaderText" id="i0257"></span><?php include'atas.php'; ?></td></tr></tbody></table>
</div><div style="height: 20px;"></div></td></tr><tr><td id="shellTD" align="center"><table width="890" cellpadding="0" cellspacing="0" id="shellTBL" style="width: 890px;">
  <tbody><tr><td><table id="ctTBL" cellpadding="0" cellspacing="0">
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
  <td width="672" valign="top" id="mainTD"><table id="Table_01" width="675" height="99" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="18" colspan="3"><img src="images/round_01.gif" width="675" height="18" alt=""></td>
    </tr>
    <tr>
      <td width="15" background="images/round_02.gif">&nbsp;</td>
      <td width="642"><?php include'chart.php'; ?></td>
      <td width="18" background="images/round_04.gif">&nbsp;</td>
    </tr>
    <tr>
      <td height="27" colspan="3"><img src="images/round_05.gif" width="675" height="27" alt=""></td>
    </tr>
  </table>
    <table width="100" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="52%" height="146"><table width="337" height="139" border="0" cellpadding="0" cellspacing="0" background="images/round.gif">
          <!--DWLayoutTable-->
          <tr>
            <td width="19" height="16"></td>
            <td width="89"></td>
            <td width="104"></td>
            <td width="110"></td>
            <td width="15"></td>
          </tr>
          <tr>
            <td height="27"></td>
            <td colspan="3" valign="top"><strong>Status SMS </strong></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="86"></td>
            <td valign="middle"><img src="images/sms.jpg" width="70" height="56"></td>
            <td colspan="2" valign="top"><div id="kotakmasuk"><strong class="Win7">pesan masuk<br>
                </strong>
                    <?php
			  echo"$juminbox pesan ($jumunread pesan baru)";
			  ?>
                    <br>
                    <strong class="Win7">pesan keluar<br>
                    </strong>
                    <?php

			  echo"$jumok berhasil dikirim ($jumnotok gagal dikirim)";
			  ?>
            </div></td>
            <td></td>
          </tr>
          <tr>
            <td height="13"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
      </table></td>
      <td width="48%"><table width="337" height="139" border="0" cellpadding="0" cellspacing="0" background="images/round.gif">
          <!--DWLayoutTable-->
          <tr>
            <td width="19" height="16"></td>
            <td width="89"></td>
            <td width="104"></td>
            <td width="110"></td>
            <td width="15"></td>
          </tr>
          <tr>
            <td height="27"></td>
            <td colspan="3" valign="top"><strong>Buku Telepon </strong></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="86"></td>
            <td valign="middle"><img src="images/phonebook.jpg" width="75" height="79"></td>
            <td colspan="2" valign="top"><strong class="Win7">daftar kontak <br>
              </strong>
                <?php
			  $phonebook=mysql_query("select * from data_pelanggan");
			  $jumphonebook=mysql_num_rows($phonebook);
			  $grup=mysql_query("select * from grup");
			  $jumgrup=mysql_num_rows($grup);
			  echo"$jumphonebook kontak yang tersimpan";
			  ?>
                <br>
                <strong class="Win7">Group<br>
                </strong>
                <?php

			  echo"$jumgrup grup yang tersimpan";
			  ?></td>
            <td></td>
          </tr>
          <tr>
            <td height="13"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p></td>
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
