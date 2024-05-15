<?php require_once '../../../config/config.php';?>
<?php require_once('session-validation.php');?>
<?php
$action=$_POST['action'];
switch ($action){

case 'logout':
		session_destroy();
		?>
	<script>
			window.parent(location="<?php echo $website_url?>/admin/login/");
	</script>
	<?php
break; 



case 'get-page':
		$page=$_POST['page'];
		require_once '../content/page-content.php';
break;

case 'get-page-with-id':
		$ids=$_POST['ids'];
		$page=$_POST['page'];
		require_once '../content/page-content.php';
break;
case 'get-form':
		$page=$_POST['page'];
		require_once '../content/form.php';
break;


case 'get-form-with-id':
	$ids=$_POST['ids'];
	$page=$_POST['page'];
	require_once '../content/form.php';
break;


case 'get-form-with-id2':
	$ids=$_POST['ids'];
	$ids1=$_POST['ids1'];
	$page=$_POST['page'];
	require_once '../content/form.php';
break;

case 'get-form-page-details-with-id':
	$ids=$_POST['ids'];
	$page=$_POST['page'];
	require_once '../content/page-detail.php';
break;

case 'get-page-details':
	$page=$_POST['page'];
	$ids=$_POST['ids'];
	$ids1=$_POST['ids1'];
	require_once '../content/page-detail.php';
break;



case 'fetch-video':
	echo $video_url=$_POST['video_url'];
break;






case 'upload_and_unlink_passport':
	$passport=$_POST['passport'];
	$db_passport=$_POST['db_passport'];

	if($db_passport==''){
		/// do nothing
	}else{
	 	unlink("../../../uploaded_files/staff_pix/".$db_passport);
	}
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($passport, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["passport"]["tmp_name"], "../../../uploaded_files/staff_pix/".$passport);
	}
break;













case 'upload_tourism_attraction_seo_pix':
	$page_photo= $_POST['page_photo'];
	$old_page_pix= $_POST['old_page_pix'];

	if($old_page_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/tourist_attraction_pix/seo_pix/".$old_page_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($page_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["page_photo"]["tmp_name"], "../../../uploaded_files/tourist_attraction_pix/seo_pix/".$page_photo);
	}

break;


case 'update_tourism_attraction_page_folder':

	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}


	if($db_page_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../tourism-products/tourist-attractions/$db_page_url", "../../../tourism-products/tourist-attractions/$page_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../tourism-products/tourist-attractions/'.$page_url);
	}else{
		mkdir('../../../tourism-products/tourist-attractions/'.$page_url);
	}

	$myfile = fopen("../../../tourism-products/tourist-attractions/".$page_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$page_id')."='$page_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$page_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$page_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../tourist-attractions-page-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;









case 'upload_tourism_destination_seo_pix':
	$page_photo= $_POST['page_photo'];
	$old_page_pix= $_POST['old_page_pix'];

	if($old_page_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/tourist_destination_pix/seo_pix/".$old_page_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($page_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["page_photo"]["tmp_name"], "../../../uploaded_files/tourist_destination_pix/seo_pix/".$page_photo);
	}

break;


case 'update_tourism_destination_page_folder':
	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}

	$db_page_url=$_POST['db_page_url'];

	if($db_page_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../tourism-products/tourist-destination/$db_page_url", "../../../tourism-products/tourist-destination/$page_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../tourism-products/tourist-destination/'.$page_url);
	}else{
		mkdir('../../../tourism-products/tourist-destination/'.$page_url);
	}
	$myfile = fopen("../../../tourism-products/tourist-destination/".$page_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$page_id')."='$page_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$page_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$page_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../tourist-destination-page-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;





case 'upload_event_seo_pix':
	
	$page_photo= $_POST['page_photo'];
	$old_page_pix= $_POST['old_page_pix'];

	if($old_page_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/event_pix/seo_pix/".$old_page_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($page_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["page_photo"]["tmp_name"], "../../../uploaded_files/event_pix/seo_pix/".$page_photo);
	}

break;



case 'update_event_page_folder':

	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}
	
	$db_page_url=$_POST['db_page_url'];
	
	if($db_page_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../tourism-products/event/$db_page_url", "../../../tourism-products/event/$page_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../tourism-products/event/'.$page_url);
	}else{
		mkdir('../../../tourism-products/event/'.$page_url);
	}
	$myfile = fopen("../../../tourism-products/event/".$page_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$page_id')."='$page_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$page_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$page_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../event-page-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;




//////////////////////////////////////////////////////////////////////////////////////////////////








case 'upload_entertainment_seo_pix':
	
	$page_photo= $_POST['page_photo'];
	$old_page_pix= $_POST['old_page_pix'];

	if($old_page_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/entertainment_pix/seo_pix/".$old_page_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($page_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["page_photo"]["tmp_name"], "../../../uploaded_files/entertainment_pix/seo_pix/".$page_photo);
	}

break;



case 'update_entertainment_page_folder':

	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}
	
	$db_page_url=$_POST['db_page_url'];
	
	if($db_page_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../tourism-products/entertainment/$db_page_url", "../../../tourism-products/entertainment/$page_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../tourism-products/entertainment/'.$page_url);
	}else{
		mkdir('../../../tourism-products/entertainment/'.$page_url);
	}
	$myfile = fopen("../../../tourism-products/entertainment/".$page_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$page_id')."='$page_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$page_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$page_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../entertainment-page-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;








case 'upload_sport_seo_pix':
	
	$page_photo= $_POST['page_photo'];
	$old_page_pix= $_POST['old_page_pix'];

	if($old_page_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/sport_pix/seo_pix/".$old_page_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($page_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["page_photo"]["tmp_name"], "../../../uploaded_files/sport_pix/seo_pix/".$page_photo);
	}

break;



case 'update_sport_page_folder':

	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}
	
	$db_page_url=$_POST['db_page_url'];
	
	if($db_page_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../tourism-products/sport/$db_page_url", "../../../tourism-products/sport/$page_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../tourism-products/sport/'.$page_url);
	}else{
		mkdir('../../../tourism-products/sport/'.$page_url);
	}
	$myfile = fopen("../../../tourism-products/sport/".$page_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$page_id')."='$page_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$page_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$page_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../sport-page-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;










case 'upload_culture_seo_pix':
	
	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}

	if($old_page_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/culture_pix/seo_pix/".$old_page_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($page_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["page_photo"]["tmp_name"], "../../../uploaded_files/culture_pix/seo_pix/".$page_photo);
	}

break;



case 'update_culture_page_folder':

	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}
	
	$db_page_url=$_POST['db_page_url'];
	
	if($db_page_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../tourism-products/culture/$db_page_url", "../../../tourism-products/culture/$page_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../tourism-products/culture/'.$page_url);
	}else{
		mkdir('../../../tourism-products/culture/'.$page_url);
	}
	$myfile = fopen("../../../tourism-products/culture/".$page_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$page_id')."='$page_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$page_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$page_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../culture-page-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;











case 'upload_tradition_seo_pix':
	
	$page_photo= $_POST['page_photo'];
	$old_page_pix= $_POST['old_page_pix'];

	if($old_page_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/tradition_pix/seo_pix/".$old_page_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($page_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["page_photo"]["tmp_name"], "../../../uploaded_files/tradition_pix/seo_pix/".$page_photo);
	}

break;



case 'update_tradition_page_folder':

	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}
	
	$db_page_url=$_POST['db_page_url'];
	
	if($db_page_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../tourism-products/tradition/$db_page_url", "../../../tourism-products/tradition/$page_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../tourism-products/tradition/'.$page_url);
	}else{
		mkdir('../../../tourism-products/tradition/'.$page_url);
	}
	$myfile = fopen("../../../tourism-products/tradition/".$page_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$page_id')."='$page_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$page_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$page_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../tradition-page-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;















case 'upload_natural_tourism_product_seo_pix':
	
	$page_photo= $_POST['page_photo'];
	$old_page_pix= $_POST['old_page_pix'];

	if($old_page_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/natural_tourism_product_pix/seo_pix/".$old_page_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($page_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["page_photo"]["tmp_name"], "../../../uploaded_files/natural_tourism_product_pix/seo_pix/".$page_photo);
	}

break;



case 'update_natural_tourism_product_page_folder':

	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title=trim($_POST['page_title']);
	$page_url=trim($_POST['page_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$page_summary=trim($_POST['page_summary']);

	$page_pix=$_POST['page_pix'];
	$page_photo=$_POST['page_photo'];
	$old_seo_page_pix=$_POST['old_seo_page_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($page_pix==null){
		$page_seo_pix=$old_seo_page_pix;
	}else{
		$page_seo_pix=$page_photo;
	}
	
	$db_page_url=$_POST['db_page_url'];
	
	if($db_page_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../tourism-products/natural-tourism-products/$db_page_url", "../../../tourism-products/natural-tourism-products/$page_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../tourism-products/natural-tourism-products/'.$page_url);
	}else{
		mkdir('../../../tourism-products/natural-tourism-products/'.$page_url);
	}
	$myfile = fopen("../../../tourism-products/natural-tourism-products/".$page_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$page_id')."='$page_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$page_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$page_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../natural-tourism-products-page-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;












case 'upload_blog_pix':
	
	$blog_pix= $_POST['blog_pix'];
	$old_blog_pix= $_POST['old_blog_pix'];

	if($old_blog_pix==''){
		/// do nothing
	}else{
		unlink("../../../uploaded_files/blog_pix/".$old_blog_pix);
	}
	
	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "webp", "avif");
	$extension = pathinfo($blog_photo, PATHINFO_EXTENSION);
	if (in_array($extension, $allowedExts)){				 //////////array 
		move_uploaded_file($_FILES["blog_pix"]["tmp_name"], "../../../uploaded_files/blog_pix/".$blog_pix);
	}

break;





case 'update_blog_folder':
	$blog_id=trim(strtoupper($_POST['blog_id']));
	$blog_title=trim($_POST['blog_title']);
	$blog_url=trim($_POST['blog_url']);
	$seo_keywords=trim($_POST['seo_keywords']);
	$blog_summary=trim($_POST['blog_summary']);

	$blog_photo=$_POST['blog_photo'];
	$blog_pix=$_POST['blog_pix'];
	$seo_blog_pix=$_POST['seo_blog_pix'];

	$db_page_url=$_POST['db_page_url'];
	
	if ($blog_photo==null){
		$page_seo_pix=$seo_blog_pix;
	}else{
		$page_seo_pix=$blog_pix;
	}



	$db_blog_url=$_POST['db_blog_url'];

	if($db_blog_url!=''){
		///////////////////////rename page folder//////////////////
		rename("../../../blog/$db_blog_url", "../../../blog/$blog_url");
		///////////////////////recreate page folder//////////////////
		mkdir('../../../blog/'.$blog_url);
	}else{
		mkdir('../../../blog/'.$blog_url);
	}

	$myfile = fopen("../../../blog/".$blog_url."/index.php", "w") or die("Unable to open file!");
	$txt = "<?php include '../../config/config.php';?>\n";
	$txt .= "<?php ".strval('$blog_id')."='$blog_id';?>\n";
	$txt .= "<?php ".strval('$page_title')."='$blog_title';?>\n";
	$txt .= "<?php ".strval('$page_seo_description')."='$blog_summary';?>\n";
	$txt .= "<?php ".strval('$page_seo_keywords')."='$seo_keywords';?>\n";
	$txt .= "<?php ".strval('$page_seo_pix')."='$page_seo_pix';?>\n";
	$txt .= "<?php include "."'../blog-content-detail.php';?>";
	fwrite($myfile, $txt);
	fclose($myfile);

break;

}?>
