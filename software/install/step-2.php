<?php
include 'session.php';
if($_SESSION['insstat']==1 || $_SESSION['insstat']==NULL)
header('location: step-1.php');
if($_SESSION['insstat'] == 3)
header('location: step-3.php');
if($_SESSION['insstat'] == 4)
header('location: finish.php');
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Installation - Alien Master</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="main.css" rel="stylesheet">

    <!-- Custom Fonts -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
   
  <h2>Software main settings</h2>
    <form class="form-horizontal" action="write2.php" method="post" autocomplete="on">
     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <!-- Font Awesome -->
<div class="form-group">
      <label class="control-label col-sm-2" for="email">License Key</label>
      <div class="col-sm-10">
        <input name="license" type="text" class="form-control" min="500" placeholder="Enter your license key" required="required" value="" />
      </div>
    </div>

<div class="form-group">
      <label class="control-label col-sm-2" for="email">Software Name</label>
      <div class="col-sm-10">
        <input name="projectname" type="text" class="form-control" min="500" placeholder="Enter project name" required="required" value="" />
      </div>
    </div>
<div class="form-group">
      <label class="control-label col-sm-2" for="email">Software Address</label>
      <div class="col-sm-10">
        <input name="projectweb" type="text" class="form-control" placeholder="Enter project website" required="required" value="<?php echo "http://manage.".substr($_SERVER['HTTP_HOST'],4); ?>" />
      </div>
    </div>
  
<div class="form-group">
      <label class="control-label col-sm-2" for="email">Support Email</label>
      <div class="col-sm-10">
        <input name="supportemail" type="email" class="form-control" placeholder="Enter project website" required="required" value="" />
      </div>
    </div>
  
<div class="form-group">
      <label class="control-label col-sm-2" for="email">Support Website</label>
      <div class="col-sm-10">
        <input name="supportweb" type="text" class="form-control" placeholder="Enter project website" required="required" value="" />
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Rate per e-mail</label>
      <div class="col-sm-10">
         <input name="rate" type="number" class="form-control" placeholder="Enter per email rate in INR" required="required" value="" />
      </div>
    </div>

 <div class="form-group">
      <label class="control-label col-sm-2" for="email">PayPal e-mail</label>
      <div class="col-sm-10">
         <input name="ppemail" type="email" class="form-control" placeholder="Enter your PayPal E-Mail" required="required" value="" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">SMS API Key</label>
      <div class="col-sm-10">
        <input name="smsapi" type="text" class="form-control" placeholder="Enter SMS API Key received from us" required="required" value="" />
      </div>
    </div>

                      <td colspan="4"><button type="submit" class="btn btn-success btn-lg" value="Submit" /><i class="fa fa-send-o"></i>  Continue</button>
                
    </form>