<?
include'../include/db.php'; 

for ($i=0; $i<=100; $i++)
{
$sql=mysql_query("SELECT * FROM data_siswa where nis='$countries[$i]'");
$sis=mysql_fetch_array($sql);
$nis=$sis[nis];
$no_hp=$sis[no_hp];
$nama=$sis[nama];
if ($no_hp<>0)
{
$inp=mysql_query("INSERT INTO send SET nis='$nis',no_hp='$no_hp',nama='$nama'");
}
}
?>
<SCRIPT LANGUAGE="JavaScript1.2">
function open4() 
{
<?
$sql=mysql_query("SELECT * FROM send");
while($sis1=mysql_fetch_array($sql))
{
$nis=$sis1[nis];
$no_hp=$sis1[no_hp];
$nama=$sis1[nama];
$words = explode (' ', $nama);
$nama_siswa = join('+', $words);

$sql2=mysql_query("SELECT * FROM nilai where nis=$nis and part=$part");
$nilai=mysql_fetch_array($sql2);
$bin=$nilai[bin];
$mtk=$nilai[mtk];
$big=$nilai[big];
$ipa=$nilai[ipa];
$lulus=$nilai[lulus];
$words1 = explode (' ', $lulus);
$lus = join('+', $words1);
?>
a= window.open("http://127.0.0.1:8800/?PhoneNumber=<? echo"$no_hp"; ?>&Text=<? echo"Try+Out,+$nama_siswa+:+BIN+$bin,+MTK+$mtk,+BIG+$big,+IPA+$ipa+Dinyatakan+$lus"; ?>","myName0","width=300,height=180,top='+screen.availTop+',left=0',statusbar=0,toolbar=0,scrollbars=0,location=0");
<?
}
?>
}
</SCRIPT>

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
var targetURL="nilai_sms.php"
//change the second to start counting down from
var countdownfrom=25


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
setTimeout("countredirect()",25)
}

countredirect()
//-->
</script>

</body>
