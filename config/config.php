<?php
ini_set('session.use_only_cookies', 1); // secure cookie
session_start(); // start session
//session_regenerate_id(); // regenerating for security issues
session_regenerate_id(true);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
ini_set('display_errors', 1);

$website_auto_url =(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

$thename='1stculturetour'; 
$website_url='http://localhost/projects/1stculturetour.com';
//$website_url ='http://192.168.0.186/projects/1stculturetour.com'; /// ip url link
//$website_url='https://1stculturetour.com';
$uploaded_file_url=$website_url.'/uploaded_files';
$admin_login_url=$website_url.'/admin/login/';
?>




<?php
	///// to keep php variable and session
	$login_staff_id=$_SESSION['staff_id'];
	$access_key=$_SESSION['access_key'];
	///$login_user_id=$_SESSION['user_id'];
	$login_role_id=$_SESSION['role_id'];
?>






<script>
   //var website_url='https://1stculturetour.com'; /// online url link
	var website_url='http://localhost/projects/1stculturetour.com'; /// local url link
	//var website_url='http://192.168.35.173/projects/1stculturetour.com'; /// ip url link

	var api_base=website_url+'/api'; /// api url link
	var index_local_url=website_url+'/config/code';	/// For index local_url //

	///////////////////////////////////////////////////////////////////////////////////////////////////
	var admin_login_local_url=website_url+'/admin/login/config/code'; /// admin login local url
	var admin_login_portal_url=website_url+'/admin/login/';

	var admin_portal_url=website_url+'/admin/portal/'; /// admin login local url
	var admin_portal_local_url=website_url+'/admin/portal/config/code'; /// admin login local url
	///////////////////////////////////////////////////////////////////////////////////////////////////

	var index_api=api_base+"/index_api/"; /// index_api url
	///////////////////////////////////////////////////////////////////////////////////////////////////
	var endPoint=api_base+'/admin/?access_key=<?php echo $access_key?>&role_id=<?php echo $login_role_id?>'; /// admin_api url
</script>