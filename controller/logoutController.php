<?php

	//start session management
	session_start();
	//destroy the user session
	session_destroy();
	//redirect to the login page after logout
	header("location:../views/login.php");

?>
