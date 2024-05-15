<?php include '../../../config/config.php';?>

<?php $hvid =  $_GET['hvid']; ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include '../meta.php'?>
    <title><?php echo $thename?>  | Adminstrative Reset Password</title>
    <meta name="keywords" content="User Login - <?php echo $thename?>" />
    <meta name="description" content="User Login <?php echo $thename?>"/>
</head>
<body>
    <?php require_once '../alert.php'?>

    <section class="login-section">
        <div class="login-div">

            <div class="header-div">
                <div class="div-in">
                    <div class="logo-div"><img src="<?php echo $website_url?>/admin/login/all-images/images/logo.png" alt="<?php echo $thename?> - Logo"></div>    
                    <ul>
                        <!-- <li class="ACTIVE" id="login_id" onclick="_get_page('login');">Log-In</li>
                        <li id="reset_pass_id" onclick="_next_page('procced_reset_password_info','reset_pass_id');">Forgot Password?</li> -->
                    </ul>
                </div>
            </div>


            <div class="form-container-div">
                <div class="form-div-in">
                    <div class="page-title-div" id="title-invisible">
                        <h1 >Administrative <span id="page-title">Reset Password</span></h1>
                    </div>

                    <div id="get-reset-password-page">
                        <script> _get_hash_value('reset_password', '<?php echo $hvid?>');</script>

                        <?php //$page='reset_password'; include '../config/page-content.php' ?>
                    </div>

                </div>
            </div>




        </div>
        
    </section>
    
</body>
</html>


