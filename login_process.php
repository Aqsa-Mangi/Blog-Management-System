<?php 
	require_once("require/connection.php");
	session_start();
	if(isset($_POST['login']))
	{

		extract($_POST);

		$login_query = "SELECT * FROM `users` 
		WHERE `users`.`user_email` = ?
		AND `users`.`user_password` = ?";

		$stmt = mysqli_prepare($connection,$login_query);

		mysqli_stmt_bind_param($stmt,"ss",$email,$password);

		mysqli_stmt_execute($stmt);

		$data = mysqli_stmt_get_result($stmt);

		//var_dump($data);
		if($data->num_rows > 0)
		{
			$user_info = mysqli_fetch_assoc($data);

			//var_dump($user_info);
			$query = "SELECT `user_role`.`user_role_id`, `roles`.`role_id`,`roles`.`role_type`
			FROM `roles`, `user_role`
			WHERE `roles`.`role_id` = `user_role`.`role_id`
			AND `user_role`.`user_id` = ".$user_info['user_id'];

			//start of log management

			date_default_timezone_set("asia/karachi");
			$timestamp = time();
			$login_time= date("j F Y g:i:s A",$timestamp);

			$log_query="INSERT INTO `log_management` (user_id,log_in) VALUES (?,?)";
			$stmt_insert_log = mysqli_prepare($connection,$log_query);
			mysqli_stmt_bind_param($stmt_insert_log,'is',$user_info['user_id'],$login_time);
			mysqli_stmt_execute($stmt_insert_log);
			$log_id=mysqli_insert_id($connection);

			$result = mysqli_query($connection,$query);
			$roles = mysqli_fetch_assoc($result);

			//end of log management
			
			$user_info['role_id'] = $roles['role_id'];
			$user_info['role_type'] = $roles['role_type'];
			$user_info['user_role_id'] = $roles['user_role_id'];
			
			//start of file log management

			$id=$user_info['user_id'];
			//a$name=$user_info['full_name'];

			$filename = "Files/$id.txt";
			$file_resource = fopen($filename, "a+");
			fwrite($file_resource, "LI $login_time\n");

			//start of file log management

			$_SESSION['user'] =  $user_info;
			if($user_info['role_id'] == 1)
			{
				header("location: admin/index.php?log_id=$log_id");
			}elseif($user_info['role_id'] == 2)
			{
				header("location: author/index.php?log_id=$log_id");
			}elseif($user_info['role_id'] == 3)
			{
				header("location: user/index.php?log_id=$log_id");
			}

		}
		else
		{
			$msg = "Login Failed Plz Try Again ";
			header("location: index.php?msg=$msg&color=red");
		}


	}

?>