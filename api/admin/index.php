<?php require_once '../config/connection.php';?>
<?php require_once '../config/functions.php';?>
<?php
header('Content-Type: application/json; charset=UTF-8');
$action=$_POST['action'];

if (($action=='login_api') || ($action=='proceed_reset_password_api') || ($action=='resend_mail_api') || ($action=='reset_password_hash_value_api') || ($action=='complete_reset_password_api') ){

	switch ($action){

		case 'login_api':
		 
			$email=trim($_POST['email']);
			$password=md5(trim($_POST['password']));
			if (($email!='') || ($password!='')){// start if 1
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){ /// start if 2
					$query=mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email' AND `password`='$password'") or die (mysqli_error($conn));
					$count_user=mysqli_num_rows($query);
					if ($count_user>0){ /// start if 3
						$fetch_query=mysqli_fetch_array($query);
						$staff_id=$fetch_query['staff_id']; 
						$status_id=$fetch_query['status_id']; 
						$role_id=$fetch_query['role_id'];
						if($status_id==1){ /// start if 4
							/// Generate login access key
							$access_key=md5($staff_id.date("Ymdhis"));
							/// update user on staff_tab
							mysqli_query($conn,"UPDATE staff_tab SET access_key='$access_key', updated_time=NOW() WHERE staff_id='$staff_id'")or die ("cannot update access key - staff_tab");
							$response['response']=100; 
							$response['success']=true;
							$response['staff_id']=$staff_id;
							$response['role_id']=$role_id;  
							$response['access_key']=$access_key;
							$response['message1']="LOGIN SUCCESSFULLY!";
							$response['message2']="Redireting to the portal..."; 

						}else if($status_id==2){/// else if 4
							$response['response']=101; 
							$response['success']=false;
							$response['message1']="USER SUSPENDED!"; 
							$response['message2']="Contact the admin for help."; 
						}else{/// else if 4
							$response['response']=102; 
							$response['success']=false;
							$response['message1']="USER UNDER REVIEWED!"; 
							$response['message2']="Contact the admin for help."; 
						}/// end if 4
					}else{ /// else if 3
						$response['response']=103; 
						$response['success']=false;
						$response['message1']="INVALID LOGIN PARAMETERS!"; 
						$response['message2']="Check email or password to continue.";
					} /// end if 3
				}else{/// else if 2
					$response['response']=103; 
					$response['success']=false;
					$response['message1']="INVALID LOGIN PARAMETERS!";  
					$response['message2']="Check email or password to continue."; 
				}/// end if 2
			}else{// else if 1
				$response['response']=105; 
				$response['success']=false;
				$response['message1']="LOGIN ERROR!"; 
				$response['message2']="Fill all fields to continue."; 
			}// end if 1
				
		break;
	
	
	
	
	
	
	
	
		case 'proceed_reset_password_api':
			$email=trim($_POST['email']);
			
			if($email!='')	{ // start if 1
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){ /// start if 2
					$query=mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email'") or die (mysqli_error($conn));
					$count_user=mysqli_num_rows($query);
					if ($count_user>0){ /// start if 3
						$fetch_query=mysqli_fetch_array($query);
						$staff_id=$fetch_query['staff_id'];  
						$hash_id=md5(date("Ymdhis"));
						$fullname=ucwords(strtolower($fetch_query['fullname'])); 
						$status_id=$fetch_query['status_id'];

						if($status_id==1){ /// start if 4 (check if the user is active)
							/// update user on staff_tab
							mysqli_query($conn,"UPDATE staff_tab SET hash_id='$hash_id', updated_time=NOW() WHERE staff_id='$staff_id'")or die (mysqli_error($conn));
							//// send link to email
							// $mail_to_send='send_reset_password_link';
							// require_once('mail/mail.php');	

							$response['response']=106; 
							$response['success']=true;
							$response['message1']="PROCEED!"; 
							$response['message2']="Continue to reset password"; 
							$response['staff_id']=$staff_id;
							$response['fullname']=$fullname; 
							$response['email']=$email;
							
						}else if($status_id==2){/// else if 4
							$response['response']=107; 
							$response['success']=false;
							$response['message1']="USER SUSPENDED"; 
							$response['message2']="Contact the admin for help.";

						}else{ /// else if 4
							$response['response']=108;  
							$response['success']=false;
							$response['message1']="USER UNDER REVIEWED"; 
							$response['message2']="Contact the admin for help."; 
						} /// end if 4
					}else{/// else if 3
						$response['response']=109; 
						$response['success']=false;
						$response['message1']="INVALID EMAIL ADDRESS!"; 
						$response['message2']="Check your email or contact admin!"; 
					}/// end if 3
				}else{ /// else if 2
					$response['response']=110; 
					$response['success']=false;
					$response['message1']="EMAIL ERROR!"; 
					$response['message2']="Invalid email address!"; 
				}/// end if 2
			}else{ /// else if 1
				$response['response']=111; 
				$response['success']=false;
				$response['message1']="EMAIL ERROR!";  
				$response['message2']="FIll email fields to continue!";  
			}/// end if 1
		break;
		
	




		case 'resend_mail_api':
			$staff_id=trim($_POST['staff_id']);

			$query=mysqli_query($conn,"SELECT staff_id FROM staff_tab WHERE staff_id='$staff_id'") or die (mysqli_error($conn));
			$count_user=mysqli_num_rows($query);
				if($count_user>0){ // start if 1
					$user_array=$callclass->_get_staff($conn, $staff_id);
					$u_array = json_decode($user_array, true);
					$fullname= ucwords(strtolower($u_array[0]['fullname']));
					$email= $u_array[0]['email'];
					$hash_id=md5(date("Ymdhis"));

					mysqli_query($conn,"UPDATE staff_tab SET hash_id='$hash_id', updated_time=NOW() WHERE staff_id='$staff_id'")or die (mysqli_error($conn));

					/// send link to email
					$mail_to_send='send_reset_password_link';
					require_once('mail/mail.php');

					$response['response']=112; 
					$response['success']=true;
					$response['message1']="MAIL SENT!";
					$response['message2']="Check your inbox or spam!";
				}else{ // else i
					$response['response']=113; 
					$response['success']=false;
					$response['message1']="USER ERROR!";
					$response['message2']="Mail not sent";
				}// end if 1
				
		break;
	
	




		case 'reset_password_hash_value_api':                                                                                                
			$hvid=$_POST['hvid']; 

			if($hvid!=''){// start if 1

				$query=mysqli_query($conn,"SELECT staff_id FROM staff_tab WHERE hash_id='$hvid' ")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ /// start if 3
					$response['response']=118;
					$response['success']=true;
					$fetch_query=mysqli_fetch_array($query);
					$staff_id=$fetch_query['staff_id'];  
					$response['staff_id']=$staff_id;

					mysqli_query($conn,"UPDATE staff_tab SET `hash_id`='' WHERE staff_id='$staff_id'")or die (mysqli_error($conn));
				}else{// else if 1
					$response['response']=119; 
					$response['success']=false;
				} // end if 1  
			
			}else{// else if 1
				$response['response']=119; 
				$response['success']=false;
			} //
		break;





		case 'complete_reset_password_api':
			$staff_id=$_POST['staff_id'];
			$password=md5($_POST['password']);
	
			if ($password==''){ //start if 1
				$response['response']=114; 
				$response['success']=false;
				$response['message1']="PASSWORD ERROR!";
				$response['message2']="Fill this fields to continue";
			}else{ // else if 1

				$query=mysqli_query($conn,"SELECT staff_id,role_id FROM staff_tab WHERE staff_id='$staff_id'") or die (mysqli_error($conn));
				$count_user=mysqli_num_rows($query);
				if ($count_user>0){ /// start if 3
					/// Generate login access key
					$access_key=md5($staff_id.date("Ymdhis"));
					$role_id=$fetch_query['role_id']; 
					/// update user on staff_tab
					mysqli_query($conn,"UPDATE staff_tab SET `password`='$password', access_key='$access_key', updated_time=NOW() WHERE staff_id='$staff_id'")or die ("cannot update staff_tab");
					
					$response['response']=115; 
					$response['success']=true;
					$response['staff_id']=$staff_id; 
					$response['access_key']=$access_key; 
					$response['role_id']=$role_id; 
					$response['message1']="PASSWORD RESET SUCCESSFUL!";
					$response['message2']="Redireting to the portal..."; 
				}else{
					$response['response']=118; 
					$response['success']=false;
					$response['message1']="USER ERROR!";
					$response['message2']="User not exist.";
				}
					
			}// end if 1
		break;


		

	}


}else{
		$access_key=trim($_GET['access_key']);
		///////////auth/////////////////////////////////////////
		$fetch=$callclass->_validate_accesskey($conn,$access_key);
		$array = json_decode($fetch, true);
		$check=$array[0]['check'];
		$login_staff_id=$array[0]['staff_id'];
		$login_role_id=$array[0]['role_id'];

		$response['check']=$check;
		if ($check==0) { /// start if check 
			$response['response']=99; 
			$response['success']=false;
			$response['message']='Invalid AccessToken. Please LogIn Again.'; 
		} else {/// else if check 


		switch ($action){


			case 'fetch_status_api':                                                                                                
				$status_id=trim($_POST['status_id']); 
				if($status_id!=''){// start if 1
					$query=mysqli_query($conn,"SELECT * FROM setup_status_tab WHERE status_id IN($status_id) ");
					
					$getCount=mysqli_num_rows($query);

					if ($getCount>0){ /// start if 3
						$response['response']=118;
						$response['success']=true;
						while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
							$response['data']=$fetch_query;
						}
					}else{
						$response['response']=119; 
						$response['success']=false;
						$response['message']='FETCH STATUS ERROR!'; 
					}
				}else{// else if 1
					$response['response']=119; 
					$response['success']=false;
					$response['message']='FETCH STATUS ERROR!'; 
				} // end if 1                                                                                                                           
			break;


			case 'fetch_role_api':
				$role_id=trim($_POST['role_id']);	
				if($role_id!=''){// start if 1
					$query=mysqli_query($conn,"SELECT * FROM setup_role_tab WHERE role_id IN($role_id) ");
					$response['response']=120;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{// else if 1
					$response['response']=121; 
					$response['success']=false;
					$response['message']='FETCH ROLE ERROR!'; 
				}//end if 1
			break;
	
			
			case 'fetch_cat_api':                                                                                                
				$query=mysqli_query($conn,"SELECT * FROM setup_categories_tab");
				$response['response']=122;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
					$response['data']=$fetch_query;
				}                                                                                                                       
			break;

			
			
			

			case 'add_or_update_staff_api':
				$staff_id=trim(strtoupper($_POST['staff_id']));
				$fullname=trim(strtoupper($_POST['fullname']));
				$mobile=trim($_POST['mobile']);
				$email=trim($_POST['email']);
				$address=trim(strtoupper($_POST['address']));	
			
				$role_id=trim($_POST['role_id']);
				$status_id=trim($_POST['status_id']);
				
				if(($fullname=='')||($mobile=='')||($email=='')||($address=='')||($role_id=='')||($status_id=='')){ ///start if 1
					$response['response']=126; 
					$response['success']=false;
					$response['message1']="ERROR!"; 
					$response['message2']="Fill all fields to continue."; 
				}else{ ///else if 1
					if(filter_var($email, FILTER_VALIDATE_EMAIL)){ ///start if 2
						if($staff_id==''){ ///start if 3
							$usercheck=mysqli_query($conn,"SELECT email FROM staff_tab WHERE email='$email'");
							$useremail=mysqli_num_rows($usercheck);
							if ($useremail>0){ ///start if 4
								$response['response']=127; 
								$response['success']=false;
								$response['message1']="EMAIL ERROR!"; 
								$response['message2']="Email already been used.";
							}else{ ///else if 4
								///////////////////////geting sequence//////////////////////////
								$sequence=$callclass->_get_sequence_count($conn, 'STF');
								$array = json_decode($sequence, true);
								$no= $array[0]['no'];
								
								/// generate staff_id and password 
								$staff_id='STF'.$no.date("Ymdhis");
								$password=md5($staff_id);

								/// insert into staff_tab
								mysqli_query($conn,"INSERT INTO `staff_tab`
								(`staff_id`, `fullname`, `mobile`, `email`,`address`, `role_id`, `status_id`, `password`, `created_time`) VALUES
								('$staff_id', '$fullname', '$mobile','$email','$address','$role_id', '$status_id', '$password', NOW())")or die (mysqli_error($conn));
								
								$response['response']=128; 
								$response['success']=true;
								$response['message1']="SUCCESS!"; 
								$response['message2']="Staff Registered Successfully.";
								$response['staff_id']=$staff_id; 
							} ///end if 4
							
						}else{ ///else if 3
							$usercheck=mysqli_query($conn,"SELECT email FROM staff_tab WHERE email='$email' AND staff_id!='$staff_id' LIMIT 1");
							$useremail=mysqli_num_rows($usercheck);
							if ($useremail>0){ ///start if 5
								$response['response']=129; 
								$response['success']=false;
								$response['message1']="EMAIL ERROR!"; 
								$response['message2']="Email already been used.";
							}else{ ///else if 4
								$query=mysqli_query($conn,"SELECT status_name FROM setup_status_tab WHERE status_id='$status_id'")or die (mysqli_error($conn));
								$fetch_query=mysqli_fetch_array($query);
								$status_name=$fetch_query['status_name']; 

								mysqli_query($conn,"UPDATE staff_tab SET fullname='$fullname',mobile='$mobile',email='$email', `address`='$address', status_id='$status_id', role_id='$role_id' WHERE staff_id='$staff_id'") or die (mysqli_error($conn));
								$response['response']=130; 
								$response['success']=true;
								$response['message1']="SUCCESS!"; 
								$response['message2']="Staff Updated Successfully.";
								$response['status_name']=$status_name;
								$response['fullname']=ucwords(strtolower($fullname));
							} ///end if 5
						} ///end if 3
					}else{ ///else if 2
						$response['response']=131; 
						$response['success']=false;
						$response['message']="ERROR: $email is NOT an email address"; 
						$response['message1']="EMAIL ERROR!"; 
						$response['message2']="Not valid email address";
					} ///end if 2
				} //end if 1
			break;


			
			case 'fetch_staff_api':
				$staff_id=trim(strtoupper($_POST['staff_id']));
				$status_id=($_POST['status_id']);
				$search_txt=($_POST['search_txt']);
				
				$search_like="(
				fullname like '%$search_txt%' OR 
				mobile like '%$search_txt%' OR 
				email like '%$search_txt%')";

				$selectQuery="SELECT a.*, b.*, c.* FROM staff_tab a, setup_status_tab b, setup_role_tab c WHERE a.status_id=b.status_id AND a.role_id=c.role_id";
				/// write sql statement and function that will return all staff here
				if ($staff_id=='') {///start if 1
					$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND a.role_id<'$login_role_id' AND $search_like ORDER BY fullname ASC")or die (mysqli_error($conn));
					$check_query=mysqli_num_rows($query);
					if ($check_query>0) { // start if 2
						$response['response']=132;
						$response['success']=true;
						while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
							$response['data']=$fetch_query;
						}
					}else{ // else if 2
						$response['response']=133;
						$response['success']=false;
						$response['message']="NO RECORD FOUND!!!"; 
					}// End if 2
				}else{///else if 1

					$query=mysqli_query($conn, "$selectQuery AND a.staff_id ='$staff_id'")or die (mysqli_error($conn));
					$response['response']=134;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_assoc($query)){
						$response['data']=$fetch_query;
					} 
				} //end if 1
				
			break;






		case 'upload_passport_api':
			$staff_id=trim(($_POST['staff_id']));
		
			// Upload Profile Pix for first time login
			$passport_pix=$_FILES['passport']['name'];
			
			$datetime=date("Ymdhi");

			$user_array=$callclass->_get_staff($conn, $staff_id);
			$u_array = json_decode($user_array, true);
			$db_passport= $u_array[0]['passport'];

			$response['db_passport']=$db_passport;

			$extension = pathinfo($passport_pix, PATHINFO_EXTENSION);					
			$passport = $datetime.'_'.$staff_id.'_'.uniqid().'.'.$extension;
	
			$response['response']=84;
			$response['result']=true;
			$response['message1']='PASSPORT UPLOAD';
			$response['message2']='Successfully!';
		
			$response['passport']=$passport;
			
			mysqli_query($conn,"UPDATE `staff_tab` SET passport='$passport' WHERE staff_id='$staff_id'")
			or die (mysqli_error($conn));
		
		break;






		case 'fetch_tourism_product_api':
		
			$query=mysqli_query($conn, "SELECT * FROM tourism_products_tab")or die (mysqli_error($conn));
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		break;








/////////////////////// START TOURSIT ATTRACTION API//////////////////////////////////////



		case 'add_or_update_tourism_attraction_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$page_title =str_replace("'", "\'", $_POST['page_title']);
			$page_pix=$_FILES['page_pix']['name']; //// page passport value
			$status_id=trim($_POST['status_id']);

			if(($page_title=='') || ($status_id=='')){ ///start if 1
				$response['response']=209; 
				$response['success']=false;
				$response['message1']="ERROR!"; 
				$response['message2']="Fill all fields to continue!"; 
			}else{ ///else if 1

				if($page_id==''){ ///start if 2
					$query=mysqli_query($conn,"SELECT page_title FROM tourism_attraction_tab WHERE page_title='$page_title'")or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0){ ///start if 3
						$response['response']=210; 
						$response['success']=false;
						$response['message1']="PAGE TITLE ERROR!"; 
						$response['message2']="Page Title Already Exist!"; 						
					}else{ ///else if 3

						/////////////////geting sequence////////////////////
						$sequence=$callclass->_get_sequence_count($conn, 'TA');
						$array = json_decode($sequence, true);
						$no= $array[0]['no'];
						
						/// generate page id //// 
						$page_id='TA'.$no.date("Ymdhis");
						////////////////////generate exam_pix/////////////////
						$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
						$page_photo = $page_id.'_'.uniqid().'.'.$extension;

						if($page_pix==''){
							$page_photo= '';
						}

						mysqli_query($conn,"INSERT INTO `tourism_attraction_tab`
						(`page_id`, `page_title`, `status_id`, `page_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
						('$page_id', '$page_title','$status_id', '$page_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
					
						$response['response']=211; 
						$response['success']=true;
						$response['message1']="SUCCESS!"; 
						$response['message2']="Registered Successfully!"; 	 
						$response['page_id']=$page_id;
						$response['page_photo']=$page_photo;  	
					}// end if 3
			
				}else{ ///else if 2 
					$query=mysqli_query($conn,"SELECT page_title FROM tourism_attraction_tab WHERE page_title='$page_title' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0){ ///start if 3
						$response['response']=210; 
						$response['success']=false;
						$response['message1']="PAGE TITLE ERROR!"; 
						$response['message2']="Page Title Already Exist!"; 						
					}else{ ///else if 3	
					
						mysqli_query($conn,"UPDATE tourism_attraction_tab SET page_title='$page_title', status_id='$status_id', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
						if ($page_pix!=''){
							$query=mysqli_query($conn,"SELECT page_pix FROM tourism_attraction_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
							$fetch_query=mysqli_fetch_array($query);
							$old_page_pix=$fetch_query['page_pix'];
							$response['old_page_pix']=$old_page_pix; 
					
							$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
							$page_photo = $page_id.'_'.uniqid().'.'.$extension;
							mysqli_query($conn,"UPDATE tourism_attraction_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
							$response['page_photo']=$page_photo; 
						}
						
						$response['response']=212; 
						$response['success']=true;
						$response['message1']="SUCCESS!"; 
						$response['message2']="Updated Successfully!"; 
						$response['page_id']=$page_id;
						$response['page_photo']=$page_photo;
						$response['old_page_pix']=$old_page_pix;                          
					///end if 2
					}		
				}
			}
		break;





			case 'fetch_tourism_attraction_api':
				$page_id=trim(strtoupper($_POST['page_id']));
				$status_id=($_POST['status_id']);
				$search_txt=($_POST['search_txt']);
				
				$search_like="(
				page_title like '%$search_txt%' OR 
				page_url like '%$search_txt%')";

				$selectQuery="SELECT a.*, b.* FROM tourism_attraction_tab a, setup_status_tab b WHERE a.status_id=b.status_id";
				/// write sql statement and function that will return all staff here
				if ($page_id=='') {///start if 1
					$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0001'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$tourism_products_name=$fetch_query['tourism_products_name'];
					$response['tourism_products_name']=$tourism_products_name;

					$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%'  AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0) { // start if 2
						$response['response']=132;
						$response['success']=true;
						while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
							$response['data']=$fetch_query;
						}
					}else{ // else if 2
						$response['response']=133;
						$response['success']=false;
						$response['message']="NO RECORD FOUND!!!"; 
					}// End if 2
				}else{///else if 1

					$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0001'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$tourism_products_name=$fetch_query['tourism_products_name'];
					$response['tourism_products_name']=$tourism_products_name;

					$query=mysqli_query($conn, "$selectQuery AND a.page_id ='$page_id'")or die (mysqli_error($conn));
					$response['response']=134;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_assoc($query)){
						$response['data']=$fetch_query;
					} 
				} //end if 1
				
			break;






			case 'update_tourism_attraction_page_details_api':
				$page_id = $_POST['page_id'];
				$page_title =str_replace("'", "\'", $_POST['page_title']);
				$page_url = str_replace("'", "\\'", strtolower(trim($_POST['page_url'])));
				$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
				$page_summary = str_replace("'", "\'", $_POST['page_summary']);
				$page_detail = str_replace("'", "\'", $_POST['page_detail']);
				$page_pix=$_FILES['page_pix']['name']; //// page passport value


				if(($page_title=='')||($page_url=='')||($seo_keywords=='')||($page_summary=='')||($page_detail=='')){ ///start if 1
					$response['response']=209; 
					$response['success']=false;
					$response['message1']="ERROR!"; 
					$response['message2']="Fill all fields to continue!"; 
				}else{ ///else if 1
					if($page_id==''){ ///start if 2
							/// do nothing			
					}else{ ///else if 3
						$urlcheck=mysqli_query($conn,"SELECT page_url FROM tourism_attraction_tab WHERE page_url='$page_url' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
						$check=mysqli_num_rows($urlcheck);
						if ($check>0){ ///start if 3
							$response['response']=210; 
							$response['success']=False;
							$response['message1']="ERROR!"; 
							$response['message2']="Page URL Already Exist!"; 						
						}else{ ///else if 3
				
							$urlcheck=mysqli_query($conn,"SELECT page_url FROM tourism_attraction_tab WHERE page_id='$page_id'") or die (mysqli_error($conn));
							$fetch_query=mysqli_fetch_array($urlcheck);
							$db_page_url=$fetch_query['page_url']; 

							mysqli_query($conn,"UPDATE tourism_attraction_tab SET page_title='$page_title', page_url='$page_url', seo_keywords='$seo_keywords', page_summary='$page_summary', page_detail='$page_detail', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
				
							if ($page_pix!=''){
								$query=mysqli_query($conn,"SELECT page_pix FROM tourism_attraction_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
								$fetch_query=mysqli_fetch_array($query);
								$old_page_pix=$fetch_query['page_pix'];
								$response['old_page_pix']=$old_page_pix; 
						
								$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
								$page_photo = $page_id.'_'.uniqid().'.'.$extension;
								mysqli_query($conn,"UPDATE tourism_attraction_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
								$response['page_photo']=$page_photo; 
							}
								$query=mysqli_query($conn,"SELECT page_pix FROM tourism_attraction_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
								$fetch_query=mysqli_fetch_array($query);
								$old_seo_page_pix=$fetch_query['page_pix'];
								$response['old_seo_page_pix']=$old_seo_page_pix;

								$response['response']=212; 
								$response['success']=true;
								$response['message1']="SUCCESS!"; 
								$response['message2']="Page Updated Successfully!"; 
								
								$response['page_id']=$page_id;
								$response['page_title'] = $page_title;
								$response['page_url'] = $page_url;
								$response['seo_keywords'] = $seo_keywords;
								$response['page_summary'] = $page_summary;
								$response['page_detail'] = $page_detail;
								
								$response['db_page_url']=$db_page_url;
						}
					} ///end if 2		
				}//end if 1
			break;



		case 'tourism_attraction_other_pix_api':
			$page_id = $_POST['page_id'];
			if (isset($_FILES["more_page_pix"]["name"])) {

				$totalFiles = count($_FILES["more_page_pix"]["name"]);
				$filesArray = array();

					$query=mysqli_query($conn, "SELECT page_id FROM tourism_products_pix_tab WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0) {
						
						$get_pix = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
						$row = mysqli_fetch_assoc($get_pix);
						$db_tourism_product_pix = $row['tourism_product_pix'];

						for ($i = 0; $i < $totalFiles; $i++) {
							$imageName = $_FILES["more_page_pix"]["name"][$i];
							$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
					
							$imageExtension = explode('.', $imageName);
							$imageExtension = strtolower(end($imageExtension));
		
							$newImageName = $page_id . "-" . $i . "-" . uniqid('', true);
							$newImageName .= "." . $imageExtension;
							
							$filesArray[] = $newImageName;
							
							move_uploaded_file($tmpName, '../uploaded_files/tourist_attraction_pix/other_pix/' . $newImageName);
						}
						$all_pix = $db_tourism_product_pix . ',' . implode(',', $filesArray);
						mysqli_query($conn,"UPDATE tourism_products_pix_tab SET tourism_product_pix='$all_pix' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					
					}else{

						for ($i = 0; $i < $totalFiles; $i++) {
							$imageName = $_FILES["more_page_pix"]["name"][$i];
							$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
					
							$imageExtension = explode('.', $imageName);
							$imageExtension = strtolower(end($imageExtension));
		
							$newImageName = $page_id . "-" . $i . "-" . uniqid();
							$newImageName .= "." . $imageExtension;
							
							$filesArray[] = $newImageName;
							
							move_uploaded_file($tmpName, '../uploaded_files/tourist_attraction_pix/other_pix/' . $newImageName);
						}
				
						// Combine file names into a comma-separated string
						$tourism_product_pix = implode(',', $filesArray);
						mysqli_query($conn,"INSERT INTO `tourism_products_pix_tab`
						(`page_id`, `tourism_product_pix`) VALUES 
						('$page_id', '$tourism_product_pix')");
					}

					$response['response']=212; 
					$response['success']=true;
					$response['filesArray']=$filesArray;
					$response['newImageName']=$newImageName;
					$response['message1']="UPDATE SUCCESS!"; 
					$response['message2']="Picture Upload Successfully!"; 
			}
		break;



		case 'fetch_tourism_attraction_other_pix_api':
			$page_id = $_POST['page_id'];
		
			$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
			$fetch = mysqli_fetch_array($get_pix_query);
			$tourism_product_pix = $fetch['tourism_product_pix'];

			if (empty($tourism_product_pix)) {
                mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
				$response['response']=212; 
				$response['success']=false;
				$response['message1']="ERROR!"; 
				$response['message2']="No Picture Found.";
			} else {
				$getCount=mysqli_num_rows($get_pix_query);
				if ($getCount>0) {
				
					$response = array();
					$get_all_pix = explode(',', $fetch['tourism_product_pix']);
				
						$response['response']=212; 
						$response['success']=true;
						$response['get_all_pix'] = $get_all_pix;
				
				} else {
					$response['response']=212; 
					$response['success']=false;
					$response['message1']="ERROR!"; 
					$response['message2']="No Picture Found."; 
				}
			}
		break;


		


		case 'delete_tourism_attraction_other_pix_api':
			$page_id = $_POST['page_id'];
			$delete_pix = $_POST['delete_pix'];
		
			// Fetch existing pictures from the database
			$get_pix_query = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($get_pix_query);

			if ($getCount>0) {
				$fetch = mysqli_fetch_assoc($get_pix_query);
				$existing_pictures = explode(',', $fetch['tourism_product_pix']);
		
				// Check if the picture to be deleted exists in the list
				$array_key = array_search($delete_pix, $existing_pictures);
				
				if ($array_key !== false) {
					// Remove the picture from the array
					unset($existing_pictures[$array_key]);
		
					// Update the database with the modified list
					$new_picture_list = implode(',', $existing_pictures);
					mysqli_query($conn, "UPDATE `tourism_products_pix_tab` SET `tourism_product_pix` = '$new_picture_list' WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
		
					// Unlink (delete) the picture file from the folder
					$path_to_picture = '../uploaded_files/tourist_attraction_pix/other_pix/' . $delete_pix;
					if (file_exists($path_to_picture)) {
						unlink($path_to_picture);
					}else{
						// do nothing
					}
					
					$response['response'] = 212; 
					$response['success'] = true;
					$response['message1'] = "SUCCESS";
					$response['message2'] = "Picture Deleted Successfully";
				} else {
					$response['response'] = 212; 
					$response['success'] = false;
					$response['message1'] = "ERROR!";
					$response['message2'] = "Picture Not Found.";
				}
			} else {
				$response['response'] = 212; 
				$response['success'] = false;
				$response['message1'] = "ERROR!";
				$response['message2'] = "No Pictures Found.";
			}
		
		break;


/////////////////////// END TOURSIT ATTRACTION API//////////////////////////////////////












/////////////////////// START TOURSIT DESTINATION API//////////////////////////////////////



		case 'add_or_update_tourism_destination_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$page_title =str_replace("'", "\'", $_POST['page_title']);
			$page_pix=$_FILES['page_pix']['name']; //// page passport value
			$status_id=trim($_POST['status_id']);

			if(($page_title=='') || ($status_id=='')){ ///start if 1
				$response['response']=209; 
				$response['success']=false;
				$response['message1']="ERROR!"; 
				$response['message2']="Fill all fields to continue!"; 
			}else{ ///else if 1

				if($page_id==''){ ///start if 2
					$query=mysqli_query($conn,"SELECT page_title FROM tourism_destination_tab WHERE page_title='$page_title'")or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0){ ///start if 3
						$response['response']=210; 
						$response['success']=false;
						$response['message1']="PAGE TITLE ERROR!"; 
						$response['message2']="Page Title Already Exist!"; 						
					}else{ ///else if 3

						/////////////////geting sequence////////////////////
						$sequence=$callclass->_get_sequence_count($conn, 'TD');
						$array = json_decode($sequence, true);
						$no= $array[0]['no'];
						
						/// generate page id //// 
						$page_id='TD'.$no.date("Ymdhis");
						////////////////////generate exam_pix/////////////////
						$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
						$page_photo = $page_id.'_'.uniqid().'.'.$extension;

						if($page_pix==''){
							$page_photo= '';
						}

						mysqli_query($conn,"INSERT INTO `tourism_destination_tab`
						(`page_id`, `page_title`, `status_id`, `page_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
						('$page_id', '$page_title','$status_id', '$page_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
					
						$response['response']=211; 
						$response['success']=true;
						$response['message1']="SUCCESS!"; 
						$response['message2']="Registered Successfully!"; 	 
						$response['page_id']=$page_id;
						$response['page_photo']=$page_photo;  	
					}// end if 3
			
				}else{ ///else if 2 
					$query=mysqli_query($conn,"SELECT page_title FROM tourism_destination_tab WHERE page_title='$page_title' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0){ ///start if 3
						$response['response']=210; 
						$response['success']=false;
						$response['message1']="PAGE TITLE ERROR!"; 
						$response['message2']="Page Title Already Exist!"; 						
					}else{ ///else if 3	
					
						mysqli_query($conn,"UPDATE tourism_destination_tab SET page_title='$page_title', status_id='$status_id', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
						if ($page_pix!=''){
							$query=mysqli_query($conn,"SELECT page_pix FROM tourism_destination_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
							$fetch_query=mysqli_fetch_array($query);
							$old_page_pix=$fetch_query['page_pix'];
							$response['old_page_pix']=$old_page_pix; 
					
							$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
							$page_photo = $page_id.'_'.uniqid().'.'.$extension;
							mysqli_query($conn,"UPDATE tourism_destination_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
							$response['page_photo']=$page_photo; 
						}
						
						$response['response']=212; 
						$response['success']=true;
						$response['message1']="SUCCESS!"; 
						$response['message2']="Updated Successfully!"; 
						$response['page_id']=$page_id;
						$response['page_photo']=$page_photo;
						$response['old_page_pix']=$old_page_pix;
					///end if 2
					}		
				}
			}
		break;





		case 'fetch_tourism_destination_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$status_id=($_POST['status_id']);
			$search_txt=($_POST['search_txt']);
			
			$search_like="(
			page_title like '%$search_txt%' OR 
			page_url like '%$search_txt%')";

			

			$selectQuery="SELECT a.*, b.* FROM tourism_destination_tab a, setup_status_tab b WHERE a.status_id=b.status_id";
			/// write sql statement and function that will return all staff here
			if ($page_id=='') {///start if 1
				
				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0007'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%'  AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=132;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=133;
					$response['success']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				}// End if 2
			}else{///else if 1

				$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0007'")or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($query);
				$tourism_products_name=$fetch_query['tourism_products_name'];
				$response['tourism_products_name']=$tourism_products_name;

				$query=mysqli_query($conn, "$selectQuery AND a.page_id ='$page_id'")or die (mysqli_error($conn));
				$response['response']=134;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;





		case 'update_tourism_destination_page_details_api':
			$page_id = $_POST['page_id'];
			$page_title =str_replace("'", "\'", $_POST['page_title']);
			$page_url = str_replace("'", "\\'", strtolower(trim($_POST['page_url'])));
			$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
			$page_summary = str_replace("'", "\'", $_POST['page_summary']);
			$page_detail = str_replace("'", "\'", $_POST['page_detail']);
			$page_pix=$_FILES['page_pix']['name']; //// page passport value


			if(($page_title=='')||($page_url=='')||($seo_keywords=='')||($page_summary=='')||($page_detail=='')){ ///start if 1
				$response['response']=209; 
				$response['success']=false;
				$response['message1']="ERROR!"; 
				$response['message2']="Fill all fields to continue!"; 
			}else{ ///else if 1
				if($page_id==''){ ///start if 2
						/// do nothing			
				}else{ ///else if 3
					$urlcheck=mysqli_query($conn,"SELECT page_url FROM tourism_destination_tab WHERE page_url='$page_url' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
					$check=mysqli_num_rows($urlcheck);
					if ($check>0){ ///start if 3
						$response['response']=210; 
						$response['success']=False;
						$response['message1']="ERROR!"; 
						$response['message2']="Page URL Already Exist!"; 						
					}else{ ///else if 3
			
						$urlcheck=mysqli_query($conn,"SELECT page_url FROM tourism_destination_tab WHERE page_id='$page_id'") or die (mysqli_error($conn));
						$fetch_query=mysqli_fetch_array($urlcheck);
						$db_page_url=$fetch_query['page_url']; 

						mysqli_query($conn,"UPDATE tourism_destination_tab SET page_title='$page_title', page_url='$page_url', seo_keywords='$seo_keywords', page_summary='$page_summary', page_detail='$page_detail', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
						if ($page_pix!=''){
							$query=mysqli_query($conn,"SELECT page_pix FROM tourism_destination_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
							$fetch_query=mysqli_fetch_array($query);
							$old_page_pix=$fetch_query['page_pix'];
							$response['old_page_pix']=$old_page_pix; 
					
							$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
							$page_photo = $page_id.'_'.uniqid().'.'.$extension;
							mysqli_query($conn,"UPDATE tourism_destination_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
							$response['page_photo']=$page_photo; 
						}

							$query=mysqli_query($conn,"SELECT page_pix FROM tourism_destination_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
							$fetch_query=mysqli_fetch_array($query);
							$old_seo_page_pix=$fetch_query['page_pix'];
							$response['old_seo_page_pix']=$old_seo_page_pix;

							$response['response']=212; 
							$response['success']=true;
							$response['message1']="SUCCESS!"; 
							$response['message2']="Page Updated Successfully!"; 
							
							$response['page_id']=$page_id;
							$response['page_title'] = $page_title;
							$response['page_url'] = $page_url;
							$response['seo_keywords'] = $seo_keywords;
							$response['page_summary'] = $page_summary;
							$response['page_detail'] = $page_detail;
							
							$response['db_page_url']=$db_page_url;
					}
				} ///end if 2		
			}//end if 1
		break;



		case 'tourism_destination_other_pix_api':
			$page_id = $_POST['page_id'];
			if (isset($_FILES["more_page_pix"]["name"])) {

				$totalFiles = count($_FILES["more_page_pix"]["name"]);
				$filesArray = array();

					$query=mysqli_query($conn, "SELECT page_id FROM tourism_products_pix_tab WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0) {
						
						$get_pix = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
						$row = mysqli_fetch_assoc($get_pix);
						$db_tourism_product_pix = $row['tourism_product_pix'];

						for ($i = 0; $i < $totalFiles; $i++) {
							$imageName = $_FILES["more_page_pix"]["name"][$i];
							$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
					
							$imageExtension = explode('.', $imageName);
							$imageExtension = strtolower(end($imageExtension));
		
							$newImageName = $page_id . "-" . $i . "-" . uniqid('', true);
							$newImageName .= "." . $imageExtension;
							
							$filesArray[] = $newImageName;
							
							move_uploaded_file($tmpName, '../uploaded_files/tourist_destination_pix/other_pix/' . $newImageName);
						}
						$all_pix = $db_tourism_product_pix . ',' . implode(',', $filesArray);
						mysqli_query($conn,"UPDATE tourism_products_pix_tab SET tourism_product_pix='$all_pix' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					
					}else{

						for ($i = 0; $i < $totalFiles; $i++) {
							$imageName = $_FILES["more_page_pix"]["name"][$i];
							$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
					
							$imageExtension = explode('.', $imageName);
							$imageExtension = strtolower(end($imageExtension));
		
							$newImageName = $page_id . "-" . $i . "-" . uniqid();
							$newImageName .= "." . $imageExtension;
							
							$filesArray[] = $newImageName;
							
							move_uploaded_file($tmpName, '../uploaded_files/tourist_destination_pix/other_pix/' . $newImageName);
						}
				
						// Combine file names into a comma-separated string
						$tourism_product_pix = implode(',', $filesArray);
						mysqli_query($conn,"INSERT INTO `tourism_products_pix_tab`
						(`page_id`, `tourism_product_pix`) VALUES 
						('$page_id', '$tourism_product_pix')");
					}

					$response['response']=212; 
					$response['success']=true;
					$response['filesArray']=$filesArray;
					$response['newImageName']=$newImageName;
					$response['message1']="UPDATE SUCCESS!"; 
					$response['message2']="Picture Upload Successfully!"; 
			}
		break;



		case 'fetch_tourism_destination_other_pix_api':
			$page_id = $_POST['page_id'];
		
			$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
			$fetch = mysqli_fetch_array($get_pix_query);
			$tourism_product_pix = $fetch['tourism_product_pix'];

			if (empty($tourism_product_pix)) {
                mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
				$response['response']=212; 
				$response['success']=false;
				$response['message1']="ERROR!"; 
				$response['message2']="No Picture Found.";
			} else {
				$getCount=mysqli_num_rows($get_pix_query);
				if ($getCount>0) {
				
					$response = array();
					$get_all_pix = explode(',', $fetch['tourism_product_pix']);
				
						$response['response']=212; 
						$response['success']=true;
						$response['get_all_pix'] = $get_all_pix;
				
				} else {
					$response['response']=212; 
					$response['success']=false;
					$response['message1']="ERROR!"; 
					$response['message2']="No Picture Found."; 
				}
			}
		break;


		


		case 'delete_tourism_destination_other_pix_api':
			$page_id = $_POST['page_id'];
			$delete_pix = $_POST['delete_pix'];
		
			// Fetch existing pictures from the database
			$get_pix_query = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($get_pix_query);

			if ($getCount>0) {
				$fetch = mysqli_fetch_assoc($get_pix_query);
				$existing_pictures = explode(',', $fetch['tourism_product_pix']);
		
				// Check if the picture to be deleted exists in the list
				$array_key = array_search($delete_pix, $existing_pictures);
				
				if ($array_key !== false) {
					// Remove the picture from the array
					unset($existing_pictures[$array_key]);
		
					// Update the database with the modified list
					$new_picture_list = implode(',', $existing_pictures);
					mysqli_query($conn, "UPDATE `tourism_products_pix_tab` SET `tourism_product_pix` = '$new_picture_list' WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
		
					// Unlink (delete) the picture file from the folder
					$path_to_picture = '../uploaded_files/tourist_destination_pix/other_pix/' . $delete_pix;
					if (file_exists($path_to_picture)) {
						unlink($path_to_picture);
					}else{
						$response['response'] = 212; 
						$response['success'] = true;
						$response['message1'] = "ERROR!";
						$response['message2'] = "No Picture Found!";
					}
					
					$response['response'] = 212; 
					$response['success'] = true;
					$response['message1'] = "SUCCESS";
					$response['message2'] = "Picture Deleted Successfully";
				} else {
					$response['response'] = 212; 
					$response['success'] = false;
					$response['message1'] = "ERROR!";
					$response['message2'] = "Picture Not Found.";
				}
			} else {
				$response['response'] = 212; 
				$response['success'] = false;
				$response['message1'] = "ERROR!";
				$response['message2'] = "No Pictures Found.";
			}
		
		break;



/////////////////////// END TOURSIT DESTINATION API////////////////////////////////














/////////////////////// START EVENT API//////////////////////////////////////



case 'add_or_update_event_api':
	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value
	$status_id=trim($_POST['status_id']);

	if(($page_title=='') || ($status_id=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1

		if($page_id==''){ ///start if 2
			$query=mysqli_query($conn,"SELECT page_title FROM event_tab WHERE page_title='$page_title'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="PAGE TITLE ERROR!"; 
				$response['message2']="Page Title Already Exist!"; 						
			}else{ ///else if 3

				/////////////////geting sequence////////////////////
				$sequence=$callclass->_get_sequence_count($conn, 'ET');
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];
				
				/// generate page id //// 
				$page_id='ET'.$no.date("Ymdhis");
				////////////////////generate exam_pix/////////////////
				$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
				$page_photo = $page_id.'_'.uniqid().'.'.$extension;

				if ($page_pix=='') {
					$page_photo= '';
				}

				mysqli_query($conn,"INSERT INTO `event_tab`
				(`page_id`, `page_title`, `status_id`, `page_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
				('$page_id', '$page_title','$status_id', '$page_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
			
				$response['response']=211; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Registered Successfully!"; 	 
				$response['page_id']=$page_id;
				$response['page_photo']=$page_photo;  	
			}// end if 3
	
		}else{ ///else if 2 
			$query=mysqli_query($conn,"SELECT page_title FROM event_tab WHERE page_title='$page_title' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="PAGE TITLE ERROR!"; 
				$response['message2']="Page Title Already Exist!"; 						
			}else{ ///else if 3	
			
				mysqli_query($conn,"UPDATE event_tab SET page_title='$page_title', status_id='$status_id', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
	
				if ($page_pix!=''){
					$query=mysqli_query($conn,"SELECT page_pix FROM event_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_page_pix=$fetch_query['page_pix'];
					$response['old_page_pix']=$old_page_pix; 
			
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;
					mysqli_query($conn,"UPDATE event_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$response['page_photo']=$page_photo; 
				}
				
				$response['response']=212; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Updated Successfully!"; 
				$response['page_id']=$page_id;
				$response['page_photo']=$page_photo;
				$response['old_page_pix']=$old_page_pix;
			///end if 2
			}		
		}
	}
break;





case 'fetch_event_api':
	$page_id=trim(strtoupper($_POST['page_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(
	page_title like '%$search_txt%' OR 
	page_url like '%$search_txt%')";

	

	$selectQuery="SELECT a.*, b.* FROM event_tab a, setup_status_tab b WHERE a.status_id=b.status_id";
	/// write sql statement and function that will return all staff here
	if ($page_id=='') {///start if 1
		
		$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0008'")or die (mysqli_error($conn));
		$fetch_query=mysqli_fetch_array($query);
		$tourism_products_name=$fetch_query['tourism_products_name'];
		$response['tourism_products_name']=$tourism_products_name;

		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%'  AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1

		$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0008'")or die (mysqli_error($conn));
		$fetch_query=mysqli_fetch_array($query);
		$tourism_products_name=$fetch_query['tourism_products_name'];
		$response['tourism_products_name']=$tourism_products_name;

		$query=mysqli_query($conn, "$selectQuery AND a.page_id ='$page_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;





case 'update_event_page_details_api':
	$page_id = $_POST['page_id'];
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_url = str_replace("'", "\\'", strtolower(trim($_POST['page_url'])));
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$page_summary = str_replace("'", "\'", $_POST['page_summary']);
	$page_detail = str_replace("'", "\'", $_POST['page_detail']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value


	if(($page_title=='')||($page_url=='')||($seo_keywords=='')||($page_summary=='')||($page_detail=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1
		if($page_id==''){ ///start if 2
				/// do nothing			
		}else{ ///else if 3
			$urlcheck=mysqli_query($conn,"SELECT page_url FROM event_tab WHERE page_url='$page_url' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
			$check=mysqli_num_rows($urlcheck);
			if ($check>0){ ///start if 3
				$response['response']=210; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Page URL Already Exist!"; 						
			}else{ ///else if 3
	
				$urlcheck=mysqli_query($conn,"SELECT page_url FROM event_tab WHERE page_id='$page_id'") or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($urlcheck);
				$db_page_url=$fetch_query['page_url']; 

				mysqli_query($conn,"UPDATE event_tab SET page_title='$page_title', page_url='$page_url', seo_keywords='$seo_keywords', page_summary='$page_summary', page_detail='$page_detail', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));

				if ($page_pix!=''){
					$query=mysqli_query($conn,"SELECT page_pix FROM event_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_page_pix=$fetch_query['page_pix'];
					$response['old_page_pix']=$old_page_pix; 
			
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;
					mysqli_query($conn,"UPDATE event_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$response['page_photo']=$page_photo; 
				}

					$query=mysqli_query($conn,"SELECT page_pix FROM event_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_seo_page_pix=$fetch_query['page_pix'];
					$response['old_seo_page_pix']=$old_seo_page_pix;

					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Page Updated Successfully!"; 
					
					$response['page_id']=$page_id;
					$response['page_title'] = $page_title;
					$response['page_url'] = $page_url;
					$response['seo_keywords'] = $seo_keywords;
					$response['page_summary'] = $page_summary;
					$response['page_detail'] = $page_detail;
					
					$response['db_page_url']=$db_page_url;
			}
		} ///end if 2		
	}//end if 1
break;



case 'event_other_pix_api':
	$page_id = $_POST['page_id'];
	if (isset($_FILES["more_page_pix"]["name"])) {

		$totalFiles = count($_FILES["more_page_pix"]["name"]);
		$filesArray = array();

			$query=mysqli_query($conn, "SELECT page_id FROM tourism_products_pix_tab WHERE page_id='$page_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0) {
				
				$get_pix = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
				$row = mysqli_fetch_assoc($get_pix);
				$db_tourism_product_pix = $row['tourism_product_pix'];

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid('', true);
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/event_pix/other_pix/' . $newImageName);
				}
				$all_pix = $db_tourism_product_pix . ',' . implode(',', $filesArray);
				mysqli_query($conn,"UPDATE tourism_products_pix_tab SET tourism_product_pix='$all_pix' WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
			}else{

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid();
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/event_pix/other_pix/' . $newImageName);
				}
		
				// Combine file names into a comma-separated string
				$tourism_product_pix = implode(',', $filesArray);
				mysqli_query($conn,"INSERT INTO `tourism_products_pix_tab`
				(`page_id`, `tourism_product_pix`) VALUES 
				('$page_id', '$tourism_product_pix')");
			}

			$response['response']=212; 
			$response['success']=true;
			$response['filesArray']=$filesArray;
			$response['newImageName']=$newImageName;
			$response['message1']="UPDATE SUCCESS!"; 
			$response['message2']="Picture Upload Successfully!"; 
	}
break;



case 'fetch_event_other_pix_api':
	$page_id = $_POST['page_id'];

	$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
	$fetch = mysqli_fetch_array($get_pix_query);
	$tourism_product_pix = $fetch['tourism_product_pix'];

	if (empty($tourism_product_pix)) {
		mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
		$response['response']=212; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="No Picture Found.";
	} else {
		$getCount=mysqli_num_rows($get_pix_query);
		if ($getCount>0) {
		
			$response = array();
			$get_all_pix = explode(',', $fetch['tourism_product_pix']);
		
				$response['response']=212; 
				$response['success']=true;
				$response['get_all_pix'] = $get_all_pix;
		
		} else {
			$response['response']=212; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="No Picture Found."; 
		}
	}
break;





case 'delete_event_other_pix_api':
	$page_id = $_POST['page_id'];
	$delete_pix = $_POST['delete_pix'];

	// Fetch existing pictures from the database
	$get_pix_query = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($get_pix_query);

	if ($getCount>0) {
		$fetch = mysqli_fetch_assoc($get_pix_query);
		$existing_pictures = explode(',', $fetch['tourism_product_pix']);

		// Check if the picture to be deleted exists in the list
		$array_key = array_search($delete_pix, $existing_pictures);
		
		if ($array_key !== false) {
			// Remove the picture from the array
			unset($existing_pictures[$array_key]);

			// Update the database with the modified list
			$new_picture_list = implode(',', $existing_pictures);
			mysqli_query($conn, "UPDATE `tourism_products_pix_tab` SET `tourism_product_pix` = '$new_picture_list' WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));

			// Unlink (delete) the picture file from the folder
			$path_to_picture = '../uploaded_files/event_pix/other_pix/' . $delete_pix;
			if (file_exists($path_to_picture)) {
				unlink($path_to_picture);
			}else{
				$response['response'] = 212; 
				$response['success'] = true;
				$response['message1'] = "ERROR!";
				$response['message2'] = "No Picture Found!";
			}
			
			$response['response'] = 212; 
			$response['success'] = true;
			$response['message1'] = "SUCCESS";
			$response['message2'] = "Picture Deleted Successfully";
		} else {
			$response['response'] = 212; 
			$response['success'] = false;
			$response['message1'] = "ERROR!";
			$response['message2'] = "Picture Not Found.";
		}
	} else {
		$response['response'] = 212; 
		$response['success'] = false;
		$response['message1'] = "ERROR!";
		$response['message2'] = "No Pictures Found.";
	}

break;



/////////////////////// END EVENT API////////////////////////////////

















/////////////////////// START ENTERTAINMENT API//////////////////////////////////////



case 'add_or_update_entertainment_category_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$category_name=trim(strtoupper($_POST['category_name']));
	$status_id=trim($_POST['status_id']);

	if(($category_name=='') || ($status_id=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1

		if($cat_id==''){ ///start if 2
			$query=mysqli_query($conn,"SELECT category_name FROM entertainment_cat_tab WHERE category_name='$category_name'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3

				/////////////////geting sequence////////////////////
				$sequence=$callclass->_get_sequence_count($conn, 'ECAT');
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];
				
				/// generate page id //// 
				$cat_id='ECAT'.$no.date("Ymdhis");
			

				mysqli_query($conn,"INSERT INTO `entertainment_cat_tab`
				(`cat_id`, `category_name`, `status_id`, `created_time`, `updated_time`) VALUES 
				('$cat_id', '$category_name','$status_id',  NOW(), NOW())")or die (mysqli_error($conn));
			
				$response['response']=211; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Registered Successfully!"; 	 
			}// end if 3
	
		}else{ ///else if 2 
			$query=mysqli_query($conn,"SELECT category_name FROM entertainment_cat_tab WHERE category_name='$category_name' AND cat_id!='$cat_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3	
			
				mysqli_query($conn,"UPDATE entertainment_cat_tab SET category_name='$category_name', status_id='$status_id', updated_time=NOW() WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	
				$response['response']=212; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Updated Successfully!"; 
			///end if 2
			}		
		}
	}
break;




case 'fetch_entertainment_cat_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(
		a.category_name like '%$search_txt%')";

	$selectQuery="SELECT a.*, b.*,
	(SELECT COUNT(c.cat_id) FROM entertainment_tab c WHERE a.cat_id=c.cat_id AND a.status_id=b.status_id ) AS get_count
	 FROM entertainment_cat_tab a, setup_status_tab b WHERE a.status_id=b.status_id";
	/// write sql statement and function that will return all staff here
	if ($cat_id=='') {///start if 1
		
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1

		$query=mysqli_query($conn, "$selectQuery AND a.cat_id ='$cat_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;







case 'add_or_update_entertainment_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value
	$status_id=trim($_POST['status_id']);

	$query=mysqli_query($conn,"SELECT cat_id FROM entertainment_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($query);
	if($getCount==0){
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Category ID Not Found"; 
	}else{

		if(($page_title=='') || ($status_id=='')){ ///start if 1
			$response['response']=209; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="Fill all fields to continue!"; 
		}else{ ///else if 1

			if($page_id==''){ ///start if 2
				$query=mysqli_query($conn,"SELECT page_title FROM entertainment_tab WHERE page_title='$page_title'")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3

					/////////////////geting sequence////////////////////
					$sequence=$callclass->_get_sequence_count($conn, 'ENT');
					$array = json_decode($sequence, true);
					$no= $array[0]['no'];
					
					/// generate page id //// 
					$page_id='ENT'.$no.date("Ymdhis");
					////////////////////generate exam_pix/////////////////
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;

					if ($page_pix=='') {
						$page_photo= '';
					}

					mysqli_query($conn,"INSERT INTO `entertainment_tab`
					(`cat_id`,`page_id`, `page_title`, `status_id`, `page_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
					('$cat_id','$page_id', '$page_title','$status_id', '$page_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
				
					$response['response']=211; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Registered Successfully!"; 	 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;  	
				}// end if 3
		
			}else{ ///else if 2 
				$query=mysqli_query($conn,"SELECT page_title FROM entertainment_tab WHERE page_title='$page_title' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3	
				
					mysqli_query($conn,"UPDATE entertainment_tab SET page_title='$page_title', status_id='$status_id', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
		
					if ($page_pix!=''){
						$query=mysqli_query($conn,"SELECT page_pix FROM entertainment_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
						$fetch_query=mysqli_fetch_array($query);
						$old_page_pix=$fetch_query['page_pix'];
						$response['old_page_pix']=$old_page_pix; 
				
						$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
						$page_photo = $page_id.'_'.uniqid().'.'.$extension;
						mysqli_query($conn,"UPDATE entertainment_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
						$response['page_photo']=$page_photo; 
					}
					
					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Updated Successfully!"; 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;
					$response['old_page_pix']=$old_page_pix;
				///end if 2
				}		
			}
		}
	}
break;










case 'fetch_entertainment_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(
	a.page_title like '%$search_txt%' OR 
	a.page_url like '%$search_txt%')";

	$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0002'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$tourism_products_name=$fetch_query['tourism_products_name'];
	$response['tourism_products_name']=$tourism_products_name;
	
	$query=mysqli_query($conn, "SELECT category_name FROM entertainment_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$category_name=$fetch_query['category_name'];
	$response['category_name']=$category_name;

	$selectQuery="SELECT a.*, b.* FROM entertainment_tab a, setup_status_tab b WHERE a.status_id=b.status_id";

	if ($page_id=='') {///start if 1
	
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like AND a.cat_id='$cat_id' ORDER BY a.created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1
		

		$query=mysqli_query($conn, "$selectQuery AND a.page_id ='$page_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;





case 'update_entertainment_page_details_api':
	$page_id = $_POST['page_id'];
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_url = str_replace("'", "\\'", strtolower(trim($_POST['page_url'])));
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$page_summary = str_replace("'", "\'", $_POST['page_summary']);
	$page_detail = str_replace("'", "\'", $_POST['page_detail']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value


	if(($page_title=='')||($page_url=='')||($seo_keywords=='')||($page_summary=='')||($page_detail=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1
		if($page_id==''){ ///start if 2
				/// do nothing			
		}else{ ///else if 3
			$urlcheck=mysqli_query($conn,"SELECT page_url FROM entertainment_tab WHERE page_url='$page_url' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
			$check=mysqli_num_rows($urlcheck);
			if ($check>0){ ///start if 3
				$response['response']=210; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Page URL Already Exist!"; 						
			}else{ ///else if 3
	
				$urlcheck=mysqli_query($conn,"SELECT page_url FROM entertainment_tab WHERE page_id='$page_id'") or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($urlcheck);
				$db_page_url=$fetch_query['page_url']; 

				mysqli_query($conn,"UPDATE entertainment_tab SET page_title='$page_title', page_url='$page_url', seo_keywords='$seo_keywords', page_summary='$page_summary', page_detail='$page_detail', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));

				if ($page_pix!=''){
					$query=mysqli_query($conn,"SELECT page_pix FROM entertainment_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_page_pix=$fetch_query['page_pix'];
					$response['old_page_pix']=$old_page_pix; 
			
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;
					mysqli_query($conn,"UPDATE entertainment_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$response['page_photo']=$page_photo; 
				}

					$query=mysqli_query($conn,"SELECT page_pix FROM entertainment_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_seo_page_pix=$fetch_query['page_pix'];
					$response['old_seo_page_pix']=$old_seo_page_pix;

					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Page Updated Successfully!"; 
					
					$response['page_id']=$page_id;
					$response['page_title'] = $page_title;
					$response['page_url'] = $page_url;
					$response['seo_keywords'] = $seo_keywords;
					$response['page_summary'] = $page_summary;
					$response['page_detail'] = $page_detail;
					
					$response['db_page_url']=$db_page_url;
			}
		} ///end if 2		
	}//end if 1
break;



case 'entertainment_other_pix_api':
	$page_id = $_POST['page_id'];
	if (isset($_FILES["more_page_pix"]["name"])) {

		$totalFiles = count($_FILES["more_page_pix"]["name"]);
		$filesArray = array();

			$query=mysqli_query($conn, "SELECT page_id FROM tourism_products_pix_tab WHERE page_id='$page_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0) {
				
				$get_pix = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
				$row = mysqli_fetch_assoc($get_pix);
				$db_tourism_product_pix = $row['tourism_product_pix'];

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid('', true);
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/entertainment_pix/other_pix/' . $newImageName);
				}
				$all_pix = $db_tourism_product_pix . ',' . implode(',', $filesArray);
				mysqli_query($conn,"UPDATE tourism_products_pix_tab SET tourism_product_pix='$all_pix' WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
			}else{

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid();
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/entertainment_pix/other_pix/' . $newImageName);
				}
		
				// Combine file names into a comma-separated string
				$tourism_product_pix = implode(',', $filesArray);
				mysqli_query($conn,"INSERT INTO `tourism_products_pix_tab`
				(`page_id`, `tourism_product_pix`) VALUES 
				('$page_id', '$tourism_product_pix')");
			}

			$response['response']=212; 
			$response['success']=true;
			$response['filesArray']=$filesArray;
			$response['newImageName']=$newImageName;
			$response['message1']="UPDATE SUCCESS!"; 
			$response['message2']="Picture Upload Successfully!"; 
	}
break;



case 'fetch_entertainment_other_pix_api':
	$page_id = $_POST['page_id'];

	$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
	$fetch = mysqli_fetch_array($get_pix_query);
	$tourism_product_pix = $fetch['tourism_product_pix'];

	if (empty($tourism_product_pix)) {
		mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
		$response['response']=212; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="No Picture Found.";
	} else {
		$getCount=mysqli_num_rows($get_pix_query);
		if ($getCount>0) {
		
			$response = array();
			$get_all_pix = explode(',', $fetch['tourism_product_pix']);
		
				$response['response']=212; 
				$response['success']=true;
				$response['get_all_pix'] = $get_all_pix;
		
		} else {
			$response['response']=212; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="No Picture Found."; 
		}
	}
break;





case 'delete_entertainment_other_pix_api':
	$page_id = $_POST['page_id'];
	$delete_pix = $_POST['delete_pix'];

	// Fetch existing pictures from the database
	$get_pix_query = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($get_pix_query);

	if ($getCount>0) {
		$fetch = mysqli_fetch_assoc($get_pix_query);
		$existing_pictures = explode(',', $fetch['tourism_product_pix']);

		// Check if the picture to be deleted exists in the list
		$array_key = array_search($delete_pix, $existing_pictures);
		
		if ($array_key !== false) {
			// Remove the picture from the array
			unset($existing_pictures[$array_key]);

			// Update the database with the modified list
			$new_picture_list = implode(',', $existing_pictures);
			mysqli_query($conn, "UPDATE `tourism_products_pix_tab` SET `tourism_product_pix` = '$new_picture_list' WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));

			// Unlink (delete) the picture file from the folder
			$path_to_picture = '../uploaded_files/entertainment_pix/other_pix/' . $delete_pix;
			if (file_exists($path_to_picture)) {
				unlink($path_to_picture);
			}else{
				$response['response'] = 212; 
				$response['success'] = true;
				$response['message1'] = "ERROR!";
				$response['message2'] = "No Picture Found!";
			}
			
			$response['response'] = 212; 
			$response['success'] = true;
			$response['message1'] = "SUCCESS";
			$response['message2'] = "Picture Deleted Successfully";
		} else {
			$response['response'] = 212; 
			$response['success'] = false;
			$response['message1'] = "ERROR!";
			$response['message2'] = "Picture Not Found.";
		}
	} else {
		$response['response'] = 212; 
		$response['success'] = false;
		$response['message1'] = "ERROR!";
		$response['message2'] = "No Pictures Found.";
	}

break;



/////////////////////// END ENTERTAINMENT API////////////////////////////////

















/////////////////////// START SPORT API//////////////////////////////////////



case 'add_or_update_sport_category_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$category_name=trim(strtoupper($_POST['category_name']));
	$status_id=trim($_POST['status_id']);

	if(($category_name=='') || ($status_id=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1

		if($cat_id==''){ ///start if 2
			$query=mysqli_query($conn,"SELECT category_name FROM sport_cat_tab WHERE category_name='$category_name'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3

				/////////////////geting sequence////////////////////
				$sequence=$callclass->_get_sequence_count($conn, 'SPCAT');
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];
				
				/// generate page id //// 
				$cat_id='SPCAT'.$no.date("Ymdhis");
			

				mysqli_query($conn,"INSERT INTO `sport_cat_tab`
				(`cat_id`, `category_name`, `status_id`, `created_time`, `updated_time`) VALUES 
				('$cat_id', '$category_name','$status_id',  NOW(), NOW())")or die (mysqli_error($conn));
			
				$response['response']=211; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Registered Successfully!"; 	 
			}// end if 3
	
		}else{ ///else if 2 
			$query=mysqli_query($conn,"SELECT category_name FROM sport_cat_tab WHERE category_name='$category_name' AND cat_id!='$cat_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3	
			
				mysqli_query($conn,"UPDATE sport_cat_tab SET category_name='$category_name', status_id='$status_id', updated_time=NOW() WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	
				$response['response']=212; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Updated Successfully!"; 
			///end if 2
			}		
		}
	}
break;




case 'fetch_sport_cat_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(a.category_name like '%$search_txt%')";

	$selectQuery="SELECT a.*, b.*,
	(SELECT COUNT(c.cat_id) FROM sport_tab c WHERE a.cat_id=c.cat_id AND a.status_id=b.status_id ) AS get_count
	 FROM sport_cat_tab a, setup_status_tab b WHERE a.status_id=b.status_id";
	/// write sql statement and function that will return all staff here
	if ($cat_id=='') {///start if 1
		
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1

		$query=mysqli_query($conn, "$selectQuery AND a.cat_id ='$cat_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;







case 'add_or_update_sport_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value
	$status_id=trim($_POST['status_id']);

	$query=mysqli_query($conn,"SELECT cat_id FROM sport_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($query);
	if($getCount==0){
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Category ID Not Found"; 
	}else{

		if(($page_title=='') || ($status_id=='')){ ///start if 1
			$response['response']=209; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="Fill all fields to continue!"; 
		}else{ ///else if 1

			if($page_id==''){ ///start if 2
				$query=mysqli_query($conn,"SELECT page_title FROM sport_tab WHERE page_title='$page_title'")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3

					/////////////////geting sequence////////////////////
					$sequence=$callclass->_get_sequence_count($conn, 'SPT');
					$array = json_decode($sequence, true);
					$no= $array[0]['no'];
					
					/// generate page id //// 
					$page_id='SPT'.$no.date("Ymdhis");
					////////////////////generate exam_pix/////////////////
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;

					if ($page_pix=='') {
						$page_photo= '';
					}

					mysqli_query($conn,"INSERT INTO `sport_tab`
					(`cat_id`,`page_id`, `page_title`, `status_id`, `page_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
					('$cat_id','$page_id', '$page_title','$status_id', '$page_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
				
					$response['response']=211; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Registered Successfully!"; 	 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;  	
				}// end if 3
		
			}else{ ///else if 2 
				$query=mysqli_query($conn,"SELECT page_title FROM sport_tab WHERE page_title='$page_title' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3	
				
					mysqli_query($conn,"UPDATE sport_tab SET page_title='$page_title', status_id='$status_id', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
		
					if ($page_pix!=''){
						$query=mysqli_query($conn,"SELECT page_pix FROM sport_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
						$fetch_query=mysqli_fetch_array($query);
						$old_page_pix=$fetch_query['page_pix'];
						$response['old_page_pix']=$old_page_pix; 
				
						$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
						$page_photo = $page_id.'_'.uniqid().'.'.$extension;
						mysqli_query($conn,"UPDATE sport_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
						$response['page_photo']=$page_photo; 
					}
					
					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Updated Successfully!"; 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;
					$response['old_page_pix']=$old_page_pix;
				///end if 2
				}		
			}
		}
	}
break;










case 'fetch_sport_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(
	a.page_title like '%$search_txt%' OR 
	a.page_url like '%$search_txt%')";

	$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0003'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$tourism_products_name=$fetch_query['tourism_products_name'];
	$response['tourism_products_name']=$tourism_products_name;
	
	$query=mysqli_query($conn, "SELECT category_name FROM sport_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$category_name=$fetch_query['category_name'];
	$response['category_name']=$category_name;

	$selectQuery="SELECT a.*, b.* FROM sport_tab a, setup_status_tab b WHERE a.status_id=b.status_id";

	if ($page_id=='') {///start if 1
	
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like AND a.cat_id='$cat_id' ORDER BY a.created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1
		

		$query=mysqli_query($conn, "$selectQuery AND a.page_id ='$page_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;





case 'update_sport_page_details_api':
	$page_id = $_POST['page_id'];
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_url = str_replace("'", "\\'", strtolower(trim($_POST['page_url'])));
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$page_summary = str_replace("'", "\'", $_POST['page_summary']);
	$page_detail = str_replace("'", "\'", $_POST['page_detail']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value


	if(($page_title=='')||($page_url=='')||($seo_keywords=='')||($page_summary=='')||($page_detail=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1
		if($page_id==''){ ///start if 2
				/// do nothing			
		}else{ ///else if 3

			$urlcheck=mysqli_query($conn,"SELECT page_url FROM sport_tab WHERE page_url='$page_url' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
			$check=mysqli_num_rows($urlcheck);
			if ($check>0){ ///start if 3
				$response['response']=210; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Page URL Already Exist!"; 						
			}else{ ///else if 3
				$urlcheck=mysqli_query($conn,"SELECT page_url FROM sport_tab WHERE page_id='$page_id'") or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($urlcheck);
				$db_page_url=$fetch_query['page_url']; 

				mysqli_query($conn,"UPDATE sport_tab SET page_title='$page_title', page_url='$page_url', seo_keywords='$seo_keywords', page_summary='$page_summary', page_detail='$page_detail', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));

				if ($page_pix!=''){
					$query=mysqli_query($conn,"SELECT page_pix FROM sport_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_page_pix=$fetch_query['page_pix'];
					$response['old_page_pix']=$old_page_pix; 
			
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;
					mysqli_query($conn,"UPDATE sport_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$response['page_photo']=$page_photo; 
				}

					$query=mysqli_query($conn,"SELECT page_pix FROM sport_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_seo_page_pix=$fetch_query['page_pix'];
					$response['old_seo_page_pix']=$old_seo_page_pix;

					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Page Updated Successfully!"; 
					
					$response['page_id']=$page_id;
					$response['page_title'] = $page_title;
					$response['page_url'] = $page_url;
					$response['seo_keywords'] = $seo_keywords;
					$response['page_summary'] = $page_summary;
					$response['page_detail'] = $page_detail;
					
					$response['db_page_url']=$db_page_url;
			}
		} ///end if 2		
	}//end if 1
break;



case 'sport_other_pix_api':
	$page_id = $_POST['page_id'];
	if (isset($_FILES["more_page_pix"]["name"])) {

		$totalFiles = count($_FILES["more_page_pix"]["name"]);
		$filesArray = array();

			$query=mysqli_query($conn, "SELECT page_id FROM tourism_products_pix_tab WHERE page_id='$page_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0) {
				
				$get_pix = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
				$row = mysqli_fetch_assoc($get_pix);
				$db_tourism_product_pix = $row['tourism_product_pix'];

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid('', true);
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/sport_pix/other_pix/' . $newImageName);
				}
				$all_pix = $db_tourism_product_pix . ',' . implode(',', $filesArray);
				mysqli_query($conn,"UPDATE tourism_products_pix_tab SET tourism_product_pix='$all_pix' WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
			}else{

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid();
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/sport_pix/other_pix/' . $newImageName);
				}
		
				// Combine file names into a comma-separated string
				$tourism_product_pix = implode(',', $filesArray);
				mysqli_query($conn,"INSERT INTO `tourism_products_pix_tab`
				(`page_id`, `tourism_product_pix`) VALUES 
				('$page_id', '$tourism_product_pix')");
			}

			$response['response']=212; 
			$response['success']=true;
			$response['filesArray']=$filesArray;
			$response['newImageName']=$newImageName;
			$response['message1']="UPDATE SUCCESS!"; 
			$response['message2']="Picture Upload Successfully!"; 
	}
break;



case 'fetch_sport_other_pix_api':
	$page_id = $_POST['page_id'];

	$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
	$fetch = mysqli_fetch_array($get_pix_query);
	$tourism_product_pix = $fetch['tourism_product_pix'];

	if (empty($tourism_product_pix)) {
		mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
		$response['response']=212; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="No Picture Found.";
	} else {
		$getCount=mysqli_num_rows($get_pix_query);
		if ($getCount>0) {
		
			$response = array();
			$get_all_pix = explode(',', $fetch['tourism_product_pix']);
		
				$response['response']=212; 
				$response['success']=true;
				$response['get_all_pix'] = $get_all_pix;
		
		} else {
			$response['response']=212; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="No Picture Found."; 
		}
	}
break;





case 'delete_sport_other_pix_api':
	$page_id = $_POST['page_id'];
	$delete_pix = $_POST['delete_pix'];

	// Fetch existing pictures from the database
	$get_pix_query = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($get_pix_query);

	if ($getCount>0) {
		$fetch = mysqli_fetch_assoc($get_pix_query);
		$existing_pictures = explode(',', $fetch['tourism_product_pix']);

		// Check if the picture to be deleted exists in the list
		$array_key = array_search($delete_pix, $existing_pictures);
		
		if ($array_key !== false) {
			// Remove the picture from the array
			unset($existing_pictures[$array_key]);

			// Update the database with the modified list
			$new_picture_list = implode(',', $existing_pictures);
			mysqli_query($conn, "UPDATE `tourism_products_pix_tab` SET `tourism_product_pix` = '$new_picture_list' WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));

			// Unlink (delete) the picture file from the folder
			$path_to_picture = '../uploaded_files/sport_pix/other_pix/' . $delete_pix;
			if (file_exists($path_to_picture)) {
				unlink($path_to_picture);
			}else{
				$response['response'] = 212; 
				$response['success'] = true;
				$response['message1'] = "ERROR!";
				$response['message2'] = "No Picture Found!";
			}
			
			$response['response'] = 212; 
			$response['success'] = true;
			$response['message1'] = "SUCCESS";
			$response['message2'] = "Picture Deleted Successfully";
		} else {
			$response['response'] = 212; 
			$response['success'] = false;
			$response['message1'] = "ERROR!";
			$response['message2'] = "Picture Not Found.";
		}
	} else {
		$response['response'] = 212; 
		$response['success'] = false;
		$response['message1'] = "ERROR!";
		$response['message2'] = "No Pictures Found.";
	}

break;



/////////////////////// END SPORT API////////////////////////////////




























/////////////////////// START CULTURE API//////////////////////////////////////



case 'add_or_update_culture_category_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$category_name=trim(strtoupper($_POST['category_name']));
	$status_id=trim($_POST['status_id']);

	if (($category_name=='') || ($status_id=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	} else { ///else if 1

		if($cat_id==''){ ///start if 2
			$query=mysqli_query($conn,"SELECT category_name FROM culture_cat_tab WHERE category_name='$category_name'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3

				/////////////////geting sequence////////////////////
				$sequence=$callclass->_get_sequence_count($conn, 'CULCAT');
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];
				
				/// generate page id //// 
				$cat_id='CULCAT'.$no.date("Ymdhis");
			

				mysqli_query($conn,"INSERT INTO `culture_cat_tab`
				(`cat_id`, `category_name`, `status_id`, `created_time`, `updated_time`) VALUES 
				('$cat_id', '$category_name','$status_id',  NOW(), NOW())")or die (mysqli_error($conn));
			
				$response['response']=211; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Registered Successfully!"; 	 
			}// end if 3
	
		}else{ ///else if 2 
			$query=mysqli_query($conn,"SELECT category_name FROM culture_cat_tab WHERE category_name='$category_name' AND cat_id!='$cat_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3	
			
				mysqli_query($conn,"UPDATE culture_cat_tab SET category_name='$category_name', status_id='$status_id', updated_time=NOW() WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	
				$response['response']=212; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Updated Successfully!"; 
			///end if 2
			}		
		}
	}
break;




case 'fetch_culture_cat_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(a.category_name like '%$search_txt%')";

	$selectQuery="SELECT a.*, b.*,
	(SELECT COUNT(c.cat_id) FROM culture_tab c WHERE a.cat_id=c.cat_id AND a.status_id=b.status_id ) AS get_count
	 FROM culture_cat_tab a, setup_status_tab b WHERE a.status_id=b.status_id";
	/// write sql statement and function that will return all staff here
	if ($cat_id=='') {///start if 1
		
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1

		$query=mysqli_query($conn, "$selectQuery AND a.cat_id ='$cat_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;







case 'add_or_update_culture_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value
	$status_id=trim($_POST['status_id']);

	$query=mysqli_query($conn,"SELECT cat_id FROM culture_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($query);
	if($getCount==0){
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Category ID Not Found"; 
	}else{

		if(($page_title=='') || ($status_id=='')){ ///start if 1
			$response['response']=209; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="Fill all fields to continue!"; 
		}else{ ///else if 1

			if($page_id==''){ ///start if 2
				$query=mysqli_query($conn,"SELECT page_title FROM culture_tab WHERE page_title='$page_title'")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3

					/////////////////geting sequence////////////////////
					$sequence=$callclass->_get_sequence_count($conn, 'CULT');
					$array = json_decode($sequence, true);
					$no= $array[0]['no'];
					
					/// generate page id //// 
					$page_id='CULT'.$no.date("Ymdhis");
					////////////////////generate exam_pix/////////////////
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;

					if ($page_pix=='') {
						$page_photo= '';
					}

					mysqli_query($conn,"INSERT INTO `culture_tab`
					(`cat_id`,`page_id`, `page_title`, `status_id`, `page_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
					('$cat_id','$page_id', '$page_title','$status_id', '$page_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
				
					$response['response']=211; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Registered Successfully!"; 	 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;  	
				}// end if 3
		
			}else{ ///else if 2 
				$query=mysqli_query($conn,"SELECT page_title FROM culture_tab WHERE page_title='$page_title' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3	
				
					mysqli_query($conn,"UPDATE culture_tab SET page_title='$page_title', status_id='$status_id', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
		
					if ($page_pix!=''){
						$query=mysqli_query($conn,"SELECT page_pix FROM culture_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
						$fetch_query=mysqli_fetch_array($query);
						$old_page_pix=$fetch_query['page_pix'];
						$response['old_page_pix']=$old_page_pix; 
				
						$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
						$page_photo = $page_id.'_'.uniqid().'.'.$extension;
						mysqli_query($conn,"UPDATE culture_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
						$response['page_photo']=$page_photo; 
					}
					
					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Updated Successfully!"; 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;
					$response['old_page_pix']=$old_page_pix;
				///end if 2
				}		
			}
		}
	}
break;










case 'fetch_culture_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(
	a.page_title like '%$search_txt%' OR 
	a.page_url like '%$search_txt%')";

	$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0004'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$tourism_products_name=$fetch_query['tourism_products_name'];
	$response['tourism_products_name']=$tourism_products_name;
	
	$query=mysqli_query($conn, "SELECT category_name FROM culture_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$category_name=$fetch_query['category_name'];
	$response['category_name']=$category_name;

	$selectQuery="SELECT a.*, b.* FROM culture_tab a, setup_status_tab b WHERE a.status_id=b.status_id";

	if ($page_id=='') {///start if 1
	
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like AND a.cat_id='$cat_id' ORDER BY a.created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1
		

		$query=mysqli_query($conn, "$selectQuery AND a.page_id ='$page_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;





case 'update_culture_page_details_api':
	$page_id = $_POST['page_id'];
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_url = str_replace("'", "\\'", strtolower(trim($_POST['page_url'])));
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$page_summary = str_replace("'", "\'", $_POST['page_summary']);
	$page_detail = str_replace("'", "\'", $_POST['page_detail']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value


	if(($page_title=='')||($page_url=='')||($seo_keywords=='')||($page_summary=='')||($page_detail=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1
		if($page_id==''){ ///start if 2
				/// do nothing			
		}else{ ///else if 3

			$urlcheck=mysqli_query($conn,"SELECT page_url FROM culture_tab WHERE page_url='$page_url' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
			$check=mysqli_num_rows($urlcheck);
			if ($check>0){ ///start if 3
				$response['response']=210; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Page URL Already Exist!"; 						
			}else{ ///else if 3
				$urlcheck=mysqli_query($conn,"SELECT page_url FROM culture_tab WHERE page_id='$page_id'") or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($urlcheck);
				$db_page_url=$fetch_query['page_url']; 

				mysqli_query($conn,"UPDATE culture_tab SET page_title='$page_title', page_url='$page_url', seo_keywords='$seo_keywords', page_summary='$page_summary', page_detail='$page_detail', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));

				if ($page_pix!=''){
					$query=mysqli_query($conn,"SELECT page_pix FROM culture_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_page_pix=$fetch_query['page_pix'];
					$response['old_page_pix']=$old_page_pix; 
			
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;
					mysqli_query($conn,"UPDATE culture_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$response['page_photo']=$page_photo; 
				}

					$query=mysqli_query($conn,"SELECT page_pix FROM culture_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_seo_page_pix=$fetch_query['page_pix'];
					$response['old_seo_page_pix']=$old_seo_page_pix;

					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Page Updated Successfully!"; 
					
					$response['page_id']=$page_id;
					$response['page_title'] = $page_title;
					$response['page_url'] = $page_url;
					$response['seo_keywords'] = $seo_keywords;
					$response['page_summary'] = $page_summary;
					$response['page_detail'] = $page_detail;
					
					$response['db_page_url']=$db_page_url;
			}
		} ///end if 2		
	}//end if 1
break;



case 'culture_other_pix_api':
	$page_id = $_POST['page_id'];
	if (isset($_FILES["more_page_pix"]["name"])) {

		$totalFiles = count($_FILES["more_page_pix"]["name"]);
		$filesArray = array();

			$query=mysqli_query($conn, "SELECT page_id FROM tourism_products_pix_tab WHERE page_id='$page_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0) {
				
				$get_pix = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
				$row = mysqli_fetch_assoc($get_pix);
				$db_tourism_product_pix = $row['tourism_product_pix'];

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid('', true);
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/culture_pix/other_pix/' . $newImageName);
				}
				$all_pix = $db_tourism_product_pix . ',' . implode(',', $filesArray);
				mysqli_query($conn,"UPDATE tourism_products_pix_tab SET tourism_product_pix='$all_pix' WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
			}else{

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid();
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/culture_pix/other_pix/' . $newImageName);
				}
		
				// Combine file names into a comma-separated string
				$tourism_product_pix = implode(',', $filesArray);
				mysqli_query($conn,"INSERT INTO `tourism_products_pix_tab`
				(`page_id`, `tourism_product_pix`) VALUES 
				('$page_id', '$tourism_product_pix')");
			}

			$response['response']=212; 
			$response['success']=true;
			$response['filesArray']=$filesArray;
			$response['newImageName']=$newImageName;
			$response['message1']="UPDATE SUCCESS!"; 
			$response['message2']="Picture Upload Successfully!"; 
	}
break;



case 'fetch_culture_other_pix_api':
	$page_id = $_POST['page_id'];

	$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
	$fetch = mysqli_fetch_array($get_pix_query);
	$tourism_product_pix = $fetch['tourism_product_pix'];

	if (empty($tourism_product_pix)) {
		mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
		$response['response']=212; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="No Picture Found.";
	} else {
		$getCount=mysqli_num_rows($get_pix_query);
		if ($getCount>0) {
		
			$response = array();
			$get_all_pix = explode(',', $fetch['tourism_product_pix']);
		
				$response['response']=212; 
				$response['success']=true;
				$response['get_all_pix'] = $get_all_pix;
		
		} else {
			$response['response']=212; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="No Picture Found."; 
		}
	}
break;





case 'delete_culture_other_pix_api':
	$page_id = $_POST['page_id'];
	$delete_pix = $_POST['delete_pix'];

	// Fetch existing pictures from the database
	$get_pix_query = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($get_pix_query);

	if ($getCount>0) {
		$fetch = mysqli_fetch_assoc($get_pix_query);
		$existing_pictures = explode(',', $fetch['tourism_product_pix']);

		// Check if the picture to be deleted exists in the list
		$array_key = array_search($delete_pix, $existing_pictures);
		
		if ($array_key !== false) {
			// Remove the picture from the array
			unset($existing_pictures[$array_key]);

			// Update the database with the modified list
			$new_picture_list = implode(',', $existing_pictures);
			mysqli_query($conn, "UPDATE `tourism_products_pix_tab` SET `tourism_product_pix` = '$new_picture_list' WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));

			// Unlink (delete) the picture file from the folder
			$path_to_picture = '../uploaded_files/culture_pix/other_pix/' . $delete_pix;
			if (file_exists($path_to_picture)) {
				unlink($path_to_picture);
			}else{
				$response['response'] = 212; 
				$response['success'] = true;
				$response['message1'] = "ERROR!";
				$response['message2'] = "No Picture Found!";
			}
			
			$response['response'] = 212; 
			$response['success'] = true;
			$response['message1'] = "SUCCESS";
			$response['message2'] = "Picture Deleted Successfully";
		} else {
			$response['response'] = 212; 
			$response['success'] = false;
			$response['message1'] = "ERROR!";
			$response['message2'] = "Picture Not Found.";
		}
	} else {
		$response['response'] = 212; 
		$response['success'] = false;
		$response['message1'] = "ERROR!";
		$response['message2'] = "No Pictures Found.";
	}

break;



/////////////////////// END CULTURE API////////////////////////////////











/////////////////////// START TRADITION API//////////////////////////////////////



case 'add_or_update_tradition_category_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$category_name=trim(strtoupper($_POST['category_name']));
	$status_id=trim($_POST['status_id']);

	if (($category_name=='') || ($status_id=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	} else { ///else if 1

		if($cat_id==''){ ///start if 2
			$query=mysqli_query($conn,"SELECT category_name FROM tradition_cat_tab WHERE category_name='$category_name'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3

				/////////////////geting sequence////////////////////
				$sequence=$callclass->_get_sequence_count($conn, 'TRACAT');
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];
				
				/// generate page id //// 
				$cat_id='TRACAT'.$no.date("Ymdhis");
			

				mysqli_query($conn,"INSERT INTO `tradition_cat_tab`
				(`cat_id`, `category_name`, `status_id`, `created_time`, `updated_time`) VALUES 
				('$cat_id', '$category_name','$status_id',  NOW(), NOW())")or die (mysqli_error($conn));
			
				$response['response']=211; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Registered Successfully!"; 	 
			}// end if 3
	
		}else{ ///else if 2 
			$query=mysqli_query($conn,"SELECT category_name FROM tradition_cat_tab WHERE category_name='$category_name' AND cat_id!='$cat_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3	
			
				mysqli_query($conn,"UPDATE tradition_cat_tab SET category_name='$category_name', status_id='$status_id', updated_time=NOW() WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	
				$response['response']=212; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Updated Successfully!"; 
			///end if 2
			}		
		}
	}
break;




case 'fetch_tradition_cat_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(a.category_name like '%$search_txt%')";

	$selectQuery="SELECT a.*, b.*,
	(SELECT COUNT(c.cat_id) FROM tradition_tab c WHERE a.cat_id=c.cat_id AND a.status_id=b.status_id ) AS get_count
	 FROM tradition_cat_tab a, setup_status_tab b WHERE a.status_id=b.status_id";
	/// write sql statement and function that will return all staff here
	if ($cat_id=='') {///start if 1
		
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1

		$query=mysqli_query($conn, "$selectQuery AND a.cat_id ='$cat_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;







case 'add_or_update_tradition_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value
	$status_id=trim($_POST['status_id']);

	$query=mysqli_query($conn,"SELECT cat_id FROM tradition_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($query);
	if($getCount==0){
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Category ID Not Found"; 
	}else{

		if(($page_title=='') || ($status_id=='')){ ///start if 1
			$response['response']=209; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="Fill all fields to continue!"; 
		}else{ ///else if 1

			if($page_id==''){ ///start if 2
				$query=mysqli_query($conn,"SELECT page_title FROM tradition_tab WHERE page_title='$page_title'")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3

					/////////////////geting sequence////////////////////
					$sequence=$callclass->_get_sequence_count($conn, 'TRA');
					$array = json_decode($sequence, true);
					$no= $array[0]['no'];
					
					/// generate page id //// 
					$page_id='TRA'.$no.date("Ymdhis");
					////////////////////generate exam_pix/////////////////
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;

					if ($page_pix=='') {
						$page_photo= '';
					}

					mysqli_query($conn,"INSERT INTO `tradition_tab`
					(`cat_id`,`page_id`, `page_title`, `status_id`, `page_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
					('$cat_id','$page_id', '$page_title','$status_id', '$page_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
				
					$response['response']=211; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Registered Successfully!"; 	 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;  	
				}// end if 3
		
			}else{ ///else if 2 
				$query=mysqli_query($conn,"SELECT page_title FROM tradition_tab WHERE page_title='$page_title' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3	
				
					mysqli_query($conn,"UPDATE tradition_tab SET page_title='$page_title', status_id='$status_id', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
		
					if ($page_pix!=''){
						$query=mysqli_query($conn,"SELECT page_pix FROM tradition_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
						$fetch_query=mysqli_fetch_array($query);
						$old_page_pix=$fetch_query['page_pix'];
						$response['old_page_pix']=$old_page_pix; 
				
						$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
						$page_photo = $page_id.'_'.uniqid().'.'.$extension;
						mysqli_query($conn,"UPDATE tradition_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
						$response['page_photo']=$page_photo; 
					}
					
					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Updated Successfully!"; 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;
					$response['old_page_pix']=$old_page_pix;
				///end if 2
				}		
			}
		}
	}
break;










case 'fetch_tradition_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(
	a.page_title like '%$search_txt%' OR 
	a.page_url like '%$search_txt%')";

	$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0004'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$tourism_products_name=$fetch_query['tourism_products_name'];
	$response['tourism_products_name']=$tourism_products_name;
	
	$query=mysqli_query($conn, "SELECT category_name FROM tradition_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$category_name=$fetch_query['category_name'];
	$response['category_name']=$category_name;

	$selectQuery="SELECT a.*, b.* FROM tradition_tab a, setup_status_tab b WHERE a.status_id=b.status_id";

	if ($page_id=='') {///start if 1
	
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like AND a.cat_id='$cat_id' ORDER BY a.created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1
		

		$query=mysqli_query($conn, "$selectQuery AND a.page_id ='$page_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;





case 'update_tradition_page_details_api':
	$page_id = $_POST['page_id'];
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_url = str_replace("'", "\\'", strtolower(trim($_POST['page_url'])));
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$page_summary = str_replace("'", "\'", $_POST['page_summary']);
	$page_detail = str_replace("'", "\'", $_POST['page_detail']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value


	if(($page_title=='')||($page_url=='')||($seo_keywords=='')||($page_summary=='')||($page_detail=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1
		if($page_id==''){ ///start if 2
				/// do nothing			
		}else{ ///else if 3
			$urlcheck=mysqli_query($conn,"SELECT page_url FROM tradition_tab WHERE page_url='$page_url' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
			$check=mysqli_num_rows($urlcheck);
			if ($check>0){ ///start if 3
				$response['response']=210; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Page URL Already Exist!"; 						
			}else{ ///else if 3
		
				$urlcheck=mysqli_query($conn,"SELECT page_url FROM tradition_tab WHERE page_id='$page_id'") or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($urlcheck);
				$db_page_url=$fetch_query['page_url']; 

				mysqli_query($conn,"UPDATE tradition_tab SET page_title='$page_title', page_url='$page_url', seo_keywords='$seo_keywords', page_summary='$page_summary', page_detail='$page_detail', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));

				if ($page_pix!=''){
					$query=mysqli_query($conn,"SELECT page_pix FROM tradition_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_page_pix=$fetch_query['page_pix'];
					$response['old_page_pix']=$old_page_pix; 
			
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;
					mysqli_query($conn,"UPDATE tradition_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$response['page_photo']=$page_photo; 
				}

					$query=mysqli_query($conn,"SELECT page_pix FROM tradition_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_seo_page_pix=$fetch_query['page_pix'];
					$response['old_seo_page_pix']=$old_seo_page_pix;

					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Page Updated Successfully!"; 
					
					$response['page_id']=$page_id;
					$response['page_title'] = $page_title;
					$response['page_url'] = $page_url;
					$response['seo_keywords'] = $seo_keywords;
					$response['page_summary'] = $page_summary;
					$response['page_detail'] = $page_detail;
					
					$response['db_page_url']=$db_page_url;
			}
		} ///end if 2		
	}//end if 1
break;



case 'tradition_other_pix_api':
	$page_id = $_POST['page_id'];
	if (isset($_FILES["more_page_pix"]["name"])) {

		$totalFiles = count($_FILES["more_page_pix"]["name"]);
		$filesArray = array();

			$query=mysqli_query($conn, "SELECT page_id FROM tourism_products_pix_tab WHERE page_id='$page_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0) {
				
				$get_pix = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
				$row = mysqli_fetch_assoc($get_pix);
				$db_tourism_product_pix = $row['tourism_product_pix'];

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid('', true);
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/tradition_pix/other_pix/' . $newImageName);
				}
				$all_pix = $db_tourism_product_pix . ',' . implode(',', $filesArray);
				mysqli_query($conn,"UPDATE tourism_products_pix_tab SET tourism_product_pix='$all_pix' WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
			}else{

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid();
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/tradition_pix/other_pix/' . $newImageName);
				}
		
				// Combine file names into a comma-separated string
				$tourism_product_pix = implode(',', $filesArray);
				mysqli_query($conn,"INSERT INTO `tourism_products_pix_tab`
				(`page_id`, `tourism_product_pix`) VALUES 
				('$page_id', '$tourism_product_pix')");
			}

			$response['response']=212; 
			$response['success']=true;
			$response['filesArray']=$filesArray;
			$response['newImageName']=$newImageName;
			$response['message1']="UPDATE SUCCESS!"; 
			$response['message2']="Picture Upload Successfully!"; 
	}
break;



case 'fetch_tradition_other_pix_api':
	$page_id = $_POST['page_id'];

	$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
	$fetch = mysqli_fetch_array($get_pix_query);
	$tourism_product_pix = $fetch['tourism_product_pix'];

	if (empty($tourism_product_pix)) {
		mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
		$response['response']=212; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="No Picture Found.";
	} else {
		$getCount=mysqli_num_rows($get_pix_query);
		if ($getCount>0) {
		
			$response = array();
			$get_all_pix = explode(',', $fetch['tourism_product_pix']);
		
				$response['response']=212; 
				$response['success']=true;
				$response['get_all_pix'] = $get_all_pix;
		
		} else {
			$response['response']=212; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="No Picture Found."; 
		}
	}
break;





case 'delete_tradition_other_pix_api':
	$page_id = $_POST['page_id'];
	$delete_pix = $_POST['delete_pix'];

	// Fetch existing pictures from the database
	$get_pix_query = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($get_pix_query);

	if ($getCount>0) {
		$fetch = mysqli_fetch_assoc($get_pix_query);
		$existing_pictures = explode(',', $fetch['tourism_product_pix']);

		// Check if the picture to be deleted exists in the list
		$array_key = array_search($delete_pix, $existing_pictures);
		
		if ($array_key !== false) {
			// Remove the picture from the array
			unset($existing_pictures[$array_key]);

			// Update the database with the modified list
			$new_picture_list = implode(',', $existing_pictures);
			mysqli_query($conn, "UPDATE `tourism_products_pix_tab` SET `tourism_product_pix` = '$new_picture_list' WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));

			// Unlink (delete) the picture file from the folder
			$path_to_picture = '../uploaded_files/tradition_pix/other_pix/' . $delete_pix;
			if (file_exists($path_to_picture)) {
				unlink($path_to_picture);
			}else{
				$response['response'] = 212; 
				$response['success'] = true;
				$response['message1'] = "ERROR!";
				$response['message2'] = "No Picture Found!";
			}
			
			$response['response'] = 212; 
			$response['success'] = true;
			$response['message1'] = "SUCCESS";
			$response['message2'] = "Picture Deleted Successfully";
		} else {
			$response['response'] = 212; 
			$response['success'] = false;
			$response['message1'] = "ERROR!";
			$response['message2'] = "Picture Not Found.";
		}
	} else {
		$response['response'] = 212; 
		$response['success'] = false;
		$response['message1'] = "ERROR!";
		$response['message2'] = "No Pictures Found.";
	}

break;



/////////////////////// END TRADITION API////////////////////////////////



























/////////////////////// START NATURAL TOURISM PRODUCT API//////////////////////////////////////



case 'add_or_update_natural_tourism_product_category_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$category_name=trim(strtoupper($_POST['category_name']));
	$status_id=trim($_POST['status_id']);

	if (($category_name=='') || ($status_id=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	} else { ///else if 1

		if($cat_id==''){ ///start if 2
			$query=mysqli_query($conn,"SELECT category_name FROM natural_tourism_product_cat_tab WHERE category_name='$category_name'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3

				/////////////////geting sequence////////////////////
				$sequence=$callclass->_get_sequence_count($conn, 'NTPCAT');
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];
				
				/// generate page id //// 
				$cat_id='NTPCAT'.$no.date("Ymdhis");
			

				mysqli_query($conn,"INSERT INTO `natural_tourism_product_cat_tab`
				(`cat_id`, `category_name`, `status_id`, `created_time`, `updated_time`) VALUES 
				('$cat_id', '$category_name','$status_id',  NOW(), NOW())")or die (mysqli_error($conn));
			
				$response['response']=211; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Registered Successfully!"; 	 
			}// end if 3
	
		}else{ ///else if 2 
			$query=mysqli_query($conn,"SELECT category_name FROM natural_tourism_product_cat_tab WHERE category_name='$category_name' AND cat_id!='$cat_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0){ ///start if 3
				$response['response']=210; 
				$response['success']=false;
				$response['message1']="CATEGORY NAME ERROR!"; 
				$response['message2']="Category Name Already Exist!"; 						
			}else{ ///else if 3	
			
				mysqli_query($conn,"UPDATE natural_tourism_product_cat_tab SET category_name='$category_name', status_id='$status_id', updated_time=NOW() WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	
				$response['response']=212; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Category Updated Successfully!"; 
			///end if 2
			}		
		}
	}
break;




case 'fetch_natural_tourism_product_cat_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(a.category_name like '%$search_txt%')";

	$selectQuery="SELECT a.*, b.*,
	(SELECT COUNT(c.cat_id) FROM natural_tourism_product_tab c WHERE a.cat_id=c.cat_id AND a.status_id=b.status_id ) AS get_count
	 FROM natural_tourism_product_cat_tab a, setup_status_tab b WHERE a.status_id=b.status_id";
	/// write sql statement and function that will return all staff here
	if ($cat_id=='') {///start if 1
		
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1

		$query=mysqli_query($conn, "$selectQuery AND a.cat_id ='$cat_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;







case 'add_or_update_natural_tourism_product_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value
	$status_id=trim($_POST['status_id']);

	$query=mysqli_query($conn,"SELECT cat_id FROM natural_tourism_product_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($query);
	if($getCount==0){
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Category ID Not Found"; 
	}else{

		if(($page_title=='') || ($status_id=='')){ ///start if 1
			$response['response']=209; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="Fill all fields to continue!"; 
		}else{ ///else if 1

			if($page_id==''){ ///start if 2
				$query=mysqli_query($conn,"SELECT page_title FROM natural_tourism_product_tab WHERE page_title='$page_title'")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3

					/////////////////geting sequence////////////////////
					$sequence=$callclass->_get_sequence_count($conn, 'NTP');
					$array = json_decode($sequence, true);
					$no= $array[0]['no'];
					
					/// generate page id //// 
					$page_id='NTP'.$no.date("Ymdhis");
					////////////////////generate exam_pix/////////////////
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;

					if ($page_pix=='') {
						$page_photo= '';
					}

					mysqli_query($conn,"INSERT INTO `natural_tourism_product_tab`
					(`cat_id`,`page_id`, `page_title`, `status_id`, `page_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
					('$cat_id','$page_id', '$page_title','$status_id', '$page_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
				
					$response['response']=211; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Registered Successfully!"; 	 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;  	
				}// end if 3
		
			}else{ ///else if 2 
				$query=mysqli_query($conn,"SELECT page_title FROM natural_tourism_product_tab WHERE page_title='$page_title' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0){ ///start if 3
					$response['response']=210; 
					$response['success']=false;
					$response['message1']="PAGE TITLE ERROR!"; 
					$response['message2']="Page Title Already Exist!"; 						
				}else{ ///else if 3	
				
					mysqli_query($conn,"UPDATE natural_tourism_product_tab SET page_title='$page_title', status_id='$status_id', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));
		
					if ($page_pix!=''){
						$query=mysqli_query($conn,"SELECT page_pix FROM natural_tourism_product_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
						$fetch_query=mysqli_fetch_array($query);
						$old_page_pix=$fetch_query['page_pix'];
						$response['old_page_pix']=$old_page_pix; 
				
						$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
						$page_photo = $page_id.'_'.uniqid().'.'.$extension;
						mysqli_query($conn,"UPDATE natural_tourism_product_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
						$response['page_photo']=$page_photo; 
					}
					
					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Updated Successfully!"; 
					$response['page_id']=$page_id;
					$response['page_photo']=$page_photo;
					$response['old_page_pix']=$old_page_pix;
				///end if 2
				}		
			}
		}
	}
break;










case 'fetch_natural_tourism_product_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$page_id=trim(strtoupper($_POST['page_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);
	
	$search_like="(
	a.page_title like '%$search_txt%' OR 
	a.page_url like '%$search_txt%')";

	$query=mysqli_query($conn, "SELECT tourism_products_name FROM tourism_products_tab WHERE tourism_products_id='TP0006'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$tourism_products_name=$fetch_query['tourism_products_name'];
	$response['tourism_products_name']=$tourism_products_name;
	
	$query=mysqli_query($conn, "SELECT category_name FROM natural_tourism_product_cat_tab WHERE cat_id='$cat_id'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
	$category_name=$fetch_query['category_name'];
	$response['category_name']=$category_name;

	$selectQuery="SELECT a.*, b.* FROM natural_tourism_product_tab a, setup_status_tab b WHERE a.status_id=b.status_id";

	if ($page_id=='') {///start if 1
	
		$query=mysqli_query($conn, "$selectQuery AND b.status_id LIKE '%$status_id%' AND $search_like AND a.cat_id='$cat_id' ORDER BY a.created_time DESC")or die (mysqli_error($conn));
		$getCount=mysqli_num_rows($query);
		if ($getCount>0) { // start if 2
			$response['response']=132;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // else if 2
			$response['response']=133;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else if 1
		

		$query=mysqli_query($conn, "$selectQuery AND a.page_id ='$page_id'")or die (mysqli_error($conn));
		$response['response']=134;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
			$response['data']=$fetch_query;
		} 
	} //end if 1
	
break;





case 'update_natural_tourism_product_page_details_api':
	$page_id = $_POST['page_id'];
	$page_title =str_replace("'", "\'", $_POST['page_title']);
	$page_url = str_replace("'", "\\'", strtolower(trim($_POST['page_url'])));
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$page_summary = str_replace("'", "\'", $_POST['page_summary']);
	$page_detail = str_replace("'", "\'", $_POST['page_detail']);
	$page_pix=$_FILES['page_pix']['name']; //// page passport value


	if(($page_title=='')||($page_url=='')||($seo_keywords=='')||($page_summary=='')||($page_detail=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1
		if($page_id==''){ ///start if 2
				/// do nothing			
		}else{ ///else if 3
			$urlcheck=mysqli_query($conn,"SELECT page_url FROM natural_tourism_product_tab WHERE page_url='$page_url' AND page_id!='$page_id' LIMIT 1")or die (mysqli_error($conn));
			$check=mysqli_num_rows($urlcheck);
			if ($check>0){ ///start if 3
				$response['response']=210; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Page URL Already Exist!"; 						
			}else{ ///else if 3
	
				$urlcheck=mysqli_query($conn,"SELECT page_url FROM natural_tourism_product_tab WHERE page_id='$page_id'") or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($urlcheck);
				$db_page_url=$fetch_query['page_url']; 

				mysqli_query($conn,"UPDATE natural_tourism_product_tab SET page_title='$page_title', page_url='$page_url', seo_keywords='$seo_keywords', page_summary='$page_summary', page_detail='$page_detail', updated_time=NOW() WHERE page_id='$page_id'")or die (mysqli_error($conn));

				if ($page_pix!=''){
					$query=mysqli_query($conn,"SELECT page_pix FROM natural_tourism_product_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_page_pix=$fetch_query['page_pix'];
					$response['old_page_pix']=$old_page_pix; 
			
					$extension = pathinfo($page_pix, PATHINFO_EXTENSION);
					$page_photo = $page_id.'_'.uniqid().'.'.$extension;
					mysqli_query($conn,"UPDATE natural_tourism_product_tab SET page_pix='$page_photo' WHERE page_id='$page_id'")or die (mysqli_error($conn));
					$response['page_photo']=$page_photo; 
				}

					$query=mysqli_query($conn,"SELECT page_pix FROM natural_tourism_product_tab WHERE page_id = '$page_id'")or die (mysqli_error($conn));
					$fetch_query=mysqli_fetch_array($query);
					$old_seo_page_pix=$fetch_query['page_pix'];
					$response['old_seo_page_pix']=$old_seo_page_pix;

					$response['response']=212; 
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Page Updated Successfully!"; 
					
					$response['page_id']=$page_id;
					$response['page_title'] = $page_title;
					$response['page_url'] = $page_url;
					$response['seo_keywords'] = $seo_keywords;
					$response['page_summary'] = $page_summary;
					$response['page_detail'] = $page_detail;
					
					$response['db_page_url']=$db_page_url;
			}
		} ///end if 2		
	}//end if 1
break;



case 'natural_tourism_product_other_pix_api':
	$page_id = $_POST['page_id'];
	if (isset($_FILES["more_page_pix"]["name"])) {

		$totalFiles = count($_FILES["more_page_pix"]["name"]);
		$filesArray = array();

			$query=mysqli_query($conn, "SELECT page_id FROM tourism_products_pix_tab WHERE page_id='$page_id'")or die (mysqli_error($conn));
			$getCount=mysqli_num_rows($query);
			if ($getCount>0) {
				
				$get_pix = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
				$row = mysqli_fetch_assoc($get_pix);
				$db_tourism_product_pix = $row['tourism_product_pix'];

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid('', true);
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/natural_tourism_product_pix/other_pix/' . $newImageName);
				}
				$all_pix = $db_tourism_product_pix . ',' . implode(',', $filesArray);
				mysqli_query($conn,"UPDATE tourism_products_pix_tab SET tourism_product_pix='$all_pix' WHERE page_id='$page_id'")or die (mysqli_error($conn));
			
			}else{

				for ($i = 0; $i < $totalFiles; $i++) {
					$imageName = $_FILES["more_page_pix"]["name"][$i];
					$tmpName = $_FILES["more_page_pix"]["tmp_name"][$i];
			
					$imageExtension = explode('.', $imageName);
					$imageExtension = strtolower(end($imageExtension));

					$newImageName = $page_id . "-" . $i . "-" . uniqid();
					$newImageName .= "." . $imageExtension;
					
					$filesArray[] = $newImageName;
					
					move_uploaded_file($tmpName, '../uploaded_files/natural_tourism_product_pix/other_pix/' . $newImageName);
				}
		
				// Combine file names into a comma-separated string
				$tourism_product_pix = implode(',', $filesArray);
				mysqli_query($conn,"INSERT INTO `tourism_products_pix_tab`
				(`page_id`, `tourism_product_pix`) VALUES 
				('$page_id', '$tourism_product_pix')");
			}

			$response['response']=212; 
			$response['success']=true;
			$response['filesArray']=$filesArray;
			$response['newImageName']=$newImageName;
			$response['message1']="UPDATE SUCCESS!"; 
			$response['message2']="Picture Upload Successfully!"; 
	}
break;



case 'fetch_natural_tourism_product_other_pix_api':
	$page_id = $_POST['page_id'];

	$get_pix_query = mysqli_query($conn, "SELECT * FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
	$fetch = mysqli_fetch_array($get_pix_query);
	$tourism_product_pix = $fetch['tourism_product_pix'];

	if (empty($tourism_product_pix)) {
		mysqli_query($conn, "DELETE FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'") or die(mysqli_error($conn));
		$response['response']=212; 
		$response['success']=false;
		$response['message1']="ERROR!"; 
		$response['message2']="No Picture Found.";
	} else {
		$getCount=mysqli_num_rows($get_pix_query);
		if ($getCount>0) {
		
			$response = array();
			$get_all_pix = explode(',', $fetch['tourism_product_pix']);
		
				$response['response']=212; 
				$response['success']=true;
				$response['get_all_pix'] = $get_all_pix;
		
		} else {
			$response['response']=212; 
			$response['success']=false;
			$response['message1']="ERROR!"; 
			$response['message2']="No Picture Found."; 
		}
	}
break;





case 'delete_natural_tourism_product_other_pix_api':
	$page_id = $_POST['page_id'];
	$delete_pix = $_POST['delete_pix'];

	// Fetch existing pictures from the database
	$get_pix_query = mysqli_query($conn, "SELECT `tourism_product_pix` FROM `tourism_products_pix_tab` WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));
	$getCount=mysqli_num_rows($get_pix_query);

	if ($getCount>0) {
		$fetch = mysqli_fetch_assoc($get_pix_query);
		$existing_pictures = explode(',', $fetch['tourism_product_pix']);

		// Check if the picture to be deleted exists in the list
		$array_key = array_search($delete_pix, $existing_pictures);
		
		if ($array_key !== false) {
			// Remove the picture from the array
			unset($existing_pictures[$array_key]);

			// Update the database with the modified list
			$new_picture_list = implode(',', $existing_pictures);
			mysqli_query($conn, "UPDATE `tourism_products_pix_tab` SET `tourism_product_pix` = '$new_picture_list' WHERE `page_id` = '$page_id'")or die (mysqli_error($conn));

			// Unlink (delete) the picture file from the folder
			$path_to_picture = '../uploaded_files/natural_tourism_product_pix/other_pix/' . $delete_pix;
			if (file_exists($path_to_picture)) {
				unlink($path_to_picture);
			}else{
				$response['response'] = 212; 
				$response['success'] = true;
				$response['message1'] = "ERROR!";
				$response['message2'] = "No Picture Found!";
			}
			
			$response['response'] = 212; 
			$response['success'] = true;
			$response['message1'] = "SUCCESS";
			$response['message2'] = "Picture Deleted Successfully";
		} else {
			$response['response'] = 212; 
			$response['success'] = false;
			$response['message1'] = "ERROR!";
			$response['message2'] = "Picture Not Found.";
		}
	} else {
		$response['response'] = 212; 
		$response['success'] = false;
		$response['message1'] = "ERROR!";
		$response['message2'] = "No Pictures Found.";
	}

break;



/////////////////////// END NATURAL TOURISM PRODUCT API////////////////////////////////











case 'fetch_category_api':                                                                                                
	$query=mysqli_query($conn,"SELECT * FROM setup_categories_tab");
	$response['response']=122;
	$response['success']=true;
	while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
		$response['data']=$fetch_query;
	}                                                                                                                       
break;









/////////////////////// START BLOG API////////////////////////////////

case 'add_and_update_blog_api':
	$cat_id = $_POST['cat_id'];
	$blog_id = $_POST['blog_id'];
	$blog_title =str_replace("'", "\'", $_POST['blog_title']);
	$blog_url = str_replace("'", "\\'", strtolower(trim($_POST['blog_url'])));
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$blog_summary = str_replace("'", "\'", $_POST['blog_summary']);
	$blog_detail = str_replace("'", "\'", $_POST['blog_detail']);
	$new_blog_pix=$_FILES['blog_photo']['name']; //// exam passport value
	$status_id=trim($_POST['status_id']);

	if(($cat_id=='')||($blog_title=='')||($seo_keywords=='')||($blog_summary=='')||($blog_detail=='')||($blog_title=='')||($status_id=='')){ ///start if 1
		$response['response']=209; 
		$response['success']=False;
		$response['message1']="ERROR!"; 
		$response['message2']="Some Fields are empty!"; 
	}else{ ///else if 1
		if($blog_id==''){ ///start if 2
			$urlcheck=mysqli_query($conn,"SELECT blog_url FROM blog_tab WHERE blog_url='$blog_url'")or die (mysqli_error($conn));
			$check=mysqli_num_rows($urlcheck);
			if ($check>0){ ///start if 3
				$response['response']=210; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Blog URL Already Exist!"; 						
			}else{ ///else if 3

				///////////////////////geting sequence//////////////////////////
				$sequence=$callclass->_get_sequence_count($conn, 'BLOG');
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];
				
				/// generate Blog id //// 
				$blog_id='BLOG'.$no.date("Ymdhis");
				/// register Blog ////
				
				///////////////////////generate exam_pix//////////////////////////
				$extension = pathinfo($new_blog_pix, PATHINFO_EXTENSION);
				$blog_photo = $blog_id.'_'.uniqid().'.'.$extension;

				If($new_blog_pix==''){
					$blog_photo= '';
				}

				mysqli_query($conn,"INSERT INTO `blog_tab`
				(`cat_id`, `blog_id`, `blog_title`, `blog_url`, `seo_keywords`, `blog_summary`, `blog_detail`, `status_id`, `blog_pix`, `staff_id`, `created_time`, `updated_time`) VALUES 
				('$cat_id', '$blog_id', '$blog_title', '$blog_url', '$seo_keywords', '$blog_summary', '$blog_detail', '$status_id', '$blog_photo', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
			
				$response['response']=211; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="BLOG Registered Successfully!"; 	 
				$response['blog_id']=$blog_id;
				$response['blog_photo']=$blog_photo;  	
				$response['blog_url']=$blog_url;  								
			}// end if 3
		}else{ ///else if 2 	
			$urlcheck=mysqli_query($conn,"SELECT blog_url FROM blog_tab WHERE blog_url='$blog_url' AND blog_id!='$blog_id' LIMIT 1")or die (mysqli_error($conn));
			$check=mysqli_num_rows($urlcheck);
			if ($check>0){ ///start if 3
				$response['response']=210; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Blog URL Already Exist!"; 						
			}else{ ///else if 3
				
				$blogcheck=mysqli_query($conn,"SELECT blog_url FROM blog_tab WHERE blog_id='$blog_id'") or die (mysqli_error($conn));
				$fetch_query=mysqli_fetch_array($blogcheck);
				$db_blog_url=$fetch_query['blog_url']; 

				mysqli_query($conn,"UPDATE blog_tab SET cat_id='$cat_id', blog_title='$blog_title', blog_url='$blog_url', seo_keywords='$seo_keywords', blog_summary='$blog_summary', blog_detail='$blog_detail', status_id='$status_id' WHERE blog_id='$blog_id'")or die ("cannot update faq_tab");

				if ($new_blog_pix!=''){
					$query=mysqli_query($conn,"SELECT blog_pix FROM blog_tab WHERE blog_id = '$blog_id'");
					$fetch_query=mysqli_fetch_array($query);
					$old_blog_pix=$fetch_query['blog_pix'];
					$response['old_blog_pix']=$old_blog_pix; 
			
					$extension = pathinfo($new_blog_pix, PATHINFO_EXTENSION);
					$blog_photo = $blog_id.'_'.uniqid().'.'.$extension;
					mysqli_query($conn,"UPDATE blog_tab SET blog_pix='$blog_photo' WHERE blog_id='$blog_id'")or die ("cannot update blog_tab");
					$response['blog_photo']=$blog_photo; 
				}

				$query=mysqli_query($conn,"SELECT blog_pix FROM blog_tab WHERE blog_id = '$blog_id'");
				$fetch_query=mysqli_fetch_array($query);
				$seo_blog_pix=$fetch_query['blog_pix'];

				$response['response']=212; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="BLOG Updated Successfully!"; 
				$response['blog_id']=$blog_id;
				$response['blog_title']=$blog_title;
				$response['blog_url']=$blog_url;
				$response['db_blog_url']=$db_blog_url;
				$response['seo_keywords'] = $seo_keywords;
				$response['blog_summary'] = $blog_summary;
				$response['seo_blog_pix'] = $seo_blog_pix;
			}
		} ///end if 2		
	}//end if 1
break;







case 'fetch_blog_api':
	$blog_id=trim(strtoupper($_POST['blog_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);

	$search_like="(a.blog_title like '%$search_txt%' OR  c.cat_desc like '%$search_txt%')";

	// write sql statement and function that will return all blogs here
	if ($blog_id=='') {///start if 1
		$query=mysqli_query($conn,"SELECT a.*, b.status_name, c.cat_desc FROM blog_tab a, setup_status_tab b, setup_categories_tab c WHERE a.status_id=b.status_id AND a.cat_id=c.cat_id AND b.status_id LIKE '%$status_id%' AND $search_like ")or die (mysqli_error($conn));
		$check_query=mysqli_num_rows($query);
		if ($check_query>0) { // start if 2
			$response['response']=213;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;
			}
		}else{ // Else 2
			$response['response']=214;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else{///else 1
		$query=mysqli_query($conn,"SELECT * FROM blog_tab WHERE blog_id = '$blog_id'")or die (mysqli_error($conn));
		$response['response']=215;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
		$response['data']=$fetch_query;
		}
	} //end if 1
break;






/////////////////////// ENG BLOG API////////////////////////////////















/////////////////////// START FAQ's API////////////////////////////////
case 'add_or_update_faqs_api':
	$cat_id=trim(strtoupper($_POST['cat_id']));
	$faq_id=trim(strtoupper($_POST['faq_id']));
	$faq_question=trim((str_replace("'", "\'", $_POST['faq_question'])));
	$faq_answer=trim((str_replace("'", "\'", $_POST['faq_answer'])));
	$status_id=trim($_POST['status_id']);

	if(($cat_id=='')||($faq_question=='')||($status_id=='')){ ///start if 1
		$response['response']=203; 
		$response['success']=False;
		$response['message1']="ERROR!"; 
		$response['message2']="Fill all fields to continue!"; 
	}else{ ///else if 1
		if($faq_id==''){ ///start if 2
			///////////////////////geting sequence//////////////////////////
			$sequence=$callclass->_get_sequence_count($conn, 'FAQ');
			$array = json_decode($sequence, true);
			$no= $array[0]['no'];
			
			/// generate faq id //// 
			$faq_id='FAQ'.$no.date("Ymdhis");
			/// register faq ////

			mysqli_query($conn,"INSERT INTO `faq_tab`
			(`cat_id`, `faq_id`, `faq_question`, `faq_answer`, `status_id`, `created_time`) VALUES
			('$cat_id', '$faq_id', '$faq_question', '$faq_answer', '$status_id', NOW())")or die (mysqli_error($conn));

			$response['response']=204; 
			$response['success']=true;
			$response['message1']="SUCCESS!"; 
			$response['message2']="FAQ Registered Successfully!"; 	 
			$response['faq_id']=$faq_id;  									
		}else{ ///else if 2 									
			mysqli_query($conn,"UPDATE faq_tab SET cat_id='$cat_id', faq_question='$faq_question', faq_answer='$faq_answer', status_id='$status_id' WHERE faq_id='$faq_id'")or die (mysqli_error($conn));
			$response['response']=205; 
			$response['success']=true;
			$response['message1']="SUCCESS!"; 
			$response['message2']="FAQ Updated Successfully!"; 
			$response['faq_id']=$faq_id;
		} ///end if 2		
	} //end if 1						
break;








case 'fetch_faqs_api':
	$faq_id=trim(strtoupper($_POST['faq_id']));
	$status_id=($_POST['status_id']);
	$search_txt=($_POST['search_txt']);

	$search_like="(a.faq_question like '%$search_txt%')";

	/// write sql statement and function that will return all faq here
	if ($faq_id=='') {///start if 1
		$query=mysqli_query($conn,"SELECT a.*, b.status_name FROM faq_tab a, setup_status_tab b WHERE a.status_id=b.status_id AND a.status_id LIKE '%$status_id%' AND $search_like ORDER BY created_time DESC")or die (mysqli_error($conn));
		$check_query=mysqli_num_rows($query);
		if ($check_query>0) { // start if 2
			$response['response']=206;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
			$response['data']=$fetch_query;
			}
		}else{ // Else if 2
			$response['response']=207;
			$response['success']=false;
			$response['message']="NO RECORD FOUND!!!"; 
		}// End if 2
	}else {///else if 1
		$query=mysqli_query($conn,"SELECT a.*, b.status_name FROM faq_tab a, setup_status_tab b  WHERE a.status_id =b.status_id AND a.faq_id= '$faq_id'")or die (mysqli_error($conn));
		$response['response']=208;
		$response['success']=true;
		while($fetch_query=mysqli_fetch_assoc($query)){
		$response['data']=$fetch_query;
		} 
	} //end if 1
break;

/////////////////////// END FAQ API////////////////////////////////








		case 'change_password_api':

			$old_password=md5(trim($_POST['old_password']));
			$new_password=md5(trim($_POST['new_password']));

				$query=mysqli_query($conn, "SELECT `password` FROM staff_tab WHERE `password`='$old_password' AND staff_id='$login_staff_id' ") or die (mysqli_error($conn));
				$check_pass=mysqli_num_rows($query);
				if ($check_pass>0){
					$fetch_query=mysqli_fetch_array($query);
					$staff_id=$fetch_query['staff_id']; 
					$access_key=md5($staff_id.date("Ymdhis"));

					mysqli_query($conn,"UPDATE staff_tab SET `password`='$new_password',`access_key`='$access_key' WHERE staff_id='$login_staff_id'")or die (mysqli_error($conn));
					$response['response']=151;
					$response['success']=true;
					$response['message1']='PASSWORD CHANGE';
					$response['message2']='Successfully';
				}else {
					$response['response']=152;
					$response['success']=false;
					$response['message1']='OLD PASSWORD ERROR!';
					$response['message2']='Old Password Not Correct';
				}	
		break;






		case 'fetch_setup_backend_settings_api':
			$backend_setting_id=trim(strtoupper($_POST['backend_setting_id']));
			$query=mysqli_query($conn,"SELECT * FROM setup_backend_settings_tab")or die (mysqli_error($conn));
			$check_query=mysqli_num_rows($query);
			$response['response']=229;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;
			}
		break;
			


			
		case 'update_backend_settings_api':
			$sender_name=($_POST['sender_name']);
			$smtp_host=trim($_POST['smtp_host']);
			$smtp_username=trim($_POST['smtp_username']);
			$smtp_password=trim($_POST['smtp_password']);
			$smtp_port=trim($_POST['smtp_port']);
			
			if(($sender_name=='')||($smtp_host=='')||($smtp_username=='')||($smtp_password=='')||($smtp_port=='')){ ///start if 1
				$response['response']=230; 
				$response['success']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Fill all fields to continue."; 
			}else{ ///else if 1
				mysqli_query($conn,"UPDATE setup_backend_settings_tab SET sender_name='$sender_name', smtp_host='$smtp_host', smtp_username='$smtp_username', smtp_password='$smtp_password', smtp_port='$smtp_port' WHERE backend_setting_id='BK_ID001'") or die (mysqli_error($conn));
				$response['response']=231; 
				$response['success']=true;
				$response['message1']="SUCCESS!"; 
				$response['message2']="Settings Updated Successfully.";
			} //end if 1
		break;





		case 'fetch_dashboard_count_api':
			$query=mysqli_query($conn,"SELECT
			(SELECT COUNT(staff_id) FROM staff_tab WHERE status_id=1) AS total_active_staff_count,
			(SELECT COUNT(tourism_products_id) FROM tourism_products_tab WHERE status_id=1) AS total_active_tourism_products_count,
			(SELECT COUNT(page_id) FROM tourism_attraction_tab WHERE status_id=1) AS total_active_tourism_attraction_count,
			(SELECT COUNT(page_id) FROM entertainment_tab  WHERE status_id=1) AS total_active_entertainment_count,
			(SELECT COUNT(page_id) FROM sport_tab WHERE status_id=1) AS total_active_sport_count,
			(SELECT COUNT(page_id) FROM culture_tab WHERE status_id=1) AS total_active_culture_count,
			(SELECT COUNT(page_id) FROM tradition_tab WHERE status_id=1) AS total_active_tradition_count,
			(SELECT COUNT(page_id) FROM natural_tourism_product_tab WHERE status_id=1) AS total_active_natural_tourism_product_count,
			(SELECT COUNT(page_id) FROM tourism_destination_tab WHERE status_id=1) AS total_active_tourism_destination_count,
			(SELECT COUNT(page_id) FROM event_tab WHERE status_id=1) AS total_active_event_count,
			
			(SELECT COUNT(blog_id) FROM blog_tab WHERE status_id=1) AS total_active_blog_count,
			(SELECT COUNT(faq_id) FROM faq_tab WHERE status_id=1) AS total_active_faq_count");
			$response['response']=216;
			$response['success']=true;
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;
			} 
		break;


		



	/////////////////////// START VIDEO API////////////////////////////////
	
		case 'add_and_update_tourism_product_video_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$video_id=trim(strtoupper($_POST['video_id']));
			$video_title=trim(str_replace("'", "\'", $_POST['video_title']));
			$video_url=trim(str_replace("'", "\'", $_POST['video_url']));
			$status_id=$_POST['status_id'];

			if(($video_title=='') || ($video_url=='') ||($status_id=='')){
				$response['response']=151;
				$response['success']=false;
				$response['message1']='ERROR!';
				$response['message2']='Fill all fields to continue';
			}else{

				if($video_id==''){

					$query=mysqli_query($conn, "SELECT `video_url` FROM tourism_product_video_tab WHERE `video_url`='$video_url' ") or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0){
						$response['response']=151;
						$response['success']=false;
						$response['message1']='EMBED URL ERROR!';
						$response['message2']='Video embed code already exist';
					}else{
	
						$sequence=$callclass->_get_sequence_count($conn, 'VID');
						$array = json_decode($sequence, true);
						$no= $array[0]['no'];
						
						$video_id='VID'.$no.date("Ymdhis"); 
	
							//////////////// inserting to videos_tab//////////////////////////
						  mysqli_query($conn,"INSERT INTO `tourism_product_video_tab`
						  (`page_id`, `video_id`, `video_title`, `video_url`, `status_id`, `staff_id`, `created_time`, `updated_time`) VALUES 
						  ('$page_id','$video_id','$video_title','$video_url','$status_id','$login_staff_id',NOW(),NOW())")or die (mysqli_error($conn));
					
						$response['response']=151;
						$response['success']=true;
						$response['message1']='SUCCESS';
						$response['message2']='Video Uploaded Successful';
					}
				}else{
					$query=mysqli_query($conn, "SELECT `video_url` FROM tourism_product_video_tab WHERE `video_url`='$video_url' AND page_id='$page_id' AND video_id!='$video_id' LIMIT 1 ") or die (mysqli_error($conn));
					$getCount=mysqli_num_rows($query);
					if ($getCount>0){
						$response['response']=151;
						$response['success']=false;
						$response['message1']='EMBED URL ERROR!';
						$response['message2']='Video embed code already exist';

					}else{

						mysqli_query($conn,"UPDATE tourism_product_video_tab SET video_title='$video_title', video_url='$video_url', status_id='$status_id', updated_time=NOW() WHERE video_id='$video_id'")or die (mysqli_error($conn));
						$response['response']=151;
						$response['success']=true;
						$response['message1']='SUCCESS';
						$response['message2']='Video Updated Successful';
					}
				}
				
			}

		break;






		case 'fetch_tourism_product_video_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$video_id=trim(strtoupper($_POST['video_id']));
			$status_id=($_POST['status_id']);
			$search_txt=($_POST['search_txt']);

			if ($video_id=='') {///start if 1
				$search_like="(a.video_title like '%$search_txt%')";

				$query=mysqli_query($conn, "SELECT a.*, b.status_name FROM tourism_product_video_tab a, setup_status_tab b WHERE a.status_id=b.status_id AND a.status_id LIKE '%$status_id%' AND $search_like AND page_id ='$page_id' ORDER BY created_time DESC")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2
					$response['response']=132;
					$response['success']=true;
					while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
					}
				}else{ // else if 2
					$response['response']=133;
					$response['success']=false;
					$response['message1']="NO RECORD FOUND!"; 
					$response['message2']="Check and try again"; 
				}// End if 2
			}else{///else if 1
		
				$query=mysqli_query($conn, "SELECT * FROM tourism_product_video_tab WHERE  page_id ='$page_id' AND video_id ='$video_id'")or die (mysqli_error($conn));
				$response['response']=134;
				$response['success']=true;
				while($fetch_query=mysqli_fetch_assoc($query)){
					$response['data']=$fetch_query;
				} 
			} //end if 1
			
		break;




		case 'delete_tourism_product_video_api':
			$page_id=trim(strtoupper($_POST['page_id']));
			$video_id=trim(strtoupper($_POST['video_id']));
			
				$query=mysqli_query($conn, "SELECT video_id FROM tourism_product_video_tab WHERE video_id='$video_id'")or die (mysqli_error($conn));
				$getCount=mysqli_num_rows($query);
				if ($getCount>0) { // start if 2

					$response['response']=132;
					$response['success']=true;
					$response['message1']="SUCCESS!"; 
					$response['message2']="Video Deleted Successful."; 
					mysqli_query($conn, "DELETE FROM `tourism_product_video_tab` WHERE video_id='$video_id' AND page_id='$page_id'")or die (mysqli_error($conn));

				}else{ // else if 2
					$response['response']=133;
					$response['success']=false;
					$response['message1']="ERROR!"; 
					$response['message2']="Error!"; 
				}// End if 2
		break;

	/////////////////////// END VIDEO API////////////////////////////////

		}
	
	}//End if check//



}
echo json_encode($response);

?>





