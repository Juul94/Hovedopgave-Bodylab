<?php

	session_start();

	// IF LOGGED IN: THEY WILL GET THROUGH
	if(isset($_SESSION['loggedin'])) {
		header('Location: index.php');
	}
?>