
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include '../../config/config.php'?>
<?php include 'config/session-validation.php'?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<title>Administrative Portal | <?php echo $thename;?></title>
</head>
<body>
    <?php include 'header.php'?>
    <?php include 'side-bar.php'?>

    <div class="content-div">
         <div class="page-title-div dashbord-title animated fadeInDown animated animated">
	  	<div class="div-in">
		  	<div class="left-div">
			  <span id="page-title"><i class="bi-speedometer2"></i> <span class="role_name" id="dashboard_role_name">Xxx Xxx</span>  Dashboard</span> <span id="page-title2"></span><br />
			  <div class="project-name dashboard_fullname" id="dashboard_fullname">Xxxx Xxxx</div>
				<span class="time"><i class="fa fa-clock-o"></i> Last Login Date </span> - <span class="time" id="dashboard_last_login_time">xxxx</span>
		  	</div>

		  	<div class="right-div">
			  Current Time<br />
			  <div class="datetime">
            	 	<span id="clock"><span id="digitalclock" class="styling"></span></span>
            </div>
			  <?php echo date("l, d F Y");?>
		  	</div>
	  	</div>
	</div>
        
<!-- <script>  _get_fetch_all_loan_request('TRANS00120231229073111');</script> -->
            <div id="page-content">
                <?php $page='dashboard';?>
                <?php require_once 'content/page-content.php'?>
            </div>

        
        <div class="side-div-right animated fadeInRight animated animated">
            <div class="inner-right">
                <div class="alert-dashboard-div animated ZoomIn">
                    <div class="alert-dashboard-title"><i class="bi-bell"></i> Recent Activities <span class="right">See All</span></div>
                    <div class="system-alert dashboard-system-alert" id="<?php echo $alert_id; ?>" onclick="_read_alert('<?php echo $alert_id; ?>')">
                        <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                        <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                        <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                    </div>

                    <div class="system-alert dashboard-system-alert" id="<?php echo $alert_id; ?>" onclick="_read_alert('<?php echo $alert_id; ?>')">
                        <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                        <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                        <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                    </div> 

                    <div class="system-alert dashboard-system-alert" id="<?php echo $alert_id; ?>" onclick="_read_alert('<?php echo $alert_id; ?>')">
                        <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                        <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                        <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                    </div> 

                    <div class="system-alert dashboard-system-alert" id="<?php echo $alert_id; ?>" onclick="_read_alert('<?php echo $alert_id; ?>')">
                        <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                        <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                        <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                    </div> 

                    <div class="system-alert dashboard-system-alert" id="<?php echo $alert_id; ?>" onclick="_read_alert('<?php echo $alert_id; ?>')">
                        <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                        <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                        <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                    </div>

                </div>
            </div>     
        </div>
        
                

    </div>

    
</body>
</html>
