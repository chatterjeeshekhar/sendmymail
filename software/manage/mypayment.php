<?php
include('session.php');


  $payment_status   = $_POST['payment_status'];
  $payment_amount   = $_POST['mc_gross'] *= $_SESSION['currency_value'];
  $txn_id           = $_POST['txn_id'];
  $receiver_email   = $_POST['receiver_email'];
  $payer_email      = $_POST['payer_email'];
$credits = $_POST['custom'];
$custom_values = explode('|',$_POST['custom']);
$useraccount = $_SESSION['login_user'];
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR'];
if($$custom_values[0] < 50)
{header('location: home.php');}
include 'web/connect.php';
// Check connection
if(! $connection ) {
      die('Could not connect: ' . mysql_error());
   }

$sql = "INSERT INTO bills (username, credits, amount, transid, status, ip, stamp) VALUES ('".$custom_values[1]."', '".$custom_values[0]."', '".$payment_amount."', '".$txn_id."', '".$payment_status."', '".$ipadd."', (NOW() + INTERVAL '$tz' MINUTE));";

   $retval = mysql_query( $sql, $connection );

$sql2 ="update login set balance=balance+'".$custom_values[0]."' where username='".$custom_values[1]."';";
    $retval2 = mysql_query( $sql2, $connection );
@header('location: bills.php');
?>