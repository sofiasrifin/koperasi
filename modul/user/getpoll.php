<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>
<table width="351" border="0" cellpadding="0" cellspacing="0" class="style1">
<?php
$q1=$_GET['q1'];
for($o=1; $o<=$q1; $o++)
{
?>
  <tr>
    <td width="2%" height="29">&nbsp;</td>
    <td width="31%">Jawaban <?php echo $o;?></td>
    <td width="4%">:</td>
    <td width="63%"><input name="jawaban[<?php echo $o;?>]" type="text" id="id_poll<?php echo $o;?>" size="16" /><input name="jum" type="hidden" id="jum" value="<?php echo $o;?>"></td>
  </tr>
<?php
}
?>
  <tr>
    <td width="2%" height="29">&nbsp;</td>
    <td width="31%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="63%"><input type="submit" name="Submit" value="  kirim  " onClick="parent.agreewin.hide()"/>&nbsp;</td>
  </tr>
</table>