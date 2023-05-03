<!DOCTYPE html>
<html>
<head>
	<title>USER LOGS</title>
</head>
<body>
	<?php
		require_once 'session_maintance.php';
		require_once '../require/connection.php';
		require_once 'logs_process.php';

		$user_logs=userLogs($_GET['user_id']);
	?>
	<center>
	<table border="1" width="100%">
		<tr>
			<th>USER</th>
			<th>LOGIN</th>
			<th>LOGOUT</th>
		</tr>
	<?php
		if($user_logs->num_rows > 0)
		{
			while($user_log = mysqli_fetch_assoc($user_logs))
			{	
	?>
		<tr>
			<td>
				<?php echo $user_log['full_name']; ?>
			</td>
			<td>
				<?php echo $user_log['log_in']; ?>
			</td>
			<td>
				<?php echo $user_log['log_out']; ?>
			</td>
		</tr>
	<?php 
			}
		}
		else
		{
	?>
		<tr align="center">
			<td colspan="2">
				No Logs Available 
			</td>
		</tr>
	<?php
		}

	?>
	</table>
	</center>
</body>
</html>