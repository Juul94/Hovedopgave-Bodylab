<?php
	require('config/db.php'); 
	include('inc/notloggedin.php');

	if(isset($_SESSION['loggedin']) == true) {
		
		if(isset($_POST['val'])) {
			$query = 'update users set calender_nr='.$_POST['val'].' where id = '.$_SESSION['id'];
			mysqli_query($conn, $query);
		}
		
	}

?>