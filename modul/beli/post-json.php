<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'kodebeli';
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
	if($qtype=='tglbeli'){
		$where = " WHERE $qtype ='".jin_date_sql($query)."'";
	}else{
		$where = " WHERE $qtype LIKE '%".str_replace("'","\'",$query)."%' ";
	}
}else{
	$where = " "; 
}


$sql = "SELECT kodebeli,tglbeli,h_beli.kode_supplier,user_id,nama_supplier,
		(SELECT count(*) FROM d_beli WHERE kodebeli=h_beli.kodebeli) as jml,
		(SELECT sum(hargabeli) FROM d_beli WHERE kodebeli=h_beli.kodebeli) as total
		FROM h_beli 
		JOIN supplier 
		ON h_beli.kode_supplier=supplier.kode_supplier
		$where $sort $limit";
$result = runSQL($sql);

$total = countRec("kodebeli","h_beli $where");

header("Content-type: application/json");
$responce->page = $page; 
$responce->total = $total; 
$responce->records = $total; 
$i=$start; 
while($line = mysql_fetch_array($result)){ 
$i++; 
$responce->rows[$i]['id']   = $line["kodebeli"]; 
$responce->rows[$i]['cell'] = array($i,$line["kodebeli"],jin_date_str($line["tglbeli"]),$line["kode_supplier"],$line["nama_supplier"],
							$line["jml"],number_format($line["total"]),$line["user_id"]); 
} 
echo json_encode($responce); 
?>