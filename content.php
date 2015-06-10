<?php
include "inc/inc.koneksi.php";
include "inc/fungsi_koperasi.php";

$mod = $_GET['module'];
if ($mod=='home'){
	$nama = namakoperasi(1);
	echo "<h2>Selamat Datang</h2>";
	echo "Hai, <b>$_SESSION[namauser] </b> [ $_SESSION[level] ] Selamat datang  di Sistem Informasi Koperasi <b>$nama</b>";	
	echo "<br><br>";
	if($_SESSION['level']=='super admin'){
echo "<table class='list'><thead>
		<td class='center' colspan=5><center>Control Panel</center></td></thead>
		<tr>
		  <td width=120 align=center><a href=media.php?module=jenis><img src=images/jenis.png border=none><br /><b>Jenis Simpanan</b></a></td>
		  <td width=120 align=center><a href=media.php?module=anggota><img src=images/anggota.png border=none><br /><b>Anggota</b></a></td>
		  <td width=120 align=center><a href=media.php?module=users><img src=images/users.png border=none><br /><b>Pengguna / Users</b></a></td>
		  <td width=120 align=center><a href=media.php?module=profil><img src=images/profil.png border=none><br /><b>Profil Koperasi</b></a></td>
    </tr>
		<tr align=center>
		  <td width=120 align=center colspan=2><a href=media.php?module=simpanan><img src=images/simpanan.png border=none><br /><b>Simpanan</b></a></td>
		  <td width=120 align=center colspan=2><a href=media.php?module=penarikan><img src=images/penarikan.png border=none><br /><b>Tarik Tunai</b></a></td>
		  
    </tr>
    </table>";	
	}
}
//modul master
elseif ($mod=='edit_profil'){
    include "modul/edit_profil/profil.php";
}
elseif ($mod=='profil'){
    include "modul/profil/profil.php";
}
elseif ($mod=='jenis'){
    include "modul/jenis/index.php";
}
elseif ($mod=='anggota'){
    include "modul/anggota/index.php";
}
elseif ($mod=='barang'){
    include "modul/barang/index.php";
}
elseif ($mod=='pengguna'){
    include "modul/pengguna/pengguna.php";
}
elseif ($mod=='users'){
    include "modul/users/pengguna.php";
}
elseif ($mod=='kategori'){
    include "modul/kategori/index.php";
}
elseif ($mod=='supplier'){
    include "modul/supplier/index.php";
}
elseif ($mod=='kegiatan'){
    include "modul/kegiatan/index.php";
}
elseif ($mod=='sie'){
    include "modul/sie/index.php";
}
elseif ($mod=='rekening'){
    include "modul/rekening/index.php";
}
elseif ($mod=='berita_anggota'){
    include "modul/berita_anggota/index.php";
}
elseif ($mod=='tambah_berita'){
    include "modul/berita_anggota/tambah.php";
}
elseif ($mod=='edit_berita'){
    include "modul/berita_anggota/edit.php";
}
//modul transaksi
elseif ($mod=='simpanan'){
    include "modul/simpanan/simpanan.php";
}
elseif ($mod=='poin_acara'){
    include "modul/poin_acara/index.php";
}
elseif ($mod=='penarikan'){
    include "modul/penarikan/penarikan.php";
}
elseif ($mod=='pembelian'){
    include "modul/pembelian/index.php";
}
elseif ($mod=='jual'){
    include "modul/jual/index.php";
}
elseif ($mod=='beli'){
    include "modul/beli/index.php";
}
elseif ($mod=='jurnal'){
    include "modul/jurnal/index.php";
}
elseif ($mod=='penerimaan_kas'){
    include "modul/penerimaan_kas/index.php";
}
elseif ($mod=='pengeluaran_kas'){
    include "modul/pengeluaran_kas/index.php";
}

elseif ($mod=='edit_jurnal'){
    include "modul/jurnal/edit.php";
}
elseif ($mod=='tambah_jurnal'){
    include "modul/jurnal/tambah.php";
}

//modul untuk sms gateway
elseif ($mod=='sms_single'){
    include "modul/sms_single/compose.php";
}
elseif ($mod=='target_pesan_single'){
    include "modul/sms_single/target_pesan_single.php";
}
//sms broadcast
elseif ($mod=='sms_broadcast'){
    include "modul/sms_broadcast/index.php";
}
//sms onschedule
elseif ($mod=='sms_onschedule'){
    include "modul/sms_onschedule/index.php";
}
elseif ($mod=='tambah_onschedule'){
    include "modul/sms_onschedule/tambah.php";
}
elseif ($mod=='edit_onschedule'){
    include "modul/sms_onschedule/edit.php";
}
//sms Inbox
elseif ($mod=='sms_inbox'){
    include "modul/sms_inbox/inbox.php";
}
elseif ($mod=='lihatdetail'){
    include "modul/sms_inbox/lihatdetail.php";
}
elseif ($mod=='sentitems'){
    include "modul/sms_sentitems/sentitems.php";
}
//sms group
elseif ($mod=='phonebook'){
    include "modul/sms_group/phonebook.php";
}
elseif ($mod=='tambahgroup'){
    include "modul/sms_group/tambah_group.php";
}
//sms phonebook
elseif ($mod=='daftarphonebook'){
    include "modul/sms_group/daftarphonebook.php";
}
elseif ($mod=='proses_import'){
    include "modul/sms_group/proses_import.php";
}
elseif ($mod=='sendsms'){
	include "modul/sms_group/sendsms.php";
}
elseif ($mod=='hapus_pbk'){
	include "modul/sms_group/hapus_pbk.php";
}
elseif ($mod=='edit_pbk'){
	include "modul/sms_group/edit_pbk.php";
}
elseif ($mod=='target_edit_pbk'){
	include "modul/sms_group/target_edit_pbk.php";
}
elseif ($mod=='tambahpbk'){
	include "modul/sms_group/tambahpbk.php";
}
elseif ($mod=='target_pbk'){
	include "modul/sms_group/tambahpbk.php";
}
elseif ($mod=='target_pesan_pbk'){
	include "modul/sms_group/target_pesan_pbk.php";
}
//SMS Auto Forward
elseif ($mod=='sms_auto_forward'){
	include "modul/sms_autoforward/sms.php";
}

elseif ($mod=='tulis_sms'){
	include "modul/user/tulis_sms.php";
}

//buatlah form pengambilan berdasarkan form simpanan
elseif ($mod=='pinjaman'){
    include "modul/pinjaman/pinjaman.php";
}
elseif ($mod=='bayar'){
    include "modul/bayar/bayar.php";
}
//Menu Laporan
elseif ($mod=='lap-anggota'){
    include "modul/lap_anggota/lap_anggota.php";
}
elseif ($mod=='lap-bukubesar'){
    include "modul/lap_bukubesar/index.php";
}
elseif ($mod=='lap-simpanan'){
    include "modul/lap_simpanan/lap_simpanan.php";
}
elseif ($mod=='lap-kegiatan'){
    include "modul/lap_kegiatan/lap_kegiatan.php";
}
elseif ($mod=='lap-jual'){
    include "modul/lap_jual/index.php";
}
elseif ($mod=='lap-barang'){
    include "modul/lap_barang/index.php";
}
elseif ($mod=='grafik_jual'){
    include "modul/grafik_jual/index.php";
}
elseif ($mod=='lap-labajual'){
    include "modul/lap_labajual/index.php";
}
elseif ($mod=='lap-neraca'){
    include "modul/lap_neraca/index.php";
}
elseif ($mod=='lap-shu'){
    include "modul/lap_shu/index.php";
}
else{
  echo "<b>MODUL BELUM ADA ATAU BELUM LENGKAP SILAHKAN BUAT SENDIRI</b>";
}
?>