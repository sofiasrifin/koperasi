<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'kode_akun';
$sortorder 	= isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
$query 		= isset($_POST['query']) ? $_POST['query'] : false; //"A097049"; //
$qtype 		= isset($_POST['qtype']) ? $_POST['qtype'] : false; // "nopaspor"; //

$usingSQL = true;
function runSQL($rsql) {
	include '../../../inc/inc.koneksi.php';
	
	$result = mysql_query($rsql) or die ($rsql);
	return $result;
	mysql_close($connect);
}

function countRec($fname,$tname) {
	$sql = "SELECT count($fname) FROM $tname ";
	$result = runSQL($sql);
	while ($row = mysql_fetch_array($result)) {
		return $row[0];
	}
}

$sort = "ORDER BY $sortname $sortorder";
$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$where = "WHERE kode_akun IN (111,112,113,114,115,116,117,118,119,121,122,123,124,125,126,127,128,129,131,132,133,134,135,
						  511,512,513,514,515,516,517,518,519,521,522,531,532,533,534,535,541,542,543,544)"; 
//if ($query) $where = " WHERE $qtype LIKE '%".mysql_real_escape_string($query)."%' ";
if ($query) $where = " WHERE $qtype LIKE '".str_replace("'","\'",$query)."%' ";

$sql = "SELECT * FROM akun
		$where $sort $limit";
$result = runSQL($sql);

$total = countRec("kode_akun","akun $where");

header("Content-type: application/json");
$responce->page = $page; 
$responce->total = $total; 
$responce->records = $total; 
$i=$start; 
while($line = mysql_fetch_array($result)){ 
$i++; 
//$stokakhir	= ($line["stok_awal"]+$line["jmlbeli"])+$line["jmljual"] ; 
$responce->rows[$i]['id']   = $line["kode_akun"]; 
$responce->rows[$i]['cell'] = array($i,$line["kode_akun"],$line["nama_akun"]); 
} 
echo json_encode($responce); 
?>