<?php 
include '../admin/web/connect.php';

//AUTHENTICATION STARTS
$userac = $_GET['user'];
$api = $_GET['apikey'];

$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,$dbname1);
$sql="SELECT * FROM login WHERE username = '$userac' and apikey= '$api'";
$result = mysqli_query($con,$sql);

if($row = mysqli_fetch_array($result)){
$acstat = $row['active'];
if($acstat == "D") 
echo '<title>Restricted Account</title>{"Status":"RestrictedAccount","Blocked":"0","Blacklist":"0"}';

else 
if($acstat == "N") 
echo '<title>Suspended Account</title>{"Status":"Suspended","Blocked":"0","Blacklist":"0"}';

else
if($acstat == "A") 
echo '<title>Pending Activation</title>{"Status":"PendingActivation","Blocked":"0","Blacklist":"0"}';

else {
  //AUTHENTICATION SUCCESS
  $curbal = $row['balance'];
  
if($curbal > 0) {
{
    
    $email_to = $_GET['to'];    // Receiver's email
$email_to = preg_replace('#\s+#',',',trim($email_to));
        $email_sender = $_GET['sender'];  // Sender Email
$sender_name = $_GET['name']; // Sender Name
    $Email = $_GET['replyto']; // Reply-to Email
$email_subject = $_GET['subject']; // Email Subject
    $thankyou = "thanks.html";
$email_message = $_GET['body']; // Message Body
$email_content = $_GET['body'];
$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR']; // Client IP Address
$ccmail = $_GET['cc']; // CC Email IDs
$ccmail = preg_replace('#\s+#',',',trim($ccmail));
$bccmail = $_GET['bcc']; // BCC Email IDs
$bccmail = preg_replace('#\s+#',',',trim($bccmail));

if(isset($_GET['myfile']))
$filevar = $_GET['myfile'];
$exceedchk = 0;

if ($filevar == NULL)
{
$filechk = "Y";
}
else {
$filechk = "N";
}

 if($email_to != "")
{
$tags = explode(',' , $email_to);
$num_tags = count($tags);
  $exceedchk = $exceedchk + $num_tags;
} 
 if($ccmail != "")
{
$tags = explode(',' , $ccmail);
$num_tags = count($tags);
  $exceedchk = $exceedchk + $num_tags;
}  
 if($bccmail != "")
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
$email_to = str_replace($mybl[$myrow], "", $email_to);
$ccmail = str_replace($mybl[$myrow], "", $ccmail);
$bccmail = str_replace($mybl[$myrow], "", $bccmail);
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
$email_message .= "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $email_message . "\n\n";
 
foreach($_FILES as $userfile){
      // store the file information to variables for easier access
      $tmp_name = $userfile['tmp_name'];
      $type = $userfile['type'];
      $name = $userfile['name'];
      $size = $userfile['size'];

      // if the upload succeded, the file will exist
      if (file_exists($tmp_name)){

         // check to make sure that it is an uploaded file and not a system file
         if(is_uploaded_file($tmp_name)){
    
            // Open the file for a binary read
            $file = fopen($tmp_name,'rb');
    
            // Read the file content into a variable
            $data = fread($file,filesize($tmp_name));

            // Close the file
            fclose($file);
    
   
            $data = chunk_split(base64_encode($data));
         }
    


       
         $email_message .= "--{$mime_boundary}\n" .
            "Content-Type: {$type};\n" .
            " name=\"{$name}\"\n" .
            "Content-Disposition: attachment;\n" .
            " filename=\"{$name}\"\n" .
            "Content-Transfer-Encoding: base64\n\n" .
         $data . "\n\n";
      }
   }
            
if($exceedchk <= $curbal)
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
@$myresult = mail($email_to, $email_subject, $email_message, $headers, $fromserver);
$deliv = $exceedchk - $cntrow;
if(!$myresult) {   
     echo '<title>Email Failure</title>';
echo '{"Status":"Failed","Blocked":"'.$cntrow.'","Blacklist":"'.$cntrow.'","Delivered":"'.$deliv.'"}';
} else {
  
echo '<title>Email Sent Successfully</title>';

echo '{"Status":"Delivered","Blocked":"'.$cntrow.'","Blacklist":"'.$cntrow.'","Delivered":"'.$deliv.'"}';

// Check connection
if(! $connection ) {
      die('Could not connect: ' . mysqli_error());
   }

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
    $retval2 = mysqli_query( $con, $sql2 );


mysqli_close($connection);
}
//FINISH ADDING TO DATABASE
}
else 
if($curbal <= 0){
  echo "<font color='red' face='Arial'><center><h2>Not enough Balance</h2></center></font>";
}
}
}
}
}
else {
  echo '<title>Authentication failed</title>';
echo '{"Status":"AuthFailed","Blocked":"0","Blacklist":"0"}';
}
?>