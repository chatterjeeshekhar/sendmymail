<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
$servername1 = "127.0.0.1";
$username1 = "root";
$password1 = "xxxxxxxxxxxxxxx";
$dbname1 = "shekharc_mailer";
$tz = "570";

$connection = mysql_connect($servername1, $username1, $password1);
$db = mysql_select_db($dbname1, $connection);
mysql_select_db($dbname1, $connection);

$con=mysqli_connect($servername1, $username1, $password1, $dbname1);if (!$con) {    die('Could not connect: ' . mysqli_error());}
?>