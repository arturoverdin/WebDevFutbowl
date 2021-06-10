<?php
	session_start(); // finds all the session
	session_destroy(); //clears all existing sessions, all of our logging info
	header("Location: login.php");
?>