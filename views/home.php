<?php 
  session_start(); 
  $titleTag = '<title>Co_Lab | Homepage</title>';
?>

<?php include('elements/header.php'); ?>

<body>

  <?php include('elements/navigation.php'); ?>

  <article class="flex center">

    <div class="gridcontainer">
      <div id="gridheader">
        <h1>Co_lab.</h1><h2>Regular community workshops.</h2>
      </div>
      
      <div class="sessiondetails">

        <?php home_admin_greeting() ?>

      </div>

      <div class="fullpage">
        HomePage. <p>Content under development</p>
      </div>

    </div>

  </article>

  <?php include('elements/footer.php'); ?>

</body>
</html>
