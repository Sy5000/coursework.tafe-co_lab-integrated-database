<?php

//Consists of the PHP files that represent the data of an application. For example,
//the file that establishes a connection to the database and any other files that work with the database, such as files to store functions.

//DB connection
require('pdo.php');

// all database interactions should be done in MODEL
//custom functions

//test user input on forms
function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
}
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

//get workshops - homepage list/unsorted workshop list
function get_workshop_items() {

		global $pdo;
		$sql = 'SELECT workshopID, workshopTitle, workshopDescription, workshopImage, workshopTimetable, workshopCost, hostID, workshop.venueID,  venue.venueTitle
            FROM workshop
            LEFT JOIN venue
            ON workshop.venueID=venue.venueID;';//left join for venue title data

		//execute query
		$result = $pdo->query($sql);
		//display results, for each loop
		foreach($result as $row): //pull results as a array_key stored in variable $row


    echo '<input type="hidden" value=" ' . $row['venueID'] . ' ">';
		echo '<div class="griditem1"><p class="price"> $' . $row['workshopCost'] . '</p> <p>Venue: ' . $row['venueTitle'] . '</p><br>
    <p style="border:solid 1px black;padding:2px;font-weight:200;">' . $row['workshopTimetable'] . '</p></div>';
		echo '<div class="griditem2"><h3>' . $row['workshopTitle'] . '</h3><p>' . $row['workshopDescription'] . '</p></div>';
		echo '<div class="griditem3"><img alt = "' . $row['workshopImage'] . '" src="../view/images/' . $row['workshopImage'] . ' " /></div>';

      if(isset($_SESSION['loggedin'])) { //only show edit/delete links to logged in users

		echo '<div class="griditem4"><a href="updateworkshop.php?workshopID=' . $row['workshopID'] . ' " >update</a>
      | <a href="deleteWorkshop.php?workshopID=' . $row['workshopID'] . ' ">delete</a></div>';

      }
    echo '<div class="border"> </div>';
    //echo"<pre>";
		//print_r( $row );
		endforeach;
}

//get workshops / sort by venue or display all
function get_workshop_items_by_venue() {

		$venueID = $_GET['venueID']; //set var if venue sub nav link is clicked

		if(isset($venueID)){// if var is set sort by venue

		global $pdo;
		//$sql = 'SELECT * FROM co_lab.workshop WHERE workshop.venueID = ' . $venueID;
    $sql = 'SELECT workshopID, workshopTitle, workshopDescription, workshopImage, workshopTimetable, workshopCost, hostID, workshop.venueID,  venue.venueTitle
            FROM workshop
            LEFT JOIN venue
            ON workshop.venueID=venue.venueID
            WHERE workshop.venueID =' . $venueID; //left join for venue title
		//execute query
		$result = $pdo->query($sql);
		//display results, for each loop

    foreach($result as $row): //pull results as a array_key stored in variable $row
		echo '<div class="griditem1"><p class="price"> $' . $row['workshopCost'] . '</p><p>Venue: ' . $row['venueTitle'] . '</p><br><p style="border:solid 1px black;padding:2px;font-weight:200;">' . $row['workshopTimetable'] . '</p></div>';
		echo '<div class="griditem2"><p><h3>' . $row['workshopTitle'] . '</h3></p><p>' . $row['workshopDescription'] . '</p></div>';
		echo '<div class="griditem3"><img alt="' . $row['workshopImage'] . '" src="../view/images/' . $row['workshopImage'] . ' " /></div>';

      if(isset($_SESSION['loggedin'])) { //only show edit/delete links to logged in users

		echo '<div class="griditem4"><a href="updateworkshop.php?workshopID=' . $row['workshopID'] . ' " >update</a> | <a href="deleteWorkshop.php?workshopID=' . $row['workshopID'] . ' ">delete</a></div>';

      }
    echo "<br>";
    endforeach;

		} else { // else show unsorted list

		get_workshop_items();

		}
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
function insert_workshop( $workshopTitle, $workshopDescription,  $workshopImage, $workshopTimetable, $workshopCost, $hostID, $venueID)
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



//tutorials //not prepared //not used within this site (for future reference)

function select_products() {
        global $pdo;
        $sql = 'SELECT * FROM product';
        $result = $pdo->query($sql);
        return $result;
    }

//$result = select_products();  //call function

function delete_product($productID){
       global $pdo;
       $sql = 'DELETE FROM product WHERE productID = ‘$productID’';
       $result = $pdo->exec($sql);
       return $result;
   }

//$result = delete_product($productID); //call function

function insert_product($productName, $productDescription, $productPrice, $categoryID){
       global $pdo;
       $sql = 'INSERT INTO product (productName, productDescription, productPrice, categoryID) VALUES (‘$productName’, ‘$productDescription’, ‘$productPrice’, ‘$categoryID’)';
       $result = $pdo->exec($sql);
       return $result;
   }

//$result = insert_product($productName, $productDescription, $productPrice, $categoryID); //call function

?>
