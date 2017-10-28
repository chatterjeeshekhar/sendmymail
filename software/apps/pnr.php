<title>PNR Current Status</title>
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
    width: 80%;
padding: 12px 20px;
margin: 8px 0;
 border: none;
 border-bottom: 2px solid grey;
}
.mai {
font-weight: bold;
}
.asa:focus {
border: none;
 border-bottom: 2px solid #0DC2FF;
  
}
</style>
<br>
<center><h3>PNR Live Status</h3><hr width="80%">
<form action="" method="post">
<table class='pure-table-striped' border='1' bordercolor='#8F8F8F' width='80%'>
<thead><tr><th></th><th>.</th></tr></thead>
<tbody><tr class='pure-table-odd'><td>
PNR Number</td><td><input type="search" name="mypnr" class="asa" required="required"></td></tr>
<tr><td></td><td><input type="submit" value="Get PNR Status" class="button"></td></tr>
</tbody></table></form>
<?php
  function getStatus($pnrno){
if(1==1) {
    $url  = "http://www.pnrstatusbuzz.in/?pnrno=$pnrno";
    $data = file_get_contents($url);  
//PART 1

preg_match_all('/<\/strong>(.*)<\/td>/',$data, $convert2); // Boarding Date
$convert2[0][0] = substr($convert2[0][0],10,10);
preg_match_all('/<span class=\"tahomablue14\">(.*)<\/span>/',$data, $converted);
$chk = preg_match_all('/<span class=\"tahomablue14\">(.*)<\/span>/',$data, $converted);
echo "<center>";
$converted[0][2] = rtrim((substr($converted[0][2],27)),"</span>");
if($chk >0) {
if ($converted[0][2] != "") {
//Printing
echo "<table class='pure-table-striped' border='1' bordercolor='#8F8F8F' width='80%'>";
echo "<thead><tr><th colspan='4'>Live PNR Status</th></tr></thead><tbody>";
echo "<tr class='pure-table-odd'><td class='mai'>PNR Number</td><td>".$converted[0][0]."</td><td class='mai'>Train Number</td><td>".$converted[0][1]."</td></tr>";
echo "<tr class='pure-table-odd'><td class='mai'>Train Name</td><td>".$converted[0][2]."</td><td class='mai'>Boarding Date [DD-MM-YYYY]</td><td>".$convert2[0][0]."</td></tr>";
echo "<tr class='pure-table-odd'><td class='mai'>Class</td><td>".$converted[0][3]."</td><td class='mai'>From Station</td><td>".$converted[0][4]."</td></tr>";
echo "<tr class='pure-table-odd'><td class='mai'>To Station</td><td>".$converted[0][5]."</td><td class='mai'>Reserved Upto</td><td>".$converted[0][5]."</td></tr>";
echo "<tr class='pure-table-odd'><td class='mai'>Boarding Point</td><td>".$converted[0][7]."</td><td class='mai'>No. of Passengers</td><td>".$converted[0][8]."</td></tr>";
echo "</tbody></table><br>";
//Printing
}
else {echo "<br><font size='4' color='red'><script>alert('Invalid / Flushed PNR / Indian Railway Servers Down');</script>Invalid / Flushed PNR / Indian Railway Servers Down</font>"; }
}

//PART 2
preg_match_all('/<td height=\"25\">(.*)<\/td>/',$data, $converting2);
$chk = preg_match_all('/<td height=\"25\">(.*)<\/td>/',$data, $converting2);

echo "<center>";
if($chk >0) {
//Printing
echo "<table class='pure-table-striped' border='1' bordercolor='#8F8F8F' width='80%'>";
echo "<thead><tr><th colspan='3'>Passenger Status</th></tr></thead><tbody>";
echo "<tr><td class='mai'>Sr. No</td><td class='mai'>Booking Status</td><td class='mai'>Current Status</td></tr>";

$rows = $chk /= 3;
for($x=1 ; $x<=$rows ; $x++) {
echo "<tr class='pure-table-odd'>";
$p = ($x-1)*3;
for ($m=$p;$m<($x*3);$m++)
{
echo $converting2[0][$m];
}
echo "</tr>";
}



if(preg_match_all('/<font color=\"#FF0000\">(.*)<\/font>/',$data, $chartstat) != 0)
preg_match_all('/<font color=\"#FF0000\">(.*)<\/font>/',$data, $chartstat);
else
preg_match_all('/<font color=\"#006600\">(.*)<\/font>/',$data, $chartstat);
echo "<tr class='pure-table-odd'><td colspan='2' class='mai'>Charting Status</td><td colspan='2' class='mai'>".$chartstat[0][0]."</td></tr>";
echo "<tr class='pure-table-odd'><td class='mai'>Get PNR by SMS</td><td colspan='2' class='mai'><form action='' method='post'><input type='hidden' name='mypnr' value='$pnrno'><input name='mymob' placeholder='Enter mobile number'  class='asa' required> <input type='submit' class='button' value='Send'></form></td></tr>";
echo "</tbody></table><br><Br><Br>";
//Printing
if($_POST['mymob'] != NULL){
//SMS FUNCTION
$api_key = "97171AtgwE89LMjHq563b08a0";
$contacts = $_POST['mymob'];
$from = "myPNRi";
$panel = "control.msg91.com";
$bp1 = explode(" ",$converted[0][7]);$bp1 = substr($bp1[1],21);
$apc = "PNR-".$converted[1][0]."\r\nTrn:".$converted[1][1]."\r\nDt:".$convert2[0][0]."\r\nFrm: ".$bp1." to ".$converted[1][6]."\r\nCls:".$converted[1][3];
preg_match_all('/<td height=\"25\">(.*)<\/td>/',$data, $converting2);
$chk = preg_match_all('/<td height=\"25\">(.*)<\/td>/',$data, $converting2);
$rows = $chk /= 3;
for($x=1 ; $x<=$rows ; $x++) {
$apc .= "\r\nP".$x."-".$converting2[1][(3*$x)-1];}
if(preg_match_all('/<font color=\"#FF0000\">(.*)<\/font>/',$data, $chartstat) != 0)
preg_match_all('/<font color=\"#FF0000\">(.*)<\/font>/',$data, $chartstat);
else
preg_match_all('/<font color=\"#006600\">(.*)<\/font>/',$data, $chartstat);
$apc .= "\r\n".$chartstat[1][0];
$sms_text = urlencode($apc);
$api_url = "https://".$panel."/api/sendhttp.php?authkey=".$api_key."&mobiles=".$contacts."&sender=".$from."&route=4&message=".$sms_text;
//Submit to server
$response = file_get_contents($api_url);
echo "<script>alert('SMS Sent');</script>";
//SMS FUNCTION ENDS
}
else {}
}
}
else {
}
  }

  # Call function  
$pnrno = $_POST['mypnr'];
  echo getStatus($pnrno);




  ?>