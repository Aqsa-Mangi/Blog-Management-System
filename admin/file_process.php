<?php 
			require_once 'logs_process.php';

			$user_logs=userLogs($_GET['user_id']);
			$user_log=mysqli_fetch_assoc($user_logs);

			$id=$_GET['user_id'];
			//$name=$user_log['full_name'];

			$filename = "../Files/$id.txt";
			$file_resource = fopen($filename, "a+");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>File Logs</title>
 </head>
 <body>
 	<table border="1">
 		<tr>
 			<th>LOGIN</th>
 			<th>LOGOUT</th>
 		</tr>

 	<?php
 		while (!feof($file_resource)) 
 		{
  	?>
  	<tr>
 			<td>
 				<?php echo fgets($file_resource);?>
 			</td>
 			<td>
 				<?php echo fgets($file_resource)."<br>";?>
 			</td>
 	<?php
 		}
 	?>
 	</tr>
 	</table>
 </body>
 </html>



			
