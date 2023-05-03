
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<style type="text/css">
		#header{
			
			padding: 10px;
			height: auto;
			text-align: center;
		}
		#post_div{
			background-color: skyblue;
		}
		
	</style>
</head>
<body>
	<?php 
		require_once 'session_maintance.php';
		require_once 'manage_posts.php';

		$posts = getAllPosts();
	?>
	<center>
		<div id="header">
			<h2>Blog Management System</h2>
			<hr />
			<h3>Welcome User:
				<?php 
					echo $_SESSION['user']['full_name'];
				?>
			</h3>
			<a href="../logout_users.php?user_id=<?php echo $_SESSION['user']['user_id'] ?>&log_id=<?php echo $_GET['log_id']?>">Logout</a>
		</div>

		<?php 
		if($posts->num_rows > 0)
					{
						while($post = mysqli_fetch_assoc($posts))
						{

						
						?>
						<div id="post_div">
							<h5> Title: <?php echo $post['post_title']; ?></h5>
							<p>
								<b>Post Description: </b> <?php echo $post['post_description']; ?>

							</p>
							<a href="post_detail.php?post_id=<?php echo $post['post_id']; ?>">Read More</a>
						</div>
						<?php
						}

					}
					else
					{
						?>
							<div id="post_div">
								<h5> No Posts Available </h5>
								
							</div>
						<?php
					}
		?>
		
	</center>

</body>
</html>