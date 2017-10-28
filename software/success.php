<?php
include 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" style="background:#ddd">
    <Br><br>    <title>Transaction Complete</title><body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#ffffff; -webkit-text-size-adjust:none"><Br><br>
        <div style="background:#fff;padding:0;margin:0;font-family:Verdana,Geneva,sans-serif;font-size:14px;color:#333333;line-height:22px">
    <div style="width:600px;margin:0 auto;background:#fff">
            <div style="min-height:5px;background-color:#ffcd53">
                <span style="min-height:5px;background-color:#0B638C;width:100px;display:block"></span>
            </div>
            <div>
                <h1 style="color:#0B638C;font-weight:normal;text-align:left">Dear Client,</h1>
                <div style="padding:15px 15px 15px 0"><b>Transaction Status: <font color="green">Successful</font> <<a href="<?php echo $_SESSION['projectweb']; ?>" style="text-decoration: none;">Login here</a>></b><br><br>
                   We welcome on board to travel a fantastic ride of <?php echo $_SESSION['projectname']; ?>. <b>Your invoice receipt cum acknowledge has been sent to your registered mobile and email you entered in registration form. Your first recharge has been auto-credited to your account to get started immediately.</b>
                </div>
            </div>
           
            <div style="margin:20px 0">
              <span style="color:#333333">Thanks once again</span>, In case you have any further queries, please do not hesitate to contact us <a href="<?php echo $_SESSION['supportweb']; ?>" target="_new">here</a>.
            </div>
                <div style="font-size:15px">
                    Stay closer <br>
                    <?php echo $_SESSION['projectname']; ?><br><?php echo $_SESSION['projectweb']; ?>
                </div>
        </div><br><BR><br><BR><br><BR>
       </body>
        </html>