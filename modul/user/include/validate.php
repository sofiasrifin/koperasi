<?php
session_start();
if (!isset($_SESSION['userid'] )) {
	include("include/config.php");
include("include/openDB.php");
include("include/config-sec.php");
$data = getKonfigurasi();
    ?>
    <script language="Javascript">
if (top.location != self.location) {
top.location = self.location.href
}
</script>
    <?php
    $_SESSION = array();
    @session_unset();
    @session_destroy();    
?>
<meta http-equiv="refresh" content="0; url=<?=$theurl?>"> 
<?php
exit;
} 
?>