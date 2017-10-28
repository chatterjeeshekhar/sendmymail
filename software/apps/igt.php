<?php
$url  = "http://www.colorstv.com/in/indias-got-talent/voting.php";
    $data = file_get_contents($url);  

//echo preg_match_all("/'token':'(.*)'/",$data, $converted);
preg_match_all('/token(.*)}/',$data, $converted);
$chk = preg_match_all("/'token':'(.*)'/",$data, $converted);
echo $converted[0][0];
?>