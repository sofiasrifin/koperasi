<?
if ($id==stop)
{
// menjalankan command menghentikan service Gammu
passthru("gammu-smsd -k");
echo"<a href='index.php'>kembali</a>";
}
if ($id==start)
{
passthru("gammu-smsd -c smsdrc -s");
echo"<a href='index.php'>kembali</a>";

}


?>