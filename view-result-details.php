<?php

include('authenticated.php');

$user = $_SESSION['user'];
$attemptId = $_GET['attempt_id'];

$conn = new mysqli('localhost', 'root', 'mysql', 'aptitude_test');

if($conn->connect_error) {
	exit('Couldn\'t connect to the Db');
}

$userId = $user['id'];

$sql = "SELECT `exams`.*, `questions`.`question`, `questions`.`subject_id`, `options`.`option`, `options`.`answer` FROM `exams` LEFT JOIN `questions` ON `questions`.`id` = `exams`.`question_id` LEFT JOIN `options` ON `options`.`id` = `exams`.`option_id` WHERE attempt_id=$attemptId";

$result = $conn->query($sql);

$results = [];
while($row = $result->fetch_assoc()) {
	$results[] = $row;
}
//var_dump($results);
//exit();

$content = 'includes/view-result-details.php';

include('layout.php');

?>
