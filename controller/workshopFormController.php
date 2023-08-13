<?php 
$errors = []; // reset error array on page load 
$request_method = strtoupper($_SERVER["REQUEST_METHOD"]); 

// display the form
if($request_method === 'GET'){
    
    // set vars to empty // page refresh or new visit
    $workshopTitle = $workshopDescription = $workshopImage = $workshopTimetable = $workshopCost = $hostID = $venueID = '';

    // 'update' workshop form (populated fields)
    if(isset($workshopID)){
        
        $result = get_workshop_item($workshopID); //model
            
        foreach($result as $row):
            
            $selectedHost = $row['hostID']; // required to pre-populate drop down fields
            $selectedVenue = $row['venueID']; 

            require('../views/forms/workshopForm.php'); // view 
        endforeach;

    }
    // 'new' workshop form 
    if(!isset($workshopID)){
        
        // new workshop form (empty fields)
        require('../views/forms/workshopForm.php'); // view 
    
    }

}

// handle the form 
if($request_method === 'POST'){

    require('../model/workshopFormProcess.php'); // model validate 

    if(count($errors) > 0){

        require('../views/forms/workshopForm.php'); // view 
    }
    if(count($errors) === 0) {

        if($workshopID){ // update workshop form

            $data = update_workshop($workshopID, $workshopTitle, $workshopDescription, $workshopTimetable, $workshopImage, $workshopCost, $hostID, $venueID); // model update

        }
        if(!$workshopID){ // new workshop form

            $data = add_workshop($workshopTitle, $workshopDescription,  $workshopImage, $workshopTimetable, $workshopCost, $hostID, $venueID); // model add

        }

        if($data) {
            header('location: ../views/workshopsByVenue.php?venueID=' . $venueID); // view // redirect to venue list
            
        }
    
    }

}
?>
