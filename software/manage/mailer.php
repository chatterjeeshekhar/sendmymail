<?php 
include('session.php');
include 'web/connect.php';
debug_backtrace() || die ("Direct access not permitted");
$acstat = $_SESSION['acstat'];
if($acstat == "D") {
echo "<center><h3><font color='red'>>>> Outgoing emails are suspended for your account <<<</font></h3></center>";
}
else {
echo "";
$curbal = $_SESSION['user_balance'];
if($curbal > 0) {
if(!isset($_POST['Submit'])) {
@header('Location: home.php');
}
else {
    
    $email_to = $_POST['toemail'];    // Receiver's email
$email_to = preg_replace('#\s+#',',',trim($email_to));
        $email_sender = $_POST['senderemail'];  // Sender Email
$sender_name = $_POST['sendername']; // Sender Name
    $Email = $_POST['replyto']; // Reply-to Email
$email_subject = $_POST['msubject']; // Email Subject
    $thankyou = "thanks.html";
$email_message = $_POST['Comment']; // Message Body
$email_content = $_POST['Comment'];
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR']; // Client IP Address
$ccmail = $_POST['ccemail']; // CC Email IDs
$ccmail = preg_replace('#\s+#',',',trim($ccmail));
$bccmail = $_POST['bccemail']; // BCC Email IDs
$bccmail = preg_replace('#\s+#',',',trim($bccmail));

if(isset($_POST['Resume']))
$filevar = $_POST['Resume'];
 for($i=0; $i < count($_FILES['Resume']['name']); $i++){

        $ftype[]       = $_FILES['Resume']['type'][$i];
        $fname[]       = $_FILES['Resume']['name'][$i];

    }


    // array with filenames to be sent as attachment
    $files = $fname;

$exceedchk = 0;

if ($filevar == NULL)
{
$filechk = "Y";
}
else {
$filechk = "N";
}


 if($email_to != NULL)
{
$tags = explode(',' , $email_to);
$num_tags = count($tags);
  $exceedchk = $exceedchk + $num_tags;
} 
 if($ccmail != NULL)
{
$tags = explode(',' , $ccmail);
$num_tags = count($tags);
  $exceedchk = $exceedchk + $num_tags;
}  
 if($bccmail != NULL)
{
$tags = explode(',' , $bccmail);
$num_tags = count($tags);
  $exceedchk = $exceedchk + $num_tags;
}   
//BLACKLIST REMOVAL TOOL STARTS
$myquery = mysqli_query($con, "select email from blacklist");
$cntrow = mysqli_num_rows($myquery);
$mybl = array();
$index = 0;
while($resx = mysqli_fetch_assoc($myquery)){ // loop to store the data in an associative array.
     $mybl[$index] = $resx;
     $index++;
}
for ($myrow = 0; $myrow < $cntrow; $myrow++) {
$email_to = str_replace($mybl[$myrow].",", "", $email_to);
$ccmail = str_replace($mybl[$myrow].",", "", $ccmail);
$bccmail = str_replace($mybl[$myrow].",", "", $bccmail);
}
//BLACKLIST REMOVAL TOOL ENDS
        // boundary 
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    
    function died($error) {
        echo "Sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
    
    

            
    
    
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    

    


    
 // multipart boundary 
    $email_message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $email_message . "\n\n"; 
    $email_message .= "--{$mime_boundary}\n";

 

            
if($exceedchk < $curbal)
{
$headers = "From: {$sender_name} <{$email_sender}>"."\r\n";   // Mail will be sent from your Admin ID

if ( "" != $ccmail || "" != $bccmail)
{

if ( "" != $ccmail)
{
$headers .= "CC: ".$ccmail."\r\n";
}

if ( "" != $bccmail)
{
$headers .= "BCC: ".$bccmail."\r\n";
}

}
$headers .= 'Reply-To: '.$Email."\r\n" . // Reply to Sender Email          
'X-Mailer: PHP/' . phpversion();
$fromserver = "-f".$email_sender;
// headers for attachment
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

@mail($email_to, $email_subject, $email_message, $headers, $fromserver);

echo '<title>Email Sent Successfully</title><meta name="viewport" content="width=device-width, initial-scale=1"><center><h3><Br><font color="green" face="Arial">Your Email Sent Successfully</font></h3><a href="reports.php"><img src="view-report-button.gif"></a></center>';


// Check connection
if(! $con ) {
      die('Could not connect: ' . mysqli_error());
   }

$userac = $_SESSION['login_user'];
$email_content = str_replace('"','/"',$email_content);
$email_content = mysqli_real_escape_string($con, $email_content);
$sql = "INSERT INTO emails  (Receiver, Sender, Name, Replyto, Subject, Content, CC, BCC, Files, IP, user, Stamp) VALUES ('$email_to', '$email_sender', '$sender_name', '$Email', '$email_subject', '$email_content', '$ccmail', '$bccmail', '$filechk', '$ipadd', '$userac', (NOW() + INTERVAL '$tz' MINUTE));";


   $retval = mysqli_query( $con, $sql );

 if(! $retval ) {
      die('Could not enter data: ' . mysqli_error());

   }
   else
   {
    
   }
$sql2 ="update login set total=total+'$exceedchk', balance=balance-'$exceedchk' where username='$userac';";
    $retval2 = mysqli_query( $con , $sql2 );


mysqli_close($con);

//FINISH ADDING TO DATABASE
}
else {
  echo "<font color='red' face='Arial'><center><h2>Not enough Balance</h2></center></font>";
}
}
}
}
?>