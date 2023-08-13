<?php 

//-------------------------REFACTOR?

const USERNAME_REQUIRED = "Username is a required field";
const PASSWORD_REQUIRED = "Password is a required field";

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

if(empty($_POST['username'])){
    $errors['username'] = USERNAME_REQUIRED;
  }
if(empty($_POST['password'])){
    $errors['password'] = PASSWORD_REQUIRED;
}

//----------------------------------
    // ÷prepared PDO statement, data is sent with placeholder '?'
    // conditional (if records exist continue ELSE echo 'username was not found')
    // if($sql = $pdo->prepare("SELECT userID, password, username FROM user WHERE username = ?")){
    //   //execute the query & send data seperate to the query as a safety measure
    //   $sql->execute([$_POST['username']]);
    //   //fetch the row from the table to check against
    //   $userRecord = $sql->fetch();
  
    //   //conditional, if POST username matches DB result check PW else ''no user found
    //   if($_POST['username'] == $userRecord['username']){
  
    //     // if data has been fetched correctly && passwords match using password_verify() function
    //     //passswword_verify ONLY works on hashed passwords
    //     if (password_verify($_POST['password'], $userRecord['password'])){
    //       // Verification success! User has loggedin!
    //       // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
    //       session_regenerate_id();
    //       $_SESSION['loggedin'] = TRUE; // use to validate user is logged in
    //       $_SESSION['username'] = $_POST['username'];
    //       $_SESSION['userID'] = $userRecord['userID'];
    //       // echo 'Welcome ' . $_SESSION['username'] . '!';
    //       header('Location: ../views/home.php');
    //       // print_r($userRecord);
    //     } else { $errors['password'] = "a valid password is required"; } // password varification

    //   }  else { $errors['username'] = "no user found"; } // username varification

	  // }



?>