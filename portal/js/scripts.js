///////////20/12/2023////////////////////////// by Afolabi Abayomi


jQuery(document).ready(function () {
	$.backstretch(["all-images/images/bg.jpg"], { duration: 4000, fade: 2000 });
});


function numberwithcomma(amount) {
	return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function _logOut() {
	document.getElementById('logoutform').submit();
}

////////start navigation///////////////////////////////////////////////////////
function _open_menu() {
	var x = document.getElementById("menu-div");
	if (x.innerHTML === '<i class="fa fa-navicon (alias)"></i>') {
		x.innerHTML = '<i class="fa fa-close"></i>';
		$('#side-nav-div').animate({ 'left': '0px' }, 200);
	} else {
		x.innerHTML = '<i class="fa fa-navicon (alias)"></i>';
		_close_all_nav()
	}
}

function _alert_close() {
	$('#get-more-div').html('').fadeOut(200);
}

function _alert_close_2() {
	$('#get-more-div').html('').fadeOut(200);
	_get_page('all_staffs', 'all_staffs', 'staff', '');
}
function _alert_secondary_close() {
	$('#get-more-div-secondary').html('').fadeOut(200);
}
function _toggle_profile_pix_div() {
	$('.toggle-profile-div').toggle('slow');
}

function _close_all_nav() {
	_close_nav();
	_remove_class();
}

function _close_nav() {
	$('.side-nav-bg-sub-div').animate({ 'left': '-100%' }, 400);
	var x = document.getElementById("menu-div");
	x.innerHTML = '<i class="fa fa-navicon (alias)"></i>';
	$('#side-nav-div').animate({ 'left': '-100px' }, 200);
}



function _placeholder(search_txt, search_content) {
	superplaceholder({
		el: search_txt,
		sentences: search_content,
		options: {
			letterDelay: 80,
			loop: true,
			startOnFocus: false
		}
	});
}

function _get_sub_nav(sub_nav) {
	if (sub_nav == '') {
		_close_nav();
	} else {
		$('#link-staff, #link-customer, #link-products, #link-orders, #link-publish, #link-app_settings').css({ 'display': 'none' });
		$('#link-' + sub_nav).css({ 'display': 'block' });
		$('.side-nav-bg-sub-div').animate({ 'left': '100px' }, 200);
	}
}
function _remove_class() {
	$('#top-dashboard, #top-profile').removeClass('active-li');
	$('#side-dashboard, #side-staff, #side-customer, #side-products, #side-orders, #side-publish, #side-newsletter, #side-report, #side-app_settings').removeClass('active-li');
	$('#mobile-dashboard, #mobile-staff, #mobile-customer, #mobile-products, #mobile-orders, #mobile-publish, #mobile-newsletter, #mobile-report, #mobile-app_settings').removeClass('active-li');
}

function _get_active_link(divid, sub_nav, title_text) {
	_remove_class()

	$('#side-' + divid).addClass('active-li');
	$('#top-' + divid).addClass('active-li');
	$('#mobile-' + divid).addClass('active-li');
	$('#page-title').html($('#_' + title_text).html());


	_get_sub_nav(sub_nav);
}

function _next_page(next_id, icon, divid) {
	$("#account_settings_id,#account_detail,#channge_password").hide();
	$("#" + next_id).fadeIn(1000);
	$("#panel-title").html($("#" + icon).html() + $("#" + divid).html());
}

function _prev_page(next_id) {
	$("#account_settings_id,#account_detail,#channge_password").hide();
	$("#" + next_id).fadeIn(1000);
	$("#panel-title").html(
		'<i class="bi-gear"></i> </span id="app_text"> APP SETTINGS'
	);
}


function _collapse(div_id) {
	var x = document.getElementById(div_id + "num");
	if (x.innerHTML === '&nbsp;<i class="bi-plus"></i>&nbsp;') {
		x.innerHTML = '&nbsp;<i class="bi-dash"></i>&nbsp;';
	} else {
		x.innerHTML = '&nbsp;<i class="bi-plus"></i>&nbsp;';
		//  $('#'+div_id).removeClass('active-faq');
	}
	$('#' + div_id + 'answer').slideToggle('slow');
}

////////end navigation/////////////////////////




// Dashboard JS code //////////
function getDashboardInfo(value, label, iconClass, getPage) {
	return `
      <div class="statistics-div" onClick="${getPage}">
        <div class="div-in">
          <div class="text-div">
		  
		  
            <h4>${value}</h4>
            <span>${label}</span>
          </div>
          <div class="icon-div"><i class="${iconClass}"></i></div>
        </div>
      </div>
    `;
}
{/* <div class="top-count"> 
		  	<div class="round"></div>
			  <span>${value}</span>
		  </div> */}


function _get_dashboard_content() {

	var action = "fetch_dashboard_count_api";
	var dataString = "action=" + action;

	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetch = info.data;

				var total_active_active_staff_count = fetch.total_active_staff_count;
				var total_active_tourism_products_count = fetch.total_active_tourism_products_count;
				var total_active_tourism_attraction_count = fetch.total_active_tourism_attraction_count;
				var total_active_entertainment_count = fetch.total_active_entertainment_count;
				var total_active_sport_count = fetch.total_active_sport_count;
				var total_active_culture_count = fetch.total_active_culture_count;
				var total_active_tradition_count = fetch.total_active_tradition_count;


				var total_active_natural_tourism_product_count = fetch.total_active_natural_tourism_product_count;
				var total_active_tourism_destination_count = fetch.total_active_tourism_destination_count;
				var total_active_event_count = fetch.total_active_event_count;
				var total_active_blog_count = fetch.total_active_blog_count;
				var total_active_faq_count = fetch.total_active_faq_count;

				$('#total_active_tourism_attraction_count').html(total_active_tourism_attraction_count);
				$('#total_active_entertainment_count').html(total_active_entertainment_count);
				$('#total_active_sport_count').html(total_active_sport_count);
				$('#total_active_culture_count').html(total_active_culture_count);
				$('#total_active_tradition_count').html(total_active_tradition_count);
				$('#total_active_natural_tourism_product_count').html(total_active_natural_tourism_product_count);
				$('#total_active_tourism_destination_count').html(total_active_tourism_destination_count);
				$('#total_active_event_count').html(total_active_event_count);
				$('#total_active_blog_count').html(total_active_blog_count);
				$('#total_active_faq_count').html(total_active_faq_count);

				// Fetch statistics data from the database
				getStatisticsCountValue(total_active_active_staff_count, total_active_tourism_products_count, total_active_tourism_attraction_count,
					total_active_entertainment_count, total_active_sport_count, total_active_culture_count, total_active_tradition_count,
					total_active_natural_tourism_product_count, total_active_tourism_destination_count, total_active_event_count,
					total_active_blog_count, total_active_faq_count
				).then((statisticsData) => {
					// Loop through the fetched data and generate HTML for each statistic item
					statisticsData.forEach((statistic) => {
						const statisticInfo = getDashboardInfo(statistic.value, statistic.label, statistic.iconClass, statistic.getPage, statistic.getId,);
						$('#statistics-container').append(statisticInfo);
					});
				});
			} else {

			}
		},
	});
}
// End Dashboard JS code //////////////// 







// SideBar JS code ////////////////
function getSideBarInfo(label, addClass, iconClass, getPage, getId) {
	return `
	<div class="nav-div ${addClass}" onClick="${getPage}" id="${getId}">
		<div class="icon"><i class="${iconClass}"></i></div> ${label}
	</div>
    `;
}

function _get_side_bar_content() {
	// Fetch statistics data from the database
	sideBarValue().then((statisticsData) => {
		// Loop through the fetched data and generate HTML for each statistic item
		statisticsData.forEach((statistic) => {
			const statisticInfo = getSideBarInfo(statistic.label, statistic.addClass, statistic.iconClass, statistic.getPage, statistic.getId);
			$('#sidebar-container').append(statisticInfo);
		});
	});
}



function _get_side_bar_mobile_content() {
	// Fetch statistics data from the database
	sideBarValue().then((statisticsData) => {
		// Loop through the fetched data and generate HTML for each statistic item
		statisticsData.forEach((statistic) => {
			const statisticInfo = getSideBarInfo(statistic.label, statistic.addClass, statistic.iconClass, statistic.getPage, statistic.getId);
			$('#side-nav-div').append(statisticInfo);
		});
	});
}
// End SideBar JS code //////////////// 









function _get_page(page, title_text, divid, sub_nav) {
	_get_active_link(divid, sub_nav, title_text);
	if (page == '') {
		//do nothing
	} else {
		$('#page-title2').html('');

		$('#page-content').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var action = 'get-page';
		var dataString = 'action=' + action + '&page=' + page;
		$.ajax({
			type: "POST",
			url: admin_portal_local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#page-content').html(html);
			}
		});
	}
}




function _get_page_with_id(page, ids) {
	if (page == '') {
		//do nothing
	} else {
		$('#page-content').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var action = 'get-page-with-id';
		var dataString = 'action=' + action + '&page=' + page + '&ids=' + ids;
		$.ajax({
			type: "POST",
			url: admin_portal_local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#page-content').html(html);
			}
		});
	}
}






function _get_form(page) {
	//	_close_all_nav();
	if (page == '') {
		//do nothing
	} else {
		$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var action = 'get-form';
		var dataString = 'action=' + action + '&page=' + page;
		$.ajax({
			type: "POST",
			url: admin_portal_local_url,
			data: dataString,
			cache: false,
			success: function (html) { $('#get-more-div').html(html); }
		});
	}
}








function _get_form_with_id(page, ids) {//NEW UPDATE
	if (page == '') {
		//do nothing
	} else {
		$('#get-more-div').html('<div class="ajax-loader"><br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var action = 'get-form-with-id';
		var dataString = 'action=' + action + '&page=' + page + '&ids=' + ids;
		$.ajax({
			type: "POST",
			url: admin_portal_local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#get-more-div').html(html);
			}
		});
	}
}









function _get_form_with_id2(page, ids, ids1) {//NEW UPDATE
	if (page == '') {
		//do nothing
	} else {
		$('#get-more-div').html('<div class="ajax-loader"><br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var action = 'get-form-with-id2';
		var dataString = 'action=' + action + '&page=' + page + '&ids=' + ids + '&ids1=' + ids1;
		$.ajax({
			type: "POST",
			url: admin_portal_local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#get-more-div').html(html);
			}
		});
	}
}




function _get_form_page_detail_with_id(page, ids) {//NEW UPDATE
	if (page == '') {
		//do nothing
	} else {
		$('#get-more-div').html('<div class="ajax-loader"><br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var action = 'get-form-page-details-with-id';
		var dataString = 'action=' + action + '&page=' + page + '&ids=' + ids;
		$.ajax({
			type: "POST",
			url: admin_portal_local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#get-more-div').html(html);
			}
		});
	}
}











function _get_page_content(page, actid, ids) {
	if (page == '') {
		//do nothing
	} else {
		$('#page_content,#page_pictures,#page_videos').removeClass('active-li');
		$('#' + actid).addClass('active-li');
		
			$('#get_page_details').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
	
		var action = 'get-page-details';
		var dataString = 'action=' + action + '&page=' + page + '&ids=' + ids;
		$.ajax({
			type: "POST",
			url: admin_portal_local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#get_page_details').html(html);
			}
		});
	}

}










function _get_form_secondary_with_id(page, ids, ids1) {
	if (page == '') {
		//do nothing
	} else {
	
		$('#get-more-div-secondary').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
	
		var action = 'get-page-details';
		var dataString = 'action=' + action + '&page=' + page + '&ids=' + ids + '&ids1=' + ids1;
		$.ajax({
			type: "POST",
			url: admin_portal_local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#get-more-div-secondary').html(html);
			}
		});
	}

}









function select_search() {
	$('.srch-select').toggle('fast');
};
function srch_custom(text) {
	$('#srch-text').html(text);
	$('.custom-srch-div').fadeIn(500);
};


$(document).ready(function () {
	window.setInterval(function () {
		//get_notification_number();
	}, 180000);
});



// function get_notification_number() {
// 	var action = 'get_notification_number';
// 	var dataString = 'action=' + action;
// 	$.ajax({
// 		type: "POST",
// 		url: local_url,
// 		data: dataString,
// 		cache: false,
// 		dataType: 'json',
// 		cache: false,
// 		success: function (data) {
// 			var scheck = data.check;
// 			if (scheck > 0) {
// 				if (scheck > 9) { var scheck = '9+'; }
// 				$('.notification').html('<i class="fa fa-bell-o"></i><div>' + scheck + '</div>');
// 			} else {
// 				$('.notification').html('<i class="fa fa-bell-o"></i><div>0</div>');
// 			}
// 		}
// 	});
// }



















///////////////////////////////////////////////////////////////

function _success_alert(alertMessage1, alertMessage2) {
	$('#success-div').html('<div><i class="bi-check"></i></div> ' + alertMessage1 + '<br /><span>' + alertMessage2 + '</span>').fadeIn(500).delay(3000).fadeOut(100);
}

function _warning_alert(alertId, alertMessage1, alertMessage2) {
	$('#' + alertId).addClass('complain');
	$('#warning-div').html('<div><i class="bi-exclamation-octagon-fill"></i></div> ' + alertMessage1 + '<br /><span>' + alertMessage2 + '</span>').fadeIn(500).delay(3000).fadeOut(100);
}



function capitalizeFirstLetterOfEachWord(inputText) {
    // Split the input text into an array of words
    var words = inputText.toLowerCase().split(' ');

    // Capitalize the first letter of each word
    for (var i = 0; i < words.length; i++) {
        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
    }

    // Join the words back into a sentence
    var result = words.join(' ');

    return result;
}
 



function _get_user_login_details(page, staff_id) {
	var action = 'fetch_staff_api';
	var dataString = 'action=' + action + '&staff_id=' + staff_id;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var getEachData = info.data;

				var staff_id = getEachData.staff_id;
				var fullname = getEachData.fullname;
				var dashboard_fullname = capitalizeFirstLetterOfEachWord(fullname);
				var email = getEachData.email;
				var mobile = getEachData.mobile;
				var address = getEachData.address;
				var created_time = getEachData.created_time;
				var last_login = getEachData.last_login;
				var status_id = getEachData.status_id;
				var status_name = getEachData.status_name;
				var role_id = getEachData.role_id;
				var role_name = capitalizeFirstLetterOfEachWord(getEachData.role_name);
				var passport = getEachData.passport;
				if (passport == '') {
					passport = 'friends.png';
				}

				if ((page == 'my_profile') || (page == 'staff_profile')) {
					$("#user_login_fullname").html(dashboard_fullname);
					$("#user_last_login_text").html(last_login);
					$("#user_status_name").html(status_name);
					if (page == 'my_profile') {
						$("#current_user_passport1").html('<img src="' + website_url + "/uploaded_files/staff_pix/" + passport + '" id="passportimg3" alt="' + dashboard_fullname + ' profile picture"/>');
					} else {
						$("#current_user_passport1").html('<img src="' + website_url + "/uploaded_files/staff_pix/" + passport + '" id="passportimg4" alt="' + dashboard_fullname + ' profile picture"/>');
					}

					$("#updt_fullname").val(fullname);
					$("#updt_mobile").val(mobile);
					$("#updt_email").val(email);
					$("#updt_address").val(address);
					$("#user_id").val(staff_id);
					$("#user_created_time").val(created_time);
					$("#user_last_login").val(last_login);
					$('#updt_status_id').val(status_id);
					$('#updt_role_id').val(role_id);

				} else {

					$("#dashboard_fullname,#mini_profile_fullname,#profile_name").html(dashboard_fullname);
					$("#mini_profile_user_id").html(staff_id);
					$("#side_role_name,#dashboard_role_name").html(role_name);
					$("#mini_profile_mobile,#user_mobile").html(mobile);
					$("#dashboard_last_login_time").html(last_login);
					_get_fetch_pix(passport, dashboard_fullname);
				}

			} else {
				_get_form('access_key_validation_info');
			}

		}
	});
}









function _get_fetch_pix(passport, dashboard_fullname) {
	var profile_login_pix = '';
	if (passport == '') {
		profile_login_pix =
			'<img id="passportimg1" src="' + website_url + '/uploaded_files/staff_pix/friends.png" alt="' + dashboard_fullname + ' Profile pix"/>' +
			'<img id="passportimg2" src="' + website_url + '/uploaded_files/staff_pix/friends.png" alt="' + dashboard_fullname + ' Profile pix"/>' +
			'<img id="passportimg3" src="' + website_url + '/uploaded_files/staff_pix/friends.png" alt="' + dashboard_fullname + ' Profile pix"/>' +
			'<img id="passportimg4" src="' + website_url + '/uploaded_files/staff_pix/friends.png" alt="' + dashboard_fullname + ' Profile pix"/>'
	} else {
		profile_login_pix =
			'<img id="passportimg1" src="' + website_url + '/uploaded_files/staff_pix/' + passport + ' " alt="' + dashboard_fullname + ' Profile pix"/>' +
			'<img id="passportimg2" src="' + website_url + '/uploaded_files/staff_pix/' + passport + '" alt="' + dashboard_fullname + ' Profile pix" />' +
			'<img id="passportimg3" src="' + website_url + '/uploaded_files/staff_pix/' + passport + '" alt="' + dashboard_fullname + ' Profile pix" />' +
			'<img id="passportimg4" src="' + website_url + '/uploaded_files/staff_pix/' + passport + '" alt="' + dashboard_fullname + ' Profile pix" />'
	}
	$('#profile_pix,#header_pix,#option_pix,#side_user_pix').html(profile_login_pix);
}







function _get_select_status(select_id, status_id) {
	text = '<option value="" selected="selected">LOADING... </option>';
	$('#' + select_id).html(text);
	var action = 'fetch_status_api';
	var dataString = 'action=' + action + '&status_id=' + status_id;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var success = info.success;
				var message = info.message;
				var getEachData = info.data;
				var text = '';
				var text = '<option value="">SELECT STATUS </option>';
				if (success == true) {
					for (var i = 0; i < getEachData.length; i++) {
						var status_id = getEachData[i].status_id;
						var status_name = getEachData[i].status_name;
						text += '<option value="' + status_id + '">' + status_name.toUpperCase() + '</option>';
					}
				} else {
					text = '<option>' + message + '</option>';
				}
				$('#' + select_id).html(text);
			} else {
				_get_form('access_key_validation_info');
			}
		}
	});
}



function _get_select_role(select_id, role_id) {
	text = '<option value="selected" selected="selected">LOADING... </option>';
	$('#' + select_id).html(text);
	var action = 'fetch_role_api';
	var dataString = 'action=' + action + '&role_id=' + role_id;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var success = info.success;
				var message = info.message;
				var getEachData = info.data;
				var text = '';
				var text = '<option value="">SELECT ROLE </option>';
				if (success == true) {
					for (var i = 0; i < getEachData.length; i++) {
						var role_id = getEachData[i].role_id;
						var role_name = getEachData[i].role_name;
						text += '<option value="' + role_id + '" selected="selected">' + role_name.toUpperCase() + '</option>';
					}
				} else {
					text = '<option>' + message + '</option>';
				}
				$('#' + select_id).html(text);
			} else {
				_get_form('access_key_validation_info');
			}
		}
	});
}














function _upload_user_pix(page, staff_id) {
	$(function () {
		user_profile_pix = {
			UpdatePreview: function (obj) {
				// if IE < 10 doesn't support FileReader
				if (!window.FileReader) {
					// don't know how to proceed to assign src to image tag
				} else {
					_upload_profile_pix(staff_id);
					var reader = new FileReader();
					var target = null;
					if (page == 'my_profile') {
						reader.onload = function (e) {
							target = e.target || e.srcElement;
							$("#passportimg1,#passportimg2,#passportimg3").prop("src", target.result);
						};
					} else if (page == 'staff_profile') {
						reader.onload = function (e) {
							target = e.target || e.srcElement;
							$("#passportimg4").prop("src", target.result);
						};
					} else {
						// do nothing
					}

					reader.readAsDataURL(obj.files[0]);
				}
			}
		};
	});
}





function _upload_profile_pix(staff_id) {

	var passport_pix = $('#passport').prop('files')[0];
	var action = 'upload_passport_api';
	var form_data = new FormData();
	form_data.append('action', action);
	form_data.append('staff_id', staff_id);
	form_data.append('passport', passport);
	form_data.append('passport', passport_pix);


	$.ajax({
		url: endPoint,
		type: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (data) {
			var message1 = data.message1;
			var message2 = data.message2;
			var passport = data.passport;
			var db_passport = data.db_passport;
			_get_pix(message1, message2, passport, db_passport);
		}
	});

}








function _get_pix(message1, message2, passport, db_passport) {
	var action = 'upload_and_unlink_passport';

	var passport_pix = $('#passport').prop('files')[0];
	var form_data = new FormData();
	form_data.append('action', action);
	form_data.append('passport', passport);
	form_data.append('passport', passport_pix);

	form_data.append('db_passport', db_passport);

	$.ajax({
		url: admin_portal_local_url,
		type: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (html) {
			$('#success-div').html('<div><i class="bi-check-all"></i></div>' + message1 + '<br /> <span>' + message2 + '</span>').fadeIn(500).delay(3000).fadeOut(100);
		}
	});

}










///// accept number ////
function isNumber_Check() {
	var e = window.event;
	var key = e.keyCode && e.which;

	if (!((key >= 48 && key <= 57) || key == 43 || key == 45)) {
		if (e.preventDefault) {
			e.preventDefault();
			$("#mobile_info").fadeIn(300);
			document.getElementById("reg_mobile", "updt_mobile").style.border = "#F00 1px solid";
		} else {
			e.returnValue = false;
		}
	} else {
		$("#mobile_info").fadeOut(300);
		document.getElementById("reg_mobile", "updt_mobile").style.border = "rgba(0, 0, 0, .1) 1px solid";
	}
}







function _reg_and_updt_staff(page, staff_id) {
	if (page == 'staff_reg') {
		var fullname = $('#reg_fullname').val();
		var email = $('#reg_email').val();
		var mobile = $('#reg_mobile').val();
		var address = $("#reg_address").val();
		var role_id = $('#reg_role_id').val();
		var status_id = $('#reg_status_id').val();

		$('#reg_fullname, #reg_email, #reg_mobile, #reg_address, #reg_role_id, #reg_status_id').removeClass('complain');

		if (fullname == '') {
			_warning_alert('reg_fullname', 'FULLNAME ERROR!', 'Fill this field to continue');

		} else if (email == '') {
			_warning_alert('reg_email', 'EMAIL ERROR!', 'Fill this field to continue');

		} else if (email.indexOf('@') <= 0) {
			_warning_alert('reg_email', 'INVALID EMAIL ADDRESS!', 'Kindly, check the email address');

		} else if (mobile == '') {
			_warning_alert('reg_mobile', 'MOBILE ERROR!', 'Fill this field to continue');

		} else if (address == '') {
			_warning_alert('reg_address', 'ADDRESS ERROR!', 'Fill this field to continue');

		} else if (role_id == '') {
			_warning_alert('reg_role_id', 'ROLE ERROR!', 'Select Fields To Continue');

		} else if (status_id == '') {
			_warning_alert('reg_status_id', 'STATUS ERROR!', 'Select Fields To Continue');

		} else {

			$('#reg_fullname, #reg_email, #reg_mobile, #reg_address, #reg_role_id, #reg_status_id').removeClass('complain');

			var btn_text = $('#submit_btn').html();
			$('#submit_btn').html('<i class="fa fa-spinner fa-spin"></i> SUBMITTING');
			document.getElementById('submit_btn').disabled = true;

			var action = "add_or_update_staff_api";
			var dataString = 'action=' + action + '&staff_id=' + staff_id + '&fullname=' + fullname + '&email=' + email + '&mobile=' + mobile + '&address=' + address + '&role_id=' + role_id + '&status_id=' + status_id;
			$.ajax({
				type: "POST",
				url: endPoint,
				dataType: 'json',
				data: dataString,
				cache: false,
				success: function (info) {
					var login_check = info.check;
					if (login_check > 0) {
						var success = info.success;
						var message1 = info.message1;
						var message2 = info.message2;
						if (success == true) {
							_success_alert(message1, message2);
							_alert_close();
							_get_page('all_staffs', 'all_staffs', 'staff', '',);
						} else {
							_warning_alert('reg_email', message1, message2);
						}
						$('#submit_btn').html(btn_text);
						document.getElementById('submit_btn').disabled = false;
					} else {
						_get_form('access_key_validation_info');
					}
				}
			});
		}

	} else if ((page == 'my_profile') || (page == 'staff_profile')) {
		var fullname = $('#updt_fullname').val();
		var email = $('#updt_email').val();
		var mobile = $('#updt_mobile').val();
		var address = $('#updt_address').val();
		var role_id = $('#updt_role_id').val();
		var status_id = $('#updt_status_id').val();

		$('#updt_fullname, #updt_email, #updt_mobile, #updt_address, #updt_role_id, #updt_status_id').removeClass('complain');

		if (fullname == '') {
			_warning_alert('updt_fullname', 'FULLNAME ERROR!', 'Fill this field to continue');

		} else if ((email == '') || ($('#updt_email').val().indexOf('@') <= 0)) {
			_warning_alert('updt_email', 'EMAIL ERROR!', 'Fill this field to continue');

		} else if (mobile == '') {
			_warning_alert('updt_mobile', 'MOBILE ERROR!', 'Fill this field to continue');

		} else if (address == '') {
			_warning_alert('updt_address', 'ADDRESS ERROR!', 'Fill this field to continue');

		} else if (role_id == '') {
			_warning_alert('updt_role_id', 'ROLE ERROR!', 'Select Fields To Continue');

		} else if (status_id == '') {
			_warning_alert('updt_status_id', 'STATUS ERROR!', 'Select Fields To Continue');

		} else {

			$('#updt_fullname, #updt_email, #updt_mobile, #updt_address, #updt_role_id, #updt_status_id').removeClass('complain');

			var btn_text = $('#update_btn').html();
			$('#update_btn').html('<i class="fa fa-spinner fa-spin"></i> UPATING');
			document.getElementById('update_btn').disabled = true;


			var action = "add_or_update_staff_api";
			var dataString = 'action=' + action + '&staff_id=' + staff_id + '&fullname=' + fullname + '&email=' + email + '&mobile=' + mobile + '&address=' + address + '&role_id=' + role_id + '&status_id=' + status_id;
			$.ajax({
				type: "POST",
				url: endPoint,
				dataType: 'json',
				data: dataString,
				cache: false,
				success: function (info) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;
					if (success == true) {
						var fullname = info.fullname;
						var status_name = info.status_name;
						if (page == 'my_profile') {
							$('#dashboard_fullname').html(fullname);
						}
						$('#user_login_fullname').html(fullname);
						$('#user_status_name').html(status_name);
						_success_alert(message1, message2);
					} else {
						_warning_alert('updt_email', message1, message2);
					}
					$('#update_btn').html(btn_text);
					document.getElementById('update_btn').disabled = false;
				}
			});
		}
	} else {
		/// do nothing
	}


}










function _search_content(page, search_id) {
	var search_txt = $("#search_txt").val();
	if (search_txt.length > 2 || search_txt == '') {
		if (page == 'all_staffs') {
			_get_fetch_all_staff(search_id);
		} else if (page == 'all_blogs') {
			_get_fetch_blog(page, search_id);
		} else if (page == 'all_faqs') {
			_get_fetch_faqs(page, search_id);

		} else {

			if ((page == 'all_tourism_attraction') || (page == 'all_tourism_destination') || (page == 'all_events')) {
				_get_tourism_products_page_content_NoCat(page, search_id);
			} else {

				if ((page == 'all_entertainment') || (page == 'all_sport') || (page == 'all_culture') || (page == 'all_tradition') || (page == 'all_natural_tourism_product')) {
					_get_fetch_category_details(page, search_id);

				} else {
					if ((page == 'all_entertainment_category_sub_details') || (page == 'all_sport_category_sub_details') || (page == 'all_culture_category_sub_details') || (page == 'all_tradition_category_sub_details')) {
						_get_tourism_products_page_content_WithCat(page, search_id, '');

					} else {
						if(page=='page_videos'){
							_get_fetch_tourism_products_videos(page, search_id, '');
						}
						// do nothing
					}
				}
			}
		}
	}
}







function _get_fetch_all_staff(staff_id) {
	var status_id = $("#status_id").val();
	var search_txt = $("#search_txt").val();

	var action = 'fetch_staff_api';
	var dataString = 'action=' + action + '&staff_id=' + staff_id + '&status_id=' + status_id + '&search_txt=' + search_txt;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetchData = info.data;
				var success = info.success;
				var message = info.message;

				var text = '';

				if (success == true) {
					for (var i = 0; i < fetchData.length; i++) {
						var staff_id = fetchData[i].staff_id;
						var inputText = fetchData[i].fullname;
						var fullname = capitalizeFirstLetterOfEachWord(inputText);
						var role_name = fetchData[i].role_name;
						var status_name = fetchData[i].status_name;
						var passport = fetchData[i].passport;
						if (passport == '') {
							passport = 'friends.png';
						}

						text +=

							'<div class="user-div" onclick="_get_form_with_id(' + "'staff_profile'" + "," + "'" + staff_id + "'" + ')">' +
							'<div class="pix-div"><img src="' + website_url + "/uploaded_files/staff_pix/" + passport + '"/></div>' +
							'<div class="detail">' +
							'<div class="name-div"><div class="name"> ' + fullname + '</div><hr /><br/></div>' +
							'<div class="text">ID: <span>' + staff_id + '</span></div>' +
							'<div class="text"><span>' + role_name + '</span></div>' +
							'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
							'</div>' +
							'<br clear="all" />' +
							'</div>';
					}
				} else {
					text =
						'<div class="false-notification-div">' +
						'<p> ' + message + ' </p>' +
						'<button class="btn" onclick="_get_form(' + "'staff_reg'" + ')"><i class="bi-person-plus"></i>ADD NEW ADMIN/STAFF</button>' +
						'</div>';
				}
				$("#fetch_details").html(text);
			} else {
				_get_form('access_key_validation_info');
			}
		},
	});

}





function _upload_publish_pix(publish_pix_id) {
	$(function () {
		publish_pix = {
			UpdatePreview: function (obj) {
				// if IE < 10 doesn't support FileReader
				if (!window.FileReader) {
					// don't know how to proceed to assign src to image tag
				} else {
					///_upload_profile_pix(staff_id);
					var reader = new FileReader();
					var target = null;
					reader.onload = function (e) {
						target = e.target || e.srcElement;
						$("#" + publish_pix_id).prop("src", target.result);
					};
					reader.readAsDataURL(obj.files[0]);
				}
			}
		};
	});
}





//////////////////////////////////////////////////////


function _add_and_update_tourism_products_NoCat(page, page_id) {
	//tinyMCE.triggerSave();

	var page_title = $("#reg_page_title").val();
	var page_pix = $("#reg_page_pix").val();
	var new_page_image = $("#reg_page_pix").prop("files")[0];
	var status_id = $("#reg_status_id").val();
	$("#reg_page_title, #reg_status_id").removeClass("complain");
	if (page_title == '') {
		_warning_alert('reg_page_title', 'TITLE ERROR!', 'Fill this field to continue');
	} else if (status_id == '') {
		_warning_alert('reg_status_id', 'STATUS ERROR!', 'Fill this field to continue');
	} else {

		$("#page_title, #reg_status_id").removeClass("complain");

		var btn_text = $("#submit_btn").html();
		$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> PROCESSING');
		document.getElementById("submit_btn").disabled = true;

		if (page == 'tourism_attraction_form') {
			var getAction = 'add_or_update_tourism_attraction_api';
		} else if (page == 'tourism_destination_form') {
			var getAction = 'add_or_update_tourism_destination_api';
		} else if (page == 'event_form') {
			var getAction = 'add_or_update_event_api';
		}

		var action = getAction;

		var form_data = new FormData();
		form_data.append("action", action);
		form_data.append("page_id", page_id);
		form_data.append("page_title", page_title);
		form_data.append("page_pix", page_pix);
		form_data.append("page_pix", new_page_image);
		form_data.append("status_id", status_id);

		$.ajax({
			type: "POST",
			url: endPoint,
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			success: function (info) {
				var login_check = info.check;
				if (login_check > 0) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;

					if (success == true) {
						var page_photo = info.page_photo;
						var old_page_pix = info.old_page_pix;

						_upload_page_detail_pix(page, '', page_id, page_photo, old_page_pix, message1, message2);
					} else {
						_warning_alert(null, message1, message2);
						$("#submit_btn").html(btn_text);
						document.getElementById("submit_btn").disabled = false;
					}
				} else {
					_get_form('access_key_validation_info');
				}
			},
		});
	}
}








function _get_tourism_products_page_content_NoCat(page, page_id) {
	if (page == 'all_tourism_attraction') {
		var getAction = 'fetch_tourism_attraction_api';
		var get_form_page = 'tourism_attraction_form';
		var get_seo_page_detail = 'tourism_attraction_seo_page_details';

	} else if (page == 'all_tourism_destination') {
		var getAction = 'fetch_tourism_destination_api';
		var get_form_page = 'tourism_destination_form';
		var get_seo_page_detail = 'tourism_destination_seo_page_details';

	} else if (page == 'all_events') {
		var getAction = 'fetch_event_api';
		var get_form_page = 'event_form';
		var get_seo_page_detail = 'event_seo_page_details';

	} else {
		// do nothing
	}
	var action = getAction;
	var status_id = $("#status_id").val();
	var search_txt = $("#search_txt").val();
	var dataString = 'action=' + action + '&page_id=' + page_id + '&status_id=' + status_id + '&search_txt=' + search_txt;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetchData = info.data;
				var success = info.success;
				var message = info.message;
				var tourism_products_name = info.tourism_products_name;
				var text = '';

				if (success == true) {
					for (var i = 0; i < fetchData.length; i++) {
						var page_id = fetchData[i].page_id;
						var page_title = capitalizeFirstLetterOfEachWord(fetchData[i].page_title.substr(0, 35));
						var status_name = fetchData[i].status_name;
						var views = fetchData[i].views;
						var page_pix = fetchData[i].page_pix;
						var date = fetchData[i].updated_time;
						///////////////////////////////// for date
						var originalDate = new Date(date);
						var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
						var day = originalDate.getDate();
						var month = monthNames[originalDate.getMonth()];
						var year = originalDate.getFullYear();
						var formattedDate = day + ' ' + month + ' ' + year;
						/////////////////////////////////////////
						if (page_pix == '') {
							var page_pix_location = 'uploaded_files/default_pix/default_pix.jpg';
						} else {
							if (page == 'all_tourism_attraction') {
								var page_pix_location = 'uploaded_files/tourist_attraction_pix/seo_pix/' + page_pix;
							} else if (page == 'all_tourism_destination') {
								var page_pix_location = 'uploaded_files/tourist_destination_pix/seo_pix/' + page_pix;
							} else if (page == 'all_events') {
								var page_pix_location = 'uploaded_files/event_pix/seo_pix/' + page_pix;

							} else {
								// do nothing
							}
						}

						text +=
							'<div class="grid-div">' +
							'<div class="btn-div">' +
							'<button class="btn active-btn"onclick="_get_form_with_id(' + "'" + get_form_page + "'" + "," + "'" + page_id + "'" + ')">EDIT</button>' +
							'<button class="btn" onclick="_get_form_page_detail_with_id(' + "'" + get_seo_page_detail + "'" + "," + "'" + page_id + "'" + ')">EDIT PAGE DETAILS</button>' +
							'<br clear="all">' +
							'</div>' +

							'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
							'<div class="img-div"><img src="' + website_url + '/' + page_pix_location + '" alt="' + page_title + '"></div>' +
							'<div class="text-div">' +
							'<div class="text-in">' +
							'<div class="text"><span>' + tourism_products_name + '</span> </div>' +
							'</div>' +
							'<h2>' + page_title + '</h2>' +
							'<div class="text-in">' +
							'<div class="text">UPDATED ON: <span>' + formattedDate + '</span> </div>' +
							'<div class="text"><span>'+views+'</span> VIEWS</div>' +
							'</div>' +
							'<br>' +
							'</div>' +
							'</div>';
					}
				} else {

					if (page == 'all_tourism_attraction') {
						text =
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'<button class="btn" onclick="_get_form_with_id(' + "'tourism_attraction_form'" + "," + "''" + ')"><i class="bi-person-plus"></i>ADD NEW TOURSIM ATTRACTION</button>' +
							'</div>';

					} else if (page == 'all_tourism_destination') {
						text =
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'<button class="btn" onclick="_get_form_with_id(' + "'tourism_destination_form'" + "," + "''" + ')"><i class="bi-person-plus"></i>ADD NEW TOURSIM DESTINATION</button>' +
							'</div>';

					} else if (page == 'all_events') {
						text =
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'<button class="btn" onclick="_get_form_with_id(' + "'event_form'" + "," + "''" + ')"><i class="bi-person-plus"></i>ADD NEW EVENT</button>' +
							'</div>';

					} else {
						// do nothing
					}
				}
				$("#fetch_details").html(text);
			} else {
				_get_form('access_key_validation_info');
			}
		},
	});

}





function _get_tourism_products_form_page_NoCat(page, page_id) {
	if (page == 'tourism_attraction_form') {
		var getAction = 'fetch_tourism_attraction_api';
	} else if (page == 'tourism_destination_form') {
		var getAction = 'fetch_tourism_destination_api';
	} else if (page == 'event_form') {
		var getAction = 'fetch_event_api';
	} else {
		// do nothing
	}
	var action = getAction;
	var dataString = 'action=' + action + '&page_id=' + page_id;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetchData = info.data;

				var page_title = fetchData.page_title;
				var page_pix = fetchData.page_pix;
				var status_id = fetchData.status_id;

				$("#reg_page_title").val(page_title);

				if (page_pix == '') {
					page_pix_location = 'uploaded_files/default_pix/default_pix.jpg';
				} else {
					if (page == 'tourism_attraction_form') {
						page_pix_location = 'uploaded_files/tourist_attraction_pix/seo_pix/' + page_pix;
					} else if (page == 'tourism_destination_form') {
						page_pix_location = 'uploaded_files/tourist_destination_pix/seo_pix/' + page_pix;
					} else if (page == 'event_form') {
						page_pix_location = 'uploaded_files/event_pix/seo_pix/' + page_pix;

					} else {
						// do nothing
					}
				}
				var get_page_pix = '<img id="tourism_products_pix" src="' + website_url + '/' + page_pix_location + '" alt="' + page_title + ' PICTURE"/>';
				$("#page_photo").html(get_page_pix);
				$("#reg_status_id").val(status_id);
				/////////////////////////////////////////

			} else {
				_get_form('access_key_validation_info');
			}
		},
	});

}















//////////////////////////////////////////////////////////

function _add_and_update_tourism_products_category(page, cat_id) {
	//tinyMCE.triggerSave();

	var category_name = $("#tourism_products_cat_name").val();
	var status_id = $("#reg_status_id").val();

	$("#tourism_products_cat_name, #reg_status_id").removeClass("complain");

	if (category_name == '') {
		_warning_alert('tourism_products_cat_name', 'CATEGORY NAME ERROR!', 'Fill this field to continue');
	} else if (status_id == '') {
		_warning_alert('reg_status_id', 'STATUS ERROR!', 'Fill this field to continue');

	} else {

		$("#tourism_products_cat_name,#reg_status_id").removeClass("complain");

		var btn_text = $("#submit_btn").html();
		$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> PROCESSING');
		document.getElementById("submit_btn").disabled = true;

		if (page == 'entertainment_cat_form') {
			var getAction = 'add_or_update_entertainment_category_api';
		} else if (page == 'sport_cat_form') {
			var getAction = 'add_or_update_sport_category_api';
		} else if (page == 'culture_cat_form') {
			var getAction = 'add_or_update_culture_category_api';
		} else if (page == 'tradition_cat_form') {
			var getAction = 'add_or_update_tradition_category_api';
		} else if (page == 'natural_tourism_product_cat_form') {
			var getAction = 'add_or_update_natural_tourism_product_category_api';

		} else {

		}

		var action = getAction;

		var dataString = 'action=' + action + '&cat_id=' + cat_id + '&category_name=' + category_name + '&status_id=' + status_id;
		$.ajax({
			type: "POST",
			url: endPoint,
			dataType: 'json',
			data: dataString,
			cache: false,
			success: function (info) {
				var login_check = info.check;
				if (login_check > 0) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;

					if (success == true) {
						_success_alert(message1, message2);
						_alert_close();
						if (page == 'entertainment_cat_form') {
							_get_page('all_entertainment', 'all_entertainment', 'publish', '');
						} else if (page == 'sport_cat_form') {
							_get_page('all_sport', 'all_sport', 'publish', '');
						} else if (page == 'culture_cat_form') {
							_get_page('all_culture', 'all_culture', 'publish', '');
						} else if (page == 'tradition_cat_form') {
							_get_page('all_tradition', 'all_tradition', 'publish', '');
						} else if (page == 'natural_tourism_product_cat_form') {
							_get_page('all_natural_tourism_product', 'all_natural_tourism_product', 'publish', '');
						} else {
							// do nothing
						}
					} else {
						_warning_alert(null, message1, message2);
						$("#submit_btn").html(btn_text);
						document.getElementById("submit_btn").disabled = false;
					}
				} else {
					_get_form('access_key_validation_info');
				}
			},
		});
	}
}








function _get_fetch_category_details(page, cat_id) {
	var status_id = $('#status_id').val();
	var search_txt = $("#search_txt").val();
	if ((page == 'all_entertainment') || (page == 'entertainment_cat_form')) {
		var action = 'fetch_entertainment_cat_api';
		var get_category_form = 'entertainment_cat_form';
		var get_category_sub_detail = 'all_entertainment_category_sub_details';

	} else if ((page == 'all_sport') || (page == 'sport_cat_form')) {
		var action = 'fetch_sport_cat_api';
		var get_category_form = 'sport_cat_form';
		var get_category_sub_detail = 'all_sport_category_sub_details';

	} else if ((page == 'all_culture') || (page == 'culture_cat_form')) {
		var action = 'fetch_culture_cat_api';
		var get_category_form = 'culture_cat_form';
		var get_category_sub_detail = 'all_culture_category_sub_details';

	} else if ((page == 'all_tradition') || (page == 'tradition_cat_form')) {
		var action = 'fetch_tradition_cat_api';
		var get_category_form = 'tradition_cat_form';
		var get_category_sub_detail = 'all_tradition_category_sub_details';

	} else if ((page == 'all_natural_tourism_product') || (page == 'natural_tourism_product_cat_form')) {
		var action = 'fetch_natural_tourism_product_cat_api';
		var get_category_form = 'natural_tourism_product_cat_form';
		var get_category_sub_detail = 'all_natural_tourism_product_category_sub_details';

	} else {
		// do nothing
	}

	var dataString = 'action=' + action + '&cat_id=' + cat_id + '&status_id=' + status_id + '&search_txt=' + search_txt;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetchData = info.data;
				var success = info.success;
				var message = info.message;

				var text = '';
				var no = 0;
				var text =
					'<tr class="tb-col">' +
					'<td>SN</td>' +
					'<td >CATEGORY NAME</td>' +
					'<td>STATISTICS </td>' +
					'<td>STATUS</td>' +
					'<td>EDIT RECORD</td>' +
					'<td>ACTION</td>' +
					'</tr>';
				if (success == true) {

					if ((page == 'all_entertainment') || (page == 'all_sport') || (page == 'all_culture') || (page == 'all_tradition') || (page == 'all_natural_tourism_product')) {

						for (var i = 0; i < fetchData.length; i++) {
							no++;
							var cat_id = fetchData[i].cat_id;
							var category_name = fetchData[i].category_name.toUpperCase();
							var status_name = fetchData[i].status_name;
							var get_count = fetchData[i].get_count;

							text +=
								'<tr>' +
								'<td>' + no + '</td>' +
								'<td>' + category_name + '</td>' +
								'<td>' + get_count + '</td>' +
								'<td><div class="' + status_name + '">' + status_name + '</div></td>' +
								'<td><button class="btn"  onclick="_get_form_with_id(' + "'" + get_category_form + "'" + "," + "'" + cat_id + "'" + ')"><i class="bi-pencil-square"></i> EDIT</button></td>' +
								'<td><button class="btn" onclick="_get_page_with_id(' + "'" + get_category_sub_detail + "'" + "," + "'" + cat_id + "'" + ')"><i class="bi bi-eye"></i> VIEW</button></td>' +
								'</tr>';
						}

						$('#fetch_category_details').html(text);
					} else {

						if ((page == 'entertainment_cat_form') || (page == 'sport_cat_form') || (page == 'culture_cat_form') || (page == 'tradition_cat_form') || (page == 'natural_tourism_product_cat_form')) {
							var category_name = fetchData.category_name;
							var status_id = fetchData.status_id;
							$('#tourism_products_cat_name').val(category_name);
							$('#reg_status_id').val(status_id);

						} else {
							/// do nothing
						}
					}

				} else {

					var text =
						'<div class="false-notification-div">' +
						'<p> ' + message + ' </p>' +
						'</div>';

					$('#fetch_category_details').html(text);

				}

			} else {
				_get_form('access_key_validation_info');
			}
		}

	});
}








function _add_and_update_tourism_products_WithCat(page, cat_id, page_id) {
	var page_title = $("#reg_page_title").val();
	var page_pix = $("#reg_page_pix").val();
	var new_page_image = $("#reg_page_pix").prop("files")[0];
	var status_id = $("#reg_status_id").val();

	$("#reg_page_title, #reg_status_id").removeClass("complain");

	if (cat_id == '') {
		// do nothing
	} else if (page_title == '') {
		_warning_alert('reg_page_title', 'TITLE ERROR!', 'Fill this field to continue');
	} else if (status_id == '') {
		_warning_alert('reg_status_id', 'STATUS ERROR!', 'Fill this field to continue');
	} else {

		$("#page_title, #reg_status_id").removeClass("complain");

		var btn_text = $("#submit_btn").html();
		$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> PROCESSING');
		document.getElementById("submit_btn").disabled = true;

		if (page == 'entertainment_form') {
			var getAction = 'add_or_update_entertainment_api';
		} else if (page == 'sport_form') {
			var getAction = 'add_or_update_sport_api';
		} else if (page == 'culture_form') {
			var getAction = 'add_or_update_culture_api';
		} else if (page == 'tradition_form') {
			var getAction = 'add_or_update_tradition_api';
		} else if (page == 'natural_tourism_product_form') {
			var getAction = 'add_or_update_natural_tourism_product_api';
		}

		var action = getAction;

		var form_data = new FormData();
		form_data.append("action", action);
		form_data.append("cat_id", cat_id);
		form_data.append("page_id", page_id);
		form_data.append("page_title", page_title);
		form_data.append("page_pix", page_pix);
		form_data.append("page_pix", new_page_image);
		form_data.append("status_id", status_id);

		$.ajax({
			type: "POST",
			url: endPoint,
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			success: function (info) {
				var login_check = info.check;
				if (login_check > 0) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;

					if (success == true) {
						var page_photo = info.page_photo;
						var old_page_pix = info.old_page_pix;

						_upload_page_detail_pix(page, cat_id, page_id, page_photo, old_page_pix, message1, message2);
					} else {
						_warning_alert(null, message1, message2);
						$("#submit_btn").html(btn_text);
						document.getElementById("submit_btn").disabled = false;
					}
				} else {
					_get_form('access_key_validation_info');
				}
			},
		});
	}
}














function _get_tourism_products_page_content_WithCat(page, cat_id, page_id) {

	if (page == 'all_entertainment_category_sub_details') {
		var getAction = 'fetch_entertainment_api';
		var get_form_page = 'entertainment_form';
		var get_seo_page_detail = 'entertainment_seo_page_details';

	} else if (page == 'all_sport_category_sub_details') {
		var getAction = 'fetch_sport_api';
		var get_form_page = 'sport_form';
		var get_seo_page_detail = 'sport_seo_page_details';

	} else if (page == 'all_culture_category_sub_details') {
		var getAction = 'fetch_culture_api';
		var get_form_page = 'culture_form';
		var get_seo_page_detail = 'culture_seo_page_details';

	} else if (page == 'all_tradition_category_sub_details') {
		var getAction = 'fetch_tradition_api';
		var get_form_page = 'tradition_form';
		var get_seo_page_detail = 'tradition_seo_page_details';

	} else if (page == 'all_natural_tourism_product_category_sub_details') {
		var getAction = 'fetch_natural_tourism_product_api';
		var get_form_page = 'natural_tourism_product_form';
		var get_seo_page_detail = 'natural_tourism_product_seo_page_details';
	} else {
		// do nothing
	}

	var action = getAction;
	var status_id = $("#status_id").val();
	var search_txt = $("#search_txt").val();
	var dataString = 'action=' + action + '&cat_id=' + cat_id + '&page_id=' + page_id + '&status_id=' + status_id + '&search_txt=' + search_txt;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetchData = info.data;
				var success = info.success;
				var message = info.message;

				var category_name_title = info.category_name;
				var page_title = capitalizeFirstLetterOfEachWord(category_name_title);
				$("#page-title2").html(' / ' + page_title);

				var category_name = info.category_name.toUpperCase();
				$("#sub_title").html(category_name);



				var text = '';

				if (success == true) {
					for (var i = 0; i < fetchData.length; i++) {
						var page_id = fetchData[i].page_id;
						var page_title = capitalizeFirstLetterOfEachWord(fetchData[i].page_title.substr(0, 30));
						var status_name = fetchData[i].status_name;
						var page_pix = fetchData[i].page_pix;
						var views = fetchData[i].views;
						var date = fetchData[i].updated_time;
						///////////////////////////////// for date
						var originalDate = new Date(date);
						var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
						var day = originalDate.getDate();
						var month = monthNames[originalDate.getMonth()];
						var year = originalDate.getFullYear();
						var formattedDate = day + ' ' + month + ' ' + year;
						/////////////////////////////////////////
						if (page_pix == '') {
							var page_pix_location = 'uploaded_files/default_pix/default_pix.jpg';
						} else {
							if (page == 'all_entertainment_category_sub_details') {
								var page_pix_location = 'uploaded_files/entertainment_pix/seo_pix/' + page_pix;
							} else if (page == 'all_sport_category_sub_details') {
								var page_pix_location = 'uploaded_files/sport_pix/seo_pix/' + page_pix;
							} else if (page == 'all_culture_category_sub_details') {
								var page_pix_location = 'uploaded_files/culture_pix/seo_pix/' + page_pix;
							} else if (page == 'all_tradition_category_sub_details') {
								var page_pix_location = 'uploaded_files/tradition_pix/seo_pix/' + page_pix;
							} else if (page == 'all_natural_tourism_product_category_sub_details') {
								var page_pix_location = 'uploaded_files/natural_tourism_product_pix/seo_pix/' + page_pix;
							} else {
								// do nothing
							}
						}

						text +=
							'<div class="grid-div">' +
							'<div class="btn-div">' +
							'<button class="btn active-btn"onclick="_get_form_with_id2(' + "'" + get_form_page + "'" + "," + "'" + cat_id + "'" + "," + "'" + page_id + "'" + ')">EDIT</button>' +
							'<button class="btn" onclick="_get_form_page_detail_with_id(' + "'" + get_seo_page_detail + "'" + "," + "'" + page_id + "'" + ')">EDIT PAGE DETAILS</button>' +
							'<br clear="all">' +
							'</div>' +

							'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
							'<div class="img-div"><img src="' + website_url + '/' + page_pix_location + '" alt="' + page_title + '"></div>' +
							'<div class="text-div">' +
							'<div class="text-in">' +
							'<div class="text"><span>' + category_name + '</span> </div>' +
							'</div>' +
							'<h2>' + page_title + '</h2>' +
							'<div class="text-in">' +
							'<div class="text">UPDATED ON: <span>' + formattedDate + '</span> </div>' +
							'<div class="text"><span>'+views+'</span> VIEWS</div>' +
							'</div>' +
							'<br>' +
							'</div>' +
							'</div>';
					}
					$("#fetch_details").html(text);
				} else {

					if (page == 'all_entertainment_category_sub_details') {
						text =
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'<button class="btn" onclick="_get_form_with_id2(' + "'entertainment_form'" + "," + "'" + cat_id + "'" + "," + "''" + ')"><i class="bi-person-plus"></i>ADD NEW ENTERTAINMENT</button>' +
							'</div>';

					} else if (page == 'all_sport_category_sub_details') {
						text =
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'<button class="btn" onclick="_get_form_with_id2(' + "'sport_form'" + "," + "'" + cat_id + "'" + "," + "''" + ')"><i class="bi-person-plus"></i>ADD NEW SPORT</button>' +
							'</div>';

					} else if (page == 'all_culture_category_sub_details') {
						text =
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'<button class="btn" onclick="_get_form_with_id2(' + "'culture_form'" + "," + "'" + cat_id + "'" + "," + "''" + ')"><i class="bi-person-plus"></i>ADD NEW CULTURE</button>' +
							'</div>';

					} else if (page == 'all_tradition_category_sub_details') {
						text =
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'<button class="btn" onclick="_get_form_with_id2(' + "'tradition_form'" + "," + "'" + cat_id + "'" + "," + "''" + ')"><i class="bi-person-plus"></i>ADD NEW TRADITION</button>' +
							'</div>';

					} else if (page == 'all_natural_tourism_product_category_sub_details') {
						text =
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'<button class="btn" onclick="_get_form_with_id2(' + "'natural_tourism_product_form'" + "," + "'" + cat_id + "'" + "," + "''" + ')"><i class="bi-person-plus"></i>ADD NATURAL TOURISM PRODUCT</button>' +
							'</div>';

					} else {
						// do nothing
					}
					$("#fetch_details").html(text);
				}

			} else {
				_get_form('access_key_validation_info');
			}
		},
	});

}










function _get_tourism_products_form_page_WithCat(page, cat_id, page_id) {
	if (page == 'entertainment_form') {
		var getAction = 'fetch_entertainment_api';

	} else if (page == 'sport_form') {
		var getAction = 'fetch_sport_api';

	} else if (page == 'culture_form') {
		var getAction = 'fetch_culture_api';

	} else if (page == 'tradition_form') {
		var getAction = 'fetch_tradition_api';

	} else if (page == 'natural_tourism_product_form') {
		var getAction = 'fetch_natural_tourism_product_api';

	} else {

	}
	var action = getAction;
	var dataString = 'action=' + action + '&cat_id=' + cat_id + '&page_id=' + page_id;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetchData = info.data;

				var page_title = fetchData.page_title;
				var page_pix = fetchData.page_pix;
				var status_id = fetchData.status_id;


				$("#reg_page_title").val(page_title);

				if (page_pix == '') {
					page_pix_location = 'uploaded_files/default_pix/default_pix.jpg';
				} else {
					if (page == 'entertainment_form') {
						page_pix_location = 'uploaded_files/entertainment_pix/seo_pix/' + page_pix;

					} else if (page == 'sport_form') {
						page_pix_location = 'uploaded_files/sport_pix/seo_pix/' + page_pix;

					} else if (page == 'culture_form') {
						page_pix_location = 'uploaded_files/culture_pix/seo_pix/' + page_pix;

					} else if (page == 'tradition_form') {
						page_pix_location = 'uploaded_files/tradition_pix/seo_pix/' + page_pix;

					} else if (page == 'natural_tourism_product_form') {
						page_pix_location = 'uploaded_files/natural_tourism_product_pix/seo_pix/' + page_pix;

					} else {

					}
				}
				var get_page_pix = '<img id="tourism_products_pix" src="' + website_url + '/' + page_pix_location + '" alt="' + page_title + ' PICTURE"/>';
				$("#page_photo").html(get_page_pix);
				$("#reg_status_id").val(status_id);
				/////////////////////////////////////////

			} else {
				_get_form('access_key_validation_info');
			}
		},
	});

}








function _get_tourism_products_form_page_sub_title(page, cat_id, page_id) {
	if (page == 'entertainment_form') {
		var getAction = 'fetch_entertainment_api';
	} else if (page == 'sport_form') {
		var getAction = 'fetch_sport_api';

	} else if (page == 'sport_form') {
		var getAction = 'fetch_sport_api';

	} else if (page == 'culture_form') {
		var getAction = 'fetch_culture_api';

	} else if (page == 'tradition_form') {
		var getAction = 'fetch_tradition_api';

	} else if (page == 'natural_tourism_product_form') {
		var getAction = 'fetch_natural_tourism_product_api';

	} else {
		// do nothing
	}
	var action = getAction;
	var dataString = 'action=' + action + '&cat_id=' + cat_id + '&page_id=' + page_id;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var category_name = info.category_name;
				$("#category_name").html(category_name);
			} else {
				_get_form('access_key_validation_info');
			}
		},
	});

}





























function _upload_page_detail_pix(page, cat_id, page_id, page_photo, old_page_pix, message1, message2) {
	if ((page == 'tourism_attraction_form')) {
		var getAction = 'upload_tourism_attraction_seo_pix';
		var new_page_image = $("#reg_page_pix").prop("files")[0];

	} else if ((page == 'tourism_attraction_seo_page_details') || (page == 'tourism_attraction_page_content_details')) {
		var getAction = 'upload_tourism_attraction_seo_pix';
		var new_page_image = $("#view_seo_pix").prop("files")[0];

	} else if (page == 'tourism_destination_form') {
		var getAction = 'upload_tourism_destination_seo_pix';
		var new_page_image = $("#reg_page_pix").prop("files")[0];

	} else if ((page == 'tourism_destination_seo_page_details') || (page == 'tourism_destination_page_content_details')) {
		var getAction = 'upload_tourism_destination_seo_pix';
		var new_page_image = $("#view_seo_pix").prop("files")[0];

	} else if (page == 'event_form') {
		var getAction = 'upload_event_seo_pix';
		var new_page_image = $("#reg_page_pix").prop("files")[0];

	} else if ((page == 'event_seo_page_details') || (page == 'event_page_content_details')) {
		var getAction = 'upload_event_seo_pix';
		var new_page_image = $("#view_seo_pix").prop("files")[0];



	} else if ((page == 'entertainment_form')) {
		var getAction = 'upload_entertainment_seo_pix';
		var new_page_image = $("#reg_page_pix").prop("files")[0];

	} else if ((page == 'entertainment_seo_page_details') || (page == 'entertainment_page_content_details')) {
		var getAction = 'upload_entertainment_seo_pix';
		var new_page_image = $("#view_seo_pix").prop("files")[0];

	} else if ((page == 'sport_form')) {
		var getAction = 'upload_sport_seo_pix';
		var new_page_image = $("#reg_page_pix").prop("files")[0];

	} else if ((page == 'sport_seo_page_details') || (page == 'sport_page_content_details')) {
		var getAction = 'upload_sport_seo_pix';
		var new_page_image = $("#view_seo_pix").prop("files")[0];

	} else if ((page == 'culture_form')) {
		var getAction = 'upload_culture_seo_pix';
		var new_page_image = $("#reg_page_pix").prop("files")[0];

	} else if ((page == 'culture_seo_page_details') || (page == 'culture_page_content_details')) {
		var getAction = 'upload_culture_seo_pix';
		var new_page_image = $("#view_seo_pix").prop("files")[0];

	} else if ((page == 'tradition_form')) {
		var getAction = 'upload_tradition_seo_pix';
		var new_page_image = $("#reg_page_pix").prop("files")[0];

	} else if ((page == 'tradition_seo_page_details') || (page == 'tradition_page_content_details')) {
		var getAction = 'upload_tradition_seo_pix';
		var new_page_image = $("#view_seo_pix").prop("files")[0];

	} else if ((page == 'natural_tourism_product_form')) {
		var getAction = 'upload_natural_tourism_product_seo_pix';
		var new_page_image = $("#reg_page_pix").prop("files")[0];

	} else if ((page == 'natural_tourism_product_seo_page_details') || (page == 'natural_tourism_product_page_content_details')) {
		var getAction = 'upload_natural_tourism_product_seo_pix';
		var new_page_image = $("#view_seo_pix").prop("files")[0];

	} else {
		// do nothing
	}

	var action = getAction;

	var form_data = new FormData();
	form_data.append("action", action);
	form_data.append("page_id", page_id);
	form_data.append("page_photo", page_photo);
	form_data.append("page_photo", new_page_image);

	form_data.append("old_page_pix", old_page_pix);

	$.ajax({
		url: admin_portal_local_url,
		type: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (html) {
			_success_alert(message1, message2);

			if (page == 'tourism_attraction_form') {
				_alert_close();
				_get_page('all_tourism_attraction', 'all_tourism_attraction', 'publish', '');
			} else if (page == 'tourism_destination_form') {
				_alert_close();
				_get_page('all_tourism_destination', 'all_tourism_destination', 'publish', '');
			} else if (page == 'event_form') {
				_alert_close();
				_get_page('all_events', 'all_events', 'publish', '');
			} else {

				if (page == 'entertainment_form') {
					_alert_close();
					_get_page_with_id('all_entertainment_category_sub_details', cat_id);
				} else if (page == 'sport_form') {
					_alert_close();
					_get_page_with_id('all_sport_category_sub_details', cat_id);
				} else if (page == 'culture_form') {
					_alert_close();
					_get_page_with_id('all_culture_category_sub_details', cat_id);
				} else if (page == 'tradition_form') {
					_alert_close();
					_get_page_with_id('all_tradition_category_sub_details', cat_id);
				} else if (page == 'natural_tourism_product_form') {
					_alert_close();
					_get_page_with_id('all_natural_tourism_product_category_sub_details', cat_id);
				} else {
					// do nothing
				}
			}
		},
	});
}







function _get_tourism_products_form_page_details(page, getAction, page_id) {
	var action = getAction;
	var dataString = 'action=' + action + '&page_id=' + page_id;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetchData = info.data;
				var tourism_products_name = info.tourism_products_name;
				$("#page_title_info").html(tourism_products_name);

				var page_title = fetchData.page_title;
				var page_url = fetchData.page_url;
				var seo_keywords = fetchData.seo_keywords;
				var page_summary = fetchData.page_summary;
				var page_detail = fetchData.page_detail;
				var views = fetchData.views;
				var page_pix = fetchData.page_pix;

				var date = fetchData.updated_time;
				///////////////////////////////// for date
				var originalDate = new Date(date);
				var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
				var day = originalDate.getDate();
				var month = monthNames[originalDate.getMonth()];
				var year = originalDate.getFullYear();
				var formattedDate = day + ' ' + month + ' ' + year;

				$("#page_details_title").html(page_title);
				$("#page_details_date").html(formattedDate);
				$("#views_count").html(views);
				if (page_pix == '') {
					var page_pix_location = 'uploaded_files/default_pix/default_pix.jpg';
				} else {
					if ((page == 'tourism_attraction_seo_page_details') || (page == 'tourism_attraction_page_content_details')) {
						var page_pix_location = 'uploaded_files/tourist_attraction_pix/seo_pix/' + page_pix;
					} else if ((page == 'tourism_destination_seo_page_details') || (page == 'tourism_destination_page_content_details')) {
						var page_pix_location = 'uploaded_files/tourist_destination_pix/seo_pix/' + page_pix;
					} else if ((page == 'event_seo_page_details') || (page == 'event_page_content_details')) {
						var page_pix_location = 'uploaded_files/event_pix/seo_pix/' + page_pix;
					} else if ((page == 'entertainment_seo_page_details') || (page == 'entertainment_page_content_details')) {
						var page_pix_location = 'uploaded_files/entertainment_pix/seo_pix/' + page_pix;
					} else if ((page == 'sport_seo_page_details') || (page == 'sport_page_content_details')) {
						var page_pix_location = 'uploaded_files/sport_pix/seo_pix/' + page_pix;
					} else if ((page == 'culture_seo_page_details') || (page == 'culture_page_content_details')) {
						var page_pix_location = 'uploaded_files/culture_pix/seo_pix/' + page_pix;
					} else if ((page == 'tradition_seo_page_details') || (page == 'tradition_page_content_details')) {
						var page_pix_location = 'uploaded_files/tradition_pix/seo_pix/' + page_pix;
					} else if ((page == 'natural_tourism_product_seo_page_details') || (page == 'natural_tourism_product_page_content_details')) {
						var page_pix_location = 'uploaded_files/natural_tourism_product_pix/seo_pix/' + page_pix;

					}
				}
				var get_page_pix = '<img src="' + website_url + '/' + page_pix_location + '" alt="' + page_title + ' PICTURE"/>';
				$("#page_details_pix").html(get_page_pix);

				$("#tourism_products_title").val(page_title);
				$("#tourism_products_summary").val(page_summary);
				$("#tourism_products_url").val(page_url);
				$("#seo_keywords").val(seo_keywords);
				$("#tourism_products_detail").val(page_detail);

				var get_seo_pix = '<img id="tourism_products_pics" src="' + website_url + '/' + page_pix_location + '" alt="' + page_title + ' PICTURE"/>';
				$("#seo_pix").html(get_seo_pix);
				/////////////////////////////////////////

			} else {
				_get_form('access_key_validation_info');
			}
		},
	});

}







function _update_tourism_products_seo_page_content(page, page_id) {
	tinyMCE.triggerSave();

	var page_title = $("#tourism_products_title").val();
	var page_summary = $("#tourism_products_summary").val();
	var page_url = $("#tourism_products_url").val();
	var seo_keywords = $("#seo_keywords").val();
	var page_detail = $("#tourism_products_detail").val();
	var page_pix = $("#view_seo_pix").val();
	var page_image = $("#view_seo_pix").prop("files")[0];

	//var check_page_id = page_id;
	$("#tourism_products_title, #tourism_products_summary, #tourism_products_url, #seo_keywords, #tourism_products_detail").removeClass("complain");
	if (page_title == '') {
		_warning_alert('tourism_products_title', 'PAGE TITLE ERROR!', 'Fill this field to continue');
	} else if (page_summary == '') {
		_warning_alert('tourism_products_summary', 'SUMMARY ERROR!', 'Fill this field to continue');
	} else if (page_url == '') {
		_warning_alert('tourism_products_url', 'URL ERROR!', 'Fill this field to continue');
	} else if (seo_keywords == '') {
		_warning_alert('seo_keywords', 'SEO KEYWORDS ERROR!', 'Fill this field to continue');
	} else if (page_detail == '') {
		_warning_alert('tourism_products_detail', 'PAGE CONTENT ERROR!', 'Fill this field to continue');
	} else if (seo_pix == '') {
		_warning_alert('view_seo_pix', 'SEO PIX ERROR!', 'Select seo picture to continue');

	} else {

		$("#tourism_products_title, #tourism_products_summary, #tourism_products_url, #seo_keywords, #tourism_products_detail").removeClass("complain");

		var btn_text = $("#submit_btn").html();
		$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> PROCESSING');
		document.getElementById("submit_btn").disabled = true;

		if ((page == 'tourism_attraction_seo_page_details') || (page == 'tourism_attraction_page_content_details')) {
			var getAction = 'update_tourism_attraction_page_details_api';

		} else if ((page == 'tourism_destination_seo_page_details') || (page == 'tourism_destination_page_content_details')) {
			var getAction = 'update_tourism_destination_page_details_api';

		} else if ((page == 'event_seo_page_details') || (page == 'event_page_content_details')) {
			var getAction = 'update_event_page_details_api';

		} else if ((page == 'entertainment_seo_page_details') || (page == 'entertainment_page_content_details')) {
			var getAction = 'update_entertainment_page_details_api';

		} else if ((page == 'sport_seo_page_details') || (page == 'sport_page_content_details')) {
			var getAction = 'update_sport_page_details_api';

		} else if ((page == 'culture_seo_page_details') || (page == 'culture_page_content_details')) {
			var getAction = 'update_culture_page_details_api';

		} else if ((page == 'tradition_seo_page_details') || (page == 'tradition_page_content_details')) {
			var getAction = 'update_tradition_page_details_api';

		} else if ((page == 'natural_tourism_product_seo_page_details') || (page == 'natural_tourism_product_page_content_details')) {
			var getAction = 'update_natural_tourism_product_page_details_api';

		}

		var action = getAction;

		var form_data = new FormData();
		form_data.append("action", action);
		form_data.append("page_id", page_id);
		form_data.append("page_title", page_title);
		form_data.append("page_url", page_url);
		form_data.append("seo_keywords", seo_keywords);
		form_data.append("page_summary", page_summary);
		form_data.append("page_detail", page_detail);
		form_data.append("page_pix", page_pix);
		form_data.append("page_pix", page_image);

		$.ajax({
			type: "POST",
			url: endPoint,
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			success: function (info) {
				var login_check = info.check;
				if (login_check > 0) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;

					if (success == true) {
						var page_photo = info.page_photo;
						var old_page_pix = info.old_page_pix;

						var page_id = info.page_id;
						var page_title = info.page_title;
						var page_url = info.page_url;
						var seo_keywords = info.seo_keywords;
						var page_summary = info.page_summary;
						var old_seo_page_pix = info.old_seo_page_pix;

						var db_page_url = info.db_page_url;

						$("#page_details_title").html(page_title);
						_upload_page_detail_pix(page, '', page_id, page_photo, old_page_pix, message1, message2);

						_update_page_folder(page, page_id, page_title,page_url,seo_keywords,page_summary,page_pix,page_photo, old_seo_page_pix, db_page_url);

					} else {
						_warning_alert(null, message1, message2);

					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				} else {
					_get_form('access_key_validation_info');
				}
			},
		});
	}
}




function _update_page_folder(page, page_id, page_title, page_url,seo_keywords,page_summary,page_pix,page_photo, old_seo_page_pix, db_page_url) {
	if ((page == 'tourism_attraction_seo_page_details') || (page == 'tourism_attraction_page_content_details')) {
		var getAction = 'update_tourism_attraction_page_folder';

	} else if ((page == 'tourism_destination_seo_page_details') || (page == 'tourism_destination_page_content_details')) {
		var getAction = 'update_tourism_destination_page_folder';

	} else if ((page == 'event_seo_page_details') || (page == 'event_page_content_details')) {
		var getAction = 'update_event_page_folder';

	} else if ((page == 'entertainment_seo_page_details') || (page == 'entertainment_page_content_details')) {
		var getAction = 'update_entertainment_page_folder';

	} else if ((page == 'sport_seo_page_details') || (page == 'sport_page_content_details')) {
		var getAction = 'update_sport_page_folder';

	} else if ((page == 'culture_seo_page_details') || (page == 'culture_page_content_details')) {
		var getAction = 'update_culture_page_folder';

	} else if ((page == 'tradition_seo_page_details') || (page == 'tradition_page_content_details')) {
		var getAction = 'update_tradition_page_folder';

	} else if ((page == 'natural_tourism_product_seo_page_details') || (page == 'natural_tourism_product_page_content_details')) {
		var getAction = 'update_natural_tourism_product_page_folder';

	}
	var action = getAction;

	var form_data = new FormData();
	form_data.append("action", action);
	form_data.append("page_id", page_id);
	form_data.append("page_title", page_title);
	form_data.append("page_url", page_url);
	form_data.append("seo_keywords", seo_keywords);
	form_data.append("page_summary", page_summary);
	form_data.append("page_pix", page_pix);
	form_data.append("page_photo", page_photo);
	form_data.append("old_seo_page_pix", old_seo_page_pix);
	form_data.append("db_page_url", db_page_url);

	$.ajax({
		url: admin_portal_local_url,
		type: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (html) {
			_get_page('', '', 'publish', 'publish');
		},
	});
}






function _preview_more_page_pix(page, getAction, page_id) {
	//$('#pix-preview-div').html('');
	var totalFiles = $('#more_page_pix').get(0).files.length;
	//    for(var i = 0; i < totalFiles; i++){
	//       $('#pix-preview-div').append("<div class='picture-div' id='pix-24'><div class='icon-div'><i class='fa fa-trash'></i></div> <div class='more-pix-div'><img src='"+URL.createObjectURL(event.target.files[i])+"'/></div></div>");
	//    }
	_get_more_pix(page, getAction, page_id, totalFiles);
}






function _get_more_pix(page, getAction, page_id, totalFiles) {

	var action = getAction;

	var form_data = new FormData();
	form_data.append('page_id', page_id);
	form_data.append('action', action);
	for (var i = 0; i < totalFiles; i++) {
		form_data.append("more_page_pix[]", $("#more_page_pix").get(0).files[i]);
	}

	$.ajax({
		url: endPoint,
		type: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (info) {
			var message1 = info.message1;
			var message2 = info.message2;
			if (page == 'tourism_attraction_page_pix') {
				_get_page_content('tourism_attraction_page_pix', 'page_pictures', page_id);
			} else if (page == 'tourism_destination_page_pix') {
				_get_page_content('tourism_destination_page_pix', 'page_pictures', page_id);
			} else if (page == 'event_page_pix') {
				_get_page_content('event_page_pix', 'page_pictures', page_id);
			} else if (page == 'entertainment_page_pix') {
				_get_page_content('entertainment_page_pix', 'page_pictures', page_id);
			} else if (page == 'sport_page_pix') {
				_get_page_content('sport_page_pix', 'page_pictures', page_id);
			} else if (page == 'culture_page_pix') {
				_get_page_content('culture_page_pix', 'page_pictures', page_id);
			} else if (page == 'tradition_page_pix') {
				_get_page_content('tradition_page_pix', 'page_pictures', page_id);
			} else if (page == 'natural_tourism_product_page_pix') {
				_get_page_content('natural_tourism_product_page_pix', 'page_pictures', page_id);

			} else {

			}
			//_upload_more_pix(filesArray);
			_success_alert(message1, message2);
		},
	});
}





function _fetch_tourism_products_other_pix(page, getAction, page_id) {
	var action = getAction;

	var form_data = new FormData();
	form_data.append('action', action);
	form_data.append('page_id', page_id);

	$.ajax({
		type: 'POST',
		url: endPoint,
		data: form_data,
		contentType: false,
		dataType: "json",
		cache: false,
		processData: false,
		success: function (info) {
			var success = info.success;

			var text = '';
			if (success == true) {
				var get_all_pix = info.get_all_pix;

				if (page == 'tourism_attraction_page_pix') {
					for (var i = 0; i < get_all_pix.length; i++) {
						var pictureFilename = get_all_pix[i];

						text += '<div class="picture-div" id="pix-24">' +
							'<div class="icon-div" onclick="_delete_page_pix(' + "'" + page + "'" + "," + "'" + page_id + "'" + "," + "'" + pictureFilename + "'" + ')"><i class="fa fa-trash"></i></div>' +
							'<div class="more-pix-div"><img src="' + website_url + '/api/uploaded_files/tourist_attraction_pix/other_pix/' + pictureFilename + '"></div>' +
							'</div>';
					}
				} else if (page == 'tourism_destination_page_pix') {
					for (var i = 0; i < get_all_pix.length; i++) {
						var pictureFilename = get_all_pix[i];

						text += '<div class="picture-div" id="pix-24">' +
							'<div class="icon-div" onclick="_delete_page_pix(' + "'" + page + "'" + "," + "'" + page_id + "'" + "," + "'" + pictureFilename + "'" + ')"><i class="fa fa-trash"></i></div>' +
							'<div class="more-pix-div"><img src="' + website_url + '/api/uploaded_files/tourist_destination_pix/other_pix/' + pictureFilename + '"></div>' +
							'</div>';
					}

				} else if (page == 'event_page_pix') {
					for (var i = 0; i < get_all_pix.length; i++) {
						var pictureFilename = get_all_pix[i];

						text += '<div class="picture-div" id="pix-24">' +
							'<div class="icon-div" onclick="_delete_page_pix(' + "'" + page + "'" + "," + "'" + page_id + "'" + "," + "'" + pictureFilename + "'" + ')"><i class="fa fa-trash"></i></div>' +
							'<div class="more-pix-div"><img src="' + website_url + '/api/uploaded_files/event_pix/other_pix/' + pictureFilename + '"></div>' +
							'</div>';
					}

				} else if (page == 'entertainment_page_pix') {
					for (var i = 0; i < get_all_pix.length; i++) {
						var pictureFilename = get_all_pix[i];

						text += '<div class="picture-div" id="pix-24">' +
							'<div class="icon-div" onclick="_delete_page_pix(' + "'" + page + "'" + "," + "'" + page_id + "'" + "," + "'" + pictureFilename + "'" + ')"><i class="fa fa-trash"></i></div>' +
							'<div class="more-pix-div"><img src="' + website_url + '/api/uploaded_files/entertainment_pix/other_pix/' + pictureFilename + '"></div>' +
							'</div>';
					}
				} else if (page == 'sport_page_pix') {
					for (var i = 0; i < get_all_pix.length; i++) {
						var pictureFilename = get_all_pix[i];

						text += '<div class="picture-div" id="pix-24">' +
							'<div class="icon-div" onclick="_delete_page_pix(' + "'" + page + "'" + "," + "'" + page_id + "'" + "," + "'" + pictureFilename + "'" + ')"><i class="fa fa-trash"></i></div>' +
							'<div class="more-pix-div"><img src="' + website_url + '/api/uploaded_files/sport_pix/other_pix/' + pictureFilename + '"></div>' +
							'</div>';
					}

				} else if (page == 'culture_page_pix') {
					for (var i = 0; i < get_all_pix.length; i++) {
						var pictureFilename = get_all_pix[i];

						text += '<div class="picture-div" id="pix-24">' +
							'<div class="icon-div" onclick="_delete_page_pix(' + "'" + page + "'" + "," + "'" + page_id + "'" + "," + "'" + pictureFilename + "'" + ')"><i class="fa fa-trash"></i></div>' +
							'<div class="more-pix-div"><img src="' + website_url + '/api/uploaded_files/culture_pix/other_pix/' + pictureFilename + '"></div>' +
							'</div>';
					}

				} else if (page == 'tradition_page_pix') {
					for (var i = 0; i < get_all_pix.length; i++) {
						var pictureFilename = get_all_pix[i];

						text += '<div class="picture-div" id="pix-24">' +
							'<div class="icon-div" onclick="_delete_page_pix(' + "'" + page + "'" + "," + "'" + page_id + "'" + "," + "'" + pictureFilename + "'" + ')"><i class="fa fa-trash"></i></div>' +
							'<div class="more-pix-div"><img src="' + website_url + '/api/uploaded_files/tradition_pix/other_pix/' + pictureFilename + '"></div>' +
							'</div>';
					}

				} else if (page == 'natural_tourism_product_page_pix') {
					for (var i = 0; i < get_all_pix.length; i++) {
						var pictureFilename = get_all_pix[i];

						text += '<div class="picture-div" id="pix-24">' +
							'<div class="icon-div" onclick="_delete_page_pix(' + "'" + page + "'" + "," + "'" + page_id + "'" + "," + "'" + pictureFilename + "'" + ')"><i class="fa fa-trash"></i></div>' +
							'<div class="more-pix-div"><img src="' + website_url + '/api/uploaded_files/natural_tourism_product_pix/other_pix/' + pictureFilename + '"></div>' +
							'</div>';
					}
				}

				$('#pix-preview-div').append(text);
			} else {
				//_warning_alert(null, message1, message2);
			}

		}
	});

}



function _delete_page_pix(page, page_id, delete_pix) {
	if (page == 'tourism_attraction_page_pix') {
		var getAction = 'delete_tourism_attraction_other_pix_api';
	} else if (page == 'tourism_destination_page_pix') {
		var getAction = 'delete_tourism_destination_other_pix_api';
	} else if (page == 'event_page_pix') {
		var getAction = 'delete_event_other_pix_api';
	} else if (page == 'entertainment_page_pix') {
		var getAction = 'delete_entertainment_other_pix_api';
	} else if (page == 'sport_page_pix') {
		var getAction = 'delete_sport_other_pix_api';
	} else if (page == 'culture_page_pix') {
		var getAction = 'delete_culture_other_pix_api';
	} else if (page == 'tradition_page_pix') {
		var getAction = 'delete_tradition_other_pix_api';
	} else if (page == 'natural_tourism_product_page_pix') {
		var getAction = 'delete_natural_tourism_product_other_pix_api';

	}

	var action = getAction;
	var form_data = new FormData();
	form_data.append('action', action);
	form_data.append('page_id', page_id);
	form_data.append('delete_pix', delete_pix);

	$.ajax({
		type: 'POST',
		url: endPoint,
		data: form_data,
		contentType: false,
		dataType: "json",
		cache: false,
		processData: false,
		success: function (info) {
			var success = info.success;
			var message1 = info.message1;
			var message2 = info.message2;

			if (success == true) {
				if (page == 'tourism_attraction_page_pix') {
					_get_page_content('tourism_attraction_page_pix', 'page_pictures', page_id);
				} else if (page == 'tourism_destination_page_pix') {
					_get_page_content('tourism_destination_page_pix', 'page_pictures', page_id);
				} else if (page == 'event_page_pix') {
					_get_page_content('event_page_pix', 'page_pictures', page_id);
				} else if (page == 'entertainment_page_pix') {
					_get_page_content('entertainment_page_pix', 'page_pictures', page_id);
				} else if (page == 'sport_page_pix') {
					_get_page_content('sport_page_pix', 'page_pictures', page_id);
				} else if (page == 'culture_page_pix') {
					_get_page_content('culture_page_pix', 'page_pictures', page_id);
				} else if (page == 'tradition_page_pix') {
					_get_page_content('tradition_page_pix', 'page_pictures', page_id);
				} else if (page == 'natural_tourism_product_page_pix') {
					_get_page_content('natural_tourism_product_page_pix', 'page_pictures', page_id);

				} else {
					/// do nothing
				}
				_success_alert(message1, message2);
			} else {
				_warning_alert(null, message1, message2);
			}

		}

	});
}














function _get_cat(select_id) {
	var action = "fetch_category_api";
	var dataString = "action=" + action;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var success = info.success;
				var message = info.message;
				var fetch = info.data;
				var text = "";

				if (success == true) {
					for (var i = 0; i < fetch.length; i++) {
						var cat_id = fetch[i].cat_id;
						var cat_desc = fetch[i].cat_desc;
						/// for status update profile loop option ////
						text +=
							'<option value="' +
							cat_id +
							'" >' +
							cat_desc +
							"</option>";
					}
				} else {
					text += "<option>" + message + "</option>";
				}
				$("#" + select_id).append(text);
			} else {
				_get_form('access_key_validation_info');
			}
		},
	});
}







function _add_and_update_blog(blog_id) {
	tinyMCE.triggerSave();

	var cat_id = $("#cat_id").val();
	var blog_title = $("#blog_title").val();
	var blog_summary = $("#blog_summary").val();
	var blog_url = $("#blog_url").val();
	var seo_keywords = $("#seo_keywords").val();
	var blog_detail = $("#blog_detail").val();
	var blog_photo = $("#blog_pix").val();
	var new_blog_image = $("#blog_pix").prop("files")[0];
	var status_id = $("#reg_status_id").val();

	$("#cat_id, #blog_title, #blog_url, #seo_keywords, #blog_summary, #blog_detail, #reg_status_id").removeClass("complain");

	if (cat_id == '') {
		_warning_alert('cat_id', 'BLOG CATEGORY ERROR!', 'Select this field to continue');
	} else if (blog_title == '') {
		_warning_alert('blog_title', 'BLOG TITLE ERROR!', 'Fill this field to continue');
	} else if (blog_summary == '') {
		_warning_alert('blog_summary', 'BLOG SUMMARY ERROR!', 'Fill this field to continue');
	} else if (blog_url == '') {
		_warning_alert('blog_url', 'BLOG URL ERROR!', 'Fill this field to continue');
	} else if (seo_keywords == '') {
		_warning_alert('seo_keywords', 'SEO KEYWORDS ERROR!', 'Fill this field to continue');
	} else if (blog_detail == '') {
		_warning_alert('blog_detail', 'BLOG DETAIL ERROR!', 'Fill this field to continue');
		// } else if (blog_photo == '') {
		// 	_warning_alert('blog_pix', 'BLOG PIX ERROR!', 'Select blog picture to continue');
	} else if (status_id == '') {
		_warning_alert('reg_status_id', 'STATUS ERROR!', 'Select this field to continue');

	} else {
		$("#cat_id, #blog_title, #blog_url, #seo_keywords, #blog_summary, #blog_detail, #reg_status_id").removeClass("complain");

		var btn_text = $("#submit_btn").html();
		$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> PROCESSING');
		document.getElementById("submit_btn").disabled = true;


		var action = 'add_and_update_blog_api';

		var form_data = new FormData();
		form_data.append("action", action);
		form_data.append("blog_id", blog_id);
		form_data.append("cat_id", cat_id);
		form_data.append("blog_title", blog_title);
		form_data.append("blog_url", blog_url);
		form_data.append("seo_keywords", seo_keywords);
		form_data.append("blog_summary", blog_summary);
		form_data.append("blog_detail", blog_detail);
		form_data.append("blog_photo", blog_photo);
		form_data.append("blog_photo", new_blog_image);
		form_data.append("status_id", status_id);

		$.ajax({
			type: "POST",
			url: endPoint,
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			success: function (info) {
				var login_check = info.check;
				if (login_check > 0) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;

					if (success == true) {
						var blog_id = info.blog_id;
						var blog_title = info.blog_title;
						var blog_url = info.blog_url;
						var db_blog_url = info.db_blog_url;
						var seo_keywords = info.seo_keywords;
						var blog_summary = info.blog_summary;

						var blog_pix = info.blog_photo;
						var old_blog_pix = info.old_blog_pix;
						var seo_blog_pix = info.seo_blog_pix;

						_upload_blog_pix(blog_id, blog_pix, old_blog_pix, message1, message2);

						_update_blog_folder(blog_id, blog_title, blog_url,seo_keywords,blog_summary, blog_photo, blog_pix, seo_blog_pix, db_blog_url);
					} else {
						_warning_alert(null, message1, message2);

					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				} else {
					_get_form('access_key_validation_info');
				}
			},
		});
	}
}




function _upload_blog_pix(blog_id, blog_pix, old_blog_pix, message1, message2) {
	var action = "upload_blog_pix";
	var new_blog_image = $("#blog_pix").prop("files")[0];

	var form_data = new FormData();
	form_data.append("action", action);
	form_data.append("blog_id", blog_id);
	form_data.append("blog_pix", blog_pix);
	form_data.append("blog_pix", new_blog_image);

	form_data.append("old_blog_pix", old_blog_pix);

	$.ajax({
		url: admin_portal_local_url,
		type: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (html) {
			_success_alert(message1, message2);
			_alert_close();
			_get_page('all_blogs', 'all_blogs', 'publish', '');

		},
	});
}





function _update_blog_folder(blog_id, blog_title, blog_url,seo_keywords,blog_summary, blog_photo, blog_pix, seo_blog_pix, db_blog_url) {
	var action = "update_blog_folder";

	var form_data = new FormData();
	form_data.append("action", action);
	form_data.append("blog_id", blog_id);
	form_data.append("blog_title", blog_title);
	form_data.append("blog_url", blog_url);
	form_data.append("db_blog_url", db_blog_url);
	form_data.append("seo_keywords", seo_keywords);
	form_data.append("blog_summary", blog_summary);

	form_data.append("blog_photo", blog_photo);
	form_data.append("blog_pix", blog_pix);
	form_data.append("seo_blog_pix", seo_blog_pix);

	$.ajax({
		url: admin_portal_local_url,
		type: "POST",
		data: form_data,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,
		success: function (html) {
			_get_page('all_blogs', 'all_blogs', 'publish', '');
		},
	});
}






function _get_fetch_blog(page, blog_id) {
	var search_txt = $("#search_txt").val();
	var status_id = $("#status_id").val();

	var action = "fetch_blog_api";
	var dataString = "action=" + action + "&blog_id=" + blog_id + "&status_id=" + status_id + "&search_txt=" + search_txt;

	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var fetchData = info.data;
			var success = info.success;
			var message = info.message;

			var text = "";

			if (success == true) {
				if (page == 'all_blogs') {


					for (var i = 0; i < fetchData.length; i++) {
						var blog_id = fetchData[i].blog_id;
						var blog_title = capitalizeFirstLetterOfEachWord(fetchData[i].blog_title.substr(0, 30));
						var status_name = fetchData[i].status_name;
						var cat_desc = fetchData[i].cat_desc;
						var views = fetchData[i].views;
						var blog_pix = fetchData[i].blog_pix;

						var date = fetchData[i].updated_time;
						var originalDate = new Date(date);
						var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
						var day = originalDate.getDate();
						var month = monthNames[originalDate.getMonth()];
						var year = originalDate.getFullYear();
						var formattedDate = day + ' ' + month + ' ' + year;

						if (blog_pix == '') {
							var blog_pix_location = 'uploaded_files/default_pix/default_pix.jpg';
						} else {
							var blog_pix_location = 'uploaded_files/blog_pix/' + blog_pix;
						}
						text +=
							'<div class="grid-div">' +
							'<div class="btn-div">' +
							'<button class="btn" onclick="_get_form_with_id(' + "'blog_form'" + "," + "'" + blog_id + "'" + ')">EDIT BLOG DETAILS</button>' + '<br clear="all">' +
							'</div>' +

							'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
							'<div class="img-div"><img src="' + website_url + '/' + blog_pix_location + '" alt="' + blog_title + '"></div>' +
							'<div class="text-div">' +
							'<div class="text-in">' +
							'<div class="text"><span>' + cat_desc + '</span> </div>' +
							'</div>' +
							'<h2>' + blog_title + '</h2>' +
							'<div class="text-in">' +
							'<div class="text">UPDATED ON: <span>' + formattedDate + '</span> </div>' +
							'<div class="text"><span>'+views+'</span> VIEWS</div>' +
							'</div>' +
							'</div>' +
							'<br>' +
							'</div>';
					}
					$("#fetch_details").html(text);

				} else if (page == 'blog_form') {
					var cat_id = fetchData.cat_id.toUpperCase();
					var blog_title = fetchData.blog_title;
					var blog_summary = fetchData.blog_summary;
					var blog_url = fetchData.blog_url;
					var seo_keywords = fetchData.seo_keywords;
					var blog_detail = fetchData.blog_detail;
					var blog_pix = fetchData.blog_pix;
					var status_id = fetchData.status_id;

					$("#cat_id").val(cat_id);
					$("#blog_title").val(blog_title);
					$("#blog_summary").val(blog_summary);
					$("#blog_url").val(blog_url);
					$("#seo_keywords").val(seo_keywords);
					$("#blog_detail").val(blog_detail);
					$("#reg_status_id").val(status_id);
					if (blog_pix == '') {
						var blog_pix_location = 'uploaded_files/default_pix/default_pix.jpg';
					} else {
						var blog_pix_location = 'uploaded_files/blog_pix/' + blog_pix;
					}
					var view_blog_pix_view = '<img id="blog_pics" src="' + website_url + '/' + blog_pix_location + '" alt="' + blog_title + ' Picture"/>';
					$("#view_blog_pix_view").html(view_blog_pix_view);
				}
			} else {
				text =
					'<div class="false-notification-div">' +
					"<p> " +
					message +
					" </p>" +
					'<button class="btn" onclick="_get_form_with_id(' + "'blog_form'" + "," + "''" + ' )"><i class="bi-plus-square"></i>ADD NEW BLOG</button>' +
					"</div>";
				$("#fetch_details").html(text);
			}

		},
	});

}










function _add_and_update_faqs(faq_id) {
	tinyMCE.triggerSave();

	var cat_id = $("#cat_id").val();
	var faq_question = $("#faq_question").val();
	var faq_answer = $("#faq_answer").val();
	var status_id = $("#reg_status_id").val();

	$("#cat_id, #faq_question, #faq_answer, #reg_status_id").removeClass("complain");

	if (cat_id == '') {
		_warning_alert('cat_id', 'FAQs CATEGORY ERROR!', 'Select this field to continue');
	} else if (faq_question == '') {
		_warning_alert('faq_question', 'FAQs QUESTION ERROR!', 'Fill this field to continue');
	} else if (faq_answer == '') {
		_warning_alert('faq_answer', 'FAQs ANSWER ERROR!', 'Fill this field to continue');
	} else if (status_id == '') {
		_warning_alert('reg_status_id', 'STATUS ERROR!', 'Select this field to continue');

	} else {
		$("#cat_id, #faq_question, #faq_answer, #reg_status_id").removeClass("complain");

		var btn_text = $("#submit_btn").html();
		$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> PROCESSING');
		document.getElementById("submit_btn").disabled = true;

		var action = 'add_or_update_faqs_api';

		var form_data = new FormData();
		form_data.append("action", action);
		form_data.append("cat_id", cat_id);
		form_data.append("faq_id", faq_id);
		form_data.append("faq_question", faq_question);
		form_data.append("faq_answer", faq_answer);
		form_data.append("status_id", status_id);

		$.ajax({
			type: "POST",
			url: endPoint,
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			success: function (info) {
				var login_check = info.check;
				if (login_check > 0) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;

					if (success == true) {
						_success_alert(message1, message2);
						_alert_close();
						_get_page('all_faqs', 'all_faqs', 'publish', '');
					} else {
						_warning_alert(null, message1, message2);

					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				} else {
					_get_form('access_key_validation_info');
				}
			},
		});
	}
}




function _get_fetch_faqs(page, faq_id) {
	var search_txt = $("#search_txt").val();
	var status_id = $("#status_id").val();

	var action = "fetch_faqs_api";
	var dataString = "action=" + action + "&faq_id=" + faq_id + "&status_id=" + status_id + "&search_txt=" + search_txt;

	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var fetchData = info.data;
			var success = info.success;
			var message = info.message;

			var text = "";
			var no = 0;
			if (success == true) {
				if (page == 'all_faqs') {

					for (var i = 0; i < fetchData.length; i++) {
						no++;
						var faq_id = fetchData[i].faq_id;
						var faq_question = capitalizeFirstLetterOfEachWord(fetchData[i].faq_question.substr(0, 25) + '...');
						var faq_answer = fetchData[i].faq_answer;
						var status_name = fetchData[i].status_name;

						text +=
							'<div class="quest-faq-div">' +
							'<div class="main-faqs-title-div ' + status_name + '">' +
							'<span>' + no + '</span>' +
							'</div>' +

							'<div class="main-faqs-title-div faq-title-text" onclick="_collapse(' + "'" + 'view' + no + "'" + ')" style="cursor:pointer;">' +
							'<i class="bi-pencil-square"></i> <span>' + faq_question + '</span>' +
							'<button class="btn" title="EDIT FAQ" onClick="_get_form_with_id(' + "'faqs_form'" + "," + "'" + faq_id + "'" + ');"><i class="bi-pencil-square"></i> EDIT</button>' +
							'<div class="expand-div" id="' + "view" + no + "num" + '">&nbsp;<i class="bi-plus"></i>&nbsp;</div>	' +
							'</div>' +

							'<div class="faq-answer-div faq-answer-div2" id="' + "view" + no + "answer" + '" style="display: none;">' +
							'<p>' + faq_answer + '</p>' +
							'</div>' +
							'</div>';
					}
					$("#fetch_details").html(text);

				} else if (page == 'faqs_form') {
					var cat_id = fetchData.cat_id.toUpperCase();
					var faq_question = fetchData.faq_question;
					var faq_answer = fetchData.faq_answer;
					var status_id = fetchData.status_id;
					var status_name = fetchData.status_name;

					$("#cat_id").val(cat_id);
					$("#faq_question").val(faq_question);
					$("#faq_answer").val(faq_answer);
					$("#reg_status_id").append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");
				}
			} else {
				text =
					'<div class="false-notification-div">' +
					"<p> " +
					message +
					" </p>" +
					'<button class="btn" onclick="_get_form_with_id(' + "'faqs_form'" + "," + "''" + ' )"><i class="bi-plus-square"></i>ADD NEW FAQs</button>' +
					"</div>";
				$("#fetch_details").html(text);
			}

		},
	});

}








function _update_password() {
	var old_password = $('#old_password').val();
	var new_password = $('#new_password').val();
	var comfirmed_password = $('#comfirmed_password').val();
	$('#old_password, #new_password, #comfirmed_password').removeClass('complain');

	if (old_password == '') {
		$('#old_password').addClass('complain');
		_warning_alert(null, 'OLD PASSWORD ERROR!', 'Fill this field to continue');
	} else if (new_password == '') {
		$('#new_password').addClass('complain');
		_warning_alert(null, 'NEW PASSWORD ERROR!', 'Fill this field to continue');

	} else if (comfirmed_password == '') {
		$('#comfirmed_password').addClass('complain');
		_warning_alert(null, 'CONFIRM PASSWORD ERROR!', 'Fill this field to continue');

	} else if (new_password != comfirmed_password) {
		$('#new_password, #comfirmed_password').addClass('complain');
		_warning_alert(null, 'PASSWORD ERROR!', 'Check password not match');

	} else {

		var btn_text = $('#update_btn').html();
		$('#update_btn').html('UPDATING <i class="fa fa-spinner fa-spin"></i>');
		document.getElementById('update_btn').disabled = true;

		var action = 'change_password_api'
		var dataString = 'action=' + action + '&old_password=' + old_password + '&new_password=' + new_password;
		$.ajax({
			type: "POST",
			url: endPoint,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var login_check = info.check;
				if (login_check > 0) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;
					if (success == true) {
						_success_alert(message1, message2)
						_alert_close();
						$('#login_user_fullname,#profile_name,#user_wallet_name').html('Xxxxx');
						_get_form('access_key_validation_info');
					} else {
						_warning_alert(null, message1, message2);
						$('#old_password').addClass('complain');

						$('#update_btn').html(btn_text);
						document.getElementById('update_btn').disabled = false;
					}

				} else {
					_get_form('access_key_validation_info');
				}
			}
		});
	}
}




function _show_password_visibility(ids, toggle_pass) {
	var password = $('#' + ids).val();
	if (password != '') {
		$('#' + toggle_pass).show();
	} else {
		$('#' + toggle_pass).hide();
	}
}


function _check_password_match(ids, toggle_pass) {
	var password = $("#new_password").val();
	var confirmed_reset_password = $("#comfirmed_password").val();
	if ((password != confirmed_reset_password) && (confirmed_reset_password != '')) {
		$('#message').show();
	} else {
		$('#message').hide();
	}
	_show_password_visibility(ids, toggle_pass);
}


function _togglePasswordVisibility(ids, toggle_pass) {
	const passwordInput = document.getElementById(ids);
	const togglePasswordIcon = document.getElementById(toggle_pass);

	if (passwordInput.type === 'password') {
		passwordInput.type = 'text';
		togglePasswordIcon.innerHTML = '<i class="bi-eye password-toggle"></i>';
	} else {
		passwordInput.type = 'password';
		togglePasswordIcon.innerHTML = '<i class="bi-eye-slash password-toggle"></i>';
	}
}




function _get_fetch_setup_backend_settings() {
	var action = "fetch_setup_backend_settings_api";
	var dataString = "action=" + action;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetch = info.data;

				var sender_name = fetch.sender_name;
				var smtp_host = fetch.smtp_host;
				var smtp_username = fetch.smtp_username;
				var smtp_password = fetch.smtp_password;
				var smtp_port = fetch.smtp_port;

				$("#sender_name").val(sender_name);
				$("#smtp_host").val(smtp_host);
				$("#smtp_username").val(smtp_username);
				$("#smtp_password").val(smtp_password);
				$("#smtp_port").val(smtp_port);
			} else {
				_get_form('access_key_validation_info');
			}
		},
	});
}




function _update_backend_settings() {
	var sender_name = $("#sender_name").val();
	var smtp_host = $("#smtp_host").val();
	var smtp_username = $("#smtp_username").val();
	var smtp_password = $("#smtp_password").val();
	var smtp_port = $("#smtp_port").val();

	$("#sender_name, #smtp_host, #smtp_username, #smtp_password, #smtp_port").removeClass("complain");

	if (sender_name == '') {
		$('#sender_name').addClass('complain');
		_warning_alert(null, 'SENDER NAME ERROR!', 'Fill this field to continue');
	} else if (smtp_host == '') {
		$('#smtp_host').addClass('complain');
		_warning_alert(null, 'SMTP ERROR!', 'Fill this field to continue');

	} else if (smtp_username == '') {
		$('#smtp_username').addClass('complain');
		_warning_alert(null, 'SMTP USERNAME ERROR!', 'Fill this field to continue');

	} else if (smtp_password == '') {
		$('#smtp_password').addClass('complain');
		_warning_alert(null, 'SMTP PASSWORD ERROR!', 'Fill this field to continue');

	} else if (smtp_port == '') {
		$('#smtp_port').addClass('complain');
		_warning_alert(null, 'SMTP PORT ERROR!', 'Fill this field to continue');

	} else {

		var btn_text = $('#update_btn').html();
		$('#update_btn').html('UPDATING <i class="fa fa-spinner fa-spin"></i>');
		document.getElementById('update_btn').disabled = true;

		var action = "update_backend_settings_api";
		var form_data = new FormData();
		form_data.append("action", action);
		form_data.append("sender_name", sender_name);
		form_data.append("smtp_host", smtp_host);
		form_data.append("smtp_username", smtp_username);
		form_data.append("smtp_password", smtp_password);
		form_data.append("smtp_port", smtp_port);

		$.ajax({
			type: "POST",
			url: endPoint,
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			success: function (info) {
				var login_check = info.check;
				if (login_check > 0) {
					var success = info.success;
					var message1 = info.message1;
					var message2 = info.message2;
					if (success == true) {
						_success_alert(message1, message2);
						_alert_close();
						_get_form('access_key_validation_info');
					} else {
						$('#update_btn').html(btn_text);
						document.getElementById('update_btn').disabled = false;
					}

				} else {
					_get_form('access_key_validation_info');
				}
			}
		});
	}
}



// Function to check if the input matches the pattern of an iframe embed code
function isEmbedCodePattern(input) {
	// Adjust this regular expression pattern based on the expected format of your embed code
	var embedCodePattern = /<iframe[^>]+src="https:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_-]{11}"[^>]*><\/iframe>/i;
	return embedCodePattern.test(input);
}


function _fetch_youtube_video() {
	var video_title = $('#video_title').val();
	var video_url = $('#video_url').val();
	if (video_url == '') {
		$('#fetch_video').fadeOut(100);
	} else {
		$('#fetch_video').fadeIn(100);

		$('.fetch_video').html('<div class="ajax-loader3"> Loading...<br><img src="all-images/images/ajax-loader2.gif"/></div>').fadeIn('fast');

		// var isEmbedCode = isEmbedCodePattern(video_url);
		// if (isEmbedCode) {
			// Extract video ID from the URL
			var videoIdMatch = video_url.match(/(?:\/|v=)([a-zA-Z0-9_-]{11})/);
			var videoId = videoIdMatch ? videoIdMatch[1] : null;

			var action = 'fetch-video';
			var dataString = 'action=' + action + '&video_url=' + video_url;
			$.ajax({
				type: "POST",
				url: admin_portal_local_url,
				data: dataString,
				cache: false,
				success: function (html) {
					$('.fetch_video').html('<iframe width="400" height="150" src="https://www.youtube.com/embed/' + videoId + '" title="' + video_title + '"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
				}
			});
		// } else {
		// 	$('.fetch_video').html('');
		// 	$('#fetch_video').fadeOut(100);
		// 	_warning_alert(null, 'VIDEO EMBED CODE ERROR!', 'Check and try again');
		// }

	}
}




function _add_and_update_tourism_product_videos(page_id, video_id) {
	var video_title = $('#video_title').val();
	var video_url = $('#video_url').val();
	var status_id = $('#reg_status_id').val();


	$("#video_title, #video_url, #reg_status_id").removeClass("complain");

	if (page_id == '') {
		// do nothing
	} else if (video_title == '') {
		_warning_alert('video_title', 'VIDEO TITLE ERROR!', 'Fill this fields to continue');
	} else if (video_url == '') {
		_warning_alert('video_url', 'VIDEO EMBED URL ERROR!', 'Fill this fields to continue');
	} else if (status_id == '') {
		_warning_alert('reg_status_id', 'STATUS ERROR!', 'Select status to continue');
	} else {
		$("#video_title, #video_url, #reg_status_id").removeClass("complain");

		var btn_text = $('#update_btn').html();
		$('#update_btn').html('UPDATING <i class="fa fa-spinner fa-spin"></i>');
		document.getElementById('update_btn').disabled = true;

		var action = 'add_and_update_tourism_product_video_api';
		var dataString = 'action=' + action + '&page_id=' + page_id + '&video_id=' + video_id + '&video_title=' + video_title + '&video_url=' + video_url + '&status_id=' + status_id;
		$.ajax({
			type: "POST",
			url: endPoint,
			data: dataString,
			dataType: "json",
			cache: false,
			success: function (info) {
				var success = info.success;
				var message1 = info.message1;
				var message2 = info.message2;

				if (success == true) {
					_success_alert(message1, message2);
					_alert_secondary_close();
					_get_page_content('page_videos','page_videos',page_id);
					// $('#video_title,#video_url').val('');
					// $('.fetch_video').html('');
					// $('#fetch_video').fadeOut(100);
					// $("#video-preview-div").html('<div class="ajax-loader3"> Loading...<br><img src="all-images/images/ajax-loader2.gif"/></div>').fadeIn('fast');
					///_get_fetch_tourism_products_videos(page_id, '');
				} else {
					_warning_alert(null, message1, message2);
				}

				$('#update_btn').html(btn_text);
				document.getElementById('update_btn').disabled = false;
			}

		});

	}
}






function _get_fetch_tourism_products_videos(page, page_id, video_id) {
	var status_id = $('#status_id').val();
	var search_txt = $('#search_txt').val();

	var action = "fetch_tourism_product_video_api";
	var dataString = "action=" + action + '&page_id=' + page_id + '&video_id=' + video_id + '&status_id=' + status_id + '&search_txt=' + search_txt;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: "json",
		cache: false,
		success: function (info) {
			var login_check = info.check;
			if (login_check > 0) {
				var fetchData = info.data;
				var success = info.success;
				var message1 = info.message1;
				var message2 = info.message2;

				var text = '';

				if (success == true) {
					if (page=='page_videos'){
						for (var i = 0; i < fetchData.length; i++) {
							var page_id = fetchData[i].page_id;
							var video_id = fetchData[i].video_id;
							var get_video_title = fetchData[i].video_title;
							var video_title = capitalizeFirstLetterOfEachWord(get_video_title);
							
							var video_url = fetchData[i].video_url;
							var status_name = fetchData[i].status_name;
	
							var videoIdMatch = video_url.match(/(?:\/|v=)([a-zA-Z0-9_-]{11})/);
							var videoId = videoIdMatch ? videoIdMatch[1] : null;
	
							text += '<div class="picture-div video-div">' +
										'<div class="icon-div" onclick="_delete_page_video(' + "'" + page_id + "'" + "," + "'" + video_id + "'" + ')"><i class="fa fa-trash"></i></div>' +
										'<iframe  width="250" height="150" src="https://youtube.com/embed/' + videoId + '" title="'+video_title+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>' +
										'<button class="edit-btn" type="button" onclick="_get_form_secondary_with_id(' + "'tourism_product_video_form'" + "," + "'" + page_id + "'" +","  + "'" + video_id + "'" + ')"> <i class="bi-pencil-square"></i> EDIT VIDEO</button>'+
										'<button class="edit-btn '+status_name+'" type="button">'+status_name+'</button>'+
									'</div>';
						}
						$("#video-preview-div").html(text);
					}else if(page=='tourism_product_video_form'){

						var video_title = fetchData.video_title;
						var video_url = fetchData.video_url;
						var status_id = fetchData.status_id;

						 $('#video_title').val(video_title);
						 $('#video_url').val(video_url);

						var videoIdMatch = video_url.match(/(?:\/|v=)([a-zA-Z0-9_-]{11})/);
						var videoId = videoIdMatch ? videoIdMatch[1] : null;
						
						$('#fetch_video').fadeIn(100);
						$('.fetch_video').html('<iframe width="400" height="150" src="https://www.youtube.com/embed/' + videoId + '" title="' + video_title + '"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');

						 $('#reg_status_id').val(status_id);

					}else{
						// do nothing
					}

				} else {
					_warning_alert(null, message1, message2);
					$("#video-preview-div").html('');
				}

				

			} else {
				_get_form('access_key_validation_info');
			}
		},
	});
}






function _delete_page_video(page_id, video_id) {

	var action = 'delete_tourism_product_video_api';
	var form_data = new FormData();
	form_data.append('action', action);
	form_data.append('page_id', page_id);
	form_data.append('video_id', video_id);

	$.ajax({
		type: 'POST',
		url: endPoint,
		data: form_data,
		contentType: false,
		dataType: "json",
		cache: false,
		processData: false,
		success: function (info) {
			var success = info.success;
			var message1 = info.message1;
			var message2 = info.message2;

			if (success == true) {
				_get_page_content('page_videos', 'page_videos', page_id);
				_success_alert(message1, message2);
			} else {
				_warning_alert(null, message1, message2);
			}

		}

	});
}











