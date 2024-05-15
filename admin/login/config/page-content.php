<script type="text/javascript" src="js/scrollBar.js"></script>
<script type="text/javascript">$(".sb-container").scrollBox();</script>

<?php if ($page=='login'){?>
    
    <div class="form-div " id="view_login">
        <div class="title-div">EMAIL ADDRESS: <span>*</span></div>
        <div class="input-div" id="email-focus">
            <div class="icon-div"><i class="bi-envelope"></i></div>
            <input id="email" type="email" onClick="_onFocus('email-focus')" class="text-field" placeholder="Enter your email address"/>
        </div>

        <div class="title-div"> PASSWORD: <span>*</span></div> 
        <div class="input-div" id="password-focus">
            <div class="icon-div"><i class="bi-lock"></i></div>
            <div class="password-container">
                <input type="password" id="password" onClick="_onFocus('password-focus')" class="text-field" placeholder="Enter your password" onkeyup="_show_password_visibility('password','login_pass')" /><br/>
                <div id="login_pass" onclick="_togglePasswordVisibility('password','login_pass')">
                    <i class="bi-eye-slash password-toggle"></i>
                </div>
            </div>
        </div>
        <button class="btn" type="button" id="login_btn" onclick="_log_in();"><i class="bi-check"></i> Log-In</button>
    </div>



    <div class="form-div" id="procced_reset_password_info">
        <div class="alert alert-success" style="text-align:left">
            Provide your <span>Email Address</span> to reset your password
        </div>
        <div class="title-div">EMAIL ADDRESS: <span>*</span></div>
        <div class="input-div" id="reset-pass-focus">
            <div class="icon-div"><i class="bi-envelope"></i></div>
            <input id="reset_pass_email" type="email" onClick="_onFocus('reset-pass-focus')" class="text-field" placeholder="Enter your email address"/>
        </div>
        <button class="btn" type="button" id="reset_password_btn" onclick="_proceed_reset_password('sent_mail');"> Proceed <i class="bi-arrow-right"></i></button>
    </div>


    <script> 
       _mailStorage();
        var search_content =[ 'Enter your email address', 'e.g afootechglobal@gmail.com', 'info@pec.com.ng', 'heritageculture@gmail.com' ];
        _placeholder(email,search_content);
        _placeholder(reset_pass_email,search_content);
    </script>



<?php } ?>





<?php if($page=='sent_mail'){?>
   
        <div class="successful-div animated zoomIn">
            <div class="success-in">
                <div class="gif animated fadeInLeft">
                    <img src="<?php echo $website_url?>/admin/login/all-images/images/email.jpeg" alt="Mail">
                </div>
                <h3>MAIL SENT!</h3>
                <div class="alert alert-success" style="text-align:left">
                     Hi <span id="username"></span>, a mail has been sent to your email address (<span id="useremail"></span>) to reset your password. Kindly, check your <strong>INBOX</strong> or <strong>SPAM</strong> to confirm.
                </div>
                <div class="alert" style="margin-top:10px;"><span>Mail</span> not received? <span id="resend" onclick="_resend_mail('resend','<?php echo $staff_id?>')"> RESEND MAIL <i class="bi-send"></i></span></div>
            </div> 
        </div>
 
<?php }?>








 <?php if ($page=='reset_password'){?>
    
    <div class="form-div animated zoomIn" id="reset_password_info">
       
        <div class="title-div"> CREATE PASSWORD: <span>*</span></div> 
        <div class="input-div" id="create-pass-focus">
            <div class="icon-div"><i class="bi-lock"></i></div>
            <div class="password-container" >
                <input type="password" id="create_reset_password" onClick="_onFocus('create-focus')" class="text-field" placeholder="Create Your Password" onkeyup="_show_password_visibility('create_reset_password','toggle_create_reset_password')" /><br/>
                <div id="toggle_create_reset_password" onclick="_togglePasswordVisibility('create_reset_password','toggle_create_reset_password')">
                    <i class="bi-eye-slash password-toggle"></i>
                </div>
            </div>
        </div>

        <div class="pswd_info"><em>At least 8 charaters required including upper & lower cases and special characters and numbers.</em></div>
      
        <div class="title-div">COMFIRMED PASSWORD: <span>*</span> <span id="message">Password Not Matched!</span></div> 
        <div class="input-div" id="confirmed-pass-focus">
            <div class="icon-div"><i class="bi-lock"></i></div>
            <div class="password-container">
                <input type="password" id="confirmed_reset_password" onClick="_onFocus('confirmed-focus')" onkeyup="_check_password_match('create_reset_password','confirmed_reset_password','toggle_confirmed_reset_password')" class="text-field" placeholder="Comfirmed Your Password" onkeyup="_show_password_visibility('confirmed_reset_password','toggle_confirmed_reset_password')" /><br/>
                <div id="toggle_confirmed_reset_password" onclick="_togglePasswordVisibility('confirmed_reset_password','toggle_confirmed_reset_password')">
                    <i class="bi-eye-slash password-toggle"></i>
                </div>
            </div>
        </div>
        <button class="btn" type="button" id="comfirmed_reset_btn" onclick="_comfirmed_reset_password('<?php echo $staff_id?>');"> Reset Password <i class="bi-arrow-clockwise"></i></button>
    </div>

<?php } ?>






 <?php if($page=='password_reset_successful'){?>

        <div class="successful-div successful2 animated zoomIn">
            <div class="success-in">
                <div class="gif gif2 animated fadeInLeft">
                   <img src="<?php echo $website_url?>/admin/login/all-images/images/success.gif" alt="Success">
                </div>
                <h3>PASSWORD RESET SUCCESSFUL </h3>
                <!-- <button onClick="window.location.reload();" type="button">OKAY</button> <br> -->
                <button onClick="_alert_close2('view_login','flogin')" type="button">OKAY</button> <br>
            </div> 
        </div>
   
<?php }?>



