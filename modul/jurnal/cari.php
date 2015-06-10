<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

//$table	= 'h_jurnal';
$id		= $_POST['id'];
$where	= "WHERE idjurnal='$id'";
$text	= "SELECT c.no_jurnal, c.tgl, c.uraian, b.kode_akun, b.nama_akun, debet, kredit
			FROM d_jurnal AS a
			JOIN akun AS b
			JOIN jurnal AS c ON a.kode_akun = b.kode_akun
			AND a.no_jurnal = c.no_jurnal
			$where";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['tgl']			= $r['tgl'];
	$data['keterangan']		= $r['uraian'];
	$data['kodeakun']		= $r['kode_akun'];
	$data['namaakun']		= $r['nama_akun'];
	//$data['debetkredit']	= $r[debetkredit];
	//$data['jml']			= $r[jml];
	
	echo json_encode($data);
}
}else{
	$data['tgl']			= '';
	$data['keterangan']		= '';
	$data['kodeakun']		= '';
	$data['namaakun']		= '';
	//$data['debetkredit']	= '';
	//$data['jml']			= '';
	echo json_encode($data);
}
?>