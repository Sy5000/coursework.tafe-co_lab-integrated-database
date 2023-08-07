<?php
session_start();

require ('../model/model.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Co_Lab | Login</title>

        <!-- link to CSS -->
        <link rel="stylesheet" href="css/reset.css"><!--disable browser styling-->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

<?php include('header.php');  ?>

<?php include('navigation.php'); ?>

<article class="flex center">

  <div class="gridcontainer">

    <div class="griditem3">

      <?php get_venue_items(); ?>

    </div>

    <div id="gridheader"><h1>Co_lab.</h1><h3>Login</h3></div>



    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<?php

require ('../controller/loginController.php'); //call logic to check user input against records

?>

  <h3>Login.</h3>

      <label>Username *</label>
      <input type="text" id="username" name="username" value="<?php if(isset($username)){echo $username;} // maintain state on page refresh / submit ?>"  />
      <span class="error"><?php echo $usernameErr; ?></span>

      <label>Password *</label>
      <input type="text" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>"  />
      <span class="error"><?php echo $passwordErr; ?></span>

      <p>please visit the <a href="../view/createAccount.php">login</a> page if you already have an account </p>

      <p><input type="submit" name="submit" value="submit" /></p>


    </form>

    </div>

</article>

<br>
<br>

<?php include('footer.php'); ?>

    </body>
    </html>
