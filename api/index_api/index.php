<?php require_once '../config/connection.php';?>
<?php require_once '../config/functions.php';?>
<?php
$action=$_POST['action'];

	switch ($action){

		case 'get_page_session_value':
			///////////////////////geting sequence//////////////////////////
			$sequence=$callclass->_get_sequence_count($conn, 'PS');
			$array = json_decode($sequence, true);
			$no= $array[0]['no'];
			$response['page_session']='PS'.$no.date('Ymdhis');
		break;
		
 		case 'fetch_cat_api':                                                                                                
			$query=mysqli_query($conn,"SELECT * FROM setup_categories_tab ");
			$response['response']=100;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}                                                                                                                      
		break;

		case 'fetch_tourism_products_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$status_id=($_POST['status_id']);

			if ($tourism_products_id=='') { ///start if 1
				$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE status_id=1 ORDER BY tourism_products_name ASC")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=101;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=102;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='$tourism_products_id'")or die (mysqli_error($conn));
				$response['response']=103;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1		
		break;

		case 'fetch_each_tourist_attraction_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='TP0001'")or die (mysqli_error($conn));
			$response['response']=104;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;	
			}			
		break;

		case 'fetch_each_entertainment_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='TP0002'")or die (mysqli_error($conn));
			$response['response']=105;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){				
				$response['data']=$fetch_query;	
			}			
		break;

		case 'fetch_each_sport_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='TP0003'")or die (mysqli_error($conn));
			$response['response']=106;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;	
			}			
		break;

		case 'fetch_each_culture_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='TP0004'")or die (mysqli_error($conn));
			$response['response']=107;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;	
			}			
		break;

		case 'fetch_each_tradition_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='TP0005'")or die (mysqli_error($conn));
			$response['response']=108;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;	
			}			
		break;

		case 'fetch_each_natural_tourism_products_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='TP0006'")or die (mysqli_error($conn));
			$response['response']=109;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;	
			}			
		break;

		case 'fetch_each_tourist_destination_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='TP0007'")or die (mysqli_error($conn));
			$response['response']=110;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;	
			}			
		break;

		case 'fetch_each_event_api':
			$tourism_products_id=trim(strtoupper($_POST['tourism_products_id']));
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab WHERE tourism_products_id='TP0008'")or die (mysqli_error($conn));
			$response['response']=111;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;	
			}			
		break;


		case 'fetch_tourist_attraction_api':
			$page_session=trim($_POST['page_session']);
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);

			$selectQuery="SELECT * FROM tourism_attraction_tab WHERE status_id=1 ORDER BY created_time DESC";
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "$selectQuery")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=112;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=113;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1

				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'TA', $page_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];

				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `tourism_attraction_tab` SET views=views+1 WHERE page_id='$page_id'")or die (mysqli_error($conn));
				}

				$query=mysqli_query($conn, "SELECT * FROM tourism_attraction_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=114;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 

				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, tourism_attraction_tab  b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
			
		break;


		case 'fetch_left_tourist_attraction_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);

			$selectQuery="SELECT * FROM tourism_attraction_tab WHERE status_id=1 ORDER BY RAND() LIMIT 1";
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0001'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "$selectQuery")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=115;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=116;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM tourism_attraction_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=117;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;


		case 'fetch_right_tourist_attraction_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);

			$selectQuery="SELECT * FROM tourism_attraction_tab WHERE status_id=1 ORDER BY created_time DESC LIMIT 4";
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "$selectQuery")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=118;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=119;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM tourism_attraction_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=120;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1		
		break;


		case 'fetch_tourism_attraction_other_pix_api':
			$page_id = $_POST['page_id'];
		
			$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
			$fetch = mysqli_fetch_array($get_pix_query);
			$tourism_product_pix = $fetch['tourism_product_pix'];

			if (empty($tourism_product_pix)) {
                mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
				$response['response']=121; 
				$response['success']=false;
				$response['message']="No Picture Found!!!";
			} else {
				$getCount=mysqli_num_rows($get_pix_query);
				if ($getCount>0) {
				
					$response = array();
					$get_all_pix = explode(',', $fetch['tourism_product_pix']);
				
						$response['response']=122; 
						$response['success']=true;
						$response['get_all_pix'] = $get_all_pix;
				
				} else {
					$response['response']=123; 
					$response['success']=false;
					$response['message1']="ERROR!"; 
					$response['message2']="No Picture Found."; 
				}
			}
		break;

		case 'fetch_event_api':
			$page_session=trim($_POST['page_session']);
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);

			$selectQuery="SELECT * FROM event_tab WHERE status_id=1 ORDER BY created_time DESC";
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "$selectQuery")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=124;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=125;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1

				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'EVENT', $page_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];

				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `event_tab` SET views=views+1 WHERE page_id='$page_id'")or die (mysqli_error($conn));
				}

				$query=mysqli_query($conn, "SELECT * FROM event_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=126;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 

				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, event_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
			
		break;


		case 'fetch_left_event_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);

			$selectQuery="SELECT * FROM event_tab WHERE status_id=1 ORDER BY RAND() LIMIT 1";
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0008'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "$selectQuery")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=127;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}

					$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, event_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$fullname=$fetch_query['fullname'];
					$response['fullname']=ucwords(strtolower($fullname));
				}else{ // else if 2
					$response['response']=128;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1

				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0008'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "SELECT * FROM event_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=129;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;

		case 'fetch_right_event_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);

			$selectQuery="SELECT * FROM event_tab WHERE status_id=1 ORDER BY created_time DESC LIMIT 4";
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0008'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "$selectQuery")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=130;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
					
					$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, event_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$fullname=$fetch_query['fullname'];
					$response['fullname']=ucwords(strtolower($fullname));
				}else{ // else if 2
					$response['response']=131;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1

				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0008'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "SELECT * FROM event_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=132;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;


		case 'fetch_tourist_destination_api':
			$page_session=trim($_POST['page_session']);
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);

			$selectQuery="SELECT * FROM tourism_destination_tab WHERE status_id=1 ORDER BY created_time DESC";
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "$selectQuery")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=133;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=134;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1

				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'TD', $page_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];

				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `tourism_destination_tab` SET views=views+1 WHERE page_id='$page_id'")or die (mysqli_error($conn));
				}

				$query=mysqli_query($conn, "SELECT * FROM tourism_destination_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=135;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 

				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, tourism_destination_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
			
		break;

		case 'fetch_tourist_destination_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);

			$selectQuery="SELECT * FROM tourism_destination_tab WHERE status_id=1 ORDER BY created_time DESC";
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0007'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "$selectQuery")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=136;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=137;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1

				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0008'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "SELECT * FROM tourism_destination_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=138;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 

				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, tourism_destination_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
			
		break;


		case 'fetch_top_entertainment_api':
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM entertainment_tab a, entertainment_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 ORDER BY RAND() LIMIT 1")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=139;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
					$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, entertainment_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$fullname=$fetch_query['fullname'];
					$response['fullname']=ucwords(strtolower($fullname));
				}else{ // else if 2
					$response['response']=140;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM entertainment_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=141;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;


		case 'fetch_bottom_entertainment_api':
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM entertainment_tab a, entertainment_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 LIMIT 4")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=142;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
					$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, entertainment_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$fullname=$fetch_query['fullname'];
					$response['fullname']=ucwords(strtolower($fullname));
				}else{ // else if 2
					$response['response']=143;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM entertainment_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=144;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;



		case 'fetch_entertainment_api':
			$page_session=trim($_POST['page_session']);
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM entertainment_tab a, entertainment_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 ORDER BY a.created_time DESC")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=145;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=146;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'ENT', $page_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];

				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `entertainment_tab` SET views=views+1 WHERE page_id='$page_id'")or die (mysqli_error($conn));
				}

				$query=mysqli_query($conn, "SELECT * FROM entertainment_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=134;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, entertainment_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
			
		break;


		case 'fetch_left_sport_api':
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM sport_tab a, sport_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 ORDER BY RAND() LIMIT 1")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=147;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
					$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, sport_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$fullname=$fetch_query['fullname'];
					$response['fullname']=ucwords(strtolower($fullname));
				}else{ // else if 2
					$response['response']=148;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM sport_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=149;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;

		case 'fetch_right_sport_api':
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM sport_tab a, sport_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 LIMIT 2")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=150;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
					$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, sport_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$fullname=$fetch_query['fullname'];
					$response['fullname']=ucwords(strtolower($fullname));
				}else{ // else if 2
					$response['response']=151;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM sport_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=152;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;

		case 'fetch_sport_api':
			$page_session=trim($_POST['page_session']);
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM sport_tab a, sport_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 ORDER BY a.created_time DESC")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=153;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=154;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				
				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'SPORT', $page_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];

				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `sport_tab` SET views=views+1 WHERE page_id='$page_id'")or die (mysqli_error($conn));
				}
				
				$query=mysqli_query($conn, "SELECT * FROM sport_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=155;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, sport_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
			
		break;

		case 'fetch_culture_api':
			$page_session=trim($_POST['page_session']);
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$staff_id=trim(strtoupper($_POST['staff_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM culture_tab a, culture_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 ORDER BY a.created_time DESC")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=157;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=158;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'CUL', $page_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];

				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `culture_tab` SET views=views+1 WHERE page_id='$page_id'")or die (mysqli_error($conn));
				}

				$query=mysqli_query($conn, "SELECT * FROM culture_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=159;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, culture_tab b WHERE a.staff_id=b.'$staff_id'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
		break;


		case 'fetch_tradition_api':
			$page_session=trim($_POST['page_session']);
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM tradition_tab a, tradition_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 ORDER BY a.created_time DESC")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=160;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=161;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1

				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'TRA', $page_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];

				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `tradition_tab` SET views=views+1 WHERE page_id='$page_id'")or die (mysqli_error($conn));
				}

				$query=mysqli_query($conn, "SELECT * FROM tradition_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=162;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, tradition_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
		break;


		case 'fetch_left_natural_tourism_products_api':
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM natural_tourism_product_tab a, natural_tourism_product_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 ORDER BY RAND() LIMIT 1")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=163;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
					$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, natural_tourism_product_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$fullname=$fetch_query['fullname'];
					$response['fullname']=ucwords(strtolower($fullname));
				}else{ // else if 2
					$response['response']=164;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM natural_tourism_product_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=165;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
		break;

		case 'fetch_right_natural_tourism_products_api':
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM natural_tourism_product_tab a, natural_tourism_product_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 LIMIT 4")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=166;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
					$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, natural_tourism_product_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$fullname=$fetch_query['fullname'];
					$response['fullname']=ucwords(strtolower($fullname));
				}else{ // else if 2
					$response['response']=167;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				$query=mysqli_query($conn, "SELECT * FROM natural_tourism_product_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=168;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
		break;

		case 'fetch_natural_tourism_products_api':
			$page_session=trim($_POST['page_session']);
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
	
			if ($page_id=='') {///start if 1
				$query=mysqli_query($conn, "SELECT a.*, b.category_name FROM natural_tourism_product_tab a, natural_tourism_product_cat_tab b WHERE a.cat_id=b.cat_id AND a.status_id=1 ORDER BY a.created_time DESC")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=169;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=170;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1
				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'NT', $page_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];

				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `natural_tourism_product_tab` SET views=views+1 WHERE page_id='$page_id'")or die (mysqli_error($conn));
				}
				
				$query=mysqli_query($conn, "SELECT * FROM natural_tourism_product_tab WHERE page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=171;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, natural_tourism_product_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
		break;



		case 'fetch_index_blog_api':
			$blog_id=trim(strtoupper($_POST['blog_id']));
			$status_id=($_POST['status_id']);

			/// write sql statement and function that will return all index blog here
			if ($blog_id=='') {///start if 1
				$query=mysqli_query($conn,"SELECT * FROM blog_tab WHERE status_id=1 ORDER BY created_time DESC LIMIT 3")or die (mysqli_error($conn));
				$check_query=mysqli_num_rows($query);
				if ($check_query>0) { // start if 2
					$response['response']=172;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
					$response['data']=$fetch_query;
					}
				}else{ // Else if 2
					$response['response']=173;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 2
				$query=mysqli_query($conn,"SELECT * FROM blog_tab WHERE blog_id='$blog_id'")or die (mysqli_error($conn));
				$response['response']=174;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;
				} 
			} //end if 1	
		break;
		
		

		case 'fetch_blog_api':
			$page_session=trim($_POST['page_session']);
			$staff_id=trim(strtoupper($_POST['staff_id']));
			$blog_id=trim(strtoupper($_POST['blog_id']));	
			$cat_id=trim(strtoupper($_POST['cat_id']));
			$status_id=($_POST['status_id']);
			$search_txt=($_POST['search_txt']);

			$search_like="(blog_title like '%$search_txt%')";

				
			/// write sql statement and function that will return all blog here
			if ($blog_id=='') {///start if 1
				$query=mysqli_query($conn,"SELECT * FROM blog_tab WHERE cat_id LIKE '%$cat_id%' AND status_id=1 AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
				$check_query=mysqli_num_rows($query);
				if ($check_query>0) { // start if 2
					$response['response']=175;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
					$response['data']=$fetch_query;
					}
				}else{ // Else if 2
					$response['response']=176;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 2

				///////////////////////geting checkPageSession//////////////////////////
				$checkPageSession=$callclass->_check_page_session($conn, 'BLOG', $blog_id, $page_session);
				$array = json_decode($checkPageSession, true);
				$page_session_check= $array[0]['page_session_check'];
				
				if ($page_session_check==1){
					mysqli_query($conn,"UPDATE `blog_tab` SET views=views+1 WHERE blog_id='$blog_id'")or die (mysqli_error($conn));
				}

				$query=mysqli_query($conn,"SELECT * FROM blog_tab WHERE blog_id LIKE '%$blog_id%' AND status_id LIKE '%$status_id%' AND status_id=1 AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
				$response['response']=177;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;
				}
				
				$query=mysqli_query($conn,"SELECT fullname FROM staff_tab a, blog_tab b WHERE a.staff_id=b.staff_id")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$fullname=$fetch_query['fullname'];
				$response['fullname']=ucwords(strtolower($fullname));
			} //end if 1
		break;

		case 'fetch_faq_api':
			$faq_id=trim(strtoupper($_POST['faq_id']));
			$cat_id=($_POST['cat_id']);
			$status_id=($_POST['status_id']);
			$search_txt=($_POST['search_txt']);

			$search_like="(faq_question like '%$search_txt%')";
			
			$query=mysqli_query($conn,"SELECT * FROM faq_tab WHERE cat_id LIKE '%$cat_id%' AND status_id=1 AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
			$check_query=mysqli_num_rows($query);
			if ($check_query>0) { // start if 1
				$response['response']=178;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
				}
			}else{ // Else if 2
				$response['response']=179;
				$response['success']=false;
				$response['message']="NO RECORD FOUND!!!"; 
			}// End if 1	
		break;



		case 'fetch_index_faq_api':
			$faq_id=trim(strtoupper($_POST['faq_id']));
			$status_id=($_POST['status_id']);
		
			$query=mysqli_query($conn,"SELECT * FROM faq_tab WHERE status_id=1 ORDER BY created_time DESC LIMIT 5")or die (mysqli_error($conn));
			$check_query=mysqli_num_rows($query);
			if ($check_query>0) { // start if 1
				$response['response']=180;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
				}
			}else{ // Else if 2
				$response['response']=181;
				$response['success']=false;
				$response['message']="NO RECORD FOUND!!!"; 
			}// End if 1	
		break;


		case 'fetch_tourism_product_video_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$video_id=trim(strtoupper($_POST['video_id']));
			$status_id=($_POST['status_id']);

			$query=mysqli_query($conn, "SELECT * FROM tourism_product_video_tab WHERE page_id='$page_id' AND status_id=1 ORDER BY created_time DESC")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0) { // start if 2
				$response['response']=182;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
					$response['data']=$fetch_query;
				}
			}else{ // else if 2
				$response['response']=183;
				$response['success']=false;
				$response['message']="NO RECORD FOUND!!!"; 
			}// End if 2
			
		break;


		case 'fetch_tourism_products_count_api':
			$query=mysqli_query($conn,"SELECT
			(SELECT COUNT(page_id) FROM tourism_attraction_tab WHERE status_id=1) AS total_active_tourism_attraction_count,
			(SELECT COUNT(page_id) FROM entertainment_tab  WHERE status_id=1) AS total_active_entertainment_count,
			(SELECT COUNT(page_id) FROM sport_tab WHERE status_id=1) AS total_active_sport_count,
			(SELECT COUNT(page_id) FROM culture_tab WHERE status_id=1) AS total_active_culture_count,
			(SELECT COUNT(page_id) FROM tradition_tab WHERE status_id=1) AS total_active_tradition_count,
			(SELECT COUNT(page_id) FROM natural_tourism_product_tab WHERE status_id=1) AS total_active_natural_tourism_product_count,
			(SELECT COUNT(page_id) FROM tourism_destination_tab WHERE status_id=1) AS total_active_tourism_destination_count,
			(SELECT COUNT(page_id) FROM event_tab WHERE status_id=1) AS total_active_event_count");
			
			$response['response']=184;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;
			} 
		break;










		
}
echo json_encode($response);

?>





