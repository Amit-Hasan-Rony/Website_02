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

	$admin_flag=$_SESSION['login_roll'];

	$sql="SELECT * FROM tutorials ORDER BY subject";
	$result=mysqli_query($conn,$sql);

	$information_ara=array();
	$i=-1;

	if(mysqli_num_rows($result))
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$i = $i + 1;
			$upload_date=$row['upload_date'];
			$subject=$row['subject'];
			$contain_link=$row['contain_link'];
			$contain_description=$row['contain_description'];
			$information_ara[$i] = array();
			$information_ara[$i]['upload_date']=$upload_date;
			$information_ara[$i]['subject']=$subject;
			$information_ara[$i]['contain_link']=$contain_link;
			$information_ara[$i]['contain_description']=$contain_description;

			$serial_number=(string)$row['serial_number'];
			$information_ara[$i]['name']='name="'.$serial_number.'"';
			$information_ara[$i]['value']='value="'.$contain_description.'"';
			$information_ara[$i]['serial_number_str']=$serial_number;
			$information_ara[$i]['serial_number_int']=$row['serial_number'];
		}
	}
	
	if(!empty($_POST['submit_button']))
		header("Location: video_upload_page.php");


	$_SESSION['video_link']="";
	for ($j=0; $j <= $i ; $j++) { 
		$a= $information_ara[$j]['serial_number_str'];
		if(!empty($_POST[$a]))
		{
			$_SESSION['video_link']=$information_ara[$j]['contain_link'];
			header("Location: video_page.php");
			break;
		}
	}

	$_POST['submit_button']="";
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>"This is Home page</title>
	<link rel="stylesheet" type="text/css" href="tutorials.css">
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

		<div class="total_contain_div">
			<div class="table_of_contain_div">
					<table style="width: 75%; text-align: left;">
						<tr>
							<th>Upload Date: </th>
							<th>Subject: </th>
							<th>Subject Conternt: </th>
						</tr>
				<?php for ($j=0; $j <= $i; $j++) { ?>
						<tr>
							<td><?php echo $information_ara[$j]['upload_date']; ?></td>
							<td><?php echo $information_ara[$j]['subject']; ?></td>
							<td>
								<a href="video_page.php">
									<form method="post" enctype="multipart/form-data">
										<input type="submit" <?php echo $information_ara[$j]['name']; ?> <?php echo $information_ara[$j]['value'];?>>
									</form>
								</a>
							</td>
						</tr>
				<?php } ?>
					</table>
			</div>
		</div>

		<div class="update_division">
			<?php if($admin_flag==0) { ?>
				<div class="only_for_button_div">
					<div class="button_div">
						<form method="post" enctype="multipart/form-data">
							<input type="submit" name="submit_button" value="Upload Tutorials">
						</form>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>

</body>
</html>