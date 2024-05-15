<?php  include 'alert.php'?>
<div id="loading">
    <img id="loading-image" src="<?php echo $website_url?>/all-images/images/loader.gif" alt="Loading..."/> 
</div> 

<header class="fadeInDown animated"> 
    <div class="header-top-div">
        <div class="div-in">
            <div class="contact"><i class="bi-envelope"></i> Info@1stculturetour.com</div>
            <div class="contact phone"><i class="bi-telephone"></i> +234 803 537 1280</div>
            <ul>
                <a href="#" target="_blank" title="linkedin">
                <li class="li"><i class="bi-linkedin"></i></li></a>
                <a href="#" target="_blank" title="instagram">
                <li class="li"><i class="bi-instagram"></i></li></a>
                <a href="#" target="_blank" title="facebook">
                <li class="li"><i class="bi-facebook"></i></li></a>
                <a href="#" target="_blank" title="Whatsapp">
                <li><i class="bi-whatsapp"></i></li></a>
                <a href="#" title="Call Customer Care">
                <li><i class="bi-telephone"></i></li></a> 
            </ul>
     
        </div>   
    </div>  
    
    <div class="header-div-in">
        <div class="inner">
            <div class="logo-div">
                <a href="<?php echo $website_url?>"><img src="<?php echo $website_url?>/all-images/images/logo.png" alt="<?php echo $thename?> Logo"  class="animated zoomIn"/></a>   
            </div>

            <ul> 
                <a href="<?php echo $website_url?>/" title="Home Page"><li <?php if (($website_auto_url=="$website_url/")) {?> class="active" <?php }?>>HOME</li></a>                               
                <a href="<?php echo $website_url?>/about" title="About Us"><li <?php if (($website_auto_url=="$website_url/about")) {?> class="active" <?php }?>>ABOUT US</li></a>  
                <a href="<?php echo $website_url?>/tourism-products/" title="Tourism Products">
                    <li id="expand-li" <?php if (strstr($website_auto_url, "$website_url/tourism-products/")) {?> class="active" <?php }?>> <i class="bi-plus"></i> TOURISM PRODUCTS
                        <div class="sub-nav-div animated FadeIn">
                            <div class="inner-div">
                                <div class="fetch" id="fetch_header_tourism_products">
					                <script>_get_header_tourism_products();</script>                  
				                </div>
                                <!-- <a href="<?php //echo $website_url?>/tourism-products/tourist-attractions/" title="Tourist Attractions">
                                <div class="tourism-cat-div">
                                    <div class="image-div">
                                        <img src="<?php //echo $website_url?>/all-images/body-pix/img3.jpg" alt="Olumo"/>
                                    </div>
                                    <h4>Tourist Attractions</h4>
                                </div></a> --> 
                            </div>                         
                        </div> 
                    </li>
                </a> 

                <li class="gallery <?php if (strstr($website_auto_url, "$website_url/gallery")) {?> active <?php }?>">
                    <a href="<?php echo $website_url?>/gallery" title="Gallery">GALLERY</a>
                </li>
               
                <li class="blog <?php if (strstr($website_auto_url, "$website_url/blog/")) {?> active <?php }?>">
                    <a href="<?php echo $website_url?>/blog/" title="Our Latest Insights">BLOG</a>
                </li>

                <li class="video <?php if (strstr($website_auto_url, "$website_url/videos")) {?> active <?php }?>">
                    <a class="video" href="<?php echo $website_url?>/videos" title="Our Latest Videos">VIDEOS</a> 
                </li>

                <li class="contact <?php if (strstr($website_auto_url, "$website_url/contact")) {?> active <?php }?>">
                    <a href="<?php echo $website_url?>/contact" title="Contact Us">CONTACT US</a>
                </li>
                <br clear="all" />
            </ul>
            
            <button class="mobile-btn" onclick="_open_menu()"><i class="bi-list"></i></button>
            <button class="btn" onclick="_open_menu_2()" title="SEE MORE SERVICES"><i class="bi-text-right"></i></button>
            <br clear="all" />
        </div>
    </div>
</header>