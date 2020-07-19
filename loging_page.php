
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


<?php

	$conn=mysqli_connect("localhost","root","","student");
	if(!$conn)
	{
		echo "Server Connection failed";
		die();
	}

	if(!empty($_POST['submit_button']))
	{

		$u_name="'".$_POST['user_name']."'";
		$pass="'".$_POST['pass_word']."'";

		$sql="SELECT * FROM registartion WHERE user_name=$u_name AND password=$pass";
		$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result))
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$user_name=$row['user_name'];
				$pass_word=$row['password'];
				$roll_number=$row['roll_number'];
				$_SESSION['login_flag']=1;
				$_SESSION['login_roll']=$row['roll_number'];
				header("Location:home_page.php");
			}
		}
		else 
			echo '<script type="text/javascript">alert("UserId or Password Do not match.")</script>';
	}
	$_POST['submit_button']="";
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>"This is Home page</title>
	<link rel="stylesheet" type="text/css" href="login_css.css">
</head>


<body>	
	<div class="full_body_container">

		<div class="navigation_bar_full">
			<div class="left_side_nav_bar">
				<div class="left_side_nav_bar_e_1">
					<a href="home_page.php">home_page</a>
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

		<div class="full_information_content" style="">
			<div class="personal_information">
				<div class="table_of_content">

					<form method="post" enctype="multipart/form-data">
						<table style="width: 75%; text-align: left;">
							<tr>
								<td>Enter UserName: </td>
								<td>
									<input type="text" name="user_name">
								</td>
							</tr>
							<tr>
								<td>Enter Password: </td>
								<td>
									<input type="password" name="pass_word">
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="submit_button" value="submit" style="margin-left: 37%;">
								</td>
							</tr>
						</table>
					</form>

				</div>
			</div>
		</div>

	</div>
</body>
</html>