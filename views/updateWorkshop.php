<?php 
  session_start(); 
  $titleTag = '<title>Co_Lab | Update Workshop</title>';
  $workshopID = $_GET['workshopID']; //populate form fields //get from workshop list admin panel link->URL

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
        <h1>Co_lab.</h1><h2>Udate workshop details</h2>
      </div>

      <div class="griditemform">
            <?php include('../controller/workshopFormController.php'); ?> 
      </div>
    </div>

  </article>

  <?php include('elements/footer.php'); ?>

</body>
</html>