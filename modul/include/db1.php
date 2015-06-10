<?php
$handle = @fopen("conf.txt", "r");
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
		$pieces = explode(" ", $buffer);

    }
    fclose($handle);
}

$user=$pieces[0];
$password=$pieces[1];
$db=$pieces[2];

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_config = "localhost";
$database_config = "$db";
$username_config = "$user";
$password_config = "$password";
$config = mysql_pconnect($hostname_config, $username_config, $password_config) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_config, $config);

?>