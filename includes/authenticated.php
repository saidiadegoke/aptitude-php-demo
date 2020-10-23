<?php

//check login page
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

if(!$_SESSION['loggedIn'] || $_SESSION['loggedIn'] != 'yes') {
	header('Location: login.php');
}

$user = $_SESSION['user'];

if(!$user) {
	header('Location: login.php');
}