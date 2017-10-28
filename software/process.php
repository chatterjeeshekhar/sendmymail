<?php
error_reporting(0);
ini_set("display_errors", 0);
include 'session.php';
include 'connect.php';
//PAYPAL VARIABLES
$itemno = rand(10000000,99999999);
$businessemail = $_SESSION['paypalemail'];
$paysand = $_SESSION['paysand'];
$notifyurl = "https://www.sendmymail.in/mypayment.php";
$cancelurl = "https://www.sendmymail.in/failure.php";
//PAYPAL VARIABLES END
//SLAB CONVERSION
$getslab = $_POST['slab'];
if ($getslab == 1)
$totalcred = 50000;
if ($getslab == 2)
$totalcred = 100000;
if ($getslab == 3)
$totalcred = 200000;
if ($getslab == 4)
$totalcred = 500000;
//SLAB CONVERSION END
//FORM VARIABLES
$usern = $_POST['usern'];
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$useremail = $_POST['useremail'];
$tel = $_POST['tel'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
//CHECK USERNAME
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,$dbname1);
$sql="SELECT count(*) CNT FROM login WHERE username = '$usern'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
   
    $stat = $row['CNT'];
if($stat == "1")
  $usrchk = 1;

else
if($stat == "0")
$usrchk = 0;   
}

mysqli_close($con);
//CHECK USERNAME
 if(
          empty($usern)
          || empty($pass)
          || empty($fname)
          || empty($lname)
          || empty($useremail)
          || empty($tel)
          || empty($address)
          || empty($city)
          || empty($country)
          || empty($getslab)
      
  ) {
    echo "<center><h3><br><BR><font color='red'>Invalid form data. Please fill all required fields</font></h3></center";
    echo "Check: ".$usrchk;
  } else {
  if($usrchk == 1 || $usern == "admin") {
  echo "<center><h3><br><BR><font color='red'>Invalid form data. Enter unique username.</font></h3></center"; 

 }
  else
  {
$secretkey = "2ab57d56243b325a09";
$customa = $itemno."|".$getslab."|".$usern."|".$pass."|".$fname."|".$lname."|".$useremail."|".$tel."|".$address."|".$city."|".$country."|".$secretkey;
$hash = strtolower(hash('sha256', $customa));
$customx = $customa."|".$hash;
//FORM VARIABLES END



//PROCESSING
$itemn = $_SESSION['projectname']." ".$totalcred." Credits";

$curval = $_SESSION['currency_value'];
if($curval == NULL)
{
	$curval = "68.45";
}
$totalinr = $totalcred *= $_SESSION['smsrate'];
$totalbill1 = $totalinr /= $curval;
$totalbill = round($totalbill1 , 2);
$url = "https://www.".$paysand."/cgi-bin/webscr"."?cmd=_xclick"."&business=".$businessemail."&email=".$useremail."&item_name=".$itemn."&item_number=".$itemno."&amount=".$totalbill."&currency_code=USD&return=".$notifyurl."&shopping_url=".$_SESSION['projectweb']."&custom=".$customx."&no_note=1&cancel_return=".$cancelurl."&notify_url=".$notifyurl;

exit(header("Location: " .$url));
}
}
?>
<html><style>
body {
	font-family: Arial;
}
</style></html>