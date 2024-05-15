


<?php if ($page=='tourism_attraction_seo_page_details'){?>
    
    <div class="page-creation-panel">
        <div class="title-div">
            <div class="div-in"><i class="bi-newspaper"></i> <span id="page_title_info"></span>  DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
        </div>
        
        <div class="grid-div page-side-div">
            <div class="img-div" id="page_details_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="Tourism Products"></div>
            <div class="text-div">
                <h2 id="page_details_title">Xxxx Xxxx</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span id="page_details_date">Xxxx Xxxx</span> </div>
                    <div class="text"><span id="views_count">0</span> VIEWS</div>
                </div>
                <br>
            </div>
        </div>


        <div class="page-content-div">

            <div class="menu-div">
                <li class="active-li" id="page_content" onclick="_get_page_content('tourism_attraction_page_content_details','page_content', '<?php echo $ids?>')">PAGE CONTENT </li>
                <li id="page_pictures" onclick="_get_page_content('tourism_attraction_page_pix','page_pictures','<?php echo $ids?>')" class="">UPLOAD PICTURES</li>
                <li id="page_videos" onclick="_get_page_content('page_videos','page_videos','<?php echo $ids?>')" class="">UPLOAD VIDEOS</li>
            </div>
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div">
                                <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select> -->
                                
                                <div class="title">TOURISM ATTRACTION TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="TOURISM ATTRACTION TITLE" title="TOURISM ATTRACTION TITLE">

                                <div class="title">TOURISM ATTRACTION SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="TOURISM ATTRACTION SUMMARY" title="TOURISM ATTRACTION SUMMARY"></textarea>

                                <div class="title">TOURISM ATTRACTION URL <span>*</span></div>
                                <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g tourism-attraction-url" title="TOURISM ATTRACTION URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select>  -->
                        
                            </div>
                            <label>
                                <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                                <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>        
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#tourism_products_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_tourism_attraction_api','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?>




<?php if ($page=='tourism_attraction_page_content_details'){?>
    <div id="get_page_details">
        <div class="page-form-div">
                <div class="page-title">SEO CONTENT</div>
                <div class="form-div">
                    <div class="form-input-div">
                        <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                        <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                            <option value=""> SELECT BLOG CATEGORY</option>
                            <script>_get_cat('cat_id');</script>
                        </select> -->
                        
                       
                        <div class="title">TOURISM ATTRACTION TITLE <span><em>(Not more than 60 words)</em></span></div>
                        <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="TOURISM ATTRACTION TITLE" title="TOURISM ATTRACTION TITLE">

                        <div class="title">TOURISM ATTRACTION SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                        <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="TOURISM ATTRACTION SUMMARY" title="TOURISM ATTRACTION SUMMARY"></textarea>

                        <div class="title">TOURISM ATTRACTION URL <span>*</span></div>
                        <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g tourism-attraction-url" title="TOURISM ATTRACTION URL">
                    
                        <div class="title">SEO KEYWORDS <span>*</span></div>
                        <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                                
                        <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                        <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                            <option value="" selected="selected"> SELECT STATUS</option>
                            <script>_get_select_status('reg_status_id','1,2');</script>
                        </select>  -->
                    
                    </div>
                    <label>
                        <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                        <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                    </label>
                </div>
            </div>

                <div class="page-form-div">
                    <div class="page-title">FULL PAGE CONTENT</div>
                    <div class="form-div">
                    <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({selector:'#tourism_products_detail', 
                            plugins: "link, image, table"});
                        </script>
                    </div>
                    <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                </div>
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if ($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_tourism_attraction_api','<?php echo $ids?>');</script>
    <?php }?>
<?php }?>





<?php if ($page=='tourism_attraction_page_pix'){?>
    <div id="get_page_details">
        <div class="page-form-div">
            <div class="page-title">UPLOAD MORE PICTURES</div>
                <div class="form-div">
                
                    <div id="pix-preview-div"></div>

                    <label>
                        <div class="picture-div">
                            <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            <input type="file"  id="more_page_pix" name="more_page_pix[]" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" multiple  onchange="_preview_more_page_pix('<?php echo $page?>','tourism_attraction_other_pix_api','<?php echo $ids?>');" style="display:none;"/>
                        </div>
                    </label>
                </div>
        </div>
    </div>
    <script>_fetch_tourism_products_other_pix('<?php echo $page?>','fetch_tourism_attraction_other_pix_api','<?php echo $ids?>')</script>
<?php }?>




<!-- --------------------------------------------------------------------------------------------- -->





<?php if ($page=='tourism_destination_seo_page_details'){?>
    
    <div class="page-creation-panel">
        <div class="title-div">
            <div class="div-in"><i class="bi-newspaper"></i> <span id="page_title_info"></span>  DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
        </div>
        
        <div class="grid-div page-side-div">
            <div class="img-div" id="page_details_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="Tourism Products"></div>
            <div class="text-div">
                <h2 id="page_details_title">Xxxx Xxxx</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span id="page_details_date">Xxxx Xxxx</span> </div>
                    <div class="text"><span id="views_count">0</span> VIEWS</div>
                </div>
                <br>
            </div>
        </div>


        <div class="page-content-div">

            <div class="menu-div">
                <li class="active-li" id="page_content" onclick="_get_page_content('tourism_destination_page_content_details','page_content', '<?php echo $ids?>')">PAGE CONTENT </li>
                <li id="page_pictures" onclick="_get_page_content('tourism_destination_page_pix','page_pictures','<?php echo $ids?>')" class="">UPLOAD PICTURES</li>
                <li id="page_videos" onclick="_get_page_content('page_videos','page_videos','<?php echo $ids?>')" class="">UPLOAD VIDEOS</li>
            </div>
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div">
                                <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select> -->
                                
                                <div class="title">TOURIST DESTINATION TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="TOURIST DESTINATION TITLE" title="TOURIST DESTINATION TITLE">

                                <div class="title">TOURIST DESTINATION SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="TOURIST DESTINATION SUMMARY" title="TOURIST DESTINATION SUMMARY"></textarea>

                                <div class="title">TOURIST DESTINATION URL <span>*</span></div>
                                <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g tourist-destination-url" title="TOURIST DESTINATION URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select>  -->
                        
                            </div>
                            <label>
                                <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                                <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>        
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#tourism_products_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_tourism_destination_api','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?>




<?php if ($page=='tourism_destination_page_content_details'){?>
    <div id="get_page_details">
        <div class="page-form-div">
                <div class="page-title">SEO CONTENT</div>
                <div class="form-div">
                    <div class="form-input-div">
                        <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                        <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                            <option value=""> SELECT BLOG CATEGORY</option>
                            <script>_get_cat('cat_id');</script>
                        </select> -->
                        
                       
                        <div class="title">TOURIST DESTINATION TITLE <span><em>(Not more than 60 words)</em></span></div>
                        <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="TOURIST DESTINATION TITLE" title="TOURIST DESTINATION TITLE">

                        <div class="title">TOURIST DESTINATION SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                        <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="TOURIST DESTINATION SUMMARY" title="TOURIST DESTINATION SUMMARY"></textarea>

                        <div class="title">TOURIST DESTINATION URL <span>*</span></div>
                        <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g tourist-destination-url" title="TOURIST DESTINATION URL">
                    
                        <div class="title">SEO KEYWORDS <span>*</span></div>
                        <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                                
                        <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                        <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                            <option value="" selected="selected"> SELECT STATUS</option>
                            <script>_get_select_status('reg_status_id','1,2');</script>
                        </select>  -->
                    
                    </div>
                    <label>
                        <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                        <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                    </label>
                </div>
            </div>

                <div class="page-form-div">
                    <div class="page-title">FULL PAGE CONTENT</div>
                    <div class="form-div">
                    <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({selector:'#tourism_products_detail', 
                            plugins: "link, image, table"});
                        </script>
                    </div>
                    <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                </div>
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if ($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_tourism_destination_api','<?php echo $ids?>');</script>
    <?php }?>
<?php }?>







<?php if ($page=='tourism_destination_page_pix'){?>
    <div id="get_page_details">
        <div class="page-form-div">
            <div class="page-title">UPLOAD MORE PICTURES</div>
                <div class="form-div">
                
                    <div id="pix-preview-div"></div>

                    <label>
                        <div class="picture-div">
                            <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            <input type="file"  id="more_page_pix" name="more_page_pix[]" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" multiple  onchange="_preview_more_page_pix('<?php echo $page?>','tourism_destination_other_pix_api','<?php echo $ids?>');" style="display:none;"/>
                        </div>
                    </label>
                </div>
        </div>
    </div>
    <script>_fetch_tourism_products_other_pix('<?php echo $page?>','fetch_tourism_destination_other_pix_api','<?php echo $ids?>')</script>
<?php }?>







<!-- --------------------------------------------------------------------------------------------- -->





<?php if ($page=='event_seo_page_details'){?>
    
    <div class="page-creation-panel">
        <div class="title-div">
            <div class="div-in"><i class="bi-newspaper"></i> <span id="page_title_info"></span>  DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
        </div>
        
        <div class="grid-div page-side-div">
            <div class="img-div" id="page_details_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="Tourism Products"></div>
            <div class="text-div">
                <h2 id="page_details_title">Xxxx Xxxx</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span id="page_details_date">Xxxx Xxxx</span> </div>
                    <div class="text"><span id="views_count">0</span> VIEWS</div>
                </div>
                <br>
            </div>
        </div>


        <div class="page-content-div">

            <div class="menu-div">
                <li class="active-li" id="page_content" onclick="_get_page_content('event_page_content_details','page_content', '<?php echo $ids?>')">PAGE CONTENT </li>
                <li id="page_pictures" onclick="_get_page_content('event_page_pix','page_pictures','<?php echo $ids?>')" class="">UPLOAD PICTURES</li>
                <li id="page_videos" onclick="_get_page_content('page_videos','page_videos','<?php echo $ids?>')" class="">UPLOAD VIDEOS</li>
            </div>
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div">
                                <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select> -->
                                
                                <div class="title">EVENT TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="EVENT TITLE" title="EVENT TITLE">

                                <div class="title">EVENT SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="EVENT SUMMARY" title="EVENT SUMMARY"></textarea>

                                <div class="title">EVENT URL <span>*</span></div>
                                <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g event-url" title="EVENT URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select>  -->
                        
                            </div>
                            <label>
                                <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                                <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>        
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#tourism_products_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_event_api','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?>




<?php if ($page=='event_page_content_details'){?>
    <div id="get_page_details">
        <div class="page-form-div">
                <div class="page-title">SEO CONTENT</div>
                <div class="form-div">
                    <div class="form-input-div">
                        <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                        <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                            <option value=""> SELECT BLOG CATEGORY</option>
                            <script>_get_cat('cat_id');</script>
                        </select> -->
                        
                       
                        <div class="title">EVENT TITLE <span><em>(Not more than 60 words)</em></span></div>
                        <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="EVENT TITLE" title="EVENT TITLE">

                        <div class="title">EVENT SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                        <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="EVENT SUMMARY" title="EVENT SUMMARY"></textarea>

                        <div class="title">EVENT URL <span>*</span></div>
                        <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g event-url" title="EVENT URL">
                    
                        <div class="title">SEO KEYWORDS <span>*</span></div>
                        <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                                
                        <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                        <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                            <option value="" selected="selected"> SELECT STATUS</option>
                            <script>_get_select_status('reg_status_id','1,2');</script>
                        </select>  -->
                    
                    </div>
                    <label>
                        <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Event Picture"  /></div>
                        <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                    </label>
                </div>
            </div>

                <div class="page-form-div">
                    <div class="page-title">FULL PAGE CONTENT</div>
                    <div class="form-div">
                    <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({selector:'#tourism_products_detail', 
                            plugins: "link, image, table"});
                        </script>
                    </div>
                    <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                </div>
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if ($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_event_api','<?php echo $ids?>');</script>
    <?php }?>
<?php }?>







<?php if ($page=='event_page_pix'){?>
    <div id="get_page_details">
        <div class="page-form-div">
            <div class="page-title">UPLOAD MORE PICTURES</div>
                <div class="form-div">
                
                    <div id="pix-preview-div"></div>

                    <label>
                        <div class="picture-div">
                            <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            <input type="file"  id="more_page_pix" name="more_page_pix[]" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" multiple  onchange="_preview_more_page_pix('<?php echo $page?>','event_other_pix_api','<?php echo $ids?>');" style="display:none;"/>
                        </div>
                    </label>
                </div>
        </div>
    </div>
    <script>_fetch_tourism_products_other_pix('<?php echo $page?>','fetch_event_other_pix_api','<?php echo $ids?>')</script>
<?php }?>






<!-- ----------------------------------------------------------------------------------------------- -->





<?php if ($page=='entertainment_seo_page_details'){?>
    
    <div class="page-creation-panel">
        <div class="title-div">
            <div class="div-in"><i class="bi-newspaper"></i> <span id="page_title_info"></span>  DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
        </div>
        
        <div class="grid-div page-side-div">
            <div class="img-div" id="page_details_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="Tourism Products"></div>
            <div class="text-div">
                <h2 id="page_details_title">Xxxx Xxxx</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span id="page_details_date">Xxxx Xxxx</span> </div>
                    <div class="text"><span id="views_count">0</span> VIEWS</div>
                </div>
                <br>
            </div>
        </div>


        <div class="page-content-div">

            <div class="menu-div">
                <li class="active-li" id="page_content" onclick="_get_page_content('entertainment_page_content_details','page_content', '<?php echo $ids?>')">PAGE CONTENT </li>
                <li id="page_pictures" onclick="_get_page_content('entertainment_page_pix','page_pictures','<?php echo $ids?>')" class="">UPLOAD PICTURES</li>
                <li id="page_videos" onclick="_get_page_content('page_videos','page_videos','<?php echo $ids?>')" class="">UPLOAD VIDEOS</li>
            </div>
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div">
                                <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select> -->
                                
                                <div class="title">ENTERTAINMENT TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="ENTERTAINMENT TITLE" title="ENTERTAINMENT TITLE">

                                <div class="title">ENTERTAINMENT SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="ENTERTAINMENT SUMMARY" title="ENTERTAINMENT SUMMARY"></textarea>

                                <div class="title">ENTERTAINMENT URL <span>*</span></div>
                                <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g entertainment-url" title="ENTERTAINMENT URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select>  -->
                        
                            </div>
                            <label>
                                <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                                <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>        
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#tourism_products_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_entertainment_api','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?>




<?php if ($page=='entertainment_page_content_details'){?>
    <div id="get_page_details">
        <div class="page-form-div">
                <div class="page-title">SEO CONTENT</div>
                <div class="form-div">
                    <div class="form-input-div">
                        <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                        <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                            <option value=""> SELECT BLOG CATEGORY</option>
                            <script>_get_cat('cat_id');</script>
                        </select> -->
                        
                       
                        <div class="title">ENTERTAINMENT TITLE <span><em>(Not more than 60 words)</em></span></div>
                        <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="ENTERTAINMENT TITLE" title="ENTERTAINMENT TITLE">

                        <div class="title">ENTERTAINMENT SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                        <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="ENTERTAINMENT SUMMARY" title="ENTERTAINMENT SUMMARY"></textarea>

                        <div class="title">ENTERTAINMENT URL <span>*</span></div>
                        <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g entertainment-url" title="ENTERTAINMENT URL">
                    
                        <div class="title">SEO KEYWORDS <span>*</span></div>
                        <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                                
                        <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                        <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                            <option value="" selected="selected"> SELECT STATUS</option>
                            <script>_get_select_status('reg_status_id','1,2');</script>
                        </select>  -->
                    
                    </div>
                    <label>
                        <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Event Picture"  /></div>
                        <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                    </label>
                </div>
            </div>

                <div class="page-form-div">
                    <div class="page-title">FULL PAGE CONTENT</div>
                    <div class="form-div">
                    <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({selector:'#tourism_products_detail', 
                            plugins: "link, image, table"});
                        </script>
                    </div>
                    <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                </div>
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if ($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_entertainment_api','<?php echo $ids?>');</script>
    <?php }?>
<?php }?>







<?php if ($page=='entertainment_page_pix'){?>
    <div id="get_page_details">
        <div class="page-form-div">
            <div class="page-title">UPLOAD MORE PICTURES</div>
                <div class="form-div">
                
                    <div id="pix-preview-div"></div>

                    <label>
                        <div class="picture-div">
                            <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            <input type="file"  id="more_page_pix" name="more_page_pix[]" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" multiple  onchange="_preview_more_page_pix('<?php echo $page?>','entertainment_other_pix_api','<?php echo $ids?>');" style="display:none;"/>
                        </div>
                    </label>
                </div>
        </div>
    </div>
    <script>_fetch_tourism_products_other_pix('<?php echo $page?>','fetch_entertainment_other_pix_api','<?php echo $ids?>')</script>
<?php }?>










<!-- ----------------------------------------------------------------------------------------------- -->





<?php if ($page=='sport_seo_page_details'){?>
    
    <div class="page-creation-panel">
        <div class="title-div">
            <div class="div-in"><i class="bi-newspaper"></i> <span id="page_title_info"></span>  DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
        </div>
        
        <div class="grid-div page-side-div">
            <div class="img-div" id="page_details_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="Tourism Products"></div>
            <div class="text-div">
                <h2 id="page_details_title">Xxxx Xxxx</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span id="page_details_date">Xxxx Xxxx</span> </div>
                    <div class="text"><span id="views_count">0</span> VIEWS</div>
                </div>
                <br>
            </div>
        </div>


        <div class="page-content-div">

            <div class="menu-div">
                <li class="active-li" id="page_content" onclick="_get_page_content('sport_page_content_details','page_content', '<?php echo $ids?>')">PAGE CONTENT </li>
                <li id="page_pictures" onclick="_get_page_content('sport_page_pix','page_pictures','<?php echo $ids?>')" class="">UPLOAD PICTURES</li>
                <li id="page_videos" onclick="_get_page_content('page_videos','page_videos','<?php echo $ids?>')" class="">UPLOAD VIDEOS</li>
            </div>
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div">
                                <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select> -->
                                
                                <div class="title">SPORT TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="SPORT TITLE" title="SPORT TITLE">

                                <div class="title">SPORT SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="SPORT SUMMARY" title="SPORT SUMMARY"></textarea>

                                <div class="title">SPORT URL <span>*</span></div>
                                <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g sport-url" title="SPORT URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select>  -->
                        
                            </div>
                            <label>
                                <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                                <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>        
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#tourism_products_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_sport_api','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?>




<?php if ($page=='sport_page_content_details'){?>
    <div id="get_page_details">
        <div class="page-form-div">
                <div class="page-title">SEO CONTENT</div>
                <div class="form-div">
                    <div class="form-input-div">
                        <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                        <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                            <option value=""> SELECT BLOG CATEGORY</option>
                            <script>_get_cat('cat_id');</script>
                        </select> -->
                        
                       
                        <div class="title">SPORT TITLE <span><em>(Not more than 60 words)</em></span></div>
                        <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="SPORT TITLE" title="SPORT TITLE">

                        <div class="title">SPORT SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                        <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="SPORT SUMMARY" title="SPORT SUMMARY"></textarea>

                        <div class="title">SPORT URL <span>*</span></div>
                        <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g sport-url" title="SPORT URL">
                    
                        <div class="title">SEO KEYWORDS <span>*</span></div>
                        <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                                
                        <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                        <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                            <option value="" selected="selected"> SELECT STATUS</option>
                            <script>_get_select_status('reg_status_id','1,2');</script>
                        </select>  -->
                    
                    </div>
                    <label>
                        <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Event Picture"  /></div>
                        <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                    </label>
                </div>
            </div>

                <div class="page-form-div">
                    <div class="page-title">FULL PAGE CONTENT</div>
                    <div class="form-div">
                    <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({selector:'#tourism_products_detail', 
                            plugins: "link, image, table"});
                        </script>
                    </div>
                    <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                </div>
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if ($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_sport_api','<?php echo $ids?>');</script>
    <?php }?>
<?php }?>







<?php if ($page=='sport_page_pix'){?>
    <div id="get_page_details">
        <div class="page-form-div">
            <div class="page-title">UPLOAD MORE PICTURES</div>
                <div class="form-div">
                
                    <div id="pix-preview-div"></div>

                    <label>
                        <div class="picture-div">
                            <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            <input type="file"  id="more_page_pix" name="more_page_pix[]" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" multiple  onchange="_preview_more_page_pix('<?php echo $page?>','sport_other_pix_api','<?php echo $ids?>');" style="display:none;"/>
                        </div>
                    </label>
                </div>
        </div>
    </div>
    <script>_fetch_tourism_products_other_pix('<?php echo $page?>','fetch_sport_other_pix_api','<?php echo $ids?>')</script>
<?php }?>

















<?php if ($page=='culture_seo_page_details'){?>
    
    <div class="page-creation-panel">
        <div class="title-div">
            <div class="div-in"><i class="bi-newspaper"></i> <span id="page_title_info"></span>  DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
        </div>
        
        <div class="grid-div page-side-div">
            <div class="img-div" id="page_details_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="Tourism Products"></div>
            <div class="text-div">
                <h2 id="page_details_title">Xxxx Xxxx</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span id="page_details_date">Xxxx Xxxx</span> </div>
                    <div class="text"><span id="views_count">0</span> VIEWS</div>
                </div>
                <br>
            </div>
        </div>


        <div class="page-content-div">

            <div class="menu-div">
                <li class="active-li" id="page_content" onclick="_get_page_content('culture_page_content_details','page_content', '<?php echo $ids?>')">PAGE CONTENT </li>
                <li id="page_pictures" onclick="_get_page_content('culture_page_pix','page_pictures','<?php echo $ids?>')" class="">UPLOAD PICTURES</li>
                <li id="page_videos" onclick="_get_page_content('page_videos','page_videos','<?php echo $ids?>')" class="">UPLOAD VIDEOS</li>
            </div>
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div">
                                <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select> -->
                                
                                <div class="title">CULTURE TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="CULTURE TITLE" title="CULTURE TITLE">

                                <div class="title">CULTURE SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="CULTURE SUMMARY" title="CULTURE SUMMARY"></textarea>

                                <div class="title">CULTURE URL <span>*</span></div>
                                <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g culture-url" title="CULTURE URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select>  -->
                        
                            </div>
                            <label>
                                <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                                <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>        
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#tourism_products_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_culture_api','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?>




<?php if ($page=='culture_page_content_details'){?>
    <div id="get_page_details">
        <div class="page-form-div">
                <div class="page-title">SEO CONTENT</div>
                <div class="form-div">
                    <div class="form-input-div">
                        <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                        <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                            <option value=""> SELECT BLOG CATEGORY</option>
                            <script>_get_cat('cat_id');</script>
                        </select> -->
                        
                       
                        <div class="title">CULTURE TITLE <span><em>(Not more than 60 words)</em></span></div>
                        <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="CULTURE TITLE" title="CULTURE TITLE">

                        <div class="title">CULTURE SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                        <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="CULTURE SUMMARY" title="CULTURE SUMMARY"></textarea>

                        <div class="title">CULTURE URL <span>*</span></div>
                        <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g culture-url" title="CULTURE URL">
                    
                        <div class="title">SEO KEYWORDS <span>*</span></div>
                        <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                                
                        <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                        <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                            <option value="" selected="selected"> SELECT STATUS</option>
                            <script>_get_select_status('reg_status_id','1,2');</script>
                        </select>  -->
                    
                    </div>
                    <label>
                        <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Event Picture"  /></div>
                        <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                    </label>
                </div>
            </div>

                <div class="page-form-div">
                    <div class="page-title">FULL PAGE CONTENT</div>
                    <div class="form-div">
                    <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({selector:'#tourism_products_detail', 
                            plugins: "link, image, table"});
                        </script>
                    </div>
                    <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                </div>
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if ($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_culture_api','<?php echo $ids?>');</script>
    <?php }?>
<?php }?>







<?php if ($page=='culture_page_pix'){?>
    <div id="get_page_details">
        <div class="page-form-div">
            <div class="page-title">UPLOAD MORE PICTURES</div>
                <div class="form-div">
                
                    <div id="pix-preview-div"></div>

                    <label>
                        <div class="picture-div">
                            <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            <input type="file"  id="more_page_pix" name="more_page_pix[]" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" multiple  onchange="_preview_more_page_pix('<?php echo $page?>','culture_other_pix_api','<?php echo $ids?>');" style="display:none;"/>
                        </div>
                    </label>
                </div>
        </div>
    </div>
    <script>_fetch_tourism_products_other_pix('<?php echo $page?>','fetch_culture_other_pix_api','<?php echo $ids?>')</script>
<?php }?>










<?php if ($page=='tradition_seo_page_details'){?>
    
    <div class="page-creation-panel">
        <div class="title-div">
            <div class="div-in"><i class="bi-newspaper"></i> <span id="page_title_info"></span>  DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
        </div>
        
        <div class="grid-div page-side-div">
            <div class="img-div" id="page_details_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="Tourism Products"></div>
            <div class="text-div">
                <h2 id="page_details_title">Xxxx Xxxx</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span id="page_details_date">Xxxx Xxxx</span> </div>
                    <div class="text"><span id="views_count">0</span> VIEWS</div>
                </div>
                <br>
            </div>
        </div>


        <div class="page-content-div">

            <div class="menu-div">
                <li class="active-li" id="page_content" onclick="_get_page_content('tradition_page_content_details','page_content', '<?php echo $ids?>')">PAGE CONTENT </li>
                <li id="page_pictures" onclick="_get_page_content('tradition_page_pix','page_pictures','<?php echo $ids?>')" class="">UPLOAD PICTURES</li>
                <li id="page_videos" onclick="_get_page_content('page_videos','page_videos','<?php echo $ids?>')" class="">UPLOAD VIDEOS</li>
            </div>
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div">
                                <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select> -->
                                
                                <div class="title">TRADITION TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="TRADITION TITLE" title="TRADITION TITLE">

                                <div class="title">TRADITION SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="TRADITION SUMMARY" title="TRADITION SUMMARY"></textarea>

                                <div class="title">TRADITION URL <span>*</span></div>
                                <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g tradition-url" title="TRADITION URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select>  -->
                        
                            </div>
                            <label>
                                <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                                <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>        
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#tourism_products_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_tradition_api','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?>




<?php if ($page=='tradition_page_content_details'){?>
    <div id="get_page_details">
        <div class="page-form-div">
                <div class="page-title">SEO CONTENT</div>
                <div class="form-div">
                    <div class="form-input-div">
                        <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                        <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                            <option value=""> SELECT BLOG CATEGORY</option>
                            <script>_get_cat('cat_id');</script>
                        </select> -->
                        
                       
                        <div class="title">TRADITION TITLE <span><em>(Not more than 60 words)</em></span></div>
                        <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="TRADITION TITLE" title="TRADITION TITLE">

                        <div class="title">TRADITION SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                        <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="TRADITION SUMMARY" title="TRADITION SUMMARY"></textarea>

                        <div class="title">TRADITION URL <span>*</span></div>
                        <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g tradition-url" title="TRADITION URL">
                    
                        <div class="title">SEO KEYWORDS <span>*</span></div>
                        <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                                
                        <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                        <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                            <option value="" selected="selected"> SELECT STATUS</option>
                            <script>_get_select_status('reg_status_id','1,2');</script>
                        </select>  -->
                    
                    </div>
                    <label>
                        <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Event Picture"  /></div>
                        <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                    </label>
                </div>
            </div>

                <div class="page-form-div">
                    <div class="page-title">FULL PAGE CONTENT</div>
                    <div class="form-div">
                    <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({selector:'#tourism_products_detail', 
                            plugins: "link, image, table"});
                        </script>
                    </div>
                    <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                </div>
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if ($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_tradition_api','<?php echo $ids?>');</script>
    <?php }?>
<?php }?>







<?php if ($page=='tradition_page_pix'){?>
    <div id="get_page_details">
        <div class="page-form-div">
            <div class="page-title">UPLOAD MORE PICTURES</div>
                <div class="form-div">
                
                    <div id="pix-preview-div"></div>

                    <label>
                        <div class="picture-div">
                            <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            <input type="file"  id="more_page_pix" name="more_page_pix[]" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" multiple  onchange="_preview_more_page_pix('<?php echo $page?>','tradition_other_pix_api','<?php echo $ids?>');" style="display:none;"/>
                        </div>
                    </label>
                </div>
        </div>
    </div>
    <script>_fetch_tourism_products_other_pix('<?php echo $page?>','fetch_tradition_other_pix_api','<?php echo $ids?>')</script>
<?php }?>





















<?php if ($page=='natural_tourism_product_seo_page_details'){?>
    
    <div class="page-creation-panel">
        <div class="title-div">
            <div class="div-in"><i class="bi-newspaper"></i> <span id="page_title_info"></span>  DETAILS <button class="close-btn" onclick="_alert_close()"><i class="bi-x-lg"></i></button></div>
        </div>
        
        <div class="grid-div page-side-div">
            <div class="img-div" id="page_details_pix"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default_pix.jpg" alt="Tourism Products"></div>
            <div class="text-div">
                <h2 id="page_details_title">Xxxx Xxxx</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span id="page_details_date">Xxxx Xxxx</span> </div>
                    <div class="text"><span id="views_count">0</span> VIEWS</div>
                </div>
                <br>
            </div>
        </div>


        <div class="page-content-div">

            <div class="menu-div">
                <li class="active-li" id="page_content" onclick="_get_page_content('natural_tourism_product_page_content_details','page_content', '<?php echo $ids?>')">PAGE CONTENT </li>
                <li id="page_pictures" onclick="_get_page_content('natural_tourism_product_page_pix','page_pictures','<?php echo $ids?>')" class="">UPLOAD PICTURES</li>
                <li id="page_videos" onclick="_get_page_content('page_videos','page_videos','<?php echo $ids?>')" class="">UPLOAD VIDEOS</li>
            </div>
           
            <div class="page-form-back-div sb-container" >
                <div id="get_page_details">

                    <div class="page-form-div" >
                        <div class="page-title">SEO CONTENT</div>
                        <div class="form-div">
                            <div class="form-input-div">
                                <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                                <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                                    <option value=""> SELECT BLOG CATEGORY</option>
                                    <script>_get_cat('cat_id');</script>
                                </select> -->
                                
                                <div class="title">NATURAL TOURISM PRODUCT TITLE <span><em>(Not more than 60 words)</em></span></div>
                                <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="NATURAL TOURISM PRODUCT TITLE" title="NATURAL TOURISM PRODUCT TITLE">

                                <div class="title">NATURAL TOURISM PRODUCT SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                                <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="NATURAL TOURISM PRODUCT SUMMARY" title="NATURAL TOURISM PRODUCT SUMMARY"></textarea>

                                <div class="title">NATURAL TOURISM PRODUCT URL <span>*</span></div>
                                <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g natural-tourism-product-url" title="NATURAL TOURISM PRODUCT URL">
                            
                                <div class="title">SEO KEYWORDS <span>*</span></div>
                                <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                            
                                <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                                <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                                    <option value="" selected="selected"> SELECT STATUS</option>
                                    <script>_get_select_status('reg_status_id','1,2');</script>
                                </select>  -->
                        
                            </div>
                            <label>
                                <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Tourism Picture"  /></div>
                                <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                            </label>        
                    
                        </div>
                    </div>
            
                    <div class="page-form-div">
                        <div class="page-title">FULL PAGE CONTENT</div>
                        <div class="form-div">
                            <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({selector:'#tourism_products_detail', 
                                plugins: "link, image, table"});
                            </script>
                            <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        </div>
                        <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_natural_tourism_product_api','<?php echo $ids?>');</script>
    <?php }?>
<?php } ?>




<?php if ($page=='natural_tourism_product_page_content_details'){?>
    <div id="get_page_details">
        <div class="page-form-div">
                <div class="page-title">SEO CONTENT</div>
                <div class="form-div">
                    <div class="form-input-div">
                        <!-- <div class="title">TOURISM ATTRACTION CATEGORY: <span>*</span></div>
                        <select id="cat_id" class="text_field select_field" title="SELECT FAQ's CATEGORY">
                            <option value=""> SELECT BLOG CATEGORY</option>
                            <script>_get_cat('cat_id');</script>
                        </select> -->
                        
                       
                        <div class="title">NATURAL TOURISM PRODUCT TITLE <span><em>(Not more than 60 words)</em></span></div>
                        <input id="tourism_products_title" type="text" maxlength="60" class="text_field" placeholder="NATURAL TOURISM PRODUCT TITLE" title="NATURAL TOURISM PRODUCT TITLE">

                        <div class="title">NATURAL TOURISM PRODUCT SUMMARY <span><em>(Not more than 167 words)</em></span></div>
                        <textarea id="tourism_products_summary" class="text_field" maxlength="167" placeholder="NATURAL TOURISM PRODUCT SUMMARY" title="NATURAL TOURISM PRODUCT SUMMARY"></textarea>

                        <div class="title">NATURAL TOURISM PRODUCT URL <span>*</span></div>
                        <input id="tourism_products_url" type="text" class="text_field" placeholder="e.g natural-tourism-product-url" title="NATURAL TOURISM PRODUCT URL">
                    
                        <div class="title">SEO KEYWORDS <span>*</span></div>
                        <textarea id="seo_keywords" class="text_field" placeholder="SEO Keywords" title="SEO KEYWORDS"></textarea>
                                
                        <!-- <div class="title">SELECT STATUS: <span>*</span></div>
                        <select id="tourism_products_status_id" class="text_field select_field" title="SELECT STATUS">
                            <option value="" selected="selected"> SELECT STATUS</option>
                            <script>_get_select_status('reg_status_id','1,2');</script>
                        </select>  -->
                    
                    </div>
                    <label>
                        <div class="pix-div" id="seo_pix"><img id="tourism_products_pics" src="<?php echo $website_url?>/uploaded_files/default_pix/sample.jpg" alt="Event Picture"  /></div>
                        <input type="file" id="view_seo_pix" style="display:none" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP" onchange="publish_pix.UpdatePreview(this);"/>
                    </label>
                </div>
            </div>

                <div class="page-form-div">
                    <div class="page-title">FULL PAGE CONTENT</div>
                    <div class="form-div">
                    <textarea style="width: 100%;" rows="25" id="tourism_products_detail" title="TYPE FULL PAGE CONTENT HERE" placeholder="TYPE FULL PAGE CONTENT HERE"></textarea>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({selector:'#tourism_products_detail', 
                            plugins: "link, image, table"});
                        </script>
                    </div>
                    <button class="btn" id="submit_btn" onclick="_update_tourism_products_seo_page_content('<?php echo $page?>','<?php echo $ids?>');"><i class="bi-save-fill"></i> SAVE</button><br clear="all"><br clear="all">
                </div>
        </div>
    </div>
    <script> _upload_publish_pix('tourism_products_pics'); </script>
    <?php if ($ids!=''){?>
            <script>_get_tourism_products_form_page_details('<?php echo $page?>','fetch_natural_tourism_product_api','<?php echo $ids?>');</script>
    <?php }?>
<?php }?>







<?php if ($page=='natural_tourism_product_page_pix'){?>
    <div id="get_page_details">
        <div class="page-form-div">
            <div class="page-title">UPLOAD MORE PICTURES</div>
                <div class="form-div">
                
                    <div id="pix-preview-div"></div>

                    <label>
                        <div class="picture-div">
                            <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            <input type="file"  id="more_page_pix" name="more_page_pix[]" accept=".jpg,.png,.jpeg,.PNG,.JPG,.JPEG,.webp,.WEBP,.SVG,.svg,.AVIF,.avif,.BMP,.bmp" multiple  onchange="_preview_more_page_pix('<?php echo $page?>','natural_tourism_product_other_pix_api','<?php echo $ids?>');" style="display:none;"/>
                        </div>
                    </label>
                </div>
        </div>
    </div>
<script>_fetch_tourism_products_other_pix('<?php echo $page?>','fetch_natural_tourism_product_other_pix_api','<?php echo $ids?>')</script>
<?php }?>
























<?php if ($page=='tourism_product_video_form'){ ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="fly-title-div">
            <div class="in">
                <?php if($ids1==''){?>
                    <span id="panel-title"><i class="bi-camera-reels"></i> ADD NEW VIDEO</span>
                <?php  }else{?>
                <span id="panel-title"><i class="bi-camera-reels"></i> UPDATE VIDEO</span>
                <?php }?>
                <div class="close" title="Close" onclick="_alert_secondary_close();">X</div>
            </div>
        </div>

        <div class="container-back-div sb-container">
            <div class="inner-div">
                <?php if ($ids1==''){?>
                    <div class="alert">Kindly fill the form below to add new Video</div>
                <?php  }else{?>
                    <div class="alert">Kindly fill the form below to update Video</div>
                <?php }?>

                <div class="title"> VIDEO TITLE: <span>*</span></div>
                <input id="video_title" type="text" class="text_field" placeholder="Type Video Title Here..." maxlength="70" title="Type Video Title Here" />
                
                <div class="title"> VIDEO EMBED URL: <span>*</span></div>
                <textarea id="video_url" class="text_field text_area" placeholder="Paste URL here" title="VIDEO EMBED CODE" rows="4"  onkeyup="_fetch_youtube_video()"></textarea>
                
                <div class="alert alert-success" style="display:none" id="fetch_video"><div class="fetch_video"></div></div>


                <div class="title">SELECT STATUS: <span>*</span></div>
                <select id="reg_status_id" class="text_field select_field"  title="SELECT STATUS">
                    <option value="" selected="selected"> SELECT STATUS</option>
                    <script>_get_select_status('reg_status_id','1,2');</script>
                    </select> 

                <button class="action-btn" type="button" title="SUBMIT" id="update_btn" onclick="_add_and_update_tourism_product_videos('<?php echo $ids?>','<?php echo $ids1?>');"> <i class="bi-check"></i> <?php if($ids1==''){?> SUBMIT  <?php }else{?>  UPDATE <?php }?> </button>
            </div>
        </div> 
    </div>


    
    <?php if($ids1!=''){ ?>
       <script>_get_fetch_tourism_products_videos('<?php echo $page?>','<?php echo $ids?>', '<?php echo $ids1?>')</script>
    <?php }?>
<?php } ?>











<?php if ($page=='page_videos'){?>
    <div id="get_page_details">

        <div class="page-form-div">
            <div class="page-title">VIDEO LIST</div>
                <!-- .......................................... -->
                <div class="search-div video-page-search-div" data-aos="fade-in" data-aos-duration="700">
                    <select id="status_id" class="text_field select" onchange="_get_fetch_tourism_products_videos('<?php echo $page?>','<?php echo $ids?>', '')">
                        <option value=""> SELECT STATUS</option>
                        <script>_get_select_status('status_id','1,2');</script>
                    </select>
                    <!--------------------------------all search select------------------------->
                    <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','<?php echo $ids?>')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
                </div>

                <div class="form-div">
                    <div class="video-back-div">

                        <div id="video-preview-div"></div>

                            <!-- <div class="picture-div video-div">
                                <iframe  width="250" height="150" src="https://youtube.com/embed/gEO3jMbcKJs" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <button class="edit-btn" type="button">Edit Video</button>
                            </div>  -->
                            <div class="picture-div select-video-div" style="margin-left:20px;" onClick="_get_form_secondary_with_id('tourism_product_video_form','<?php echo $ids?>','')">
                                <div class="more-pix-div"><img src="<?php echo $website_url?>/uploaded_files/default_pix/default.png"></div>
                            </div>
                    </div>
                    
                </div>
        </div>
    </div>
    <script>_get_fetch_tourism_products_videos('<?php echo $page?>','<?php echo $ids?>', '')</script>
    <script> 
        var search_content =['Type here to search...', 'Video Title e.g This is First Heritage Culture'];
        _placeholder(search_txt,search_content);
    </script>
<?php }?>




















<script type="text/javascript" src="js/scrollBar.js"></script>
<script type="text/javascript">$(".sb-container").scrollBox();</script>