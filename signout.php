<?php require('config/db.php'); ?>
<?php include('inc/header.php'); ?>

<?php
	session_start();
	session_destroy();
	header("location: login.php");
?>
	
<?php include('inc/footer.php'); ?>