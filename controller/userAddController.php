<?php

$errors = [];
// $inputs = [];    

$request_method = strtoupper($_SERVER["REQUEST_METHOD"]); //uppercase
$username = $password = $firstName = $lastName = $email = ''; //empty when page visit/refresh

if ($request_method === 'GET') {
    // show the form
    require('../views/forms/userAddForm.php'); //View
}

if ($request_method === 'POST') {
    // handle the form submission
    require('../model/userAddProcess.php'); //Model
    
    // show the form if the error exists
    if (count($errors) > 0) {
    require('../views/forms/userAddForm.php'); //View
    }
    // process if no errors exist
    if(count($errors) === 0){ 

        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // PASSWORD_DEFAULT = bcrypt 

        $newUser = add_user($username, $hashed_password, $firstName, $lastName, $email); //Model

        // 
        if($newUser){
            // --------------------

            // 1.script to login here as user ID will be needed for a session use $data to fetch db
            // function get_user() {

            // }
            // function login() {

            // }
            // header('Location: ../views/home.php');
            
            // 2.once logged in redirect
            // 3.feedback for user (account info) 

            // ---------------------
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE; // use to validate user is logged in
            $_SESSION['username'] = $_POST['username'];
            // $_SESSION['userID'] = $userRecord['userID'];
            header('Location: ../views/home.php');
            
            // echo "<p><b>The following records were added!</b></p>";
            // echo "<p>Username - " . $username . "</p>";
            // echo "<p>pass - " . $password . "</p>";
            // echo "<p>Fname - " . $firstName . "</p>";
            // echo "<p>Lname - " . $lastName . "</p>";
            // echo "<p>E-mail - " . $email . "</p>";
        
        } else {
            echo "error adding user to table";
        }
    }
}
// ?>