HELLO!
<?php
$servername1 = "52.66.76.37";
$username1 = "root";
$password1 = "020898130896";
$dbname1 = "afas";
$con= mysqli_connect($servername1, $username1, $password1, $dbname1);if (!$con) {  }
$cc = mysqli_fetch_assoc(mysqli_query($con, "select * from main where id=1"));
echo $cc['name'];
?>