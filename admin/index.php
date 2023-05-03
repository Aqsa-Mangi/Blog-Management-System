
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<style type="text/css">
		@import url("design.css");
		
	</style>
</head>
<body>
	<?php 
		require_once 'session_maintance.php';
		require_once 'manage_posts.php';

		$posts = getAllPosts();
	?>
	<center>
			<h2>BLOG MANAGEMENT SYSTEM</h2>
			<hr />
		<div class="row">
			<div class="col">
				<p>
				<h2>Welcome Admin: 
				<?php 
					echo $_SESSION['user']['full_name'];
				?>
				</h2></p>
				<a href="all_users.php" >Show All Users</a>&nbsp;&nbsp;
				<a href="../logout_users.php?user_id=<?php echo $_SESSION['user']['user_id'] ?>&log_id=<?php echo $_GET['log_id']?>" >Logout</a>&nbsp;&nbsp;
				
			</div>
		</div>
		<div>
			<?php 
				if(isset($_GET['msg']))
				{
					?>
						<p style="background-color: <?php echo $_GET['color']; ?>">
							
							<?php echo $_GET['msg']; ?>
						</p>
					<?php
				}

			?>
		</div>
		<?php 
			//AddFormPost("post_process.php","POST");

			if(isset($_GET['post_id']))
			{
				EditFormPost("post_process.php","POST",$_GET['post_id']);
			}else{
				AddFormPost("post_process.php","POST");
			}

			
		?>
		<table border="1" width="100%">
			<h2>POST INFORMATION</h2>
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
								<?php 
								echo getUserFullNameByUserRoleId($post['added_by_user_role_id']); 
								?>
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
					else
					{
						?>
							<tr align="center">
								<td colspan="6">
									<h3><b>No Posts Available</b></h3>
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
			 	window.location = "post_process.php?action=delete_post&post_id="+obj.getAttribute("post_id");
			 }
		}
	</script>
</body>
</html>