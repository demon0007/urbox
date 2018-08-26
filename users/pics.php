<?php
  $user = $_COOKIE['user'];
  include '../connect.php';
  $sql="SELECT * FROM image WHERE owner='$user';";
  //echo $sql;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          //echo "id: " . $row["username"]. " - Name: " . $row["password"]."<br>";
          echo '<script type="text/javascript">myPics("'.$row["LOCATION"].'","'.$row["NAME"].'","'.$row["SIZE"].'");</script>';
      }
  }
// echo '<script type="text/javascript">myPics("../img/empty.jpg","Noway.jpg","2.4 Mb");</script>';
// echo '<script type="text/javascript">myPics("../img/banner.jpg","sunset.mov","20.4 Mb");</script>';
 ?>
