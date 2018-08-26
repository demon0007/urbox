<?php
include 'connect.php';
// Define $myusername and $mypassword
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn,$myusername);
$mypassword = mysqli_real_escape_string($conn,$mypassword);
$sql="SELECT * FROM signin WHERE username='$myusername' AND password='$mypassword'";
$result = $conn->query($sql);
/*if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["username"]. " - Name: " . $row["password"]."<br>";
    }
} else {
    echo "0 results";
}
*/
// Mysql_num_row is counting table row
$count=$result->num_rows;
//$count=1;
$cookie='user';
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
  setcookie($cookie, $myusername, time() + (60*5), "/");
  header('Location: users/index.html');
} else {
  header('Location: index.html?error=true');
}
?>
