<?php include '../../config/config.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../../meta.php'?>
<title><?php echo $page_title?></title>
<meta name="keywords" content="<?php echo $page_seo_keywords?>" />
<meta name="description" content="<?php echo $page_seo_description?>"/>

<meta property="og:title" content="<?php echo $page_title?>"/>
<meta property="og:image" content="<?php echo $website_url?>/uploaded_files/blog_pix/<?php echo $page_seo_pix?>"/>
<meta property="og:description" content="<?php echo $page_seo_description?>"/>

<meta name="twitter:title" content="<?php echo $page_title?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website_url?>/uploaded_files/blog_pix/<?php echo $page_seo_pix?>"/> 
<meta name="twitter:description" content="<?php echo $page_seo_description?>"/>
</head>
<body>

<section class="header">
	<?php include '../../header.php'?>
</section>

<div class="other-pages-title" data-aos="fade-down" data-aos-duration="1000">
	<div class="inner-div">
        <div class="content main-pg-cont" data-aos="zoom-in" data-aos-duration="1200">
            <div class="top-title-div">
                <div class="div-in">
					<ul>
						<a href="<?php echo $website_url?>"><li>Home <i class="bi-caret-right-fill"></i></li></a>
						<a href="<?php echo $website_url?>/blog"><li>Blog <i class="bi-caret-right-fill"></i></li></a>
						<a href="<?php echo $website_url?>/blog"><li id="li_blog_title"> </li></a>
					</ul>
                </div>			
            </div>

			<h1 class="border"><span id="blog_title"></span></h1>	
			<div class="count"><i class="bi-person"></i> By: <span id="fullname"></span> | <i class="bi-calendar3"></i> DATE: <span id="formattedDate"></span> | <i class="bi-eye"></i> VIEWS: <span id="blog_views">  </span> </div>
			<p id="blog_summary"></p>
        </div> 
    </div>
</div> 


<section class="other-pages-content-div">
	<section class="body-div">
		<div class="body-div-in">
			<div class="gen-content-back-detail main-pg-top-div">
				<div class="left-div">
					<div class="main-back-img-div">	
						<div class="main-img-div">
							<div id="view_blog_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="blog"/></div>
						</div>		
					</div>

					<div class="main-content-div">
						<div class="content-txt" id="blog_detail"></div>

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
					<script> _get_fetch_each_blog('<?php echo $blog_id?>');</script>
				</div>
				
				<div class="right-div sticky-div">
					<div class="inner-div">
						
						<p>RELATED BLOG</p>

						<div class="fetch" id="fetch_related_blog">
                    		<script> _get_fetch_related_blog();</script>
                		</div>
						<!-- <div class="content-div" data-aos="fade-in" data-aos-duration="1200">
							<div class="image-div">
								<img src="<?php //echo $website_url?>/all-images/body-pix/blog3.jpg" alt="blog"/> 
							</div>
							<div class="image-div text-div">
								<a href="<?php //echo $website_url ?>/#" title="">
								<h4>College Seminar “Leadership & Works”</h4></a>
								 <span>July 10 | No Comments</span>
							</div>
						</div> -->
					</div>				
				</div>
                <br clear="all" />
			</div>
		</div>
    </section>
</section>
<br clear="all"/>

<section class="footer">
	<?php include '../../footer.php'?>
</section>

<?php include '../../bottom-scripts.php'?>

</body>
</html>


