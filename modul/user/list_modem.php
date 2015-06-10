<select name="phoneid" class="bacas" id="phoneid">
  <?php $sql=mysql_query("SELECT nama from modem order by Id Asc");
while ($a=mysql_fetch_array($sql))
{
?>
  <option> <?php echo"$a[nama]";
}
?></option>
</select>
