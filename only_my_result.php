<?php

 session_start();
 $conn=mysqli_connect("localhost","root","","student");
 if(!$conn)
 {
  echo "Connection Failed.";
  die();
 }
 $login_roll_number=$_SESSION['login_roll'];
 if ($login_roll_number==0)
  $admin_flag=1;
 else 
  $admin_flag=0;

 if(!empty($_POST['logout_button']))
 {
  $_SESSION['login_flag']=0;
  $_SESSION['login_roll']=-5;
  header("Location: home_page.php");
 }


 if(!empty($_POST['submit_button']))
  header("Location: result_upload_page.php");


 $result_choice=0;
 if(!empty($_POST['individual_choice']))
  $result_choice=0;
 else if(!empty($_POST['overall_choice']))
  $result_choice=1;

 $information = array();
 $index=-1;

 if ($result_choice!=0) {
  $sql="SELECT * FROM universal_table ORDER BY exam_date";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result))
  {
    while($row=mysqli_fetch_assoc($result))
    {
      $index = $index + 1;
      $information[$index] = array();
      $information[$index]['roll_number']=$row['roll_number'];
      $information[$index]['exam_name']=$row['exam_name'];
      $information[$index]['exam_date']=$row['exam_date'];
      $information[$index]['obtained_marked']=$row['obtained_marked'];
    }
  }
 }
 else 
 {
  $sql="SELECT * FROM universal_table WHERE roll_number=$login_roll_number";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result))
  {
    while($row=mysqli_fetch_assoc($result))
    {
      $index = $index + 1;
      $information[$index] = array();
      $information[$index]['roll_number']=$row['roll_number'];
      $information[$index]['exam_name']=$row['exam_name'];
      $information[$index]['exam_date']=$row['exam_date'];
      $information[$index]['obtained_marked']=$row['obtained_marked'];
    }
  }
 }

 $_POST['logout_button']="";
 $_POST['individual_choice']="";
 $_POST['overall_choice']="";
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>"This is Home page</title>
  <link rel="stylesheet" type="text/css" href="only_my_result.css">
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

    <div class="result_choice_div">
      <div class="result_choice_nav_bar">

        <div class="choice_individual_div">
          <form method="post" enctype="multipart/form-data">
            <input type="submit" name="individual_choice" value="Only_My_Result">
          </form>
        </div>
        <div class="only_upload_button_div">
           <?php if($admin_flag==1){ ?>
          <form method="post" enctype="multipart/form-data">
            <input type="submit" name="submit_button" value="upload result">
          </form>
          <?php } ?>
        </div>
        <div class="everyone_result_div">
          <form method="post" enctype="multipart/form-data">
            <input type="submit" name="overall_choice" value="Overall_Result">
          </form>
        </div>

      </div>
    </div>

    <div class="result_div">
      <div class="table_div">
        <?php if($result_choice==0) { ?>
        <table style="width: 75%; text-align: center;">
          <tr>
            <th>roll_number: </th>
            <th>exam_name: </th>
            <th>exam_date: </th>
            <th>obtained_marked: </th>
          </tr>
          <?php for ($i=0; $i <=$index ; $i++) { ?>
            <tr>
              <td><?php echo $information[$i]['roll_number']; ?></td>
              <td><?php echo $information[$i]['exam_name']; ?></td>
              <td><?php echo $information[$i]['exam_date']; ?></td>
              <td><?php echo $information[$i]['obtained_marked']; ?></td>
            </tr>
          <?php } ?>
        </table>
        <?php } ?>



        <?php if($result_choice!=0) { ?>
          <?php for($i=0;$i<=$index;$i++) { ?>
            <?php if($i==0){ ?>
            <table style="width: 75%; text-align: center;">
                <tr>
                  <th>roll_number: </th>
                  <th>exam_name: </th>
                  <th>exam_date: </th>
                  <th>obtained_marked: </th>
                </tr>
            <?php } ?>
            <?php if($i>0) { ?>
              <?php if($information[$i]['exam_date']!=$information[$i-1]['exam_date']) { ?>
                <?php if($i!=0){ ?>
                  </table>
                <?php } ?>
                <table style="width: 75%; text-align: center; margin-top: 7%;">
                  <tr>
                    <th>roll_number: </th>
                    <th>exam_name: </th>
                    <th>exam_date: </th>
                    <th>obtained_marked: </th>
                  </tr>
              <?php } ?>
            <?php } ?>
                <tr>
                  <td><?php echo $information[$i]['roll_number']; ?></td>
                  <td><?php echo $information[$i]['exam_name']; ?></td>
                  <td><?php echo $information[$i]['exam_date']; ?></td>
                  <td><?php echo $information[$i]['obtained_marked']; ?></td>
                </tr>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
</body>
</html>