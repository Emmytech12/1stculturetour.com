


<?php if ($page=='staff_reg'){ ?>
<div class="slide-form-div animated fadeInRight">
    <div class="fly-title-div">
        <div class="in">
            <span id="panel-title"><i class="bi-plus-square"></i> ADD NEW STAFF</span>
            <div class="close" title="Close" onclick="_alert_close();">X</div>
        </div>
     </div>

    <div class="container-back-div sb-container" >
         <div class="inner-div">

                <div class="alert">Kindly fill the form below to <span>ADD NEW STAFF</span></div>

                <div class="title">FULL NAME: <span>*</span></div>
                <input  id="reg_fullname" type="text" class="text_field" placeholder="FULL NAME" title="FULL NAME" />

                <div class="title">EMAIL ADDRESS: <span>*</span></div>
                <input id="reg_email" type="email" class="text_field" placeholder="EMAIL ADDRESS" title="EMAIL ADDRESS" />

                <div class="title">PHONE NUMBER: <span>*</span><div id="mobile_info" style="float:right;font-size:12px;display:none;color:#f00"><span>Mobile not accepted!</span></div></div>
                <input id="reg_mobile" type="tel" class="text_field" onkeypress="isNumber_Check()" placeholder="PHONE NUMBER" title="PHONE NUMBER"  />
               
                <div class="title">HOME ADDRESS: <span>*</span></div>
                <input id="reg_address" type="text" class="text_field" placeholder="HOME ADDRESS" title="HOME ADDRESS"  />

                <div class="title">SELECT ROLE: <span>*</span></div>
                <select id="reg_role_id" class="text_field select_field" title="SELECT ROLE">
                    <option value="" selected="selected">SELECT ROLE</option>
                    <option value="" selected="selected">SELECT ROLE</option>
                    <option value="" selected="selected">SELECT ROLE</option>
                    <?php if($login_role_id>2){?>
                        <script>_get_select_role('reg_role_id','1,2,3');</script>
                        <?php }else{?>
                        <script>_get_select_role('reg_role_id','1,2');</script>
                    <?php }?>
                </select>
            
                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field" title="SELECT STATUS">
                    <option value="" selected="selected">SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_reg_and_updt_staff('<?php echo $page?>', '');"> <i class="bi-check"></i> SUBMIT </button>
        </div>
    </div> 
</div>
<?php } ?>






<?php if ($page=='my_profile'){?>
        <?php include 'staff-profile.php';?>
        
<?php } ?>




<?php if ($page=='staff_profile'){?>
    <div class="overlay-off-div">
    <div class="user-profile-div animated fadeInUp">
        <div class="top-panel-div">
            <i class="bi-person"></i> ADMINISTRATIVE PROFILE</span>
            <?php if($page=='staff_profile'){?>
                <div class="close" title="Close" onclick="_alert_close_2();">X</div>
            <?php }else{?>
            <div class="close" title="Close" onclick="_alert_close();">X</div>
            <?php }?>
        </div>
        <div class="profile-content-div sb-container">

            <div class="bg-img">
                
                <div class="mini-profile">
                    <label>
                        <div class="img-div" id="current_user_passport1">
                            <img src="<?php echo $website_url;?>/uploaded_files/staff_pix/friends.png" id="passportimg4" alt="profile picture"/>                                
                        </div> 

                        <input type="file" id="passport"  style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="user_profile_pix.UpdatePreview(this);"/>
                    </label>

                    

                    <div class="text-div">
                        <div class="name" id="user_login_fullname"></div>
                        <div class="text">
                            STATUS: <strong id="user_status_name"> </strong> | LAST LOGIN DATE: <strong id="user_last_login_text"> </strong>
                        </div> 
                                     
                    </div>
                </div>
            </div>

            <div class="user-in">
                <div class="title">BASIC INFORMATION</div>
                        
                <div class="profile-segment-div col-3">
                    <div class="segment-title">FULLNAME:</div>
                    <div class="text-field-div no-border">
                        <input id="updt_fullname" type="text" class="text_field text_field2" placeholder="FULLNAME" title="FULLNAME"/>
                    </div>
                </div>


                <div class="profile-segment-div col-4">
                    <div class="segment-title">EMAIL:</div>
                    <div class="text-field-div no-border">
                        <input id="updt_email" type="text" class="text_field text_field2" placeholder="EMAIL" title="EMAIL"/>
                    </div>
                </div>

                <div class="profile-segment-div col-3">
                    <div class="segment-title">HOME ADDRESS:</div>
                    <div class="text-field-div no-border">
                        <input id="updt_address" type="text" class="text_field text_field2" placeholder="HOME ADDRESS" title="HOME ADDRESS"/>
                    </div>
                </div>

                

                <div class="profile-segment-div col-4"><div id="mobile_info" style="float:right;font-size:12px;display:none;color:#f00"><span>Mobile not accepted!</span></div>
                    <div class="segment-title">PHONE NUMBER:</div>
                    <div class="text-field-div no-border">
                        <input id="updt_mobile" type="text" onkeypress="isNumber_Check()" class="text_field text_field2" placeholder="PHONE NUMBER" title="PHONE NUMBER"/>
                    </div>
                </div>

            </div>
        
        
            <div class="user-in">
                <div class="title">ACCOUNT INFORMATION</div>
                
                <div class="profile-segment-div col-5">
                    <div class="segment-title">STAFF ID:</div>
                    <div class="text-field-div">
                        <input id="user_id" type="text" class="text_field" readonly="readonly" placeholder="STAFF ID" title="STAFF ID"/>
                        <span>&nbsp;<i class="bi-lock"></i></span>
                    </div>
                </div>


                <div class="profile-segment-div col-6">
                    <div class="segment-title">DATE OF REGISTRATION:</div>
                    <div class="text-field-div">
                        <input id="user_created_time" type="text" readonly="readonly" class="text_field" placeholder="Date Of Registration" title="Date Of Registration"/>
                        <span>&nbsp;<i class="bi-lock"></i></span>
                    </div>
                </div>

                
                <div class="profile-segment-div col-7">
                    <div class="segment-title">LAST LOGIN DATE:</div>
                    <div class="text-field-div">
                        <input id="user_last_login" type="text" class="text_field" readonly="readonly" placeholder="Last Login Date" title="Last Login Date" />
                        <span>&nbsp;<i class="bi-lock"></i></span>
                    </div>
                </div>
            </div>   


            <div class="user-in">
                <div class="title">ADMINISTRATIVE INFORMATION</div>
                <div class="profile-segment-div col-6">
                    <div class="segment-title">STAFF ROLE:</div>
                    <div class="text-field-div no-border">
                        <select class="text_field text_field2"  id="updt_role_id" style="background:#fff;">                                
                        <option value="" >SELECT ROLE </option>
                            <?php if($login_role_id>2){?>
                                <script>_get_select_role('updt_role_id','1,2,3');</script>
                            <?php }else{?>
                                <script>_get_select_role('updt_role_id','1,2');</script>
                            <?php }?>
                        </select>
                    </div>
                </div> 

                <div class="profile-segment-div col-7">
                    <div class="segment-title">STAFF STATUS:</div>
                    <div class="text-field-div no-border">
                        <select class="text_field text_field2" id="updt_status_id" style="background:#fff;" >                                                    
                            <option value="">SELECT STATUS </option>
                                <script>_get_select_status('updt_status_id','1,2');</script>
                        </select>
                    </div>
                </div>
                <button class="btn" type="button" id="update_btn" onclick="_reg_and_updt_staff('<?php echo $page?>', '<?php echo $ids?>');"> UPDATE PROFILE <i class="bi-check"></i></button>     
            </div> 
        </div>  
        
    </div> 
</div>
<script> _upload_user_pix('<?php echo $page?>','<?php echo $ids?>');</script>
<script> _get_user_login_details('<?php echo $page?>','<?php echo $ids?>');</script>

<?php } ?>








<?php if ($page=='tourism_attraction_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids==''){?>
                    <span id="panel-title"><i class="bi-pencil-square"></i> ADD NEW TOURISM ATTRACTION</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-pencil-square"></i> UPDATE TOURISM ATTRACTION</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids==''){?>
                    <div class="alert">Kindly fill the form below to add new Tourism Attraction</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Tourism Attraction</div>
                <?php }?>

                <div class="title">TOURISM ATTRACTION TITLE: <span>*</span></div>
                <input  id="reg_page_title" type="text" class="text_field" placeholder="TOURISM ATTRACTION TITLE" title="TOURISM ATTRACTION TITLE" />
                
                <div class="title">CLICK TO UPLOAD RELATED PICTURE: <span>*</span></div>
                <div class="img-back-div">
                    <label>
                        <div class="pix-div" title="CLICK TO UPLOAD RELATED PICTURE">
                            <div id="page_photo"><img id="tourism_products_pix" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Product Picture"/></div>
                            <input type="file" id="reg_page_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="publish_pix.UpdatePreview(this);" />
                            <!-- <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="blog_pics.UpdatePreview(this);"/> -->
                        </div>
                    </label> 
                </div>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_NoCat('<?php echo $page?>','<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <script> _upload_publish_pix('tourism_products_pix'); </script>
    <?php if($ids!=''){ ?>
      <script> _get_tourism_products_form_page_NoCat('<?php echo $page?>', '<?php echo $ids?>')</script> 
    <?php }?>
<?php } ?>









<?php if ($page=='tourism_destination_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids==''){?>
                    <span id="panel-title"><i class="bi-pencil-square"></i> ADD NEW TOURISM DESTINATION</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-pencil-square"></i> UPDATE TOURISM DESTINATION</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids==''){?>
                    <div class="alert">Kindly fill the form below to add new Tourism Destination</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Tourism Destination</div>
                <?php }?>

                <div class="title">TOURISM DESTINATION TITLE: <span>*</span></div>
                <input  id="reg_page_title" type="text" class="text_field" placeholder="TOURISM DESTINATION TITLE" title="TOURISM DESTINATION TITLE" />
                
                <div class="title">CLICK TO UPLOAD RELATED PICTURE: <span>*</span></div>
                <div class="img-back-div">
                    <label>
                        <div class="pix-div" title="CLICK TO UPLOAD RELATED PICTURE">
                            <div id="page_photo"><img id="tourism_products_pix" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Product Picture"/></div>
                            <input type="file" id="reg_page_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="publish_pix.UpdatePreview(this);" />
                            <!-- <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="blog_pics.UpdatePreview(this);"/> -->
                        </div>
                    </label> 
                </div>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_NoCat('<?php echo $page?>','<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <script> _upload_publish_pix('tourism_products_pix'); </script>
    <?php if($ids!=''){ ?>
      <script> _get_tourism_products_form_page_NoCat('<?php echo $page?>', '<?php echo $ids?>')</script> 
    <?php }?>
<?php } ?>












<?php if ($page=='event_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids==''){?>
                    <span id="panel-title"><i class="bi-calendar-event-fill"></i> ADD NEW EVENT</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-calendar-event-fill"></i> UPDATE EVENT</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids==''){?>
                    <div class="alert">Kindly fill the form below to add new Event</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Event</div>
                <?php }?>

                <div class="title">EVENT TITLE: <span>*</span></div>
                <input  id="reg_page_title" type="text" class="text_field" placeholder="EVENT TITLE" title="EVENT TITLE" />
                
                <div class="title">CLICK TO UPLOAD RELATED PICTURE: <span>*</span></div>
                <div class="img-back-div">
                    <label>
                        <div class="pix-div" title="CLICK TO UPLOAD RELATED PICTURE">
                            <div id="page_photo"><img id="tourism_products_pix" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Product Picture"/></div>
                            <input type="file" id="reg_page_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="publish_pix.UpdatePreview(this);" />
                            <!-- <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="blog_pics.UpdatePreview(this);"/> -->
                        </div>
                    </label> 
                </div>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_NoCat('<?php echo $page?>','<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <script> _upload_publish_pix('tourism_products_pix'); </script>
    <?php if($ids!=''){ ?>
      <script> _get_tourism_products_form_page_NoCat('<?php echo $page?>', '<?php echo $ids?>')</script> 
    <?php }?>
<?php } ?>













<?php if ($page=='entertainment_cat_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids==''){?>
                    <span id="panel-title"><i class="bi-suit-club-fill"></i> ADD ENTERTAINMENT CATEGORY</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-suit-club-fill"></i> UPDATE ENTERTAINMENT CATEGORY</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids==''){?>
                    <div class="alert">Kindly fill the form below to add new Entertainment Category</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Entertainment Category</div>
                <?php }?>

                <div class="title">CATEGORY NAME: <span>*</span></div>
                <input  id="tourism_products_cat_name" type="text" class="text_field" placeholder="ENTER CATEGORY NAME" title="CATEGORY NAME" />
                

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                </select> 

                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_category('<?php echo $page?>','<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <?php if($ids!=''){ ?>
      <script> _get_fetch_category_details('<?php echo $page?>', '<?php echo $ids?>')</script> 
    <?php }?>
<?php } ?>






<?php if ($page=='entertainment_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids1==''){?>
                    <span id="panel-title"><i class="bi-calendar-event-fill"></i> ADD NEW ENTERTAINMENT</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-calendar-event-fill"></i> UPDATE ENTERTAINMENT</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids1==''){?>
                    <div class="alert">Kindly fill the form below to add new Entertainment under <span id="category_name"></span></div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Entertainment under <span id="category_name"></span></div>
                <?php }?>

                <div class="title">ENTERTAINMENT TITLE: <span>*</span></div>
                <input  id="reg_page_title" type="text" class="text_field" placeholder="ENTERTAINMENT TITLE" title="ENTERTAINMENT TITLE" />
                
                <div class="title">CLICK TO UPLOAD RELATED PICTURE: <span>*</span></div>
                <div class="img-back-div">
                    <label>
                        <div class="pix-div" title="CLICK TO UPLOAD RELATED PICTURE">
                            <div id="page_photo"><img id="tourism_products_pix" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Product Picture"/></div>
                            <input type="file" id="reg_page_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="publish_pix.UpdatePreview(this);" />
                            <!-- <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="blog_pics.UpdatePreview(this);"/> -->
                        </div>
                    </label> 
                </div>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_WithCat('<?php echo $page?>','<?php echo $ids?>','<?php echo $ids1?>');"> <i class="bi-check"></i>  <?php if($ids1==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <script> _upload_publish_pix('tourism_products_pix'); </script>
    <?php if($ids1!=''){ ?>
      <script> _get_tourism_products_form_page_WithCat('<?php echo $page?>', '<?php echo $ids?>', '<?php echo $ids1?>')</script> 
    <?php }?>
    <script> _get_tourism_products_form_page_sub_title('<?php echo $page?>', '<?php echo $ids?>', '')</script> 
<?php } ?>












<?php if ($page=='sport_cat_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids==''){?>
                    <span id="panel-title"><i class="bi-suit-club-fill"></i> ADD SPORT CATEGORY</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-suit-club-fill"></i> UPDATE SPORT CATEGORY</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids==''){?>
                    <div class="alert">Kindly fill the form below to add new Sport Category</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Sport Category</div>
                <?php }?>

                <div class="title">CATEGORY NAME: <span>*</span></div>
                <input  id="tourism_products_cat_name" type="text" class="text_field" placeholder="ENTER CATEGORY NAME" title="CATEGORY NAME" />
                

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                </select> 
                
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_category('<?php echo $page?>','<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <?php if($ids!=''){ ?>
      <script> _get_fetch_category_details('<?php echo $page?>', '<?php echo $ids?>')</script> 
    <?php }?>
<?php } ?>









<?php if ($page=='sport_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids1==''){?>
                    <span id="panel-title"><i class="bi-bicycle"></i> ADD NEW SPORT</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-bicycle"></i> UPDATE SPORT</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids1==''){?>
                    <div class="alert">Kindly fill the form below to add new Sport under <span id="category_name"></span></div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Sport under <span id="category_name"></span></div>
                <?php }?>

                <div class="title">SPORT TITLE: <span>*</span></div>
                <input  id="reg_page_title" type="text" class="text_field" placeholder="SPORT TITLE" title="SPORT TITLE" />
                
                <div class="title">CLICK TO UPLOAD RELATED PICTURE: <span>*</span></div>
                <div class="img-back-div">
                    <label>
                        <div class="pix-div" title="CLICK TO UPLOAD RELATED PICTURE">
                            <div id="page_photo"><img id="tourism_products_pix" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Product Picture"/></div>
                            <input type="file" id="reg_page_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="publish_pix.UpdatePreview(this);" />
                            <!-- <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="blog_pics.UpdatePreview(this);"/> -->
                        </div>
                    </label> 
                </div>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_WithCat('<?php echo $page?>','<?php echo $ids?>','<?php echo $ids1?>');"> <i class="bi-check"></i>  <?php if($ids1==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <script> _upload_publish_pix('tourism_products_pix'); </script>
    <?php if($ids1!=''){ ?>
      <script> _get_tourism_products_form_page_WithCat('<?php echo $page?>', '<?php echo $ids?>', '<?php echo $ids1?>')</script> 
    <?php }?>
    <script> _get_tourism_products_form_page_sub_title('<?php echo $page?>', '<?php echo $ids?>', '')</script> 
<?php } ?>











<?php if ($page=='culture_cat_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids==''){?>
                    <span id="panel-title"><i class="bi-person-heart"></i> ADD CULTURE CATEGORY</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-person-heartl"></i> UPDATE CULTURE CATEGORY</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids==''){?>
                    <div class="alert">Kindly fill the form below to add new Culture Category</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Culture Category</div>
                <?php }?>

                <div class="title">CATEGORY NAME: <span>*</span></div>
                <input  id="tourism_products_cat_name" type="text" class="text_field" placeholder="ENTER CATEGORY NAME" title="CATEGORY NAME" />
                

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                </select> 
                
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_category('<?php echo $page?>','<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <?php if($ids!=''){ ?>
      <script> _get_fetch_category_details('<?php echo $page?>', '<?php echo $ids?>')</script> 
    <?php }?>
<?php } ?>









<?php if ($page=='culture_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids1==''){?>
                    <span id="panel-title"><i class="bi-person-heart"></i> ADD NEW CULTURE</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-person-heart"></i> UPDATE CULTURE</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids1==''){?>
                    <div class="alert">Kindly fill the form below to add new Culture under <span id="category_name"></span></div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Culture under <span id="category_name"></span></div>
                <?php }?>

                <div class="title">CULTURE TITLE: <span>*</span></div>
                <input  id="reg_page_title" type="text" class="text_field" placeholder="CULTURE TITLE" title="CULTURE TITLE" />
                
                <div class="title">CLICK TO UPLOAD RELATED PICTURE: <span>*</span></div>
                <div class="img-back-div">
                    <label>
                        <div class="pix-div" title="CLICK TO UPLOAD RELATED PICTURE">
                            <div id="page_photo"><img id="tourism_products_pix" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Product Picture"/></div>
                            <input type="file" id="reg_page_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="publish_pix.UpdatePreview(this);" />
                            <!-- <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="blog_pics.UpdatePreview(this);"/> -->
                        </div>
                    </label> 
                </div>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_WithCat('<?php echo $page?>','<?php echo $ids?>','<?php echo $ids1?>');"> <i class="bi-check"></i>  <?php if($ids1==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <script> _upload_publish_pix('tourism_products_pix'); </script>
    <?php if($ids1!=''){ ?>
      <script> _get_tourism_products_form_page_WithCat('<?php echo $page?>', '<?php echo $ids?>', '<?php echo $ids1?>')</script> 
    <?php }?>
    <script> _get_tourism_products_form_page_sub_title('<?php echo $page?>', '<?php echo $ids?>', '')</script> 
<?php } ?>


















<?php if ($page=='tradition_cat_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids==''){?>
                    <span id="panel-title"><i class="bi-badge-tm-fill"></i> ADD TRADITION CATEGORY</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-badge-tm-fill"></i> UPDATE TRADITION CATEGORY</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids==''){?>
                    <div class="alert">Kindly fill the form below to add new Tradition Category</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Tradition Category</div>
                <?php }?>

                <div class="title">CATEGORY NAME: <span>*</span></div>
                <input  id="tourism_products_cat_name" type="text" class="text_field" placeholder="ENTER CATEGORY NAME" title="CATEGORY NAME" />
                

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                </select> 
                
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_category('<?php echo $page?>','<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <?php if($ids!=''){ ?>
      <script> _get_fetch_category_details('<?php echo $page?>', '<?php echo $ids?>')</script> 
    <?php }?>
<?php } ?>









<?php if ($page=='tradition_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids1==''){?>
                    <span id="panel-title"><i class="bi-badge-tm-fill"></i> ADD NEW TRADITION</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-badge-tm-fill"></i> UPDATE TRADITION</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids1==''){?>
                    <div class="alert">Kindly fill the form below to add new Tradition under <span id="category_name"></span></div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Tradition under <span id="category_name"></span></div>
                <?php }?>

                <div class="title">TRADITION TITLE: <span>*</span></div>
                <input  id="reg_page_title" type="text" class="text_field" placeholder="TRADITION TITLE" title="TRADITION TITLE" />
                
                <div class="title">CLICK TO UPLOAD RELATED PICTURE: <span>*</span></div>
                <div class="img-back-div">
                    <label>
                        <div class="pix-div" title="CLICK TO UPLOAD RELATED PICTURE">
                            <div id="page_photo"><img id="tourism_products_pix" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Product Picture"/></div>
                            <input type="file" id="reg_page_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="publish_pix.UpdatePreview(this);" />
                            <!-- <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="blog_pics.UpdatePreview(this);"/> -->
                        </div>
                    </label> 
                </div>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_WithCat('<?php echo $page?>','<?php echo $ids?>','<?php echo $ids1?>');"> <i class="bi-check"></i>  <?php if($ids1==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <script> _upload_publish_pix('tourism_products_pix'); </script>
    <?php if($ids1!=''){ ?>
      <script> _get_tourism_products_form_page_WithCat('<?php echo $page?>', '<?php echo $ids?>', '<?php echo $ids1?>')</script> 
    <?php }?>
    <script> _get_tourism_products_form_page_sub_title('<?php echo $page?>', '<?php echo $ids?>', '')</script> 
<?php } ?>



















<?php if ($page=='natural_tourism_product_cat_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids==''){?>
                    <span id="panel-title"><i class="bi-badge-tm-fill"></i> ADD NATURAL TOURISM PRODUCT CATEGORY</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-badge-tm-fill"></i> UPDATE NATURAL TOURISM PRODUCT CATEGORY</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids==''){?>
                    <div class="alert">Kindly fill the form below to add new Natural Toursim Product Category</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Natural Toursim Product Category</div>
                <?php }?>

                <div class="title">CATEGORY NAME: <span>*</span></div>
                <input  id="tourism_products_cat_name" type="text" class="text_field" placeholder="ENTER CATEGORY NAME" title="CATEGORY NAME" />
                

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                </select> 
                
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_category('<?php echo $page?>','<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <?php if($ids!=''){ ?>
      <script> _get_fetch_category_details('<?php echo $page?>', '<?php echo $ids?>')</script> 
    <?php }?>
<?php } ?>









<?php if ($page=='natural_tourism_product_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids1==''){?>
                    <span id="panel-title"><i class="bi-badge-tm-fill"></i> ADD NATURAL TOURISM PRODUCT</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-badge-tm-fill"></i> UPDATE NATURAL TOURISM PRODUCT</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids1==''){?>
                    <div class="alert">Kindly fill the form below to add new Natural Toursim Product under <span id="category_name"></span></div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Natural Toursim Product under <span id="category_name"></span></div>
                <?php }?>

                <div class="title">NATURAL TOURISM PRODUCT TITLE: <span>*</span></div>
                <input  id="reg_page_title" type="text" class="text_field" placeholder="NATURAL TOURISM PRODUCT TITLE" title="NATURAL TOURISM PRODUCT TITLE" />
                
                <div class="title">CLICK TO UPLOAD RELATED PICTURE: <span>*</span></div>
                <div class="img-back-div">
                    <label>
                        <div class="pix-div" title="CLICK TO UPLOAD RELATED PICTURE">
                            <div id="page_photo"><img id="tourism_products_pix" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Product Picture"/></div>
                            <input type="file" id="reg_page_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="publish_pix.UpdatePreview(this);" />
                            <!-- <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" onchange="blog_pics.UpdatePreview(this);"/> -->
                        </div>
                    </label> 
                </div>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 
                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_tourism_products_WithCat('<?php echo $page?>','<?php echo $ids?>','<?php echo $ids1?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>

    <script> _upload_publish_pix('tourism_products_pix'); </script>
    <?php if($ids1!=''){ ?>
      <script> _get_tourism_products_form_page_WithCat('<?php echo $page?>', '<?php echo $ids?>', '<?php echo $ids1?>')</script> 
    <?php }?>
    <script> _get_tourism_products_form_page_sub_title('<?php echo $page?>', '<?php echo $ids?>', '')</script> 
<?php } ?>














<?php if ($page=='blog_form'){?>
 
    <div class="page-creation-panel">
        <div class="title-div">
            <?php if($ids==''){?>
                <div class="div-in"><i class="bi-newspaper"></i> ADD NEW BLOG DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
            <?php }else{?>
                <div class="div-in"><i class="bi-newspaper"></i> UPDATE BLOG DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
            <?php }?>
        </div>
        
        <div class="page-content-div blog-detail-div">
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div blog-input-div">
                                <div class="title">BLOG CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select>
                                
                                <div class="title">BLOG TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="blog_title" type="text" maxlength="60" class="text_field" placeholder="BLOG TITLE" title="BLOG TITLE">

                                <div class="title">BLOG SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="blog_summary" class="text_field" maxlength="167" placeholder="Blog Summary" title="BLOG SUMMARY"></textarea>

                                <div class="title">BLOG URL <span>*</span></div>
                                <input id="blog_url" type="text" class="text_field" placeholder="blog-url" title="BLOG URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="reg_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select> 
                       
                            </div>
                            <label>
                                <div class="pix-div" id="view_blog_pix_view"><img id="blog_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Blog Pix"  /></div>
                                <input type="file" id="blog_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>         
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#blog_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="blog_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_add_and_update_blog('<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('blog_pics'); </script>
<?php if($ids!=''){?>
<script>_get_fetch_blog('<?php echo $page?>', '<?php echo $ids?>');</script>
<?php }?>
<?php } ?>












<?php if ($page=='faqs_form'){ ?>

    <div class="overlay-off-div">
        <div class="slide-form-div animated fadeInRight">
            <div class="fly-title-div">
                <div class="in">
                    <?php if($ids==''){?>
                        <span id="panel-title"><i class="bi-plus-square"></i> ADD NEW FAQ</span>
                    <?php  }else{?>
                        <span id="panel-title"><i class="bi-pencil-square"></i> UPDATE FAQ</span>
                    <?php }?>
                    <div class="close" title="Close" onclick="_alert_close();">X</div>
                </div>
            </div>


            <div class="container-back-div sb-container">
                <div class="inner-div">
                <?php if($ids==''){?>
                    <div class="alert">Kindly fill the form below to <span>ADD NEW FAQ</span></div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to <span>UPDATE FAQ</span></div>
                <?php }?>

                <div class="title">FAQ CATEGORY: <span>*</span></div>
                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                    <option value=""> SELECT FAQ CATEGORY</option>
                    <script>_get_cat('cat_id');</script>
                </select>

                <div class="title">FAQ QUESTION: <span>*</span></div>
                <input id="faq_question" type="text" class="text_field" placeholder="Type Question Here" title="Question" title="FULL NAME"/>
                            
                <div class="title">FAQ ANSWER: <span>*</span></div>
                    <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                    <script>tinymce.init({selector:'#faq_answer',  // change this value according to your HTML
                        plugins: "link, image, table"
                        });
                    </script>
                    <textarea style="width:100%;" rows="20" id="faq_answer" title="Type Answer Here" placeholder="Type Answer Here"></textarea>

                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field" title="SELECT STATUS">
                        <option value="" selected="selected">SELECT STATUS</option>
                        <script>_get_select_status('reg_status_id','1,2');</script>
                </select> 

                <button class="action-btn" type="button" title="SUBMIT" id="submit_btn" onclick="_add_and_update_faqs('<?php echo $ids?>');"> <i class="bi-check"></i>  <?php if($ids==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
                
                </div>
            </div> 
        </div>
    </div>
    <?php if($ids!=''){?>
    <script>_get_fetch_faqs('<?php echo $page?>','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?> 








<?php if ($page=='app_settings'){ ?>
<div class="slide-form-div animated fadeInRight">
    <div class="fly-title-div">
        <div class="in">
        <span id="back_icon" style="display:none; cursor:pointer;" ><i class="bi-arrow-left" style="cursor:pointer;" onclick="_prev_page('account_settings_id');" ></i> &nbsp;&nbsp;</span>
        <span id="panel-title"><span id="header_icon"> <i class="bi-gear"></i> </span id="app_text"> APP SETTINGS</span>
            <div class="close" title="Close" onclick="_alert_close();">X</div>
        </div>
     </div>

    <div class="container-back-div sb-container" >
         <div class="inner-div">
            <div class="setting_detail" id="account_settings_id">   

                <div class="settings-div"  onclick="_next_page('account_detail','back_icon','account');">
                    <div class="div-in">
                        <div class="icon-div">
                           <i class="bi-bank" ></i> 
                        </div>
                        <div class="text-div">
                            <h4 id="account">ACCOUNT DETAILS</h4>
                            <span>Manage your account information</span>
                            <i class="bi-chevron-right"></i>
                        </div>
                    </div>
                </div>

                <div class="settings-div" onclick="_next_page('channge_password','back_icon','password');">
                    <div class="div-in">
                        <div class="icon-div">
                       <i class="bi-lock"></i>
                        </div>
                        <div class="text-div">
                            <h4 id="password">CHANGE PASSWORD</h4>
                            <span>Manage and change password</span>
                            <i class="bi-chevron-right"></i>
                        </div>
                    </div>
                </div>

            </div>


            <div class="setting_detail" id="account_detail">     
                <div class="alert alert-success"><span>SMTP DETAILS</span>
                    <div class="title"> SENDER NAME:</div>
                    <input id="sender_name" type="text" class="text_field" placeholder="SENDER NAME" title="SENDER NAME"/>
                    <div class="title"> SMTP HOST:</div>
                    <input id="smtp_host" type="text" class="text_field" placeholder="SMTP HOST" title="SMTP HOST"/>
                    <div class="title"> SMTP USERNAME:</div>
                    <input id="smtp_username" type="text" class="text_field" placeholder="SMTP USERNAME" title="SMTP USERNAME"/>
                    <div class="title"> SMTP PASSWORD:</div>
                    <input id="smtp_password" type="text" class="text_field" placeholder=" SMTP PASSWORD" title=" SMTP PASSWORD"/>
                    <div class="title"> SMTP PORT:</div>
                    <input id="smtp_port" type="text" class="text_field" placeholder="SMTP PORT" title="SMTP PORT"/>
                </div>
                <button class="action-btn" type="button" title="SUBMIT" id="update_btn" onclick="_update_backend_settings();"> <i class="bi-check"></i> UPDATE ACCOUNT </button>
            </div>




            <div class="setting_detail" id="channge_password">   
                 <div class="alert">Fill all fields to change your <span>PASSWORD</span>  </div>
                
                 <div class="title"> OLD PASSWORD: <span>*</span></div>
                    <div class="password-container">
                        <input id="old_password" type="password" onkeyup="_show_password_visibility('old_password','toggle_old_pass')" class="text_field" placeholder="OLD PASSWORD" title="OLD PASSWORD" />
                        <div id="toggle_old_pass"  onclick="_togglePasswordVisibility('old_password','toggle_old_pass')">
                           <i class="bi-eye-slash password-toggle"></i>
                        </div>
                    </div>
                    <div class="pswd_info"><em>At least 8 charaters required including upper & lower cases and special characters and numbers.</em></div>
                   
                    <div class="title"> NEW PASSWORD: <span>*</span></div>
                    <div class="password-container">
                        <input id="new_password" type="password" class="text_field" onkeyup="_show_password_visibility('new_password','toggle_new_pass')" placeholder="NEW PASSWORD" title="NEW PASSWORD" />
                        <div id="toggle_new_pass"  onclick="_togglePasswordVisibility('new_password','toggle_new_pass')">
                            <i class="bi-eye-slash password-toggle"></i>
                        </div>
                    </div>

                    <div class="title"> CONFIRMED PASSWORD: <span>*</span> <span id="message">Password Not Match!</span></div>
                    <div class="password-container">
                        <input id="comfirmed_password" type="password" onkeyup="_check_password_match('comfirmed_password','toggle_com_pass')" class="text_field" placeholder="CONFIRMED PASSWORD" title=" CONFIRMED PASSWORD" />
                        <div id="toggle_com_pass"  onclick="_togglePasswordVisibility('comfirmed_password','toggle_com_pass')">
                            <i class="bi-eye-slash password-toggle"></i>
                        </div>
                    </div>              
                    
                    <button class="action-btn" id="update_btn" type="button" style="float:left;" onclick="_update_password();" title="CHANGE PASSWORD"><i class="fa fa-exchange"></i> CHANGE PASSWORD</button>
                
            </div>

        </div>
    </div> 
</div>
<script> _get_fetch_setup_backend_settings();</script>
<?php } ?>



<?php if ($page=='access_key_validation_info'){?>
	<div class="caption-div caption-success-div animated zoomIn">
        <div class="div-in animated fadeInRight">
				<div class="img"><img src="<?php echo $website_url?>/admin/portal/all-images/images/warning.gif" /></div>
            <h2>INVALID ACCESS TOKEN</h2>
            Please LogIn Again
            <form method="post" action="config/code" name="logoutform">
                <input type="hidden" name="action" value="logout"/>
                <button class="btn" onclick="document.getElementById('logoutform').submit();"><i class="bi-check"></i> Okay, Log-In </button>
            </form>
        </div>
    </div>
<?php } ?>

<script type="text/javascript" src="js/scrollBar.js"></script>
<script type="text/javascript">$(".sb-container").scrollBox();</script>