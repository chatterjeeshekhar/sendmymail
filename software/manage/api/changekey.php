<?php
include 'admin/web/connect.php';
mysqli_select_db($con,$dbname1);
 $user = $_POST['user'];
$pass = $_POST['pass'];
$api = $_POST['myapi'];
$sql="UPDATE login set apikey=SUBSTR(CONCAT(MD5(RAND()),MD5(RAND())),1,18) WHERE username='$user' and password=md5('$pass') and apikey= '$api'";
echo $sql;
$result = mysqli_query($con,$sql);
if(mysqli_affected_rows($con) > 0)
{
echo "<script>window.location.href = window.location.href;</script>";

}
else{
echo '<script language="javascript">';
echo 'alert("Key generation failed")';
echo '</script>';
}
?>