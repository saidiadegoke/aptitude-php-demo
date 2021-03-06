<?php

include('includes/authenticated.php');

// Check that the required field are entered


if(!$_POST['exam_id']) {
	header('Location: exam.php?error=Please choose a subject.');
	exit();
}

$examId = $_POST['exam_id'];
$user = $_SESSION['user'];

// Connect to the database
$conn = new mysqli('localhost', 'root', 'mysql', 'aptitude_test');

if($conn->connect_error) {
	exit('Couldn\'t connect to the Db');
}


$sql = "SELECT * FROM questions WHERE subject_id='$examId'";

$result = $conn->query($sql);

if ($result->num_rows < 1) {
  header('Location: exam.php?error=No questions found!');
	exit();
}

$questions = [];
while($row = $result->fetch_assoc()) {
	$questions[] = $row;
}

$sql = "SELECT * from subjects WHERE id='$examId'";
$result = $conn->query($sql);

if ($result->num_rows < 1) {
  header('Location: exam.php?error=No questions found!');
	exit();
}

$exam = $result->fetch_assoc();

$_SESSION['questions'] = $questions;
$_SESSION['exam_id'] = $examId;
$_SESSION['exam'] = $exam;
$_SESSION['questionIndex'] = 0;
$answers = [];
foreach($questions as $question) {
	$answers[$question['id']] = [
		'question_id' => $question['id'],
		'option_id' => 0,
		'user_id' => $user['id']
	];
}
$_SESSION['answers'] = $answers;

$conn->close();

header('Location: question.php');
