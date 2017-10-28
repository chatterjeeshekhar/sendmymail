<?php
error_reporting(0);
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Invalid Username or Password";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include '../admin/web/connect.php';

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
// Selecting Database

// SQL query to fetch information of registered users and finds user match.
$query = mysqli_query($con, "select * from login where password=md5('$password') AND username='$username'");
$rows = mysqli_num_rows($query);
$row2 = mysqli_fetch_assoc($query);
if ($rows == 1) {
  $_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR'];
$querymx = mysqli_query($con, "select IP,active from banip where IP='$ipadd' AND active='0'");
$chkrows = mysqli_num_rows($querymx);
if($chkrows>0){
$query11 = mysqli_query($con, "update login set active='N' where username='$username'");
  $error = "Your IP is banned, kindly contact administrator";
}
else {
//SUCCESSFUL LOGIN
if($row2['active'] == "Y" || $row2['active'] == "D")
{
$error = "Your account is already activated: <b><a href='/'>Login now</a></b>";
}
else
if($row2['active'] == "A") {
$_SESSION['login_user']=$username;
@exit(header("Location: home.php"));
}
else 
{
$error = "Account suspended by administrator";
}

//SUCCESSFUL LOGIN ENDS
}
} else {
$error = "Username or Password Incorrect";
}
}
}
?>