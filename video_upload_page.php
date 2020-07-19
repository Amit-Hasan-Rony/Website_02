<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","student");
	if(!$conn)
	{
		echo "Failed to connect to database";
		die();
	}

	if(!empty($_POST['logout_button']))
	 {
	  $_SESSION['login_flag']=0;
	  $_SESSION['login_roll']=-5;
	  header("Location: home_page.php");
	 }

	if(!empty($_POST['submit_button']))
	{

        $upload_date = "'".$_POST['upload_date']."'";
        $subject = "'".$_POST['subject']."'";
        $contain_link = "'".$_POST['contain_link']."'";
        $contain_description="'".$_POST['contain_description']."'";

        $sql = "INSERT INTO tutorials(upload_date,subject,contain_link,contain_description) values ($upload_date,$subject,$contain_link,$contain_description)";
	    $result=mysqli_query($conn,$sql);
	    if($result)
	        echo '<script type="text/javascript">alert("Tutorial Upload successful.")</script>';
	    else 
	        echo '<script type="text/javascript">alert("Tutorial Upload Failed.")</script>';
 
	}
	$_POST['submit_button']="";
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>"This is Home page</title>
	<link rel="stylesheet" type="text/css" href="registration_css.css">
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

		<div class="full_information_content" style="">
			<div class="personal_information">
				<div class="table_of_content">

					<form method="post" enctype="multipart/form-data">
						<table style="width: 75%; text-align: left;">
							<tr>
								<td>Upload Date: </td>
								<td>
									<input type="date" name="upload_date">
								</td>
							</tr>
							<tr>
								<td>Enter Subject: </td>
								<td>
									<input type="text" name="subject">
								</td>
							</tr>
							<tr>
								<td>Enter Video Link: </td>
								<td>
									<input type="text" name="contain_link">
								</td>
							</tr>
							<tr>
								<td>Enter video_description: </td>
								<td>
									<input type="text" name="contain_description">
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="submit_button" value="Submit" style="margin-left: 43%;">
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