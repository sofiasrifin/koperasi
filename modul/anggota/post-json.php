<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'reg';
$sortorder 	= isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
$query 		= isset($_POST['query']) ? $_POST['query'] : false; //"A097049"; //
$qtype 		= isset($_POST['qtype']) ? $_POST['qtype'] : false; // "nopaspor"; //

$usingSQL = true;
function runSQL($rsql) {
	include '../../inc/inc.koneksi.php';
	
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

$where = " "; 
if ($query) $where = " WHERE $qtype LIKE '%".str_replace("'","\'",$query)."%' ";

$sql = "SELECT reg,no_anggota,nama,templahir,tgllahir,fakjur,agama,jk,alamat,telp FROM anggota $where $sort $limit";
$result = runSQL($sql);

$total = countRec("reg","anggota $where");

header("Content-type: application/json");
//$responce = (object) null;
ini_set('display_errors', 0);
$responce->page = $page; 
$responce->total = $total; 
$responce->records = $total; 
$i=$start; 
while($line = mysql_fetch_array($result)){ 
$i++; 
$responce->rows[$i]['id']   = $line["reg"]; 
$responce->rows[$i]['cell'] = array($i,$line["reg"],	//sesuai dg yang di databas
									$line["no_anggota"],
									$line["nama"],
									$line["templahir"],
									$line["tgllahir"],
									$line["fakjur"],
									$line["agama"],
									$line["jk"],
									$line["alamat"],
									$line["telp"],
									); 
} 
echo json_encode($responce); 
?>

















