<?php
include'../include/conf.php'; 
include'../include/db.php'; 
$q1=$_GET['q1'];
/* PagingWeb.php */
$jcon = mysql_query("SELECT * FROM jumlah_konten");
$tcon=mysql_fetch_array($jcon);

/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

?>
<select name="p_num_dump[]" size="9" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])">
                              <?php 
$jcon = mysql_query("SELECT * FROM jumlah_konten");
$tcon=mysql_fetch_array($jcon);

$sql=mysql_query("SELECT nama,no_hp from data_pelanggan WHERE nama like '%$q1%' order by nama asc LIMIT $tcon[phonebook]");

while ($a=mysql_fetch_array($sql))
{
?>
                              <option value="<?php echo"0$a[no_hp]"; ?>"> <?php echo"$a[nama]";
}
?></option>
                          </select>