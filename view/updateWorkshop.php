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
        <title>Co_Lab | Update Workshop</title>


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

    <div id="gridheader"><h1>Co_lab.</h1><h2>Udate workshop details</h2></div>

    <?php  ?>

    <div class="griditemform">

 <form method="post" action="../controller/workshopUpdateController.php"> <!-- externally process logic, form needs to maintain state passed from previous link -->
<?php

  $workshopID = $_GET['workshopID']; //set var pulled from sub nav link

  if(isset($workshopID)){// use var to identify venue record to update

  global $pdo;
  $sql = 'SELECT * FROM co_lab.workshop WHERE workshop.workshopID = ' . $workshopID;
  //execute query
  $result = $pdo->query($sql);
  //display results, for each loop
  foreach($result as $row): //pull results as a array_key stored in variable $row

?>

        <input type="hidden" id="workshopID" name="workshopID" value=" <?php echo $workshopID; ?> ">

       <label>Title :</label>
       <input type="text" id="workshopTitle" name="workshopTitle" value="<?php echo $row['workshopTitle']; ?>" />

       <label>Description :</label>
       <textarea id="workshopDescription" name="workshopDescription" value="" cols="48" rows="12"/><?php echo $row['workshopDescription']; ?></textarea>

       <label>Image filename:</label>
       <input type="text" id="workshopImage" name="workshopImage" value="<?php echo $row['workshopImage']; ?>" />

       <label>Timeslot :</label>
       <input type="text" id="workshopTimetable" name="workshopTimetable" value="<?php echo $row['workshopTimetable']; ?>"/>

       <label>Ticket price :</label>
       <input type="text" id="workshopCost" name="workshopCost" value="<?php echo $row['workshopCost']; ?>" />

       <label>Choose a host:</label>

       <select name='hostID'>

         <?php

         global $pdo;
         $sql = 'SELECT * FROM co_lab.host ORDER BY host.hostID';//query
         $result = $pdo->query($sql);//execute

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

<?php endforeach; } else { echo "error"; } //end fetch records to update ?>
<br>
<button type="submit" > update </button>
<br>
 </form>

  </div>

</article>


<?php include('footer.php'); ?>

    </body>
    </html>
