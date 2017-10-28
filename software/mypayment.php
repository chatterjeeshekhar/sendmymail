<?php
include('session.php');
//PAYPAL RETURN VARIABLES
  $payment_status   = $_POST['payment_status'];
  $curval = $_SESSION['currency_value'];
  if($curval == NULL){$curval = "68.45";}
  $payment_amount   = $_POST['mc_gross'] *= $curval;
  $txn_id           = $_POST['txn_id'];
  $receiver_email   = $_POST['receiver_email'];
  $payer_email      = $_POST['payer_email'];
  $customx = $_POST['custom'];
//PAYPAL RETURN END
// CUSTOM EXPLOSION
$kgp = explode('|',$customx);
$itemno = $kgp[0];
$slab = $kgp[1];
$usern = $kgp[2];
$pass = $kgp[3];
$fname = $kgp[4];
$lname = $kgp[5];
$useremail = $kgp[6];
$tel = $kgp[7];
$address = $kgp[8];
$city = $kgp[9];
$country = $kgp[10];
//
$hash1 = $kgp[12];
$secretkey = "2ab57d56243b325a09";
$customa = $itemno."|".$slab."|".$usern."|".$pass."|".$fname."|".$lname."|".$useremail."|".$tel."|".$address."|".$city."|".$country."|".$secretkey;
$hash2 = strtolower(hash('sha256', $customa));
//CUSTOM BLAST END
//Slab to Balance
if ($slab == 1)
$bal = 50000;
if ($slab == 2)
$bal = 100000;
if ($slab == 3)
$bal = 200000;
if ($slab == 4)
$bal = 500000;

//Slab to Balance

if($hash1 == $hash2)
{
include 'session.php';
 include 'connect.php';
 $connection = mysqli_connect($servername1, $username1, $password1, $dbname1);
$result222 = mysqli_query($connection,"SELECT SUBSTR(CONCAT(MD5(RAND()),MD5(RAND())),1,6) AS RES");
$row222 = mysqli_fetch_assoc($result222);
$randstr1 = $row222['RES'];
$result333 = mysqli_query($connection,"SELECT SUBSTR(CONCAT(MD5(RAND()),MD5(RAND())),1,6) AS RES");
$row333 = mysqli_fetch_assoc($result333);
$randstr2 = $row333['RES'];
// AUTHENTICATION SUCCESSFUL
$repeatcheck = mysqli_query($connection, "insert into verify (user, registerstamp, mcode, ecode) values ('$usern', (NOW() + INTERVAL '$tz' MINUTE), '$randstr1', '$randstr2');");
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR'];

if($repeatcheck) {


 //////////////// SMS FUNCTION /////////////////////////////////////////////////////////////

  $api_key = $_SESSION['smsapi'];
$contacts = $tel;
$from = "MAILER";
$type = "text";
$routeno = "4";
$panel = "control.msg91.com";
$pronm = $_SESSION['projectname'];
$proweb = $_SESSION['projectweb'];
$supmail = $_SESSION['supportemail'];
$sender_name = $_SESSION['projectname'];
$msg = "Your registration details. Username: '".$usern."' , Password: '".$pass."', Unique code: '".$randstr1."'. Login url: ".$proweb.". Thank you for using ".$pronm;
$sms_text = urlencode($msg);
$api_url = "https://control.msg91.com/api/sendhttp.php?authkey=".$api_key."&mobiles=".$contacts."&sender=".$from."&route=4&message=".$sms_text;

$response = file_get_contents($api_url);
  //////////////// SMS FUNCTION /////////////////////////////////////////////////////////////
 //////////////// EMAIL FUNCTION /////////////////////////////////////////////////////////////
  $email_to = $useremail.",".$supmail;
$email_sender = $supmail;
 $email_subject = "New Registration Details: ".$sender_name;
 $email_message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" style="background:#ddd">
        <body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#ffffff; -webkit-text-size-adjust:none">
        <div style="background:#fff;padding:0;margin:0;font-family:Verdana,Geneva,sans-serif;font-size:14px;color:#333333;line-height:22px">
    <div style="width:600px;margin:0 auto;background:#fff">
            <div style="min-height:5px;background-color:#00a65a">
                <span style="min-height:5px;background-color:#0B638C;width:100px;display:block"></span>
            </div>
            <div>
                <h1 style="color:#0B638C;font-weight:normal;text-align:left">Dear '.$fname.' '.$lname.',</h1>
                <div style="padding:15px 15px 15px 0">
                    Your Registration details are here. As a security measure account owner verification may be required before getting started.
                </div>
            </div>
            <div align="center" style="background-color:#fbfbfb; border:1px solid #f8f8f8;color:#333333;font-size:15px;line-height:29px;margin:20px 0;padding:10px">
                Username: '.$usern.'<br>Password: '.$pass.'<br>Unique pass code: '.$randstr2.'<br>Login Address: '.$proweb.'</div><br>
            <div style="margin:20px 0">If this was not requested by you, kindly contact us immediately on helpline@hostdude.org.
              <span style="color:#333333">Thanks once again</span>, We hope you have enjoyed our services!
            </div>
                <div style="font-size:15px">
                    Stay closer <br>
                    Team '.$pronm.' <br><br><font color="#009900" face="Webdings" size="4">P</font><font
  color="#009900" face="verdana,arial,helvetica" size="2"> <strong>Please
consider the environment before printing this email</strong></font>
                </div>
        </div>
      </body>
        </html>';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 $headers .= "From: {$sender_name} <{$email_sender}>"."\r\n".'X-Mailer: PHP/' . phpversion();
$fromserver = "-f".$email_sender;


// headers for attachment
@mail($email_to, $email_subject, $email_message, $headers, $fromserver);

 //////////////// EMAIL FUNCTION /////////////////////////////////////////////////////////////

}
$result111 = mysqli_query($connection,"SELECT SUBSTR(CONCAT(MD5(RAND()),MD5(RAND())),1,18) AS RES");
$row111 = mysqli_fetch_assoc($result111);
@$randapi = $row111['RES'];
$sql ="insert into login (username, password, lastlogin, fname, lname, email, address, city, country, tel, registerlog, active, balance, apikey) values ('$usern', md5('$pass'), (NOW() + INTERVAL '$tz' MINUTE), '$fname', '$lname', '$useremail', '$address', '$city', '$country', '$tel', (NOW() + INTERVAL '$tz' MINUTE), 'A', '$bal', '$randapi');";
$retval = mysqli_query($connection,$sql);


$sql3 = "INSERT INTO bills (username, credits, amount, transid, status, ip, stamp) VALUES ('".$usern."', '".$bal."', '".$payment_amount."', '".$txn_id."', '".$payment_status."', '".$ipadd."', (NOW() + INTERVAL '$tz' MINUTE));";
$retval = mysqli_query($connection,$sql3);


@exit(header("Location: success.php"));
}
else {
@exit(header("Location: failure.php"));
}
?>
<title>Processing..</title>