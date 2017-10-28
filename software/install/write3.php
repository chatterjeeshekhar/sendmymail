<?php
include 'connect.php';
$query = "update boss set username='".$_POST['uname']."', password='".$_POST['upass']."', fname='".$_POST['fname']."', lname='".$_POST['lname']."', email='".$_POST['uemail']."', address='".$_POST['address']."', city='".$_POST['city']."', country='".$_POST['country']."'";
$result = mysqli_query($con, $query);
$rows = mysqli_affected_rows($con);
if($rows > 0)
{
mysqli_query($con, "update main set install=4 where id=1");
@header('location: finish.php');
}
else {}
?>