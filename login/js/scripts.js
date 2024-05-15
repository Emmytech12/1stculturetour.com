///// Right Click Disabled Function ////////
function _disabled_inspect() {
	document.addEventListener("contextmenu", (event) => {
		event.preventDefault();
	});
}

function _open_menu() {
	$('.sidenavdiv, .sidenavdiv-in').animate({ 'margin-left': '0' }, 200);
	$('.live-chat-back-div').animate({ 'margin-left': '-100%' }, 400);
	$('.index-menu-back-div').animate({ 'margin-left': '0' }, 400);
}

function _open_live_chat() {
	$('.sidenavdiv, .sidenavdiv-in').animate({ 'margin-left': '0' }, 200);
	$('.index-menu-back-div').animate({ 'margin-left': '-100%' }, 400);
	$('.live-chat-back-div').animate({ 'margin-left': '0' }, 400);
}
function _close_side_nav() {
	$('.sidenavdiv, .sidenavdiv-in').animate({ 'margin-left': '-100%' }, 200);
	$('.index-menu-back-div,.live-chat-back-div').animate({ 'margin-left': '-100%' }, 400);
}

$(document).ready(function () {
	function trim(s) {
		return s.replace(/^\s*/, "").replace(/\s*$/, "");
	}
	$("#view_login").keydown(function (e) {
		if (e.keyCode == 13) {
			_log_in();
		}
	});

	$("#procced_reset_password_info").keydown(function (e) {
		if (e.keyCode == 13) {
			_proceed_reset_password('sent_mail');
		}
	});
});



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

function _alert_close() {
	$('#get-more-div').fadeOut(300);
}


function _success_alert(alertMessage1, alertMessage2) {
	$('#success-div').html('<div><i class="bi-check-all"></i></div> ' + alertMessage1 + '<br /><span>' + alertMessage2 + '</span>').fadeIn(500).delay(3000).fadeOut(100);
}

function _warning_alert(alertId1,alertId2, alertMessage1, alertMessage2) {
	//$('#' + alertId).addClass('complain');
	$('#' + alertId1+ ',' + '#' + alertId2).css("border-bottom", "var(--active-color) 1px solid");
	$('#warning-div').html('<div><i class="bi-exclamation-octagon-fill"></i></div> ' + alertMessage1 + '<br /><span>' + alertMessage2 + '</span>').fadeIn(500).delay(5000).fadeOut(100);
}



function _alert_close2(next_id, divid) {
	$('#get-more-div').fadeOut(300);
	_next_page(next_id, divid);
}


function _next_page(next_id, divid) {
	$('#view_login,#procced_reset_password_info,#password_reset_successful').hide();
	$('#login_id, #reset_pass_id').removeClass('ACTIVE');

	$('#' + next_id).fadeIn(1000);
	$('#page-title').html($('#' + divid).html());
	$('#' + divid).addClass('ACTIVE');
}

function _show_password_visibility(ids, toggle_pass) {
	var password = $('#' + ids).val();
	if (password != '') {
		$('#' + toggle_pass).show();
	} else {
		$('#' + toggle_pass).hide();
	}
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



///// accept number ////
function isNumber_Check() {
	var e = window.event;
	var key = e.keyCode && e.which;

	if (!((key >= 48) && (key <= 57) || (key == 43) || (key == 45))) {
		if (e.preventDefault) {
			e.preventDefault();
			$('#otp_info').fadeIn(300);
			document.getElementById('reset_password_otp').style.border = '#F00 1px solid';
		} else {
			e.returnValue = false;
		}
	} else {
		$('#otp_info').fadeOut(300);
		document.getElementById('reset_password_otp').style.border = 'rgba(0, 0, 0, .1) 1px solid';
	}
}





function _check_password_match(ids, ids1, toggle_pass) {
	var password = $("#" + ids).val();
	var confirmed_password = $("#" + ids1).val();
	if ((password != confirmed_password) && (confirmed_password != '')) {
		$('#message').show();
	} else {
		$('#message').hide();
		$('#create-pass-focus,#confirmed-pass-focus').css("border-bottom", "rgba(0, 0, 0, .3) 1px solid");
	}
	_show_password_visibility(ids1, toggle_pass);
}





function _get_page(page) {
	$('#get-page').html('<div class="ajax-loader"><img src="' + website_url + '/admin/login/all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var action = 'get_page';
	var dataString = 'action=' + action + '&page=' + page;
	$.ajax({
		type: "POST",
		url: admin_login_local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#get-page').html(html);
			if (page == 'login') {
				_next_page('view_login', 'login_id');
				$('#title-invisible').show();
				history.pushState(null, null, website_url + '/admin/login/');
				//loadContent(website_url+'/admin/login/');
			}
		}
	});
}


function _get_page_with_id(page, verify_user_fullname, verify_user_email) {
	var action = 'get_page_with_id';
	var dataString = 'action=' + action + '&page=' + page;
	$.ajax({
		type: "POST",
		url: admin_login_local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#get_page_id').html(html);
			$('#verify_user_fullname').html(verify_user_fullname);
			$('#verify_user_email').html(verify_user_email);

		}
	});
}


function _get_form(page) {
	$('#get-more-div').html('<div class="ajax-loader"><img src="' + website_url + '/admin/login/all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var action = 'get-form';
	var dataString = 'action=' + action + '&page=' + page;
	$.ajax({
		type: "POST",
		url: admin_login_local_url,
		data: dataString,
		cache: false,
		success: function (html) { $('#get-more-div').html(html); }
	});
}


function _onFocus(ids) {
	$('#' + ids).css("border-bottom", "rgba(0, 0, 0, .3) 1px solid");
}


function _mailStorage() {
	// Retrieve email from localStorage and set it in the input field
	document.getElementById('reset_pass_email').value = localStorage.getItem('getResetEmail');
	// Save email to localStorage when the form is submitted
	document.getElementById('reset_password_btn').addEventListener('click', function () {
		localStorage.setItem('getResetEmail', document.getElementById('reset_pass_email').value);

	});
}

//////////// LOGIN ////////////
function _log_in() {
	var email = $('#email').val();
	var password = $('#password').val();
	$('#email-focus,#password-focus').css("border-bottom", "rgba(0, 0, 0, .3) 1px solid");

	if ((email != '') && (password != '')) {
		if (email.indexOf("@") <= 0) {
			_warning_alert(email,null, 'INVALID EMAIL ADDRESS', 'Kindly, check your email and try again');
		} else {
			user_login(email, password);
		}
	} else {
		_warning_alert('email-focus','password-focus', 'ERROR!', 'Fill all fields to continue');
		//$('#email,#password').addClass('complain');
	}
};



///////////////////// user login /////////////////////
function user_login(email, password) {
	var action = 'login_api';
	/////////////// get btn text ////////////////
	var btn_text = $('#login_btn').html();
	$('#login_btn').html('Authenticating <i class="fa fa-spinner fa-spin"></i>');
	document.getElementById('login_btn').disabled = true;
	////////////////////////////////////////////////	
	var dataString = 'action=' + action + '&email=' + email + '&password=' + password;

	$.ajax({
		type: "POST",
		url: endPoint,
		dataType: 'json',
		data: dataString,
		cache: false,
		success: function (data) {
				
			var success = data.success;
			var message1 = data.message1;
			var message2 = data.message2;
			if (success == true) {
				var staff_id = data.staff_id;
				var access_key = data.access_key;
				var role_id = data.role_id;
				_success_alert(message1, message2);
				_proceed_to_login(staff_id, access_key, role_id);
			} else {
				_warning_alert(null,null, message1, message2);
			}
			$('#login_btn').html(btn_text);
			document.getElementById('login_btn').disabled = false;
		}

	});
}




function _proceed_to_login(staff_id, access_key,role_id) {
	var action = 'login';
	var dataString = 'action=' + action + '&staff_id=' + staff_id + '&access_key=' + access_key + '&role_id=' + role_id;
	$.ajax({
		type: "POST",
		url: admin_login_local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			window.parent(location = admin_portal_url);
		}
	});
}









function _proceed_reset_password(page) {
	var action = 'proceed_reset_password_api';
	var email = $('#reset_pass_email').val();
	if (email == '') {
		_warning_alert('reset-pass-focus',null, 'EMAIL ERROR!', 'Fill this fields to continue');
	
	} else if ($("#reset_pass_email").val().indexOf("@") <= 0) {
		_warning_alert('reset-pass-focus',null, 'INVALID EMAIL ADDRESS!', 'Kindly, check your email and try again');
	
	} else {
		//////////////// get btn text ////////////////
		var btn_text = $('#reset_password_btn').html();
		$('#reset_password_btn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
		document.getElementById('reset_password_btn').disabled = true;
		////////////////////////////////////////////////	
		var dataString = 'action=' + action + '&email=' + email;
		$.ajax({
			type: "POST",
			url: endPoint,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (info) {
				var success = info.success;
				var message1 = info.message1;
				var message2 = info.message2;

				if (success == true) {
					var staff_id = info.staff_id;
					var fullname = info.fullname;
					var email = info.email;

					$('#title-invisible,#login_id,#reset_pass_id').hide();
					$('#reload_id').show();
					_reset_password(page, staff_id, fullname, email)
					_success_alert(message1, message2);
				} else {
					_warning_alert('reset-pass-focus',null, message1, message2);
				}
				$('#reset_password_btn').html(btn_text);
				document.getElementById('reset_password_btn').disabled = false;
			}
		});
	}

}


function _reset_password(page, staff_id, fullname, email) {
	$('#get-page').html('<div class="ajax-loader"><img src="' + website_url + '/admin/login/all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var action = 'get_page';
	var dataString = 'action=' + action + '&staff_id=' + staff_id + '&page=' + page;
	$.ajax({
		type: "POST",
		url: admin_login_local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#get-page').html(html);
			if (page == 'login') {
				_next_page('procced_reset_password_info', 'reset_pass_id');
				$('#title-invisible,#login_id,#reset_pass_id').show();
				$('#reload_id').hide();
			} else {
				$('#username').html(fullname);
				obfuscateEmail(email, 10);
			}
		}
	});
}



function obfuscateEmail(email, visibleChars) {
	// Split the email into username and domain
	const [username, domain] = email.split('@');
	// Calculate the number of asterisks to replace in the username
	const numAsterisks = Math.max(0, username.length - visibleChars);
	// Obfuscate the username by replacing characters with asterisks
	const obfuscatedUsername = username.substring(0, visibleChars) + '*'.repeat(numAsterisks);
	// Combine the obfuscated username and the domain to form the obfuscated email
	const obfuscatedEmail = `${obfuscatedUsername}@${domain}`;
	$('#useremail').html(obfuscatedEmail);
}






function _resend_mail(ids, staff_id) {
	var action = 'resend_mail_api';
	var btn_text = $('#' + ids).html();
	$('#' + ids).html('SENDING <i class="fa fa-spinner fa-spin"></i>');
	var dataString = 'action=' + action + '&staff_id=' + staff_id;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (info) {
			var success = info.success;
			var message1 = info.message1;
			var message2 = info.message2;
			if (success == true) {
				_success_alert(message1, message2);
			} else {
				_warning_alert(null, message1, message2);
			}
			$('#' + ids).html(btn_text);
		}
	});
}




function _get_hash_value(page, hvid) {
	$('#get-reset-password-page').html('<div class="ajax-loader"><img src="' + website_url + '/admin/login/all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var action = 'reset_password_hash_value_api';
	var dataString = 'action=' + action + '&hvid=' + hvid;
	$.ajax({
		type: "POST",
		url: endPoint,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (info) {
			var success = info.success;
			if (success == true) {
				var staff_id = info.staff_id;
				_get_reset_password_page(page, staff_id);
			} else {
				window.parent(location = admin_login_portal_url);
				//_next_page('procced_reset_password_info','reset_pass_id');
			}
		}
	});
}


function _get_reset_password_page(page, staff_id) {
	var action = page;
	var dataString = 'action=' + action + '&page=' + page + '&staff_id=' + staff_id;
	$.ajax({
		type: "POST",
		url: admin_login_local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#get-reset-password-page').html(html);
		}
	});
}






function _comfirmed_reset_password(staff_id) {
	var password = $('#create_reset_password').val();
	var confirmed_reset_password = $('#confirmed_reset_password').val();

	$('#create-pass-focus,#confirmed-pass-focus').css("border-bottom", "rgba(0, 0, 0, .3) 1px solid");
	if (password == "") {
		_warning_alert('create-pass-focus', null, 'CREATE PASSWORD ERROR!', 'Fill this fields to continue');
	
	} else if (confirmed_reset_password == "") {
		_warning_alert('confirmed-pass-focus', null, 'CONFIRMED PASSWORD ERROR!', 'Fill this fields to continue');
	
	} else if (password != confirmed_reset_password) {
		_warning_alert('create-pass-focus','confirmed-pass-focus', 'PASSWORD ERROR!', 'Password noot match. Try again');
	
	} else if (password.length < 8) {
		_warning_alert('create-pass-focus','confirmed-pass-focus', 'PASSWORD NOT ACCEPTED', 'Please follow the instructon');
	
	} else if (password.match(/^(?=[^A-Z]*[A-Z])(?=[^!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~]*[!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~])(?=\D*\d).{8,}$/)) {

		$('#create-pass-focus,#confirmed-pass-focus').css("border-bottom", "rgba(0, 0, 0, .3) 1px solid");
		//////////////// get btn text ////////////////
		var btn_text = $('#comfirmed_reset_btn').html();
		$('#comfirmed_reset_btn').html('Resetting <i class="fa fa-spinner fa-spin"></i>');
		document.getElementById('comfirmed_reset_btn').disabled = true;
		////////////////////////////////////////////////	
		var action = 'complete_reset_password_api';
		var dataString = 'action=' + action + '&staff_id=' + staff_id + '&password=' + password;
		$.ajax({
			type: "POST",
			url: endPoint,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (data) {
				var success = data.success;
				var message1 = data.message1;
				var message2 = data.message2;
				if (success == true) {
					var staff_id = data.staff_id;
					var access_key = data.access_key;
					var role_id = data.role_id;
					localStorage.removeItem('getResetEmail');
					_success_alert(message1, message2);
					_proceed_to_login(staff_id, access_key,role_id);
				} else {
					_warning_alert(null,null, message1, message2);
				}
				$('#comfirmed_reset_btn').html(btn_text);
				document.getElementById('comfirmed_reset_btn').disabled = false;
			}
		});
	} else {
			_warning_alert('create-pass-focus','confirmed-pass-focus', 'PASSWORD NOT ACCEPTED', 'Please follow the instructon');

	}

}




