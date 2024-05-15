<?php if ($page=='dashboard'){?>
    <div class="content-back-div" id="statistics-container">
<!-- 
        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>10</h4>
              <span>STAFF</span>
            </div>
            <div class="icon-div"><i class="bi-person-fill-add"></i></div>
          </div>
        </div>


        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>8</h4>
              <span>TOURISM PRODUCTS</span>
            </div>
            <div class="icon-div"><i class="bi-house-fill"></i></div>
          </div>
        </div>
        

        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>8</h4>
              <span>TOURISM ATTRACTION</span>
            </div>
            <div class="icon-div"><i class="bi-house-fill"></i></div>
          </div>
        </div>
       

        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>15</h4>
              <span>ENTERTAINMENT</span>
            </div>
            <div class="icon-div"><i class="bi-suit-club-fill"></i></div>
          </div>
        </div>

        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>20</h4>
              <span>SPORT</span>
            </div>
            <div class="icon-div"><i class="bi-bicycle"></i></div>
          </div>
        </div>

        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>20</h4>
              <span>CULTURE</span>
            </div>
            <div class="icon-div"><i class="bi-person-heart"></i></div>

          </div>
        </div>


        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>10</h4>
              <span>TRADITION</span>
            </div>
            <div class="icon-div"><i class="bi-badge-tm-fill"></i></div>
          </div>
        </div>
       


        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>40</h4>
              <span>NATURAL TOURISM PRODUCTS</span>
            </div>
            <div class="icon-div"><i class="bi-cup-straw"></i></div>
          </div>
        </div>


        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>40</h4>
              <span>TOURISM DESTIMNATION</span>
            </div>
            <div class="icon-div"><i class="bi-geo-alt-fill"></i></div>
          </div>
        </div>

        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>60</h4>
              <span>EVENT</span>
            </div>
            <div class="icon-div"><i class="bi-calendar-event-fill"></i></div>
          </div>
        </div>

        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>30</h4>
              <span>BLOG</span>
            </div>
            <div class="icon-div"><i class="bi-newspaper"></i></div>
          </div>
        </div>

        <div class="statistics-div">
          <div class="div-in">
            <div class="text-div">
              <h4>30</h4>
              <span>FAQ'S</span>
            </div>
            <div class="icon-div"><i class="bi-question-circle-fill"></i></div>
          </div>
        </div>
 --> 
<script>
    async function getStatisticsCountValue(total_active_active_staff_count,total_active_tourism_products_count,total_active_tourism_attraction_count,
		total_active_entertainment_count,total_active_sport_count,total_active_culture_count,total_active_tradition_count,
		total_active_natural_tourism_product_count,total_active_tourism_destination_count,total_active_event_count,
		total_active_blog_count,total_active_faq_count
		) {
      return [
        { value: total_active_active_staff_count, label: 'STAFF', iconClass: 'bi-person-fill-add', getPage: '_get_page(\'all_staffs\', \'all_staffs\', \'staff\', \'\', )' },
        { value: total_active_tourism_products_count, label: 'TOURISM PRODUCTS', iconClass: 'bi-house-fill' },
        { value: total_active_tourism_attraction_count, label: 'TOURISM ATTRACTION', iconClass: 'bi-house-fill',  getPage: '_get_page(\'all_tourism_attraction\', \'all_tourism_attraction\', \'publish\', \'\', )' },
        { value: total_active_entertainment_count, label: 'ENTERTAINMENT', iconClass: 'bi-suit-club-fill',getPage: '_get_page(\'all_entertainment\', \'all_entertainment\', \'publish\', \'\', )' },
        { value: total_active_sport_count, label: 'SPORT', iconClass: 'bi-bicycle',getPage: '_get_page(\'all_sport\', \'all_sport\', \'publish\', \'\', )' },
        { value: total_active_culture_count, label: 'CULTURE', iconClass: 'bi-person-heart',getPage: '_get_page(\'all_culture\', \'all_culture\', \'publish\', \'\', )' },
        { value: total_active_tradition_count, label: 'TRADITION', iconClass: 'bi-badge-tm-fill', getPage: '_get_page(\'all_tradition\', \'all_tradition\', \'publish\', \'\', )' },
        { value: total_active_natural_tourism_product_count, label: 'NATURAL TOURISM PRODUCTS', iconClass: 'bi-cup-straw', getPage: '_get_page(\'all_natural_tourism_product\', \'all_natural_tourism_product\', \'publish\', \'\', )' },
        { value: total_active_tourism_destination_count, label: 'TOURISM DESTINATION', iconClass: 'bi-geo-alt-fill', getPage: '_get_page(\'all_tourism_destination\', \'all_tourism_destination\', \'publish\', \'\', )' },
        { value: total_active_event_count, label: 'EVENT', iconClass: 'bi-calendar-event-fill',getPage: '_get_page(\'all_events\', \'all_events\', \'publish\', \'\', )' },
        { value: total_active_blog_count, label: 'BLOG', iconClass: 'bi-newspaper',getPage: '_get_page(\'all_blogs\', \'all_blogs\', \'publish\', \'\', )' },
        { value: total_active_faq_count, label: 'FAQ\'s', iconClass: 'bi-question-circle-fill',getPage: '_get_page(\'all_faqs\', \'all_faqs\', \'publish\', \'\', )' },
      ];
    }

  _get_dashboard_content();
  _get_user_login_details('','<?php echo $login_staff_id?>');

</script>
</div>
<?php }?>





<?php if ($page=='all_staffs'){?>
      <div class="search-div" data-aos="fade-in" data-aos-duration="700">
          <select id="status_id" class="text_field select" onchange="_get_fetch_all_staff('')">
          <option value=""> SELECT STATUS</option>
            <script>_get_select_status('status_id','1,2');</script>
          </select>
          <!--------------------------------all search select------------------------->
          <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
      </div>

        <div class="alert alert-success"> <span><i class="bi-people-fill"></i></span> ADMINISTRATOR'S LIST <button class="btn" onClick="_get_form('staff_reg')"><i class="bi-plus-square"></i> CREATE A NEW ADMIN</button></div>
        <div class="animated fadeIn" id="fetch_details">
                <script>_get_fetch_all_staff('')</script>
            <!-- <div class="user-div" onClick="_get_form_with_id('staff_profile','<?php //echo $users_id; ?>')" id="<?php //echo $users_id; ?>">
              <div class="pix-div"><img src="<?php //echo $website_url; ?>/uploaded_files/staff_pix/friends.png"/></div>
              <div class="detail">
                <div class="name-div"><div class="name"> Afolabi Abayomi</div><hr /><br/></div>
                <div class="text">ID: <span>STF0000</span></div>
                <div class="text"><span>090514054598</span></div>
                <div class="status-div ACTIVE">ACTIVE</div>
              </div>
                <br clear="all" />
            </div> -->

          
          <br clear="all" />
      </div>
      <script> 
        var search_content =['Type here to search...', 'eg Staff Name', 'Mobile Number', 'Email'];
        _placeholder(search_txt,search_content);
    </script>
<?php }?>







<?php if ($page=='all_tourism_attraction'){?>

    <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="bi-house-fill"></i></span> TOURISM ATTRACTION <button class="btn" onClick="_get_form_with_id('tourism_attraction_form','')"><i class="fa fa-plus"></i> ADD NEW TOURISM ATTRACTION</button></div>

    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
        <select id="status_id"  class="text_field select" onchange="_get_tourism_products_page_content_NoCat('<?php echo $page?>','')">
            <option value=""> SELECT STATUS</option>
            <script>_get_select_status('status_id','1,2');</script>
        </select>
        <!--------------------------------all search select------------------------->
        <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
    </div>
    
    <div class="fetch-content-div animated fadeIn" id="fetch_details">
            <script>_get_tourism_products_page_content_NoCat('<?php echo $page?>','')</script>
          <!-- <div class="grid-div">
            <div class="btn-div">
                <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
                <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
                <br clear="all">
            </div>

            <div class="status-div">ACTIVATED</div>
            <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
            <div class="text-div">
                <div class="text-in">
                    <div class="text"><span>TOURSIM ATTRACTION</span> </div>
                </div>
                <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                    <div class="text"><span>486</span> VIEWS</div>
                </div>
                <br>
            </div>
          </div> -->

          
    </div>
    <script> 
        var search_content =['Type here to search...', 'eg Page Title', 'Page Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>






<?php if ($page=='all_tourism_destination'){?>

    <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="bi-geo-alt-fill"></i></span> TOURISM DESTIMNATION <button class="btn" onClick="_get_form_with_id('tourism_destination_form','')"><i class="fa fa-plus"></i> ADD NEW TOURISM DESTIMNATION</button></div>

    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
        <select id="status_id"  class="text_field select" onchange="_get_tourism_products_page_content_NoCat('<?php echo $page?>','')">
            <option value=""> SELECT STATUS</option>
            <script>_get_select_status('status_id','1,2');</script>
        </select>
        <!--------------------------------all search select------------------------->
        <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
    </div>

    <div class="fetch-content-div animated fadeIn" id="fetch_details">
            <script>_get_tourism_products_page_content_NoCat('<?php echo $page?>','')</script>
          <!-- <div class="grid-div">
            <div class="btn-div">
                <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
                <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
                <br clear="all">
            </div>

            <div class="status-div">ACTIVATED</div>
            <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
            <div class="text-div">
                <div class="text-in">
                    <div class="text"><span>TOURSIM ATTRACTION</span> </div>
                </div>
                <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                    <div class="text"><span>486</span> VIEWS</div>
                </div>
                <br>
            </div>
          </div> -->

          
    </div>
    <script> 
        var search_content =['Type here to search...', 'eg Page Title', 'Page Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>







<?php if ($page=='all_events'){?>

  <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="bi-calendar-event-fill"></i></span> EVENT <button class="btn" onClick="_get_form_with_id('event_form','')"><i class="fa fa-plus"></i> ADD NEW EVENT</button></div>

  <div class="search-div" data-aos="fade-in" data-aos-duration="700">
      <select id="status_id"  class="text_field select" onchange="_get_tourism_products_page_content_NoCat('<?php echo $page?>','')">
          <option value=""> SELECT STATUS</option>
          <script>_get_select_status('status_id','1,2');</script>
      </select>
      <!--------------------------------all search select------------------------->
      <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
  </div>

  <div class="fetch-content-div animated fadeIn" id="fetch_details">
          <script>_get_tourism_products_page_content_NoCat('<?php echo $page?>','')</script>
        <!-- <div class="grid-div">
          <div class="btn-div">
              <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
              <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
              <br clear="all">
          </div>

          <div class="status-div">ACTIVATED</div>
          <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
          <div class="text-div">
              <div class="text-in">
                  <div class="text"><span>TOURSIM ATTRACTION</span> </div>
              </div>
              <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
              <div class="text-in">
                  <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                  <div class="text"><span>486</span> VIEWS</div>
              </div>
              <br>
          </div>
        </div> -->

        
  </div>
      <script> 
          var search_content =['Type here to search...', 'eg Page Title', 'Page Url'];
          _placeholder(search_txt,search_content);
      </script>
<?php } ?>







<!-- /////////////////////////////////////////////////////////////////////////////////////// -->




<?php if ($page=='all_entertainment'){?>

  <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="bi-suit-club-fill"></i></span> ENTERTAINMENT <button class="btn" onClick="_get_form_with_id('entertainment_cat_form','')"><i class="fa fa-plus"></i> ADD ENTERTAINMENT CATEGORY</button></div>

  <div class="search-div" data-aos="fade-in" data-aos-duration="700">
      <select id="status_id"  class="text_field select" onchange="_get_fetch_category_details('<?php echo $page?>','')">
          <option value=""> SELECT STATUS</option>
          <script>_get_select_status('status_id','1,2');</script>
      </select>
      <!--------------------------------all search select------------------------->
      <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
  </div>

    <div class="fetch-content-div animated fadeIn" id="fetch_details">
          <div class="table-div animated fadeIn" id="search-content">
              <div class="div-in">
                
              <div class="table-div-in">
                  <table class="table" cellspacing="0" style="width:100%" id="fetch_category_details">
                  <script>_get_fetch_category_details('<?php echo $page?>','')</script>
                  <!-- <tr class="tb-col">
                      <td>SN</td>
                      <td >CATEGORY NAME</td>
                      <td>STATISTICS </td>
                      <td>STATUS</td>
                      <td>EDIT RECORD</td>
                      <td>ACTION</td>
                  </tr>

                  <tr>
                      <td>1</td>
                      <td>Cuisine</td>
                      <td>10</td>
                      <td><div class="ACTIVE">ACTIVE</div></td>
                      <td><button class="btn" onclick="editRow(this)"><i class="bi-pencil-square"></i> EDIT</button></td>
                      <td><button class="btn"><i class="bi bi-eye"></i> VIEW DETAILS</button></td>
                  </tr> -->
                </table>
              </div>
                
          </div>
      </div>

    </div>
    
    <script> 
        var search_content =['Type here to search...', 'eg Category Name', 'Page Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>






<?php if ($page=='all_entertainment_category_sub_details'){?>

      <div class="alert alert-success alert-text" style="margin-bottom:0px;"> <span><i class="bi-calendar-event-fill"></i></span> ENTERTAINMENT / <span id="sub_title" style="font-size:11px">XXXX XXXX</span> <button class="btn" onClick="_get_form_with_id2('entertainment_form','<?php echo $ids?>','')"><i class="fa fa-plus"></i> ADD NEW ENTERTAINMENT</button></div>

      <div class="search-div" data-aos="fade-in" data-aos-duration="700">
          <select id="status_id"  class="text_field select" onchange="_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')">
              <option value=""> SELECT STATUS</option>
              <script>_get_select_status('status_id','1,2');</script>
          </select>
          <!--------------------------------all search select------------------------->
          <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','<?php echo $ids?>')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
      </div>

      <div class="fetch-content-div animated fadeIn" id="fetch_details">
              <script>_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')</script>
            <!-- <div class="grid-div">
              <div class="btn-div">
                  <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
                  <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
                  <br clear="all">
              </div>

              <div class="status-div">ACTIVATED</div>
              <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
              <div class="text-div">
                  <div class="text-in">
                      <div class="text"><span>TOURSIM ATTRACTION</span> </div>
                  </div>
                  <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
                  <div class="text-in">
                      <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                      <div class="text"><span>486</span> VIEWS</div>
                  </div>
                  <br>
              </div>
            </div> -->
      </div>
      <script> 
        var search_content =['Type here to search...', 'eg Page Title', 'Page Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>






<?php if ($page=='all_sport'){?>

  <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="bi-bicycle"></i></span> SPORT <button class="btn" onClick="_get_form_with_id('sport_cat_form','')"><i class="fa fa-plus"></i> ADD NEW SPORT CATEGORY</button></div>

  <div class="search-div" data-aos="fade-in" data-aos-duration="700">
      <select id="status_id"  class="text_field select" onchange="_get_fetch_category_details('<?php echo $page?>','')">
          <option value=""> SELECT STATUS</option>
          <script>_get_select_status('status_id','1,2');</script>
      </select>
      <!--------------------------------all search select------------------------->
      <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
  </div>

    <div class="fetch-content-div animated fadeIn" id="fetch_details">
          <div class="table-div animated fadeIn" id="search-content">
              <div class="div-in">
                
              <div class="table-div-in">
                  <table class="table" cellspacing="0" style="width:100%" id="fetch_category_details">
                  <script>_get_fetch_category_details('<?php echo $page?>','')</script>
                  <!-- <tr class="tb-col">
                      <td>SN</td>
                      <td >CATEGORY NAME</td>
                      <td>STATISTICS </td>
                      <td>STATUS</td>
                      <td>EDIT RECORD</td>
                      <td>ACTION</td>
                  </tr>

                  <tr>
                      <td>1</td>
                      <td>Cuisine</td>
                      <td>10</td>
                      <td><div class="ACTIVE">ACTIVE</div></td>
                      <td><button class="btn" onclick="editRow(this)"><i class="bi-pencil-square"></i> EDIT</button></td>
                      <td><button class="btn"><i class="bi bi-eye"></i> VIEW DETAILS</button></td>
                  </tr> -->
                </table>
              </div>
                
          </div>
      </div>

    </div>
    
    <script> 
        var search_content =['Type here to search...', 'eg Category Name'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>






<?php if ($page=='all_sport_category_sub_details'){?>

  <div class="alert alert-success alert-text" style="margin-bottom:0px;"> <span><i class="bi-bicycle"></i></span> SPORT / <span id="sub_title" style="font-size:11px">XXXX XXXX</span> <button class="btn" onClick="_get_form_with_id2('sport_form','<?php echo $ids?>','')"><i class="fa fa-plus"></i> ADD NEW SPORT</button></div>

  <div class="search-div" data-aos="fade-in" data-aos-duration="700">
      <select id="status_id"  class="text_field select" onchange="_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')">
          <option value=""> SELECT STATUS</option>
          <script>_get_select_status('status_id','1,2');</script>
      </select>
      <!--------------------------------all search select------------------------->
      <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','<?php echo $ids?>')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
  </div>

  <div class="fetch-content-div animated fadeIn" id="fetch_details">
          <script>_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')</script>
        <!-- <div class="grid-div">
          <div class="btn-div">
              <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
              <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
              <br clear="all">
          </div>

          <div class="status-div">ACTIVATED</div>
          <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
          <div class="text-div">
              <div class="text-in">
                  <div class="text"><span>TOURSIM ATTRACTION</span> </div>
              </div>
              <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
              <div class="text-in">
                  <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                  <div class="text"><span>486</span> VIEWS</div>
              </div>
              <br>
          </div>
        </div> -->
  </div>
  <script> 
        var search_content =['Type here to search...', 'eg Page Title', 'Page Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>








<?php if ($page=='all_culture'){?>

  <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="bi-person-heart"></i></span> CULTURE <button class="btn" onClick="_get_form_with_id('culture_cat_form','')"><i class="fa fa-plus"></i> ADD CULTURE CATEGORY</button></div>

  <div class="search-div" data-aos="fade-in" data-aos-duration="700">
      <select id="status_id"  class="text_field select" onchange="_get_fetch_category_details('<?php echo $page?>','')">
          <option value=""> SELECT STATUS</option>
          <script>_get_select_status('status_id','1,2');</script>
      </select>
      <!--------------------------------all search select------------------------->
      <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
  </div>

    <div class="fetch-content-div animated fadeIn" id="fetch_details">
          <div class="table-div animated fadeIn" id="search-content">
              <div class="div-in">
                
              <div class="table-div-in">
                  <table class="table" cellspacing="0" style="width:100%" id="fetch_category_details">
                  <script>_get_fetch_category_details('<?php echo $page?>','')</script>
                  <!-- <tr class="tb-col">
                      <td>SN</td>
                      <td >CATEGORY NAME</td>
                      <td>STATISTICS </td>
                      <td>STATUS</td>
                      <td>EDIT RECORD</td>
                      <td>ACTION</td>
                  </tr>

                  <tr>
                      <td>1</td>
                      <td>Cuisine</td>
                      <td>10</td>
                      <td><div class="ACTIVE">ACTIVE</div></td>
                      <td><button class="btn" onclick="editRow(this)"><i class="bi-pencil-square"></i> EDIT</button></td>
                      <td><button class="btn"><i class="bi bi-eye"></i> VIEW DETAILS</button></td>
                  </tr> -->
                </table>
              </div>
                
          </div>
      </div>

    </div>
    
    <script> 
        var search_content =['Type here to search...', 'eg Category Name'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>






<?php if ($page=='all_culture_category_sub_details'){?>

    <div class="alert alert-success alert-text" style="margin-bottom:0px;"> <span><i class="bi-bicycle"></i></span> CULTURE / <span id="sub_title" style="font-size:11px">XXXX XXXX</span> <button class="btn" onClick="_get_form_with_id2('culture_form','<?php echo $ids?>','')"><i class="fa fa-plus"></i> ADD NEW CULTURE</button></div>

    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
        <select id="status_id"  class="text_field select" onchange="_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')">
            <option value=""> SELECT STATUS</option>
            <script>_get_select_status('status_id','1,2');</script>
        </select>
        <!--------------------------------all search select------------------------->
        <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','<?php echo $ids?>')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
    </div>

    <div class="fetch-content-div animated fadeIn" id="fetch_details">
            <script>_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')</script>
          <!-- <div class="grid-div">
            <div class="btn-div">
                <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
                <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
                <br clear="all">
            </div>

            <div class="status-div">ACTIVATED</div>
            <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
            <div class="text-div">
                <div class="text-in">
                    <div class="text"><span>TOURSIM ATTRACTION</span> </div>
                </div>
                <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
                <div class="text-in">
                    <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                    <div class="text"><span>486</span> VIEWS</div>
                </div>
                <br>
            </div>
          </div> -->
    </div>
    <script> 
        var search_content =['Type here to search...', 'eg Page Title', 'Page Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>







<?php if ($page=='all_tradition'){?>

    <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="bi-badge-tm-fill"></i></span> TRADITION <button class="btn" onClick="_get_form_with_id('tradition_cat_form','')"><i class="fa fa-plus"></i> ADD TRADITION CATEGORY</button></div>

    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
        <select id="status_id"  class="text_field select" onchange="_get_fetch_category_details('<?php echo $page?>','')">
            <option value=""> SELECT STATUS</option>
            <script>_get_select_status('status_id','1,2');</script>
        </select>
        <!--------------------------------all search select------------------------->
        <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
    </div>

      <div class="fetch-content-div animated fadeIn" id="fetch_details">
            <div class="table-div animated fadeIn" id="search-content">
                <div class="div-in">
                  
                <div class="table-div-in">
                    <table class="table" cellspacing="0" style="width:100%" id="fetch_category_details">
                    <script>_get_fetch_category_details('<?php echo $page?>','')</script>
                    <!-- <tr class="tb-col">
                        <td>SN</td>
                        <td >CATEGORY NAME</td>
                        <td>STATISTICS </td>
                        <td>STATUS</td>
                        <td>EDIT RECORD</td>
                        <td>ACTION</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Cuisine</td>
                        <td>10</td>
                        <td><div class="ACTIVE">ACTIVE</div></td>
                        <td><button class="btn" onclick="editRow(this)"><i class="bi-pencil-square"></i> EDIT</button></td>
                        <td><button class="btn"><i class="bi bi-eye"></i> VIEW DETAILS</button></td>
                    </tr> -->
                  </table>
                </div>
                  
            </div>
        </div>

      </div>
      
      <script> 
        var search_content =['Type here to search...', 'eg Category Name'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>






<?php if ($page=='all_tradition_category_sub_details'){?>

  <div class="alert alert-success alert-text" style="margin-bottom:0px;"> <span><i class="bi-badge-tm-fill"></i></span> TRADITION / <span id="sub_title" style="font-size:11px">XXXX XXXX</span> <button class="btn" onClick="_get_form_with_id2('tradition_form','<?php echo $ids?>','')"><i class="fa fa-plus"></i> ADD NEW TRADITION</button></div>

  <div class="search-div" data-aos="fade-in" data-aos-duration="700">
      <select id="status_id"  class="text_field select" onchange="_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')">
          <option value=""> SELECT STATUS</option>
          <script>_get_select_status('status_id','1,2');</script>
      </select>
      <!--------------------------------all search select------------------------->
      <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','<?php echo $ids?>')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
  </div>

  <div class="fetch-content-div animated fadeIn" id="fetch_details">
          <script>_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')</script>
        <!-- <div class="grid-div">
          <div class="btn-div">
              <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
              <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
              <br clear="all">
          </div>

          <div class="status-div">ACTIVATED</div>
          <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
          <div class="text-div">
              <div class="text-in">
                  <div class="text"><span>TOURSIM ATTRACTION</span> </div>
              </div>
              <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
              <div class="text-in">
                  <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                  <div class="text"><span>486</span> VIEWS</div>
              </div>
              <br>
          </div>
        </div> -->
  </div>
  <script> 
        var search_content =['Type here to search...', 'eg Page Title', 'Page Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>











<?php if ($page=='all_natural_tourism_product'){?>

    <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="bi-badge-tm-fill"></i></span> NATURAL TOURISM PRODUCT <button class="btn" onClick="_get_form_with_id('natural_tourism_product_cat_form','')"><i class="fa fa-plus"></i> ADD NATURAL TOURISM PRODUCT CATEGORY</button></div>

    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
        <select id="status_id"  class="text_field select" onchange="_get_fetch_category_details('<?php echo $page?>','')">
            <option value=""> SELECT STATUS</option>
            <script>_get_select_status('status_id','1,2');</script>
        </select>
        <!--------------------------------all search select------------------------->
        <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
    </div>

      <div class="fetch-content-div animated fadeIn" id="fetch_details">
            <div class="table-div animated fadeIn" id="search-content">
                <div class="div-in">
                  
                <div class="table-div-in">
                    <table class="table" cellspacing="0" style="width:100%" id="fetch_category_details">
                    <script>_get_fetch_category_details('<?php echo $page?>','')</script>
                    <!-- <tr class="tb-col">
                        <td>SN</td>
                        <td >CATEGORY NAME</td>
                        <td>STATISTICS </td>
                        <td>STATUS</td>
                        <td>EDIT RECORD</td>
                        <td>ACTION</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Cuisine</td>
                        <td>10</td>
                        <td><div class="ACTIVE">ACTIVE</div></td>
                        <td><button class="btn" onclick="editRow(this)"><i class="bi-pencil-square"></i> EDIT</button></td>
                        <td><button class="btn"><i class="bi bi-eye"></i> VIEW DETAILS</button></td>
                    </tr> -->
                  </table>
                </div>
                  
            </div>
        </div>

      </div>
      
      <script> 
        var search_content =['Type here to search...', 'eg Category Name'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>






<?php if ($page=='all_natural_tourism_product_category_sub_details'){?>

  <div class="alert alert-success alert-text" style="margin-bottom:0px;"> <span><i class="bi-badge-tm-fill"></i></span> NATURAL TOURISM PRODUCT / <span id="sub_title" style="font-size:11px">XXXX XXXX</span> <button class="btn" onClick="_get_form_with_id2('natural_tourism_product_form','<?php echo $ids?>','')"><i class="fa fa-plus"></i> ADD NATURAL TOURISM PRODUCT</button></div>

  <div class="search-div" data-aos="fade-in" data-aos-duration="700">
    <select id="status_id"  class="text_field select" onchange="_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')">
        <option value=""> SELECT STATUS</option>
        <script>_get_select_status('status_id','1,2');</script>
    </select>
    <!--------------------------------all search select------------------------->
    <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','<?php echo $ids?>')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
  </div>

  <div class="fetch-content-div animated fadeIn" id="fetch_details">
        <script>_get_tourism_products_page_content_WithCat('<?php echo $page?>','<?php echo $ids?>','')</script>
      <!-- <div class="grid-div">
        <div class="btn-div">
            <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
            <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
            <br clear="all">
        </div>

        <div class="status-div">ACTIVATED</div>
        <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
        <div class="text-div">
            <div class="text-in">
                <div class="text"><span>TOURSIM ATTRACTION</span> </div>
            </div>
            <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
            <div class="text-in">
                <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                <div class="text"><span>486</span> VIEWS</div>
            </div>
            <br>
        </div>
      </div> -->
  </div>
  <script> 
        var search_content =['Type here to search...', 'eg Page Title', 'Page Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>


















<?php if ($page=='all_blogs'){?>

  <div class="alert alert-success alert-text" style="margin-bottom:0px;"> <span><i class="bi-newspaper"></i></span> NEWS & BLOG LIST <button class="btn" onClick="_get_form_with_id('blog_form','')"><i class="fa fa-plus"></i> ADD NEW BLOG</button></div>

  <div class="search-div" data-aos="fade-in" data-aos-duration="700">
    <select id="status_id"  class="text_field select" onchange="_get_fetch_blog('<?php echo $page?>','')">
        <option value=""> SELECT STATUS</option>
        <script>_get_select_status('status_id','1,2');</script>
    </select>
    <!--------------------------------all search select------------------------->
    <input id="search_txt" onkeyup="_search_content('<?php echo $page?>','<?php echo $ids?>')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
  </div>

  <div class="fetch-content-div animated fadeIn" id="fetch_details">
        <script>_get_fetch_blog('<?php echo $page?>','')</script>
      <!-- <div class="grid-div">
        <div class="btn-div">
            <button class="btn active-btn" onclick="_get_form_with_id('add_and_update_tourism_attraction','')">EDIT</button>
            <button class="btn" onclick="_get_form_with_id('tourism_attraction_page_details','')">EDIT PAGE DETAILS</button>
            <br clear="all">
        </div>

        <div class="status-div">ACTIVATED</div>
        <div class="img-div"><img src="<?php// echo $website_url?>/uploaded_files/tourism_attraction_pix/ibudo-asa.webp" alt="Blog Name"></div>
        <div class="text-div">
            <div class="text-in">
                <div class="text"><span>TOURSIM ATTRACTION</span> </div>
            </div>
            <h2>Ibudo Asa, Ipara Remo, Ogun State</h2>
            <div class="text-in">
                <div class="text">UPDATED ON: <span>24 Apr 2023</span> </div>
                <div class="text"><span>486</span> VIEWS</div>
            </div>
            <br>
        </div>
      </div> -->
  </div>
  <script> 
        var search_content =['Type here to search...', 'eg Blog Title', 'Blog Url'];
        _placeholder(search_txt,search_content);
    </script>
<?php } ?>











<?php if ($page=='all_faqs'){ ?>
    <div class="search-div">
        <!--------------------------------network search select------------------------->
        <select id="status_id"  class="text_field select" onchange=" _get_fetch_faqs('<?php echo $page?>','');">
            <option value="" selected="selected">SELECT STATUS</option>   
            <script>_get_select_status('status_id','1,2');</script>
        </select>
        <!--------------------------------all search select------------------------->
        <input id="search_txt" onkeyup=" _search_content('<?php echo $page?>','');" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
    </div>
        <div class="alert alert-success"> <span><i class="bi-question-circle-fill"></i></span> FAQ's LIST <button class="btn" onClick="_get_form_with_id('faqs_form','')"><i class="bi-plus-square"></i> ADD NEW FAQ</button></div>
                    
                  <div class="faq-back-div" >

                    <div class="fetch animated fadeIn" id="fetch_details">
                        <script> _get_fetch_faqs('<?php echo $page?>','');</script>
                    </div>

                      <!-- <div class="quest-faq-div">
                        <div class="main-faqs-title-div ACTIVE">
                            <span>2</span>
                        </div>

                        <div class="main-faqs-title-div faq-title-text" onclick="_collapse('faq244')" style="cursor:pointer;">
                          <i class="bi-pencil-square"></i> <span>Who we are</span>
                          <button class="btn" title="EDIT FAQ" ><i class="bi-pencil-square"></i> EDIT</button>
                          <div class="expand-div" id="faq244num">&nbsp;<i class="bi-plus"></i>&nbsp;</div>
                        </div>
                        
                        <div class="faq-answer-div faq-answer-div2" id="faq244answer" style="display: none;">  
                            <p>Euclidean geometry is a study of geometric properties and relationships in two and three-dimensional space.</p>
                            <p>Euclidean geometry is a study of geometric properties and relationships in two and three-dimensional space.</p>
                        </div>
                        
                      </div> 

                  </div>
              -->
       
      <script> 
        var search_content =['Type here to search...', 'eg FAQs Title'];
        _placeholder(search_txt,search_content);
    </script>

<?php } ?>
