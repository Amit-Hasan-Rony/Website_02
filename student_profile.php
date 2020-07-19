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

 $sql="SELECT * FROM registartion WHERE roll_number=$login_roll_number";
 $login_information = array();

 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result))
 {
 	$index=-1;
 	while($row=mysqli_fetch_assoc($result))
 	{
 		$index++;
 		$login_information['user_name']=$row['user_name'];
 		$login_information['roll_number']=$row['roll_number'];
 		$login_information['user_image']=$row['user_image'];
 	}
 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>"This is Home page</title>
	<link rel="stylesheet" type="text/css" href="student_profile_css.css">
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

		<div class="page_content">
			<div class="information_div">
				<div class="image_div">
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $login_information['user_image'] ).'" class="imge_class"/>'; ?>
				</div>
				<div class="only_information">
					<p>User Name: <?php echo $login_information['user_name']; ?></p>
					<p>Roll No: <?php echo $login_information['roll_number']; ?></p>
				</div>
			</div>
		</div>

	</div>
</body>
</html>