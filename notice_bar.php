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

	$sql="SELECT * FROM notice_board ORDER BY upload_date";
	$result=mysqli_query($conn,$sql);

	$information_ara=array();
	$i=-1;

	if(mysqli_num_rows($result))
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$i = $i + 1;
			$upload_date=$row['upload_date'];
			$notice_contain=$row['notice_contain'];
			$information_ara[$i] = array();
			$information_ara[$i]['upload_date']=$upload_date;
			$information_ara[$i]['notice_contain']=$notice_contain;
		}
	}

	if(!empty($_POST['submit_button']))
		header("Location: notice_upload_page.php");

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
							<th>Notice Conternt: </th>
						</tr>
						<?php for ($j=0; $j <= $i; $j++) { ?>
						<tr>
							<td><?php echo $information_ara[$j]['upload_date']; ?></td>
							<td><?php echo $information_ara[$j]['notice_contain']; ?></td>
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
							<input type="submit" name="submit_button" value="Upload Notice">
						</form>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>
</body>
</html>