<?php
session_start();
//include'../include/conf.php'; 
include'inc.koneksi.php'; 
//include'cek_session.php'; 
$sql=mysql_query("SELECT nama,alamat,email,foto FROM user WHERE user_id='$nama'");
$row=mysql_fetch_array($sql);

$inbox=mysql_query("select * from inbox");
$juminbox=mysql_num_rows($inbox);
$hpunread=mysql_query("select * from inbox where status='unread'");
$jumunread=mysql_num_rows($hpunread);
?>

<html dir="ltr">
<head>
<script src="getnama.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=5"><title><?php echo $title;?></title><meta name="description" content=""><meta name="PageID" content="i5030"><meta name="SiteID" content="64855"><meta name="ReqLC" content="1033"><meta name="LocLC" content="1033"><link rel="shortcut icon" href="favicon.ico">
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
.style1 {font-family: verdana}
-->
</style>

<script type="text/javascript" src="include/selectbox.js"></script>	    	<script language="JavaScript" type="text/javascript" src="js/datetimepicker.js">	</script>


<script language="JavaScript">

/*
Drop down messages script
By Website Abstraction (http://wsabstract.com)
Over 400+ free scripts here!
*/

//change contents of message box, where the first one corresponds with the first drop down box, second with second box etc
var thecontents=new Array()
<?php

echo "
thecontents[0]=''";
$i=1;
$sqls=mysql_query("SELECT isi from template_sms order by id asc");
while($tmpl=mysql_fetch_array($sqls))
{
echo"
thecontents[$i]='$tmpl[isi]'";
$i++;

}
?>
//don't edit pass this line

function changecontent(which){
document.ddmessage.Text.value=thecontents[which.selectedIndex]
}

document.ddmessage.Text.value=thecontents[document.ddmessage.selectbox.selectedIndex]
</script>


<SCRIPT language="JavaScript">

function updateTextBoxCounter() {

   var unicodeFlag = 0;
   var extraChars = 0;
   var msgCount = 0;
   var destPortExtra = 0;

   for (var i = 0; (!unicodeFlag && (i < document.forms[0].Text.value.length)); i++) {
      if ((document.forms[0].Text.value.charAt(i) >= '0') && (document.forms[0].Text.value.charAt(i) <= '9')) {
      }
      else if ((document.forms[0].Text.value.charAt(i) >= 'A') && (document.forms[0].Text.value.charAt(i) <= 'Z')) {
      }
      else if ((document.forms[0].Text.value.charAt(i) >= 'a') && (document.forms[0].Text.value.charAt(i) <= 'z')) {
      }
      else if (document.forms[0].Text.value.charAt(i) == '@') {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xA3) {
      }
      else if (document.forms[0].Text.value.charAt(i) == '$') {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xA5) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xE8) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xE9) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xF9) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xEC) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xF2) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xC7) {
      }
      else if (document.forms[0].Text.value.charAt(i) == '\r') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '\n') {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xD8) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xF8) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xC5) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xE5) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x394) {
      }
      else if (document.forms[0].Text.value.charAt(i) == '_') {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A6) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x393) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x39B) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A9) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A0) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A8) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A3) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x398) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x39E) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xC6) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xE6) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xDF) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xC9) {
      }
      else if (document.forms[0].Text.value.charAt(i) == ' ') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '!') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '\"') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '#') {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xA4) {
      }
      else if (document.forms[0].Text.value.charAt(i) == '%') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '&') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '\'') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '(') {
      }
      else if (document.forms[0].Text.value.charAt(i) == ')') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '*') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '+') {
      }
      else if (document.forms[0].Text.value.charAt(i) == ',') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '-') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '.') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '/') {
      }
      else if (document.forms[0].Text.value.charAt(i) == ':') {
      }
      else if (document.forms[0].Text.value.charAt(i) == ';') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '<') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '=') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '>') {
      }
      else if (document.forms[0].Text.value.charAt(i) == '?') {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xA1) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xC4) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xD6) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xD1) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xDC) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xA7) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xBF) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xE4) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xF6) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xF1) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xFC) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0xE0) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x391) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x392) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x395) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x396) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x397) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x399) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x39A) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x39C) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x39D) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x39F) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A1) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A4) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A5) {
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x3A7) {
      }
      else if (document.forms[0].Text.value.charAt(i) == '^') {
         extraChars++;
      }
      else if (document.forms[0].Text.value.charAt(i) == '{') {
         extraChars++;
      }
      else if (document.forms[0].Text.value.charAt(i) == '}') {
         extraChars++;
      }
      else if (document.forms[0].Text.value.charAt(i) == '\\') {
         extraChars++;
      }
      else if (document.forms[0].Text.value.charAt(i) == '[') {
         extraChars++;
      }
      else if (document.forms[0].Text.value.charAt(i) == '~') {
         extraChars++;
      }
      else if (document.forms[0].Text.value.charAt(i) == ']') {
         extraChars++;
      }
      else if (document.forms[0].Text.value.charAt(i) == '|') {
         extraChars++;
      }
      else if (document.forms[0].Text.value.charCodeAt(i) == 0x20AC) {
         extraChars++;
      }
      else {
         unicodeFlag = 1;
      }
   }

   if (unicodeFlag) {
      msgCount = document.forms[0].Text.value.length;
      if (document.forms[0].DestPort.value.length) {
         msgCount += 4;
         destPortExtra = 4;
      }
      if (msgCount <= 70) {
         msgCount = 1;
      }
      else {
         msgCount += (67-1);
         msgCount -= (msgCount % 67);
         msgCount /= 67;
      }
      document.forms[0].InfoCharCounter.value = "" + (document.forms[0].Text.value.length + destPortExtra) + " unicode characters, " + msgCount + " SMS message(s)";
   } 
   else {
      msgCount = document.forms[0].Text.value.length + extraChars;
      if (document.forms[0].DestPort.value.length) {
         msgCount += 8;
         destPortExtra = 8;
      }
      if (msgCount <= 160) {
         msgCount = 1;
      }
      else {
         msgCount += (153-1);
         msgCount -= (msgCount % 153);
         msgCount /= 153;
      }
      document.forms[0].InfoCharCounter.value = "" + (document.forms[0].Text.value.length + extraChars + destPortExtra) + " characters, " + msgCount + " SMS message(s)";
   }
}

function clearTextBoxCounter() {

   document.forms[0].InfoCharCounter.value = "";

}

function doAddrBook() {
   var newWindow;
   var props = 'scrollBars=yes,resizable=yes,toolbar=no,menubar=no,location=no,directories=no,width=700,height=500';
   newWindow = window.open("/AddrBook", "NowSMSAddressBook", props);
}

function addPhoneNumber(phoneNumber) {

   var tempString = "";
   var alreadyInList = 0;
   for (var i = 0; i < window.document.forms[0].PhoneNumber.value.length; i++) {
      if (window.document.forms[0].PhoneNumber.value.charAt(i) != ',') {
         tempString += window.document.forms[0].PhoneNumber.value.charAt(i);
      }
      else {
         if (tempString == phoneNumber) {
            alreadyInList = 1;
         }
         tempString = "";
      }
   }

   if (tempString.length) {
      if (tempString == phoneNumber) {
         alreadyInList = 1;
      }
   }

   if (!alreadyInList) {
      if (window.document.forms[0].PhoneNumber.value.length) {
         window.document.forms[0].PhoneNumber.value += ",";
      }
      window.document.forms[0].PhoneNumber.value += phoneNumber;
   }

}

function setPhoneNumber(phoneNumber) {
   var tempString = "";
   for (var i = 0; i < phoneNumber.length; i++) {
      if (phoneNumber.charAt(i) != ',') {
         tempString += phoneNumber.charAt(i);
      }
      else {
         addPhoneNumber(tempString);
         tempString = "";
      }
   }

   if (tempString.length) {
      addPhoneNumber(tempString);
   }

}

</SCRIPT>

<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
//-->
</script>

</head>
<body onLoad="MM_preloadImages('images/back_over.gif')">
<table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td id="i0272" align="center"><div class="cssWLGradientCommon cssWLGradientIMGSSL" id="GradientDiv">
</div><div style="height: 20px;"></div></td></tr><tr><td id="shellTD" align="center"><table width="890" cellpadding="0" cellspacing="0" id="shellTBL" style="width: 890px;">
  <tbody><tr>
          <td width="76%" valign="top" id="mainTD"><form action="kir_sms.php?id=kotak_masuk" method="post" name="ddmessage" id="ddmessage">
          <table width="670" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="86%" height="395" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="24" valign="middle" bgcolor="#EEEEEE" class="baca1"><span class="badan">&nbsp;&nbsp;&nbsp;Phone Book <span class="style1">
                      <input name="id" type="hidden" id="id" value="kotak_masuk" />
                    </span></span></td>
                    <td height="24" valign="middle" bgcolor="#EEEEEE" class="baca1">&nbsp;</td>
                    <td height="24" valign="middle" bgcolor="#EEEEEE" class="baca1">Pilih Modem </td>
                  </tr>
                  <tr>
                    <td height="189" valign="top" class="baca1"><table width="50%" border="0" cellpadding="1" cellspacing="0">
                        <tr>
                          <td nowrap="nowrap"><input name="q1" class="baca1" id="q1" onFocus="if(this.value=='tulis nama') this.value='';" onBlur="if(this.value=='') this.value='tulis nama';" value="tulis nama" onKeyUp="showUser(this.value)" size="15" type="text" maxlength="255"/>
                            <br>
                          <div id="txtHint"><select name="p_num_dump[]" size="9" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])">
                              <?php 
$jcon = mysql_query("SELECT * FROM jumlah_konten");
$tcon=mysql_fetch_array($jcon);

$sql=mysql_query("SELECT nama,no_hp from data_pelanggan order by nama asc LIMIT $tcon[phonebook]");

while ($a=mysql_fetch_array($sql))
{
?>
                              <option value="<?php echo"0$a[no_hp]"; ?>"> <?php echo"$a[nama]";
}
?></option>
                          </select></div>                          </td><td width="10">&nbsp;</td>
                          <td align="center" valign="middle" class="baca1"><input name="button" type="button" class="button" onClick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="&gt;&gt;" />
                              <br />
                              <br />
                              <input name="button" type="button" class="button" onClick="moveAllOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="All &gt;&gt;" />
                              <br />
                              <br />
                              <input name="button" type="button" class="button" onClick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="&lt;&lt;" />
                              <br />
                              <br />
                              <input name="button" type="button" class="button" onClick="moveAllOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="All &lt;&lt;" />                          </td>
                          <td width="10">&nbsp;</td>
                          <td nowrap="nowrap"><select name="p_num[]" size="10" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])">
                            </select>                          </td>
                        </tr>
                    </table></td>
                    <td height="189" valign="top" class="baca1">&nbsp;</td>
                    <td height="189" valign="top" class="baca1"><span class="tulisan"><?php include'list_modem.php'; ?></span></td>
                  </tr>
                  <tr>
                    <td width="63%" height="26" valign="middle" bgcolor="#EEEEEE" class="baca1"><span class="badan">&nbsp;&nbsp;&nbsp;Seting SMS </span></td>
                    <td width="2%" valign="middle" bgcolor="#EEEEEE" class="baca1">&nbsp;</td>
                    <td width="35%" valign="middle" bgcolor="#EEEEEE" class="baca1"><span class="badan">&nbsp;&nbsp;&nbsp;Isi Pesan</span></td>
                  </tr>
                  <tr>
                    <td height="62" valign="top" class="baca1"><span class="MsoNormal"><span class="baca">
                      <input name="tipe" value="1" checked="checked" type="radio" />
                      Kirim sekarang <br />
                      <input name="tipe" value="0" type="radio" />
                      Jadwal
                      <input gtbfieldid="31" name="ttl" id="ttl" size="10" maxlength="10" type="text" />
                      &nbsp;<a href="javascript:NewCal('ttl','ddmmyyyy')"><img src="images/cal.gif" alt="Pick a date" border="0" height="16" width="16" /></a>:
                      <input gtbfieldid="32" name="jam" id="jam" size="1" maxlength="2" onKeyPress="return numeric_only(this, event)" type="text" />
                      Jam :
                      <input gtbfieldid="33" name="menit" id="menit" size="1" maxlength="2" onKeyPress="return numeric_only(this, event)" type="text" />
                      Menit <font size="1">*</font></span><font size="1"><br />
                        * format penulisan jam dan menit menggunakan format 2 digit dan 24 jam (contoh 09:30 or 23:07) <br />
                        </font></span>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="5%" height="28"><input name="flash" type="checkbox" id="flash" value="1" /></td>
                            <td width="95%"><span class="judul"> Kirim sebagai Flash SMS </span></td>
                          </tr>
                      </table></td>
                    <td valign="top" class="baca1">&nbsp;</td>
                    <td valign="top" class="baca1"><p class="MsoNormal">
                        <select name="selectbox" class="bacas" onChange="changecontent(this)">
                          <option selected="selected">-- Silahkan Pilih --</option>
                          <?php $sql=mysql_query("SELECT judul from template_sms");
while ($a=mysql_fetch_array($sql))
{
?>
                          <option> <?php echo"$a[judul]";
}
?></option>
                        </select>
                      </p>
                        <p class="MsoNormal">
                          <textarea name="Text" cols="30" rows="4" class="bacas" id="Text" onKeyUp="updateTextBoxCounter()"></textarea>
                          <br />
                          <input type="text" size="30" name="InfoCharCounter" />
                          <input name="DestPort" type="hidden" id="DestPort" />
                      </p></td>
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
      </tr>
    </tbody>
  </table>
  </td>
</tr><tr></tr><tr><td class="cssFooterPadding" id="footerTD"><table cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td align="left"><table cellpadding="0" cellspacing="0">
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
