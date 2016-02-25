<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "votacion";


$link = mysql_connect($server, $user, $pass);
mysql_select_db($database, $link);
mysql_query("SET NAMES 'utf8'");


?>
