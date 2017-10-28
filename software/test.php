<?php
include 'connect.php';
$result222 = mysqli_query($con,"SELECT SUBSTR(CONCAT(MD5(RAND()),MD5(RAND())),1,8) AS RES");
$row222 = mysqli_fetch_assoc($result222);
$randstr = $row222['RES'];
echo $randstr;
?>