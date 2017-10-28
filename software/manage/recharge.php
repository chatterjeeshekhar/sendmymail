<?php
include 'session.php';
?>  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['projectname']; ?> | Recharge Account</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
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
  <body class="hold-transition skin-blue sidebar-mini" onload="calculate()">
    <div class="wrapper">
<?php include 'web/header2.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include 'web/sidebar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Recharge Account  
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>
<script type="text/javascript">
$(document).ready(function () {
        $("#btnExport").click(function () {
            $("#customers").btechco_excelexport({
                containerid: "customers"
               , datatype: $datatype.Table
            });
        });
    });
  function removeFunction(str) {
   if (confirm('Are you sure you want to delete this record?') == true) {
  if (str.length == 0) { 
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
              }
          };
   xmlhttp.open("POST", "add-item.php?ac=1&q=" + str, true);
xmlhttp.send();
        }
window.location.reload();
  }
  else {
        
      }
  }
</script>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Credits automatically credited on successful payment</h3>
                </div><!-- /.box-header -->
                <div class="box-body">


               <form name="Form" method="post" action="process.php" onsubmit="return ValidateForm()" autocomplete="off">                 <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                    <?php 
$limita = (!empty($_SESSION['login_user']) ? $_SESSION['login_user'] : ""); 
echo "<input type='text' name='usern' class='form-control' value='$limita' disabled='disabled'>"?>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Current Balance</label>
                    <?php 
$limita1 = (!empty($_SESSION['user_balance']) ? $_SESSION['user_balance'] : ""); 
echo "<input type='text' class='form-control' value='$limita1' disabled='disabled'>"?>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Locked Balance</label>
                    
<input type='text' class='form-control' value='0' disabled='disabled'>
                     
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Rate (INR)</label>
                    <?php 
$limita1 = (!empty($_SESSION['smsrate']) ? $_SESSION['smsrate'] : ""); 
echo "<input type='text' class='form-control' id='box1' oninput='calculate()' value='$limita1' disabled>"?>
                     
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Recharge Credits</label>
                      <input type="text" id="box2" min="50" name="addcred" oninput="calculate()" class="form-control" required="true" placeholder="Minimum 50 Credits" autocomplete="off"  onChange="calc()" required="required" autofocus>
                     
                    </div>
 <!--<div class="form-group">
                      <label for="exampleInputPassword1">Total Billing</label>
                      <input id="result1" class="form-control" value="0" disabled>
                     
                    </div>-->
 <div class="form-group">
                      <label for="exampleInputPassword1">Payment Method</label>
                     <select class="form-control" name="paymet" required>
                      <option value="" default>---- Select One ----</option>
                      <option value="payu">PayUmoney</option>
                      <option value="ccav">CCAvenue</option>
                      <option value="paypal">PayPal</option> 
                     </select>
                     
                    </div>
                  
             
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="sub" value="1">
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary"><i class="fa fa-send-o"></i>  Continue to payment</button>
                  </div>
                </form> 



                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     <?php include 'web/footer2.php'; ?>

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
   
  </body>
<script>

    function calculate() {
    var myBox1 = document.getElementById('box1').value; 
    var myBox2 = document.getElementById('box2').value;
    var result1 = document.getElementById('result1'); 
    var myResult = myBox1 * myBox2;
    result1.innerHTML = myResult;

}
 window.onload = calculate;
</script>
</html>