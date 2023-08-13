<?php

//DB connection
require('pdo.php');

// all database interactions should be done in MODEL
//custom functions

// //test user input on forms
// function test_input($data) {
// 	$data = trim($data);
// 	$data = stripslashes($data); //obsolete
// 	$data = htmlspecialchars($data); //for output 
// return $data;
// }

//get venue - workshop sub nav menu
function get_venue_items() {
	global $pdo;
	$sql = 'SELECT * FROM co_Lab.venue';
	$result = $pdo->query($sql);

	foreach($result as $row): //extract records as single array, extract cols using 'string' index value
		echo "<ul>";
		echo '<li><a href="workshopsByVenue.php?venueID=' .$row['venueID'] . ' " > ' . $row['venueTitle'] . ' </a></li>';//pass venue ID via URL when link is clicked
		echo "</ul>";
	endforeach;
}

// get workshop - update workshop form
function get_workshop_item($workshopID){
	global $pdo;
	$sql = 'SELECT * FROM co_lab.workshop WHERE workshop.workshopID = ' . $workshopID;
	//execute query
	$result = $pdo->query($sql);
	return $result;
}

// get host options - workshop form dropdown menu  
function select_host($selectedHost, $hostID){        
	global $pdo;
	$sql = 'SELECT * FROM co_lab.host ORDER BY host.hostID'; // query
	$result = $pdo->query($sql); // execute

	foreach($result as $row): //display results, for each loop - $row is key value
	  
	  $selAttr = ($selectedHost || $hostID === $row['hostID']) ? 'selected' : ''; // auto populate & maintain state 
	  
	  echo '<option ' . $selAttr .  ' value="' . $row['hostID'] . '" > ' . $row['hostName'] . '</option>'; // table row
	  
	endforeach; 
	
}

// get venue options - workshop form dropdown menu 
function select_venue($selectedVenue, $venueID){
	global $pdo;
	$sql = 'SELECT * FROM co_lab.venue ORDER BY venue.venueID';
	$result = $pdo->query($sql); 

	foreach($result as $row): 
	  
	  $selAttr = ($selectedVenue || $venueID === $row['venueID']) ? 'selected' : '';

	  echo '<option ' . $selAttr . ' value="' . $row['venueID'] . '" > ' . $row['venueTitle'] . '</option>';
	  
	endforeach;
}


//get workshops - homepage list/unsorted workshop list
function get_workshop_items() {
	global $pdo;
	$sql = 'SELECT workshopID, workshopTitle, workshopDescription, workshopImage, workshopTimetable, workshopCost, hostID, workshop.venueID,  venue.venueTitle
	FROM workshop
	LEFT JOIN venue
	ON workshop.venueID=venue.venueID;';//left join for venue title data

	//execute query
	$result = $pdo->query($sql);
	return $result;
}

//get workshops / sort by venue or display all
function get_workshop_items_by_venue($venueID) {
	global $pdo;
	//$sql = 'SELECT * FROM co_lab.workshop WHERE workshop.venueID = ' . $venueID;
	$sql = 'SELECT workshopID, workshopTitle, workshopDescription, workshopImage, workshopTimetable, workshopCost, hostID, workshop.venueID,  venue.venueTitle
	FROM workshop
	LEFT JOIN venue
	ON workshop.venueID=venue.venueID
	WHERE workshop.venueID =' . $venueID; //left join for venue title
	
	//execute query
	$result = $pdo->query($sql);
	return $result;

}

// update workshop table (prepared)
function update_workshop($workshopID, $workshopTitle, $workshopDescription, $workshopTimetable, $workshopImage, $workshopCost, $hostID, $venueID)
{
	global $pdo;
	$sql = "UPDATE co_lab.workshop SET workshopTitle = '$workshopTitle', workshopDescription = '$workshopDescription', workshopTimetable = '$workshopTimetable', workshopImage = '$workshopImage', workshopCost = '$workshopCost', hostID = '$hostID', venueID = ' $venueID' WHERE workshop.workshopID = $workshopID";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':workshopID', $workshopID);
	$statement->bindValue(':workshopTitle', $workshopTitle);
	$statement->bindValue(':workshopDescription', $workshopDescription);
	$statement->bindValue(':workshopTimetable', $workshopTimetable);
	$statement->bindValue(':workshopImage', $workshopImage);
	$statement->bindValue(':workshopCost', $workshopCost);
	$statement->bindValue(':hostID', $hostID);
	$statement->bindValue(':venueID', $venueID);
	$result = $statement->execute();
	$statement->closeCursor();
	return $result;
}

//new workshop function (prepared)
function add_workshop( $workshopTitle, $workshopDescription,  $workshopImage, $workshopTimetable, $workshopCost, $hostID, $venueID)
{
	global $pdo;
	$sql = "INSERT INTO workshop ( workshopTitle, workshopDescription,  workshopImage, workshopTimetable, workshopCost, hostID, venueID)
  	VALUES ('$workshopTitle', '$workshopDescription',   '$workshopImage', '$workshopTimetable', '$workshopCost', '$hostID', '$venueID');";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':workshopTitle', $workshopTitle);
	$statement->bindValue(':workshopDescription', $workshopDescription);
	$statement->bindValue(':workshopImage', $workshopImage);
  	$statement->bindValue(':workshopTimetable', $workshopTimetable);
	$statement->bindValue(':workshopCost', $workshopCost);
	$statement->bindValue(':hostID', $hostID);
	$statement->bindValue(':venueID', $venueID);
	$result = $statement->execute();
	$statement->closeCursor();
	return $result;
}

//remove workshop function (prepared)
function delete_workshop($workshopID)
{
  global $pdo;
  $sql = "DELETE FROM workshop WHERE workshopID = '$workshopID'; ";
  $statement = $pdo->prepare($sql);
  $result = $statement->execute();
  $statement->closeCursor();
  return $result;
}

//new user function (prepared)
function add_user($username, $hashed_password, $firstName, $lastName, $email)
{
  global $pdo;
  $sql = "INSERT INTO user (username, password, firstName, lastName, email) VALUES ('$username','$hashed_password', '$firstName', '$lastName', '$email' )";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(':username', $username);
  $statement->bindValue(':password', $hashed_password);
  $statement->bindValue(':firstName', $firstName);
  $statement->bindValue(':lastName', $lastName);
  $statement->bindValue(':email', $email);
  $result = $statement->execute();
  $statement->closeCursor();
  return $result;
}
?>
