<?php
error_reporting(0);
include 'session.php';
include '../admin/web/connect.php';
?>
<?php
$username = $_SESSION['login_user'];
$query = mysqli_query($con, "select * from verify where user='$username'");
$row = mysqli_fetch_assoc($query);
$stat1 = $row['passport'];
$stat2 = $row['agreement'];
$stat3 = $row['address'];
$mc = $row['mconf'];
$ec = $row['econf'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['projectname']; ?> | Verification</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

 <?php
include 'web/header.php';
?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Account Owner Documents Verification Portal
              <small></small>
            </h1><br>
<!--- PROGRESS BAR ---->
<?php
$progval = round(($stat1+$stat2+$stat3+$ec+$mc)*(100/8));
if($progval != 0)
echo '<div class="progress progress-striped"><div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="'.$progval.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$progval.'%;"><h4>'.$progval.'%</h4></div></div>';
else
echo '<div class="progress progress-striped"><div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width:7%;"><h4>7%</h4></div></div>';
?>
<!--- PROGRESS BAR ---->
<style>
.progress {background: rgba(245, 245, 245, 1); border: 0px solid rgba(245, 245, 245, 1); border-radius: 0px; height: 40px;}
.progress-bar-custom {background: rgba(66, 139, 202, 1);} 
.progress-striped .progress-bar-custom {background-color: rgba(66, 139, 202, 1); background-image: -webkit-gradient(linear,0 100%,100% 0,color-stop(0.25,rgba(255, 255, 255, 0.15),color-stop(0.25,transparent),color-stop(0.5,transparent),color-stop(0.5,rgba(255, 255, 255, 0.15)),color-stop(0.75,rgba(255, 255, 255, 0.15)),color-stop(0.75,transparent),to(transparent))); background-image: -webkit-linear-gradient(45deg,rgba(255, 255, 255, 0.15) 25%,transparent 25%,transparent 50%,rgba(255, 255, 255, 0.15) 50%,rgba(255, 255, 255, 0.15) 75%,transparent 75%,transparent); background-image: linear-gradient(45deg,rgba(255, 255, 255, 0.15) 25%,transparent 25%,transparent 50%,rgba(255, 255, 255, 0.15) 50%,rgba(255, 255, 255, 0.15) 75%,transparent 75%,transparent); background-size: 100px 100px;}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

</style>
          </section>

          <!-- Main content -->
          <section class="content">
            <!--<div class="callout callout-info">
              <h4>Tip!</h4>
              <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular links instead.</p>
            </div>
            <div class="callout callout-danger">
              <h4>Warning!</h4>
              <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar and the content will slightly differ than that of the normal layout.</p>
            </div>
          -->


<?php
include 'web/stat0.php';
if($ec==1 && $mc==1) {
include 'web/stat1.php';
include 'web/stat2.php';
include 'web/stat3.php';
include 'web/stat4.php';
}
?>


          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
    <?php
include 'web/footer.php';
?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
  </body>
</html>