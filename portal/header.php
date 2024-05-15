<?php  include 'alert.php'?>

<div class="header-div animated fadeInDown animated animated">
	<div class="header-div-in">
        <div class="menu-div" title="Open Menu" onclick="_open_menu()" id="menu-div"><i class="fa fa-navicon (alias)"></i></div>
    	<div class="logo-div"><img src="all-images/images/logo.png" alt="<?php echo $thename; ?> logo" /></div>
        
        <div class="header-nav-div" data-aos="fade-right" data-aos-duration="1500">
            <li class="active-li" id="top-dashboard"  onClick="_get_page('dashboard','dashboard', 'dashboard','')"><i class="bi-speedometer2"></i> Dashboard</li>
            <li onClick="_get_form_with_id('my_profile','<?php echo $login_staff_id; ?>')" id="top-profile"><i class="bi bi-person-square"></i> My Profile</li>
        </div>
        
        
            <div class="header-profile-pix-div" title="User Account" onclick="_toggle_profile_pix_div()">
            <div class="img-div" id="option_pix"><img src="<?php echo $website_url?>/uploaded_files/staff_pix/friends.png" id="passportimg1" alt="Profile image"></div>

            <div class="toggle-profile-div">
                <div class="toggle-profile-pix-div" id="header_pix">
                    <img src="<?php echo $website_url?>/uploaded_files/staff_pix/friends.png" id="passportimg2"/>
                </div>
            
                <div class="toggle-profile-name" id="mini_profile_fullname">Xxxx Xxxx </div>
                    <div class="toggle-profile-others">Staff ID: <span id="mini_profile_user_id">Xxx Xxx</span> <br /> <span id="mini_profile_mobile">0xx xxxx xxxx</span> </div>
                
                    <button class="logout-btn"  onclick="document.getElementById('logoutform').submit();"><i class="bi-box-arrow-left"></i> Log-Out</button>
            
                    <button class="logout-btn" type="button"  onClick="_get_form_with_id('my_profile','<?php echo $login_staff_id; ?>')"><i class="bi-person"></i> Profile</button>
                    <div class="hidden" id="_myprofile"><i class="fa fa-user-circle"></i> User Profile</div>
                    <br clear="all" />
                </div>
            </div>
            
            
            
            <div class="notification" onClick="_get_page('system_alert', 'system_alert', 'system_alert', '')">
                <i class="fa fa-bell-o"></i>
            </div>

            <!------>
            <span id="_system_alert" style="display:none;"><i class="bi-bell"></i> System Alert</span>
            <!------>  

    </div>
</div>