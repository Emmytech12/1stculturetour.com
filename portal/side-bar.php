<div class="side-nav-div animated fadeInLeft animated animated" id="sidebar-container">
    <div class="hidden" id="_dashboard"><i class="bi-speedometer2"></i> <span class="role_name" id="side_role_name"></span> Dashboard</div>
<!-- 
	 <div class="nav-div active-li" onClick="_get_page('dashboard','dashboard', 'dashboard','')" id="side-dashboard">
    	<div class="icon"><i class="bi-speedometer2"></i></div> Dashboard
        <div class="hidden" id="_dashboard"><i class="bi-speedometer2d"></i> Admin Dashboard</div>
    </div>
    
	<div class="nav-div" onClick="_get_page('all_staffs','all_staffs','staff','')" id="side-staff">
    	<div class="icon"><i class="bi-people-fill"></i></div> Staff
    </div>
   
	<div class="nav-div" onClick="_get_page('', '', 'publish','publish')" id="side-publish">
    	<div class="icon"><i class="bi-cloud-arrow-up-fill"></i></div> Publish
    </div>

    <div class="nav-div"  onClick="_get_page('', '', 'app_settings','app_settings')" id="side-app_settings">
    	<div class="icon"><i class="bi-gear-fill"></i></div> Settings
    </div>  -->

    <script>
        async function sideBarValue() {
        // Simulate fetching data from a database
        return [
            { label: 'Dashboard', addClass: 'active-li', iconClass: 'bi-speedometer2', getPage: '_get_page(\'dashboard\', \'dashboard\', \'dashboard\', \'\', )', getId: ids+'-dashboard' },
            <?php if($login_role_id > 1){?>
                { label: 'Staff', addClass: '', iconClass: 'bi-people-fill', getPage: '_get_page(\'all_staffs\', \'all_staffs\', \'staff\', \'\', )', getId: ids+'-staff' },
           <?php }?>
            { label: 'Publish', addClass: '', iconClass: 'bi-cloud-arrow-up-fill', getPage: '_get_page( \'\', \'\', \'publish\', \'publish\',)', getId: ids+'-publish' },
            { label: 'Settings', addClass: '', iconClass: 'bi-gear-fill', getPage: '_get_form( \'app_settings\', \'\', \'app_settings\', \'\',)', getId: ids+'-app_settings' },
            // Add more data items as needed
        ];
        }
        _get_side_bar_content(ids='side');
    </script>

    <form method="post" action="config/code" id="logoutform">
        <input type="hidden" name="action" value="logout"/>    
        <div class="nav-div" onclick="document.getElementById('logoutform').submit();">
                <div class="icon"><i class="bi-power"></i></div> Log-Out
        </div>
    </form>
</div>

<!--------------------------for mobile view----------------------------------------->-

<div class="side-nav-div animated fadeInLeft animated animated" id="side-nav-div">
    <!-- <div class="nav-div active-li" onClick="_get_page('dashboard','dashboard', 'dashboard','')" id="side-dashboard">
    	<div class="icon"><i class="bi-speedometer2"></i></div> Dashboard
        <div class="hidden" id="_dashboard"><i class="bi-speedometer2d"></i> Admin Dashboard</div>
    </div>
    
	<div class="nav-div" onClick="_get_page('all_staffs','all_staffs','staff','')" id="side-staff">
    	<div class="icon"><i class="bi-people-fill"></i></div> Staff
    </div>
    
	<div class="nav-div" onClick="_get_page('', '', 'publish','publish')" id="side-publish">
    	<div class="icon"><i class="bi-cloud-arrow-up-fill"></i></div> Publish
    </div>

    
    <div class="nav-div"  onClick="_get_page('', '', 'app_settings','app_settings')" id="side-app_settings">
    	<div class="icon"><i class="bi-gear-fill"></i></div> Settings
    </div> -->

    
    <script>
        _get_side_bar_mobile_content(ids='mobile');
    </script>

    <form method="post" action="config/code" id="logoutform">
        <input type="hidden" name="action" value="logout"/>    
        <div class="nav-div" onclick="_logOut()">
                <div class="icon"><i class="bi-power"></i></div> Log-Out
        </div>
    </form>

</div>











<!--------------------------for nav sub div view----------------------------------------->

<div class="side-nav-bg-sub-div">
	<div class="nav-div animated fadeInLeft" id="link-staff">
        <div class="link" onClick="_get_page('all_staffs','all_staffs','staff','')">- Active Staff <div class="num" id="total_all_staffs_count">0</div></div>
        <div class="hidden" id="_all_staffs"><i class="bi-people-fill"></i> Staff / Administrator</div>
        <!-- <div class="link" onClick="_get_page('suspended_staff','suspended_staff','staff','')">- Supended Staff <div class="num" id="total_suspended_staff_count">0</div></div>
        <div class="hidden" id="_suspended_staff"><i class="bi-person-fill-x"></i> Supended Staff</div> -->
    </div>

    
	<div class="nav-div animated fadeInLeft" id="link-publish">
        <div class="link" onClick="_get_page('all_tourism_attraction','all_tourism_attraction','publish','')">- Tourism Attraction <div class="num" id="total_active_tourism_attraction_count">0</div></div>
        <div class="hidden" id="_all_tourism_attraction"><i class="bi-house-fill"></i>  Tourism Attraction</div>
        
        <div class="link" onClick="_get_page('all_entertainment','all_entertainment','publish','')">- Entertainment <div class="num" id="total_active_entertainment_count">0</div></div>
        <div class="hidden" id="_all_entertainment"><i class="bi-suit-club-fill"></i>  Entertainment Category</div>

        <div class="link" onClick="_get_page('all_sport','all_sport','publish','')">- Sport <div class="num" id="total_active_sport_count">0</div></div>
        <div class="hidden" id="_all_sport"><i class="bi-bicycle"></i>  Sport Category</div>

        <div class="link" onClick="_get_page('all_culture','all_culture','publish','')">- Culture <div class="num" id="total_active_culture_count">0</div></div>
        <div class="hidden" id="_all_culture"><i class="bi-person-heart"></i>  Culture Category</div>

      
        <div class="link" onClick="_get_page('all_tradition','all_tradition','publish','')">- Tradition <div class="num" id="total_active_tradition_count">0</div></div>
        <div class="hidden" id="_all_tradition"><i class="bi-badge-tm-fill"></i>  Tradition</div>

        <div class="link" onClick="_get_page('all_natural_tourism_product','all_natural_tourism_product','publish','')">- Natural Tour Products <div class="num" id="total_active_natural_tourism_product_count">0</div></div>
        <div class="hidden" id="_all_natural_tourism_product"><i class="bi-cup-straw"></i>  Natural Tourism Products Category</div>

        <div class="link" onClick="_get_page('all_tourism_destination','all_tourism_destination','publish','')">- Tourism Destination <div class="num" id="total_active_tourism_destination_count">0</div></div>
        <div class="hidden" id="_all_tourism_destination"><i class="bi-geo-alt-fill"></i>  Tourism Destination Category</div>

        <div class="link" onClick="_get_page('all_events','all_events','publish','')">- Event <div class="num" id="total_active_event_count">0</div></div>
        <div class="hidden" id="_all_events"><i class="bi-calendar-event-fill"></i>  Event</div>

        <div class="link" onClick="_get_page('all_blogs','all_blogs','publish','')">- News & Blogs <div class="num" id="total_active_blog_count">0</div></div>
        <div class="hidden" id="_all_blogs"><i class="bi-newspaper"></i>  News & Blogs</div>
        
        <div class="link" onClick="_get_page('all_faqs','all_faqs','publish','')">- FAQs <div class="num" id="total_active_faq_count">0</div></div>
        <div class="hidden" id="_all_faqs"><i class="bi-question-circle-fill"></i>  Frequently Asked Questions</div>
        
    </div>
        
    
	<div class="nav-div animated fadeInLeft" id="link-app_settings">
    <?php if($login_role_id > 1){?>
    	<div class="link" onclick="_get_form('app_settings')">- System Settings</div>
    <?php }?>
    	<div class="link" onclick="_get_form('change-user-password-form')">- Change Password</div>
    </div>
    
    
    <div class="nav-back-div" onclick="_close_all_nav()"></div>
</div>
