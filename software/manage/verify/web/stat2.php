<?php

if($stat2 == 2)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Agreement declaration duly signed and stamped</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-upload"></i></font><br><font size="3" face="Arial" color="green">Document Uploaded</font></center>
</div><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="green">Document Submitted</font></center></div><div class="col-xs-4 form-group" style="background-color:#EDEDED">
<center><font size="7" face="Arial" color="green"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="green">Document Verified</font></center></div></div></div>';

if($stat2 == 1)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Agreement declaration duly signed and stamped</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="green"><i class="fa fa-upload"></i></font><br><font size="3" face="Arial" color="green">Document Uploaded</font></center>
</div><div class="col-xs-4 form-group" style="background-color:#EDEDED"><center><font size="7" face="Arial" color="green"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="green">Document Submitted</font></center></div><div class="col-xs-4 form-group">
<center><font size="7" face="Arial" color="grey"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="grey">Document Verified</font></center></div></div></div>';

if($stat2 == 0)
echo '<div class="box box-default"><div class="box-header with-border"><h3 class="box-title">Agreement declaration duly signed and stamped</h3><div class="pull-right box-tools"><button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button></div><!-- /. tools --></div><div class="box-body"><div class="box-body"><form action="" method="post" enctype="multipart/form-data"><div class="col-xs-4 form-group"><br><center><label><font face="Arial">Upload Complete Agreement (PDF)</font></label><br><span class="btn btn-default btn-file">    Browse <input type="file" name="agreement" size="3" accept="application/pdf" required></span><button type="submit" name="submit" value="sub2" class="btn btn-primary">Upload</button></center></form>
</div><div class="col-xs-4 form-group"><center><font size="7" face="Arial" color="grey"><i class="fa fa-check-circle"></i></font><br><font size="3" face="Arial" color="grey">Document Submitted</font></center></div><div class="col-xs-4 form-group">
<center><font size="7" face="Arial" color="grey"><i class="fa fa-legal"></i></font><br><font size="3" face="Arial" color="grey">Document Verified</font></center></div></div></div></div>';

if($_POST['submit'] == "sub2") {
   define ("FILEREPOSITORY","./docs/agreement");

   if (is_uploaded_file($_FILES['agreement']['tmp_name'])) {

      if ($_FILES['agreement']['type'] != "application/pdf") {
         echo "<script>alert('Agreement copy must be uploaded in PDF format.');</script>";
      } else {
         $name = $_SESSION['login_user']."-agreement";
         $result = move_uploaded_file($_FILES['agreement']['tmp_name'], FILEREPOSITORY."/$name.pdf");
         if ($result == 1) {
$set1 = mysqli_query($con, "insert into verify (user,agreement) values ('$username', 1)");
mysqli_query($con, "update verify set registerstamp=(select registerlog from login where username='$username') where user='$username'");
if(!$set1)
mysqli_query($con, "update verify set agreement=1 where user='$username'");
echo "<script>window.location.href = window.location.href;</script>";
}
else {echo "<script>alert('There was a problem uploading agreement. Please try again.');</script>";}
}
         
      } 
   } 
?>