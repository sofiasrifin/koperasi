<?
include'../include/db.php'; 

    $handle = @fopen("update.sql", "r");
	$content = fread($handle, filesize("update.sql"));
	$split = explode(";", $content);
		
	for ($i=0; $i<=count($split)-1; $i++)
	{
	  mysql_query($split[$i]);
    }
echo"update database sukses <a href='index.php?id=beranda'>[kembali ke beranda]</a>";
	fclose($handle);

?>	