<?php 

	require_once '../require/connection.php';

	function showAllUsers(){
		global $connection;
		$query = "SELECT * FROM `users`
		INNER JOIN `user_role` ON `users`.`user_id` = `user_role`.`user_id`
		INNER JOIN `roles` ON `user_role`.`role_id` = `roles`.`role_id`";
		$result = mysqli_query($connection,$query);
		return $result;
	}

	function userLogs($user_id){
		global $connection;
		$query = "SELECT L.*,users.`full_name` FROM `users` NATURAL JOIN `log_management` L WHERE user_id=".$user_id;
		$result = mysqli_query($connection,$query);
		return $result;
	}

	function logout($user_id){
		global $connection;
		date_default_timezone_set("asia/karachi");
		$timestamp = time();
		$logout_time= date("j F Y g:i:s A",$timestamp);

		$log_query="UPDATE `log_management` SET `log_out`=? WHERE `user_id`=?";
		$stmt_update_log = mysqli_prepare($connection,$log_query);
		mysqli_stmt_bind_param($stmt_update_log,'si',$logout_time,$user_id);
		mysqli_stmt_execute($stmt_update_log);

	}



 ?>