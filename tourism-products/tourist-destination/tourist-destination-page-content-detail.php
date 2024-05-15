<?php include '../../../config/config.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../../../meta.php'?>
<title><?php echo $page_title?></title>
<meta name="keywords" content="<?php echo $page_seo_keywords?>" />
<meta name="description" content="<?php echo $page_seo_description?>"/>

<meta property="og:title" content="<?php echo $page_title?>"/>
<meta property="og:image" content="<?php echo $uploaded_file_url?>/tourist_destination_pix/seo_pix/<?php echo $page_seo_pix?>"/>
<meta property="og:description" content="<?php echo $page_seo_description?>"/>

<meta name="twitter:title" content="<?php echo $page_title?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $uploaded_file_url?>/tourist_destination_pix/seo_pix/<?php echo $page_seo_pix?>"/> 
<meta name="twitter:description" content="<?php echo $page_seo_description?>"/>
</head>
<body>

<section class="header">
	<?php include '../../../header.php'?>
</section>

<div class="other-pages-title" data-aos="fade-down" data-aos-duration="1000">
	<div class="inner-div">
        <div class="content main-pg-cont" data-aos="zoom-in" data-aos-duration="1200">
            <div class="top-title-div">
                <div class="div-in">
					<ul>
						<a href="<?php echo $website_url?>"><li>Home <i class="bi-caret-right-fill"></i></li></a>
						<a href="<?php echo $website_url?>/tourism-products" title="Tourism Products"><li> Tourism Products <i class="bi-caret-right-fill"></i></li></a>
						<a href="<?php echo $website_url?>/tourism-products/tourist-destination" title="Tourist Destination"><li> Tourist Destination <i class="bi-caret-right-fill"></i></li></a>
						<a href="<?php echo $website_url?>/tourism-products/tourist-destination/"><li id="page_url"></li></a>
					</ul>
                </div>			
            </div>

			<h1 class="border"><span id="page_title"></span></h1>	
			<div class="count"><i class="bi-person"></i> By: <span id="fullname">xxxx</span> | <i class="bi-calendar3"></i> DATE: <span id="formattedDate">xxxx</span> | <i class="bi-eye"></i> VIEWS: <span id="page_views">xxxx</span></div>
			<p id="page_summary"></p>
        </div>

		<div class="image-back-div main-pg-info-pix">
            <div class="left-img main-pg-pix" id="view_page_pix2">
				<img src="" alt="tourist-destination"/>
            </div>
        </div>	
        
    </div>
</div> 


<section class="other-pages-content-div">
	<section class="body-div">
		<div class="body-div-in">
			<div class="gen-content-back-detail main-pg-top-div">
				<div class="left-div">
					<div class="main-back-img-div">
		
						<div class="main-img-div" id="preview-img" onclick="openFullScreen()">
							<div id="view_page_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="tourist-destination"/></div>
						</div>

						<div class="bottom-img-div">
							<div class="inner-img-container" id="fetch_pix_preview_div"> 
								<script> _fetch_tourism_products_other_pix('<?php echo $page_id?>','tourist_destination');</script>
							</div>
							<button class="left-btn"> <i class="bi-chevron-double-left"></i></button>
							<button class="right-btn"> <i class="bi-chevron-double-right"></i></button>
						</div>
					</div>

					<div class="main-content-div">
						<div class="content-txt" id="page_detail">
							<h2 id="page_title"></h2>
						</div>

						<div class="videos-back-div">
							<div class="inner-div">
								<div class="fetch" id="video_preview_div">
									<script> _get_fetch_tourism_products_videos('<?php echo $page_id?>','<?php echo $video_id?>');</script>
								</div>
							</div>
						</div>
						
						<div class="comment-back-div">
							<div id="disqus_thread"></div>
							<script>
								(function() { // DON'T EDIT BELOW THIS LINE
								var d = document, s = d.createElement('script');
								s.src = 'https://1stculturetour-com.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
								})();
							</script>
						</div>
					</div>
					<br clear="all"/>
					<script> _get_each_tourist_destination_page('<?php echo $page_id?>');</script>
				</div>
				
				<div class="right-div sticky-div">
					<div class="inner-div">
						<h4>RELATED TOURIST DESTINATION</h4>

							<div class="fetch" id="fetch_related_pages">
								<script> _get_related_pages('all_tourist_destination');</script>
							</div>

						<a href="<?php echo $website_url ?>/tourism-products/tourist-destination/" title="Tourist Destination">
                        <button class="btn" title="Tourism Products">VIEW ALL TOURIST DESTINATION </button></a>
					</div>
				</div>
				<br clear="all"/>
			</div>
		</div>
    </section>
</section>
<br clear="all"/>

<section class="footer">
	<?php include '../../../footer.php'?>
</section>

<?php include '../../../bottom-scripts.php'?>

</body>
</html>


