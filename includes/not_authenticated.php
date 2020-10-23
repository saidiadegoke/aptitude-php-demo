<?php

//check login page
session_start();

if($_SESSION['loggedIn'] && $_SESSION['loggedIn'] == 'yes') {
	header('Location: dashboard.php');
}
