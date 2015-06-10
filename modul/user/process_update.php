<?
include'../include/db.php'; 
if (empty($file_name))
{
}
else{
$ver=mysql_query("select * from versi");
$tver=mysql_fetch_array($ver);

$path_parts = pathinfo("$file_name");

$jenis=$path_parts['extension'];
$nama=$path_parts['filename'];
$fi="$nama.$jenis";
$versi=update$tver[versi];
	if($versi==$nama)
	{
	$handle = @fopen("gammu.sql", "r");
	$content = fread($handle, filesize("gammu.sql"));
	$split = explode(";", $content);
	
	mysql_select_db("sql");
	
	for ($i=0; $i<=count($split)-1; $i++)
	{
	  mysql_query($split[$i]);
    }
	fclose($handle);
	
	// extract file update
	require_once('pclzip.lib.php');
	$archive = new PclZip(dirname(__FILE__).'/update.zip');
	if ($archive->extract(PCLZIP_OPT_PATH, dirname(__FILE__).'/') == 0) {
    echo "\n error while extract";
	} else {
    echo "\n extract ok";
	}


	}
}
?>