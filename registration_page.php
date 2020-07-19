<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","student");
	if(!$conn)
	{
		echo "Failed to connect to database";
		die();
	}

	$sql = "SELECT COUNT(*) FROM registartion";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$count_num_row=$row['COUNT(*)'];
	if($count_num_row==0)
		$_SESSION['global_roll']=-1;

	if(!empty($_POST['submit_button']))
	{

        $user_name = "'".$_POST['user_name']."'";
        $password = "'".$_POST['pass_word']."'";
        $confarm_pass = "'".$_POST['con_pass']."'";

        $img_temp = $_FILES['pro_pic']['tmp_name'];
        $file_len = strlen($img_temp);
        if($file_len<3)
        	$image="NULL";
        else 
        {
        	$image=addslashes(file_get_contents($_FILES['pro_pic']['tmp_name']));
           	$image_size=getimagesize($_FILES['pro_pic']['tmp_name']);
           	$image = "'".$image."'";
        }

        if($password == $confarm_pass)
        {
        	$_SESSION['global_roll']=$_SESSION['global_roll']+1;
        	$roll_number =$_SESSION['global_roll'];
        	$sql = "INSERT INTO registartion(user_name,password,roll_number,user_image) values ($user_name,$password,$roll_number,$image)";
	        $result=mysqli_query($conn,$sql);
	        if($result)
	        {
	        	echo '<script type="text/javascript">alert("Registration successful.")</script>';
	        }
	        else 
	        {
	        	echo '<script type="text/javascript">alert("Registration Failed.")</script>';
	        	$_SESSION['global_roll']=$_SESSION['global_roll'] - 1;
	        	echo $sql;
	        }
        }
        else 
        	echo "Make sure Password and ConfarmPassword are same.";
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
					<a href="about_me.php">about_me</a>
				</div>
			</div>

			<div class="right_side_nav_bar">
				<div class="right_side_nav_bar_e_1">
					<a href="registration_page.php">Registration</a>
				</div>
				<div class="right_side_nav_bar_e_1">
					<a href="loging_page.php">Loging</a>
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
								<td>Confarm Password: </td>
								<td>
									<input type="password" name="con_pass">
								</td>
							</tr>
							<tr>
								<td>Enter Your Pic: </td>
								<td>
									<input type="file" name="pro_pic">
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