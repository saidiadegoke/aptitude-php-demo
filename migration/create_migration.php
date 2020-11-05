<?php

// Connect to the database
$conn = new mysqli('localhost', 'root', 'mysql', 'aptitude_test');

if($conn->connect_error) {
	exit('Couldn\'t connect to the Db');
}

$tranc =  "DROP tables IF EXISTS subjects, questions, options, answers, exams, attempts";
if(!$conn->query($tranc)) {
	exit("Error: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `description` text NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);";

if ($conn->query($sql) !== TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$subjects = [
	[
		'name' => 'English Language',
		'description' => 'English Test'
	],
	[
		'name' => 'Government',
		'description' => 'Government Test'
	]
];

foreach($subjects as $subject) {
	$sql = "INSERT INTO subjects (name, description) VALUES ('" . $subject['name'] . "', '" . $subject['description'] . "');";
	if ($conn->query($sql) !== TRUE) {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

echo '<p>Done migrating subjects!<br></p>';


$sql = "CREATE TABLE IF NOT EXISTS `questions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `question` text NOT NULL,
  `subject_id` int NOT NULL,
  `instruction` text NULL
);";

if ($conn->query($sql) !== TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS `options` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `question_id` int NOT NULL,
  `option` text NOT NULL,
  `answer` int NOT NULL,
  `instruction` text NULL,
  `order` int NULL
);";

if ($conn->query($sql) !== TRUE) {
  exit( "Error: " . $sql . "<br>" . $conn->error );
}

$questions = [
	[
		'question' => 'Prolonged strike action debilitated the
                       industry.',
		'subject_id' => 1,
		'instruction' => 'In each of questions 1 to 5, choose the
                        option opposite in meaning to the word or
                        phrase in italics.',
		'options' => array(
			array('option' => 'invigorated', 'answer' => 1, 'order' => 1),
			array('option' => 'isolated', 'answer' => 0, 'order' => 2),
			array('option' => 'weakened', 'answer' => 0, 'order' => 3),
			array('option' => 'destroyed', 'answer' => 0, 'order' => 4),
			
		)	
		
	],
	
	
	[
		'question' => 'I am optimistic about the interview though
      it was a mind-bending exercise',
		'subject_id' => 1,
		'instruction' => 'In each of questions 1 to 5, choose the
                        option opposite in meaning to the word or
                        phrase in italics.',
		'options' => array(
			array('option' => 'An enervating', 'answer' => 0, 'order' => 1),
			array('option' => 'A debilitating', 'answer' => 0, 'order' => 2),
			array('option' => 'A difficult', 'answer' => 0, 'order' => 3),
			array('option' => 'An easy', 'answer' => 1, 'order' => 4),
			
		)
	],
	
	
	[
		'question' => 'The trader was amused by the cut-throat
        rush for the goods',
		'subject_id' => 1,
		'instruction' => 'In each of questions 1 to 5, choose the
                        option opposite in meaning to the word or
                        phrase in italics.',
		'options' => array(
			array('option' => 'Worrisome', 'answer' => 0, 'order' => 1),
			array('option' => 'Strange', 'answer' => 0, 'order' => 2),
			array('option' => 'Lacklustre', 'answer' => 0, 'order' => 3),
			array('option' => 'Mad', 'answer' => 1, 'order' => 4),
			
		)
	],
	
	
	
	[
		'question' => 'The teacher said that Ali’s essay was full of
        many redundant details',
		'subject_id' => 1,
		'instruction' => 'In each of questions 1 to 5, choose the
                        option opposite in meaning to the word or
                        phrase in italics.',
		'options' => array(
			array('option' => 'Unexplained', 'answer' => 0, 'order' => 1),
			array('option' => 'Strange', 'answer' => 0, 'order' => 2),
			array('option' => 'Necessary', 'answer' => 1, 'order' => 3),
			array('option' => 'Useful', 'answer' => 0, 'order' => 4),
			
		)
	],
	
	
	
	[
		'question' => 'His father surmounted the myriad of
        obstacles on his way',
		'subject_id' => 1,
		'instruction' => 'In each of questions 1 to 5, choose the
                        option opposite in meaning to the word or
                        phrase in italics.',
		'options' => array(
			array('option' => 'Most', 'answer' => 0, 'order' => 1),
			array('option' => 'Few', 'answer' => 1, 'order' => 2),
			array('option' => 'All', 'answer' => 0, 'order' => 3),
			array('option' => 'Many', 'answer' => 0, 'order' => 4),
			
		)
	],
	
	
	
	[
		'question' => 'Though Mr. Iro is a new chairman, he views
    other members with jaundiced eye',
		'subject_id' => 1,
		'instruction' => 'In each of questions 6 to 10, select the
        option that best explains the information
        conveyed in the sentence. Each question
        carries 2 marks',
		'options' => array(
			array('option' => 'He takes a rather forceful position on dealing
    with his members', 'answer' => 0, 'order' => 1),
			array('option' => 'He takes an unfavourable position
    concerning his members', 'answer' => 1, 'order' => 2),
			array('option' => 'He takes a sickly view of his members', 'answer' => 0, 'order' => 3),
			array('option' => 'He takes a rather hazy view of his members', 'answer' => 0, 'order' => 4),
			
		)
	],
	
	
	
	[
		'question' => 'The witness said he had no axe to grind
    with his brothers',
		'subject_id' => 1,
		'instruction' => 'In each of questions 6 to 10, select the
        option that best explains the information
        conveyed in the sentence. Each question
        carries 2 marks',
		'options' => array(
			array('option' => 'He had no hatred for the brothers', 'answer' => 1, 'order' => 1),
			array('option' => 'He had no axe and therefore stole the
        matchet', 'answer' => 0, 'order' => 2),
			array('option' => 'He had no axe and therefore borrowed their
        matchet', 'answer' => 0, 'order' => 3),
			array('option' => 'He had no vested interest in the brothers', 'answer' => 0, 'order' => 4),
			
		)
	],
	
	
	
[
		'question' => 'The footballers moved with their tails
    between their legs',
		'subject_id' => 1,
		'instruction' => 'In each of questions 6 to 10, select the
        option that best explains the information
        conveyed in the sentence. Each question
        carries 2 marks',
		'options' => array(
			array('option' => 'they moved happily because they won the
    match', 'answer' => 0, 'order' => 1),
			array('option' => 'they were unhappy because they had
    been despised by their opponents', 'answer' => 0, 'order' => 2),
			array('option' => 'they were ashamed because they had been
    defeated', 'answer' => 1, 'order' => 3),
			array('option' => 'they moved with their tails between their
    legs', 'answer' => 0, 'order' => 4),
			
		)
	],	
	
	
	
	[
		'question' => 'The headmaster managed to talk his way
out of having to give a speech',
		'subject_id' => 1,
		'instruction' => 'In each of questions 6 to 10, select the
        option that best explains the information
        conveyed in the sentence. Each question
        carries 2 marks',
		'options' => array(
			array('option' => 'he delivered a speech despite the difficulty', 'answer' => 0, 'order' => 1),
			array('option' => 'he managed to give a speech out of a
    difficult situation', 'answer' => 0, 'order' => 2),
			array('option' => 'he managed to get himself out of a difficult
situation', 'answer' => 1, 'order' => 3),
			array('option' => 'he managed to talk on his way', 'answer' => 0, 'order' => 4),
			
		)
	],	
	
	[
		'question' => ' As regards the matter, we have crossed the
rubicon',
		'subject_id' => 1,
		'instruction' => 'In each of questions 6 to 10, select the
        option that best explains the information
        conveyed in the sentence. Each question
        carries 2 marks',
		'options' => array(
			array('option' => 'we are completely at a loss', 'answer' => 0, 'order' => 1),
			array('option' => 'we are irrevocably committed', 'answer' => 1, 'order' => 2),
			array('option' => 'we are already qualified', 'answer' => 0, 'order' => 3),
			array('option' => 'we are perfectly committed', 'answer' => 0, 'order' => 4),
			
		)
	],	
	
	
	[
		'question' => 'The legislative body of the United States of America is the ',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'Parliament', 'answer' => 0, 'order' => 1),
			array('option' => 'National Assembly', 'answer' => 0, 'order' => 2),
			array('option' => 'Congress', 'answer' => 1, 'order' => 3),
			array('option' => 'Council', 'answer' => 0, 'order' => 4),
		)
	],
	
	
	
	[
		'question' => 'The upper house in most federal systems is created to',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'ensure equality of federating units', 'answer' => 1, 'order' => 1),
			array('option' => 'prevent excesses of the executive', 'answer' => 0, 'order' => 2),
			array('option' => 'oversee and check the lower house', 'answer' => 0, 'order' => 3),
			array('option' => 'enable experienced elders
    make inputs to governance', 'answer' => 0, 'order' => 4),
		)
	],
	
	[
		'question' => 'In which of the following systems is the
    power of the component units more than
    that of the central government?',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'Monarchical', 'answer' => 0, 'order' => 1),
			array('option' => 'Federal', 'answer' => 0, 'order' => 2),
			array('option' => 'Unitary', 'answer' => 0, 'order' => 3),
			array('option' => 'Confederal', 'answer' => 1, 'order' => 4),
		)
	],
	
	
	[
		'question' => 'One of the general tenets of
    fascist doctrine is that the leader is',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'supreme relative to the constitution', 'answer' => 1, 'order' => 1),
			array('option' => 'weak relative to the constitution', 'answer' => 0, 'order' => 2),
			array('option' => 'subordinate to the laws of the state', 'answer' => 0, 'order' => 3),
			array('option' => 'subordinate to the norms of the
    society', 'answer' => 0, 'order' => 4),
		)
	],
	
	
	
	[
		'question' => 'In a cabinet system of government,
executive power is exercised by the',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'head of government', 'answer' => 1, 'order' => 1),
			array('option' => 'monarch', 'answer' => 0, 'order' => 2),
			array('option' => 'president', 'answer' => 0, 'order' => 3),
			array('option' => 'dominant party', 'answer' => 0, 'order' => 4),
		)
	],
	
	
	[
		'question' => 'The principle of separation of powers is
best practiced in the',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'presidential system', 'answer' => 1, 'order' => 1),
			array('option' => 'parliamentary system', 'answer' => 0, 'order' => 2),
			array('option' => 'monarchical system', 'answer' => 0, 'order' => 3),
			array('option' => 'feudal system', 'answer' => 0, 'order' => 4),
		)
	],
	
	
	
	[
		'question' => 'A typical form of delegated legislation is',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'an act', 'answer' => 0, 'order' => 1),
			array('option' => 'a bill', 'answer' => 0, 'order' => 2),
			array('option' => 'a decree', 'answer' => 0, 'order' => 3),
			array('option' => 'a bye-law', 'answer' => 1, 'order' => 4),
		)
	],
	
	
	
	[
		'question' => 'The rights of a citizen can be withdrawn
    by the state if the person',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'opposes the government violently', 'answer' => 0, 'order' => 1),
			array('option' => 'leaves the country permanently', 'answer' => 0, 'order' => 2),
			array('option' => 'is convicted of a serious crime', 'answer' => 1, 'order' => 3),
			array('option' => 'is pronounced dead', 'answer' => 0, 'order' => 4),
		)
	],
	
	
	[
		'question' => 'An electoral process in which candidates
are selected for elective offices by party
members is',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'primary election', 'answer' => 1, 'order' => 1),
			array('option' => 'electoral college', 'answer' => 0, 'order' => 2),
			array('option' => 'bye election', 'answer' => 0, 'order' => 3),
			array('option' => 'general election', 'answer' => 0, 'order' => 4),
		)
	],
	
	[
		'question' => 'In theory one major advantage of the
one-party system is that it –',
		'subject_id' => 2,
		'instruction' => '',
		'options' => array(
			array('option' => 'eliminates intra-party conflict', 'answer' => 0, 'order' => 1),
			array('option' => '. serves as an instrument of national
    integration', 'answer' => 1, 'order' => 2),
			array('option' => '. promotes greater mass
    participation in government', 'answer' => 0, 'order' => 3),
			array('option' => 'guarantees social justice', 'answer' => 0, 'order' => 4),
		)
	],
	
];


foreach($questions as $question) {
	$sql = "INSERT INTO questions (question, subject_id, instruction) VALUES ('" . $question['question'] . "', '" . $question['subject_id'] . "', '" . $question['instruction'] . "');";
	if ($conn->query($sql) !== TRUE) {
	  exit( "Error: " . $sql . "<br>" . $conn->error);
	}

	$question_id = $conn->insert_id;

	$options = $question['options'];
	if($options) {
		foreach($options as $option) {
			$qsql = "INSERT INTO options (`question_id`, `option`, `answer`, `order`) VALUES ('$question_id', '" . $option['option'] . "', '" . $option['answer'] . "', '" . $option['order'] . "');";
			if($conn->query($qsql) !== TRUE) {
				exit("Error: " . $conn->error);
			}
		}
	}


}

echo '<p>Done migrating questions!<br></p>';

$sql = "CREATE TABLE IF NOT EXISTS `exams` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `question_id` int NOT NULL,
  `option_id` int NOT NULL,
  `user_id` int NOT NULL,
  `attempt_id` int NOT NULL,
  `created_at` datetime NOT NULL
);";

if ($conn->query($sql) !== TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL, 
   email VARCHAR(255) NOT NULL, 
   password VARCHAR(255) NOT NULL, 
   phone VARCHAR(15) NULL, 
   gender VARCHAR(10) NULL, 
   created_at date NULL
);";

if ($conn->query($sql) !== TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS `attempts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `exam_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL
);";

if ($conn->query($sql) !== TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();