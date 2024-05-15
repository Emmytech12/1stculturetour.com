<?php include 'config/config.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<head>
<?php include 'meta.php'?>
<title><?php echo $thename?> | Frequently Asked Questions</title>
<meta name="keywords" content="<?php echo $thename?>, Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions" />
<meta name="description" content="The beacon of Nigeria's rich heritage, transforming the landscape of culture, tourism, and hospitality by fostering sustainable practices, celebrating diversity, and creating immersive experiences that leave an indelible mark on the global stage."/>

<meta property="og:title" content="<?php echo $thename?> | Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions" />
<meta property="og:image" content="<?php echo $website_url?>/all-images/plugin-pix/FIRST-HERITAGE-CULTURE-1.jpg"/>
<meta property="og:description" content="The beacon of Nigeria's rich heritage, transforming the landscape of culture, tourism, and hospitality by fostering sustainable practices, celebrating diversity, and creating immersive experiences that leave an indelible mark on the global stage."/>

<meta name="twitter:title" content="<?php echo $thename?> | Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website_url?>/all-images/plugin-pix/FIRST-HERITAGE-CULTURE-1.jpg"/> 
<meta name="twitter:description" content="The beacon of Nigeria's rich heritage, transforming the landscape of culture, tourism, and hospitality by fostering sustainable practices, celebrating diversity, and creating immersive experiences that leave an indelible mark on the global stage."/>
</head>
<body>

<?php include 'header.php'?>

<div class="other-pages-title contact-other-pages-title" data-aos="fade-down" data-aos-duration="1200">
	<div class="inner-div">
        <div class="content faq-content" data-aos="zoom-in" data-aos-duration="1200">
            <div class="top-title-div">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url?>"><li>Home <i class="bi-caret-right-fill"></i></li></a>
                        <a href="<?php echo $website_url?>/faq"><li>Frequently Asked Questions</li></a>				
                    </ul>
                </div>			
            </div>

    		<h1 class="border"><span>Frequently asked questions</span></h1>	
			<p>First Heritage Culture always provides frequently asked questions and offline support to guide you on Tourism and many more.</p>
        </div>
    </div>
    <br clear="all"/> 
</div> 


<div class="other-pages-content-div">

    <section class="body-div">
		<div class="body-div-in"> 
			<div class="search-text-div" data-aos="zoom-in" data-aos-duration="800">
                <div class="search-segment-div">
                    <select id="cat_id" onchange=" _get_fetch_faq();" class="text_field">
                        <option value="" selected="selected">All FAQ Categories</option>
							<script> _get_cat('cat_id');</script>
                    </select>     
                </div>
            
                <div class="search-segment-div no-border">
                    <input id="search_txt" onkeyup="_get_fetch_faq();" class="text_field" placeholder="Type Here To Search..." title="Type to Search Here">
                </div>
				
            </div>
			<br clear="all"/>

            <div class="faq-back-div main-faq-back-div">
				<div class="faq-text-div main-faq-text-div">
					<div class="faq-inner-div" id="fetch_faq">
						<script> _get_fetch_faq();</script>

						<!-- <div class="quest-faq-div active-faq" id="faq10">
							<div class="faq-title-text" onclick="_collapse('faq244')">
							 	<h2>Who We Are</h2>
								<div class="expand-div" id="faq244num">&nbsp;<i class="bi-plus"></i>&nbsp;</div>					

								<div class="faq-answer-div faq-answer-display" id="faq244answer" style="display: none;">
									<p>We are a dedicated online service provider with a reliable outstanding online class service.</p>                           
								</div>
							</div>
						</div> -->
					</div>
				</div>	
			</div>

		</div>
	</section>
		<br clear="all"/>
		<br clear="all"/>
		<br clear="all"/>
		<br clear="all"/>
	<?php include 'footer.php'?>
</div>
<?php include 'bottom-scripts.php'?>
</body>
</html>


