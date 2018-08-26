
 <?php
 include '../../connect.php';

 $user = $_COOKIE['user'];
 $pass = $_POST['password'];
 $hint = $_POST['hint'];
 $ques = $_POST['question'];
 $ans = $_POST['answer'];

 $sql = "UPDATE signin SET PASSWORD='".$pass."', QUESTION='".$ques."', ANSWER='".$ans."', HINT='".$hint."' WHERE USERNAME='".$user."';";

 if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
     header('Location:security.html?success=true');
 } else {
     echo $sql;
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
  ?>
