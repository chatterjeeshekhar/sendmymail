<?php
include 'connect.php';
session_start();
$query = mysqli_query($con, "select * from main");
$row = mysqli_fetch_assoc($query);
$_SESSION['insstat'] = $row['install'];
$_SESSION['projectweb'] = $row['weburl'];
?>