<!DOCTYPE html>
<html>
<head>
	<title>All USERS</title>
</head>
<body>
	<?php
		require_once 'session_maintance.php';
		require_once '../require/connection.php';
		require_once 'logs_process.php';
		$users=showAllUsers();

	?>
	<center>
	<table border="1" width="100%" style="text-align: center;">
		<tr>
			<th>NAME</th>
			<th>GENDER</th>
			<th>EMAIL</th>
			<th>PASSWORD</th>
			<th>ROLE TYPE</th>
			<th>STATUS</th>
			<th>LOGS BY FILE</th>
			<th>LOGS BY DATABASE</th>
		</tr>
	<?php 
		if($users->num_rows > 0)
		{
			while($user = mysqli_fetch_assoc($users))
			{						
	?>
		<tr>
			<td>
				<?php echo $user['full_name']; ?>
			</td>
			<td>
				<?php echo $user['gender']; ?>
			</td>
			<td>
				<?php echo $user['user_email']; ?>
			</td>
			<td>
				<?php echo $user['user_password']; ?>
			</td>
			<td>
				<?php echo $user['role_type']; ?>
			</td>
			<td>
				<?php echo $user['is_active']; ?>
			</td>
			<td>
				<a href="file_process.php?user_id=<?php echo $user['user_id']; ?>">FILE LOGS</a>
			</td>
			<td>
				<a href="user_logs.php?user_id=<?php echo $user['user_id']; ?>">DATABASE LOGS</a>
			</td>
		</tr>
	<?php 
			}
		}
		else
		{
	?>
		<tr align="center">
			<td colspan="8">
				No User Available 
			</td>
		</tr>
	<?php
		}

	?>
	</table>
	</center>

</body>
</html>