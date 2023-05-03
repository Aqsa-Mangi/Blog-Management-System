<!DOCTYPE html>
<html>
<head>
	<title>Author Dashboard</title>
	<style type="text/css">
		#header{
			padding: 10px;
			height: auto;
			text-align: center;
		}
		
	</style>
</head>
<body>
	<?php 
		require_once '../require/connection.php';
		require_once 'session_maintance.php';
		require_once '../admin/manage_posts.php';
		$posts = getAllPosts();


	?>
	<center>
		<div id="header">
			<h2>Blog Management System</h2>
			<hr />
			<h5>Welcome Author:
				<?php 
					echo $_SESSION['user']['full_name'];
				?>
			</h5>
			<a href="../logout_users.php?user_id=<?php echo $_SESSION['user']['user_id'] ?>&log_id=<?php echo $_GET['log_id']?>">Logout</a>
		</div>
		<?php 
			//AddFormPost("post_process.php","POST");
		
			if(isset($_GET['post_id']))
			{
				EditFormPost("../admin/post_process.php","POST",$_GET['post_id']);
			}else{
				AddFormPost("../admin/post_process.php","POST");
			}	

			/*echo '<pre>';
			print_r(mysqli_fetch_assoc($posts));
			echo '<pre>';*/	
			
		?>
		<table border="1" width="100%">
			<p>POST INFORMATION</p>
				<tr>
					<th>Post ID</th>
					<th>Post Title</th>
					<th>Summary</th>
					<th>Post Description</th>
					<th>Post Added By</th>
					<th>Actions</th>
				</tr>
				<?php 
					if($posts->num_rows > 0)
					{
						while($post = mysqli_fetch_assoc($posts))
						{

						?>
						<tr>
							<td>
								<?php echo $post['post_id']; ?>		
							</td>
							<td>
								<?php echo $post['post_title']; ?>
							</td>
							<td>
								<?php echo $post['post_summary']; ?>
							</td>
							<td>
								<?php echo $post['post_description']; ?>
							</td>
							<td>
								<?php 
								echo getUserFullNameByUserRoleId($post['added_by_user_role_id']); 
								?>
							</td>
						<?php	
						$user=getUserRole($post['added_by_user_role_id']);

						/*echo $_SESSION['user']['user_id'];
						echo $user['user_id'];
						echo $_SESSION['user']['role_id'];
*/

						if ($_SESSION['user']['user_id']==$user['user_id'] && $_SESSION['user']['role_id']==$user['role_id']) {
						?>
							<td>
								<a href="index.php?post_id=<?php echo $post['post_id']; ?>">
									Edit
								</a>
								 | 
								<a href="javascript:void(0)" post_id="<?php echo $post['post_id']; ?>" onclick="deletePost(this)">
								Delete 
								</a>
							</td>
						</tr>
						<?php
							}
						}
					}
					else
					{
						?>
							<tr align="center">
								<td colspan="6">
									No Posts Available 
								</td>
							</tr>
						<?php
					}

				?>
		</table>

	</center>
	<script type="text/javascript">
		function deletePost(obj){

			 var flag = confirm("Do you want delete this record");
			 if(flag)
			 {
			 	window.location = "../admin/post_process.php?action=delete_post&post_id="+obj.getAttribute("post_id");
			 }
		}
	</script>
	</center>

</body>
</html>