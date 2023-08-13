<?php 
  session_start(); 
  $titleTag = '<title>Co_Lab | Add a Workshop</title>';
  
  include('elements/header.php');
  session_validate();
?>

<body>

  <?php include('elements/navigation.php'); ?>

  <article class="flex center">

    <div class="gridcontainer">

      <div class="griditem3 subnav">
        <?php get_venue_items(); ?>
      </div>

      <div id="gridheader">
        <h1>Co_lab.</h1><h2>Create a new workshop</h2>
      </div>

      <div class="sessiondetails">

        <?php home_admin_greeting(); ?>

      </div>

      <div class="griditemform">

        <?php require('../controller/workshopFormController.php'); ?> 

      </div>
    </div>
  </article>

  <?php include('elements/footer.php'); ?>

</body>
</html>
