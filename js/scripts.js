$(document).ready(function(){
  let page_session = JSON.parse(sessionStorage.getItem("page_session"));
  if (page_session==null){
    _get_page_session_value('');
  }
});

function _get_page_session_value(reload) {
  var action = 'get_page_session_value';
  var dataString = 'action=' + action;
  $.ajax({
    type: "POST",
    url: index_api,
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function (info) {
      sessionStorage.setItem("page_session", JSON.stringify(info.page_session));
      if (reload=='reload'){
        window.location.reload()
      }
    }
  });
}

function _call_carousel(cnt) {
  // INIT CAROUSEL
  window["carousel_" + cnt] = new CgCarousel(
    "#js-carousel_" + cnt,
    window["carousel_options_" + cnt],
    {}
  );
  // Navigation
  window["next_" + cnt] = document.getElementById("js-carousel__next_" + cnt);
  window["next_" + cnt].addEventListener("click", () =>
    window["carousel_" + cnt].next()
  );
  window["prev_" + cnt] = document.getElementById("js-carousel__prev_" + cnt);
  window["prev_" + cnt].addEventListener("click", () =>
    window["carousel_" + cnt].prev()
  );
}

$(window).scroll(function () {
  var scrollheight = $(window).scrollTop();
  if (scrollheight >= 100) {
    $("#back2Top").fadeIn(1000);
    $(".sticky-div").css("position", "sticky");
    $(".sticky-div").css("top", "120px");
  } else {
    $("#back2Top").fadeOut(1000);
  }
  if (scrollheight >= 400) {
    $("header").css("position", "fixed");
  } else {
    $("header").css("position", "absolute");
  }
  if (scrollheight >= 700) {
    $(".sticky-div").css("position", "sticky");
    $(".sticky-div").css("top", "120px");
    $(".sticky-div").css("height", "500px");
  } else {
    $(".sticky-div").css("position", "relative");
    $(".sticky-div").css("top", "0");
    $(".sticky-div").css("overflow", "none");
    $(".sticky-div").css("height", "auto");
  }
});

function _view_preview_img(divid) {
  var view_pix = $("#" + divid).html();
  $("#preview-img").html(view_pix).fadeIn(3000);
}

function _view_gallery_preview_img(event,divid) {
  var view_gallery_pix = $("#" + divid).html();
  $("#preview-image").html(view_gallery_pix).fadeIn(3000);
  event.stopPropagation();
}

function _back_to_top() {
  event.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
}

function scrolltodiv(divid, margintop) {
  $("html, body").animate(
    {
      scrollTop: $("#" + divid).offset().top - margintop,
    },
    500
  );
}

function _open_menu() {
  $(".sidenavdiv, .sidenavdiv-in").animate({ "margin-left": "0" }, 200);
  $(".live-chat-back-div").animate({ "margin-left": "-100%" }, 400);
  $(".index-menu-back-div").animate({ "margin-left": "0" }, 400);
}

function _open_menu_2() {
  $(".sidenavdiv, .sidenavdiv-in").animate({ "margin-left": "0" }, 200);
  $(".index-menu-back-div2").animate({ "margin-left": "0" }, 400);
}

function _open_live_chat() {
  $(".sidenavdiv, .sidenavdiv-in").animate({ "margin-left": "0" }, 200);
  $(".index-menu-back-div").animate({ "margin-left": "-100%" }, 400);
  $(".live-chat-back-div").animate({ "margin-left": "0" }, 400);
}

function _close_side_nav() {
  $(".sidenavdiv, .sidenavdiv-in").animate({ "margin-left": "-100%" }, 200);
  $(".index-menu-back-div,.live-chat-back-div").animate({ "margin-left": "-100%" },400);
  $(".index-menu-back-div2").animate({ "margin-left": "-100%" }, 400);
}

function _open_li(ids) {
  $("#" + ids + "-sub-li").toggle("slow");
}

function _open_more_cat_div() {
  $("#cat-div").toggle("slow");
}

function alert_close(event) {
  var targetElement = event.target;
  if (!targetElement.closest('.main-preview')) {
    var overlay = document.getElementById('get-more-div');
    overlay.style.display = 'none';
  }
}

function alert_secondary_close() {
  $("#get-more-div-secondary").html("").fadeOut(200);
}


///// for FAQs

function _collapse(div_id) {
	var x = document.getElementById(div_id + "num");
	  if (x.innerHTML === '&nbsp;<i class="bi-plus"></i>&nbsp;') {
		  x.innerHTML = '&nbsp;<i class="bi-dash"></i>&nbsp;';
		  $('#'+div_id).addClass('active-faq');
	  }else{
		x.innerHTML = '&nbsp;<i class="bi-plus"></i>&nbsp;';
		  $('#'+div_id).removeClass('active-faq');
	  }
	$('#'+div_id+'answer').slideToggle('slow');
}


function _get_active_details(text){
	$('#next-tour, #next-tra, #next-event, #next-cult, #next-sport, #next-ent, #next-natural, #next-tourist-dest').removeClass('active-btn-2');
	$('#next-'+text).addClass('active-btn-2');
}


function _get_gallery_details(page,text){
	_get_active_details(text);
	var action='get_details';
	$('#get_details').html('<div class="ajax-loader gallery-ajax"><img src="' +website_url +'/all-images/images/ajax-loader.gif"/></div>').fadeIn("fast");
	var dataString ='action='+ action+'&page='+ page;
	$.ajax({
	type: "POST",
	url: index_local_url,
	data: dataString,
	cache: false,
	success: function(html){
		$('#get_details').html(html);
	}
	});
}


function _get_details(detail_id) {
  $("#tourist, #culture, #tradition, #entertainment, #sport, #natural_tourism, #tourist_destinations, #event"
  ).removeClass("active-btn");
  $("#" + detail_id).addClass("active-btn");

  $("#pane_tourist, #pane_culture, #pane_tradition, #pane_entertainment, #pane_sport, #pane_natural_tourism, #pane_tourist_destinations, #pane_event").hide();
  $("#pane_" + detail_id).fadeIn(500);
}

function _get_details_2(detail_id2) {
  $("#tourist_2, #culture_2, #tradition_2, #entertainment_2, #sport_2, #natural_tourism_2, #tourist_destinations_2, #event_2").removeClass("active-btn-2");
  $("#" + detail_id2).addClass("active-btn-2");

  $("#pane_tourist_2, #pane_culture_2, #pane_tradition_2, #pane_entertainment_2, #pane_sport_2, #pane_natural_tourism_2, #pane_tourist_destinations_2, #pane_event_2").hide();
  $("#pane_" + detail_id2).fadeIn(500);
}



function _get_form(page) {
  $("#get-more-div")
    .html(
      '<div class="ajax-loader"><img src="' +
        website_url +
        '/all-images/images/ajax-loader.gif"/></div>'
    )
    .fadeIn("fast");
  var action = "get-form";
  var dataString = "action=" + action + "&page=" + page;
  $.ajax({
    type: "POST",
    url: local_url,
    data: dataString,
    cache: false,
    success: function (html) {
      $("#get-more-div").html(html);
    },
  });
}


function _open_preview_with_id(page, ids) {//NEW UPDATE
	if (page == '') {
		//do nothing
	} else {
		$('#get-more-div').html('<div class="ajax-loader each-gallery-ajax"><img src="' +website_url +'/all-images/images/ajax-loader.gif"/></div>').fadeIn("fast");
		var action = 'open-preview-with-id';
		var dataString = 'action=' + action + '&page=' + page + '&ids=' + ids;
		$.ajax({
			type: "POST",
			url: index_local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#get-more-div').html(html);
			}
		});
	}
}


function _get_tourism_products() {
	var action = 'fetch_tourism_products_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
						var tourism_products_name  = fetch[i].tourism_products_name;
						var tourism_products_summary = fetch[i].tourism_products_summary.substr(0, 150);
            var tourism_products_url  = fetch[i].tourism_products_url;
						var tourism_products_pix  = fetch[i].tourism_products_pix;
						if (tourism_products_pix =='') {
							tourism_products_pix  ='default_pix.jpg';
						}

						text += 
                  '<div class="tourism-products">'+
                   '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/tourism_products_pix/'+ tourism_products_pix +'" alt="' + tourism_products_name + '"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                     '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Cuture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h2>'+ tourism_products_name +'</h2>'+
                      '<p>'+ tourism_products_summary + '...</p>'+
                     '<a href="'+ website_url +'/tourism-products/'+ tourism_products_url +'" title="READ MORE">'+
                      '<button class="btn" title="READ MORE">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                    '</div>'+
                  '</div>';
						}
						$('#fetch_all_tourism_products').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_all_tourism_products').html(text);
				}

			}
	});
}


function _get_header_tourism_products() {
	var action = 'fetch_tourism_products_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
						var tourism_products_name  = fetch[i].tourism_products_name;
                        var tourism_products_url  = fetch[i].tourism_products_url;
						var tourism_products_pix  = fetch[i].tourism_products_pix;
						if (tourism_products_pix =='') {
							tourism_products_pix  ='default_pix.jpg';
						}

						text += 
                  
                  '<div class="tourism-cat-div">'+
                      '<div class="image-div">'+
                        '<img src="'+ website_url +'/uploaded_files/tourism_products_pix/'+ tourism_products_pix +'" alt="' + tourism_products_name + '"/>'+
                      '</div>'+
                      '<a href="'+ website_url +'/tourism-products/'+ tourism_products_url +'" title="Tourist Attractions">'+
                      '<h4>'+ tourism_products_name +'</h4></a>'+
                  '</div>';
						}
						$('#fetch_header_tourism_products').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_header_tourism_products').html(text);
				}

			}
	});
}


function _get_related_tourism_products() {
	var action = 'fetch_tourism_products_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
						var tourism_products_name  = fetch[i].tourism_products_name;
            var tourism_products_url  = fetch[i].tourism_products_url;
						var tourism_products_pix  = fetch[i].tourism_products_pix;
						if (tourism_products_pix =='') {
							tourism_products_pix  ='default_pix.jpg';
						}

						text += 
                  '<a href="'+ website_url +'/tourism-products/'+ tourism_products_url +'" title="'+ tourism_products_name +'">'+
                  '<div class="related-popular-div">'+
                    '<div class="img-div">'+
                      '<img src="'+ website_url +'/uploaded_files/tourism_products_pix/'+ tourism_products_pix +'" alt="' + tourism_products_name + '"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ tourism_products_name +'</h4>'+
                    '</div>'+
                  '</div></a>';
						}
						$('#fetch_related_tourism_products').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_related_tourism_products').html(text);
				}

			}
	});
}


function _get_each_tourist_products(pageType) {
  if (pageType == 'each_tourist_attraction') {
    var getAction = 'fetch_each_tourist_attraction_api';
  }else if (pageType == 'each_entertainment') {
    var getAction = 'fetch_each_entertainment_api';
  }else if (pageType == 'each_sport') {
    var getAction = 'fetch_each_sport_api';
  }else if (pageType == 'each_culture') {
    var getAction = 'fetch_each_culture_api';
  }else if (pageType == 'each_tradition') {
    var getAction = 'fetch_each_tradition_api';
  }else if (pageType == 'each_natural_tourism_products') {
    var getAction = 'fetch_each_natural_tourism_products_api';
  }else if (pageType == 'each_tourist_destination') {
    var getAction = 'fetch_each_tourist_destination_api';
  }else if (pageType == 'each_event') {
    var getAction = 'fetch_each_event_api';
  }

  var action = getAction;
  var dataString = 'action=' + action;
  $.ajax({
    type: "POST",
    url: index_api,
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function (info) {
      var fetch = info.data;

      var tourism_products_name = fetch.tourism_products_name;
      var tourism_products_summary = fetch.tourism_products_summary;
      var tourism_products_url = fetch.tourism_products_url;

      $('#tourism_products_name').html(tourism_products_name);
      $('#tourism_products_summary').html(tourism_products_summary);
      $('#tourism_products_url').html(tourism_products_url);
    }
  });
}



function _get_left_tourist_attraction_page() {
	var action = 'fetch_left_tourist_attraction_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
						var page_title = fetch[i].page_title;
						var page_summary = fetch[i].page_summary.substr(0, 200);
						var page_url = fetch[i].page_url;

						var page_pix  = fetch[i].page_pix ;
						if (page_pix =='') {
							page_pix  ='default_pix.jpg';
						}
		
						text += 
              '<div class="main-left-div">'+
                  '<div class="tourist">TOURIST ATTRACTIONS</div>'+
                  '<div class="img-div">'+
                    '<img src="'+ website_url +'/uploaded_files/tourist_attraction_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                 '</div>'+ 
                  
                  '<div class="text-div">'+
                      '<div class="div-in">'+
                          '<h2>'+ page_title +'</h2>'+
                          '<p>'+ page_summary + '...</p>'+
                          '<a href="'+ website_url +'/tourism-products/tourist-attractions/'+ page_url +'" title="' + page_title + '">'+
                          '<button class="btn" title="Olumo Rock Tourist Complex, Ikija, Abeokuta, Ogun State">READ MORE <i class="bi-arrow-right"></i></button></a>'+
                      '</div>'+
                  '</div>'+
              '</div>';
						}
						$('#fetch_left_tourist_attraction').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_left_tourist_attraction').html(text);
				}

			}
	});
}


function _get_right_tourist_attraction_page() {
	var action = 'fetch_right_tourist_attraction_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
						var page_title = fetch[i].page_title;
						var page_url = fetch[i].page_url;

						var page_pix  = fetch[i].page_pix ;
						if (page_pix =='') {
							page_pix  ='default_pix.jpg';
						}
		
						text += 
              '<a href="'+ website_url +'/tourism-products/tourist-attractions/'+ page_url +'" title="' + page_title + '">'+
              '<div class="related-div">'+
                  '<div class="img-div">'+
                      '<img src="' + website_url + '/uploaded_files/tourist_attraction_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
                  '</div>'+

                  '<div class="text-div">'+
                      '<h3>' + page_title + '</h3>'+
                  '</div>'+
              '</div></a>';
						}
						$('#fetch_right_tourist_attraction').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_right_tourist_attraction').html(text);
				}

			}
	});
}



function _get_bottom_tourist_attraction_page() {
	var action = 'fetch_tourist_attraction_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;

				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
						var page_title = fetch[i].page_title;
						var page_summary = fetch[i].page_summary.substr(0, 160);
						var page_url = fetch[i].page_url;
            var page_views = fetch[i].views;

            var date = fetch[i].updated_time;
            ///////////////////////////////// for date
            var originalDate = new Date(date);
            var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var day = originalDate.getDate();
            var month = monthNames[originalDate.getMonth()];
            var year = originalDate.getFullYear();
            var formattedDate = day + ' ' + month + ' ' + year;
            /////////////////////////////////////////
						var page_pix  = fetch[i].page_pix;
		
						text +=
              '<div class="tent-div">'+
                '<div class="title">Tourist Attractions</div>'+
                '<div class="img-div">'+
                  '<img src="'+ website_url +'/uploaded_files/tourist_attraction_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                '</div>'+

                '<a href="'+ website_url +'/tourism-products/tourist-attractions/'+ page_url +'" title="' + page_title + '">'+
                '<div class="text-div">'+
                  '<h2>'+ page_title +'</h2>'+
                  '<p>'+ page_summary + '...</p>'+
                    '<button class="btn" title="Read More">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                  '<div class="time"><i class="bi-clock"></i> ' + formattedDate + ' | <i class="bi-eye-fill"></i> <span>' + page_views + ' views</span></div>'+
                '</div><a/>'+
              '</div>';					
						}
						$('#fetch_all_tourist_attraction').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_all_tourist_attraction').html(text);
				}

			}
	});
}


$(document).ready(function(){
  let tour_attraction_session = JSON.parse(sessionStorage.getItem("tour_attraction_session"));
  if (tour_attraction_session==null){
    _get_tour_attraction_session_unique_value();
  }
});

function _get_tour_attraction_session_unique_value() {
  var action = 'get_tour_attraction_session_unique_value';
  var dataString = 'action=' + action;
  $.ajax({
    type: "POST",
    url: index_api,
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function (info) {
      sessionStorage.setItem("tour_attraction_session", JSON.stringify(info.tour_attraction_session));
    }
  });
}



function _get_each_tourist_attraction_page(page_id) {
  let page_session = JSON.parse(sessionStorage.getItem("page_session"));
    if(page_session==null){
      _get_page_session_value('reload')
    }else{
    var action = 'fetch_tourist_attraction_api';
    var dataString = 'action=' + action + '&page_id=' + page_id + '&page_session=' + page_session;
    $.ajax({
      type: "POST",
      url: index_api,
      data: dataString,
      dataType: 'json',
      cache: false,
      success: function (info) {
        var fetch = info.data;

        var page_title = fetch.page_title;
        var page_url = fetch.page_url;
        var fullname = info.fullname;
				var seo_keywords = fetch.seo_keywords;
				var page_summary = fetch.page_summary;
				var page_detail = fetch.page_detail;
				var page_pix = fetch.page_pix;
        var page_views = fetch.views;

				var date = fetch.updated_time;
				var originalDate = new Date(date);
				var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
				var day = originalDate.getDate();
				var month = monthNames[originalDate.getMonth()];
				var year = originalDate.getFullYear();
				var formattedDate = day + ' ' + month + ' ' + year;
				console.log(formattedDate);
   

        $('title').text(page_title);
        $('meta[name="keywords"]').attr('content', seo_keywords);
        $('meta[name="description"]').attr('content', page_summary);
        $('meta[property="og:title"]').attr('content', page_title);
        $('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/tourist_attraction_pix/seo_pix/" + page_pix);
        $('meta[property="og:description"]').attr('content', page_summary);
        $('meta[name="twitter:title"]').attr('content', page_title);
        $('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/tourist_attraction_pix/seo_pix/" + page_pix);
        $('meta[name="twitter:description"]').attr('content', page_summary);
        $('#page_title').html(page_title);
        $('#page_url').html(page_url);
        $('#page_summary').html(page_summary);
        $('#fullname').html(fullname);
        $('#page_detail').html(page_detail);
        $('#formattedDate').html(formattedDate);
        $('#page_views').html(page_views);
        _get_page_pix(page_pix);
      }
    });
  }
}


function _get_page_pix(page_pix) {
	var view_page_pix = '';
	if (page_pix == '') {
		view_page_pix ='<img src="' +website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ page_title +'"/>';
	} else {
		view_page_pix ='<img src="'+ website_url +'/uploaded_files/tourist_attraction_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'" />';
	}
	$('#view_page_pix, #view_page_pix2').html(view_page_pix);
}
  

function _get_related_pages(pageType) {
  if (pageType == 'all_tourism_attraction') {
		var getAction = 'fetch_tourist_attraction_api';
  }else if (pageType == 'all_event') {
    var getAction = 'fetch_event_api';
  }else if (pageType == 'all_tourist_destination') {
  var getAction = 'fetch_tourist_destination_api';
  }else if (pageType == 'all_entertainment') {
  var getAction = 'fetch_entertainment_api';
  }else if (pageType == 'all_sport') {
  var getAction = 'fetch_sport_api';
  }else if (pageType == 'all_culture') {
  var getAction = 'fetch_culture_api';
  }else if (pageType == 'all_tradition') {
  var getAction = 'fetch_tradition_api';
  }else if (pageType == 'all_natural_tourism_products') {
  var getAction = 'fetch_natural_tourism_products_api';
  }
	var action = getAction;
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
				var text = '';

				if (success == true) {
          if (pageType == 'all_tourism_attraction') {
					for (var i = 0; i < fetch.length; i++) {
						var page_title = fetch[i].page_title;
						var page_url = fetch[i].page_url;

						var page_pix  = fetch[i].page_pix ;
						if (page_pix =='') {
							page_pix  ='default_pix.jpg';
						}
		
						text += 
              '<a href="'+ website_url +'/tourism-products/tourist-attractions/'+ page_url +'" title="'+ page_title + '">'+
              '<div class="related-popular-div">'+
                  '<div class="img-div">'+
                      '<img src="' + website_url + '/uploaded_files/tourist_attraction_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
                  '</div>'+

                  '<div class="text-div">'+
                      '<h4>' + page_title + '</h4>'+
                  '</div>'+
              '</div></a>';
						}

          }else if (pageType == 'all_event'){

            for (var i = 0; i < fetch.length; i++) {
              var page_title = fetch[i].page_title;
              var page_url = fetch[i].page_url;
  
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
      
              text += 
                '<a href="'+ website_url +'/tourism-products/event/'+ page_url +'" title="'+ page_title + '">'+
                '<div class="related-popular-div">'+
                    '<div class="img-div">'+
                        '<img src="' + website_url + '/uploaded_files/event_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
                    '</div>'+
  
                    '<div class="text-div">'+
                        '<h4>' + page_title + '</h4>'+
                    '</div>'+
                '</div></a>';
            }

          }else if (pageType == 'all_tourist_destination'){

            for (var i = 0; i < fetch.length; i++) {
              var page_title = fetch[i].page_title;
              var page_url = fetch[i].page_url;
  
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
      
              text += 
                '<a href="'+ website_url +'/tourism-products/tourist-destination/'+ page_url +'" title="'+ page_title + '">'+
                '<div class="related-popular-div">'+
                    '<div class="img-div">'+
                        '<img src="' + website_url + '/uploaded_files/tourist_destination_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
                    '</div>'+
  
                    '<div class="text-div">'+
                        '<h4>' + page_title + '</h4>'+
                    '</div>'+
                '</div></a>';
            }
        }else if (pageType == 'all_entertainment'){

          for (var i = 0; i < fetch.length; i++) {
            var page_title = fetch[i].page_title;
            var page_url = fetch[i].page_url;

            var page_pix  = fetch[i].page_pix ;
            if (page_pix =='') {
              page_pix  ='default_pix.jpg';
            }
    
            text += 
              '<a href="'+ website_url +'/tourism-products/entertainment/'+ page_url +'" title="'+ page_title + '">'+
              '<div class="related-popular-div">'+
                  '<div class="img-div">'+
                      '<img src="' + website_url + '/uploaded_files/entertainment_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
                  '</div>'+

                  '<div class="text-div">'+
                      '<h4>' + page_title + '</h4>'+
                  '</div>'+
              '</div></a>';
          }
      }else if (pageType == 'all_sport'){

        for (var i = 0; i < fetch.length; i++) {
          var page_title = fetch[i].page_title;
          var page_url = fetch[i].page_url;

          var page_pix  = fetch[i].page_pix ;
          if (page_pix =='') {
            page_pix  ='default_pix.jpg';
          }
  
          text += 
            '<a href="'+ website_url +'/tourism-products/sport/'+ page_url +'" title="'+ page_title + '">'+
            '<div class="related-popular-div">'+
                '<div class="img-div">'+
                    '<img src="' + website_url + '/uploaded_files/sport_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
                '</div>'+

                '<div class="text-div">'+
                    '<h4>' + page_title + '</h4>'+
                '</div>'+
            '</div></a>';
        }
    }else if (pageType == 'all_culture'){

      for (var i = 0; i < fetch.length; i++) {
        var page_title = fetch[i].page_title;
        var page_url = fetch[i].page_url;

        var page_pix  = fetch[i].page_pix ;
        if (page_pix =='') {
          page_pix  ='default_pix.jpg';
        }

        text += 
          '<a href="'+ website_url +'/tourism-products/culture/'+ page_url +'" title="'+ page_title + '">'+
          '<div class="related-popular-div">'+
              '<div class="img-div">'+
                  '<img src="' + website_url + '/uploaded_files/culture_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
              '</div>'+

              '<div class="text-div">'+
                  '<h4>' + page_title + '</h4>'+
              '</div>'+
          '</div></a>';
      }
    }else if (pageType == 'all_tradition'){

      for (var i = 0; i < fetch.length; i++) {
        var page_title = fetch[i].page_title;
        var page_url = fetch[i].page_url;

        var page_pix  = fetch[i].page_pix ;
        if (page_pix =='') {
          page_pix  ='default_pix.jpg';
        }

        text += 
          '<a href="'+ website_url +'/tourism-products/tradition/'+ page_url +'" title="'+ page_title + '">'+
          '<div class="related-popular-div">'+
              '<div class="img-div">'+
                  '<img src="' + website_url + '/uploaded_files/tradition_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
              '</div>'+

              '<div class="text-div">'+
                  '<h4>' + page_title + '</h4>'+
              '</div>'+
          '</div></a>';
      }
    }else if (pageType == 'all_natural_tourism_products'){

      for (var i = 0; i < fetch.length; i++) {
        var page_title = fetch[i].page_title;
        var page_url = fetch[i].page_url;

        var page_pix  = fetch[i].page_pix ;
        if (page_pix =='') {
          page_pix  ='default_pix.jpg';
        }

        text += 
          '<a href="'+ website_url +'/tourism-products/natural-tourism-products/'+ page_url +'" title="'+ page_title + '">'+
          '<div class="related-popular-div">'+
              '<div class="img-div">'+
                  '<img src="' + website_url + '/uploaded_files/natural_tourism_product_pix/seo_pix/' + page_pix + '" alt="' + page_title + '" />'+
              '</div>'+

              '<div class="text-div">'+
                  '<h4>' + page_title + '</h4>'+
              '</div>'+
          '</div></a>';
      }
    }
					$('#fetch_related_pages').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_related_pages').html(text);
				}

			}
	});
}




function _fetch_tourism_products_other_pix(page_id,pageType) {

  action = 'fetch_tourism_attraction_other_pix_api';

	var form_data = new FormData();
	form_data.append('action', action);
	form_data.append('page_id', page_id);

	$.ajax({
		type: 'POST',
		url: index_api,
		data: form_data,
		contentType: false,
		dataType: "json",
		cache: false,
		processData: false,
		success: function (info) {
			var success = info.success;

      var no=0;
			var text = '';
			if (success == true) {
				var get_all_pix = info.get_all_pix;

        if (pageType === 'tourist_attraction') {
					for (var i = 0; i < get_all_pix.length; i++) {
            no++;
						var pictureFilename = get_all_pix[i];

						text += 
              '<div class="inner-img-div" onclick="_view_preview_img('+"'"+'img'+no+"'"+')">'+
                '<div class="each-img-div" id="img'+no+'">'+
                  '<img src="' + website_url + '/api/uploaded_files/tourist_attraction_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
               '</div>'+
							'</div>'; 
          } 

        }else if (pageType === 'event') {
          for (var i = 0; i < get_all_pix.length; i++) {
            no++;
						var pictureFilename = get_all_pix[i];
            text += 
              '<div class="inner-img-div" onclick="_view_preview_img('+"'"+'img'+no+"'"+')">'+
                '<div class="each-img-div" id="img'+no+'">'+
                  '<img src="' + website_url + '/api/uploaded_files/event_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
               '</div>'+
							'</div>';
          }  
      }else if (pageType === 'tourist_destination') {
        for (var i = 0; i < get_all_pix.length; i++) {
          no++;
          var pictureFilename = get_all_pix[i];
          text += 
              '<div class="inner-img-div" onclick="_view_preview_img('+"'"+'img'+no+"'"+')">'+
                '<div class="each-img-div" id="img'+no+'">'+
                  '<img src="' + website_url + '/api/uploaded_files/tourist_destination_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'+
              '</div>';
        }  
      }else if (pageType === 'entertainment') {
        for (var i = 0; i < get_all_pix.length; i++) {
          no++;
          var pictureFilename = get_all_pix[i];
          text += 
              '<div class="inner-img-div" onclick="_view_preview_img('+"'"+'img'+no+"'"+')">'+
                '<div class="each-img-div" id="img'+no+'">'+
                  '<img src="' + website_url + '/api/uploaded_files/entertainment_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'+
              '</div>';
        }  
      }else if (pageType === 'sport') {
        for (var i = 0; i < get_all_pix.length; i++) {
          no++;
          var pictureFilename = get_all_pix[i];
          text += 
              '<div class="inner-img-div" onclick="_view_preview_img('+"'"+'img'+no+"'"+')">'+
                '<div class="each-img-div" id="img'+no+'">'+
                  '<img src="' + website_url + '/api/uploaded_files/sport_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'+
              '</div>';
        }  
      }else if (pageType === 'culture') {
        for (var i = 0; i < get_all_pix.length; i++) {
          no++;
          var pictureFilename = get_all_pix[i];
          text += 
              '<div class="inner-img-div" onclick="_view_preview_img('+"'"+'img'+no+"'"+')">'+
                '<div class="each-img-div" id="img'+no+'">'+
                  '<img src="' + website_url + '/api/uploaded_files/culture_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'+
            '</div>';
      }  
      }else if (pageType === 'tradition') {
        for (var i = 0; i < get_all_pix.length; i++) {
          no++;
          var pictureFilename = get_all_pix[i];
          text += 
              '<div class="inner-img-div" onclick="_view_preview_img('+"'"+'img'+no+"'"+')">'+
                '<div class="each-img-div" id="img'+no+'">'+
                  '<img src="' + website_url + '/api/uploaded_files/tradition_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'+
              '</div>';
        }  
    }else if (pageType === 'natural_tourism_products') {
      for (var i = 0; i < get_all_pix.length; i++) {
        no++;
        var pictureFilename = get_all_pix[i];
        text += 
            '<div class="inner-img-div" onclick="_view_preview_img('+"'"+'img'+no+"'"+')">'+
              '<div class="each-img-div" id="img'+no+'">'+
                '<img src="' + website_url + '/api/uploaded_files/natural_tourism_product_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
              '</div>'+
            '</div>';
      }  
    }
				$('#fetch_pix_preview_div').append(text);
			} else {

			}

      $(document).ready(function () {
        var container = $(".inner-img-container");
        var imagesCount = $(".inner-img-div").length;
        var currentIndex = 0;
        var visibleImages;
      
        // Update the number of visible images based on screen width
        function updateVisibleImages() {
          if ($(window).width() <= 767) {
            visibleImages = 3; // Set a lower number for smaller screens (adjust as needed)
          } else {
            visibleImages = 7; // Set the number of visible images for larger screens
          }
        }
      
        // Call the function initially and on window resize
        updateVisibleImages();
        $(window).resize(updateVisibleImages);
      
        // Delegate the click events to the document
        $(document).on("click", ".right-btn", function () {
          if (currentIndex < imagesCount - visibleImages) {
            currentIndex++;
            var translateValue = currentIndex * (100 / visibleImages);
            container.css("transform", "translateX(-" + translateValue + "%)");
          }
        });
      
        $(document).on("click", ".left-btn", function () {
          if (currentIndex > 0) {
            currentIndex--;
            var translateValue = currentIndex * (100 / visibleImages);
            container.css("transform", "translateX(-" + translateValue + "%)");
          }
        });
      });
   
		}
	});

}


function _get_left_event_page() {
  var action = 'fetch_left_event_api';

	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
        var fullname = info.fullname;

        $('#fullname').html(fullname);
				var text = '';

				if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_title = fetch[i].page_title;
              var page_summary = fetch[i].page_summary.substr(0, 200);
              var page_url = fetch[i].page_url;
              var date = fetch[i].updated_time;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////

              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
		
          text += 
                '<div class="sport">Event</div>'+
                '<div class="img-div">'+
                  '<img src="'+ website_url +'/uploaded_files/event_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                '</div> '+
                
                '<a href="'+ website_url +'/tourism-products/event/'+ page_url +'" title="' + page_title + '">'+
                '<div class="text-div">'+
                    '<div class="title">'+
                        '<div class="time"><i class="bi-person"></i> By: <span>'+ fullname +'</span> | <i class="bi-clock"></i> '+ formattedDate +'</div>'+
                    '</div> '+     
                    '<h2>'+ page_title +'</h2>'+
                    '<p>'+ page_summary + '...</p>'+
                '</div></a>';
						}
		    $('#fetch_left_event').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_left_event').html(text);
				}

			}
	});
}


function _get_left_tourism_prod_page() {
  var action = 'fetch_left_natural_tourism_products_api';

	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
        var fullname = info.fullname;

        $('#fullname').html(fullname);
				var text = '';

				if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var category_name = fetch[i].category_name;
              var page_title = fetch[i].page_title;
              var page_summary = fetch[i].page_summary.substr(0, 200);
              var page_url = fetch[i].page_url;
              var date = fetch[i].updated_time;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////

              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
		
          text += 
                '<div class="sport">'+ category_name +'</div>'+
                  '<div class="img-div">'+
                    '<img src="'+ website_url +'/uploaded_files/natural_tourism_product_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                  '</div> '+
                            
                  '<a href="'+ website_url +'/tourism-products/natural-tourism-products/'+ page_url +'" title="' + page_title + '">'+
                  '<div class="text-div">'+                   
                        '<div class="title">'+
                          '<div class="time"><i class="bi-person"></i> By: <span>'+ fullname +'</span> | <i class="bi-clock"></i> '+ formattedDate +'</div>'+
                        '</div> '+   
                          '<h2>'+ page_title +'</h2>'+
                          '<p>'+ page_summary + '...</p>'+                 
                  '</div>'+
                '</div></a>';   
						}
						$('#fetch_left_tourism_prod').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_left_tourism_prod').html(text);
				}

			}
	});
}


function _get_right_event() {
    var action = 'fetch_right_event_api';

	  var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
        var fullname = info.fullname;

        $('#fullname').html(fullname);
				var text = '';

				if (success == true) {
					  for (var i = 0; i < fetch.length; i++) {
              var page_title = fetch[i].page_title;
              var page_summary = fetch[i].page_summary.substr(0, 100);
              var page_url = fetch[i].page_url;
              var date = fetch[i].updated_time;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////

              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
      
          text += 
                '<a href="'+ website_url +'/tourism-products/event/'+ page_url +'" title="' + page_title + '">'+
                 '<div class="related-div">'+                            
                     '<div class="img-div">'+
                        '<img src="'+ website_url +'/uploaded_files/event_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                     '</div>'+
                      
                      '<div class="text-div">'+
                        '<h2>'+ page_title +'</h2>'+
                        '<p>'+ page_summary + '...</p>'+
                        '<div class="time"><i class="bi-person"></i> By: <span>'+ fullname +'</span> | <i class="bi-clock"></i> '+ formattedDate +'</div>'+
                     '</div>'+
                  '</div></a>';
						}
						$('#fetch_right_event').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_right_event').html(text);
				}

			}
	});
}


function _get_right_tourism_prod_page() {
    var action = 'fetch_right_natural_tourism_products_api';

	  var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;
        var fullname = info.fullname;

        $('#fullname').html(fullname);
				var text = '';

				if (success == true) {
					  for (var i = 0; i < fetch.length; i++) {
              var page_title = fetch[i].page_title;
              var page_summary = fetch[i].page_summary.substr(0, 100);
              var page_url = fetch[i].page_url;
              var date = fetch[i].updated_time;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////

              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
      
          text += 
                '<a href="'+ website_url +'/tourism-products/natural-tourism-products/'+ page_url +'" title="' + page_title + '">'+
                 '<div class="related-div">'+                            
                     '<div class="img-div">'+
                        '<img src="'+ website_url +'/uploaded_files/natural_tourism_product_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                     '</div>'+
                      
                      '<div class="text-div">'+
                        '<h2>'+ page_title +'</h2>'+
                        '<p>'+ page_summary + '...</p>'+
                        '<div class="time"><i class="bi-person"></i> By: <span>'+ fullname +'</span> | <i class="bi-clock"></i> '+ formattedDate +'</div>'+
                     '</div>'+
                  '</div></a>';
						}
						$('#fetch_right_tourism_prod').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_right_tourism_prod').html(text);
				}

			}
	});
}


function bottom_event_and_tourism_prod(pageType) {
  if (pageType == 'bottom_event') {
    var getAction = 'fetch_event_api';
  }else if (pageType == 'bottom_natural_tourism_products'){
    var getAction = 'fetch_natural_tourism_products_api';
  }
  var action = getAction;
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;

				var text = '';

				if (success == true) {
          if (pageType == 'bottom_event') {
            for (var i = 0; i < fetch.length; i++) {
              var page_title = fetch[i].page_title;
              var page_summary = fetch[i].page_summary.substr(0, 160);
              var page_url = fetch[i].page_url;
              var date = fetch[i].updated_time;
              var page_views = fetch[i].views;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////
              var page_pix  = fetch[i].page_pix;
      
						text +=
              '<div class="tent-div">'+
                '<div class="title">Event</div>'+
                '<div class="img-div">'+
                  '<img src="'+ website_url +'/uploaded_files/event_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                '</div>'+

                '<a href="'+ website_url +'/tourism-products/event/'+ page_url +'" title="' + page_title + '">'+
                '<div class="text-div">'+
                  '<h2>'+ page_title +'</h2>'+
                  '<p>'+ page_summary + '...</p>'+
                    '<button class="btn" title="Read More">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                  '<div class="time"><i class="bi-clock"></i> ' + formattedDate + ' | <i class="bi-eye-fill"></i> <span>' + page_views + ' views</span></div>'+
                '</div><a/>'+
              '</div>';		
            }			
						}
            if (pageType == 'bottom_natural_tourism_products') {
              for (var i = 0; i < fetch.length; i++) {
                var category_name = fetch[i].category_name;
                var page_title = fetch[i].page_title;
                var page_summary = fetch[i].page_summary.substr(0, 160);
                var page_url = fetch[i].page_url;
                var date = fetch[i].updated_time;
                var page_views = fetch[i].views;
                ///////////////////////////////// for date
                var originalDate = new Date(date);
                var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                var day = originalDate.getDate();
                var month = monthNames[originalDate.getMonth()];
                var year = originalDate.getFullYear();
                var formattedDate = day + ' ' + month + ' ' + year;
                /////////////////////////////////////////
                var page_pix  = fetch[i].page_pix;
        
              text +=
              
                '<div class="tent-div">'+
                  '<div class="title">'+ category_name +'</div>'+
                  '<div class="img-div">'+
                    '<img src="'+ website_url +'/uploaded_files/natural_tourism_product_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                  '</div>'+
  
                  '<a href="'+ website_url +'/tourism-products/natural-tourism-products/'+ page_url +'" title="' + page_title + '">'+
                  '<div class="text-div">'+
                    '<h2>'+ page_title +'</h2>'+
                    '<p>'+ page_summary + '...</p>'+
                      '<button class="btn" title="Read More">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                    '<div class="time"><i class="bi-clock"></i> ' + formattedDate + ' | <i class="bi-eye-fill"></i> <span>' + page_views + ' views</span></div>'+
                  '</div><a/>'+
                '</div>';		
              }			
              }
						$('#fetch_all_bottom_event_and_tourism_prod').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_all_bottom_event_and_tourism_prod').html(text);
				}

			}
	});
}


function _get_each_event_page(page_id) {
  let page_session = JSON.parse(sessionStorage.getItem("page_session"));
  if(page_session==null){
    _get_page_session_value('reload')
  }else{
  var action = 'fetch_event_api';
  var dataString = 'action=' + action + '&page_id=' + page_id + '&page_session=' + page_session;
  $.ajax({
    type: "POST",
    url: index_api,
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function (info) {
      var fetch = info.data;

      var page_title = fetch.page_title;
      var page_url = fetch.page_url;
      var fullname = info.fullname;
      var seo_keywords = fetch.seo_keywords;
      var page_summary = fetch.page_summary;
      var page_detail = fetch.page_detail;
      var page_pix = fetch.page_pix; 
      var page_views = fetch.views;
      var date = fetch.updated_time;
      var originalDate = new Date(date);
      var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      var day = originalDate.getDate();
      var month = monthNames[originalDate.getMonth()];
      var year = originalDate.getFullYear();
      var formattedDate = day + ' ' + month + ' ' + year;
      console.log(formattedDate);
 

      $('title').text(page_title);
      $('meta[name="keywords"]').attr('content', seo_keywords);
      $('meta[name="description"]').attr('content', page_summary);
      $('meta[property="og:title"]').attr('content', page_title);
      $('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/event_pix/seo_pix/" + page_pix);
      $('meta[property="og:description"]').attr('content', page_summary);
      $('meta[name="twitter:title"]').attr('content', page_title);
      $('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/event_pix/seo_pix/" + page_pix);
      $('meta[name="twitter:description"]').attr('content', page_summary);
      $('#page_title').html(page_title);
      $('#page_url').html(page_url);
      $('#page_summary').html(page_summary);
      $('#fullname').html(fullname);
      $('#page_detail').html(page_detail);
      $('#formattedDate').html(formattedDate);
      $('#page_views').html(page_views);
      _get_event_page_pix(page_pix);
    }
  });
  }
}


function _get_event_page_pix(page_pix) {
var view_page_pix = '';
if (page_pix == '') {
  view_page_pix ='<img src="' +website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ page_title +'"/>';
} else {
  view_page_pix ='<img src="'+ website_url +'/uploaded_files/event_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'" />';
}
$('#view_page_pix, #view_page_pix2').html(view_page_pix);
}






// TOURIST DESTINATION PAGE // 

function _get_main_tourist_destination_page() {
	var action = "fetch_tourist_destination_api";

	var dataString ="action=" +action;
	  $.ajax({
		type: "POST",
		url: index_api,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
      var fetch = info.data;
      var success = info.success;
      var message = info.message;

		  var text = "";
		  if (success == true) {
			for (var i = 0; i < fetch.length; i++) {
        var page_title = fetch[i].page_title;
        var page_url = fetch[i].page_url;
        var page_pix  = fetch[i].page_pix ;
        if (page_pix =='') {
          page_pix  ='default_pix.jpg';
        }
  
			  text +=
					'<div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left" data-aos-duration="1200">'+
            '<div class="countries-div pg-countries-div">'+
              '<div class="top-title">Tourist Destinations</div>'+
              '<div class="img-in pg-img">'+
                '<img src="'+ website_url +'/uploaded_files/tourist_destination_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+                                                                  
              '</div>'+ 

              '<a href="'+ website_url +'/tourism-products/tourist-destination/'+ page_url +'" title="' + page_title + '">'+
              '<div class="text-div">'+
                '<div class="inner">'+
                  '<h3>'+ page_title +'</h3> '+                                  
               '</div>'+
              '</div></a>'+
           '</div>'+                           
					'</div> ';				
			}
			  $("#fetch_main_tourist_destination").html(text);
				_call_carousel(3);			  
		  } else {
			text +=
			  '<div class="false-notification-div">'+
			  "<p> " +
			  message +
			  " </p>" +
			  "</div>";
			$("#fetch_main_tourist_destination").html(text);
		  }
		},
	  });
}


function _get_bottom_tourist_destination_page() {
	var action = 'fetch_tourist_destination_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;

				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
						var page_title = fetch[i].page_title;
						var page_summary = fetch[i].page_summary.substr(0, 160);
						var page_url = fetch[i].page_url;
            var date = fetch[i].updated_time;
            var page_views = fetch[i].views;

            ///////////////////////////////// for date
            var originalDate = new Date(date);
            var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var day = originalDate.getDate();
            var month = monthNames[originalDate.getMonth()];
            var year = originalDate.getFullYear();
            var formattedDate = day + ' ' + month + ' ' + year;
            /////////////////////////////////////////
						var page_pix  = fetch[i].page_pix;

						text +=
              '<div class="tent-div">'+
                '<div class="title">Tourist Destination</div>'+
                '<div class="img-div">'+
                  '<img src="'+ website_url +'/uploaded_files/tourist_destination_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                '</div>'+

                '<a href="'+ website_url +'/tourism-products/tourist-destination/'+ page_url +'" title="' + page_title + '">'+
                '<div class="text-div">'+
                  '<h2>'+ page_title +'</h2>'+
                  '<p>'+ page_summary + '...</p>'+
                    '<button class="btn" title="Read More">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                  '<div class="time"><i class="bi-clock"></i> ' + formattedDate + ' | <i class="bi-eye-fill"></i> <span>' + page_views + ' views</span></div>'+
                '</div><a/>'+
              '</div>';					
						}
						$('#fetch_all_tourist_destination').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_all_tourist_destination').html(text);
				}

			}
	});
}


function _get_each_tourist_destination_page(page_id) {
  let page_session = JSON.parse(sessionStorage.getItem("page_session"));
  if(page_session==null){
    _get_page_session_value('reload')
  }else{
  var action = 'fetch_tourist_destination_api';

  var dataString = 'action=' + action + '&page_id=' + page_id + '&page_session=' + page_session;
  $.ajax({
    type: "POST",
    url: index_api,
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function (info) {
      var fetch = info.data;

      var page_title = fetch.page_title;
      var page_url = fetch.page_url;
      var fullname = info.fullname;
      var seo_keywords = fetch.seo_keywords;
      var page_summary = fetch.page_summary;
      var page_detail = fetch.page_detail;
      var page_pix = fetch.page_pix;
      var page_views = fetch.views;

      var date = fetch.updated_time;
      var originalDate = new Date(date);
      var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      var day = originalDate.getDate();
      var month = monthNames[originalDate.getMonth()];
      var year = originalDate.getFullYear();
      var formattedDate = day + ' ' + month + ' ' + year;
      console.log(formattedDate);
 

      $('title').text(page_title);
      $('meta[name="keywords"]').attr('content', seo_keywords);
      $('meta[name="description"]').attr('content', page_summary);
      $('meta[property="og:title"]').attr('content', page_title);
      $('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/tourist_destination_pix/seo_pix/" + page_pix);
      $('meta[property="og:description"]').attr('content', page_summary);
      $('meta[name="twitter:title"]').attr('content', page_title);
      $('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/tourist_destination_pix/seo_pix/" + page_pix);
      $('meta[name="twitter:description"]').attr('content', page_summary);
      $('#page_title').html(page_title);
      $('#page_url').html(page_url);
      $('#page_summary').html(page_summary);
      $('#fullname').html(fullname);
      $('#page_detail').html(page_detail);
      $('#formattedDate').html(formattedDate);
      $('#page_views').html(page_views);
      _get_tourist_destination_page_pix(page_pix);
    }
  });
  }
}

function _get_tourist_destination_page_pix(page_pix) {
  var view_page_pix = '';
  if (page_pix == '') {
    view_page_pix ='<img src="' +website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ page_title +'"/>';
  } else {
    view_page_pix ='<img src="'+ website_url +'/uploaded_files/tourist_destination_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'" />';
  }
  $('#view_page_pix, #view_page_pix2').html(view_page_pix);
  }
  




  // ENTERTAINMENT PAGE // 
  function _get_top_entertainment_page() {
    var action = 'fetch_top_entertainment_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
          var fullname = info.fullname;

          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var category_name = fetch[i].category_name;
              var page_title = fetch[i].page_title;
              var page_url = fetch[i].page_url;

              var date = fetch[i].updated_time;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////

              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
      
              text += 
                  '<div class="entertainment">'+ category_name +'</div>'+
                  '<div class="img-div">'+
                    '<img src="'+ website_url +'/uploaded_files/entertainment_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                  '</div>'+
                  
                  '<a href="'+ website_url +'/tourism-products/entertainment/'+ page_url +'" title="' + page_title + '">'+
                  '<div class="text-div">'+
                      '<div class="div-in">'+
                          '<h2>'+ page_title +'</h2>'+
                          '<span class="time"><i class="bi-person"></i> By: <span>'+ fullname +'</span> | <i class="bi-clock"></i> '+ formattedDate +'</span>'+
                      '</div>'+
                  '</div></a>';    
              }
              $('#fetch_top_entertainment').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_top_entertainment').html(text);
          }
  
        }
    });
  }

  function _get_bottom_entertainment_page() {
    var action = 'fetch_bottom_entertainment_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
          var fullname = info.fullname;
          
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var category_name = fetch[i].category_name;
              var page_title = fetch[i].page_title.substr(0, 70);
              var page_url = fetch[i].page_url;

              var date = fetch[i].updated_time;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////

              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
      
              text += 
                    '<a href="'+ website_url +'/tourism-products/entertainment/'+ page_url +'" title="' + page_title + '">'+
                    '<div class="bottom-div">'+
                      '<div class="entertainment">'+ category_name +'</div>'+
                        '<div class="img-div">'+
                          '<img src="'+ website_url +'/uploaded_files/entertainment_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                        '</div>'+

                        '<div class="text-div">'+
                            '<div class="div-in">'+
                              '<span class="time"><i class="bi-person"></i> By: <span>'+ fullname +'</span> | <i class="bi-clock"></i> '+ formattedDate +'</span>'+
                                '<h2>'+ page_title +'...</h2>'+
                            '</div>'+
                        '</div>'+
                    '</div></a>';   
              }
              $('#fetch_bottom_entertainment').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_bottom_entertainment').html(text);
          }
  
        }
    });
  }


  function _get_main_bottom_entertainment_page() {
    var action = 'fetch_entertainment_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var category_name = fetch[i].category_name;
              var page_title = fetch[i].page_title;
              var page_summary = fetch[i].page_summary.substr(0, 160);
              var page_url = fetch[i].page_url;
              var date = fetch[i].updated_time;
              var page_views = fetch[i].views;

              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////
              var page_pix  = fetch[i].page_pix;
                  
              text +=
                
                '<div class="tent-div">'+
                  '<div class="title ent-title">'+ category_name +'</div>'+
                  '<div class="img-div">'+
                    '<img src="'+ website_url +'/uploaded_files/entertainment_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                  '</div>'+
  
                  '<a href="'+ website_url +'/tourism-products/entertainment/'+ page_url +'" title="' + page_title + '">'+
                  '<div class="text-div">'+
                    '<h2>'+ page_title +'</h2>'+
                    '<p>'+ page_summary + '...</p>'+
                      '<button class="btn" title="Read More">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                    '<div class="time"><i class="bi-clock"></i> ' + formattedDate + ' | <i class="bi-eye-fill"></i> <span>' + page_views + ' views</span></div>'+
                  '</div><a/>'+
                '</div>';					
              }
              $('#fetch_all_entertainment').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_entertainment').html(text);
          }
  
        }
    });
  }


  function _get_each_entertainment_page(page_id) {
    let page_session = JSON.parse(sessionStorage.getItem("page_session"));
    if(page_session==null){
      _get_page_session_value('reload')
    }else{
    var action = 'fetch_entertainment_api';
  
    var dataString = 'action=' + action + '&page_id=' + page_id + '&page_session=' + page_session;
    $.ajax({
      type: "POST",
      url: index_api,
      data: dataString,
      dataType: 'json',
      cache: false,
      success: function (info) {
        var fetch = info.data;
  
        var page_title = fetch.page_title;
        var page_url = fetch.page_url;
        var fullname = info.fullname;
        var seo_keywords = fetch.seo_keywords;
        var page_summary = fetch.page_summary;
        var page_detail = fetch.page_detail;
        var page_pix = fetch.page_pix;
        var page_views = fetch.views;
  
        var date = fetch.updated_time;
        var originalDate = new Date(date);
        var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var day = originalDate.getDate();
        var month = monthNames[originalDate.getMonth()];
        var year = originalDate.getFullYear();
        var formattedDate = day + ' ' + month + ' ' + year;
        console.log(formattedDate);
   
  
        $('title').text(page_title);
        $('meta[name="keywords"]').attr('content', seo_keywords);
        $('meta[name="description"]').attr('content', page_summary);
        $('meta[property="og:title"]').attr('content', page_title);
        $('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/entertainment_pix/seo_pix/" + page_pix);
        $('meta[property="og:description"]').attr('content', page_summary);
        $('meta[name="twitter:title"]').attr('content', page_title);
        $('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/entertainment_pix/seo_pix/" + page_pix);
        $('meta[name="twitter:description"]').attr('content', page_summary);
        $('#page_title').html(page_title);
        $('#page_url').html(page_url);
        $('#page_summary').html(page_summary);
        $('#fullname').html(fullname);
        $('#page_detail').html(page_detail);
        $('#formattedDate').html(formattedDate);
        $('#page_views').html(page_views);
        _get_entertainment_page_pix(page_pix);
      }
    });
  }
}
  
  function _get_entertainment_page_pix(page_pix) {
    var view_page_pix = '';
    if (page_pix == '') {
      view_page_pix ='<img src="' +website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ page_title +'"/>';
    } else {
      view_page_pix ='<img src="'+ website_url +'/uploaded_files/entertainment_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'" />';
    }
    $('#view_page_pix, #view_page_pix2').html(view_page_pix);
  }
    
  
  
  // SPORT PAGE // 
  function _get_left_sport_page() {
    var action = 'fetch_left_sport_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
          var fullname = info.fullname;
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var category_name = fetch[i].category_name;
              var page_title = fetch[i].page_title;
              var page_url = fetch[i].page_url;

              var date = fetch[i].updated_time;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////

              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
      
              text += 
                    '<div class="sport">'+ category_name +'</div>'+
                    '<div class="img-div">'+
                      '<img src="'+ website_url +'/uploaded_files/sport_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                    '</div>'+ 
                    
                    '<a href="'+ website_url +'/tourism-products/sport/'+ page_url +'" title="' + page_title + '">'+
                    '<div class="text-div">'+
                        '<div class="div-in">'+             
                            '<h2>'+ page_title +'</h2>'+
                            '<span class="time"><i class="bi-person"></i> By: <span>'+ fullname +'</span> | <i class="bi-clock"> </i>'+ formattedDate +'</span>'+
                        '</div>'+
                    '</div></a>';  
              }
              $('#fetch_left_sport').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_left_sport').html(text);
          }
  
        }
    });
  }


  function _get_right_sport_page() {
    var action = 'fetch_right_sport_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
          var fullname = info.fullname;

          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var category_name = fetch[i].category_name;
              var page_title = fetch[i].page_title;
              var page_url = fetch[i].page_url;

              var date = fetch[i].updated_time;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////

              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }
      
              text += 
                    '<a href="'+ website_url +'/tourism-products/sport/'+ page_url +'" title="' + page_title + '">'+
                    '<div class="related-div">'+
                        '<div class="sport">'+ category_name +'</div>'+
                        '<div class="img-div">'+
                          '<img src="'+ website_url +'/uploaded_files/sport_pix/seo_pix/'+ page_pix +'" alt="' + page_title + '"/>'+
                        '</div>'+

                        '<div class="text-div">'+
                            '<div class="div-in">'+
                                '<h2>'+ page_title +'</h2>'+
                                '<span class="time"><i class="bi-person"></i> By: <span>'+ fullname +'</span> | <i class="bi-clock"> </i>'+ formattedDate +'</span>'+
                            '</div>'+
                        '</div>'+
                    '</div></a>';
              }
              $('#fetch_right_sport').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_right_sport').html(text);
          }
  
        }
    });
  }



  function _get_main_bottom_sport_page() {
    var action = 'fetch_sport_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var category_name = fetch[i].category_name;
              var page_title = fetch[i].page_title;
              var page_summary = fetch[i].page_summary.substr(0, 160);
              var page_url = fetch[i].page_url;
              var date = fetch[i].updated_time;
              var page_views = fetch[i].views;
              ///////////////////////////////// for date
              var originalDate = new Date(date);
              var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
              var day = originalDate.getDate();
              var month = monthNames[originalDate.getMonth()];
              var year = originalDate.getFullYear();
              var formattedDate = day + ' ' + month + ' ' + year;
              /////////////////////////////////////////
              var page_pix  = fetch[i].page_pix;

              text +=
                '<div class="tent-div">'+
                  '<div class="title ent-title">'+ category_name +'</div>'+
                  '<div class="img-div">'+
                    '<img src="'+ website_url +'/uploaded_files/sport_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                  '</div>'+
  
                  '<a href="'+ website_url +'/tourism-products/sport/'+ page_url +'" title="' + page_title + '">'+
                  '<div class="text-div">'+
                    '<h2>'+ page_title +'</h2>'+
                    '<p>'+ page_summary + '...</p>'+
                      '<button class="btn" title="Read More">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                    '<div class="time"><i class="bi-clock"></i> ' + formattedDate + ' | <i class="bi-eye-fill"></i> <span>' + page_views + ' views</span></div>'+
                  '</div><a/>'+
                '</div>';					
              }
              $('#fetch_all_sport').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_sport').html(text);
          }
  
        }
    });
  }


  function _get_each_sport_page(page_id) {
    let page_session = JSON.parse(sessionStorage.getItem("page_session"));
    if(page_session==null){
      _get_page_session_value('reload')
    }else{
    var action = 'fetch_sport_api';
  
    var dataString = 'action=' + action + '&page_id=' + page_id + '&page_session=' + page_session;
    $.ajax({
      type: "POST",
      url: index_api,
      data: dataString,
      dataType: 'json',
      cache: false,
      success: function (info) {
        var fetch = info.data;
  
        var page_title = fetch.page_title;
        var page_url = fetch.page_url;
        var fullname = info.fullname;
        var seo_keywords = fetch.seo_keywords;
        var page_summary = fetch.page_summary;
        var page_detail = fetch.page_detail;
        var page_pix = fetch.page_pix;
        var page_views = fetch.views;
  
        var date = fetch.updated_time;
        var originalDate = new Date(date);
        var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var day = originalDate.getDate();
        var month = monthNames[originalDate.getMonth()];
        var year = originalDate.getFullYear();
        var formattedDate = day + ' ' + month + ' ' + year;
        console.log(formattedDate);
   
  
        $('title').text(page_title);
        $('meta[name="keywords"]').attr('content', seo_keywords);
        $('meta[name="description"]').attr('content', page_summary);
        $('meta[property="og:title"]').attr('content', page_title);
        $('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/sport_pix/seo_pix/" + page_pix);
        $('meta[property="og:description"]').attr('content', page_summary);
        $('meta[name="twitter:title"]').attr('content', page_title);
        $('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/sport_pix/seo_pix/" + page_pix);
        $('meta[name="twitter:description"]').attr('content', page_summary);
        $('#page_title').html(page_title);
        $('#page_url').html(page_url);
        $('#page_summary').html(page_summary);
        $('#fullname').html(fullname);
        $('#page_detail').html(page_detail);
        $('#formattedDate').html(formattedDate);
        $('#page_views').html(page_views);
        _get_sport_page_pix(page_pix);
      }
    });
  }
}
  
  function _get_sport_page_pix(page_pix) {
    var view_page_pix = '';
    if (page_pix == '') {
      view_page_pix ='<img src="' +website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ page_title +'"/>';
    } else {
      view_page_pix ='<img src="'+ website_url +'/uploaded_files/sport_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'" />';
    }
    $('#view_page_pix, #view_page_pix2').html(view_page_pix);
  }
    


  // CULTURE PAGE // 
function _get_main_culture() {
	var action = "fetch_culture_api";

	var dataString ="action=" +action;
	  $.ajax({
		type: "POST",
		url: index_api,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
      var fetch = info.data;
      var success = info.success;
      var message = info.message;

		  var text = "";
		  if (success == true) {
			for (var i = 0; i < fetch.length; i++) {
        var category_name = fetch[i].category_name;
        var page_title = fetch[i].page_title.substr(0, 68);
        var page_summary = fetch[i].page_summary.substr(0, 130);
        var page_url = fetch[i].page_url;
        var page_pix  = fetch[i].page_pix ;
        if (page_pix =='') {
          page_pix  ='default_pix.jpg';
        }
  
			  text +=
              '<div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left" data-aos-duration="1200">'+
                '<div class="culture-div">'+
                    '<div class="inner-title">Culture</div>'+
                    '<div class="image-div">'+   
                      '<img src="'+ website_url +'/uploaded_files/culture_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+                                                                                              
                    '</div>'+

                    '<div class="text-div">'+
                        '<div class="div-in">'+
                            '<div class="title">'+ category_name +'</div>'+
                            '<h2>'+ page_title +'...</h2> '+     
                            '<p>'+ page_summary +'...</p> '+ 
                            '<a href="'+ website_url +'/tourism-products/culture/'+ page_url +'" title="' + page_title + '">'+
                            '<button class="btn" title="READ MORE">READ MORE <i class="bi-arrow-right"></i></button></a>'+
                        '</div>'+
                    '</div>'+
                '</div>'+                      
              '</div>'; 				
			}
			  $("#fetch_main_culture").html(text);
				_call_carousel(1);			  
		  } else {
			text +=
			  '<div class="false-notification-div">'+
			  "<p> " +
			  message +
			  " </p>" +
			  "</div>";
			$("#fetch_main_culture").html(text);
		  }
		},
	  });
}


function _get_bottom_culture_page() {
	var action = 'fetch_culture_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;

				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
            var category_name = fetch[i].category_name;
						var page_title = fetch[i].page_title;
						var page_summary = fetch[i].page_summary.substr(0, 160);
						var page_url = fetch[i].page_url;
            var date = fetch[i].updated_time;
            var page_views = fetch[i].views;

            ///////////////////////////////// for date
            var originalDate = new Date(date);
            var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var day = originalDate.getDate();
            var month = monthNames[originalDate.getMonth()];
            var year = originalDate.getFullYear();
            var formattedDate = day + ' ' + month + ' ' + year;
            /////////////////////////////////////////
						var page_pix  = fetch[i].page_pix;
		
						text +=
             
              '<div class="tent-div">'+
                '<div class="title">'+ category_name +'</div>'+
                '<div class="img-div">'+
                  '<img src="'+ website_url +'/uploaded_files/culture_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                '</div>'+

                '<a href="'+ website_url +'/tourism-products/culture/'+ page_url +'" title="' + page_title + '">'+
                '<div class="text-div">'+
                  '<h2>'+ page_title +'</h2>'+
                  '<p>'+ page_summary + '...</p>'+
                    '<button class="btn" title="Read More">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                  '<div class="time"><i class="bi-clock"></i> ' + formattedDate + ' | <i class="bi-eye-fill"></i> <span>' + page_views + ' views</span></div>'+
                '</div><a/>'+
              '</div>';					
						}
						$('#fetch_all_culture').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_all_culture').html(text);
				}

			}
	});
}



function _get_each_culture_page(page_id) {
  let page_session = JSON.parse(sessionStorage.getItem("page_session"));
  if(page_session==null){
    _get_page_session_value('reload')
  }else{
  var action = 'fetch_culture_api';

  var dataString = 'action=' + action + '&page_id=' + page_id + '&page_session=' + page_session;
  $.ajax({
    type: "POST",
    url: index_api,
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function (info) {
      var fetch = info.data;

      var page_title = fetch.page_title;
      var page_url = fetch.page_url;
      var fullname = info.fullname;
      var seo_keywords = fetch.seo_keywords;
      var page_summary = fetch.page_summary;
      var page_detail = fetch.page_detail;
      var page_pix = fetch.page_pix;
      var page_views = fetch.views;

      var date = fetch.updated_time;
      var originalDate = new Date(date);
      var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      var day = originalDate.getDate();
      var month = monthNames[originalDate.getMonth()];
      var year = originalDate.getFullYear();
      var formattedDate = day + ' ' + month + ' ' + year;
      console.log(formattedDate);
 

      $('title').text(page_title);
      $('meta[name="keywords"]').attr('content', seo_keywords);
      $('meta[name="description"]').attr('content', page_summary);
      $('meta[property="og:title"]').attr('content', page_title);
      $('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/culture_pix/seo_pix/" + page_pix);
      $('meta[property="og:description"]').attr('content', page_summary);
      $('meta[name="twitter:title"]').attr('content', page_title);
      $('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/culture_pix/seo_pix/" + page_pix);
      $('meta[name="twitter:description"]').attr('content', page_summary);
      $('#page_title').html(page_title);
      $('#page_url').html(page_url);
      $('#page_summary').html(page_summary);
      $('#fullname').html(fullname);
      $('#page_detail').html(page_detail);
      $('#formattedDate').html(formattedDate);
      $('#page_views').html(page_views);
      _get_culture_page_pix(page_pix);
    }
  });
  }
}

function _get_culture_page_pix(page_pix) {
  var view_page_pix = '';
  if (page_pix == '') {
    view_page_pix ='<img src="' +website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ page_title +'"/>';
  } else {
    view_page_pix ='<img src="'+ website_url +'/uploaded_files/culture_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'" />';
  }
  $('#view_page_pix, #view_page_pix2').html(view_page_pix);
}
  



  
  // TRADITION PAGE // 
function _get_main_tradition() {
	var action = "fetch_tradition_api";

	var dataString ="action=" +action;
	  $.ajax({
		type: "POST",
		url: index_api,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
      var fetch = info.data;
      var success = info.success;
      var message = info.message;

		  var text = "";
		  if (success == true) {
			for (var i = 0; i < fetch.length; i++) {
        var category_name = fetch[i].category_name;
        var page_title = fetch[i].page_title;
        var page_summary = fetch[i].page_summary.substr(0, 100);
        var page_url = fetch[i].page_url;
        var page_pix  = fetch[i].page_pix ;
        if (page_pix =='') {
          page_pix  ='default_pix.jpg';
        }
  
			  text +=
                '<div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">'+
                  '<div class="tradition-div pg-tradition-div">'+
                    '<div class="inner-title">Tradition</div>'+
                    '<div class="image-div pg-img-div">'+   
                      '<img src="'+ website_url +'/uploaded_files/tradition_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+                                                                                                                           
                    '</div>'+

                    '<div class="text-div pg-text-div">'+
                      '<div class="in">'+
                        '<div class="title">'+ category_name +'</div>'+

                        '<h2>'+ page_title +'</h2> '+  
                        '<p>'+ page_summary +'...</p> '+ 
                        '<a href="'+ website_url +'/tourism-products/tradition/'+ page_url +'" title="' + page_title + '">'+
                        '<button class="btn" title="READ MORE">READ MORE <i class="bi-arrow-right"></i></button></a>'+
                      '</div>'+
                    '</div>'+
                  '</div> '+                     
                '</div>';      			
			}
			  $("#fetch_main_tradition").html(text);
				_call_carousel(2);			  
		  } else {
			text +=
			  '<div class="false-notification-div">'+
			  "<p> " +
			  message +
			  " </p>" +
			  "</div>";
			$("#fetch_main_tradition").html(text);
		  }
		},
	  });
}



function _get_bottom_tradition_page() {
	var action = 'fetch_tradition_api';
	var dataString = 'action=' + action;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;
				var message = info.message;

				var text = '';

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
            var category_name = fetch[i].category_name;
						var page_title = fetch[i].page_title;
						var page_summary = fetch[i].page_summary.substr(0, 160);
						var page_url = fetch[i].page_url;
            var date = fetch[i].updated_time;
            var page_views = fetch[i].views;

            ///////////////////////////////// for date
            var originalDate = new Date(date);
            var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var day = originalDate.getDate();
            var month = monthNames[originalDate.getMonth()];
            var year = originalDate.getFullYear();
            var formattedDate = day + ' ' + month + ' ' + year;
            /////////////////////////////////////////
						var page_pix  = fetch[i].page_pix;
		
						text +=
              '<div class="tent-div">'+
                '<div class="title">'+ category_name +'</div>'+
                '<div class="img-div">'+
                  '<img src="'+ website_url +'/uploaded_files/tradition_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                '</div>'+

                '<a href="'+ website_url +'/tourism-products/tradition/'+ page_url +'" title="' + page_title + '">'+
                '<div class="text-div">'+
                  '<h2>'+ page_title +'</h2>'+
                  '<p>'+ page_summary + '...</p>'+
                    '<button class="btn" title="Read More">READ MORE <i class="bi-chevron-double-right"></i></button></a>'+
                  '<div class="time"><i class="bi-clock"></i> ' + formattedDate + ' | <i class="bi-eye-fill"></i> <span>' + page_views + '  views</span></div>'+
                '</div><a/>'+
              '</div>';					
						}
						$('#fetch_all_tradition').html(text);
				} else {
					text +=
						'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
						'</div>';
					$('#fetch_all_tradition').html(text);
				}

			}
	});
}


function _get_each_tradition_page(page_id) {
  let page_session = JSON.parse(sessionStorage.getItem("page_session"));
  if(page_session==null){
    _get_page_session_value('reload')
  }else{
  var action = 'fetch_tradition_api';

  var dataString = 'action=' + action + '&page_id=' + page_id + '&page_session=' + page_session;
  $.ajax({
    type: "POST",
    url: index_api,
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function (info) {
      var fetch = info.data;

      var page_title = fetch.page_title;
      var page_url = fetch.page_url;
      var fullname = info.fullname;
      var seo_keywords = fetch.seo_keywords;
      var page_summary = fetch.page_summary;
      var page_detail = fetch.page_detail;
      var page_pix = fetch.page_pix;
      var page_views = fetch.views;

      var date = fetch.updated_time;
      var originalDate = new Date(date);
      var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      var day = originalDate.getDate();
      var month = monthNames[originalDate.getMonth()];
      var year = originalDate.getFullYear();
      var formattedDate = day + ' ' + month + ' ' + year;
      console.log(formattedDate);
 

      $('title').text(page_title);
      $('meta[name="keywords"]').attr('content', seo_keywords);
      $('meta[name="description"]').attr('content', page_summary);
      $('meta[property="og:title"]').attr('content', page_title);
      $('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/tradition_pix/seo_pix/" + page_pix);
      $('meta[property="og:description"]').attr('content', page_summary);
      $('meta[name="twitter:title"]').attr('content', page_title);
      $('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/tradition_pix/seo_pix/" + page_pix);
      $('meta[name="twitter:description"]').attr('content', page_summary);
      $('#page_title').html(page_title);
      $('#page_url').html(page_url);
      $('#page_summary').html(page_summary);
      $('#fullname').html(fullname);
      $('#page_detail').html(page_detail);
      $('#formattedDate').html(formattedDate);
      $('#page_views').html(page_views);
      _get_tradition_page_pix(page_pix);
    }
  });
  } 
}

function _get_tradition_page_pix(page_pix) {
  var view_page_pix = '';
  if (page_pix == '') {
    view_page_pix ='<img src="' +website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ page_title +'"/>';
  } else {
    view_page_pix ='<img src="'+ website_url +'/uploaded_files/tradition_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'" />';
  }
  $('#view_page_pix, #view_page_pix2').html(view_page_pix);
  }



  function _get_each_natural_tourism_products_page(page_id) {
    let page_session = JSON.parse(sessionStorage.getItem("page_session"));
    if(page_session==null){
      _get_page_session_value('reload')
    }else{
    var action = 'fetch_natural_tourism_products_api';
  
    var dataString = 'action=' + action + '&page_id=' + page_id + '&page_session=' + page_session;
    $.ajax({
      type: "POST",
      url: index_api,
      data: dataString,
      dataType: 'json',
      cache: false,
      success: function (info) {
        var fetch = info.data;
  
        var page_title = fetch.page_title;
        var page_url = fetch.page_url;
        var fullname = info.fullname;
        var seo_keywords = fetch.seo_keywords;
        var page_summary = fetch.page_summary;
        var page_detail = fetch.page_detail;
        var page_pix = fetch.page_pix;
        var page_views = fetch.views;
        var date = fetch.updated_time;
        var originalDate = new Date(date);
        var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var day = originalDate.getDate();
        var month = monthNames[originalDate.getMonth()];
        var year = originalDate.getFullYear();
        var formattedDate = day + ' ' + month + ' ' + year;
        console.log(formattedDate);
   
  
        $('title').text(page_title);
        $('meta[name="keywords"]').attr('content', seo_keywords);
        $('meta[name="description"]').attr('content', page_summary);
        $('meta[property="og:title"]').attr('content', page_title);
        $('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/natural_tourism_product_pix/seo_pix/" + page_pix);
        $('meta[property="og:description"]').attr('content', page_summary);
        $('meta[name="twitter:title"]').attr('content', page_title);
        $('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/natural_tourism_product_pix/seo_pix/" + page_pix);
        $('meta[name="twitter:description"]').attr('content', page_summary);
        $('#page_title').html(page_title);
        $('#page_url').html(page_url);
        $('#page_summary').html(page_summary);
        $('#fullname').html(fullname);
        $('#page_detail').html(page_detail);
        $('#formattedDate').html(formattedDate);
        $('#page_views').html(page_views);
        _get_natural_tourism_product_page_pix(page_pix);
      }
    });
  }
}
  
  
  function _get_natural_tourism_product_page_pix(page_pix) {
  var view_page_pix = '';
  if (page_pix == '') {
    view_page_pix ='<img src="' +website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ page_title +'"/>';
  } else {
    view_page_pix ='<img src="'+ website_url +'/uploaded_files/natural_tourism_product_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'" />';
  }
  $('#view_page_pix, #view_page_pix2').html(view_page_pix);
  }




    
  // BLOG  PAGE // 

  function _get_index_blog() {
		var action = "fetch_index_blog_api";
	
		var dataString ="action=" + action;
			
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: "json",
			cache: false,
			success: function (info) {
			
				var fetch = info.data;
				var success = info.success;
	
				var text = "";
		
				if (success == true) {
				for (var i = 0; i < fetch.length; i++) {
					var blog_title= fetch[i].blog_title.substr(0, 55);
					var blog_summary= fetch[i].blog_summary.substr(0, 120);
					var blog_url = fetch[i].blog_url;
					var blog_pix = fetch[i].blog_pix;
          var blog_views = fetch[i].views;

					var date = fetch[i].updated_time;
					var originalDate = new Date(date);
					var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
					var day = originalDate.getDate();
					var month = monthNames[originalDate.getMonth()];
					var year = originalDate.getFullYear();
					var formattedDate = day + ' ' + month + ' ' + year;
					console.log(formattedDate);

					if (blog_pix=='') {
					blog_pix ='defaults.jpg';
					}

					text +=
					
						'<div class="blog-div" data-aos="fade-up" data-aos-duration="1000">'+
						'<a href="' +website_url +'/blog/'+ blog_url +'" title="'+ blog_title +'">'+
							'<div class="image-div">'+
								'<img src="' +website_url +'/uploaded_files/blog_pix/'+ blog_pix +'" alt="'+ blog_title +'"/>'+
							'</div>'+

							'<div class="text-div">'+
								
								'<h3>' + blog_title +'...</h3>'+
								'<p>'+ blog_summary+'...</p>'+
								'<div class="count"><i class="bi-calendar3"></i> '+ formattedDate +' <span>|</span> <i class="bi-eye-fill"></i> '+ blog_views +' VIEWS</div>'+
							'</div>'+
							'</a>'+
						'</div>';
				}
				$('#fetch_index_blog').html(text);
				}

			},
		});
	}





  function _get_fetch_each_blog(blog_id) {
    let page_session = JSON.parse(sessionStorage.getItem("page_session"));
    if(page_session==null){
      _get_page_session_value('reload')
    }else{
		var action = 'fetch_blog_api';

		var dataString = 'action=' + action + '&blog_id=' + blog_id + '&page_session=' + page_session;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				
				var fullname = info.fullname;
				var blog_title = fetch.blog_title;
				var seo_keywords = fetch.seo_keywords;
				var blog_summary = fetch.blog_summary;
				var blog_detail = fetch.blog_detail;
				var blog_pix = fetch.blog_pix;
        var blog_views = fetch.views;

				var date = fetch.updated_time;
				var originalDate = new Date(date);
				var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
				var day = originalDate.getDate();
				var month = monthNames[originalDate.getMonth()];
				var year = originalDate.getFullYear();
				var formattedDate = day + ' ' + month + ' ' + year;
				console.log(formattedDate);

				$('title').text(blog_title);
				$('meta[name="keywords"]').attr('content', seo_keywords);
				$('meta[name="description"]').attr('content', blog_summary);
				$('meta[property="og:title"]').attr('content', blog_title);
				$('meta[property="og:image"]').attr('content', website_url +"/uploaded_files/blog_pix/" +blog_pix);
				$('meta[property="og:description"]').attr('content', blog_summary);
				$('meta[name="twitter:title"]').attr('content', blog_title);
				$('meta[name="twitter:image"]').attr('content', website_url +"/uploaded_files/blog_pix/" +blog_pix);
				$('meta[name="twitter:description"]').attr('content', blog_summary);
				$('#fullname').html(fullname);
        $('#blog_views').html(blog_views);
				$('#blog_title').html(blog_title);
				$('#li_blog_title').html(blog_title);
				$('#blog_summary').html(blog_summary);
				$('#blog_detail').html(blog_detail);
				$('#formattedDate').html(formattedDate);
				_get_blog_pix(blog_pix);
			},
		});
  }
	}


	
function _get_blog_pix(blog_pix) {
	var view_blog_pix = "";
	if (blog_pix == "") {
		view_blog_pix ='<img src="' + website_url +'/uploaded_files/default_pix/default_pix.jpg" alt="'+ blog_title +'"/>';
	} else {
		view_blog_pix =
		'<img src="' + website_url +"/uploaded_files/blog_pix/" +blog_pix +'" alt="'+ blog_title +'" />';
	}
	$('#view_blog_pix').html(view_blog_pix);
  }
  


  function _get_fetch_related_blog() {
		var action = "fetch_index_blog_api";

		var dataString ="action=" + action;
			
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: "json",
			cache: false,
			success: function (info) {
				var fetch = info.data;
				var success = info.success;

				var text = "";
		
				if (success == true) {
				for (var i = 0; i < fetch.length; i++) {
					var blog_title= fetch[i].blog_title;
					var blog_url = fetch[i].blog_url;
					var blog_pix = fetch[i].blog_pix;

					var date = fetch[i].updated_time;
					var originalDate = new Date(date);
					var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
					var day = originalDate.getDate();
					var month = monthNames[originalDate.getMonth()];
					var year = originalDate.getFullYear();
					var formattedDate = day + ' ' + month + ' ' + year;
					console.log(formattedDate);

					if (blog_pix=='') {
					blog_pix ='defaults.jpg';
					}

					text +=
              '<a href="' +website_url +'/blog/'+ blog_url +'" title="'+ blog_title +'">'+
              '<div class="related-popular-div">'+
                  '<div class="img-div">'+
                    '<img src="' +website_url +'/uploaded_files/blog_pix/'+ blog_pix +'" alt="'+ blog_title +'"/>'+
                  '</div>'+

                  '<div class="text-div">'+
                    '<h4>' + blog_title +'</h4></a>'+
                    '<span>Updated On: ' + formattedDate +'</span>'+
                  '</div>'+
              '</div></a>';
				}
				$("#fetch_related_blog").html(text);
				}
				
			},
		});
	}




  function _get_fetch_blog() {
		var action = "fetch_blog_api";
		var cat_id = $("#cat_id").val();
		var search_txt = $("#search_txt").val();
	
		if (search_txt.length > 2 || search_txt == "") {
		$('#fetch_blog').html('<div class="ajax-loader"><img src="' +website_url +'/all-images/images/ajax-loader.gif"/></div>').fadeIn("fast");
		var dataString ="action=" + action + "&cat_id=" + cat_id+ "&search_txt=" +search_txt;
		 
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: "json",
			cache: false,
			success: function (info) {
			  var fetch = info.data;
			  var success = info.success;
			  var message = info.message;

			  var text = "";
	  
			  if (success == true) {
				for (var i = 0; i < fetch.length; i++) {
				  var blog_title= fetch[i].blog_title;
				  var blog_summary= fetch[i].blog_summary.substr(0, 120);
				  var blog_url = fetch[i].blog_url;
				  var blog_pix = fetch[i].blog_pix;
          var blog_views = fetch[i].views;

					var date = fetch[i].updated_time;
					var originalDate = new Date(date);
					var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
					var day = originalDate.getDate();
					var month = monthNames[originalDate.getMonth()];
					var year = originalDate.getFullYear();
					var formattedDate = day + ' ' + month + ' ' + year;
					console.log(formattedDate);

				  if (blog_pix=='') {
					blog_pix ='defaults.jpg';
				  }

				  text +=
						'<div class="blog-div main-blog-div" data-aos="fade-up" data-aos-duration="1000">'+
						'<a href="' +website_url +'/blog/'+ blog_url +'" title="'+ blog_title +'">'+
							'<div class="image-div">'+
								'<img src="' +website_url +'/uploaded_files/blog_pix/'+ blog_pix +'" alt="'+ blog_title +'"/>'+
							'</div>'+

							'<div class="text-div main-text-div">'+
								
								'<h3>' + blog_title +'</h3>'+
								'<p>'+ blog_summary+'...</p>'+
								'<div class="count"><i class="bi-calendar3"></i> '+ formattedDate +' <span>|</span> <i class="bi-eye-fill"></i>'+ blog_views +' VIEWS</div>'+
							'</div>'+
							'</a>'+
						'</div>'; 
				  
				}
				$('#fetch_blog').html(text);
			  } else {
				text +=
				  '<div class="false-notification-div">' +
				  "<p> " +
				  message +
				  " </p>" +
				  "</div>";
				$('#fetch_blog').html(text);
			  }
			},
		  });
		} else {
			text +=
			  '<div class="false-notification-div">' +
			  "<p> " +
			  message1 +
			  " </p>" +
			  "</div>";
			$('#fetch_blog').html(text);
		  }
	  }

    function _get_cat(select_id) {
      var action = 'fetch_cat_api';
      var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var success = info.success;
          var message = info.message;
          var fetch = info.data;
    
          var text = '';
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var cat_id = fetch[i].cat_id;
              var cat_desc = fetch[i].cat_desc;
              /// for status update profile loop option ////
              text += '<option value="' + cat_id + '" >' + cat_desc.toUpperCase() + '</option>';
            }
          } else {
            text = '<option>' + message + '</option>';
          }
          $('#' + select_id).append(text);
    
        }
      });
    }
    

    function _get_fetch_faq() {
      var action = "fetch_faq_api";
      var cat_id = $("#cat_id").val();
      var search_txt = $("#search_txt").val();
  
      if (search_txt.length > 2 || search_txt == "") {
        $('#fetch_faq').html('<div class="ajax-loader"><img src="' +website_url +'/all-images/images/ajax-loader.gif"/></div>').fadeIn("fast");
      var dataString ="action=" + action + "&cat_id=" + cat_id+ "&search_txt=" +search_txt;
        
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: "json",
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
          var no=0;
          var text = "";
      
          if (success == true) {
          for (var i = 0; i < fetch.length; i++) {
            no++;
            var faq_question= fetch[i].faq_question;
            var faq_answer= fetch[i].faq_answer;
        
            text +=
              '<div class="quest-faq-div" id="view'+no+'">'+
                '<div class="faq-title-text" onclick="_collapse('+"'"+'view'+no+"'"+')">'+
                  '<h2>'+ faq_question +'</h2>'+
                  '<div class="expand-div" id="'+"view"+no+"num"+'">&nbsp;<i class="bi-plus"></i>&nbsp;</div>'+
      
                  '<div class="faq-answer-div faq-answer-display" id="'+"view"+no+"answer"+'" style="display: none;" >'+
                    '<p>'+ faq_answer +'</p> '+
                  '</div>'+
                '</div>'+
              '</div>';				
          }
          $("#fetch_faq").html(text);
          } else {
          text +=
            '<div class="false-notification-div">' +
            "<p> " +
            message +
            " </p>" +
            "</div>";
          $("#fetch_faq").html(text);
          }
        },
        });
      } else {
        text +=
          '<div class="false-notification-div">' +
          "<p> " +
          message +
          " </p>" +
          "</div>";
        $("#fetch_faq").html(text);
        }
      }


  function _get_fetch_index_faq() {
    var action = "fetch_index_faq_api";
    var dataString ="action=" + action;
    $.ajax({
      type: "POST",
      url: index_api,
      data: dataString,
      dataType: "json",
      cache: false,
      success: function (info) {
        var fetch = info.data;
        var success = info.success;

        var no=0;
        var text = "";
    
        if (success == true) {
        for (var i = 0; i < fetch.length; i++) {
          no++;
          var faq_question= fetch[i].faq_question;
          var faq_answer= fetch[i].faq_answer;
      
          text +=
            '<div class="quest-faq-div" id="view'+no+'">'+
              '<div class="faq-title-text" onclick="_collapse('+"'"+'view'+no+"'"+')">'+
                '<h2>'+ faq_question +'</h2>'+
                '<div class="expand-div" id="'+"view"+no+"num"+'">&nbsp;<i class="bi-plus"></i>&nbsp;</div>'+
              
              
                '<div class="faq-answer-div faq-answer-display" id="'+"view"+no+"answer"+'" style="display: none;" >'+
                  '<p>'+ faq_answer +'</p> '+
                '</div>'+
              '</div>'+
            '</div>';
        }
        $("#fetch_index_faq").html(text);
        }
      },
      });
  }



  function _get_fetch_tourism_products_videos(page_id, video_id) {
    var action = "fetch_tourism_product_video_api";
    var dataString = "action=" + action + '&page_id=' + page_id + '&video_id=' + video_id;
    $.ajax({
      type: "POST",
      url: index_api,
      data: dataString,
      dataType: "json",
      cache: false,
      success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;

          var text = '';
  
          if (success == true) {
              for (var i = 0; i < fetch.length; i++) {
                var video_title = fetch[i].video_title;
                var video_url = fetch[i].video_url;
    
                var videoIdMatch = video_url.match(/(?:\/|v=)([a-zA-Z0-9_-]{11})/);
                var videoId = videoIdMatch ? videoIdMatch[1] : null;
    
                text +=                 	
                    '<div class="video-div">'+	
                        '<iframe width=100%" height="170" src="https://youtube.com/embed/' + videoId + '" title="'+video_title+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>' +                   
                    '</div>';  
              }
              $('#video_preview_div').html(text);
          } else {
            text +=
            '<div class="false-notification-div">' +
            "<p> " +
            message +
            " </p>" +
            "</div>";
            $('#video_preview_div').html(text);
          }
      },
    });
  }





// GALLERY PAGE //
  function _get_tourist_attraction_gallery() {
    var action = 'fetch_tourist_attraction_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view album" onclick="_open_preview_with_id(' + "'tourist-attraction-images'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Tourist Attraction Album</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/tourist_attraction_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_tourist_attraction_gallery').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_tourist_attraction_gallery').html(text);
          }
  
        }
    });
  }


  function _get_fetch_each_tourist_attraction_gallery_pix(page_id) {
    var action = 'fetch_tourist_attraction_api';

		var dataString = 'action=' + action + '&page_id=' + page_id;
		$.ajax({
			type: "POST",
			url: index_api,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var fetch = info.data;
				
				var page_pix = fetch.page_pix;
        $('#preview-image img').attr('src', website_url + '/uploaded_files/tourist_attraction_pix/seo_pix/' + page_pix);
			},
		});
	}


  function _fetch_tourism_products_gallery_pix(page_id,pageType) {
    action = 'fetch_tourism_attraction_other_pix_api';
  
    var form_data = new FormData();
    form_data.append('action', action);
    form_data.append('page_id', page_id);
  
    $.ajax({
      type: 'POST',
      url: index_api,
      data: form_data,
      contentType: false,
      dataType: "json",
      cache: false,
      processData: false,
      success: function (info) {
        var success = info.success;
        var message = info.message;

        var no=0;
        var text = '';
        if (success == true) {
          var get_all_pix = info.get_all_pix;
          if (pageType === 'tourist-attraction-gallery') {
            for (var i = 0; i < get_all_pix.length; i++) {
              no++;
              var pictureFilename = get_all_pix[i];
  
              text += 
                  '<div class="each-img" title="click to preview image" id="image'+no+'" onclick="_view_gallery_preview_img(event,'+"'"+'image'+no+"'"+')">'+
                    '<img src="' + website_url + '/api/uploaded_files/tourist_attraction_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                  '</div>';                
            } 
          }else if (pageType === 'tradition-gallery') {
            for (var i = 0; i < get_all_pix.length; i++) {
              no++;
              var pictureFilename = get_all_pix[i];
              text += 
                '<div class="each-img" title="click to preview image" id="image'+no+'" onclick="_view_gallery_preview_img(event,'+"'"+'image'+no+"'"+')">'+
                '<img src="' + website_url + '/api/uploaded_files/tradition_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'; 
            }  
          }else if (pageType === 'entertainment-gallery') {
            for (var i = 0; i < get_all_pix.length; i++) {
              no++;
              var pictureFilename = get_all_pix[i];
              text += 
                '<div class="each-img" title="click to preview image" id="image'+no+'" onclick="_view_gallery_preview_img(event,'+"'"+'image'+no+"'"+')">'+
                  '<img src="' + website_url + '/api/uploaded_files/entertainment_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'; 
            }  
          }else if (pageType === 'event-gallery') {
            for (var i = 0; i < get_all_pix.length; i++) {
              no++;
              var pictureFilename = get_all_pix[i];
              text += 
                '<div class="each-img" title="click to preview image" id="image'+no+'" onclick="_view_gallery_preview_img(event,'+"'"+'image'+no+"'"+')">'+
                '<img src="' + website_url + '/api/uploaded_files/event_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'; 
            } 
          }else if (pageType === 'culture-gallery') {
            for (var i = 0; i < get_all_pix.length; i++) {
              no++;
              var pictureFilename = get_all_pix[i];
              text += 
                '<div class="each-img" title="click to preview image" id="image'+no+'" onclick="_view_gallery_preview_img(event,'+"'"+'image'+no+"'"+')">'+
                '<img src="' + website_url + '/api/uploaded_files/culture_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'; 
            }  
          }else if (pageType === 'sport-gallery') {
            for (var i = 0; i < get_all_pix.length; i++) {
              no++;
              var pictureFilename = get_all_pix[i];
              text += 
                '<div class="each-img" title="click to preview image" id="image'+no+'" onclick="_view_gallery_preview_img(event,'+"'"+'image'+no+"'"+')">'+
                '<img src="' + website_url + '/api/uploaded_files/sport_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'; 
            }  
          }else if (pageType === 'natural-tourism-products-gallery') {
            for (var i = 0; i < get_all_pix.length; i++) {
              no++;
              var pictureFilename = get_all_pix[i];
              text += 
                '<div class="each-img" title="click to preview image" id="image'+no+'" onclick="_view_gallery_preview_img(event,'+"'"+'image'+no+"'"+')">'+
                '<img src="' + website_url + '/api/uploaded_files/natural_tourism_product_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'; 
            }    
          }else if (pageType === 'tourist-destination-gallery') {
            for (var i = 0; i < get_all_pix.length; i++) {
              no++;
              var pictureFilename = get_all_pix[i];
              text += 
                '<div class="each-img" title="click to preview image" id="image'+no+'" onclick="_view_gallery_preview_img(event,'+"'"+'image'+no+"'"+')">'+
                '<img src="' + website_url + '/api/uploaded_files/tourist_destination_pix/other_pix/' + pictureFilename +'" alt="' + pictureFilename + '"/>'+
                '</div>'; 
            }
          }   
            $('#fetch_gallery_preview_div').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_gallery_preview_div').html(text);
          }
        }
      });
    }


    function _get_tradition_gallery() {
      var action = 'fetch_tradition_api';
      var dataString = 'action=' + action;
        $.ajax({
          type: "POST",
          url: index_api,
          data: dataString,
          dataType: 'json',
          cache: false,
          success: function (info) {
            var fetch = info.data;
            var success = info.success;
            var message = info.message;
    
            var text = '';
    
            if (success == true) {
              for (var i = 0; i < fetch.length; i++) {
                var page_id = fetch[i].page_id;
                var page_title = fetch[i].page_title;
                var page_pix  = fetch[i].page_pix ;
                if (page_pix =='') {
                  page_pix  ='default_pix.jpg';
                }
                text +=
                    '<div class="main-gallery-div" title="click to view album" onclick="_open_preview_with_id(' + "'tradition-images'" + "," + "'" + page_id + "'" + ')">'+
                      '<div class="title">Tradition Album</div>'+
                      '<div class="image-div">'+
                        '<img src="'+ website_url +'/uploaded_files/tradition_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                      '</div>'+
  
                      '<div class="icon-div">'+
                        '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                      '</div>'+
  
                      '<div class="text-div">'+
                        '<h4>'+ page_title +'</h4>'+
                      '</div>'+
                    '</div>';			
                }
                $('#fetch_all_tradition_gallery').html(text);
            } else {
              text +=
                '<div class="false-notification-div">' +
                  '<p> ' + message + ' </p>' +
                '</div>';
              $('#fetch_all_tradition_gallery').html(text);
            }
    
          }
      });
    }


    function _get_fetch_each_tradition_gallery_pix(page_id) {
      var action = 'fetch_tradition_api';
  
      var dataString = 'action=' + action + '&page_id=' + page_id;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          
          var page_pix = fetch.page_pix;
          $('#preview-image img').attr('src', website_url + '/uploaded_files/tradition_pix/seo_pix/' + page_pix);
        },
      });
    }

    function _get_entertainment_gallery() {
      var action = 'fetch_entertainment_api';
      var dataString = 'action=' + action;
        $.ajax({
          type: "POST",
          url: index_api,
          data: dataString,
          dataType: 'json',
          cache: false,
          success: function (info) {
            var fetch = info.data;
            var success = info.success;
            var message = info.message;
    
            var text = '';
    
            if (success == true) {
              for (var i = 0; i < fetch.length; i++) {
                var page_id = fetch[i].page_id;
                var page_title = fetch[i].page_title;
                var page_pix  = fetch[i].page_pix ;
                if (page_pix =='') {
                  page_pix  ='default_pix.jpg';
                }
                text +=
                    '<div class="main-gallery-div" title="click to view album" onclick="_open_preview_with_id(' + "'entertainment-images'" + "," + "'" + page_id + "'" + ')">'+
                      '<div class="title">Entertaiment Album</div>'+
                      '<div class="image-div">'+
                        '<img src="'+ website_url +'/uploaded_files/entertainment_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                      '</div>'+
  
                      '<div class="icon-div">'+
                        '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                      '</div>'+
  
                      '<div class="text-div">'+
                        '<h4>'+ page_title +'</h4>'+
                      '</div>'+
                    '</div>';			
                }
                $('#fetch_all_entertainment_gallery').html(text);
            } else {
              text +=
                '<div class="false-notification-div">' +
                  '<p> ' + message + ' </p>' +
                '</div>';
              $('#fetch_all_entertainment_gallery').html(text);
            }
    
          }
      });
    }

    
    function _get_fetch_each_entertainment_gallery_pix(page_id) {
      var action = 'fetch_entertainment_api';
  
      var dataString = 'action=' + action + '&page_id=' + page_id;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          
          var page_pix = fetch.page_pix;
          $('#preview-image img').attr('src', website_url + '/uploaded_files/entertainment_pix/seo_pix/' + page_pix);
        },
      });
    }

    function _get_event_gallery() {
      var action = 'fetch_event_api';
      var dataString = 'action=' + action;
        $.ajax({
          type: "POST",
          url: index_api,
          data: dataString,
          dataType: 'json',
          cache: false,
          success: function (info) {
            var fetch = info.data;
            var success = info.success;
            var message = info.message;
    
            var text = '';
    
            if (success == true) {
              for (var i = 0; i < fetch.length; i++) {
                var page_id = fetch[i].page_id;
                var page_title = fetch[i].page_title;
                var page_pix  = fetch[i].page_pix ;
                if (page_pix =='') {
                  page_pix  ='default_pix.jpg';
                }
                text +=
                    '<div class="main-gallery-div" title="click to view album" onclick="_open_preview_with_id(' + "'event-images'" + "," + "'" + page_id + "'" + ')">'+
                      '<div class="title">Event Album</div>'+
                      '<div class="image-div">'+
                        '<img src="'+ website_url +'/uploaded_files/event_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                      '</div>'+
  
                      '<div class="icon-div">'+
                        '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                      '</div>'+
  
                      '<div class="text-div">'+
                        '<h4>'+ page_title +'</h4>'+
                      '</div>'+
                    '</div>';			
                }
                $('#fetch_all_event_gallery').html(text);
            } else {
              text +=
                '<div class="false-notification-div">' +
                  '<p> ' + message + ' </p>' +
                '</div>';
              $('#fetch_all_event_gallery').html(text);
            }
    
          }
      });
    }

    
    function _get_fetch_each_event_gallery_pix(page_id) {
      var action = 'fetch_event_api';
  
      var dataString = 'action=' + action + '&page_id=' + page_id;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          
          var page_pix = fetch.page_pix;
          $('#preview-image img').attr('src', website_url + '/uploaded_files/event_pix/seo_pix/' + page_pix);
        },
      });
    }

    function _get_culture_gallery() {
      var action = 'fetch_culture_api';
      var dataString = 'action=' + action;
        $.ajax({
          type: "POST",
          url: index_api,
          data: dataString,
          dataType: 'json',
          cache: false,
          success: function (info) {
            var fetch = info.data;
            var success = info.success;
            var message = info.message;
    
            var text = '';
    
            if (success == true) {
              for (var i = 0; i < fetch.length; i++) {
                var page_id = fetch[i].page_id;
                var page_title = fetch[i].page_title;
                var page_pix  = fetch[i].page_pix ;
                if (page_pix =='') {
                  page_pix  ='default_pix.jpg';
                }
                text +=
                    '<div class="main-gallery-div" title="click to view album" onclick="_open_preview_with_id(' + "'culture-images'" + "," + "'" + page_id + "'" + ')">'+
                      '<div class="title">Culture Album</div>'+
                      '<div class="image-div">'+
                        '<img src="'+ website_url +'/uploaded_files/culture_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                      '</div>'+
  
                      '<div class="icon-div">'+
                        '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                      '</div>'+
  
                      '<div class="text-div">'+
                        '<h4>'+ page_title +'</h4>'+
                      '</div>'+
                    '</div>';			
                }
                $('#fetch_all_culture_gallery').html(text);
            } else {
              text +=
                '<div class="false-notification-div">' +
                  '<p> ' + message + ' </p>' +
                '</div>';
              $('#fetch_all_culture_gallery').html(text);
            }
    
          }
      });
    }

    
    function _get_fetch_each_culture_gallery_pix(page_id) {
      var action = 'fetch_culture_api';
  
      var dataString = 'action=' + action + '&page_id=' + page_id;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          
          var page_pix = fetch.page_pix;
          $('#preview-image img').attr('src', website_url + '/uploaded_files/culture_pix/seo_pix/' + page_pix);
        },
      });
    }

    function _get_sport_gallery() {
      var action = 'fetch_sport_api';
      var dataString = 'action=' + action;
        $.ajax({
          type: "POST",
          url: index_api,
          data: dataString,
          dataType: 'json',
          cache: false,
          success: function (info) {
            var fetch = info.data;
            var success = info.success;
            var message = info.message;
    
            var text = '';
    
            if (success == true) {
              for (var i = 0; i < fetch.length; i++) {
                var page_id = fetch[i].page_id;
                var page_title = fetch[i].page_title;
                var page_pix  = fetch[i].page_pix ;
                if (page_pix =='') {
                  page_pix  ='default_pix.jpg';
                }
                text +=
                    '<div class="main-gallery-div" title="click to view album" onclick="_open_preview_with_id(' + "'sport-images'" + "," + "'" + page_id + "'" + ')">'+
                      '<div class="title">Sport Album</div>'+
                      '<div class="image-div">'+
                        '<img src="'+ website_url +'/uploaded_files/sport_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                      '</div>'+
  
                      '<div class="icon-div">'+
                        '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                      '</div>'+
  
                      '<div class="text-div">'+
                        '<h4>'+ page_title +'</h4>'+
                      '</div>'+
                    '</div>';			
                }
                $('#fetch_all_sport_gallery').html(text);
            } else {
              text +=
                '<div class="false-notification-div">' +
                  '<p> ' + message + ' </p>' +
                '</div>';
              $('#fetch_all_sport_gallery').html(text);
            }
    
          }
      });
    }

    
    function _get_fetch_each_sport_gallery_pix(page_id) {
      var action = 'fetch_sport_api';
  
      var dataString = 'action=' + action + '&page_id=' + page_id;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          
          var page_pix = fetch.page_pix;
          $('#preview-image img').attr('src', website_url + '/uploaded_files/sport_pix/seo_pix/' + page_pix);
        },
      });
    }

    function _get_natural_tourism_products_gallery() {
      var action = 'fetch_natural_tourism_products_api';
      var dataString = 'action=' + action;
        $.ajax({
          type: "POST",
          url: index_api,
          data: dataString,
          dataType: 'json',
          cache: false,
          success: function (info) {
            var fetch = info.data;
            var success = info.success;
            var message = info.message;
    
            var text = '';
    
            if (success == true) {
              for (var i = 0; i < fetch.length; i++) {
                var page_id = fetch[i].page_id;
                var page_title = fetch[i].page_title;
                var page_pix  = fetch[i].page_pix ;
                if (page_pix =='') {
                  page_pix  ='default_pix.jpg';
                }
                text +=
                    '<div class="main-gallery-div" title="click to view album" onclick="_open_preview_with_id(' + "'natural-tourism-products-images'" + "," + "'" + page_id + "'" + ')">'+
                      '<div class="title">Natural Tourism Products Album</div>'+
                      '<div class="image-div">'+
                        '<img src="'+ website_url +'/uploaded_files/natural_tourism_product_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                      '</div>'+
  
                      '<div class="icon-div">'+
                        '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                      '</div>'+
  
                      '<div class="text-div">'+
                        '<h4>'+ page_title +'</h4>'+
                      '</div>'+
                    '</div>';			
                }
                $('#fetch_all_natural_tourism_products').html(text);
            } else {
              text +=
                '<div class="false-notification-div">' +
                  '<p> ' + message + ' </p>' +
                '</div>';
              $('#fetch_all_natural_tourism_products').html(text);
            }
    
          }
      });
    }

    
    function _get_fetch_each_natural_tourism_products_gallery_pix(page_id) {
      var action = 'fetch_natural_tourism_products_api';
  
      var dataString = 'action=' + action + '&page_id=' + page_id;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          
          var page_pix = fetch.page_pix;
          $('#preview-image img').attr('src', website_url + '/uploaded_files/natural_tourism_product_pix/seo_pix/' + page_pix);
        },
      });
    }

    

    function _get_tourist_destination_gallery() {
      var action = 'fetch_tourist_destination_api';
      var dataString = 'action=' + action;
        $.ajax({
          type: "POST",
          url: index_api,
          data: dataString,
          dataType: 'json',
          cache: false,
          success: function (info) {
            var fetch = info.data;
            var success = info.success;
            var message = info.message;
    
            var text = '';
    
            if (success == true) {
              for (var i = 0; i < fetch.length; i++) {
                var page_id = fetch[i].page_id;
                var page_title = fetch[i].page_title;
                var page_pix  = fetch[i].page_pix ;
                if (page_pix =='') {
                  page_pix  ='default_pix.jpg';
                }
                text +=
                    '<div class="main-gallery-div" title="click to view album" onclick="_open_preview_with_id(' + "'tourist-destination-images'" + "," + "'" + page_id + "'" + ')">'+
                      '<div class="title">Tourist Destination Album</div>'+
                      '<div class="image-div">'+
                        '<img src="'+ website_url +'/uploaded_files/tourist_destination_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                      '</div>'+
  
                      '<div class="icon-div">'+
                        '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                      '</div>'+
  
                      '<div class="text-div">'+
                        '<h4>'+ page_title +'</h4>'+
                      '</div>'+
                    '</div>';			
                }
                $('#fetch_all_tourist_destination').html(text);
            } else {
              text +=
                '<div class="false-notification-div">' +
                  '<p> ' + message + ' </p>' +
                '</div>';
              $('#fetch_all_tourist_destination').html(text);
            }
    
          }
      });
    }



    function _get_fetch_each_tourist_destination_gallery_pix(page_id) {
      var action = 'fetch_tourist_destination_api';
    
      var data = {
        action: action,
        page_id: page_id
      };
    
      $.ajax({
        type: "POST",
        url: index_api,
        data: data,
        dataType: 'json',
        cache: false,
        success: function (response) {
          var responseData = response.data;
          var pagePix = responseData.page_pix;

          $('#preview-image img').attr('src', website_url + '/uploaded_files/tourist_destination_pix/seo_pix/' + pagePix);
        },
      });
    }
    





    // VIDEOS PAGE //
  function _get_tourist_attraction_videos() {
    var action = 'fetch_tourist_attraction_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view videos" onclick="_open_preview_with_id(' + "'tourist-attraction-videos'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Tourist Attraction Videos</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/tourist_attraction_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_tourist_attraction_videos').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_tourist_attraction_videos').html(text);
          }
  
        }
    });
  }



  function _get_event_videos() {
    var action = 'fetch_event_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view videos" onclick="_open_preview_with_id(' + "'event-videos'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Event Videos</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/event_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_event_videos').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_event_videos').html(text);
          }
  
        }
    });
  }


  function _get_tradition_videos() {
    var action = 'fetch_tradition_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view videos" onclick="_open_preview_with_id(' + "'tradition-videos'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Tradition Videos</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/tradition_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_tradition_videos').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_tradition_videos').html(text);
          }
  
        }
    });
  }



  function _get_culture_videos() {
    var action = 'fetch_culture_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view videos" onclick="_open_preview_with_id(' + "'culture-videos'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Culture Videos</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/culture_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_culture_videos').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_culture_videos').html(text);
          }
  
        }
    });
  }


  function _get_sport_videos() {
    var action = 'fetch_sport_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view videos" onclick="_open_preview_with_id(' + "'sport-videos'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Sport Videos</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/sport_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_sport_videos').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_sport_videos').html(text);
          }
  
        }
    });
  }




  function _get_entertainment_videos() {
    var action = 'fetch_entertainment_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view videos" onclick="_open_preview_with_id(' + "'entertainment-videos'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Entertainment Videos</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/entertainment_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_entertainment_videos').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_entertainment_videos').html(text);
          }
  
        }
    });
  }



  function _get_natural_tourism_products_videos() {
    var action = 'fetch_natural_tourism_products_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view videos" onclick="_open_preview_with_id(' + "'natural-tourism-product-videos'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Natural Tourism Products Videos</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/natural_tourism_product_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_natural_tourism_products_videos').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_natural_tourism_products_videos').html(text);
          }
  
        }
    });
  }



  function _get_tourist_destination_videos() {
    var action = 'fetch_tourist_destination_api';
    var dataString = 'action=' + action;
      $.ajax({
        type: "POST",
        url: index_api,
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function (info) {
          var fetch = info.data;
          var success = info.success;
          var message = info.message;
  
          var text = '';
  
          if (success == true) {
            for (var i = 0; i < fetch.length; i++) {
              var page_id = fetch[i].page_id;
              var page_title = fetch[i].page_title;
              var page_pix  = fetch[i].page_pix ;
              if (page_pix =='') {
                page_pix  ='default_pix.jpg';
              }

              text +=
                  '<div class="main-gallery-div" title="click to view videos" onclick="_open_preview_with_id(' + "'tourist-destination-videos'" + "," + "'" + page_id + "'" + ')">'+
                    '<div class="title">Tourist Destination Videos</div>'+
                    '<div class="image-div">'+
                      '<img src="'+ website_url +'/uploaded_files/tourist_destination_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+
                    '</div>'+

                    '<div class="icon-div">'+
                      '<img src="'+ website_url +'/all-images/images/icon2.png" alt="First Culture Logo"/>'+
                    '</div>'+

                    '<div class="text-div">'+
                      '<h4>'+ page_title +'</h4>'+
                    '</div>'+
                  '</div>';		
                  
              }             
              $('#fetch_all_tourist_destination_videos').html(text);
          } else {
            text +=
              '<div class="false-notification-div">' +
                '<p> ' + message + ' </p>' +
              '</div>';
            $('#fetch_all_tourist_destination_videos').html(text);
          }
  
        }
    });
  }




  function _get_index_random_pages() {
    var action = "fetch_tourist_attraction_api";
    var dataString ="action=" +action;
      $.ajax({
      type: "POST",
      url: index_api,
      data: dataString,
      dataType: "json",
      cache: false,
      success: function (info) {
        var fetch = info.data;
        var success = info.success;
        var message = info.message;
  
        var text = "";
        if (success == true) {
        for (var i = 0; i < fetch.length; i++) {
          var page_id = fetch[i].page_id;
          var page_title = fetch[i].page_title;
          var page_pix  = fetch[i].page_pix ;
          if (page_pix =='') {
            page_pix  ='default_pix.jpg';
          }
    
          text +=
              '<div class="cg-carousel__slide js-carousel__slide"  data-aos="fade-left" data-aos-duration="1200">'+
                  '<div class="galleries" title="click to view album" onclick="_open_preview_with_id(' + "'tourist-attraction-images'" + "," + "'" + page_id + "'" + ')">'+
                      '<div class="img-div">'+
                        '<img src="'+ website_url +'/uploaded_files/tourist_attraction_pix/seo_pix/'+ page_pix +'" alt="'+ page_title +'"/>'+                                                                  
                      '</div>'+
                      
                      '<div class="text-div">'+
                          '<div class="inner">'+
                            '<h3>'+ page_title +'</h3> '+                                  
                          '</div>'+
                      '</div>'+ 
                  '</div>'+                      
              '</div> ';			
        }
          $("#fetch_index_gallery").html(text);
          _call_carousel(4);			  
        } else {
        text +=
          '<div class="false-notification-div">'+
          "<p> " +
          message +
          " </p>" +
          "</div>";
        $("#fetch_index_gallery").html(text);
        }
      },
      });
  }




  function _get_tourism_products_count() {
    var action = "fetch_tourism_products_count_api";
    var dataString = "action=" + action;
    $.ajax({
      type: "POST",
      url: index_api,
      data: dataString,
      dataType: "json",
      cache: false,
      success: function (info) {
          var fetch = info.data;       
          var total_active_tourism_attraction_count = fetch.total_active_tourism_attraction_count;
          var total_active_entertainment_count = fetch.total_active_entertainment_count;
          var total_active_sport_count = fetch.total_active_sport_count;
          var total_active_culture_count = fetch.total_active_culture_count;
          var total_active_tradition_count = fetch.total_active_tradition_count;
          var total_active_natural_tourism_product_count = fetch.total_active_natural_tourism_product_count;
          var total_active_tourism_destination_count = fetch.total_active_tourism_destination_count;
          var total_active_event_count = fetch.total_active_event_count;
 
          $('#total_active_tourism_attraction_count').html(total_active_tourism_attraction_count);
          $('#total_active_entertainment_count').html(total_active_entertainment_count);
          $('#total_active_sport_count').html(total_active_sport_count);
          $('#total_active_culture_count').html(total_active_culture_count);
          $('#total_active_tradition_count').html(total_active_tradition_count);
          $('#total_active_natural_tourism_product_count').html(total_active_natural_tourism_product_count);
          $('#total_active_tourism_destination_count').html(total_active_tourism_destination_count);
          $('#total_active_event_count').html(total_active_event_count);
      },
    });
  }