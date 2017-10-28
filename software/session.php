<?php
debug_backtrace() || die ("Direct access not permitted");
include 'connect.php';
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
// Storing Session


$ses_sql2=mysqli_query($con,"select * from main where id=1");
$row2 = mysqli_fetch_assoc($ses_sql2);
//GLOBAL VARIABLES
$_SESSION['univalert'] = $row2['univalert'];
$_SESSION['smsapi'] = $row2['smsapi'];
$_SESSION['smsrate'] = $row2['smsrate'];
$_SESSION['projectname'] =$row2['projectname'];
$_SESSION['projectweb'] = $row2['weburl'];
$_SESSION['supportweb'] = $row2['supporturl'];
$_SESSION['supportemail'] = $row2['supportemail'];
$_SESSION['paypalemail'] = $row2['paypal'];
$_SESSION['extcode'] = str_replace('/"','"',$row2['extcode']);
$_SESSION['paysand'] = $row2['paysand'];

$curvalue = file_get_contents($_SESSION['projectweb']."currency.php");
$_SESSION['currency_value'] = $curvalue;
?>