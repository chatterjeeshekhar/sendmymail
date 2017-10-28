<?php
include '../admin/web/connect.php';
 $user = $_GET['user'];
$pass = $_GET['pass'];

$sql="SELECT apikey FROM login WHERE username = '$user' and password= md5('$pass')";
$result = mysqli_query($con,$sql);


if($row = mysqli_fetch_array($result)) {
   
   echo '{"Key":"'.$row['apikey'].'"}';
   
}
else
echo '{"Key":"Error"}';
   

?>