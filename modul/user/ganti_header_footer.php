<?php
include'../include/conf.php'; 
include'../include/db.php';
?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>

<form id="form1" name="form1" method="post" action="insert.php">
  <div style="padding: 5px">
    <p class="style1">Silahkan ganti
<?php
$id=$_GET['id'];
$head=mysql_query("SELECT * FROM header_footer where Id='$id'");
$thead=mysql_fetch_array($head);
echo"$thead[nama] SMS";
?>
    </p>
    <table width="100%" height="243" border="0" cellpadding="0" cellspacing="0" class="style1">
      <tr>
        <td height="33">Status </td>
        <td>:</td>
        <td><select name="aktif" id="aktif">
            <option value="1">aktif</option>
            <option value="0">nonaktif</option>
        </select>
        <input name="id" type="hidden" id="id" value="header_footer" />
        <input name="nama" type="hidden" id="nama" value="<?php echo $thead[nama];?>" /></td>
      </tr>
      <tr>
        <td width="29%" height="33">SMS Biasa </td>
        <td width="2%">:</td>
        <td width="69%"><select name="sms_biasa" id="sms_biasa">
            <option value="1">aktif</option>
            <option value="0">nonaktif</option>
          </select>        </td>
      </tr>
      <tr>
        <td height="34">Autorespond</td>
        <td>:</td>
        <td><p class="MsoNormal">
            <select name="autorespond" id="autorespond">
              <option value="1">aktif</option>
              <option value="0">nonaktif</option>
            </select>
        </p></td>
      </tr>
      <tr>
        <td height="32">Isi SMS Biasa </td>
        <td>:</td>
        <td><input name="format_sms_biasa" type="text" id="format_sms_biasa" value="<?php echo $thead[format_sms_biasa];?>" size="25" /></td>
      </tr>
      <tr>
        <td height="37">Isi SMS Auto</td>
        <td>:</td>
        <td><input name="format_sms_auto" type="text" id="format_sms_auto" value="<?php echo $thead[format_sms_auto];?>" size="25" /></td>
      </tr>
      <tr>
        <td height="37">&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="  kirim  " onclick="parent.agreewin.hide()"/></td>
      </tr>
      <tr>
        <td height="37" colspan="3">* Catatan : Gunakan $name untuk menyertakan nama user </td>
      </tr>
    </table>
  </div>
</form>
