<?php
if (!isset($_COOKIE['user'])){
  header('Location:../../');
}
$user = $_COOKIE['user'];
include '../../connect.php';
$sql = "SELECT FIRST_NAME, LAST_NAME, EMAIL,DP  FROM userinfo  WHERE USERNAME='".$user."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if(isset($_COOKIE['img'])){
          setcookie('name', $name, time() - (60*100), "/");
          setcookie('email', $row['EMAIL'], time() - (60*100), "/");
          setcookie('img', $row['DP'], time() - (60*100), "/");  
        }
        $name = $row['FIRST_NAME']." ".$row['LAST_NAME'];
        setcookie('name', $name, time() + (60*1), "/");
        setcookie('email', $row['EMAIL'], time() + (60*1), "/");
        setcookie('img', $row['DP'], time() + (60*1), "/");
    }


$sql = "SELECT SIZE FROM files WHERE OWNER='".$user."'";
$result = $conn->query($sql);
$size = (float) 0.0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $temp = $row['SIZE'];
        $fileSize = explode(' ', $temp);
        $fileActualSize = (float)reset($fileSize);
        $fileActualType = end($fileSize);

        switch ($fileActualType) {
          case "MB":
              $size = $size + $fileActualSize;
              break;
          case "KB":
              $fileActualSize = $fileActualSize/1024;
              $size = $size + $fileActualSize;
              break;
          case "Kb":
              $fileActualSize = $fileActualSize/1024;
              $size = $size + $fileActualSize;
              break;
          default:
              echo "unexpected";
      }
    }
    setcookie('size', round($size,4), time() + (60*1), "/");
    //echo "Size ".round($size,4) ;
    header('Location:index.html');
} else {
    echo "error size";
}
} else {
    echo "error userinfo";
}

$conn->close();
 ?>
