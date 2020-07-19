<?php 

	$conn=mysqli_connect("localhost","root","");
	if(!$conn)
	{
		echo "connection Failed";
		die();
	}
	else 
	{
		$sql="DROP DATABASE student";
		$query_result = mysqli_query($conn,$sql);
		if($query_result)
			echo "<p>Database droped</p>";
		$sql = "CREATE DATABASE student";
		$query_result = mysqli_query($conn,$sql);
		if($query_result)
		{
			echo "<p>Database successfully created. Database name is student</p>";
			mysqli_select_db($conn,"student");

			$sql="CREATE TABLE registartion(
					user_name VARCHAR(30) NOT NULL,
					password VARCHAR(30) NOT NULL,
					roll_number INTEGER,
					user_image LONGBLOB,
					PRIMARY KEY(roll_number)
				)";
			if(mysqli_query($conn,$sql))
				echo "<P>successfully REGISTRATION table created</P>";
			else 
				echo "<P>failed REGISTRATION table creation</P>";




			$sql = "CREATE TABLE universal_table (
						serial_number INTEGER AUTO_INCREMENT,
						roll_number INTEGER NOT NULL,
						exam_name VARCHAR(30) NOT NULL,
						exam_date DATE NOT NULL,
						obtained_marked INTEGER DEFAULT 0,
						FOREIGN KEY(roll_number) REFERENCES registartion(roll_number),
						PRIMARY KEY(serial_number)
					)";

  			if(mysqli_query($conn,$sql))
				echo "<P>successfully UNIVERSAL table created</P>";
			else 
				echo "<P>failed UNIVERSAL table creation</P>";




			$sql = "CREATE TABLE notice_board (
						serial_number INTEGER AUTO_INCREMENT,
						upload_date DATE NOT NULL,
						notice_contain VARCHAR(500) NOT NULL,
						PRIMARY KEY(serial_number)
					)";
			if(mysqli_query($conn,$sql))
				echo "<P>successfully UNIVERSAL table created</P>";
			else 
				echo "<P>failed UNIVERSAL table creation</P>";




			$sql = "CREATE TABLE tutorials (
						serial_number INTEGER AUTO_INCREMENT,
						upload_date DATE NOT NULL,
						subject VARCHAR(50) NOT NULL,
						contain_link VARCHAR(500) NOT NULL,
						contain_description VARCHAR(500) NOT NULL,
						PRIMARY KEY(serial_number)
					)";
			if(mysqli_query($conn,$sql))
				echo "<P>successfully UNIVERSAL table created</P>";
			else 
				echo "<P>failed UNIVERSAL table creation</P>";

		}
		else 
			echo "Database creation failed.";
	}

?>


<?php

	session_start();
	$_SESSION['login_flag']=0;
	$_SESSION['login_roll']=-5;
	$_SESSION['global_roll']=-2;

?>