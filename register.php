<?php
include 'connect.php';

$user = $_POST['username'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$dob = $_POST['dob'];
$file = $_FILES['file'];
//echo "string".$_POST['dob'];;
//echo "string".$dob;

$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
//echo $dob;
$date = explode('/', $dob);
$dob= $date[2].'-'.$date[0].'-'.$date[1];
//echo $dob;
$allowed = array('jpg', 'jpeg', 'png');
if (in_array($fileActualExt, $allowed)) {
  if ($fileError === 0) {
    if ($fileSize < 5300000) {
      $fileNameNew = uniqid('', true).".".$fileActualExt;
      $fileDestination = 'profile/'.$fileNameNew;
      move_uploaded_file($fileTmpName, $fileDestination);
      $sql = "INSERT INTO userinfo (USERNAME, FIRST_NAME, LAST_NAME, EMAIL, SEX, AGE, DOB, DP)
      VALUES ('".$user."', '".$fname."', '".$lname."', '".$email."', '".$sex."', ".$age.", '".$dob."', '".$fileDestination."')";

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          mkdir("users/".$user);
          mkdir("users/".$user."/image");
          mkdir("users/".$user."/video");
          mkdir("users/".$user."/audio");
          mkdir("users/".$user."/application");
          setcookie('register',$user,time()+(60*6),'/');
          header('Location:signup.html');
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      //header("Location: success.html");
    } else {
      echo "Your file is too big!";
    }
  } else {
    echo "There was an error uploading your file!";
  }
} else {
  echo "You cannot upload files of this type : ".$fileType;
}



 ?>
