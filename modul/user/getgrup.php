<?php
include'../include/conf.php'; 
include'../include/db.php'; 
?>

<?
if($q1==3)
{
?>
<link href="../css.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="6%">&nbsp;</td>
      <td width="94%"><table width="50%" border="0" cellpadding="1" cellspacing="0">
          <tr>
            <td nowrap="nowrap"><select name="p_num_dump[]" size="10" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])">
                <? $sql=mysql_query("SELECT * from grup");
while ($a=mysql_fetch_array($sql))
{
$jal=mysql_query("SELECT * from data_pelanggan where grup='$a[nama]'");
$jum=mysql_num_rows($jal);
?>
                <option value="<? echo"$a[nama]"; ?>"> <? echo"$a[nama] -- ($jum anggota)";
}
?></option>
              </select>
            </td>
            <td width="10">&nbsp;</td>
            <td align="center" valign="middle" class="baca1"><input name="button" type="button" class="button" onclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="&gt;&gt;" />
                <br />
                <br />
                <input name="button" type="button" class="button" onclick="moveAllOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="All &gt;&gt;" />
                <br />
                <br />
                <input name="button" type="button" class="button" onclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="&lt;&lt;" />
                <br />
                <br />
                <input name="button" type="button" class="button" onclick="moveAllOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="All &lt;&lt;" />
            </td>
            <td width="10">&nbsp;</td>
            <td nowrap="nowrap"><select name="p_num[]" size="10" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])">
              </select>
            </td>
          </tr>
      </table></td>
    </tr>
</table>
<?
}
if($q1==4)
{

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="94%"><table width="50%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td nowrap="nowrap"><select name="p_num_dump[]" size="10" multiple="multiple" id="p_num_dump[]" ondblclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])">
          <? $sql=mysql_query("SELECT nama,no_hp from data_pelanggan order by nama asc");
while ($a=mysql_fetch_array($sql))
{
?>
          <option value="<? echo"0$a[no_hp]"; ?>"> <? echo"$a[nama]";
}
?></option>
        </select></td>
        <td width="10">&nbsp;</td>
        <td align="center" valign="middle" class="baca1"><input name="button2" type="button" class="button" onclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="&gt;&gt;" />
              <br />
              <br />
              <input name="button2" type="button" class="button" onclick="moveAllOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="All &gt;&gt;" />
              <br />
              <br />
              <input name="button2" type="button" class="button" onclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="&lt;&lt;" />
              <br />
              <br />
              <input name="button2" type="button" class="button" onclick="moveAllOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="All &lt;&lt;" />
        </td>
        <td width="10">&nbsp;</td>
        <td nowrap="nowrap"><select name="p_num[]" size="10" multiple="multiple" id="p_num[]" ondblclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])">
        </select>
        </td>
      </tr>
    </table></td>
  </tr>
</table>

  <?
}
if($q1==5)
{
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="94%"><table width="50%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td nowrap="nowrap"><select name="p_num_dump[]" size="10" multiple="multiple" id="p_num_dump[]" ondblclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])">
          <? $sql=mysql_query("SELECT nama,no_hp,grup from data_pelanggan order by grup asc");
while ($a=mysql_fetch_array($sql))
{
?>
          <option value="<? echo"0$a[no_hp]"; ?>"> <? echo"$a[nama] ($a[grup])";
}
?></option>
        </select></td>
        <td width="10">&nbsp;</td>
        <td align="center" valign="middle" class="baca1"><input name="button22" type="button" class="button" onclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="&gt;&gt;" />
              <br />
              <br />
              <input name="button22" type="button" class="button" onclick="moveAllOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="All &gt;&gt;" />
              <br />
              <br />
              <input name="button22" type="button" class="button" onclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="&lt;&lt;" />
              <br />
              <br />
              <input name="button22" type="button" class="button" onclick="moveAllOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="All &lt;&lt;" />
        </td>
        <td width="10">&nbsp;</td>
        <td nowrap="nowrap"><select name="p_num[]" size="10" multiple="multiple" id="select2" ondblclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])">
        </select>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?
}
?>
