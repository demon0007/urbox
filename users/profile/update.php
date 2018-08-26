<?php
include '../../connect.php';

$user = 'priyesh';//$_COOKIE['user'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$dob = $_POST['dob'];

//echo $dob;
$date = explode('/', $dob);
$dob= $date[2].'-'.$date[0].'-'.$date[1];
//echo $dob;
$sql = "UPDATE userinfo SET FIRST_NAME='".$fname."', LAST_NAME='".$lname."', EMAIL='".$email."', SEX='".$sex."', AGE='".$age."', DOB='".$dob."' WHERE USERNAME='".$user."';";

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          header('Location:info.html?success=true');
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }




 ?>
