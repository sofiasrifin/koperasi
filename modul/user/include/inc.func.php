<?php
function saveMessage($filename, $data)
{
    $fp = fopen($filename, 'w');
    fwrite($fp, $data);
    fclose($fp);
}
function loadMessage($filename)
{
    $msg = file($filename);
    if ($msg) {
        return implode('', $msg);
    }
    return false;
}
function showAutorespond($keyword) {
	$sql = "select keyword, answer from autorespond where keyword='$keyword' limit 1";
	$q = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($q) > 0) {
		$row = mysql_fetch_row($q);
		$retval[0] = $row[0];
		$retval[1] = $row[1];
		$retval[2] = "1";
	} else {
		$retval[2] = "0";
	}
	
	return $retval;
}
function resultBirthday($date) {
		$awalp = explode("-",$date);
	$awalM = $awalp[0]; //month
	$awalT = $awalp[1]; //tanggal
	$sql = "select * from phonebook where $awalM = month(birthdate)
				and $awalT = RIGHT(birthdate,2) order by fullname ASC";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row = mysql_fetch_array($q)) {
		$retVal[$i][0] = $row[nohp];
		$retVal[$i][1] = $row[fullname];
	$i++;
	}
	return $retVal;
}
function listBirthday() {
	$sql = "select * from phonebook where month(now()) - month(birthdate) = 0 
				and (RIGHT(CURRENT_DATE,2)- RIGHT(birthdate,2)) = 0  order by fullname ASC";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row = mysql_fetch_array($q)) {
		$retVal[$i][0] = $row[nohp];
		$retVal[$i][1] = $row[fullname];
		$retVal[$i][2] = $row[birthdate];
	$i++;
	}
	return $retVal;
}
function replaceName($hp) {
	
	$sql = "select fullname from phonebook where nohp='$hp' order by id DESC limit 1";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);
	return $row[0];
}
function listFooterTemplate() {
	$sql = "select * from templatefooter order by message ASC";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row = mysql_fetch_array($q)) {
		$retVal[$i][0] = $row[message];
	$retVal[$i][1] = $row[id];
	$i++;
	}
	return $retVal;
}
function listHeaderTemplate() {
	$sql = "select * from templateheader order by message ASC";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row = mysql_fetch_array($q)) {
		$retVal[$i][0] = $row[message];
	$retVal[$i][1] = $row[id];
	$i++;
	}
	return $retVal;
}
function countGrup($grupid) {
		
	$sql = "select id from phonebook where grupid='$grupid'";
	$q = mysql_query($sql) or die(mysql_error());
	$retVal = mysql_num_rows($q);

	return $retVal;
}
function countSMSuser($user) {
	$sql= "select count(id) from sent where userid='$user'";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);
	return $row[0];
}
function countStatus($stat) {
	$sql= "select count(id) from sent where status='$stat'";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);
	return $row[0];
}
function countVoter($nohp) {
	$sql= "select count(nohp) from poll_ips where nohp='$nohp'";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);
	return $row[0];
}

function listVoter($idpoll) {
	$sql= "select distinct(nohp) from poll_ips where id='$idpoll'";
	$q = mysql_query($sql) or die(mysql_error());
	$i = 0;
	while ($row = mysql_fetch_row($q)) {	
	$retVal[$i][0] = $row[0];
	$retVal[$i][1] = countVoter($row[0]);
	$i++;
	}
	return $retVal;
}

function getWinner($idpoll,$by) {
	if ($by == "0") {
	$sql= "select nohp from poll_ips where id='$idpoll' order by RAND() limit 1";
} else {
	$sql= "select nohp from poll_ips where id='$idpoll'";
}
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);
	
	return $row[0];
}

function pollWinner($idpoll) {
	$sql= "select hpnumber from poll_winner where id='$idpoll'";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);
	
	return $row[0];
}

function countPOLL($idpoll,$chs) {
	if ($chs == "ALL") {
	$sql= "select count(nohp) from poll_ips where id='$idpoll'";
} else {
	$sql= "select count(nohp) from poll_ips where id='$idpoll' and chs='$chs'";

}
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);
	
	return $row[0];
}

function incomingPOLL($hp,$text) {
	$sql= "insert into incoming_poll VALUES(null,'$hp','$text',now())";
	$q = mysql_query($sql) or die(mysql_error());
}


function isExistPoll($nohp) {
		$sql="select nohp from poll_ips where nohp='$nohp'";
		$q = mysql_query($sql) or die(mysql_error());
		$retVal = mysql_num_rows($q);
	return $retVal;
	
}


function insertPOLL($sender,$idpoll,$chs) {
		$sql= "insert into poll_ips VALUES('$sender','$idpoll','$chs',now())";
	$q = mysql_query($sql) or die(mysql_error());
}

function isExistPollChs($idvote,$chs) {
		$sql="select * from poll_options where id='$idvote' and chs='$chs'";
		$q = mysql_query($sql) or die(mysql_error());
		$retVal = mysql_num_rows($q);
	return $retVal;
	
}

function theVote($idvote) {
	$retVal = array();
		$sql="select * from poll where id='$idvote'";
		$q = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($q);

		$retVal[0] = $row[id];
		$retVal[1] = $row[question];
		$retVal[2] = $row[aktif];
		$retVal[3] = $row[multivote];
		$retVal[4] = $row[thedatetime];
		$retVal[5] = mysql_num_rows($q);
	return $retVal;
	
}


function cekDuplicate($nohp) {
$sql="select fullname,grupid,id from phonebook where nohp='$nohp'";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row=mysql_fetch_array($q)) {
		$retval[$i][0] = $row[fullname];
	$retval[$i][1] =  getGroupName($row[grupid]);
	$retval[$i][2] =  $row[id];
	$i++;
	}
return $retval;
}


function isHPexist($nohp,$grpid) {
//global $sql, $num;
		$sql="select nohp from phonebook where nohp='$nohp' AND grupid='$grpid'";

		$q = mysql_query($sql) or die(mysql_error());
		$num =mysql_num_rows($q);
		//echo $sql." ".$num;
		if ($num > 0) {
			$retVal = TRUE;
		} else {
			$retVal = FALSE;
		}
	return $retVal;
}

function removeDelimiter($str,$delimiter) {
$retval = str_replace($delimiter," ",$str);
return $retval;
}

function replaceIntlCode($hp,$intl) {
	if ($intl == ""){
		$retVal = $hp;
	} else {
		$rest = substr($hp, 0, 1);
		if ($rest == "0") {
			$addchar = $intl;
			$rest2 = substr($hp, 1,strlen($hp));
			$retVal = $addchar.$rest2;
		} else {
			$retVal = $hp;
		}
	}
	return $retVal;
}



function getAccess($user) {
//GLOBAL $expUser;
	$sql="select category_admin from users where userid='$user'";
	$q = mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_row($q);
	$expUser = explode("-",$row[0]);
	for ($i=0; $i<count($expUser)+1; $i++) {
		$retVal[] = $expUser[$i];
		//echo $expUser[$i]."<br>";
	}
	return $retVal;
}


function incomingMsg($id) {
$sql = "select * from incoming where id='$id'";
$q=mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($q);
$retVal[0] = $row[id];
$retVal[1] = $row[hpnumber];
$retVal[2] = $row[message];
$retVal[3] = $row[thedatetime];
return $retVal;
}

function CSVExportInbox($query,$filename,$delimiter) {
    $sql_csv = mysql_query($query) or die("Error: " . mysql_error()); //Replace this line with what is appropriate for your DB abstraction layer
    
    header("Content-type:text/octect-stream");
    header("Content-Disposition:attachment;filename=".$filename.".csv");
    while($row = mysql_fetch_row($sql_csv)) {
    	$row[1] = str_replace($delimiter,"",$row[1]);  
      $row[1] = str_replace("\"","",$row[1]);
      $row[1] = str_replace("'","",$row[1]);
      $row[1] = str_replace("\r"," ",$row[1]);
      $row[1] = str_replace("\n"," ",$row[1]);
        $msg = mysql_real_escape_string(stripslashes(implode($delimiter,$row)))."\n";
    		//print str_replace(";","",$msg);
    	print  $msg;
    }
   

    exit;
}


function CSVImportMsg($table, $fields, $csv_fieldname='csv',$delimiter,$hapus) {
    //print $_FILES[$csv_fieldname]['name'];
    if(!$_FILES[$csv_fieldname]['name']) return;

    $handle = fopen($_FILES[$csv_fieldname]['tmp_name'],'r');
    if(!$handle) die('Cannot open uploaded file.');

    $row_count = 0;
    $sql_query = "INSERT INTO $table(". implode(',',$fields) .") VALUES(";

    $rows = array();

    //Read the file as csv
    while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
        $row_count++;
        foreach($data as $key=>$value) {         
            $data[$key] = $value ? "'".trim(mysql_real_escape_string( $value ))."'" : "NULL" ;
        }
        $rows[] = implode(",",$data);
    }
    $sql_query .= implode("),(", $rows);
    $sql_query .= ")";
    fclose($handle);
    if(count($rows)) { //If some recores  were found,
        //Replace these line with what is appropriate for your DB abstraction layer
      	if ($hapus == "1") {
        	mysql_query("delete from $table") or die("Error import data!!");
      	}
        mysql_query($sql_query) or die(die("Error import data!!"));
				$nummm = $row_count;
					echo "<script language=\"JavaScript\">";
										echo "alert(\"Successfully imported ".$nummm." record(s)\");";
										echo "</script>";
										
       // print '<br/><br/><b>Successfully imported '.$nummm.' record(s)</b>';
    } else {
        print 'Cannot import data - no records found.';
    }
} 




function CSVExport($query,$filename,$delimiter,$header) {
    $sql_csv = mysql_query($query) or die("Error: " . mysql_error()); //Replace this line with what is appropriate for your DB abstraction layer
    
    header("Content-type:text/octect-stream");
    header("Content-Disposition:attachment;filename=".$filename.".csv");
				if ($header == "1"){
				print  "name".$delimiter."hpnumber\n";
    	}
    while($row = mysql_fetch_row($sql_csv)) {
        
        print stripslashes(implode($delimiter,$row))."\n";
    }
   

    exit;
}

//Import the contents of a CSV file after uploading it
//http://www.bin-co.com/php/scripts/csv_import_export/
//Aruguments : $table - The name of the table the data must be imported to
//                $fields - An array of fields that will be used
//                $csv_fieldname - The name of the CSV file field
function CSVImport($table, $fields, $csv_fieldname='csv',$grupid,$delimiter,$header,$hapus) {
    //print $_FILES[$csv_fieldname]['name'];
    if(!$_FILES[$csv_fieldname]['name']) return;

    $handle = fopen($_FILES[$csv_fieldname]['tmp_name'],'r');
    if(!$handle) die('Cannot open uploaded file.');

    $row_count = 0;
    $sql_query = "INSERT INTO $table(". implode(',',$fields) .",grupid,thedatetime) VALUES(";

    $rows = array();

    //Read the file as csv
    while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
        $row_count++;
        $data[] = $grupid;
        $data[] = date("Y-m-d H:i:s");
        foreach($data as $key=>$value) {         
            $data[$key] = $value ? "'".trim(mysql_real_escape_string( $value ))."'" : "NULL" ;
        }
        $rows[] = implode(",",$data);
    }
     if ($header == "1") {
		array_shift( $rows ); //hapus header
  }
    $sql_query .= implode("),(", $rows);
    $sql_query .= ")";
    fclose($handle);
 //echo $sql_query;
    if(count($rows)) { //If some recores  were found,
        //Replace these line with what is appropriate for your DB abstraction layer
      	if ($hapus == "1") {
        	mysql_query("delete from $table where grupid='$grupid'") or die("Error import data!!");
      	}
        mysql_query($sql_query) or die(die("Error import data!!"));
           if ($header == "1") {
				$nummm = $row_count-1;
			} else {
				$nummm = $row_count;
			}
					echo "<script language=\"JavaScript\">";
										echo "alert(\"Successfully imported ".$nummm." record(s)\");";
										echo "location.href=\"cp_kanan.php?cmd=".IMPORT_PHONEBOOK."\";";
										echo "</script>";
										
       // print '<br/><br/><b>Successfully imported '.$nummm.' record(s)</b>';
    } else {
        print 'Cannot import data - no records found.';
    }
} 


function incomingSMS($hp,$text) {
	$sql= "insert into incoming VALUES(null,'$hp','$text',now())";
	//echo $sql;
	$q = mysql_query($sql) or die(mysql_error());
}

function getPhonebook($nohp) {
	//global $sql;
	
	$sql = "select * from phonebook where nohp='$nohp' order by id DESC limit 1";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($q);

	$retVal[0] = $row[id];
	$retVal[1] = $row[grupid];
	$retVal[2] = $row[fullname];
	$retVal[3] = $row[nohp];
	$retVal[4] = $row[alamat];
	$retVal[5] = $row[birthdate];
	$retVal[6] = $row[keterangan];
	return $retVal;
}



function getFolderName($id) {
	$sql = "select * from folder where id='$id'";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($q);
	
	return $row[foldername];
}


function parsingStat($teks) {
	$text = trim($teks);
	$expText = explode("stat:",$text);
	$text2= explode("err:",$expText[1]);
	$stat = trim($text2[0]);
return $stat;
}

function parsingID($teks) {
	if (eregi('.req', $teks)) {
		$expStat = explode(".req",$teks);
		$smsID=trim($expStat[0]);
	} else {
		$smsID=trim($smsID1);
	}
return $smsID;
}

function removePlus($hp) {
$str = str_replace("+","",$hp);
return $str;
}
function listTemplate() {
	$sql = "select * from template order by subject ASC";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row = mysql_fetch_array($q)) {
		$retVal[$i][0] = $row[subject];
		$retVal[$i][1] = $row[message];
	$retVal[$i][2] = $row[id];
	$i++;
	}
	return $retVal;
}

function getGroupName($grupid) {
	$sql = "select grupid from grup where id='$grupid'";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);

	return $row[0];
}

function getGroupID($grup) {
	$sql = "select id from grup where grupid='$grup'";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($q);

	return $row[0];
}

function listGroupPhoneBooks() {
	$sql = "select * from grup order by grupname ASC";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row = mysql_fetch_array($q)) {
		$retVal[$i][0] = $row[grupid];
		$retVal[$i][1] = $row[grupname];
	$retVal[$i][2] = $row[id];
	$i++;
	}
	return $retVal;
}

function listPhoneBooks() {
	$sql = "select * from phonebook order by fullname ASC";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row = mysql_fetch_array($q)) {
		$retVal[$i][0] = $row[nohp];
		$retVal[$i][1] = $row[fullname];
	$i++;
	}
	return $retVal;
}

function listPhoneBooksSearch($key) {
	$sql = "select * from phonebook where (fullname like '%$key%' OR nohp like '%$key%') order by fullname ASC";
	$q = mysql_query($sql) or die(mysql_error());
	$i=0;
	while ($row = mysql_fetch_array($q)) {
		$retVal[$i][0] = $row[nohp];
		$retVal[$i][1] = $row[fullname];
	$i++;
	}
	return $retVal;
}


function ubahDate($tgl) {
	$awalp = explode("-",$tgl);
	$awalT = $awalp[0]; //tanggal
	$awalM = $awalp[1]; //month
	$awalY = $awalp[2];//year
	$awalX = $awalY."-".$awalM."-".$awalT;
	return $awalX;
}

function ubahDateIndo($tgl) {
	$awalp = explode("-",$tgl);
	$awalY = $awalp[0];//year
	$awalM = $awalp[1]; //month
	$awalT = $awalp[2]; //tanggal
	
	$awalX = $awalT."-".$awalM."-".$awalY;
	return $awalX;
}

function ubahDate3($tdate) {
		$exp1 = explode(" ",$tdate);
		$date =$exp1[0];
		$time =$exp1[1];
		
		$exp = explode("-",$date);
		$tyear = $exp[0];
		$tmonth = $exp[1];
		$ttgl= $exp[2];
		$retval = $ttgl."-".$tmonth."-".$tyear." ".$time;
		return  $retval;
}
	
	
function getGroup($grpid) {
		$sql="select grupid, grupname from grup where id='$grpid'";
		$q = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_row($q);
		$retVal = $row[0]." - ".$row[1];
		return $retVal;
}

function getUser($user) {
		$sql="select * from users where userid='$user'";
		$q = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($q);
		$retVal[0] = $row['fullname'];
		return $retVal;
}

function login($user, $pass) {
	$pass = md5($pass);
		$sql="select userid from users where userid='$user' AND password='$pass'";
		$q = mysql_query($sql) or die(mysql_error());
		$num =mysql_num_rows($q);
		if ($num > 0) {
			$retVal = TRUE;
		} else {
			$retVal = FALSE;
		}
	return $retVal;
}

function checkModem($host, $port) {
$fp = fsockopen($host, $port, $errno, $errstr);
if (!$fp) {
echo "errno: $errno \n";
echo "errstr: $errstr\n";
$retVal = FALSE;
} else {
$retVal = TRUE;
}
return $retVal;
}


function SendWapPush($host, $port, $username, $password, $phoneNoRecip, $msgText,$url,$report,$fromuserid) {
global $res;
$fp = fsockopen($host, $port, $errno, $errstr);
if (!$fp) {
echo "errno: $errno \n";
echo "errstr: $errstr\n";
return $result;
}

if ($report == "1") {
fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" . rawurlencode($msgText) ."&wapurl=" . rawurlencode($url) . "&ReceiptRequested=Yes HTTP/1.0\n");
} else {
fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" . rawurlencode($msgText) ."&wapurl=" . rawurlencode($url) . " HTTP/1.0\n");
}
if ($username != "") {
$auth = $username . ":" . $password;
echo "auth: $auth\n";
$auth = base64_encode($auth);
echo "auth: $auth\n";
fwrite($fp, "Authorization: Basic " . $auth . "\n");
}
fwrite($fp, "\n");

$res = "";

while(!feof($fp)) {
$res .= fread($fp,1);
}
fclose($fp);

$idmsg=parsingSentSMS($res);
	if ($fromuserid == "") {
insertSMS($phoneNoRecip,$msgText,$idmsg,$_SESSION[userid],$url);
} else {
	insertSMS($phoneNoRecip,$msgText,$idmsg,$fromuserid,$url);
}
return $res;
}

function SendSMS ($host, $port, $username, $password, $phoneNoRecip, $msgText,$report,$fromuserid) {
global $res;
$fp = fsockopen($host, $port, $errno, $errstr);
if (!$fp) {
echo "errno: $errno \n";
echo "errstr: $errstr\n";
return $result;
}

if ($report == "1") {
fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" . rawurlencode($msgText) . "&ReceiptRequested=Yes HTTP/1.0\n");
} else {
fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" . rawurlencode($msgText) . " HTTP/1.0\n");
}
if ($username != "") {
$auth = $username . ":" . $password;
echo "auth: $auth\n";
$auth = base64_encode($auth);
echo "auth: $auth\n";
fwrite($fp, "Authorization: Basic " . $auth . "\n");
}
fwrite($fp, "\n");

$res = "";

while(!feof($fp)) {
$res .= fread($fp,1);
}
fclose($fp);


	$idmsg=parsingSentSMS($res);
	if ($fromuserid == "") {
insertSMS($phoneNoRecip,$msgText,$idmsg,$_SESSION[userid],"");
} else {
	insertSMS($phoneNoRecip,$msgText,$idmsg,$fromuserid,"");
}

return $res;
}


function insertDraft($phoneNoRecip,$msgText,$date,$tipe,$theurl) {
	$phoneNoRecip=removePlus($phoneNoRecip);
	$sql= "insert into draft VALUES (null,'$msgText','$phoneNoRecip','$date',now(),'$_SESSION[userid]','$tipe','$theurl')";
		$q = mysql_query($sql) or die(mysql_error());
}


function insertSMS($phoneNoRecip,$msgText,$idmsg,$from,$theurl) {
	$phoneNoRecip=removePlus($phoneNoRecip);

	$sql= "insert into sent VALUES (null,'$idmsg','$msgText','$phoneNoRecip','',now(),'$from','$theurl')";
		$q = mysql_query($sql) or die(mysql_error());
}

function parsingSentSMS($teks){
	$values = explode("MessageID=", $teks);
	$str1 = $values[1];
	$str2 = explode(".req", $str1);
	$str = $str2[0];
return $str;
}

function ubahDate2($tdate) {
		$exp = explode("/",$tdate);
		$tyear = $exp[2];
		$tmonth = $exp[0];
		$ttgl= $exp[1];
		$retval = $tyear."-".$tmonth."-".$ttgl;
		return  $retval;
}


function isAllowed($hpnumber) {
		$hpnumber= str_replace("+","",$hpnumber);
		$sql= "select phone from sms_phonebook where phone='$hpnumber' and setpermission='1'";
		$q = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($q) == 0) {
			$retVal = "0";
		} else {
			$retVal = "1";
		}
		return $retVal;
}

function replacePlus($teks) {
	if (@eregi("+", $teks)) {
    $sender = trim($teks);
	} else {
		$sender = "+".trim($teks);
	}
	return $sender;
}


function addPlus($teks){
$addExp = explode(",",$teks);
$retVal = array();
if (count($addExp) > 1) {

	for ($i=0;$i<count($addExp);$i++) {
	$retVal[]=replacePlus(trim($addExp[$i]));
	}
} else {
	$retVal[] = replacePlus(trim($teks));
}
return implode(",",$retVal);
}


function cekIP($ip,$theIP) {
if (eregi($ip, $theIP))
{
    $found=TRUE;
} else {
	$found=FALSE;
}
return $found;
}

function getKonfigurasi() {
	$sql = "select * from configuration";
	$q = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($q);
	$retVal[0] 	= $row[theurl];
	$retVal[1] 	= $row[ipRestriction];
	$retVal[2] 	= $row[refreshTime];
	$retVal[3] 	= $row[max_row];
	$retVal[4] 	= $row[max_page];
	$retVal[5] 	= $row[txtTitle];
	$retVal[6] 	= $row[txtMotto];
	$retVal[7] 	= $row[theServer];
	$retVal[8] 	= $row[thePort];
	$retVal[9] 	= $row[imgLogo];
	$retVal[10] = $row[colorTxtTitle];
	$retVal[11] = $row[colorTxtMotto];
	$retVal[12] = $row[ipaddress];
	$retVal[13] = $row[tablecolorcell];
	$retVal[14] = $row[hovercolor];
	$retVal[15] = $row[headColorTable];
	$retVal[16] = $row[fontHeader];
	$retVal[17] = $row[fontColorNothing];
	$retVal[18] = $row[showlast];
	$retVal[19] = $row[captcha];
	$retVal[20] = $row[maxsend];
	$retVal[21] = $row[thecron];
	$retVal[22] = $row[inbox];
	$retVal[23] = $row[cronbirthday];
	$retVal[24] = $row[refreshBR];
	return $retVal;
}




function redirect($path)
{
    header("Location: $path");
    exit;
}

function recordSort($records, $field, $reverse, $defaultSortField = 0)
    {
            $uniqueSortId = 0;
            $hash = array(); $sortedRecords = array(); $tempArr = array(); $indexedArray = array(); $recordArray = array();

            foreach($records as $record) {
                $uniqueSortId++;
                $recordStr = implode("|", $record)."|".$uniqueSortId;
                $recordArray[] = explode("|", $recordStr);
            }

            $primarySortIndex = count($record);
            $records = $recordArray;

             foreach($records as $record) {
                $hash[$record[$primarySortIndex]] = $record[$field];
             }
            uasort($hash, "strnatcasecmp");
            if($reverse)
            $hash = array_reverse($hash, true);

            $valueCount = array_count_values($hash);

            foreach($hash as $primaryKey => $value) {
                $indexedArray[] = $primaryKey;
            }         

            $i = 0;
            foreach($hash as $primaryKey => $value) {
                $i++;
                if($valueCount[$value] > 1) {
                    foreach($records as $record)  {
                        if($primaryKey == $record[$primarySortIndex]) {
                            $tempArr[$record[$defaultSortField]."__".$i] = $record;
                            break;
                        }
                    }

                    $index = array_search($primaryKey, $indexedArray);

                    if( ($i == count($records)) || ($value != $hash[$indexedArray[$index+1]]) )  {
                        uksort($tempArr, "strnatcasecmp");

                        if($reverse)
                        $tempArr = array_reverse($tempArr);

                        foreach($tempArr as $newRecs) {
                            $sortedRecords [] = $newRecs;
                        }

                        $tempArr = array();
                    }
                }
                else {
                    foreach($records as $record)  {
                       if($primaryKey == $record[$primarySortIndex])  {
                                $sortedRecords[] = $record;
                                break;
                        }
                    }
                }
            }
            return $sortedRecords;
    }
 
function formatMonth($month) {
	switch($month) 
	{
	
		case 1:
		$month = 'January'; 
		break;
	
		case 2:
		$month = 'February'; 
		break;
	
		case 3:
		$month = 'March'; 
		break;
	
		case 4:
		$month = 'April'; 
		break;

		case 5:
		$month = 'May'; 
		break;

		case 6:
		$month = 'June'; 
		break;

		case 7:
		$month = 'July'; 
		break;

		case 8:
		$month = 'August'; 
		break;

		case 9:
		$month = 'September'; 
		break;

		case 10:
		$month = 'October'; 
		break;

		case 11:
		$month = 'November'; 
		break;

		case 12:
		$month = 'December';
		break;
		
		default :
		$month = 'Invalid Month';
		break;
		
		}
	return $month;
}
?>