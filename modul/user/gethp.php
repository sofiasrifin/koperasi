<?php
include'../include/conf.php'; 
include'../include/db.php'; 
?>

<?
if($q1==3)
{
?>
<script type="text/javascript" src="include/selectbox.js"></script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="94%"><table width="50%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td nowrap="nowrap"><select name="p_num_dump[]" size="10" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])">
          <? $sql=mysql_query("SELECT nama,no_hp from data_pelanggan order by nama asc");
while ($a=mysql_fetch_array($sql))
{
?>
          <option value="<? echo"0$a[no_hp]"; ?>"> <? echo"$a[nama]";
}
?></option>
        </select></td>
        <td width="10">&nbsp;</td>
        <td align="center" valign="middle"><input name="button" type="button" class="button" onclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="&gt;&gt;" />
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
        <td nowrap="nowrap"><select name="p_num[]" size="9" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])">
          </select>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?
}
?>

