<?php
require ('../model/model.php');
?>
<?php

session_start();

require ('../model/model.php');

if(!isset($_SESSION['loggedin'])){

header('location:login.php');
exit();

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Co_Lab | Add a workshop</title>


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

    <div id="gridheader"><h1>Co_lab.</h1><h2>remove workshop</h2></div>

    <div class="griditemform">

 <form method="post" action="../controller/workshopDeleteController.php">
<?php

$workshopID = $_GET['workshopID'];

if(isset($workshopID)){

$sql = 'SELECT * FROM co_lab.workshop WHERE workshop.workshopID = ' . $workshopID;
foreach ($pdo->query($sql) as $result) {
// target DB col and echo out result
  echo "<b>" . $result['workshopTitle'] . " - " . $result['workshopID'] . "</b>";

    }

}
?>

<input type="hidden" id="workshopID" name="workshopID" value="<?php echo $result['workshopID']; ?>"/ >

<p>would you like to remove '<?php echo $result['workshopTitle']; ?>  ' from the databse</p>


<button type="submit" > remove workshop </button>
</form>

  </div>

</article>

<?php include('footer.php'); ?>

    </body>
    </html>
