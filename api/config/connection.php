<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');
// ////////////for local connect 
 
// $_HOST_NAME = "162.240.103.153";  
// $_DB_USERNAME="tourculture_admin";
// $_DB_PASSWORD="kEyEPTGVW9k@";

$_HOST_NAME = "localhost";  
$_DB_USERNAME="root";
$_DB_PASSWORD="";




$conn = mysqli_connect($_HOST_NAME, $_DB_USERNAME, $_DB_PASSWORD)or die("Unable to connect to MySQL");
mysqli_select_db($conn,"1stculturetour_db");
/////////////////////////////////////////////////////
?>
