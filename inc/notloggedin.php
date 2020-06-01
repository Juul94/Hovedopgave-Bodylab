<?php

	session_start();

	// IF NOT LOGGED IN: THEY WILL NOT GET THROUGH
	if(!isset($_SESSION['loggedin'])) {
		header('Location: login.php');
	}
?>