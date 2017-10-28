<?php
include 'web/connect.php';
include 'session.php';
$q = $_POST['q'];
$ac = $_POST['ac'];
$user = $_SESSION['login_user'];

if($ac == 1)
{
$sql ="update emails set stat=0 where id='$q' and user='$user'";

    $retval = mysqli_query( $con, $sql );
 }
else {
}
?>