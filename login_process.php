<?php

include('includes/not_authenticated.php');

// Check that the required field are entered


if(!$_POST['email'] || !$_POST['password']) {
	header('Location: login.php?error=Please enter username and password.');
	exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', 'mysql', 'aptitude_test');

if($conn->connect_error) {
	exit('Couldn\'t connect to the Db');
}


$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Login is successful";
} else {
  header('Location: login.php?error=Incorrect username or password.');
	exit();
}

$row = $result->fetch_assoc();

$_SESSION['user'] = $row;
$_SESSION['loggedIn'] = 'yes';

$conn->close();
var_dump($_SESSION);
header('Location: dashboard.php');
