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
		$upload_date="'".$_POST['upload_date']."'";
        $notice_contain="'".$_POST['notice_contain']."'";

        $sql = "INSERT INTO notice_board(upload_date,notice_contain) values ($upload_date,$notice_contain)";
	    $result=mysqli_query($conn,$sql);
	    if($result)
	        echo '<script type="text/javascript">alert("Notice Upload successful.")</script>';
	    else 
	        echo '<script type="text/javascript">alert("Notice Upload Failed.")</script>';
 
	}
	$_POST['submit_button']="";
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>"This is Home page</title>
	<link rel="stylesheet" type="text/css" href="notice_upload_page_css.css">
</head>


<body>	
	<div class="full_body_container">

		<div class="navigation_bar_full">
			<div class="left_side_nav_bar">
				<div class="left_side_nav_bar_e_1">
					<a href="home_pge01.php">home_page</a>
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
								<td>Enter Notice Content: </td>
								<td>
									<input type="text" name="notice_contain">
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