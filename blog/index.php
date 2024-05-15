<?php include '../config/config.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../meta.php'?>
<title> Latest Insight | <?php echo $thename?></title>
<meta name="keywords" content="<?php echo $thename?>, SSCE Online Classes, WAEC Online Classes, NECO Online Classes, NABTEB Online Classes, GCE Online Classes, Online education, Virtual learning, Remote learning, Digital classrooms, Online courses, E-learning, Distance education, Web-based classes, Internet-based learning, Continuous online education, LMS, Learning Management System" />
<meta name="description" content="Access high-quality education from anywhere, at any time. Explore a wide range of subjects and courses delivered through virtual platforms on SSCE, GCE, NABTEB Exams and more."/>

<meta property="og:title" content="Embrace Learning Anytime with <?php echo $thename?> | SSCE, UTME" />
<meta property="og:image" content="<?php echo $website_url?>/all-images/plugin-pix/alwaysonlineclasses.jpg"/>
<meta property="og:description" content="Access high-quality education from anywhere, at any time. Explore a wide range of subjects and courses delivered through virtual platforms on SSCE, GCE, NABTEB Exams and more."/>

<meta name="twitter:title" content="Embrace Learning Anytime with <?php echo $thename?> | SSCE, UTME"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website_url?>/all-images/plugin-pix/alwaysonlineclasses.jpg"/> 
<meta name="twitter:description" content="Access high-quality education from anywhere, at any time. Explore a wide range of subjects and courses delivered through virtual platforms on SSCE, GCE, NABTEB Exams and more."/>
</head>
<body>
<?php include '../header.php'?>

<div class="other-pages-title blog-other-pages-title" data-aos="fade-down" data-aos-duration="1200">
	<div class="inner-div">
        <div class="content faq-content" data-aos="zoom-in" data-aos-duration="1200">
            <div class="top-title-div">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url?>"><li>Home <i class="bi-caret-right-fill"></i></li></a>
                        <a href="<?php echo $website_url?>/blog"><li> Blogs & Articles </li></a>				
                    </ul>
                </div>			
            </div>

    		<h1 class="border"><span>Blogs & Articles</span></h1>	
        </div>
    </div>
</div> 

<section class="other-pages-content-div">

    <section class="body-div">
		<div class="body-div-in">
			<div class="search-text-div blog-search" data-aos="zoom-in" data-aos-duration="800">
                <div class="search-segment-div">
                    <select id="cat_id" onchange=" _get_fetch_blog();" class="text_field">
                        <option value="" selected="selected">All Blog Categories</option>	
                        <script>_get_cat('cat_id');</script>	
                    </select>     
                </div>
            
                <div class="search-segment-div">
                    <input id="search_txt" onkeyup=" _get_fetch_blog();" class="text_field" placeholder="Type Here To Search..." title="Type to Search Here">
                </div>  
            </div>
            <br clear="all"/>
	
			<div class="blog-back-div">
				<div class="fetch" id="fetch_blog">
					<script> _get_fetch_blog();</script>
				</div>
					<!-- <div class="blog-div main-blog-div" data-aos="flip-right" data-aos-duration="1000">
						<div class="image-div">
							<img src="<?php //echo $website_url?>/all-images/body-pix/blog1.jpg" alt="blog"/>
						</div>

						<div class="text-div main-text-div">
							<a href="<?php //echo $website_url ?>/blog/family-safety-on-a-tour/" title="">
							<h3>Family Safety On A Tour</h3></a>
							<p>Group of people sharing their ideas and study a wide range of subjects and courses delivered through virtual platforms</p>
							<div class="count"><i class="bi-calendar3"></i> 02 July, 2023 <span>|</span> <i class="bi-eye-fill"></i> 0 VIEWS</div>
						</div>
					</div>   -->
			</div>
		</div>
    </section>
<br clear="all"/>

<section class="footer">
	<?php include '../footer.php'?>
</section>

<?php include '../bottom-scripts.php'?>
</body>
</html>


