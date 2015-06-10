<?
$hari=array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan=array("desember","januari","februari","maret","april","mei","juni","juli","agustus","september","oktober","november");
$hari_ini[0]=$hari[date("w")];
$bulan_ini[1]=$bulan[date("n")];
$coi=date(", j");
$tahun=date("Y");
?>
<a class="header"> <?=$hari_ini[0];?> <a class="header"><?=$coi;?> <?=$bulan_ini[1];?> <?=$tahun;?>
