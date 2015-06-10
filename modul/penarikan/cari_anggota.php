<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
include "../../inc/fungsi_koperasi.php";

$table	= 'anggota';
$id	= $_POST['cari'];
$text	= "SELECT *
			FROM $table WHERE no_anggota= '$id'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
	$r=mysql_fetch_array($sql);
	if ($r[jk]=='L'){
		$sex = 'Laki-laki';
	}else{
		$sex = 'Perempuan';
	}
	//memenggil fungsi
	$saldo = saldo($r['no_anggota']);
	echo "<table>
		<tr>
			<td>Nama</td>
			<td>: $r[nama]</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>: $sex</td>
		</tr>
		<tr>
			<td>Tempat, Tgl Lahir</td>
			<td>: $r[templahir], ".jin_date_str($r[tgl_lahir])."</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: $r[alamat]</td>
		</tr>
		<tr>
			<td>Saldo</td>
			<td>: ".number_format($saldo)."</td>
		</tr>
	</table>";
}
?>