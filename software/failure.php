<?php
include 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" style="background:#ddd">
    <Br><br>   <title>Transaction Failed</title> <body class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#ffffff; -webkit-text-size-adjust:none"><Br><br>
        <div style="background:#fff;padding:0;margin:0;font-family:Verdana,Geneva,sans-serif;font-size:14px;color:#333333;line-height:22px">
    <div style="width:600px;margin:0 auto;background:#fff">
            <div style="min-height:5px;background-color:#ffcd53">
                <span style="min-height:5px;background-color:#0B638C;width:100px;display:block"></span>
            </div>
            <div>
                <h1 style="color:#0B638C;font-weight:normal;text-align:left">Dear Client,</h1>
                <div style="padding:15px 15px 15px 0"><b>Transaction Status: <font color="red">Failed</font></b> <<a href="/" style="text-decoration: none;">Try again</a>><br><Br>
                   Thank you very much for your registering in our ultimate system to get a head-start in generating great leads. <b>Although, the system is awesome in many ways, there might be some error during the transaction that led to it's failure. Don't worry you were not charged if transaction fails, if amount debited, it will automatically reverse within 48 hours.</b>
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