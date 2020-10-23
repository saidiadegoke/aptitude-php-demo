<?php

//check login page
session_start();

if(!$_SESSION['loggedIn'] || $_SESSION['loggedIn'] != 'yes') {
	header('Location: login.php');
}

$user = $_SESSION['user'];

if(!$user) {
	header('Location: login.php');
}