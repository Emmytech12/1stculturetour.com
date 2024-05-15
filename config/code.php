<?php require_once 'config.php';?>
<?php
$action=$_POST['action'];
switch ($action){
	
	case 'get-form':
		$page=$_POST['page'];
		require_once 'content-page.php';
	break;
		
	case 'open-preview-with-id':
		$ids=$_POST['ids'];
		$page=$_POST['page'];
		require_once 'content-page.php';
	break;

	case 'get_details':
		$page=$_POST['page'];
		require_once 'content-page.php';
	break;

}?>
