<?php

class allClass{
/////////////////////////////////////////

function stringToSecret($string){
    $length = strlen($string);
    $visibleCount = (int) round($length / 4);
    $hiddenCount = $length - ($visibleCount * 2);
	
    return substr($string, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($string, ($visibleCount * -1), $visibleCount);
}

   	
function _get_setup_backend_settings_detail($conn, $backend_setting_id){
	$query=mysqli_query($conn,"SELECT * FROM setup_backend_settings_tab WHERE backend_setting_id='$backend_setting_id'");
	$fetch=mysqli_fetch_array($query);
		$smtp_host=$fetch['smtp_host'];
		$smtp_username=$fetch['smtp_username'];
		$smtp_password=$fetch['smtp_password'];
		$smtp_port=$fetch['smtp_port'];
		$sender_name=$fetch['sender_name'];
		$support_email=$fetch['support_email'];
		$payment_key=$fetch['payment_key'];
		$currency_id=$fetch['currency_id'];
      
		return '[{"smtp_host":"'.$smtp_host.'","smtp_username":"'.$smtp_username.'","smtp_password":"'.$smtp_password.'","afootech_email":"'.$afootech_email.'",
		"smtp_port":"'.$smtp_port.'","sender_name":"'.$sender_name.'","support_email":"'.$support_email.'",
        "payment_key":"'.$payment_key.'", "currency_id":"'.$currency_id.'"}]';

}


function _get_sequence_count($conn, $counter_id){
	$count=mysqli_fetch_array(mysqli_query($conn,"SELECT counter_value FROM setup_counter_tab WHERE counter_id = '$counter_id' FOR UPDATE"));
	 $num=$count[0]+1;
	 mysqli_query($conn,"UPDATE `setup_counter_tab` SET `counter_value` = '$num' WHERE counter_id = '$counter_id'")or die (mysqli_error($conn));
	 if ($num<10){$no='00'.$num;}elseif($num>=10 && $num<100){$no='0'.$num;}else{$no=$num;}
   return '[{"no":"'.$no.'"}]';
}

	
/////////////////////////////////////////
function _validate_accesskey($conn,$access_key){
	$query=mysqli_query($conn,"SELECT * FROM staff_tab WHERE access_key='$access_key' AND  status_id=1 AND access_key!='' ")or die (mysqli_error($conn));
	$count = mysqli_num_rows($query);
		if ($count>0){
			$fetch_query=mysqli_fetch_array($query);
			$staff_id=$fetch_query['staff_id'];
			$role_id=$fetch_query['role_id'];
			$check=1; 
		}else{
			$check=0;
		}
		return '[{"check":"'.$check.'","staff_id":"'.$staff_id.'","role_id":"'.$role_id.'"}]';
}

/////////////////////////////////////////
function _get_staff($conn, $staff_id){
	$query=mysqli_query($conn,"SELECT * FROM staff_tab WHERE staff_id = '$staff_id'");
	$fetch_query=mysqli_fetch_array($query);
	$staff_id=$fetch_query['staff_id'];
	$access_key=$fetch_query['access_key'];
	$fullname=$fetch_query['fullname'];
	$mobile=$fetch_query['mobile'];
	$email=$fetch_query['email'];
	$address=$fetch_query['address'];
	$password=$fetch_query['password'];
	$otp=$fetch_query['otp'];
	$passport=$fetch_query['passport'];
	$role_id=$fetch_query['role_id'];
	$status_id=$fetch_query['status_id'];
	$create_time=$fetch_query['created_time'];
	$updated_time=$fetch_query['updated_time'];
	
	 return '[{"staff_id":"'.$staff_id.'","access_key":"'.$access_key.'","fullname":"'.$fullname.'","mobile":"'.$mobile.'","email":"'.$email.'",
		"address":"'.$address.'","passport":"'.$passport.'","role_id":"'.$role_id.'","status_id":"'.$status_id.'",
		"otp":"'.$otp.'","password":"'.$password.'","created_time":"'.$created_time.'","updated_time":"'.$updated_time.'"}]';
}



function _alert_sequence_and_update($conn,$alert_detail,$staff_id,$fullname,$ip_address,$sysname,$role_id){
	$alertsele=mysqli_fetch_array(mysqli_query($conn,"SELECT counter_value FROM setup_counter_tab WHERE counter_id = 'ALT' FOR UPDATE"));
	$alertno=$alertsele[0]+1;
	$alertid='ALT'.$alertno;
	
	mysqli_query($conn,"INSERT INTO `alert_tab`
	(`alert_id`, `alert_detail`, `staff_id`, `fullname`, `ipaddress`, `computer`, `role_id`, `seen_status`, `date`) VALUES
	('$alertid', '$alert_detail', '$staff_id', '$fullname', '$ip_address', '$sysname', '$role_id', 0, NOW())")or die (mysqli_error($conn));
	
	mysqli_query($conn,"UPDATE setup_counter_tab SET counter_value='$alertno' WHERE counter_id = 'ALT'")or die (mysqli_error($conn));
}




/////////////////////////////////////////
function _user_validate_accesskey($conn,$access_key){
	$query=mysqli_query($conn,"SELECT * FROM user_tab WHERE access_key='$access_key' AND  status_id=1 ")or die (mysqli_error($conn));
	$count = mysqli_num_rows($query);
		if ($count>0){
			$fetch_query=mysqli_fetch_array($query);
			$user_id=$fetch_query['user_id'];
			$check=1; 
		}else{
			$check=0;
		}
		return '[{"check":"'.$check.'","user_id":"'.$user_id.'"}]';
}



function _check_page_session($conn, $page_category, $page_id, $page_session){
	$viewcount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM page_views_tab WHERE page_category='$page_category' AND page_id='$page_id' AND page_session='$page_session'"));
	if ($viewcount>0){
		$page_session_check=0;
	}else{
		$ip_address=$_SERVER['REMOTE_ADDR']; //ip used
		$sysname=gethostname();//computer used
		$page_session_check=1;
		mysqli_query($conn,"INSERT INTO `page_views_tab`
		(`page_category`,`page_id`, `page_session`, `system`, `ip_address`, `date`) VALUES 
		('$page_category','$page_id','$page_session','$sysname','$ip_address', NOW())")or die (mysqli_error($conn));
	}
	return '[{"page_session_check":"'.$page_session_check.'"}]';
}
				



}//end of class
$callclass=new allClass();
?>