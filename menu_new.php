<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

include "inc/inc.koneksi.php";
$hitung = mysql_num_rows(mysql_query("SELECT * FROM inbox WHERE Processed = 'false'"));
if($hitung > 0){
	$hitung = "<b>$hitung</b>";
}
else{
	$hitung = "$hitung";
}

$level = $_SESSION['level'];

if($level=='super admin'){
?>

<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Master Data" data-options="iconCls:'icon-master'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree" id="tt1" data-options="animate:true,dnd:true">
        <li data-options="iconCls:'icon-master'">
        <a href="?module=profil">Data Profil</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=pengguna">Data Pengguna</a>
        </li>	
        <li data-options="iconCls:'icon-barang'">
        <a href="?module=barang">Data Barang</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=kategori">Data Kategori</a>
        </li>
        <li data-options="iconCls:'icon-supplier'">
        <a href="?module=supplier">Data Supplier</a>
        </li>	
        <li data-options="iconCls:'icon-users'">
        <a href="?module=anggota">Data Anggota</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=kegiatan">Data Kegiatan</a>
        </li>
         <li data-options="iconCls:'icon-master'">
        <a href="?module=sie">Data Sie Kegiatan</a>
        </li>
<!--         <li data-options="iconCls:'icon-master'">
        <a href="?module=rekening">Data Akun</a>
        </li> -->
        <!--
        <li data-options="iconCls:'icon-master'">
        <a href="?module=users">Data User</a>
        </li>		-->
        <li data-options="iconCls:'icon-users'">
        <a href="?module=jenis">Data Jenis Simpanan</a>
        </li>
        
        
	</ul>      
</div>

<!-- <div title="SMS" data-options="iconCls:'icon-master'" style="overflow:auto;padding:5px 0px;">
		<li data-options="iconCls:'icon-new'">
        <a href="?module=sms_single">Tulis Pesan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=sms_inbox">Inbox (<?php echo "$hitung"; ?>)</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=sentitems">Pesan Terkirim</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=phonebook">Group</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=daftarphonebook">Phonebook</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=sms_broadcast">Sms Broadcast</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=sms_onschedule">Sms Terjadwal</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=sms_auto_forward">Sms Auto Forward</a>
        </li>
        
</div>
 -->
 <div title="Transaksi" data-options="iconCls:'icon-transaksi'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
    	 <li data-options="iconCls:'icon-master'">
        <a href="?module=poin_acara">Poin Kegiatan</a>
        </li>
<!--         <li data-options="iconCls:'icon-master'">
        <a href="?module=jurnal">Jurnal Umum</a>
        </li>	 -->
        <!--
         <li data-options="iconCls:'icon-master'">
        <a href="?module=penerimaan_kas">Penerimaan Kas</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=pengeluaran_kas">Pengeluaran Kas</a>
        </li>
        -->
<!--         <li data-options="iconCls:'icon-new'">
        <a href="?module=simpanan">Simpanan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=penarikan">Pengambilan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=jual">Penjualan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=beli">Pembelian</a>
        </li> -->
    </ul>
</div>
<!-- <div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-bukubesar">Buku Besar</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-neraca">Neraca</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-shu">Laba/Rugi</a>
        </li>
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-barang">Barang</a>
        </li>
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-jual">Penjualan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=lap-labajual">Laba Penjualan</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-anggota">Anggota</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-simpanan">Simpanan</a>
        </li>
        
	</ul>
</div> -->
<!--
<div title="Laporan Grafik" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-print'">
        <a href="?module=grafik_jual">Penjualan</a>
	</ul>
</div>
-->
	
</div>
<?php
}elseif ($level=='usaha'){
?>
<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Master" style="overflow:auto;padding:5px 0px;">
	<ul class="easyui-tree">
        <li data-options="iconCls:'icon-master'">
        <a href="?module=profil">Data Profil</a>
        </li>	
        <li data-options="iconCls:'icon-master'">
        <a href="?module=barang">Data Barang</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=supplier">Data Supplier</a>
        </li>	
        <li data-options="iconCls:'icon-master'">
        <a href="?module=kategori">Data Kategori</a>
        </li>
	</ul>      

</div>
<div title="Transaksi" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
      <li data-options="iconCls:'icon-new'">
        <a href="?module=pembelian">Pembelian</a>
        </li>
	</ul>
</div>
<div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-anggota">Anggota</a>
        </li>
		<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-barang">Barang</a>
        </li>
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-jual">Penjualan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=lap-labajual">Laba Penjualan</a>
        </li> 
        <!--      
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-kegiatan">Kegiatan Sehari-hari</a>
        </li> -->
	</ul>
</div>
</div>
<?php 
}if($level=='psda'){ 
?>
<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Master" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-master'">
        <a href="?module=profil">Data Profil</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=anggota">Data Anggota</a>
        </li>
	</ul>      
</div>
<div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-anggota">Anggota</a>
        </li>
        <!--
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-kegiatan">Kegiatan Sehari-hari</a>
        </li> -->
	</ul>
</div>
</div>
<?php
}if($level=='adum'){
?>
<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Master" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-master'">
        <a href="?module=profil">Data Profil</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=anggota">Data Anggota</a>
        </li>		
        <li data-options="iconCls:'icon-master'">
        <a href="?module=kegiatan">Data Kegiatan</a>
        </li>
         <li data-options="iconCls:'icon-master'">
        <a href="?module=sie">Data Sie Acara</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=jenis">Data Jenis Simpanan</a>
        </li>
        
	</ul>      
</div>
<div title="Transaksi" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
    	<li data-options="iconCls:'icon-master'">
        <a href="?module=poin_acara">Poin Kegiatan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=simpanan">Simpanan</a>
        </li>
        <li data-options="iconCls:'icon-new'">
        <a href="?module=penarikan">Penarikan</a>
        </li>
    </ul>
</div>
<div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-anggota">Anggota</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-simpanan">Simpanan</a>
        </li>
        
	</ul>
</div>
</div>
<?php
}if ($level=='kasir'){
?>
<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Transaksi" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
      <li data-options="iconCls:'icon-new'">
        <a href="?module=jual">Penjualan</a>
        </li>
        
	</ul>
</div>
<div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-barang">Barang</a>
        </li>
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-jual">Penjualan</a>
        </li>
	</ul>
</div>

</div>
<?php
}if ($level=='keuangan'){
?>
<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Transaksi" data-options="iconCls:'icon-master'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
    	<li data-options="iconCls:'icon-master'">
        <a href="?module=rekening">Data Akun</a>
        </li>
    </ul>
</div>
<div title="Transaksi" data-options="iconCls:'icon-master'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
        <li data-options="iconCls:'icon-master'">
        <a href="?module=jurnal">Jurnal Umum</a>
        </li>
        <!--
        <li data-options="iconCls:'icon-master'">
        <a href="?module=penerimaan_kas">Penerimaan Kas</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=pengeluaran_kas">Pengeluaran Kas</a>
        </li>
        -->
    </ul>
</div>
<div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-bukubesar">Buku Besar</a>
        </li>
        <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-neraca">Neraca</a>
        </li>
         <li data-options="iconCls:'icon-print'">
        <a href="?module=lap-shu">Laba/Rugi</a>
        </li>
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-barang">Barang</a>
        </li>
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-jual">Penjualan</a>
        </li>
    </ul>
</div>
</div>
<?php
}if ($level=='gudang'){
?>
<div class="easyui-accordion" style="float:left;width:170px;color:#FFF;">
<div title="Master" style="overflow:auto;padding:5px 0px;">
	<ul class="easyui-tree">
        <li data-options="iconCls:'icon-master'">
        <a href="?module=profil">Data Profil</a>
        </li>	
        <li data-options="iconCls:'icon-master'">
        <a href="?module=barang">Data Barang</a>
        </li>
        <li data-options="iconCls:'icon-master'">
        <a href="?module=supplier">Data Supplier</a>
        </li>	
        <li data-options="iconCls:'icon-master'">
        <a href="?module=kategori">Data Kategori</a>
        </li>
	</ul>      

</div>
<div title="Transaksi" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
      <li data-options="iconCls:'icon-new'">
        <a href="?module=pembelian">Pembelian</a>
        </li>
	</ul>
</div>
<div title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
    <ul class="easyui-tree">
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-barang">Barang</a>
        </li>
    	<li data-options="iconCls:'icon-print'">
        <a href="?module=lap-jual">Penjualan</a>
        </li>
	</ul>
</div>
</div>
<?php
}
?>