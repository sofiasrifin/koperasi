<?php
$id_poll=$poll;
echo"$poll";
include "ofc-library/open_flash_chart_object.php";
open_flash_chart_object( 630, 425, "data_poll.php?id_poll=presiden" );
?>
