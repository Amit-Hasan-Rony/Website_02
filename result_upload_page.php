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

	$sql="SELECT * FROM registartion ORDER BY roll_number";
	$result=mysqli_query($conn,$sql);
	$num_rows=mysqli_num_rows($result);

	$information_from_table = array();
	$index=-1;
	if($num_rows>1)
	{
		while ($row=mysqli_fetch_assoc($result)) {
			$index = $index + 1;
			$information_from_table[$index] = array();
			$information_from_table[$index]['roll_number']=$row['roll_number'];
			$information_from_table[$index]['track_value']=(string)$row['roll_number'];
			$information_from_table[$index]['input_field_name']='name="'.$information_from_table[$index]['track_value'].'"';
			//$information_from_table[$index]['track_value']="'".$information_from_table[$index]['track_value']."'";
		}
	}


	if(!empty($_POST['submit_button']))
	{
		$marks=0;
		$date="'".$_POST['exam_date']."'";
		$subject="'".$_POST['subject_form']."'";
 		for ($i=1; $i <= $index ; $i++) { 
 			$roll_number=(int)$information_from_table[$i]['roll_number'];
 			$a=$information_from_table[$i]['track_value'];
 			$mark_str=$_POST[$a];
 			
 			if(empty($mark_str))
 				$marks=0;
 			else 
 				$marks=(int)$mark_str;
 			$sql="INSERT INTO universal_table(roll_number,exam_name,exam_date,obtained_marked) VALUES ($roll_number,$subject,$date,$marks)";
 			$result=mysqli_query($conn,$sql);
 		}
 		if($result)
 			echo '<script type="text/javascript">alert("Result Upload successful.")</script>';
 		else 
 			echo '<script type="text/javascript">alert("Result Upload successful.")</script>';
	}
	
	$_POST['submit_button']="";
	$_POST['logout_button']="";
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>"This is Home page</title>
	<link rel="stylesheet" type="text/css" href="result_upload_page_css.css">
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

						<div class="sub_date_div">
							<div class="subject_div" style="display: flex;">
								<p>Subject Name:</p>
								<input type="text" name="subject_form">
							</div>
							<div class="date_div" style="display: flex;">
								<p>Exam Date:</p>
								<input type="date" name="exam_date">
							</div>
						</div>

						<div class="table_row_div">
							<table style="width: 75%; text-align: left;">
								<tr>
									<th>Roll No:</th>
									<th>Obtained Marked: </th>
								</tr>

								<?php for ($i=1; $i <= $index; $i++) { ?>
									<tr>
										<td><?php echo $information_from_table[$i]['roll_number']; ?></td>
										<td>
											<input type="number" <?php echo $information_from_table[$i]['input_field_name'];?>>
										</td>
									</tr>
								<?php } ?>

							</table>
						</div>

						<div class="submit_div_class">
							<div class="button_class">
								<input type="submit" name="submit_button" value="Submit" style="margin-left: 43%;">
							</div>
						</div>
						
					</form>

				</div>
			</div>
		</div>

	</div>

</body>
</html>