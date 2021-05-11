<?php
	session_start();
		unset($_SESSION['error']);
			unset($_SESSION['admin']);
	session_destroy();
	

	header('location: index.php');
?>