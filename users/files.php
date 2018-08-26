<?php
$user = $_COOKIE['user'];
include '../connect.php';
$icon = [
    "image" => "fa-camera-retro",
    "video" => "fa-youtube-play",
    "audio" => "fa-music",
    "application" => "fa-file-text-o"
];

foreach($icon as $type => $ticon) {
  $sql="SELECT * FROM $type WHERE owner='$user';";
  //echo $sql;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          //echo "id: " . $row["username"]. " - Name: " . $row["password"]."<br>";
          echo '<script type="text/javascript">myFiles("'.$ticon.'","'.$row['NAME'].'","'.$row['SIZE'].'","'.$type.'","'.$row['LOCATION'].'","'.$row['ID'].'");</script>';
      }
  }
}

// $sql="SELECT * FROM files WHERE owner='$user';";
// //echo $sql;
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         //echo "id: " . $row["username"]. " - Name: " . $row["password"]."<br>";
//         echo '<script type="text/javascript">myFiles("'.$icon[''].'","'.$row['NAME'].'","'.$row['SIZE'].'","'.$row['filetype'].'");</script>';
//     }
// }

// echo '<script type="text/javascript">myFiles("fa-camera-retro","Noway.jpg","2.4 Mb","Image");</script>';
// echo '<script type="text/javascript">myFiles("fa-youtube-play","sunset.mov","20.4 Mb","Video");</script>';
//  image   application   audio   video
 ?>
