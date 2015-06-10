<?
include'../include/db.php'; 
$sql=mysql_query("SELECT * FROM data_siswa where kelas='$kelas'");
while($sis=mysql_fetch_array($sql))
{
$nis=$sis[nis];
$nama=$sis[nama];
$sql2=mysql_query("SELECT * FROM nilai where nis='$nis' and part=$part");
$nilai=mysql_fetch_array($sql2);
$bin=$nilai[bin];
$mtk=$nilai[mtk];
$big=$nilai[big];
$ipa=$nilai[ipa];
$lulus=$nilai[lulus];
echo"$big";
?>
<?
}
?>
</body>
