<html>
<head>

<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">

<?php
include'../include/db.php';

if(isset($_POST['idakhir']))
{
$idakhir=$_POST['idakhir'];
//tampilkan 5 status berikutnya
$query="SELECT * FROM inbox WHERE ID > '$idakhir' ORDER BY ID LIMIT 5";
$result = mysql_query($query);
while($row=mysql_fetch_array($result)){

echo "<tr class='row0'>";
$o="$row[ID]";

echo"<td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row[ID]'></a></td>";  
$gbr=mysql_query("SELECT * FROM modem where nama='$row[RecipientID]'");
$jgbr=mysql_num_rows($gbr);
$tgbr=mysql_fetch_array($gbr);
if($jgbr==1)
{
echo"<td class='baca1' align='left'> <img src='icon_modem/$tgbr[gambar]' border='0'></td>";   
}
if($jgbr==0)
{
echo"<td class='baca1' align='left'> <img src='icon_modem/default.png' border='0'></td>";   
}

$string=$row['SenderNumber'];

$ok=$string{0};  
if ($ok=='+')
{
$hp=substr($row['SenderNumber'], 3);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp='$hp'");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
if ($hasil>=1)
{
?>
<td class='baca1' align='left'><a name='<?php echo"$row[ID]";?>' href='#' alt='<?php echo"$row[SenderNumber]";?>'><?php echo"$tampilkan[nama]";?></a></td>
<?php
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row[SenderNumber]</td>";
}

}
else
{
echo "<td class='baca1' align='left'>$row[SenderNumber]</td>";
}

echo"<td class='baca1' align='left'>$row[TextDecoded]</td>
    <td class='baca1' align='left'>$row[ReceivingDateTime]</td>
	<td class='baca1' align='left'>"; 
	?>
<a href="#<?php echo"$hp";?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_group_sms.php?no_hp=<?php echo"$hp";?>&id_sms=<?php echo"$row[ID]";?>&SenderID=<?php echo"$row[RecipientID]";?>', 'Pindahkan SMS', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='img/folder.png' border='0'></a>&nbsp;
	
<a href="#<?php echo"$row[ID]";?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ok.php?no_hp=<?php echo"$hp";?>&phoneid=<?php echo"$row[RecipientID]";?>', 'Balas SMS', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')">
<?php
echo"<img src='images/reply.png' border='0'></a>&nbsp;";

if ($hasil==0) 
{
?> 
<script type="text/javascript">
agreewin.onclose=function(){ //Define custom code to run when window is closed
	return true //Allow closing of window in both cases
}

</script>

<a href="#<?php echo $hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_buku_telepon.php?no_hp=<?php echo $hp;?>', 'Tambah Buku Telepon', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='images/plus.gif' border='0'></a>

<?php
}

echo"&nbsp;</td>";
	
echo"</td>";


echo"</tr></table>";
$o++;

?>




<?php } ?>
  </ol>
  
<div class="facebook_style" id="facebook_style">
<a id="<?php echo $id_status1; ?>" href="#" class="load_more" >Show Older Posts <img src="arrow1.png" /></a>
</div><?php
 }else {
  echo '<div  id="facebook_style">
  <a  id="end" href="#" class="load_more" >No More Posts</a>
  </div>';
    
}
?>
