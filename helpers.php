<?php
require('model/pdo.php');

function session_validate() {
	
	if(!isset($_SESSION['loggedin'])){
		header('location:login.php'); //redirect
		exit();  
	}

}

function home_admin_greeting() {
	if(isset($_SESSION['loggedin'])) {
		echo '<h3>G\'day ' . $_SESSION['username'] . '</h3>';
		echo 'you are currently logged in';
	  }
}

function maintain_state($var) {
	if(isset($var)){
	  echo $var;
	} else 
	return;
}

?>