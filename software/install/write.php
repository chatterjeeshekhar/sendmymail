<?php
$myhost = $_POST['host'];
$myuser = $_POST['uname'];
$mypass = $_POST['upass'];
$mydb = $_POST['dbname'];
$mytz = $_POST['timezone'];
file_put_contents('../manage/admin/web/connect.php', "<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
\$servername1 = \"".$myhost."\";
\$username1 = \"".$myuser."\";
\$password1 = \"".$mypass."\";
\$dbname1 = \"".$mydb."\";
\$tz = \"".$mytz."\";

\$connection = mysql_connect(\$servername1, \$username1, \$password1);
\$db = mysql_select_db(\$dbname1, \$connection);
mysql_select_db(\$dbname1, \$connection);

\$con=mysqli_connect(\$servername1, \$username1, \$password1, \$dbname1);if (!\$con) {    die('Could not connect: ' . mysqli_error($con));}
?>");

include 'connect.php';
$sqlSource = file_get_contents('db.sql');
mysqli_multi_query($con,$sqlSource);
@header('location: step-2.php');

?>