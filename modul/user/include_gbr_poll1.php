<?php
include'../include/conf.php'; 
include'../include/db.php';
$id_poll=$_GET['id_poll'];
?>

<table width="100%" class='adminlist'>
<?php
$warnaGenap = "#E0E0E0";   // warna abu-abu
$warnaGanjil = "#F5F5F5";  // warna putih
$counter = 1;
$foto=mysql_query("select jawaban,foto,jumlah from poll where id_poll='$id_poll'");
while($tfoto=mysql_fetch_array($foto))
{
if ($counter % 2 == 0) $warna = $warnaGenap;
else $warna = $warnaGanjil;
?>
              <tr bgcolor='<?php echo $warna;?>' class='baca1'>
                <td width="41%"><a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ganti_gambar_poll.php?jawaban=<?php echo $tfoto[jawaban];?>&foto=<?php echo $tfoto[foto];?>', 'Ganti Gambar Polling', 'width=320px,height=200px,center=1,resize=0,scrolling=0', 'recal')"><?php echo"<img src='$tfoto[foto]' width='32px' height='40'></a>"; ?></td>
                <td width="59%" align="center" bgcolor="<?php echo $warna;?>"><?php echo"$tfoto[jawaban]<br><strong>$tfoto[jumlah]</strong>"; ?></td>
              </tr>
<?php
$counter++;
}
?>
            </table>