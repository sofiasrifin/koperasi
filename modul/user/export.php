<?php 
$id=$_GET['id'];
include'../include/conf.php'; 
include'../include/db.php';

header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=$id.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

if($id==inbox)
{

$select = "SELECT ReceivingDateTime,SenderNumber,TextDecoded FROM inbox"; 
$export = mysql_query($select); 
$count = mysql_num_fields($export); 
for ($i = 0; $i < $count; $i++) { 
$header .= mysql_field_name($export, $i)."\t"; 
$phrase  = "$header";
$healthy = array("ReceivingDateTime","SenderNumber", "TextDecoded");
$yummy   = array("Tanggal", "No HP", "Isi SMS");
$newphrase = str_replace($healthy, $yummy, $phrase);
} 
while($row = mysql_fetch_row($export)) { 
$line = ''; 
foreach($row as $value) { 
if ((!isset($value)) OR ($value == "")) { 
$value = "\t"; 
} else { 
$value = str_replace('"', '""', $value); 
$value = '"' . $value . '"' . "\t"; 
} 
$line .= $value; 
} 
$data .= trim($line)."\n"; 
} 
$data = str_replace("\r", "", $data); 
if ($data == "") { 
$data = "\n(0) Records Found!\n"; 
} 
print "$newphrase\n$data"; 

}

if($id==inbox_group)
{

$select = "SELECT tgl,no_hp,isi FROM inbox_grup_sms"; 
$export = mysql_query($select); 
$count = mysql_num_fields($export); 
for ($i = 0; $i < $count; $i++) { 
$header .= mysql_field_name($export, $i)."\t"; 
$phrase  = "$header";
$healthy = array("no_hp","isi", "tgl");
$yummy   = array("No HP", "Isi SMS", "Tanggal");
$newphrase = str_replace($healthy, $yummy, $phrase);
} 
while($row = mysql_fetch_row($export)) { 
$line = ''; 
foreach($row as $value) { 
if ((!isset($value)) OR ($value == "")) { 
$value = "\t"; 
} else { 
$value = str_replace('"', '""', $value); 
$value = '"' . $value . '"' . "\t"; 
} 
$line .= $value; 
} 
$data .= trim($line)."\n"; 
} 
$data = str_replace("\r", "", $data); 
if ($data == "") { 
$data = "\n(0) Records Found!\n"; 
} 
print "$newphrase\n$data"; 

}

if($id==outbox)
{

$select = "SELECT DestinationNumber,Status,TextDecoded FROM sentitems"; 
$export = mysql_query($select); 
$count = mysql_num_fields($export); 
for ($i = 0; $i < $count; $i++) { 
$header .= mysql_field_name($export, $i)."\t"; 
$phrase  = "$header";
$healthy = array("DestinationNumber","Status", "TextDecoded");
$yummy   = array("No Tujuan", "Status", "Isi SMS");
$newphrase = str_replace($healthy, $yummy, $phrase);
} 
while($row = mysql_fetch_row($export)) { 
$line = ''; 
foreach($row as $value) { 
if ((!isset($value)) OR ($value == "")) { 
$value = "\t"; 
} else { 
$value = str_replace('"', '""', $value); 
$value = '"' . $value . '"' . "\t"; 
} 
$line .= $value; 
} 
$data .= trim($line)."\n"; 
} 
$data = str_replace("\r", "", $data); 
if ($data == "") { 
$data = "\n(0) Records Found!\n"; 
} 
print "$newphrase\n$data"; 

}

if($id==phonebook)
{

$select = "SELECT nama,no_hp,alamat,grup FROM data_pelanggan"; 
$export = mysql_query($select); 
$count = mysql_num_fields($export); 
for ($i = 0; $i < $count; $i++) { 
$header .= mysql_field_name($export, $i)."\t"; 
} 
while($row = mysql_fetch_row($export)) { 
$line = ''; 
foreach($row as $value) { 
if ((!isset($value)) OR ($value == "")) { 
$value = "\t"; 
} else { 
$value = str_replace('"', '""', $value); 
$value = '"' . $value . '"' . "\t"; 
} 
$line .= $value; 
} 
$data .= trim($line)."\n"; 
} 
$data = str_replace("\r", "", $data); 
if ($data == "") { 
$data = "\n(0) Records Found!\n"; 
} 
print "$header\n$data"; 

}


?> 