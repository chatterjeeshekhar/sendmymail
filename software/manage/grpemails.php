<?php
include 'session.php';
$i = $_REQUEST['i'];
if($i!='') {
$u = $_SESSION['login_user'];
mysqli_query($con, "SET @@session.group_concat_max_len = 1000000;");
$l = mysqli_fetch_assoc(mysqli_query($con, "SELECT GROUP_CONCAT(c.email) AS emails from contacts c, groups g where c.grp=g.grpname and c.user='$u' and g.id=$i"))['emails'];
$l = str_replace(" ", "", str_replace("\n", "", $l));
echo mysqli_real_escape_string($con, $l);
}
?>