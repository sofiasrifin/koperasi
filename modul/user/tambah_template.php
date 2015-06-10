<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
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
    <p class="style1">Silahkan tambahkan template SMS anda </p>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="style1">
      <tr>
        <td width="30%" height="39">Judul Template</td>
        <td width="2%">:</td>
        <td width="68%"><span class="baca1">
          <input name="judul" type="text" class="baca1" id="judul" size="20" />
        </span></td>
      </tr>
      <tr>
        <td height="62">Isi Template</td>
        <td>:</td>
        <td><p class="MsoNormal">
          <input name="isi" type="text" id="isi" value="" size="25" />
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
