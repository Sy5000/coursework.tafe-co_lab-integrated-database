<?php 
  session_start(); 
  $titleTag = '<title>Co_Lab | Sign-up</title>';
?>

<?php include('elements/header.php'); ?>

<body>

  <?php include('elements/navigation.php'); ?>

  <article class="flex center">

    <div class="gridcontainer">

      <div class="griditem3 subnav">
        <?php get_venue_items(); ?>
      </div>

      <div id="gridheader">
        <h1>Co_lab.</h1><h3>Create an account</h3>
      </div>

      <?php require ('../controller/userAddController.php'); //logic script ?>

    </div>

  </article>

  <br>
  <br>

  <?php include('elements/footer.php'); ?>

</body>
</html>