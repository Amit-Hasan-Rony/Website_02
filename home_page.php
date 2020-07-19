<?php
  session_start();
  $login_flag = $_SESSION['login_flag'];


  if(!empty($_POST['logout_button']))
  {
	$_SESSION['login_flag']=0;
	$_SESSION['login_roll']=-5;
  }


  if($login_flag==0)
  {
  	$navbar_value1 = "Loging";
  	$navbar_link1 = "loging_page.php";

  	$navbar_value2 = "Registration";
  	$navbar_link2 = "registration_page.php";
  }
  	
  else 
  {
  	$navbar_value1 = "Logout";
  	$navbar_link1 = "home_page.php";

  	$navbar_value2 = "NoticeBoard";
  	$navbar_link2 = "notice_bar.php";
  }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>"This is Home page</title>
	<link rel="stylesheet" type="text/css" href="home_css.css">
</head>


<body>	
	<div class="full_body_container">

		<div class="navigation_bar_full">
			<div class="left_side_nav_bar">
				<div class="left_side_nav_bar_e_1">
					<a href="home_page.php">Home_page</a>
				</div>
				<?php if($login_flag==0) { ?>
				<div class="left_side_nav_bar_e_1">
					<a href="about_me.php">About_me</a>
				</div>
				<?php } ?>
				<?php if($login_flag==1) { ?>
				<div class="left_side_nav_bar_e_1">
					<a href="student_profile.php">My_profile</a>
				</div>
				<?php } ?>
			</div>

			<div class="right_side_nav_bar">
				<div class="right_side_nav_bar_e_1">
					<?php
						if($login_flag==1)
							echo '<a href="only_my_result.php">Result</a>';
					?>
				</div>
				<div class="right_side_nav_bar_e_1">
					<?php
						if($login_flag==1)
							echo '<a href="tutorials.php">Tutorials</a>';
					?>
				</div>
				<div class="right_side_nav_bar_e_1">
					<?php
						if($login_flag==0)
							echo '<a href="registration_page.php">Registration</a>';
						else 
							echo '<a href="notice_bar.php">Notice</a>';
					?>
				</div>
				<div class="right_side_nav_bar_e_1">
					<?php
						if($login_flag==0)
							echo '<a href="loging_page.php">Loging</a>';
						else 
							echo '<a href="home_page.php"><form method="post" enctype="multipart/form-data"><input type="submit" name="logout_button" value="Logout"></form></a>';
					?>
				</div>
			</div>
		</div>

		<div class="total_link_div">
			<div class="all_item_links">

				<div class="individual_item_link">
					<div class="background_image" style="background-image: url(image_folder/rony.jpg);"></div>
					<div class="writing_and_image">
						<div class="image_div" style="margin-left: 15px;">
							<a href="https://codeforces.com">
								<img src="image_folder/codeforces_image.png" alt="codeforces.com" style="width: 15%">
							</a>
						</div>
						<div class="writing_div">
							<p>Codeforces.com</p>
						</div>
					</div>
				</div>

				<div class="individual_item_link">
					<div class="background_image" style="background-image: url(image_folder/rony.jpg);"></div>
					<div class="writing_and_image">
						<div class="image_div" style="margin-left: 15px;">
							<a href="https://www.facebook.com">
								<img src="image_folder/facebook_image.jpg" alt="facebook.com" style="width: 15%">
							</a>
						</div>
						<div class="writing_div">
							<p>facebook.com</p>
						</div>
					</div>
				</div>

				<div class="individual_item_link">
					<div class="background_image" style="background-image: url(image_folder/rony.jpg);"></div>
					<div class="writing_and_image">
						<div class="image_div" style="margin-left: 25px;">
							<a href="https://practice.geeksforgeeks.org/batch/must-do-1">
								<img src="image_folder/geekforgeeks_image.png" alt="Geekforgeeks.com" style="width: 15%">
							</a>
						</div>
						<div class="writing_div">
							<p>Geekforgeeks.com</p>
						</div>
					</div>
				</div>

				<div class="individual_item_link">
					<div class="background_image" style="background-image: url(image_folder/rony.jpg);"></div>
					<div class="writing_and_image">
						<div class="image_div" style="margin-left: 15px;">
							<a href="https://mail.google.com/mail/u/0/#inbox">
								<img src="image_folder/gmail_image.png" alt="Gmail.com" style="width: 15%">
							</a>
						</div>
						<div class="writing_div">
							<p>Gmail.com</p>
						</div>
					</div>
				</div>

				<div class="individual_item_link">
					<div class="background_image" style="background-image: url(image_folder/rony.jpg);"></div>
					<div class="writing_and_image">
						<div class="image_div" style="margin-left: 15px;">
							<a href="https://www.google.com">
								<img src="image_folder/google_image.jpg" alt="Google.com" style="width: 15%">
							</a>
						</div>
						<div class="writing_div">
							<p>Google.com</p>
						</div>
					</div>
				</div>

				<div class="individual_item_link">
					<div class="background_image" style="background-image: url(image_folder/rony.jpg);"></div>
					<div class="writing_and_image">
						<div class="image_div" style="margin-left: 15px;">
							<a href="https://www.youtube.com">
								<img src="image_folder/youtube_image.png" alt="YouTube.com" style="width: 15%">
							</a>
						</div>
						<div class="writing_div">
							<p>YouTube.com</p>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</body>
</html>