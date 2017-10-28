<?php
include 'session.php';
include 'web/connect.php';
$ppwp = $_POST['action'];
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$usern = $_SESSION['login_user'];
$sql2 = "select GROUP_CONCAT(email SEPARATOR ',') allemail from contacts,groups where groups.grpname=contacts.grp and contacts.user='".$usern."' and contacts.level=2 and groups.ID='".$ppwp."';";
$retval2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($retval2);
$row_cnt = mysqli_num_rows($retval2);
$getemail = $row2['allemail'];
?>