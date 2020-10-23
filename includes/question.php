<?php

include('authenticated.php');

$questions = $_SESSION['questions'];
$exam = $_SESSION['exam'];
$question = $questions[$_SESSION['questionIndex']];
$questionId = $question['id'];

$conn = new mysqli('localhost', 'root', 'mysql', 'aptitude_test');

if($conn->connect_error) {
	exit('Couldn\'t connect to the Db');
}

if($_SESSION['questionIndex'] + 1 >= count($_SESSION['questions'])) {
	exit("Process the answer");
}

$sql = "SELECT * FROM options WHERE question_id='$questionId'";

$result = $conn->query($sql);

if ($result->num_rows < 1) {
  header('Location: ../exam.php?error=No question options found!');
	exit();
}

$options = [];
while($row = $result->fetch_assoc()) {
	$options[] = $row;
}
//var_dump($exam);
//exit();

if(!$questions || !$exam) {
	header('Location: ../exam.php?error=Questions and/or exam not available');
	exit();
}

$_SESSION['questionIndex'] = $_SESSION['questionIndex'] + 1;

if(count($_SESSION['questions']) > $_SESSION['questionIndex'] + 1) {
	$label = 'Next';
} else {
	$label = 'Finish';
}


$content = 'includes/question-page.php';

include('../layout.php');

?>
