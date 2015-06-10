<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'idjurnal';
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
if(!empty($query)){
	if($qtype=='tgl'){
		$where = " WHERE $qtype ='".jin_date_sql($query)."'";
	}else{
		$where = " WHERE $qtype LIKE '%".str_replace("'","\'",$query)."%' ";
	}
}else{
	$where = " WHERE a.kode_akun IN (111,112,113,114,115,116,117,118,119,121,122,123,124,125,126,127,128,129,131,132,133,134,135,411,412,413,414,415,416,421,422)"; 
}
*/
$sql = "SELECT c.no_jurnal, c.tgl, c.uraian, b.kode_akun, b.nama_akun, debet, kredit
	FROM d_jurnal AS a
	JOIN akun AS b
	JOIN jurnal AS c ON a.kode_akun = b.kode_akun
	AND a.no_jurnal = c.no_jurnal
	WHERE a.kode_akun IN (111,112,113,114,115,116,117,118,119,121,122,123,124,125,126,127,128,129,131,132,133,134,135,411,412,413,414,415,416,421,422) $sort $limit";
$result = runSQL($sql);

$total = countRec("no_jurnal","d_jurnal $where");

header("Content-type: application/json");
$responce->page = $page; 
$responce->total = $total; 
$responce->records = $total; 
$i=$start; 
while($line = mysql_fetch_array($result)){ 
$i++; 
$responce->rows[$i]['id']   = $line["no_jurnal"]; 
$responce->rows[$i]['cell'] = array($i,$line["no_jurnal"],jin_date_str($line["tgl"]),$line["kode_akun"],$line["nama_akun"],$line["uraian"],number_format($line["debet"]),number_format($line["kredit"])); 
} 
echo json_encode($responce); 
?>