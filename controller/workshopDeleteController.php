<?php

$errors = [];

$request_method = strtoupper($_SERVER["REQUEST_METHOD"]); // uppercase
$workshopTitle = $workshopDescription = $workshopTimetable = $workshopImage = $workshopCost = $hostID = $venueID = ''; // empty on page refresh / reload

// show the form 
if($request_method === 'GET'){
	if(isset($workshopID)){

		foreach(get_workshop_item($workshopID) as $result): // model
			require('../views/forms/workshopDeleteForm.php'); // View 
		endforeach;
		
	} 
}

// handle the form submission
if($request_method === 'POST') {

	require('../model/functions.php');

	$workshopID = $_POST['workshopID'];
	
	$data = delete_workshop($workshopID); // Model

	if($data){
		header('location: ../views/home.php');		
	} else {	
		echo "could not remove record";		
	}
		
echo '<a href="../views/home.php" >home</a>';
	
}
?>
