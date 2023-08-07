<?php

session_start();

if(!isset($_SESSION['loggedin'])){
  header('location:login.php');
exit();
}

require ('../model/model.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Co_Lab | Add a Workshop</title>


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

    <div id="gridheader"><h1>Co_lab.</h1><h2>Create a new workshop</h2></div>

    <div class="sessiondetails">

      <?php if(isset($_SESSION['loggedin'])) {
        echo '<h3>G\'day ' . $_SESSION['username'] . '</h3>';
        echo 'you are currently logged in';
      }
      ?>

    </div>

    <div class="griditemform">

 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php

require ('../controller/workshopAddController.php'); //call script to process inputs, errors etc

?>
       <label>Title :</label>
       <input type="text" id="workshopTitle" name="workshopTitle" value="<?php if (isset($workshopTitle)){ echo $workshopTitle; } ?>" />
       <span class="error"> * <?php echo $workshopTitleErr; ?></span>

       <label>Description :</label>
       <textarea id="workshopDescription" name="workshopDescription" cols="48" rows="12"><?php if (isset($workshopDescription)){ echo $workshopDescription; } ?></textarea>
       <span class="error"> *<?php echo $workshopDescriptionErr; ?></span>

       <label>Image filename :</label>
       <input type="text" id="workshopImage" name="workshopImage" value="<?php if (isset($workshopImage)){ echo $workshopImage; } ?>" />

       <label>Timeslot :</label>
       <input type="text" id="workshopTimetable" name="workshopTimetable" value="<?php if (isset($workshopTimetable)){ echo $workshopTimetable; } ?>"/>

       <label>Ticket price :</label>
       <input type="text" id="workshopCost" name="workshopCost" value="<?php if (isset($workshopCost)){ echo $workshopCost; } ?>" />
       <span class="error"> *<?php echo $workshopCostErr; ?></span>

       <label>Choose a host:</label>

       <select name='hostID'>

         <?php

         global $pdo;
         $sql = 'SELECT * FROM co_lab.host ORDER BY host.hostID';//query
         $result = $pdo->query($sql); //execute

         foreach($result as $row): //display results, for each loop - $row is key value
         echo '<option value="' . $row['hostID'] . '" > ' . $row['hostName'] . '</option>';
         //echo"<pre>";
         //print_r( $row );
         endforeach;

         ?>

       </select>


<!-- create a drop-down list populated by the categories/venues stored in the database -->
        <label>Venue options :</label>

        <select id="venueID" name="venueID">

        <?php

        global $pdo;
        $sql = 'SELECT * FROM co_lab.venue ORDER BY venue.venueID';//query
        $result = $pdo->query($sql);//execute

        foreach($result as $row): //display results, for each loop - $row is key value
        echo '<option value="' . $row['venueID'] . '" > ' . $row['venueTitle'] . '</option>';
        endforeach;

        ?>

        </select>

<br>
<button type="submit" > Add workshop </button>
<br>
 </form>

  </div>
</div>
</article>


<?php include('footer.php'); ?>

    </body>
    </html>
