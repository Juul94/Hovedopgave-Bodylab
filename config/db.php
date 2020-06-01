<?php

	ob_start();

	/*	$conn = mysqli_connect('alexanderjs.one.mysql', 'alexanderjs_onebodylab', 'alex1994', 'alexanderjs_onebodylab');	*/
	$conn = mysqli_connect('localhost', 'root', '', 'bodylab');

	if(mysqli_connect_errno()) {
		echo 'Failed to connect to MySQL ' . mysqli_connect_errno();
	}

?>