<?php

session_start();

require ('../model/model.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Co_Lab | Signup</title>


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

    <div id="gridheader"><h1>Co_lab.</h1><h3>Create an account</h3></div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<?php

require ('../controller/addAccountController.php');

?>

  <h3>Create an account</h3>

      <label>Username *</label>
      <input type="text" id="username" name="username" value="<?php if(isset($username)){echo $username;} // maintain state on page refresh / submit ?>"  />
      <span class="error"><?php echo $usernameErr; ?></span>

      <label>Password *</label>
      <input type="text" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>"  />
      <span class="error"><?php echo $passwordErr; ?></span>

      <label>First Name *</label>
      <input type="text" id="firstName" name="firstName" value="<?php if(isset($firstName)){echo $firstName;} ?>" />
      <span class="error"><?php echo $firstNameErr; ?></span>

      <label>Last Name *</label>
      <input type="text" id="lastName" name="lastName" value="<?php if(isset($lastName)){echo $lastName;} ?>" />
      <span class="error"><?php echo $lastNameErr; ?></span>

      <label>e-mail address *</label>
      <input type="text" id="email" name="email" value="<?php if(isset($email)){echo $email;} ?>"/>
      <span class="error"><?php echo $emailErr; ?></span>

      <p>please visit the <a href="../view/login.php">login</a> page if you already have an account </p>

      <p><input type="submit" name="submit" value="submit" /></p>


    </form>

    </div>

</article>

<br>
<br>

<?php include('footer.php'); ?>

    </body>
    </html>
