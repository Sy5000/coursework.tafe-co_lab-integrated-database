<?php
require '../model/pdo.php';
//call the required function file to update product table
include '../model/model.php';
//fetch new values that user has entered into the update form // assign to $vars
//sanitise the data with test_input() function
$workshopID = test_input($_POST['workshopID']);
$workshopTitle = test_input($_POST['workshopTitle']);
$workshopDescription = test_input($_POST['workshopDescription']);
$workshopTimetable = test_input($_POST['workshopTimetable']);
$workshopImage = test_input($_POST['workshopImage']);
$workshopCost = test_input($_POST['workshopCost']);
$hostID = test_input($_POST['hostID']);
$venueID = test_input($_POST['venueID']);

//simple update method (working)
//query to update a product in the database
  // $query = "UPDATE product SET cupcakeTitle = '$cupcakeTitle', cupcakeDescript = '$cupcakeDescript', cupcakePrice = '$cupcakePrice', catID = '$catID' WHERE cupcakeID = $cupcakeID";
//execute the query
  //$data = $pdo->exec($query);
//conditional statement to return results
     //if($data){ }else{ }

//more secure method
//call the function containing the prepared statement with named perameters
$data = update_workshop($workshopID, $workshopTitle, $workshopDescription, $workshopTimetable, $workshopImage, $workshopCost, $hostID, $venueID);
//conditional statement when the correct row has been updated
if($data){

	echo "<p><b>The following records were updated!</b></p>";
  echo "<p>wsID :" . $workshopID . "</p>";
	echo "<p>Title :" . $workshopTitle . "</p>";
	echo "<p>Description :" .  $workshopDescription . "</p>";
  	echo "<p>Timeslot :" .  $workshopTimetable . "</p>";
    	echo "<p>Image :" .  $workshopImage . "</p>";
	echo "<p>Price :" . $workshopCost . "</p>";
	echo "<p>host - " . $hostID . "</p>";
	echo "<p>venue" . $venueID. "</p>";
// when the correct row has failed to update
} else {
	echo "error";
}

echo'<a href="../view/home.php">home</a>';

?>
