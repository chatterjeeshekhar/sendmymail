<?php

if($stat1 == 2)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Passport verification</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-upload"></i></font><br><font size="3" face="Arial" color="green">Document Uploaded</font></center>
</div><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="green">Document Submitted</font></center></div><div class="col-xs-4 form-group" style="background-color:#EDEDED">
<center><font size="7" face="Arial" color="green"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="green">Document Verified</font></center></div></div></div>';

if($stat1 == 1)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Passport verification</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-upload"></i></font><br><font size="3" face="Arial" color="green">Document Uploaded</font></center>
</div><div class="col-xs-4 form-group" style="background-color:#EDEDED"><center><font size="7" face="Arial" color="green"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="green">Document Submitted</font></center></div><div class="col-xs-4 form-group">
<center><font size="7" face="Arial" color="grey"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="grey">Document Verified</font></center></div></div></div>';

if($stat1 == 0)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Passport verification</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="box-body"><form action="" method="post" enctype="multipart/form-data"><div class="col-xs-4 form-group"><br><center><label><font face="Arial">Upload Passport Front and Back (PDF)</font></label><br><span class="btn btn-default btn-file">    Browse <input type="file" name="passport" size="3" accept="application/pdf" required></span><button type="submit" name="submit" value="sub1" class="btn btn-primary">Upload</button></center></form>
</div><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="grey"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="grey">Document Submitted</font></center></div><div class="col-xs-4 form-group">
<center><font size="7" face="Arial" color="grey"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="grey">Document Verified</font></center></div></div></div></div>';

if($_POST['submit'] == "sub1") {
   define ("FILEREPOSITORY","./docs/passport");

   if (is_uploaded_file($_FILES['passport']['tmp_name'])) {

      if ($_FILES['passport']['type'] != "application/pdf") {
         echo "<script>alert('Passport copy must be uploaded in PDF format.');</script>";
      } else {
         $name = $_SESSION['login_user']."-passport";
         $result = move_uploaded_file($_FILES['passport']['tmp_name'], FILEREPOSITORY."/$name.pdf");
         if ($result == 1) {
$set1 = mysqli_query($con, "insert into verify (user,passport) values ('$username', 1)");
mysqli_query($con, "update verify set registerstamp=(select registerlog from login where username='$username') where user='$username'");
if(!$set1){
mysqli_query($con, "update verify set passport=1 where user='$username'");
}
echo "<script>window.location.href = window.location.href;</script>";

}
         else echo "<script>alert('There was a problem uploading passport. Please try again.');</script>";
      } 
   } 
}
?>