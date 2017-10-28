<?php
ini_set('memory_limit', '-1');
require_once 'admin/excel/excelreader.php';
require 'web/connect.php';
include 'session.php';
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);

//Add reader.php to uploadfile.php and don't forget to add db connection file.

// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();

// Set output Encoding.
$data->setOutputEncoding('CP1251');

@$target_file = $_FILES['fileToUpload']['tmp_name'];

$data->read($target_file);   // $target_file will be your excel file path

for ($x=2; $x<=count($data->sheets[0]["cells"]); $x++) {
   $name = $data->sheets[0]["cells"][$x][1];
   $email = $data->sheets[0]["cells"][$x][2];
   $email = str_replace(" ","", $email);
   $grp = $_POST['mygrp'];
   $user = $_SESSION['login_user'];
   $sql = "INSERT INTO contacts (name,email,grp,user,time,level) VALUES ('$name','$email','$grp','$user', (NOW() + INTERVAL '$tz' MINUTE), '2')";
   
if($name!=NULL && $email!=NULL && $grp!=NULL && $user!=NULL){
   mysqli_query($con,$sql);
}
}
?>