<?php
include'../include/conf.php'; 
include'../include/db.php';
$no_hp=$_GET['no_hp'];
$phoneid=$_GET['phoneid'];

?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>
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
<div style="padding: 5px">
  <p class="style1">Silahkan tuliskan pesan yang akan di kirim</p>
  <form action="kirim_sms.php" method="post" name="ddmessage" id="agecheck">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="style1">
      <tr>
        <td width="22%">No HP </td>
        <td width="2%">:</td>
        <td width="76%"><input name="no_hp" type="text" id="no_hp" value="0<?=$no_hp;?>" size="30" onFocus="this.blur()"/></td>
      </tr>
      <tr>
        <td height="34">Template</td>
        <td>:</td>
        <td><p class="MsoNormal">
          <select name="selectbox" class="bacas" onchange="changecontent(this)">
            <option selected="selected">-- Silahkan Pilih Template SMS --</option>
            <?php $sql=mysql_query("SELECT judul from template_sms");
while ($a=mysql_fetch_array($sql))
{
?>
            <option> <?php echo"$a[judul]";
}
?></option>
          </select>
        </p>        </td>
      </tr>
      <tr>
        <td height="98">Isi SMS </td>
        <td>:</td>
        <td><span class="MsoNormal">
          <textarea name="Text" cols="24" rows="4" class="bacas" id="Text" onkeyup="updateTextBoxCounter()"></textarea>
          <br />
          <input type="text" size="30" name="InfoCharCounter" />
          <input name="DestPort" type="hidden" id="DestPort" />
          <input name="phoneid" type="hidden" id="phoneid" value="<?php echo $phoneid;?>" />
        </span></td>
      </tr>
      <tr>
        <td height="31">&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="  kirim  " onClick="parent.agreewin.hide()"/></td>
      </tr>
    </table>
  </form>
</div>
