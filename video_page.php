<?php

 session_start();
 $conn=mysqli_connect("localhost","root","","student");
 if(!$conn)
 {
	echo "Connection Failed.";
	die();
 }


 if(!empty($_POST['logout_button']))
 {
	$_SESSION['login_flag']=0;
	$_SESSION['login_roll']=-5;
	header("Location: home_page.php");
 }
 $login_roll_number=$_SESSION['login_roll']; 

 $video_link='src="'.$_SESSION['video_link'].'"';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>"This is Home page</title>
	<link rel="stylesheet" type="text/css" href="video_page_css.css">
</head>


<body>	
	<div class="full_body_container">

		<div class="navigation_bar_full">
			<div class="left_side_nav_bar">
				<div class="left_side_nav_bar_e_1">
					<a href="home_page.php">home_page</a>
				</div>
				<div class="left_side_nav_bar_e_1">
					<a href="student_profile.php">My_profile</a>
				</div>
			</div>

			<div class="right_side_nav_bar">
				<div class="right_side_nav_bar_e_1">
					<a href="only_my_result.php">Result</a>
				</div>
				<div class="right_side_nav_bar_e_1">
					<a href="tutorials.php">Tutorials</a>
				</div>
				<div class="right_side_nav_bar_e_1">
					<a href="notice_bar.php">Notice</a>
				</div>
				<div class="right_side_nav_bar_e_1">
					<a href="home_page.php"><form method="post" enctype="multipart/form-data"><input type="submit" name="logout_button" value="Logout"></form></a>
				</div>
			</div>
		</div>

		<div class="full_video_contain">
			<div class="only_video_div">
				<div class="real_video">
					<video width="620" height="420" controls>
						<source <?php echo $video_link; ?> type="video/mp4">
					</video>
				</div>

				<div class="subject_video">
					<h5><?php echo "Title: This is the first video we are uploading."; ?></h5>
				</div>
			</div>
		</div>

	</div>
</body>
</html>