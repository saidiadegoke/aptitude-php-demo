<?php

include('authenticated.php');

$user = $_SESSION['user'];

$conn = new mysqli('localhost', 'root', 'mysql', 'aptitude_test');

if($conn->connect_error) {
	exit('Couldn\'t connect to the Db');
}

$userId = $user['id'];

$sql = "SELECT `attempts`.*, `subjects`.`name`, `subjects`.`id` as subject_id FROM `attempts` LEFT JOIN subjects ON `subjects`.`id` = `attempts`.`exam_id` AND `attempts`.`user_id` = $userId";

$result = $conn->query($sql);

$attempts = [];
while($row = $result->fetch_assoc()) {
	$attempts[] = $row;
}
//var_dump($attempts);
//exit();

$content = 'includes/view-results.php';

include('layout.php');

?>
