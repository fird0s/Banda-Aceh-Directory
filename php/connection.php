<?php

// $mysql_hostname = "localhost";
// $mysql_user = "root";
// $mysql_password = "root";
// $mysql_database = "banda_directory";


$mysql_hostname = "ap-cdbr-azure-east-c.cloudapp.net";
$mysql_user = "b4e6af17fa0cb3";
$mysql_password = "13ae37d4";
$mysql_database = "bandadirectoryDB";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Cannot connect MYSQL");
mysql_select_db($mysql_database, $bd) or die("cannot select db");






?> 