<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Co_Lab | Homepage</title>

        <!-- link to CSS -->
        <link rel="stylesheet" href="css/reset.css"><!--disable browser styling-->
        <link rel="stylesheet" href="css/style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,500;1,700&display=swap" rel="stylesheet">



    </head>

    <body>

<?php include('header.php');  ?>

<?php include('navigation.php'); ?>


<article class="flex center">

  <div class="gridcontainer">
    <div id="gridheader"><h1>Co_lab.</h1><h2>Regular community workshops.</h2></div>
    <div class="sessiondetails">

      <?php if(isset($_SESSION['loggedin'])) {
        echo '<h3>G\'day ' . $_SESSION['username'] . '</h3>';
        echo 'you are currently logged in';
      }
      ?>

    </div>

    <div class="fullpage">HomePage. <p>Content under development</p></div>

  </div>

</article>

<?php include('footer.php'); ?>
     </body>

    </html>
