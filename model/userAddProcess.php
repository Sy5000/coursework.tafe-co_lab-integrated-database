<?php 
const USERNAME_REQUIRED = 'Username is a required field';
const FIRST_NAME_REQUIRED = 'First Name is a required field';
const LAST_NAME_REQUIRED = 'Last Name is a required field';
Const PASSWORD_REQUIRED = 'Password is a required field';
Const PASSWORD_INVALID = 'Please enter a valid password > 8 characters';
Const EMAIL_REQUIRED = 'Email address is a required field';
Const EMAIL_INVALID = 'Please enter a valid email address';

// sanitize
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$firstName = htmlspecialchars($_POST["firstName"]);
$lastName = htmlspecialchars($_POST['lastName']);
$email = htmlspecialchars($_POST['email']);

    //validate
    if(empty($username)){ 
        $errors['username'] = USERNAME_REQUIRED; 
    }

    if(strlen($password) < 8) {
        $errors['password'] = (empty($password)) ? PASSWORD_REQUIRED : PASSWORD_INVALID;
    }

    if(empty($firstName)){ 
        $errors['firstName'] = FIRST_NAME_REQUIRED;
    }

    if(empty($lastName)){ 
        $errors['lastName'] = LAST_NAME_REQUIRED;
    }

    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = (empty($email)) ? EMAIL_REQUIRED : EMAIL_INVALID;
    }

?>