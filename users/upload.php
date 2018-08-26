<?php
include 'validate.php';
$user = $_COOKIE['user'];
//$user='priyesh';
if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
// 	print_r($_FILES);
// }

	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$fileType = explode('/', $fileType);
	$fileActualType = strtolower(reset($fileType));
// 	print_r($fileActualType);
// }

	$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'mov', 'mp4', 'mp3', 'ogg', '3gp');
	$x=0;
	$sizes = array("B","KB","MB");
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 5300000) {
				while($fileSize > 1024){
					$x = $x + 1;
					$fileSize = $fileSize/1024;
				}
				$fileSize = round($fileSize,2).' '.$sizes[$x];
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = $user.'/'.$fileActualType.'/'.$fileNameNew;

				//MysqlndUhConnection
				//echo  "".$_POST['un']." - ".$_POST['ps']."";
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "urbox";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				//$sql = "SELECT * FROM users;"
				$sql = "INSERT INTO ".$fileActualType." (ID, NAME, SIZE, OWNER, LOCATION)
				VALUES ('".$fileNameNew."', '".$fileName."', '".$fileSize."', '".$user."', '".$fileDestination."')";

				if ($conn->query($sql) === TRUE) {
				} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: index.html");
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
}
?>
