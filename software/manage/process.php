<?php
include 'session.php';
$businessemail = $_SESSION['paypalemail'];
$totalcred = $_POST['addcred'];
$totalinr = $totalcred *= $_SESSION['smsrate'];
$totalbill1 = $totalinr /= $_SESSION['currency_value'];
$totalbill = round($totalbill1 , 2);
$itemn = $_SESSION['projectname']." ".$_POST['addcred']." Credits";
$notifyurl = $_SESSION['projectweb']."mypayment.php";
$cancelurl = $_SESSION['projectweb']."recharge.php";
$useremail = $_SESSION['useremail'];
$usern = $_SESSION['login_user'];
$paysand = $_SESSION['paysand'];
$url = "https://www.".$paysand."/cgi-bin/webscr"."?cmd=_xclick"."&business=".$businessemail."&email=".$useremail."&item_name=".$itemn."&item_number=1&amount=".$totalbill."&currency_code=USD&return=".$notifyurl."&shopping_url=".$_SESSION['projectweb']."&custom=".$_POST['addcred']."|".$usern."&no_note=1&cancel_return=".$cancelurl."&notify_url=".$notifyurl;


header ('location:'.$url);
exit();
?>