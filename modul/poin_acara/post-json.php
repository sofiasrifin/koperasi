<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'id_poin';
$sortorder 	= isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
$query 		= isset($_POST['query']) ? $_POST['query'] : false; //"A097049"; //
$qtype 		= isset($_POST['qtype']) ? $_POST['qtype'] : false; // "nopaspor"; //

include '../../inc/fungsi_tanggal.php';

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
/*
$where = " "; 
if ($query) $where = " WHERE $qtype LIKE '%".str_replace("'","\'",$query)."%' ";
*/

if(!empty($query)){
	if($qtype=='tgl'){
		$where = " WHERE $qtype ='".jin_date_sql($query)."'";
	}else{
		$where = " WHERE $qtype LIKE '%".str_replace("'","\'",$query)."%' ";
	}
}else{
	$where = " "; 
}


$sql = "SELECT * FROM
		poin_acara as a
		JOIN acara as b
		JOIN sie as c
		JOIN anggota as d
		ON a.id_acara=b.id_acara AND a.id_sie=c.id_sie AND a.no_anggota=d.no_anggota
		$where $sort $limit";
$result = runSQL($sql);

$total = countRec("id_poin","poin_acara $where");

header("Content-type: application/json");
ini_set('display_errors', 0);
$responce->page = $page; 
$responce->total = $total; 
$responce->records = $total; 
$i=$start; 
while($line = mysql_fetch_array($result)){ 
$i++; 
$responce->rows[$i]['id']   = $line["id_poin"]; 
$responce->rows[$i]['cell'] = array($i,$line["id_poin"],$line["no_anggota"],$line["nama"],jin_date_str($line["tgl"]),$line["nama_acara"],$line["nama_sie"],$line["jumlahpoin"]); 
} 
echo json_encode($responce); 
?>