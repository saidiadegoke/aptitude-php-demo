<?php

include('authenticated.php');

$_SESSION['exam'] = null;
$_SESSION['questionIndex'] = null;
$_SESSION['answers'] = [];

$content = 'includes/done-page.php';

include('layout.php');

?>
