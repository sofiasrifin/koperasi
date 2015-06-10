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
	
	//Aktiva
	//Harta Lancar
	$query = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun between '111' and '135'"));
	
	$query_kas= mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkas FROM d_jurnal WHERE kode_akun LIKE '111%'"));
	$query_deposito =  mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '112%'"));
	$query_piutang = mysql_fetch_array(mysql_query("SELECT sum(debet) as debetkas, sum(kredit) as kreditkas FROM d_jurnal WHERE kode_akun LIKE '113%'"));
	$query_cadangan_piutang = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '114%'"));
	$query_persediaan_dagang = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '117%'"));
	$query_perlengkapan_kantor= mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '115%'"));
	$query_perlengkapan_toko= mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '116%'"));
	
	$kas = $query['saldo_awal']+$query_kas['debetkas'];
	$deposito = $query_deposito['saldo_awal'];
	$piutang = $query_piutang['debetkas']-$query_piutang['kreditkas'];
	$cadangan_piutang = $query_cadangan_piutang['saldo_awal'];
	$persediaan_dagang_awal = $query_persediaan_dagang['saldo_awal'];
	$perlengkapan_kantor = $query_perlengkapan_kantor['debetkredit'];
	$perlengkapan_toko = $query_perlengkapan_toko['debetkredit'];
	$total_harta_lancar = $kas+$deposito+$piutang-$cadangan_piutang+$persediaan_dagang_awal+$perlengkapan_kantor+$perlengkapan_toko;
	
	//Harta Tetap
	$query_gedung = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '123'"));
	$query_peny_gedung = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '124'"));
	$query_peralatan_kantor = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '121%'"));
	$query_peny_peralatan_kantor = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '122'"));
	$query_peralatan_toko = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '125%'"));
	$query_peny_peralatan_toko = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '126'"));
	$query_kendaraan = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '127%'"));
	$query_peny_kendaraan = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '128'"));
	$query_komputer = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '129'"));
	$query_peny_komputer = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '131'"));
	$query_peralatan_counter = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '132'"));
	$query_peny_counter = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '122'"));
	$query_peralatan_kafe = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) as debetkredit FROM d_jurnal WHERE kode_akun LIKE '134'"));
	$query_peny_peralatan_kafe = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '135'"));
	
	$gedung = $query_gedung['debetkredit'];
	$peny_gedung = $query_peny_gedung['saldo_awal'];
	$peralatan_kantor = $query_peralatan_kant['debetkredit'];
	$peny_peralatan_kantor = $query_peny_peralatan_kantor['saldo_awal'];
	$peralatan_toko = $query_peralatan_toko['debetkredit'];
	$peny_peralatan_toko = $query_peny_peralatan_kantor ['saldo_awal'];
	$kendaraan = $query_kendaraan['debetkredit'];
	$peny_kendaraan = $query_peny_kendaraan ['saldo_awal'];
	$komputer = $query_komputer['debetkredit'];
	$peny_komputer = $query_peny_komputer['saldo_awal'];
	$peralatan_counter = $query_peralatan_counter['saldo_awal'];
	$peny_counter = $query_peny_counter['saldo_awal'];
	$peralatan_kafe = $query_peralatan_kafe['debetkredit'];
	$peny_peralatan_kafe = $query_peny_peralatan_kafe['saldo_awal'];
	
	
	$total_harta_tetap = $gedung+$peny_gedung+$peralatan_kantor+$peny_peralatan_kantor+$peralatan_toko+$peny_peralatan_toko+$kendaraan+$peny_kendaraan+$komputer+$peny_komputer+$peralatan_counter+$peny_counter+$peralatan_kafe+$peny_peralatan_kafe;
	$total_harta = $total_harta_lancar+$total_harta_tetap;
	
	//Passiva
	//Hutang
	$query_hutang_usaha = mysql_fetch_array(mysql_query("SELECT sum(debet-kredit) debethutang FROM d_jurnal WHERE kode_akun LIKE '211%'"));
	$query_hutang_kendaraan = mysql_fetch_array(mysql_query("SELECT sum(debet) as debethutang, sum(kredit) as kredithutang FROM d_jurnal WHERE kode_akun LIKE '212%'"));
	$query_hutang_biaya = mysql_fetch_array(mysql_query("SELECT sum(debet) as debethutang, sum(kredit) as kredithutang FROM d_jurnal WHERE kode_akun LIKE '213%'"));
	$query_simpanan_sukarela =  mysql_fetch_array(mysql_query("SELECT sum(jumlah) as sukarela, (select sum(jumlah) FROM pengambilan where id_ambil) as pengambilan
																FROM simpanan WHERE id_jenis LIKE '03%'"));
	$query_diterima_dimuka = mysql_fetch_array(mysql_query("SELECT akun.*,sum(kredit-debet) as debetkredit FROM akun 
																		JOIN d_jurnal
																		ON akun.kode_akun=d_jurnal.kode_akun 
																		WHERE akun.kode_akun and d_jurnal.kode_akun LIKE '214%'"));
	$query_danablm_terealisasi = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '215%'"));
	$query_beban_rat = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '216%'"));
	$query_simpanan_khusus = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun LIKE '217%'"));															
																
	$hutang_usaha = $query_hutang_usaha['kredithutang']-$query_hutang_usaha['debethutang'];
	$hutang_kendaraan = $query_hutang_kendaraan['debethutang']-$query_hutang_kendaraan['kredithutang'];
	$hutang_biaya = $query_hutang_biaya['debethutang']-$query_hutang_biaya['kredithutang'];
	$simpanan_sukarela = $query_simpanan_sukarela['sukarela']-$query_simpanan_sukarela['pengambilan'];
	$diterima_dimuka = $query_diterima_dimuka['saldo_awal']+$query_diterima_dimuka['debetkredit'];
	$danablm_terealisasi = $query_danablm_terealisasi['saldo_awal'];
	$beban_rat = $query_beban_rat['saldo_awal'];
	
	$total_hutang = $hutang_usaha+$hutang_kendaraan+$hutang_biaya+$simpanan_sukarela+$diterima_dimuka+$danablm_terealisasi+$beban_rat;
	
	//Modal
	$query_simpanan_pokok =  mysql_fetch_array(mysql_query("SELECT sum(jumlah) as pokok FROM simpanan WHERE id_jenis LIKE '01%'"));
	$query_simpanan_wajib =  mysql_fetch_array(mysql_query("SELECT sum(jumlah) as wajib FROM simpanan WHERE id_jenis LIKE '02%'"));
	$query_modal_donasi = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun like '311%'"));
	$query_cadangan = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE kode_akun like '312%'"));
	
	$simpanan_pokok = $query_simpanan_pokok['pokok'];
	$simpanan_wajib = $query_simpanan_wajib['wajib'];
	$modal_donasi = $query_modal_donasi['saldo_awal'];
	$cadangan = $query_cadangan['saldo_awal'];
	$shu_belum_dibagi = shu();
	
	$total_modal = $simpanan_pokok+$simpanan_wajib+$modal_donasi+$cadangan;
	$total_modal_hutang = $total_hutang+$total_modal;
	
echo "<table id='theTable' width='100%'>
		<tr>
			<th width='35%'>Uraian</th>
			<th width='15%'>Jumlah</th>
			<th width='35%'>Uraian</th>
			<th width='15%'>Jumlah</th>
		</tr>";
	
	//$no=1+$start;
	//while($rows=mysql_fetch_array($query)){
echo "<tr>
		<td align='left'><b>HARTA LANCAR</b></td>
		<td align='center'> </td>
		<td align='left'><b>HUTANG</b></td>		
		<td align='center'></td>
	</tr>
	<tr>
		<td align='left'>Kas</td>
		<td align='center'>".number_format($kas)."</td>
		<td align='left'>Hutang Usaha</td>		
		<td align='center'>".number_format($hutang_usaha)."</td>
	</tr>
	<tr>
		<td align='left'>Deposito</td>
		<td align='center'>".number_format($deposito)."</td>
		<td align='left'>Hutang Kendaraan</td>		
		<td align='center'>".number_format($hutang_kendaraan)."</td>
	</tr>
	<tr>
		<td align='left'>Piutang</td>
		<td align='center'>".number_format($piutang)."</td>
		<td align='left'>Hutang Biaya</td>		
		<td align='center'>".number_format($hutang_biaya)."</td>
	</tr>
	<tr>
		<td align='left'>Cadangan Kerugian Piutang</td>
		<td align='center'>(".number_format($cadangan_piutang).")</td>
		<td align='left'>Simpanan Sukarela</td>		
		<td align='center'>".number_format($simpanan_sukarela)."</td>
	</tr>
	<tr>
		<td align='left'>Persediaan Barang Dagang</td>
		<td align='center'>".number_format($persediaan_dagang_awal)."</td>
		<td align='left'>Pendapatan diterima dimuka</td>		
		<td align='center'>".number_format($diterima_dimuka)."</td>
	</tr>
	<tr>
		<td align='left'>Perlengkapan Kantor</td>
		<td align='center'>".number_format($perlengkapan_kantor)."</td>
		<td align='left'>Dana Belum Terealisasi</td>		
		<td align='center'>".number_format($danablm_terealisasi)." </td>
	</tr>
	<tr>
		<td align='left'>Perlengkapan Toko</td>
		<td align='center'>".number_format($perlengkapan_toko)."</td>
		<td align='left'>Beban RAT Terutang</td>		
		<td align='center'>".number_format($beban_rat)." </td>
	</tr>
	<tr>
		<td align='left'><b>TOTAL HARTA LANCAR</b></td>
		<td align='center'>".number_format($total_harta_lancar)."</td>
		<td align='left'>Simpanan Khusus</td>		
		<td align='center'>".number_format($simpanan_khusus)."</td>
	</tr>
	<tr>
		<td align='left'>&nbsp;</td>
		<td align='center'>&nbsp;</td>
		<td align='left'><b>TOTAL HUTANG</b></td>		
		<td align='center'>".number_format($total_hutang)."</td>
	</tr>
	<tr>
		<td align='left'><b>INVESTASI JANGKA PANJANG</b></td>
		<td align='center'> </td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Penyertaan pada KOPINDO</td>
		<td align='center'> </td>
		<td align='left'><b>MODAL</b></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Investasi Kafe</td>
		<td align='center'> </td>
		<td align='left'>Simpanan Pokok</td>		
		<td align='center'>".number_format($simpanan_pokok)."</td>
	</tr>
	<tr>
		<td align='left'><b>TOTAL INVESTASI JANGKA PANJANG</b></td>
		<td align='center'> </td>
		<td align='left'>Simpanan Wajib</td>		
		<td align='center'>".number_format($simpanan_wajib)."</td>
	</tr>
	<tr>
		<td align='left'>&nbsp;</td>
		<td align='center'> </td>
		<td align='left'>Modal Donasi</td>		
		<td align='center'>".number_format($modal_donasi)."</td>
	</tr>
	<tr>
		<td align='left'><b>HARTA TETAP BERWUJUD</b></td>
		<td align='center'> </td>
		<td align='left'>Cadangan</td>		
		<td align='center'>".number_format($cadangan)."</td>
	</tr>
	<tr>
		<td align='left'>Gedung</td>
		<td align='center'>".number_format($gedung)."</td>
		<td align='left'>SHU Belum Dibagi</td>		
		<td align='center'>".number_format($shu_belum_dibagi)."</td>
	</tr>
	<tr>
		<td align='left'>Akun Penyusutan Gedung</td>
		<td align='center'>".number_format($peny_gedung)."</td>
		<td align='left'><b>TOTAL MODAL</b></td>		
		<td align='center'>".number_format($total_modal)."</td>
	</tr>
	<tr>
		<td align='left'>Peralatan Kantor</td>
		<td align='center'>".number_format($peralatan_kantor)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Akun Penyusutan Peralatan Kantor</td>
		<td align='center'>".number_format($peny_peralatan_kantor)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Peralatan Toko</td>
		<td align='center'>".number_format($peralatan_toko)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Akun Peny Peralatan Toko</td>
		<td align='center'>".number_format($peny_peralatan_toko)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Kendaraan</td>
		<td align='center'>".number_format($kendaraan)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Akun Penyusutan Kendaraan</td>
		<td align='center'>".number_format($peny_kendaraan)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Komputer</td>
		<td align='center'>".number_format($komputer)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Akun Penyusutan Komputer</td>
		<td align='center'>".number_format($peny_komputer)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Peralatan Counter</td>
		<td align='center'>".number_format($peralatan_counter)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Akun Penyusutan Counter</td>
		<td align='center'>".number_format($peny_counter)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Peralatan Kafe Malam</td>
		<td align='center'> ".number_format($peralatan_kafer)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'>Akun Penyusutan Peralatan Kafe Malam</td>
		<td align='center'> ".number_format($peny_peralatan_kafe)."</td>
		<td align='left'></td>		
		<td align='center'> </td>
	</tr>
	<tr>
		<td align='left'><b>TOTAL HARTA TETAP BERWUJUD</b></td>
		<td align='center'>".number_format($total_harta_tetap)."</td>
		<td align='left'></td>		
		<td align='center'></td>
	</tr>
	<tr>
		<td align='left'><b>TOTAL HARTA</b></td>
		<td align='center'>".number_format($total_harta)."</td>
		<td align='left'><b>TOTAL HUTANG DAN MODAL</b></td>		
		<td align='center'>".number_format($total_modal_hutang)."</td>
	</tr>";
	//$no++;
	//$gtot = $gtot+$rows[total];
	//}

?>