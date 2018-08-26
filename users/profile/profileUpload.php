<?php

$dp = $_POST['dp'];
$file = $_FILES['file'];

$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png');

if (in_array($fileActualExt, $allowed)) {
  if ($fileError === 0) {
    if ($fileSize < 5300000) {
      $fileDestination = '../../'.$dp;
      move_uploaded_file($fileTmpName, $fileDestination);
      //echo "Uploaded".$dp;
      header("Location:profile.php");
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
