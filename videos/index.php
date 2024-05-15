<?php include '../config/config.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../meta.php'?>
<title> Latest Videos | <?php echo $thename?></title>
<meta name="keywords" content="<?php echo $thename?>, Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions" />
<meta name="description" content="Explore the rich tapestry of culture and heritage with our tourism website. Discover captivating destinations, delve into local traditions, and immerse yourself in the history, art, and architecture of diverse cultures. Plan your next adventure with us."/>

<meta property="og:title" content="<?php echo $thename?> | Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions" />
<meta property="og:image" content="<?php echo $website_url?>/all-images/plugin-pix/connect-global-logistics.jpg"/>
<meta property="og:description" content="Explore the rich tapestry of culture and heritage with our tourism website. Discover captivating destinations, delve into local traditions, and immerse yourself in the history, art, and architecture of diverse cultures. Plan your next adventure with us."/>

<meta name="twitter:title" content="<?php echo $thename?> | Tourism, culture, travel, heritage, history, attractions, destinations, landmarks, cultural events, museums, art, architecture, local traditions"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website_url?>/all-images/plugin-pix/connect-global-logistics.jpg"/> 
</head>
<body>
<?php include '../header.php'?>

<div class="other-pages-title" >
	<div class="inner-div">
        <div class="content gallery-cont">
            <div class="top-title-div">
                <div class="div-in">
					<ul>
						<a href="<?php echo $website_url?>"><li>Home <i class="bi-caret-right-fill"></i></li></a>
						<a href="<?php echo $website_url?>/videos" title="First Heritage Culture Videos"><li>First Heritage Culture Videos </li></a>
					</ul>
                </div>			
            </div>

			<h1 class="border"><span>First Heritage Culture Videos</span></h1>	
			<p>At First Heritage Culture™, we believe in creating unforgettable <br/>memories. Choose from our array of tourism products.</p>	
		</div>
    </div>
</div> 


<section class="other-pages-content-div">
	<div class="btn-div">
		<div class="btn-div-in gallery-btn"> 
			<button class="btn-history active-btn-2" id="next-tour" title="TOURIST ATTRACTIONS" onclick="_get_gallery_details('all_tourist_attracton_videos','tour')"> TOURIST ATTRACTIONS</button>
			<button class="btn-history" id="next-tra" title="TRADITION" onclick="_get_gallery_details('all_tradition_videos','tra')"> TRADITION</button>
			<button class="btn-history" id="next-event" title="EVENT" onclick="_get_gallery_details('all_event_videos','event')"> EVENT</button>
			<button class="btn-history dsp-none-btn" id="next-cult" title="CULTURE" onclick="_get_gallery_details('all_culture_videos','cult')"> CULTURE</button>
			<button class="btn-history dsp-none-btn" id="next-sport" title="SPORT" onclick="_get_gallery_details('all_sport_videos','sport')"> SPORT</button>
			<button class="btn-history dsp-none-btn" id="next-ent" title="ENTERTAINMENT" onclick="_get_gallery_details('all_entertainment_videos','ent')"> ENTERTAINMENT</button>
			<button class="btn-history dsp-none-btn" id="next-natural" title="NATURAL TOURISM PRODUCT" onclick="_get_gallery_details('all_natural_tour_products_videos','natural')"> NATURAL TOURISM PRODUCTS</button>
			<button class="btn-history dsp-none-btn" id="next-tourist-dest" title="TOURIST DESTINATIONS" onclick="_get_gallery_details('all_tourist_destinations_vedeos','tourist-dest')"> TOURIST DESTINATIONS</button>
			<button class="more-cat-btn" title="More Tourism Products" onclick="_open_more_cat_div()"><i class="bi-three-dots-vertical"></i></button>
			<div class="more-cat-div" id="cat-div">
				<div class="div-in">
				<button class="btn-history" id="culture_2" title="CULTURE" onclick="_get_gallery_details('all_culture_videos','cult')"> CULTURE</button>
				<button class="btn-history" id="sport_2" title="SPORT" onclick="_get_gallery_details('all_sport_videos','sport')"> SPORT</button>
				<button class="btn-history" id="entertainment_2" title="ENTERTAINMENT" onclick="_get_gallery_details('all_entertainment_videos','ent')"> ENTERTAINMENT</button>
				<button class="btn-history" id="natural_tourism_2" title="NATURAL TOURISM PRODUCT" onclick="_get_gallery_details('all_natural_tour_products_videos','natural')"> NATURAL TOURISM PRODUCTS</button>
				<button class="btn-history" id="tourist_destinations_2" title="TOURIST DESTINATIONS" onclick="_get_gallery_details('all_tourist_destinations_vedeos','tourist-dest')"> TOURIST DESTINATIONS</button>
				</div>
			</div>
		</div>
	</div>


	<section class="body-div">
		<div class="body-div-in">
			<div class="main-gallery-back-div"> 
				<div class="details-div" id="get_details">
					<div class="main-gallery-div-in">
						<div class="fetch" id="fetch_all_tourist_attraction_videos">
							<script> _get_tourist_attraction_videos();</script>
						</div>		 
					</div>
				</div>

				<div class="details-div" id="get_details"></div>
			</div>
		</div>
    </section>
</section>
<br clear="all"/>

<section class="footer">
	<?php include '../footer.php'?>
</section>

<?php include '../bottom-scripts.php'?>

</body>
</html>


