<?
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 

include'cek_session.php'; 


for ($i=0; $i<=100; $i++)
{
$sql=mysql_query("SELECT * FROM data_siswa where nis='$countries[$i]'");
$row=mysql_fetch_array($sql);
	$ambil=mysql_query("SELECT * FROM kirim where id='2'");
	$tmpl=mysql_fetch_array($ambil);
	$hp=$tmpl[no_hp];
	$no_hp=$row[no_hp];
	
	if ($no_hp<>'')
	{
		if($hp=='0')
		{
		$update=mysql_query("UPDATE kirim SET no_hp='$no_hp' WHERE id='2'");
		}
		else
		{
		$update=mysql_query("UPDATE kirim SET no_hp='$hp,$no_hp' WHERE id='2'");
		}

	}
$words = explode (' ', $text);
$text = join('+', $words);
$sender=$tmpl[no_hp];
?>

<SCRIPT LANGUAGE="JavaScript1.2">
function open4() 
{
a= window.open("http://127.0.0.1:8800/?PhoneNumber=<? echo"$sender"; ?>&Text=<? echo"$text"; ?>","myName0","width=300,height=180,top='+screen.availTop+',left=0',statusbar=0,toolbar=0,scrollbars=0,location=0");
}
</SCRIPT>

<?

}

?>

<body onLoad="open4()" >
<form name="redirect">
<center>
<font face="Arial"><b>You will be redirected to the script in<br><br>
<form>
<input type="text" size="3" name="redirect2">
</form>
seconds</b></font>
</center>

<script>
<!--

/*
Count down then redirect script
By Website Abstraction (http://wsabstract.com)
Over 400+ free scripts here!
*/

//change below target URL to your own
var targetURL="kirim_sms.php"
//change the second to start counting down from
var countdownfrom=15


var currentsecond=document.redirect.redirect2.value=countdownfrom+1
function countredirect(){
if (currentsecond!=1){
currentsecond-=1
document.redirect.redirect2.value=currentsecond
}
else{
window.location=targetURL
return
}
setTimeout("countredirect()",15)
}

countredirect()
//-->
</script>

</body>