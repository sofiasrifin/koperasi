<?php
include'../include/db.php';

if(isset($_POST['idakhir']))
{
$idakhir=$_POST['idakhir'];
//tampilkan 5 status berikutnya
$query="SELECT * FROM inbox WHERE ID > '$idakhir' ORDER BY ID LIMIT 5";
$result = mysql_query($query);
while($row=mysql_fetch_array($result)){

$in=mysql_query("select SenderNumber,TextDecoded,ID from inbox where SenderNumber='$row[SenderNumber]' ORDER BY ID DESC");
$tin=mysql_fetch_array($in);
  $id_status=$tin['ID'];
$hp=substr($tin['SenderNumber'], 3);

$peng=mysql_query("select nama from data_pelanggan where no_hp='$hp'");
$tpeng=mysql_fetch_array($peng);
$jpeng=mysql_num_rows($peng);
if($jpeng==0)
{
$nama=$tin['SenderNumber'];
}
if($jpeng<>0)
{
$nama=$tpeng['nama'];
}

$jtin=mysql_num_rows($in);
$jum=$jtin-1;
?>
    <li> 
<?php echo "<a class='blue'><b>$nama</b></a> $tin[TextDecoded]<br>"; ?> 
<a href='<?php echo $id_status; ?>' class="commentopen" style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11; margin: auto; color:#C1C1C1" id='<?php echo $id_status; ?>' title='<?php echo $id_status; ?>'>Balas SMS . </a> <a href='#' class="threatopen" style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11; color:#C1C1C1" id='<?php echo $id_status; ?>' title='SMS Terkait'>SMS Terkait (<?php echo $jum; ?>)</a>

<!--Link Komentari diatas akan menampilkan dan menghilangkan class commentupdate -->
<div class="commentupdate" style='display:none' id='commentbox<?php echo $id_status; ?>'>
<div class="stcommenttext" >
<form method="post" action="">
<input type="text" size="100%" id="ctextarea<?php echo $id_status; ?>">
<br />
<input type="submit" value=" Kirim " id="<?php echo $id_status;?>" class="comment_button"/>
</form>
</div>
</div>

<!--Link Komentari diatas akan menampilkan dan menghilangkan class commentupdate -->
<div class="commentupdate" style='display:none' id='threatbox<?php echo $id_status; ?>'>
<div class="stcommenttext" >
<?php
$ot=mysql_query("select SenderNumber from inbox where ID='$id_status'");
$tot=mysql_fetch_array($ot);
$inb=mysql_query("select SenderNumber,TextDecoded from inbox where SenderNumber='$tot[SenderNumber]' and ID<>'$id_status'");
while($tinb=mysql_fetch_array($inb))
{
echo "<a class='blue'><b><hr>$nama</b></a> $tinb[TextDecoded]<hr>";
}
?>
</div>
</div>

</li>

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
