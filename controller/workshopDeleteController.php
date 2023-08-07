<?php
require '../model/pdo.php';
//call the required function file to update product table
include '../model/model.php';
//
$workshopID = $_POST['workshopID'];

//simple update method (working)
//query to delete product from dtabase
  //$query = "DELETE FROM product WHERE cupcakeID = '$cupcakeID'; ";
//execute the query
  //$data = $pdo->exec($query);
//conditional statement to return results
     //if($data){
       //echo "its gone";
      //}else{
      //  echo "try again";
      //}

//more secure method
//call the function containing the prepared statement with named perameters
$data = delete_workshop($workshopID);
//conditional statement when the correct row has been deleted
if($data){

	echo "<p><b>The workshop has been removed from the the database</b></p>";

} else {
	echo "could not remove record";
}
echo '<a href="../view/home.php" >home</a>'
?>
