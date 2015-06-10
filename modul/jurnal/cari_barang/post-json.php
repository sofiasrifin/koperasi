<?php
$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'kode_barang';
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

$where = " "; //"WHERE nopaspor='A097049'";
//if ($query) $where = " WHERE $qtype LIKE '%".mysql_real_escape_string($query)."%' ";
if ($query) $where = " WHERE $qtype LIKE '%".str_replace("'","\'",$query)."%' ";

$sql = "SELECT kode_barang,nama_barang,harga_jual,stok_awal,
		if((SELECT sum(jmlbeli) FROM d_beli WHERE kode_barang=barang.kode_barang) is NULL,0,(SELECT sum(jmlbeli) FROM d_beli WHERE kode_barang=barang.kode_barang)) as jmlbeli,
		if((SELECT sum(jmljual) FROM d_jual WHERE kode_barang=barang.kode_barang) is NULL,0,(SELECT sum(jmljual) FROM d_jual WHERE kode_barang=barang.kode_barang)) as jmljual,
		((stok_awal+
		if((SELECT sum(jmlbeli) FROM d_beli WHERE kode_barang=barang.kode_barang) is NULL,0,(SELECT sum(jmlbeli) FROM d_beli WHERE kode_barang=barang.kode_barang)))-
		if((SELECT sum(jmljual) FROM d_jual WHERE kode_barang=barang.kode_barang) is NULL,0,(SELECT sum(jmljual) FROM d_jual WHERE kode_barang=barang.kode_barang)))	as stokakhir
				FROM barang 
		$where $sort $limit";
$result = runSQL($sql);

$total = countRec("kode_barang","barang $where");

header("Content-type: application/json");
ini_set('display_errors', 0);
$responce->page = $page; 
$responce->total = $total; 
$responce->records = $total; 
$i=$start; 
while($line = mysql_fetch_array($result)){ 
$i++; 
//$stokakhir	= ($line["stok_awal"]+$line["jmlbeli"])+$line["jmljual"] ; 
$responce->rows[$i]['id']   = $line["kode_barang"]; 
$responce->rows[$i]['cell'] = array($i,$line["kode_barang"],$line["nama_barang"],
							number_format($line["harga_jual"]),$line["stok_awal"],$line["jmlbeli"],$line["jmljual"],$line["stokakhir"]); 
} 
echo json_encode($responce); 
?>