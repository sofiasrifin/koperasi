<?php
session_start();
if (!isset($_SESSION['userid'] )) {
	include("include/config.php");
include("include/openDB.php");
include("include/inc.func.php");
include("include/config-sec.php");
    ?>
    <script language="Javascript">
<!-- 
if (top.location != self.location) {
top.location = self.location.href
}
//--> 
</script>
    <?php
    echo "Session might be expire. Please <u><a href=".$theurl.">RELOGIN</a></u>";
    $_SESSION = array();
    @session_unset();
    @session_destroy();
    exit;
} 
?>