<?php
include 'connect.php';
$query = "update main set license='".$_POST['license']."', projectname='".$_POST['projectname']."', weburl='".$_POST['projectweb']."', supporturl='".$_POST['supportweb']."', supportemail='".$_POST['supportemail']."', paypal='".$_POST['ppemail']."', smsrate='".$_POST['rate']."', smsapi='".$_POST['license']."'";
$result = mysqli_query($con, $query);
$rows = mysqli_affected_rows($con);
if($rows > 0)
{
mysqli_query($con, "update main set install=3 where id=1");
@header('location: step-3.php');
}
else {}
?>