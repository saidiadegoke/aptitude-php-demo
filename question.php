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

	foreach($_SESSION['answers'] as $answer) {
		$questionId = $answer['question_id'];
		$optionId = $answer['option_id'];
		$userId = $answer['user_id'];
		$createAt = date('Y-m-d H:i:s');
		$sql = "INSERT into exams (question_id, option_id, user_id, created_at) VALUES('$questionId', '$optionId', '$userId', '$createAt');";

		if($conn->query($sql) !== TRUE) {
				exit("Error: " . $conn->error);
			}
	}
	header('Location: done.php');
	exit("Process the answer");
}

if($_POST['question_id'] && $_POST['option_id'] && $_POST['user_id']) {
	$_SESSION['answers'][$_POST['question_id']] = [
		'question_id' => $_POST['question_id'],
		'option_id' => $_POST['option_id'],
		'user_id' => $_POST['user_id']
	];
}

$sql = "SELECT * FROM options WHERE question_id='$questionId'";

$result = $conn->query($sql);

if ($result->num_rows < 1) {
  header('Location: exam.php?error=No question options found!');
	exit();
}

$options = [];
while($row = $result->fetch_assoc()) {
	$options[] = $row;
}
//var_dump($exam);
//exit();

if(!$questions || !$exam) {
	header('Location: exam.php?error=Questions and/or exam not available');
	exit();
}

$_SESSION['questionIndex'] = $_SESSION['questionIndex'] + 1;

if(count($_SESSION['questions']) > $_SESSION['questionIndex'] + 1) {
	$label = 'Next';
} else {
	$label = 'Finish';
}

$content = 'includes/question-page.php';

include('layout.php');

?>
