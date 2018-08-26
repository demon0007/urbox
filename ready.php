<?php
include 'connect.php';

$user = $_COOKIE['register'];
$pass = $_POST['password'];
$hint = $_POST['hint'];
$ques = $_POST['question'];
$ans = $_POST['answer'];

$sql = "INSERT INTO signin (USERNAME, PASSWORD, QUESTION, ANSWER, HINT)
VALUES ('".$user."', '".$pass."', '".$ques."', '".$ans."', '".$hint."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	setcookie('register',$user,time()-(60*5),'/');
    header('Location:index.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 ?>
