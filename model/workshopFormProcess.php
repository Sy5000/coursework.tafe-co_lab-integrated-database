<?php
// user errors
const WORKSHOP_TITLE_REQUIRED = "Title is a required field.";
const DESCRIPTION_REQUIRED = "Description is a required field.";
const TIMETABLE_REQUIRED = "Timetable is a required Field.";
const COST_INVALID = "Cost is a required Field";
const COST_REQUIRED = "Cost field requires numerical values only.";
const HOST_REQUIRED = "Host is a required field.";
const VENUE_REQUIRED = "Venue is a required field.";

const IMAGE_INVALID = "Please choose an image to upload.";
const IMAGE_REQUIRED = "Image is a required field.";
const IMAGE_EXISTS = "Sorry, a file with this title already exists.";
const IMAGE_EXCESS_SIZE = "Sorry, your file is too large. 500MB MAX.";
const IMAGE_FORMAT = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; /// <-- DRY here
const IMAGE_NO_UPLOAD = "Did not upload.";

// sanitise
$workshopTitle = htmlspecialchars($_POST['workshopTitle']);
$workshopDescription = htmlspecialchars($_POST['workshopDescription']);
$workshopTimetable = htmlspecialchars($_POST['workshopTimetable']);
$workshopCost = htmlspecialchars($_POST['workshopCost']);
$hostID = htmlspecialchars($_POST['hostID']);
$venueID = htmlspecialchars($_POST['venueID']);

$workshopImageOld = htmlspecialchars($_POST['workshopImageOld']);
// image upload
$permittedFileTypes = array("jpg","jpeg","png","gif"); //permitted file types
$target_dir = "../views/images/"; // image directory
$target_file = $target_dir . basename($_FILES["workshopImage"]["name"]); // file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // file extention
$check = getimagesize($_FILES["workshopImage"]["tmp_name"]); // file check

    // validate 
    if(empty($workshopTitle)){
        $errors['workshopTitle'] = WORKSHOP_TITLE_REQUIRED;
    }

    if(empty($workshopDescription)){
        $errors['workshopDescription'] = DESCRIPTION_REQUIRED;
    } 

    if(empty($workshopTimetable)){
      $errors['workshopTimetable'] = TIMETABLE_REQUIRED;
    }

    if(!is_numeric($workshopCost)){ //empty && not# value return = falsey
        $errors['workshopCost'] = empty($workshopCost) ? COST_INVALID : COST_REQUIRED ; //ternary op to process type of falsey value  
    } else {
        $workshopCost = round($workshopCost, 2);//round up to 2 decimal places if truthey input
    }

    if(empty($hostID)){
        $errors['hostID'] = HOST_REQUIRED;
    }

    if(empty($venueID) || $venueID == '- please select -'){
        $errors['venueID'] = VENUE_REQUIRED;
    }

// image upload - return 1st error found to avoid overwriting user feedback 

    // check file is image / has been chosen
    if($check == false) { 
        
        if(isset($workshopID)){ //guard clasue // disable check on update form
        $workshopImage = $workshopImageOld; // keep original image filepath if no new image has been selected
        return; 
        }

        $errors['workshopImage'] = IMAGE_INVALID;
        return;
    }

    if($check !== false) {
        echo "File is an image - " . $check["mime"] . "."; //incorporate feedback   
    }

    // check filetype is permitted 
    if(!in_array($imageFileType, $permittedFileTypes)) {     
        $errors['workshopImage'] = IMAGE_FORMAT;
        return;
    }

    // Check if file exists in directory
    if (file_exists($target_file)) {
        $errors['workshopImage'] = IMAGE_EXISTS;
        return;
    }

    // Check file size // 500kb max
    if ($_FILES["workshopImage"]["size"] > 500000) {
        $errors['workshopImage'] = IMAGE_EXCESS_SIZE;
        return;
    }

    // upload 
    if(!$errors['workshopImage']){
           
            if(move_uploaded_file($_FILES["workshopImage"]["tmp_name"], $target_file)) {

                // echo "The file ". htmlspecialchars( basename( $_FILES["workshopImage"]["name"])). " has been uploaded.";

                $workshopImage = $_FILES["workshopImage"]["name"]; //save filename/filepath to database
                
            } else {
                $errors['workshopImage'] = IMAGE_NO_UPLOAD;
            }
        
    }

?>