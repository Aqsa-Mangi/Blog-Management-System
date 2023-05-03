<?php
	require_once 'require/connection.php';
	//require_once 'admin/logs.process.php';
	session_start();

	date_default_timezone_set("asia/karachi");
	$timestamp = time();
	$logout_time= date("j F Y g:i:s A",$timestamp);

	$user_id=$_GET['user_id'];
	$log_id=$_GET['log_id'];

	//database log management
	$log_query="UPDATE `log_management` SET `log_out`=? WHERE `log_id`=? AND `user_id`=? ";
	$stmt_update_log = mysqli_prepare($connection,$log_query);
	mysqli_stmt_bind_param($stmt_update_log,'sii',$logout_time,$log_id,$user_id);
	mysqli_stmt_execute($stmt_update_log);

	//database log management
	
	//$name="User";
	$filename = "Files/$user_id.txt";
	$file_resource = fopen($filename, "a+");
	fwrite($file_resource, "LO $logout_time\n");

	session_destroy();

	header("location: index.php?msg=Logout Successfully !...&color=green");


?>