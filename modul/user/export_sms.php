<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>
</head>

<body>
<form action="insert.php" method="post" name="form1" id="form1">
  <div style="padding: 5px">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="style1">
      <tr>
        <td height="30" colspan="3"><input name="radiobutton" type="radio" value="tgl" />
          Urut berdasarkan tanggal </td>
      </tr>
      <tr>
        <td height="28" colspan="3"><input name="radiobutton" type="radio" value="pengirim" />
Urut berdasarkan pengirim </td>
      </tr>
      <tr>
        <td width="29%" height="62">Isi Template</td>
        <td width="1%">:</td>
        <td width="70%"><p class="MsoNormal">
          <textarea name="isi" rows="4" id="isi"></textarea>
          <input name="id" type="hidden" id="id" value="template_sms" />
        </p></td>
      </tr>

      <tr>
        <td height="31">&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit2" value="  kirim  " onclick="parent.agreewin.hide()"/></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
</form>
</body>
</html>
