<?php
include 'session.php';
if($_SESSION['insstat'] == 2)
header('location: step-2.php');
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
   
  <h2>Database connection settings</h2>
    <form class="form-horizontal" action="write.php" method="post" autocomplete="On">
     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <!-- Font Awesome -->
<div class="form-group">
      <label class="control-label col-sm-2" for="email">Host</label>
      <div class="col-sm-10">
        <input name="host" type="text" class="form-control" min="500" placeholder="127.0.0.1 or localhost or any other host" required="required" value="" />
      </div>
    </div>
  
        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Username</label>
      <div class="col-sm-10">
         <input name="uname" id="firstname" class="form-control" placeholder="DB Username (with all privileges)" required="required" value="" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Password</label>
      <div class="col-sm-10">
        <input name="upass" type="password" id="email" class="form-control" placeholder="DB User Password" required="required" value="" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">DB Name</label>
      <div class="col-sm-10">
        <input name="dbname" type="text" class="form-control" placeholder="DB Name" required="required" value="" />
      </div>
    </div>
 <div class="form-group">
      <label class="control-label col-sm-2" for="email">Timezone</label>
      <div class="col-sm-10">
        <input name="timezone" class="form-control" placeholder="Enter Address" required="required" value="570" />
      </div>
    </div>
    
                      <td colspan="4"><button type="submit" class="btn btn-success btn-lg" value="Submit" /><i class="fa fa-send-o"></i>  Continue</button>
                
    </form>