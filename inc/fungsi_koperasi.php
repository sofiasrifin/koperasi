<?php

function namakoperasi($id){
	$sql	= "SELECT * 
				FROM profile
				WHERE id='$id'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['koperasi'];
	}else{
		$hasil		= '';
	}
	return $hasil;
}
function alamatkoperasi($id){
	$sql	= "SELECT * 
				FROM profile
				WHERE id='$id'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['alamat']." ".$data['kota']."<br>".
					 "Phone : ".$data['hp']."<br>".
					 "Fax : ".$data['fax']."<br>".
					 "Email : ".$data['email']."<br>";
	}else{
		$hasil		= '';
	}
	return $hasil;
}
function kotakoperasi($id){
	$sql	= "SELECT * 
				FROM profile
				WHERE id='$id'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['kota'];
	}else{
		$hasil		= '';
	}
	return $hasil;
}
function jmlBayar($no) {
	$sql	= "SELECT sum(angsuran+bunga) as total 
				FROM pinjaman_detail
				WHERE id_pinjam='$no'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
function sisa($no) {
	$sql	= "SELECT sum(jumlah_bayar) as total 
				FROM pinjaman_detail
				WHERE id_pinjam='$no'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
function cariAnggota($noanggota) {
	$sql	= "SELECT *
				FROM anggota
				WHERE no_anggota='$nonggota'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['nama'];
	}else{
		$hasil		= '';
	}
	return $hasil;	
}

function cariJenis($nojenis) {
	$sql	= "SELECT *
				FROM jenis_simpan
				WHERE id_jenis='$nojenis'";
	$query 	= mysql_query($sql);				
	$data	= mysql_fetch_array($query);
	$row	= mysql_num_rows($query);
	if ($row>0){
		$hasil		= $data['jenis_simpanan'];
	}else{
		$hasil		= $sql;
	}
	return $hasil;	
}

//fungsi pendapatan usaha
function pendapatan_usaha(){
	$sql	= mysql_query("select sum(saldo_awal) as saldo from akun where kode_akun between '411' and '422'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['saldo'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function pendapatan_usaha2(){
	$sql	= mysql_query("select sum(kredit-debet) as pendapatan from d_jurnal where kode_akun between '411' and '422'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['pendapatan'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
//FUNGSI BEBAN Usaha
function beban_satu(){
	$sql	= mysql_query("select sum(saldo_awal) as saldobeban from akun where kode_akun between '512' and '533'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['saldobeban'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function beban_dua(){
	$sql	= mysql_query("select sum(debet-kredit) as beban from d_jurnal where kode_akun between '512' and '533'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['beban'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
//Persediaan Barang Awal
function beban_tiga(){
	$sql	= mysql_query("select sum(saldo_awal) as bebantiga from akun where kode_akun='117'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['bebantiga'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
//Pembelian
function beban_empat(){
	$sql	= mysql_query("select sum(saldo_awal) as saldo from akun where kode_akun='511'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['saldo'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function beban_lima(){
	$sql	= mysql_query("select sum(saldo_awal) as saldobeban from akun where kode_akun between '541' and '545'");
	
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['saldobeban'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function beban_enam(){
	$sql	= mysql_query("select sum(debet-kredit) as beban from d_jurnal where kode_akun between '541' and '545'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['beban'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
//fungsi total hpp barang
function persediaan_awal(){
	$sql	= mysql_query("select sum((stok_awal+gudang)*harga_beli) as hpp from barang where kode_barang");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['hpp'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}

//FUNGSI MENGHITUNG SHU
function shu(){
	$persediaan_akhir = persediaan_awal();
	$beban_satu = beban_satu();
	$beban_dua = beban_dua();
	$beban_tiga = beban_tiga();
	$beban_empat = beban_empat();
	$beban_lima = beban_lima();
	$beban_enam = beban_enam();
	$pendapatan_usaha = pendapatan_usaha();
	$pendapatan_usaha2 = pendapatan_usaha2();
	
	//Barang Tersedia Dijual = Persediaan barang awal + pembelian
	$barang_tersedia_dijual = $beban_tiga+$beban_empat;
	$totalhpp = $barang_tersedia_dijual - $persediaan_akhir;
	$total_pendapatan_usaha = $pendapatan_usaha+$pendapatan_usaha2;
	$pendapatan_kotor = $total_pendapatan_usaha-$totalhpp; //Sampai sini benar
	$total_beban_usaha = $beban_satu+$beban_dua;
	
	$total_hasil_usaha = $pendapatan_kotor-$total_beban_usaha;
	$total_beban_lain = $beban_lima+$beban_enam;
	$total_shu = $total_hasil_usaha-$total_beban_lain;
	//Total Pendapatan Usaha
/*	
	//Pendapatan Kotor atau Sisa Hasil SHU
	
	//Total Beban Semua
	
*/
	return $total_shu;
}

//fungsi total jumlah simpanan
function simpanan($anggota){
	$sql	= mysql_query("SELECT sum(jumlah) as total FROM simpanan WHERE no_anggota='$anggota'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function simpanan_wajib($id_jenis){
	$sql	= mysql_query("SELECT sum(jumlah) as total FROM simpanan WHERE id_jenis='id_jenis'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function pengambilan($anggota){
	$sql	= mysql_query("SELECT sum(jumlah) as total FROM pengambilan WHERE no_anggota='$anggota'");
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}

function saldo($anggota) {
	$simpanan = simpanan($anggota);
	$pengambilan = pengambilan($anggota);
	$saldo = $simpanan-$pengambilan;
	return $saldo;
}
function sisaAngsuran($anggota){
	$sql	= mysql_query("select b.no_anggota,sum(a.angsuran+a.bunga) as total
			from pinjaman_detail as a
			join pinjaman_header as b
			ON a.id_pinjam=b.id_pinjam
			WHERE jumlah_bayar=0 AND no_anggota='$anggota'
			GROUP BY b.no_anggota") or die(mysql_error());
	$row	= mysql_num_rows($sql);
	if($row>0){
		$data = mysql_fetch_array($sql);
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}




function cariNama($nomor){
	$s = mysql_query("SELECT * FROM anggota WHERE no_anggota='$nomor'");
	$r = mysql_num_rows($s);
	if($r>0){
		$d = mysql_fetch_array($s);
		$hasil = $d['nama'];
	}else{
		$hasil = '';
	}
	return $hasil;
}
//Menghitung SHU Anggota
?>

<?php
function paging($jumbar,$nmTable){

mysql_connect("localhost","root","");
mysql_select_db("contoh_koperasi");
if($_GET[pg]==""){
$_GET[pg]="1";
}
$rss=mysql_query("select * from $nmTable ");
$max=mysql_num_rows($rss);  
//$max=19;
//$jumbar=3;

$jumpage=$max/$jumbar;
$jumpagex=ceil($jumpage);

if($_GET[pg]>$jumpagex){
$_GET[pg]="$jumpagex";
}

$y=$_GET[pg]+1;
$x=$_GET[pg]-1;

if(($_GET[pg]>='1')and($_GET[pg]<$jumpagex)){
$next="<a href=?pg=$y>next</a>";

}
if(($_GET[pg]>'1')and($_GET[pg]<=$jumpagex)){
$prev="<a href=?pg=$x>prev</a>&nbsp;&nbsp;";

}

$batas=($_GET[pg]*$jumbar)-$jumbar;
echo "<table>";

$rs=mysql_query("select * from $nmTable limit $batas,$jumbar");
while($data=mysql_fetch_row($rs))
{
echo("<TR><TD>$data[0]</TD><TD>$data[1]</TD><TD>$data[2] </TD><tr>");
}  
echo "</table>";

//echo "$batas,$jumbar<br>";

echo "$prev";

for($i=1; $i<= $jumpagex; $i++){
echo "<a href=?pg=$i>$i</a>&nbsp;&nbsp;";
}
echo "$next";


}
?>