<?php
session_start();

require ('../model/model.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Co_Lab | Workshops</title>


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

    <div id="gridheader"><h1>Co_lab.</h1><h3>Our upcoming events</h3></div>
    <div class="sessiondetails">

      <?php if(isset($_SESSION['loggedin'])) {
        echo '<h2>G\'day ' . $_SESSION['username'] . '</h2>';
        echo 'you are currently logged in';
      }
      ?>

    </div>

    <?php get_workshop_items(); ?>

  </div>


</article>

  <?php include('footer.php'); ?>

    </body>
    </html>
