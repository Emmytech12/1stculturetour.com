<?php if($login_staff_id==''){
    session_destroy();
    ?>
<script>
	window.parent(location="<?php echo $admin_login_url?>");
</script>
<?php } ?>
