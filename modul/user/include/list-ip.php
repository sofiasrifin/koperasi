<?php
if ($ipRestriction == "1") {
$ipr = getKonfigurasi();
$ip=$_SERVER['REMOTE_ADDR'];
$theIP = $ipr[12];
if (cekIP($ip,$theIP) == FALSE) {
echo "<h2>Sorry, your IP $ip is not registere</h2>";
exit;
} 
}
?>