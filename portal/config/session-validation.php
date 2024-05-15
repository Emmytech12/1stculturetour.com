<?php if($login_staff_id==''){
    session_destroy();
    ?>
<script>
console.log('session_id', '<?php echo $_SESSION['staff_id']?>')
    alert('<?php echo $_SESSION['staff_id']?>');
    
	window.parent(location="<?php echo $admin_login_url?>");
</script>
<?php } ?>
