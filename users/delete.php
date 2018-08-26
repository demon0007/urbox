<?php
  include '../connect.php';
  $sql = "DELETE FROM ".$_COOKIE['type']." WHERE LOCATION='".$_COOKIE['delete']."'";

  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
      unlink($_COOKIE['delete']);
      header('Location:index.html?did=work');
  } else {
      echo "Error deleting record: " . $conn->error;
      echo $sql;
  }

  $conn->close();
 ?>
