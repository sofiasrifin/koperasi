<script type="text/javascript">
$(function() {
	$("#theTable tr:even").addClass("stripe1");
	$("#theTable tr:odd").addClass("stripe2");
	$("#theTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<?php
error_reporting(0);
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
include '../../inc/fungsi_koperasi.php';


$limit = 10;
$sqlc = "show columns from h_jual  ";

$rsdc = mysql_query($sqlc);
$cols = mysql_num_rows($rsdc);
$page = $_GET['page']; // ? $_REQUEST['page'] : 0; //$_GET['hal'] ? $_GET['hal'] : 0;

$tgl1	= jin_date_sql($_GET['tgl1']);
$tgl2	= jin_date_sql($_GET['tgl2']);
$field	= $_GET['field'];
$text	= $_GET['text'];

$urut	= $_GET['urut'];

$pilih	= $_GET['pilih'];
$pilih2 = $_POST['pilih'];

if($pilih=='tgl'){
	$where	= " WHERE tgljual BETWEEN '$tgl1' AND '$tgl2'";
}elseif($pilih=='costum'){
	if($field=='kodejual'){
		$where	= " WHERE h_jual.kodejual LIKE '%$text%'";
	}elseif($field=='tglbeli'){
		$where	= " WHERE $field='".jin_date_sql($text)."'";
	}elseif($field=='kode_barang'){
		$where	= " WHERE d_jual.kode_barang LIKE '%$text%'";
	}else{
		$where	= " WHERE $field LIKE '%$text%'";
	}
}else{
	$where	= "";
}

$start = ($page-1)*$limit;
	
	
	
echo "<table id='theTable' width='60%'>
		<tr>
			<th width='40%'>Keterangan</th>
			<th width='20%'>Jumlah</th>	
		</tr>";
echo "<tr>
		<td align='left'><b>PENDAPATAN USAHA :</b></td>
		<td align='center'></td>
		
	</tr>";
	//PENDAPATAM
	$sql	= mysql_fetch_array(mysql_query("SELECT sum(dj.kredit-dj.debet) as debetkredit, a.saldo_awal
									FROM d_jurnal as dj
									JOIN akun as a
									ON dj.kode_akun=a.kode_akun
									WHERE dj.kode_akun LIKE '411'"));
	$penjualan = $sql['saldo_awal']+$sql['debetkredit'];
	
echo	"<tr>
		<td align='left'>PENJUALAN</td>
		<td align='center'>".number_format($penjualan)."</td>
	</tr>";
	
	$akun = mysql_query("SELECT * 
						FROM akun 
						WHERE kode_akun between '412' and '422'")or die(mysql_error());
	
	$no=0;
	while($rows=mysql_fetch_array($akun)){
	$no++;
	
	$saldo_awal = (isset($rows['saldo_awal']));	
	$total_pendapatan += $saldo_awal;
	//Total Pendapatan Usaha
	$total_pendapatan_usaha = $total_pendapatan+$penjualan;
	
echo	"<tr>
		<td align='left'>$rows[nama_akun]</td>
		<td align='center'>".number_format($saldo_awal)."</td>
	</tr>";
}	
echo	"<tr>
		<td align='left'><b>TOTAL PENDAPATAN USAHA</b></td>
		<td align='center'><b>".number_format($total_pendapatan_usaha)."</b></td>
	</tr>
	<tr>
		<td align='left'><b>HARGA POKOK PENJUALAN :</b></td>
		<td align='center'>&nbsp;</td>
	</tr>";
	$query_persediaan_dagang = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '117%'"));
	$sql = mysql_fetch_array(mysql_query("SELECT sum(kredit-debet) as kreditdebet FROM d_jurnal"));
	$query_pembelian = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '511%'"));
	
	$persedian_dagang_awal = $query_persediaan_dagang['saldo_awal'];
	$pembelian = $query_pembelian['saldo_awal'];
	
	//Barang Tersedia Dijual
	$barang_tersedia_dijual = $persedian_dagang_awal+$pembelian;
	$persediaan_akhir = persediaan_awal();
	//Total HPP = Barang tersedia dijual - persedian akhir
	$total_hpp = $barang_tersedia_dijual-$persediaan_akhir;
	//Total pendapatan kotor = total pendapatan usaha - total harga pokok penjualan
	$pendapatan_kotor = $total_pendapatan_usaha - $total_hpp;
echo	"<tr>
		<td align='left'>PERSEDIAAN BARANG AWAL</td>
		<td align='center'>".number_format($persedian_dagang_awal)."</td>
	</tr>
	<tr>
		<td align='left'>PEMBELIAN</td>
		<td align='center'>".number_format($pembelian)."</td>
	</tr>
	<tr>
		<td align='left'><b>BARANG TERSEDIA DIJUAL</b></td>
		<td align='center'><b>".number_format($barang_tersedia_dijual)."</b></td>
	</tr>
	<tr>
		<td align='left'>PERSEDIAN BARANG AKHIR</td>
		<td align='center'>".number_format($persediaan_akhir)."</td>
	</tr>
	<tr>
		<td align='left'><b>TOTAL HARGA POKOK PENJUALAN</b></td>
		<td align='center'><b>".number_format($total_hpp)."</b></td>
	</tr>
	<tr>
		<td align='left'><b>PENDAPATAN KOTOR</b></td>
		<td align='center'><b>".number_format($pendapatan_kotor)."</b></td>
	</tr>";
		
	
echo "<tr>
		<td align='left'><b>BEBAN USAHA : </b></td>
		<td align='center'></td>
	 </tr>
	 <tr>
		<td align='left'><b>BEBAN TOKO :</b></td>
		<td align='center'></td>
	 </tr>";
	 //BEBAN USAHA
	 $akun = mysql_fetch_array(mysql_query("SELECT * 
						FROM akun 
						WHERE kode_akun between '512' and '545'"))or die(mysql_error());
	
	$query_beban_gaji = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '512'"));
	$query_beban_administrasi_toko = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '513'"));
	$query_beban_perlengkapan_toko = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '514'"));
	$query_beban_peny_peralatan_toko = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '515'"));
	$query_beban_kerusakan_barang = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '516'"));
	$query_beban_penjualan = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '517'"));
	$query_beban_peny_peralatan_counter = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '518'"));
	
	$akun2 = mysql_fetch_array(mysql_query("SELECT * 
						FROM akun 
						WHERE kode_akun='515'"));
	$beban_gaji = $akun['saldo_awal']+$query_beban_gaji['debetkredit'];
	$beban_administrasi_toko = $akun['saldo_awal']+$query_beban_administrasi_toko['debetkredit'];
	$beban_perlengkapan_toko = $akun['saldo_awal']+$query_beban_perlengkapan_toko['debetkredit'];
	$beban_peny_peralatan_toko = $akun2['saldo_awal'];
	$beban_kerusakan_barang = $akun['saldo_awal']+$query_beban_kerusakan_barang['debetkredit'];
	$beban_penjualan = $akun['saldo_awal']+$query_beban_penjualan['debetkredit'];
	$beban_peny_peralatan_counter = $akun['saldo_awal']+$query_beban_peny_peralatan_counter['debetkredit'];
	
	$total_beban_toko = $beban_gaji+$beban_administrasi_toko+$beban_perlengkapan_toko+$beban_peny_peralatan_toko+$beban_kerusakan_barang+$beban_penjualan+$beban_peny_peralatan_counter;
	
	//BEBAN ADMINISTRASI
	 $query_beban_insentif = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '519'"));
	 $query_beban_admin_kantor = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '521'"));
	 $query_beban_perleng_kantor = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '522'"));
	 $query_beban_pendidikan = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '523'"));
	 $query_beban_kerug_piutang = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '524'"));
	 $query_beban_peny_gedung = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '525'"));
	 $query_beban_peny_alat_kantor = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '526'"));
	 $query_beban_peny_komputer = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '527'"));
	 $query_beban_peny_kafe_malam = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '528'"));
	 $query_beban_peny_kendaraan = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '529'"));
	 $query_beban_rat = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '531'"));
	 $query_beban_telpon = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '532'"));
	 $query_beban_listrik = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '533'"));
	 
	 $beban_insentif = $akun['saldo_awal']+$query_beban_insentif['debetkredit'];
	 $beban_admin_kantor = $akun['saldo_awal']+$query_beban_admin_kantor['debetkredit'];
	 $beban_perleng_kantor = $akun['saldo_awal']+$query_beban_perleng_kantor['debetkredit'];
	 $beban_pendidikan = $akun['saldo_awal']+$query_beban_pendidikan['debetkredit'];
	 $beban_kerug_piutang = $akun['saldo_awal']+ $query_beban_kerug_piutang['debetkredit'];
	 $beban_peny_gedung = $akun['saldo_awal']+ $query_beban_peny_gedung['debetkredit'];
	 $beban_peny_alat_kantor = $akun['saldo_awal']+$query_beban_peny_alat_kantor['debetkredit'];
	 $beban_peny_komputer = $akun['saldo_awal']+$query_beban_peny_komputer['debetkredit'];
	 $beban_peny_kafe_malam = $akun['saldo_awal']+$query_beban_peny_kafe_malam['debetkredit'];
	 $beban_peny_kendaraan = $akun['saldo_awal']+$query_beban_peny_kendaraan['debetkredit'];
	 $beban_rat = $akun['saldo_awal']+ $query_beban_rat['debetkredit'];
	 $beban_telepon = $akun['saldo_awal']+$query_beban_telpon['debetkredit'];
	 $beban_listrik = $akun['saldo_awal']+$query_beban_listrik['debetkredit'];
	 
	 $total_beban_administrasi = $beban_insentif+$beban_admin_kantor+$beban_perleng_kantor+$beban_pendidikan+$beban_kerug_piutang+$beban_peny_gedung+$beban_peny_alat_kantor+$beban_peny_komputer+$beban_peny_kafe_malam+$beban_peny_kendaraan+$beban_rat+$beban_telepon+$beban_listrik;
	 //Total Beban Usaha
	 $total_beban_usaha = $total_beban_toko +$total_beban_administrasi;
	 //Hasil Usaha
	 $hasil_usaha = $pendapatan_kotor - $total_beban_usaha;
	 
	 //PENDAPATAN LAIN
	 $query_pendapatan_bunga = mysql_fetch_array(mysql_query("SELECT sum(kredit-debet) as kreditdebet FROM d_jurnal WHERE kode_akun LIKE '421'"));
	 $query_pendapatan_lain = mysql_fetch_array(mysql_query("SELECT sum(kredit-debet) as kreditdebet FROM d_jurnal WHERE kode_akun LIKE '412'"));
	 
	 $pendapatan_bunga = $akun['saldo_awal']+$query_pendapatan_bunga['kreditdebet'];
	 $pendapatan_lain = $akun['saldo_awal']+$query_pendapatan_lain['kreditdebet'];
	 $total_pendapatan_lain = $pendapatan_bunga+$pendapatan_lain;
	 
	 //BEBAN LAIN
	 $query_beban_zakat_mal = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '541'"));
	 $query_beban_admin_bank = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '542'"));
	 $query_nilai_kembali_aktiva = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '543'"));
	 $query_beban_lain = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '544'"));
	 $query_beban_admin_anggota = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '545'"));
	 
	 $beban_zakat_mal = $akun['saldo_awal']+$query_beban_zakat_mal['debetkredit'];
	 $beban_admin_bank = $akun['saldo_awal']+$query_beban_admin_bank['debetkredit'];
	 $nilai_kembali_aktiva = $akun['saldo_awal']+$query_nilai_kembali_aktiva['debetkredit'];
	 $beban_lain = $akun['saldo_awal']+$query_beban_lain['debetkredit'];
	 $beban_admin_anggota= $akun['saldo_awal']+$query_beban_admin_anggota['debetkredit'];
	 $total_beban_lain = $beban_zakat_mal+$beban_admin_bank+$nilai_kembali_aktiva+$beban_lain+$beban_admin_anggota;
	 //total beban semua = total beban usaha + total beban lain
	 //$total_beban = $total_beban_usaha + $total_beban_lain;
	 
	 $sisa_hasil_usaha = $hasil_usaha + $total_pendapatan_lain - $total_beban_lain;
	
echo "<tr>
		<td align='left'>BEBAN GAJI</td>
		<td align='center'>".number_format($beban_gaji)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN ADMINISTRASI TOKO</td>
		<td align='center'>".number_format($beban_administrasi_toko)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PERLENGKAPAN TOKO</td>
		<td align='center'>".number_format($beban_perlengkapan_toko)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PENYUSUTAN PERALATAN TOKO</td>
		<td align='center'>".number_format($beban_peny_peralatan_toko)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN KERUSAKAN BARANG</td>
		<td align='center'>".number_format($beban_kerusakan_barang)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PENJUALAN</td>
		<td align='center'>".number_format($beban_penjualan)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PENYUSUTAN PERALATAN COUNTER</td>
		<td align='center'>".number_format($beban_peny_peralatan_counter)."</td>
	 </tr>
	 <tr>
		<td align='left'><b>TOTAL BEBAN TOKO</b></td>
		<td align='center'><b>".number_format($total_beban_toko)."</b></td>
	 </tr>";
	 
	//BEBAN ADMINISTRASI
echo "<tr>
		<td align='left'><b>BEBAN ADMINISTRASI :</b></td>
		<td align='center'>&nbsp;</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN INSENTIF</td>
		<td align='center'>".number_format($beban_insentif)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN ADMINISTRASI KANTOR</td>
		<td align='center'>".number_format($beban_admin_kantor)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PERLENGKAPAN KANTOR</td>
		<td align='center'>".number_format($beban_perleng_kantor)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PENDIDIKAN</td>
		<td align='center'>".number_format($beban_pendidikan)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN KERUGIAN PIUTANG</td>
		<td align='center'>".number_format( $beban_kerug_piutang)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PENYUSUTAN GEDUNG</td>
		<td align='center'>".number_format($beban_peny_gedung)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PERALATAN KANTOR</td>
		<td align='center'>".number_format($beban_peny_alat_kantor)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PENYUSUTAN KOMPUTER</td>
		<td align='center'>".number_format($beban_peny_komputer)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN KAFE MALAM</td>
		<td align='center'>".number_format($beban_peny_kafe_malam)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN KENDARAAN</td>
		<td align='center'>".number_format($beban_peny_kendaraan)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN RAT</td>
		<td align='center'>".number_format($beban_rat)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN TELEPON</td>
		<td align='center'>".number_format($beban_telepon)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN LISTRIK</b></td>
		<td align='center'>".number_format($beban_listrik)."</td>
	 </tr>
	 <tr>
		<td align='left'><b>TOTAL BEBAN ADMINISTRASI</b></td>
		<td align='center'><b>".number_format($total_beban_administrasi)."</b></td>
	 </tr>
	 <tr>
		<td align='left'><b>TOTAL BEBAN USAHA</b></td>
		<td align='center'><b>".number_format($total_beban_usaha)."</b></td>
	 </tr>
	 <tr>
		<td align='left'><b>HASIL USAHA</b></td>
		<td align='center'><b>".number_format($hasil_usaha)."</b></td>
	 </tr>";
	//PENDAPATAN LAIN
echo "<tr>
		<td align='left'><b>PENDAPATAN LAIN :</b></td>
		<td align='center'>&nbsp;</td>
	 </tr>
	 <tr>
		<td align='left'>PENDAPATAN BUNGA</td>
		<td align='center'>".number_format($pendapatan_bunga)."</td>
	 </tr>
	 <tr>
		<td align='left'>PENDAPATAN LAIN-LAIN</td>
		<td align='center'>".number_format($pendapatan_lain)."</td>
	 </tr>
	 <tr>
		<td align='left'><b>TOTAL PENDAPATAN LAIN</b></td>
		<td align='center'><b>".number_format($total_pendapatan_lain)."</b></td>
	 </tr>";
	 
	 //BEBAN LAIN
echo "<tr>
		<td align='left'><b>BEBAN LAIN :</b></td>
		<td align='center'>&nbsp;</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN ZAKAT MAL</td>
		<td align='center'>".number_format($beban_zakat_mal)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN ADMINISTRASI BANK</td>
		<td align='center'>".number_format($beban_admin_bank)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN PENILAIAN KEMBALI AKTIVA</td>
		<td align='center'>".number_format($nilai_kembali_aktiva)."</td>
	 </tr>
	 <tr>
		<td align='left'>BEBAN LAIN-LAIN</td>
		<td align='center'>".number_format($beban_lain)."</td>
	 </tr>
	  <tr>
		<td align='left'>BEBAN ADMINISTRASI ANGGOTA</td>
		<td align='center'>".number_format($beban_admin_anggota)."</td>
	 </tr>
	 <tr>
		<td align='left'><b>TOTAL BEBAN LAIN</b></td>
		<td align='center'><b>".number_format($total_beban_lain)."</b></td>
	 </tr>
	 <tr>
		<td align='left'><b>SISA HASIL USAHA</b></td>
		<td align='center'><b>".number_format($sisa_hasil_usaha)."</b></td>
	 </tr>";
	
?>