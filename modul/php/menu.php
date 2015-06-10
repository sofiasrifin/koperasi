<table width="470" height="22" border="0" align="left" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#CCCCCC">
  <tr>
    <?php
/* EnableDisable.php */

// array menu
$menu = array(
    '&nbsp;Home&nbsp;'     => 'index_admin.php',
    '&nbsp;Buku&nbsp;' => 'anggota.php',
    '&nbsp;Anggota&nbsp;'     => 'berita.php',
    '&nbsp;Seting&nbsp;'     => 'artikel.php',
    '&nbsp;Laporan&nbsp;'   => 'iklan.php',
    '&nbsp;Grafik&nbsp;'   => 'pesan_tanggapan.php',
	);

foreach ($menu as $key => $val) {
   if (!isCurrPage($val)) { ?>
    <td><a href="<?=$val?>" title="<?=$key?>"></a>
        <div class="buttons1"><a href="<?=$val?>" title="<?=$key?>">
          <?=$key?>
      </a></div></td>
    <?php } 
	else { ?>
    <td><div class="topage">
      <?=$key?>
    </div></td>
    <?php } ?>
    <?php }

function isCurrPage($url) {
   if (strpos($_SERVER["SCRIPT_NAME"],
   $url)===false) {
      return false;
   } else {
      return true;
   }
}

?>
  </tr>
</table>
