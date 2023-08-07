<?php

//define vars as empty
$workshopTitle = $workshopDescription = $workshopImage = $workshopTimetable = $workshopCost = $hostID = $venueID = '' ;

$workshopTitleErr = $workshopDescriptionErr = $workshopImageErr = $workshopTimetableErr = $workshopCostErr = $hostIDErr = $venueIDErr = '' ;

$row['venueTitle'] = $row['hostName'] = " - please select - ";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
//check for inputs

//nested conditionals //display user feedback error or pass variables to 'test_input()' function to handle sanitisation etc
  if(empty($_POST['workshopTitle'])){
    $workshopTitleErr = "Title is a required field.";
  } else {
    $workshopTitle = test_input($_POST['workshopTitle']);
  }
  if(empty($_POST['workshopDescription'])){
    $workshopDescriptionErr = "Description is a required field.";
  } else {
    $workshopDescription = test_input($_POST['workshopDescription']);
  }

    $workshopImage = test_input($_POST['workshopImage']);
    $workshopTimetable = test_input($_POST['workshopTimetable']);

  if(empty($_POST['workshopCost'])){
    $workshopCostErr = "COST is a required field.";
  } elseif(!is_numeric($_POST['workshopCost'])){
    $workshopCostErr = "COST field requires numeric values only";
  } else {
      $workshopCost = test_input($_POST['workshopCost']);
  }

    $hostID = test_input($_POST['hostID']);
    $venueID = test_input($_POST['venueID']);
}

if ($workshopTitle != '' && $workshopDescription != '' && $workshopCost != ''){


$data = insert_workshop( $workshopTitle, $workshopDescription, $workshopImage, $workshopTimetable, $workshopCost, $hostID, $venueID );

if($data){
  	echo "<p><b>The following records were added!</b></p>";

    echo "title -" . $workshopTitle;
    echo "description -" . $workshopDescription;
    echo "tt -" . $workshopTimetable;
    echo "img -" . $workshopImage;
    echo "cost -" . $workshopCost;
    echo "host -" . $hostID;
    echo "room -" . $venueID;
  } else {
    echo "<p class='error'>Workshop could not be saved</p>";
  }


  }



?>
