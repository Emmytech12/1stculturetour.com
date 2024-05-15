<?php include '../config/config.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../meta.php'?>
<title> Tourism Products | <?php echo $thename?></title>
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

<div class="other-pages-title" data-aos="fade-down" data-aos-duration="1200">
	<div class="inner-div">
        <div class="content" data-aos="zoom-in" data-aos-duration="1200">
            <div class="top-title-div">
                <div class="div-in">
					<ul>
						<a href="<?php echo $website_url?>"><li>Home <i class="bi-caret-right-fill"></i></li></a>
						<a href="<?php echo $website_url?>/tourism-products" title="Tourism Products"><li>Tourism Products </li></a>
					</ul>
                </div>			
            </div>

			<h1 class="border"><span>Tourism Products</span></h1>	
			<p>At First Heritage Culture™, we believe in creating unforgettable memories. Choose from our array of tourism products, and let us guide you through an extraordinary journey.</p>
            <a href="<?php echo $website_url ?>/#" title="Bookings">
			<button class="btn" title="Bookings">BOOKINGS</i></button></a>
        </div>
        <div class="image-back-div">
            <div class="left-img tourist-products-img">
                <img src="<?php echo $website_url?>/all-images/body-pix/tourist-prod-image1.jpeg" alt="about-us-image"/>
            </div>

            <div class="bottom-img tourist-products-bottom-img">
                <img src="<?php echo $website_url?>/all-images/body-pix/tourist-prod-image2.jpg" alt="about-us-image"/>
            </div>
        </div>	

    </div>
    <br clear="all"/> 
</div> 


<section class="other-pages-content-div">

	<section class="body-div tourism-products-bg">
		<div class="body-div-in">
			<div class="tourism-products-back-div animated fadeIn">
				<div class="fetch" id="fetch_all_tourism_products">
					<script>_get_tourism_products();</script>                  
				</div>

				<!-- <div class="tourism-products">
					<div class="image-div">
						<img src="<?php// echo $website_url?>/uploaded_files/tourism_products_pix/tourist-attraction.jpg" alt="tourist-attraction"/>
					</div>

					<div class="icon-div">
						<img src="<?php //echo $website_url?>/all-images/images/icon2.png" alt="First Cuture Logo"/>
					</div>

					<div class="text-div">
						<h2>Tourist Attractions</h2>
						<p>A tourist attraction is a place of interest where tourists visit, typically for its inherent or exhibited cultural value, historical significance, natural or built beauty...</p>
						<a href="<?php// echo $website_url ?>/tourism-products/tourist-attractions/" title="READ MORE">
                        <button class="btn" title="READ MORE">READ MORE <i class="bi-chevron-double-right"></i></button></a>
					</div>
				</div> -->
			</div>
		</div>
    </section>
</section>

<section class="footer">
	<?php include '../footer.php'?>
</section>

<?php include '../bottom-scripts.php'?>

</body>
</html>


