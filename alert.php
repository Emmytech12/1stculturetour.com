<!------------------------ start preloader ----------------------->
<div class="loader-wrapper" id="loader-wrapper">
    <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
</div>
<!------------------------ end preloader ----------------------->

<div class="success-div animated fadeInRight" id="success-div">
    <div><i class="bi-check-all"></i></div> 
    PASSWORD RESET SUCCESSFUL!<br /> 
    <span>Check your email to confirm.</span>
</div>


<div class="success-div animated fadeInRight" id="not-success-div">
    <div><i class="bi-x-circle"></i></div> 
    INVALID LOGIN PARAMETERS!<br /> 
    <span>Please check the login detail.</span>
</div>


<div class="success-div animated fadeInRight" id="warning-div">
    <div><i class="bi-exclamation-circle"></i></div> 
    USER ERROR!<br /> 
    <span>Fill The Fields To Continue</span>
</div>

<div id="get-more-div" onclick="alert_close(event)" ></div>

<div id="get-more-div-secondary"></div>












<div class="sidenavdiv">
    <div class="sidenavdiv-in" onclick="_close_side_nav()"></div>
</div>


<div class="live-chat-back-div"> 

    <a href="tel:+234 803 537 1280" title="Call Customer Care">
        <div class="chat-div">
            <div class="icon-div" style="background:#008040;"><i class="bi-telephone-outbound"></i></div>
            <div class="text">+234 803 537 1280</div>
          <br clear="all" />
        </div>
    </a>
    <a href="" target="_blank" title="Whatsapp">
        <div class="chat-div">
            <div class="icon-div" style="background:#25D366;"><i class="bi-whatsapp"></i></div>
            <div class="text">+234 803 537 1280</div>
          <br clear="all" />
        </div>
    </a>

    <a href="" target="_blank" title="Facebook">
        <div class="chat-div">
            <div class="icon-div" style="background:#2980b9;"><i class="bi-facebook"></i></div>
            <div class="text">Facebook Page </div>
          <br clear="all" />
        </div>
    </a>

    <a href="" target="_blank" title="Twitter">
        <div class="chat-div">
            <div class="icon-div" style="background:#3498db;"><i class="bi-twitter"></i></div>
            <div class="text">Twitter Page</div>
          <br clear="all" />
        </div>
    </a>

    <a href="" target="_blank" title="Instagram">
        <div class="chat-div">
            <div class="icon-div" style="background-image: linear-gradient(to right,#03F, #F0F);"><i class="bi-instagram"></i></div>
            <div class="text">Instagram Page</div>
          <br clear="all" />
        </div>
    </a>
  
</div>


<div class="index-menu-back-div"> 
    <div class="top-div">
        <div class="logo-div">
            <a href="<?php echo $website_url?>"><img src="<?php echo $website_url?>/all-images/images/logo.png" alt="<?php echo $thename?> Logo"  class="animated zoomIn"/></a>   
        </div>
    </div>

    <div class="div-in">
        <div class="div">
            <a href="<?php echo $website_url;?>" title="Home Page">
            <li <?php if ($page=='index.php') {?> id="active-li"<?php }?>><i class="bi-house"></i> Home Page</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url ?>/about" title="About Us">
            <li <?php if ($page=='about.php') {?> id="active-li"<?php }?>><i class="bi-building-check"></i> About</li></a>
        </div>

        <div class="div">
            <li onclick="_open_li('tourism-products')"><i class="bi-activity"></i> Tourism Products <i class="bi-plus" id="side-expand"></i></li>
            <div class="sub-li" id="tourism-products-sub-li">
                <a href="<?php echo $website_url;?>/tourism-products/tourist-attractions" title="Tourist Attractions">
                <li>Tourist Attractions </li></a>

                <a href="<?php echo $website_url;?>/tourism-products/entertainment" title="Entertainment">
                <li>Entertainment</li></a>

                <a href="<?php echo $website_url;?>/tourism-products/culture" title="Culture">
                <li>Culture </li></a>

                <a href="<?php echo $website_url;?>/tourism-products/sport" title="Sport">
                <li>Sport </li></a>

                <a href="<?php echo $website_url;?>/tourism-products/tradition" title="Tradition">
                <li>Tradition </li></a>

                <a href="<?php echo $website_url;?>/tourism-products/event" title="Event">
                <li>Event </li></a>

                <a href="<?php echo $website_url;?>/tourism-products/natural-tourism-products" title="Natural Tourism Products">
                <li>Natural Tourism Products </li></a>

                <a href="<?php echo $website_url;?>/tourism-products/tourist-destination" title="Tourist Destination">
                <li>Tourist Destination </li></a>
            </div>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/gallery" title="Gallery">
            <li <?php if ($page=='gallery.php') {?> id="active-li"<?php }?>><i class="bi-images"></i> Gallery</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/blog" title="Blog">
            <li <?php if ($page=='blog.php') {?> id="active-li"<?php }?>><i class="bi-chat-dots-fill"></i> Blog</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/videos" title="Video">
            <li <?php if ($page=='video.php') {?> id="active-li"<?php }?>><i class="bi-play-btn"></i> Video</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/faq" title="Frequently Asked Questions">
            <li <?php if ($page=='faq.php') {?> id="active-li"<?php }?>><i class="bi-patch-question"></i> Frequently Asked Question</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/contact" title="Contact Us">
            <li <?php if ($page=='contact.php') {?> id="active-li"<?php }?>><i class="bi-telephone-inbound"></i> Contact Us</li></a>
        </div>
        
        <div class="menu-title" style="height:100px;"> &nbsp;</div>
    </div>
    
</div>  



<div class="index-menu-back-div2">
    <div class="top-div">
        <div class="logo-div">
            <a href="<?php echo $website_url?>"><img src="<?php echo $website_url?>/all-images/images/logo.png" alt="<?php echo $thename?> Logo"  class="animated zoomIn"/></a>   
        </div>
    </div> 
   
    <div class="div-in">
        <div class="div">
            <a href="<?php echo $website_url;?>" title="Home Page">
            <li <?php if ($page=='index.php') {?> id="active-li"<?php }?>><i class="bi-house"></i> Home Page</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/gallery" title="Gallery">
            <li <?php if ($page=='gallery.php') {?> id="active-li"<?php }?>><i class="bi-images"></i> Gallery</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/blog/" title="Latest Insight">
            <li <?php if ($page=='blog.php') {?> id="active-li"<?php }?>><i class="bi-chat-dots-fill"></i> Blog</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/videos" title="Our Latest Videos">
            <li <?php if ($page=='video.php') {?> id="active-li"<?php }?>><i class="bi-play-btn"></i> Video</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/faq" title="Frequently Asked Questions">
            <li <?php if ($page=='faq.php') {?> id="active-li"<?php }?>><i class="bi-patch-question"></i> Frequently Asked Question</li></a>
        </div>

        <div class="div">
            <a href="<?php echo $website_url;?>/contact" title="Contact Us">
            <li <?php if ($page=='contact.php') {?> id="active-li"<?php }?>><i class="bi-telephone-inbound"></i> Contact Us</li></a>
        </div>
        <div class="menu-title" style="height:100px;"> &nbsp;</div>
    </div> 
</div>  
