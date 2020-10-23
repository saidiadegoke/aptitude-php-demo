<?php



// Check that the required field are entered


if(!$_POST['name'] || !$_POST['email'] || !$_POST['password']) {
	header('Location: register.php?error=Please fill in all required fields.');
	exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', 'mysql', 'aptitude_test');

if($conn->connect_error) {
	exit('Couldn\'t connect to the Db');
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$created_at = date('Y-m-d H:i:s');

$sql = "INSERT INTO users (name, email, password, phone, gender, created_at)
VALUES ('$name', '$email', '$password', '$phone', '$gender', '$created_at')";

if ($conn->query($sql) === TRUE) {
  echo "Registration made successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
