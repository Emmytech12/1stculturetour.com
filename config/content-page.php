<!-- Fetch all tourism product -->

<?php if($page=='all_tourist_attracton_images'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_tourist_attraction_gallery">
            <script> _get_tourist_attraction_gallery();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_tradition_images'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_tradition_gallery">
            <script> _get_tradition_gallery();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_event_images'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_event_gallery">
            <script> _get_event_gallery();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_culture_images'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_culture_gallery">
            <script> _get_culture_gallery();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_sport_images'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_sport_gallery">
            <script> _get_sport_gallery();</script>
        </div>			 
    </div>
<?php }?>


<?php if($page=='all_entertainment_images'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_entertainment_gallery">
            <script> _get_entertainment_gallery();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_natural_tourism'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_natural_tourism_products">
            <script> _get_natural_tourism_products_gallery();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_tourist_destinations'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_tourist_destination">
            <script> _get_tourist_destination_gallery();</script>
        </div>		 	 
    </div>
<?php }?>








  <!-- Fetch all images in each of the tourism product -->

<?php if($page=='tourist-attraction-images'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in">
            <div class="main-preview" id="preview-image">
                <img src="" alt="tourist-attraction-images"/>
                <script> _get_fetch_each_tourist_attraction_gallery_pix('<?php echo $ids?>');</script>
            </div>

            <div class="thumbnail-list">
                <div class="fetch" id="fetch_gallery_preview_div">
                    <script> _fetch_tourism_products_gallery_pix('<?php echo $ids?>','tourist-attraction-gallery');</script>
                </div>	
                <!-- <div class="each-img" id="image_2" onclick="_view_gallery_preview_img(event,'image_2')">
                    <img src="<?php //echo $website_url?>/all-images/body-pix/olumo2.jpg" alt="Olumo"/>
                </div>  -->
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='tradition-images'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in">
            <div class="main-preview" id="preview-image">
                <img src="" alt="tradition-images"/>
                <script> _get_fetch_each_tradition_gallery_pix('<?php echo $ids?>');</script>
            </div>

            <div class="thumbnail-list">
                <div class="fetch" id="fetch_gallery_preview_div">
                    <script> _fetch_tourism_products_gallery_pix('<?php echo $ids?>','tradition-gallery');</script>
                </div>	
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='entertainment-images'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in">
            <div class="main-preview" id="preview-image">
                <img src="" alt="entertainment-images"/>
                <script> _get_fetch_each_entertainment_gallery_pix('<?php echo $ids?>');</script>
            </div>

            <div class="thumbnail-list">
                <div class="fetch" id="fetch_gallery_preview_div">
                    <script> _fetch_tourism_products_gallery_pix('<?php echo $ids?>','entertainment-gallery');</script>
                </div>	
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='event-images'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in">
            <div class="main-preview" id="preview-image">
                <img src="" alt="event-images"/>
                <script> _get_fetch_each_event_gallery_pix('<?php echo $ids?>');</script>
            </div>

            <div class="thumbnail-list">
                <div class="fetch" id="fetch_gallery_preview_div">
                    <script> _fetch_tourism_products_gallery_pix('<?php echo $ids?>','event-gallery');</script>
                </div>	
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='culture-images'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in">
            <div class="main-preview" id="preview-image">
                <img src="" alt="culture-images"/>
                <script> _get_fetch_each_culture_gallery_pix('<?php echo $ids?>');</script>
            </div>

            <div class="thumbnail-list">
                <div class="fetch" id="fetch_gallery_preview_div">
                    <script> _fetch_tourism_products_gallery_pix('<?php echo $ids?>','culture-gallery');</script>
                </div>	
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='sport-images'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in">
            <div class="main-preview" id="preview-image">
                <img src="" alt="sport-images"/>
                <script> _get_fetch_each_sport_gallery_pix('<?php echo $ids?>');</script>
            </div>

            <div class="thumbnail-list">
                <div class="fetch" id="fetch_gallery_preview_div">
                    <script> _fetch_tourism_products_gallery_pix('<?php echo $ids?>','sport-gallery');</script>
                </div>	
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='natural-tourism-products-images'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in">
            <div class="main-preview" id="preview-image">
                <img src="" alt="natural-tourism-products-images"/>
                <script> _get_fetch_each_natural_tourism_products_gallery_pix('<?php echo $ids?>');</script>
            </div>

            <div class="thumbnail-list">
                <div class="fetch" id="fetch_gallery_preview_div">
                    <script> _fetch_tourism_products_gallery_pix('<?php echo $ids?>','natural-tourism-products-gallery');</script>
                </div>	
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='tourist-destination-images'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in">
            <div class="main-preview" id="preview-image">
                <img src="" alt="tourist-destination-images"/>
                <script> _get_fetch_each_tourist_destination_gallery_pix('<?php echo $ids?>');</script>
            </div>

            <div class="thumbnail-list">
                <div class="fetch" id="fetch_gallery_preview_div">
                    <script> _fetch_tourism_products_gallery_pix('<?php echo $ids?>','tourist-destination-gallery');</script>
                </div>	
            </div>
        </div>
    </div>
<?php }?>









<!-- // Fetch all tourism products videos // -->
<?php if($page=='all_tourist_attracton_videos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_tourist_attraction_videos">
            <script> _get_tourist_attraction_videos();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_tradition_videos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_tradition_videos">
            <script> _get_tradition_videos();</script>
        </div>	 
    </div>
<?php }?>

<?php if($page=='all_event_videos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_event_videos">
            <script> _get_event_videos();</script>
        </div>	 
    </div>
<?php }?>


<?php if($page=='all_event_videos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_event_videos">
            <script> _get_event_videos();</script>
        </div>	 
    </div>
<?php }?>


<?php if($page=='all_culture_videos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_culture_videos">
            <script> _get_culture_videos();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_sport_videos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_sport_videos">
            <script> _get_sport_videos();</script>
        </div>			 
    </div>
<?php }?>


<?php if($page=='all_entertainment_videos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_entertainment_videos">
            <script> _get_entertainment_videos();</script>
        </div>		 
    </div>
<?php }?>

<?php if($page=='all_natural_tour_products_videos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_natural_tourism_products_videos">
            <script> _get_natural_tourism_products_videos();</script>
        </div>			 
    </div>
<?php }?>

<?php if($page=='all_tourist_destinations_vedeos'){?>
    <div class="main-gallery-div-in">
        <div class="fetch" id="fetch_all_tourist_destination_videos">
            <script> _get_tourist_destination_videos();</script>
        </div>			 
    </div>
<?php }?>




  <!-- Fetch each videos of the tourism product -->
<?php if($page=='tourist-attraction-videos'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in video-in">
            <div class="videos-back-div">
                <div class="inner-div">
                    <div class="fetch" id="video_preview_div">
                        <script> _get_fetch_tourism_products_videos('<?php echo $ids?>','<?php echo $video_id?>');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='tradition-videos'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in video-in">
            <div class="videos-back-div">
                <div class="inner-div">
                    <div class="fetch" id="video_preview_div">
                        <script> _get_fetch_tourism_products_videos('<?php echo $ids?>','<?php echo $video_id?>');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>   
<?php }?>

<?php if($page=='event-videos'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in video-in">
            <div class="videos-back-div">
                <div class="inner-div">
                    <div class="fetch" id="video_preview_div">
                        <script> _get_fetch_tourism_products_videos('<?php echo $ids?>','<?php echo $video_id?>');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>


<?php if($page=='culture-videos'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in video-in">
            <div class="videos-back-div">
                <div class="inner-div">
                    <div class="fetch" id="video_preview_div">
                        <script> _get_fetch_tourism_products_videos('<?php echo $ids?>','<?php echo $video_id?>');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>


<?php if($page=='sport-videos'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in video-in">
            <div class="videos-back-div">
                <div class="inner-div">
                    <div class="fetch" id="video_preview_div">
                        <script> _get_fetch_tourism_products_videos('<?php echo $ids?>','<?php echo $video_id?>');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>


<?php if($page=='entertainment-videos'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in video-in">
            <div class="videos-back-div">
                <div class="inner-div">
                    <div class="fetch" id="video_preview_div">
                        <script> _get_fetch_tourism_products_videos('<?php echo $ids?>','<?php echo $video_id?>');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>


<?php if($page=='natural-tourism-product-videos'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in video-in">
            <div class="videos-back-div">
                <div class="inner-div">
                    <div class="fetch" id="video_preview_div">
                        <script> _get_fetch_tourism_products_videos('<?php echo $ids?>','<?php echo $video_id?>');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='tourist-destination-videos'){?>
    <div class="preview-content animated fadeInUp">
        <div class="gallery-in video-in">
            <div class="videos-back-div">
                <div class="inner-div">
                    <div class="fetch" id="video_preview_div">
                        <script> _get_fetch_tourism_products_videos('<?php echo $ids?>','<?php echo $video_id?>');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
