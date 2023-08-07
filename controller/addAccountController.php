<?php
//define vars as empty (starting point)
//ISSET function will recongnise "" as a string which is empty but SET,
$username = $password = $firstName = $lastName = $email = "";
//define errors as empty
$usernameErr = $passwordErr = $firstNameErr = $lastNameErr = $emailErr = "";

//conditionals //if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
//do nested conditionals to validate user input and alert user ELSE set variables ready for data processing

//empty() checks for any input
  if (empty($_POST["username"])) {
    $usernameErr = "<p>username is a required field</p>";
  } else {
    $username = ($_POST["username"]);
  }

  if (empty($_POST["password"])) {
    $passwordErr = "<p>password is a required field</p>";
  } //check if empty then check string length (minimum 8 characters)
  elseif (strlen($_POST["password"]) < 8) {
    $passwordErr = "<p>password is too short</p>";
  } else {
    $password = ($_POST["password"]);
  }

  if (empty($_POST["firstName"])) {
    $firstNameErr = "<p>f Name is a required field</p>";
  } else {
    $firstName = ($_POST["firstName"]);
  }
  if (empty($_POST["lastName"])) {
    $lastNameErr = "<p>l Name is a required field</p>";
  } else {
    $lastName = ($_POST["lastName"]);
  }
//filter_var calls a filter - FILTER_VALIDATE_EMAIL is filter parameter to check data format
  if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $emailErr = "<p>Please enter a valid email address</p>";
  } else {
    $email = ($_POST["email"]);
  }
}



// if all variables exist (validated) and not an empty string (as set line 16) write record to database
// if isset($_POST['username'] VS isset($username) the variable is already set )
if($username != '' &&  $password != '' && $firstName != '' && $lastName !='' && $email != ''){

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  //more secure method
  //call the function containing the prepared statement with named perameters
    $data = add_user($username, $hashed_password, $firstName, $lastName, $email);
  //nested conditional statement when the record been added
    if($data){
      // if written successfully do;
    echo "<p><b>The following records were added!</b></p>";
    echo "<p>Username - " . $username . "</p>";
    echo "<p>pass - " . $password . "</p>";
    echo "<p>Fname - " . $firstName . "</p>";
    echo "<p>Lname - " . $lastName . "</p>";
    echo "<p>E-mail - " . $email . "</p>";
  // when the correct row has failed to be added
    } else {
    echo "error adding user to table";
}

}
?>
