<?php include 'config/config.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<title><?php echo $thename?> | First Heritage Culture & Hospitality Limited </title>
<meta name="keywords" content="<?php echo $thename?>, Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions" />
<meta name="description" content="The beacon of Nigeria's rich heritage, transforming the landscape of culture, tourism, and hospitality by fostering sustainable practices, celebrating diversity, and creating immersive experiences that leave an indelible mark on the global stage."/>

<meta property="og:title" content="<?php echo $thename?> | Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions" />
<meta property="og:image" content="<?php echo $website_url?>/all-images/plugin-pix/FIRST-HERITAGE-CULTURE-1.jpg"/>
<meta property="og:description" content="The beacon of Nigeria's rich heritage, transforming the landscape of culture, tourism, and hospitality by fostering sustainable practices, celebrating diversity, and creating immersive experiences that leave an indelible mark on the global stage."/>

<meta name="twitter:title" content="<?php echo $thename?> | Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website_url?>/all-images/plugin-pix/FIRST-HERITAGE-CULTURE-1.jpg"/> 
<meta name="twitter:description" content="The beacon of Nigeria's rich heritage, transforming the landscape of culture, tourism, and hospitality by fostering sustainable practices, celebrating diversity, and creating immersive experiences that leave an indelible mark on the global stage."/>

<link rel="stylesheet" type="text/css" href="slide-property/engine/style.css" />
</head>
<body>
    <?php include 'header.php'?>
   
    
    <section class="slide-section">
     <?php include 'slide.php'?>
     
        <div class="slide-div">
            <div class="slide-inner-div">
                <div class="slide-content-div" data-aos="zoom-in" data-aos-duration="1400">
                    <h1><span id="page-title">FIRST HERITAGE CULTURE & HOSPITALITY LIMITED</span></h1>

                    <div class="bottom-text">
                        <p>Welcome to First Heritage Culture & Hospitality Limited, Your home of promoting sustainable Nigeria's culture, tourism, and hospitality. </p>
                    </div>
                    <br clear="all"/>

                    <div class="bottom-div">
                        <div class="segment-div dsp-none">
                            <div class="img-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/ibudo-asa.webp" alt="ibudo"/>
                            </div>
                            <div class="text">
                                <h4>Ibudo Asa</h4>
                            </div>
                        </div>
                        <div class="segment-div dsp-none">
                            <div class="img-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/obudu-mount.jpg" alt="Obudu Mount"/>
                            </div>
                            <div class="text">
                                <h4>Obudu Mountain</h4>
                            </div>
                        </div>
                        <div class="segment-div dsp-none">
                            <div class="img-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/ahum-waterfall.jpg" alt="Ahum Waterfall"/>
                            </div>
                            <div class="text">
                                <h4>Awhum Waterfall</h4>
                            </div>
                        </div>
                        <div class="segment-div display-none">
                            <div class="img-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/coconuts-beach.webp" alt="coconuts-beach"/>
                            </div>
                            <div class="text">
                                <h4>Coconut Beach</h4>
                            </div>
                        </div>
                        <div class="segment-div">
                            <div class="img-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/olumo2.jpg" alt="Olumo Rrock"/>
                            </div>
                            <div class="text">
                                <h4>Olumo Rock</h4>
                            </div>
                        </div>
                        <div class="segment-div">
                            <div class="img-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/zuma.jpg" alt="Zuma Rock"/>
                            </div>
                            <div class="text">
                                <h4>Zuma Rock</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script type="text/javascript">
        // List of sentences
        var _CONTENT = [ "EMBARK ON EXCITING ADVENTURES AND TOURS","EXPLORE BREATHTAKING DESTINATIONS WITH EASE","EXPERIENCE UNFORGETTABLE JOURNEYS ACROSS THE WORLD"];
        // Current sentence being processed
        var _PART = 0;
        // Character number of the current sentence being processed 
        var _PART_INDEX = 0;
        // Element that holds the text
        var _ELEMENT = document.querySelector("#page-title");
        // Implements typing effect
        function Type() { 
            var text =  _CONTENT[_PART].substring(0, _PART_INDEX + 1);
            _ELEMENT.innerHTML = text;
            _PART_INDEX++;

            // If full sentence has been displayed then start to delete the sentence after some time
            if(text === _CONTENT[_PART]) {
                clearInterval(_INTERVAL_VAL);
                setTimeout(function() {
                    _INTERVAL_VAL = setInterval(Delete, 2);
                }, 5000);
            }
        }
        // Implements deleting effect
        function Delete() {
            var text =  _CONTENT[_PART].substring(0, _PART_INDEX - 1);
            _ELEMENT.innerHTML = text;
            _PART_INDEX--;

            // If sentence has been deleted then start to display the next sentence
            if(text === '') {
                clearInterval(_INTERVAL_VAL);

                // If last sentence then display the first one, else move to the next
                if(_PART == (_CONTENT.length - 1))
                    _PART = 0;
                else
                    _PART++;
                _PART_INDEX = 0;

                // Start to display the next sentence after some time
                setTimeout(function() {
                    _INTERVAL_VAL = setInterval(Type, 50);
                }, 100);
            }
        }
        // Start the typing effect on load
        _INTERVAL_VAL = setInterval(Type, 50);
        </script>
    </section>


<section class="index-content-div">
    <div class="btn-div">
        <div class="btn-div-in"> 
            <button class="btn-history active-btn" id="tourist" title="TOURIST ATTRACTIONS" onclick="_get_details('tourist')"> TOURIST ATTRACTIONS</button>
            <button class="btn-history" id="tradition" title="TRADITION" onclick="_get_details('tradition')"> TRADITION</button>
            <button class="btn-history" id="event" title="EVENT" onclick="_get_details('event')"> EVENT</button>
            <button class="btn-history dsp-none-btn" id="culture" title="CULTURE" onclick="_get_details('culture')"> CULTURE</button>
            <button class="btn-history dsp-none-btn" id="sport" title="SPORT" onclick="_get_details('sport')"> SPORT</button>
            <button class="btn-history dsp-none-btn" id="entertainment" title="ENTERTAINMENT" onclick="_get_details('entertainment')"> ENTERTAINMENT</button>
            <button class="btn-history dsp-none-btn" id="natural_tourism" title="NATURAL TOURISM PRODUCT" onclick="_get_details('natural_tourism')"> NATURAL TOURISM PRODUCTS</button>
            <button class="btn-history dsp-none-btn" id="tourist_destinations" title="TOURIST DESTINATIONS" onclick="_get_details('tourist_destinations')"> TOURIST DESTINATIONS</button>
            <button class="more-cat-btn" title="More Tourism Products" onclick="_open_more_cat_div()"><i class="bi-three-dots-vertical"></i></button>
            <div class="more-cat-div animated fadeIn" id="cat-div">
                <div class="div-in">
                    <button class="btn-history " id="culture" title="CULTURE" onclick="_get_details('culture')"> CULTURE</button>
                    <button class="btn-history" id="sport" title="SPORT" onclick="_get_details('sport')"> SPORT</button>
                    <button class="btn-history" id="entertainment" title="ENTERTAINMENT" onclick="_get_details('entertainment')"> ENTERTAINMENT</button>
                    <button class="btn-history" id="natural_tourism" title="NATURAL TOURISM PRODUCT" onclick="_get_details('natural_tourism')"> NATURAL TOURISM PRODUCTS</button>
                    <button class="btn-history" id="tourist_destinations" title="TOURIST DESTINATIONS" onclick="_get_details('tourist_destinations')"> TOURIST DESTINATIONS</button>
                </div>
            </div>
        </div>
    </div>
    <section class="body-div harsh-bg">
        <div class="body-div-in">
            <div class="details-back-div" data-aos="fade-up" data-aos-duration="1200"> 
                <div class="details-div" id="pane_tourist"> 
                    <div class="content-div">
                        <div class="left-div">
                            <div class="fetch" id="fetch_left_tourist_attraction">
								<script> _get_left_tourist_attraction_page();</script>
							</div>
                        </div>

                        <div class="right-div">
                            <div class="inner-div">
                                <div class="fetch" id="fetch_right_tourist_attraction">
									<script> _get_right_tourist_attraction_page();</script>
								</div>
                            </div>
                        </div>
                    </div> 
                </div> 

                <div class="details-div" id="pane_entertainment" style="display:none"> 
                    <div class="ent-content-div">
                        <div class="top-div">
                            <div class="fetch" id="fetch_top_entertainment">
                                <script> _get_top_entertainment_page();</script>
                            </div>
                        </div>
        
                        <div class="bottom-back-div">
                            <div class="fetch" id="fetch_bottom_entertainment">
								<script> _get_bottom_entertainment_page();</script>
							</div>
                        </div>
                    </div>   
                </div> 

                <div class="details-div" id="pane_sport" style="display:none"> 
                    <div class="sport-content-div">
                        <div class="left-div">
                            <div class="fetch" id="fetch_left_sport">
								<script> _get_left_sport_page();</script>
							</div>
                        </div>

                        <div class="right-div">
                            <div class="inner-div">
                                <div class="fetch" id="fetch_right_sport">
									<script> _get_right_sport_page();</script>
								</div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="details-div" id="pane_culture" style="display:none"> 
                    <div class="culture-back-div">          
                        <div class="cg-carousel">
                            <div class="cg-carousel__container" id="js-carousel_1">                
                                <div class="cg-carousel__track js-carousel__track">
                                    <div class="cg-carousel__track js-carousel__track" id="fetch_main_culture">
                                        <script>_get_main_culture();</script>        
                                    </div>

                                    <!-- <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                        <div class="culture-div">
                                            <div class="inner-title">CULTURE</div>
                                            <div class="image-div">   
                                                <img src="<?php //echo $website_url?>/all-images/body-pix/pyramid.jpg" alt="pyramid" />                               
                                            </div>

                                            <div class="text-div">
                                                <div class="div-in">
                                                    <div class="title">
                                                        Historical buildings and monuments
                                                    </div>

                                                    <h2>Thought Pyramid Art Centre, Abuja, Nigeria</h2>
                                                    <p>Thought Pyramid Art Centre is an innovative art organization established with a distinctive mentality to be a pioneering force in the local...</p>
                                                    <a href="<?php //echo $website_url ?>/#" title="READ MORE">
                                                    <button class="btn" title="READ MORE">READ MORE <i class="bi-arrow-right"></i></button></a>
                                                </div>
                                            </div> 
                                        </div>                      
                                    </div>  -->
                                </div>
                            </div>
                        </div>
                        <button class="btn" title="Next" id="js-carousel__prev_1"><i class="bi-chevron-double-left"></i> PREVIOUS</button>
                        <button class="btn" title="Previous" id="js-carousel__next_1">NEXT <i class="bi-chevron-double-right"></i></button>

                    </div>
<script>
	window['carousel_options_1']= ({
        items:1,
            margin: 30,
            loop:true,
            dots: true,
            autoplayHoverPause: true,
            smartSpeed:650,         
            autoplay:true,      
            breakpoints: {
		1300: {
		slidesPerView: 1,
		}
	
        }
    });
</script> 
                </div>
                
                <div class="details-div" id="pane_tradition" style="display:none"> 
                    <div class="tradition-back-div">          
                        <div class="cg-carousel">
                            <div class="cg-carousel__container" id="js-carousel_2">                
                                <div class="cg-carousel__track js-carousel__track">
                                    <div class="cg-carousel__track js-carousel__track" id="fetch_main_tradition">
										<script>_get_main_tradition();</script>   
									</div>
                                </div>
                            </div>
                        </div>
                        <button class="btn" title="Next" id="js-carousel__prev_2"><i class="bi-chevron-double-left"></i> PREVIOUS</button>
                        <button class="btn" title="Previous" id="js-carousel__next_2">NEXT <i class="bi-chevron-double-right"></i></button>
                    </div>
<script>
	window['carousel_options_2']= ({
        items:1,
            margin: 30,
            loop:true,
            dots: true,
            autoplayHoverPause: true,
            smartSpeed:650,         
            autoplay:true,      
            breakpoints: {
                700: {
		slidesPerView: 2,
		},
        1000: {
		slidesPerView: 3,
		},
		1300: {
		slidesPerView: 3,
		}
	
        }
    });
</script>  
                </div>

                <div class="details-div" id="pane_natural_tourism" style="display:none"> 
                    <div class="natural-toursit-content-div">
                        <div class="left-div">
                            <div class="fetch" id="fetch_left_tourism_prod">
								<script> _get_left_tourism_prod_page();</script>
							</div>
                        </div>

                        <div class="right-div">
                            <div class="inner-div">								
                                <div class="fetch" id="fetch_right_tourism_prod">
									<script> _get_right_tourism_prod_page();</script>
								</div>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="details-div" id="pane_tourist_destinations" style="display:none"> 
                    <div class="african-back-div">          
                        <div class="cg-carousel">
                            <div class="cg-carousel__container" id="js-carousel_3">                                          
                                <div class="cg-carousel__track js-carousel__track" id="fetch_main_tourist_destination">
                                    <script> _get_main_tourist_destination_page();</script>                  
                                </div>
                            </div>
                        </div>
                        <button class="btn" title="Next" id="js-carousel__prev_3"><i class="bi-chevron-double-right"></i></button>
                        <button class="btn left-btn" title="Previous" id="js-carousel__next_3"><i class="bi-chevron-double-left"></i></button>
                    </div>
<script>
	window['carousel_options_3']= ({
        items:4,
            margin: 30,
            loop:true,
            dots: true,
            autoplayHoverPause: true,
            smartSpeed:650,         
            autoplay:true,      
            breakpoints: {
		700: {
		slidesPerView: 2,
		},
        1000: {
		slidesPerView: 3,
		},
		1300: {
		slidesPerView: 3,
		}
	
        }
    });
</script>
                </div>

                <div class="details-div" id="pane_event" style="display:none"> 
                    <div class="natural-toursit-content-div">
                        <div class="left-div">
                            <div class="fetch" id="fetch_left_event">
								<script> _get_left_event_page();</script>
							</div>
                        </div>

                        <div class="right-div">
                            <div class="inner-div">
                                <div class="fetch" id="fetch_right_event">
									<script> _get_right_event();</script>
								</div>
                            </div>
                        </div>                         
                    </div> 
                </div>                 
            </div> 
        </div>
    </section>


   
    <section class="body-div">
        <div class="body-div-in">
            <div class="gallery-back-div"> 
                <div class="left-gallery-div">
                    <img src="<?php echo $website_url?>/all-images/body-pix/service.jpeg" alt="service" />
                    <div class="overlay-div">
                        <div class="div-in">
                            <h2>CHECK OUT SOME OF OUR GALLERIES</h2>
                        </div>
                    </div>
                </div> 
                
               

                <div class="right-gallery-div">
                    <div class="right-gallery-back-div">
                        <div class="cg-carousel">
                            <div class="cg-carousel__container" id="js-carousel_4">                
                                <div class="cg-carousel__track js-carousel__track" id="fetch_index_gallery">
                                    <script> _get_index_random_pages();</script>                  
                               
                                   

                                    <!-- <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                        <div class="galleries">
                                            <div class="img-div">
                                                <img src="<?php //echo $website_url?>/all-images/body-pix/img5.webp" alt="national theater" />                              
                                            </div>

                                            <div class="text-div">
                                                <div class="inner">
                                                    <h3>National Theater</h3>                                   
                                                </div>
                                            </div>
                                        </div>                       
                                    </div> 

                                    <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                        <div class="galleries">
                                            <div class="img-div">
                                                <img src="<?php //echo $website_url?>/all-images/body-pix/img3.jpg" alt="olumo" />                               
                                            </div>

                                            <div class="text-div">
                                                <div class="inner">
                                                    <h3>Olumo Rock</h3>                                   
                                                </div>
                                            </div>
                                        </div>                       
                                    </div> 

                                    <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                        <div class="galleries">
                                            <div class="img-div">
                                                <img src="<?php //echo $website_url?>/all-images/body-pix/img2.jpg" alt="ikogosi" />                                
                                            </div>

                                            <div class="text-div">
                                                <div class="inner">
                                                    <h3>Ikogosi Warm Water</h3>                                   
                                                </div>
                                            </div>
                                        </div>                      
                                    </div> 

                                    <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                        <div class="galleries">
                                            <div class="img-div">
                                                <img src="<?php //echo $website_url?>/all-images/body-pix/img4.webp" alt="Badagry" />                                     
                                            </div>

                                            <div class="text-div">
                                                <div class="inner">
                                                    <h3>Gberefu Badagry</h3>                                   
                                                </div>
                                            </div>
                                        </div>                       
                                    </div> 

                                    <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                        <div class="galleries">
                                            <div class="img-div">
                                                <img src="<?php //echo $website_url?>/all-images/body-pix/img5.webp" alt="national theater" />                                                                                                                                                                      
                                            </div>

                                            <div class="text-div">
                                                <div class="inner">
                                                    <h3>National Theater</h3>                                   
                                                </div>
                                            </div>
                                        </div>                       
                                    </div>

                                    <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                        <div class="galleries">
                                            <div class="img-div">
                                                <img src="<?php //echo $website_url?>/all-images/body-pix/img2.jpg" alt="ikogosi" />                              
                                            </div>

                                            <div class="text-div">
                                                <div class="inner">
                                                    <h3>Ikogosi Warm Water</h3>                                   
                                                </div>
                                            </div>
                                        </div>                      
                                    </div>

                                    <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                        <div class="galleries">
                                            <div class="img-div">
                                                <img src="<?php //echo $website_url?>/all-images/body-pix/img5.webp" alt="national theater" />                              
                                            </div>

                                            <div class="text-div">
                                                <div class="inner">
                                                    <h3>National Theater</h3>                                   
                                                </div>
                                            </div>
                                        </div>                       
                                    </div>  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn" title="Next" id="js-carousel__prev_4"><i class="bi-chevron-double-right"></i></button>
                    <button class="btn left-btn" title="Previous" id="js-carousel__next_4"><i class="bi-chevron-double-left"></i></button>
                </div>
                
                
<script>
	window['carousel_options_4']= ({
        items:4,
            margin: 30,
            loop:true,
            dots: true,
            autoplayHoverPause: true,
            smartSpeed:650,         
            autoplay:true,      
            breakpoints: {
		850: {
		slidesPerView: 2,
		},
		1300: {
		slidesPerView: 2,
		}
	
        }
    });
</script>
            </div>    
        </div>
    </section>
    <br clear="all"/>

    <section class="body-div">
        <div class="body-div-in">
            <div class="title-div" data-aos="zoom-in" data-aos-duration="1000">
                <p>--Latest Insight--</p>
                <h3>Our Latest Blog</h3>
            </div> 

            <div class="blog-back-div">
                <div class="fetch" id="fetch_index_blog">
					<script> _get_index_blog();</script>
				</div>
            </div>
        </div>
    </section>


    <section class="body-div faq-bg">
        <div class="body-div-in">    
			<div class="faq-back-div" data-aos="fade-up" data-aos-duration="1000">
                <div class="title-div">  
                    <div class="in">
                        <h3>Frequently Asked Questions</h3>
                    </div>                             
                </div>

				<div class="faq-text-div">
					<div class="faq-inner-div" id="fetch_index_faq">					             	
                        <script> _get_fetch_index_faq();</script>

						<!-- <div class="quest-faq-div active-faq" id="faq10">
							<div class="faq-title-text" onclick="_collapse('faq243')">
							 	<h2>Who We Are</h2>
								<div class="expand-div" id="faq243num">&nbsp;<i class="bi-plus"></i>&nbsp;</div>
							
                                <div class="faq-answer-div faq-answer-display" id="faq243answer" style="display: none;">
                                    <p>We are a dedicated online service provider with a reliable outstanding online class service.</p>                           
                                </div>
                            </div>
						</div>	 -->
					</div>
                    <a href="<?php echo $website_url ?>/faq" title="Frequently Asked Questions">
					<button class="btn" title="Frequently Asked Questions">READ MORE  <i class="bi-arrow-right"></i></button></a>
				</div>	
			</div>
		</div>
	</section>

    <section class="body-div">
        <div class="body-div-in">
            <div class="title-div" data-aos="zoom-in" data-aos-duration="1000">
                <p>--Who We Are--</p>
                <h3>Learn More About Us</h3>
            </div>
            <br clear="all"/>
            
            <div class="about-back-div">           
                <div class="left-div" data-aos="flip-right" data-aos-duration="1000">
                    <div class="image-div">
                        <img src="<?php echo $website_url?>/all-images/body-pix/about.jpg" alt="about" />
                    </div>
                </div>

                <div class="right-div" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Discover Beyond: Your Gateway to Extraordinary Journeys</h2>
                    <p>Welcome to First Heritage Culture Hospitality & Limited, your gateway to unforgettable tour experiences. We are passionate about curating tourism that go beyond the ordinary.</p>
                    <div class="details">
                        <div class="icon-div">
                            <img src="<?php echo $website_url?>/all-images/images/vision.png" alt="about" />
                        </div>
                        <div class="text-div">
                            <h4>Our Vision</h4>
                            <p>First Heritage Culture & Hospitality Limited aspires to be the beacon of Nigeria's rich heritage, transforming the landscape of culture, tourism, and hospitality by fostering sustainable practices, celebrating diversity, and creating immersive experiences that leave an indelible mark on the global stage.</p>
                        </div>
                    </div>
                    <div class="details">
                        <div class="icon-div icon">
                            <img src="<?php echo $website_url?>/all-images/images/mission.png" alt="about" />
                        </div>
                        <div class="text-div">
                            <h4>Our Mission</h4>
                            <p>To make culture, tourism, travel, hospitality, media, entertainment and creative industry dynamic and viable tools for the promotion of culture and heritage.</p>
                        </div>
                    </div>
                 
                    <a href="<?php echo $website_url ?>/about" title="READ MORE">
                    <button class="read-more" title="READ MORE">READ MORE <i class="bi-arrow-right"></i></button></a>
                </div>
            </div>
        </div>
    </section>

    
    <section class="body-div testimonial-bg">
        <div class="body-div-in">
            <div class="title-div test-title" data-aos="zoom-in" data-aos-duration="1000">
                <p>--Our Customer Reviews--</p>
                <h3>Testimonial
                <button class="btn" title="Next" id="js-carousel__prev_6"><i class="bi-chevron-double-right"></i></button>
                <button class="btn left-btn" title="Previous" id="js-carousel__next_6"><i class="bi-chevron-double-left"></i></button>
                </h3>
            </div>
            <br clear="all"/>
            
            <div class="testimonial-back-div">          
                <div class="cg-carousel">
                    <div class="cg-carousel__container" id="js-carousel_6">                
                        <div class="cg-carousel__track js-carousel__track">
                            <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                <div class="testimonial-div">
                                    <div class="image-div">
                                        <img src="<?php echo $website_url?>/all-images/body-pix/omoba.jpg" alt="omoba"/>
                                    </div>
                                    <i class="bi-quote"></i>
                                    <br clear="all"/>

                                    <div class="text">
                                        <p>One of the highlights of Olumo Rock, an experience that left me in awe. The professionalism of the tour guides and the carefully curated activities made this trip truly unforgettable.</p>
                                        <h3>Omoba Ogundeko </h3>  
                                        <span class="star">
                                            <i class="bi-star"></i>
                                            <i class="bi-star-fill"></i>    
                                            <i class="bi-star-fill"></i> 
                                            <i class="bi-star-fill"></i> 
                                            <i class="bi-star-fill"></i> 
                                          
                                        </span> 
                                    </div>
                                </div>                      
                            </div> 

                            <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                <div class="testimonial-div">
                                    <div class="image-div">
                                        <img src="<?php echo $website_url?>/all-images/body-pix/testimonial1.jpg" alt="testimonial1"/>
                                    </div>
                                    <i class="bi-quote"></i>
                                    <br clear="all"/>

                                    <div class="text">
                                        <p>I highly recommend First Heritage Culture Hospitality Limited for anyone seeking an enriching and memorable travel experience. Thank you for making my journey so special!</p>
                                        <h3>Barry Job</h3>
                                        <span class="star">
                                            <i class="bi-star"></i> 
                                            <i class="bi-star-fill"></i>    
                                            <i class="bi-star-fill"></i> 
                                            <i class="bi-star-fill"></i> 
                                            <i class="bi-star-fill"></i> 
                                        </span>
                                    </div>  
                                </div>                       
                            </div> 

                            <div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">
                                <div class="testimonial-div">
                                    <div class="image-div">
                                        <img src="<?php echo $website_url?>/all-images/body-pix/testimonial2.jpg" alt="testimonial2"/>
                                    </div>
                                    <i class="bi-quote"></i>
                                    <br clear="all"/>

                                    <div class="text">
                                        <p>From the moment I set foot in Ipara Remo, I was captivated by the rich culture, historical landmarks, and the warm hospitality of the locals.</p>
                                        <h3>Emmanuel Paul</h3> 
                                        <span class="star">
                                            <i class="bi-star"></i>
                                            <i class="bi-star-fill"></i>    
                                            <i class="bi-star-fill"></i> 
                                            <i class="bi-star-fill"></i> 
                                            <i class="bi-star-fill"></i> 
                                        </span>
                                            
                                    </div>

                                </div>                      
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
<script>
	window['carousel_options_6']= ({
        items:4,
            margin: 30,
            loop:true,
            dots: true,
            autoplayHoverPause: true,
            smartSpeed:650,         
            autoplay:true,      
            breakpoints: {
		700: {
		slidesPerView: 1,
		},
        1000: {
		slidesPerView: 2,
		},
		1300: {
		slidesPerView: 3,
		}
	
        }
    });
    _call_carousel(6);
</script>
        </div>
    </section>



    <section class="body-div newsletter-bg">
        <div class="body-div-in">
            <div class="newletter-back-div">           
                <div class="left-div">
                    <div class="inner">
                        <h4>SUBSCRIBE OUR <span>NEWSLETTER</span></h4>
                        <p>Sign up to recieve best offers on promotion and <br>coupons. Don't worry! It's not a Spam</p>

                        <div class="text-box-back-div">
                            <input  type="text" class="text-field" placeholder="Email Here" title="Email Here" />
                            <button class="btn" title="Subscribe">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>

                <div class="right-div">
                    <div class="icon-div">
                        <div class="inner-icon">
                            <img src="<?php echo $website_url?>/all-images/images/location2.png" alt="location"/>
                        </div>
                        <h4>300+</h4>
                        <h4><span>New Destinations</span></h4>
                    </div>
                    <div class="icon-div" data-aos="fade-up" data-aos-duration="1200">
                        <div class="inner-icon">
                            <img src="<?php echo $website_url?>/all-images/images/earth.png" alt="earth"/>
                        </div>
                        <h4>500+</h4>
                        <h4><span>Amazing Tour</span></h4>
                    </div>
                    <div class="icon-div" data-aos="fade-up" data-aos-duration="1200">
                        <div class="inner-icon">
                            <img src="<?php echo $website_url?>/all-images/images/experience.png" alt="experience"/>
                        </div>
                        <h4>05+</h4>
                        <h4><span>Years Experience</span></h4>
                    </div>
                    <div class="icon-div" data-aos="fade-up" data-aos-duration="1200">
                        <div class="inner-icon">
                            <img src="<?php echo $website_url?>/all-images/images/journey.png" alt="journey"/>
                        </div>
                        <h4>150+</h4>
                        <h4><span>Best Tours</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
	    <?php include 'footer.php'?>
    </section>
    <?php include 'bottom-scripts.php'?>
</section>
    




</body>
</html>


