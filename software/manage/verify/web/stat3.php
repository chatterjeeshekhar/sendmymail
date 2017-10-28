<?php
if($stat3 == 2)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Current address proof (Electricity bill)</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-upload"></i></font><br><font size="3" face="Arial" color="green">Document Uploaded</font></center>
</div><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="green">Document Submitted</font></center></div><div class="col-xs-4 form-group" style="background-color:#EDEDED">
<center><font size="7" face="Arial" color="green"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="green">Document Verified</font></center></div></div></div>';

if($stat3 == 1)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Current address proof (Electricity bill)</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-upload"></i></font><br><font size="3" face="Arial" color="green">Document Uploaded</font></center>
</div><div class="col-xs-4 form-group" style="background-color:#EDEDED"><center><font size="7" face="Arial" color="green"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="green">Document Submitted</font></center></div><div class="col-xs-4 form-group">
<center><font size="7" face="Arial" color="grey"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="grey">Document Verified</font></center></div></div></div>';

if($stat3 == 0)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Current address proof (Electricity bill)</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="box-body"><form action="" method="post" enctype="multipart/form-data"><div class="col-xs-4 for<m-group"><br><center><label><font face="Arial">Upload Last 3 Electricity Bills (PDF)</font></label><br><span class="btn btn-default btn-file">    Browse <input type="file" name="electric" size="3" accept="application/pdf" required></span><button type="submit" name="submit" value="sub3" class="btn btn-primary">Upload</button></center></form>
</div><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="grey"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="grey">Document Submitted</font></center></div><div class="col-xs-4 form-group">
<center><font size="7" face="Arial" color="grey"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="grey">Document Verified</font></center></div></div></div></div>';

if($_POST['submit'] == "sub3") {
   define ("FILEREPOSITORY","./docs/address");

   if (is_uploaded_file($_FILES['electric']['tmp_name'])) {

      if ($_FILES['electric']['type'] != "application/pdf") {
         echo "<script>alert('Address proof must be uploaded in PDF format.');</script>";
      } else {
         $name = $_SESSION['login_user']."-address";
         $result = move_uploaded_file($_FILES['electric']['tmp_name'], FILEREPOSITORY."/$name.pdf");
         if ($result == 1) {
$set1 = mysqli_query($con, "insert into verify (user,address) values ('$username', 1)");
mysqli_query($con, "update verify set registerstamp=(select registerlog from login where username='$username') where user='$username'");
if(!$set1)
mysqli_query($con, "update verify set address=1 where user='$username'");
echo "<script>window.location.href = window.location.href;</script>";
}
else echo "<script>alert('There was a problem uploading agreement. Please try again.');</script>";
}
         
      } 
   }
?>