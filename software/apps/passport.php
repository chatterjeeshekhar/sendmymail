<title>Passport Current Status</title>
<meta name="viewport" content="width=device-width;initial-scale=1">
<style>
body {
font-family: Arial;
}
td,input[type=text] {
padding: 10px;
}
h3 {
font-family: Arial;
color: grey;
}
th {
background-color: #8F8F8F;
color: #fff;
padding: 15px;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
.asa {
    width: 90%;
padding: 12px 20px;
margin: 8px 0;
 border: none;
 border-bottom: 2px solid grey;
}
.asa:focus {
border: none;
 border-bottom: 2px solid #0DC2FF;
  
}
</style>
<br>
<center><h3>Passport Live Status</h3><hr width="80%">
<form action="" method="post">
<table class='pure-table-striped' border='1' bordercolor='#8F8F8F' width='80%'>
<thead><tr><th></th><th>.</th></tr></thead>
<tbody><tr class='pure-table-odd'><td>
File Number</td><td><input type="search" name="myfile" class="asa" required="required"></td></tr>
<tr><td>Date of Birth</td><td><input type="date" name="mydob" class="asa" required="required"></td></tr>
<tr><td></td><td><input type="submit" value="Continue" class="button"></td></tr>
</tbody></table></form>
<?php
  function getStatus($file, $dob){
    $url  = "http://www.passportindia.gov.in/AppOnlineProject/statusTracker/trackStatusForFileNoNew?fileNo=$file&applDob=$dob";
    $data = file_get_contents($url);  

//echo preg_match_all('/<table cellpadding=\"4\" cellspacing=\"4\" align=\"center\" width=\"100%\" role=\"presentation\">(.*)<\/table>/',$data, $converted);
preg_match_all('/<td >(.*)<\/td>/',$data, $converted);
$chk = preg_match_all('/<td >(.*)<\/td>/',$data, $converted);
echo "<center>";
if($chk >0) {
//Printing
echo "<table class='pure-table-striped' border='1' bordercolor='#8F8F8F' width='80%'>";
echo "<thead><tr><th></th><th>Description</th></tr></thead><tbody>";
echo "<tr class='pure-table-odd'>".$converted[0][0]."<td>".$file."</td></tr>";
echo "<tr>".$converted[0][1];
echo $converted[0][2]."</tr>";
echo "<tr class='pure-table-odd'>".$converted[0][3];
echo $converted[0][4]."</tr>";
echo "<tr>".$converted[0][5];
echo $converted[0][6]."</tr>";
echo "<tr class='pure-table-odd'>".$converted[0][7];
echo $converted[0][8]."</tr>";
echo "<tr>"."<td>Application Processed On</td>";
echo $converted[0][9]."</tr>";
echo "<tr class='pure-table-odd'>"."<td>Current Status</td>";
echo $converted[0][10]."</tr>";
echo "</tbody></table><br><Br><Br>";
//Printing
}
else {echo "<br><font size='4' color='red'><script>alert('Invalid File Number or Date of Birth');</script>Invalid File Number or Date of Birth</font>"; }
  }

  # Call function  
$fileno = $_POST['myfile'];
$dob = $_POST['mydob'];

$a1 = substr($dob,8,2)."/".substr($dob,5,2)."/".substr($dob,0,4);
if($fileno != NULL) {
echo getStatus($fileno, $a1);
}
  ?>


