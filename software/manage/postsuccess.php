<?php 
include 'web/header.php';
include 'session.php';
?>


    <div class="main-content">

        <!-- You only need this form and the form-labels-on-top.css -->
<form class="form-labels-on-top" name="Form" method="post" action="process.php" onsubmit="return ValidateForm()" autocomplete="off">

            <div class="form-title-row">
                <h1><font color="green">Recharge Successful</font></h1>
            </div>
 <div class="form-row">
                <label>
                    <span>Redirecting to Dashboard in 5 seconds
<?php
echo "<meta http-equiv='refresh' content='0;URL=bills.php' />"; 
?> </span>
    </label>
            </div>

</form>

    </div>
<?php include 'web/footer.php'; ?>
</body>

</html>