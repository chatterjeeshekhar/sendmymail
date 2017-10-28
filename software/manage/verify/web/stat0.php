<?php

echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Phone and email verification</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body">';

if($ec == 0)
echo '<div class="col-xs-6 form-group"><center><font size="7" face="Arial" color="grey"><i class="fa fa-envelope"></i></font><form action="" method="post"><div class="input-group margin"><input type="text" class="form-control" placeholder="Enter confirmation code" name="confemail"><span class="input-group-btn"><button type="submit" name="submit" value="sub0a" class="btn btn-info btn-flat">Verify!</button></span></div></form></center></div>';

if($ec == 1)
echo '<div class="col-xs-6 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-envelope"></i></font><br><font size="3" face="Arial" color="green">E-mail verified</font></center></div>';

if($mc == 0)
echo '<div class="col-xs-6 form-group"><center><font size="8" face="Arial" color="grey"><i class="fa fa-mobile"></i></font><form action="" method="post"><div class="input-group margin"><input type="text" name="confmob" class="form-control" placeholder="Enter confirmation code"><span class="input-group-btn"><button type="submit" class="btn btn-info btn-flat"name="submit" value="sub0b">Verify!</button></span></div></form></center></div>';

if($mc == 1)
echo '<div class="col-xs-6 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-mobile"></i></font><br><font size="3" face="Arial" color="green">Mobile number verified</font></center></div>';

echo '</div></div>';

if($_POST['submit']=="sub0a") {
$ecode = $_POST['confemail'];
mysqli_query($con, "update verify set econf='1' where user='$username' and ecode='$ecode'");
echo "<script>window.location.href = window.location.href;</script>";
}
if($_POST['submit']=="sub0b") {
$mcode = $_POST['confmob'];
mysqli_query($con, "update verify set mconf='1' where user='$username' and mcode='$mcode'");
echo "<script>window.location.href = window.location.href;</script>";
}
?>