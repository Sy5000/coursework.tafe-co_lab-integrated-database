<?php 
function render_workshopList($result){
  //display results, for each loop
  foreach($result as $row): //pull results as a array_key stored in variable $row
    
    echo '<input type="hidden" value=" ' . $row['venueID'] . ' ">';
    
    echo '<div class="griditem1"><p class="price"> $' . $row['workshopCost'] . '</p> <p>Venue: ' . $row['venueTitle'] . '</p><br> <p style="border:solid 1px black;padding:2px;font-weight:200;">' . $row['workshopTimetable'] . '</p></div>';
    
    echo '<div class="griditem2"><h3>' . $row['workshopTitle'] . '</h3><p>' . $row['workshopDescription'] . '</p></div>';
    
    echo '<div class="griditem3"><img alt = "' . $row['workshopImage'] . '" src="../views/images/' . $row['workshopImage'] . ' " /></div>';

    if(isset($_SESSION['loggedin'])) { //only show edit/delete links to logged in users
    echo '<div class="griditem4"><a href="updateworkshop.php?workshopID=' . $row['workshopID'] . ' " >update</a> | <a href="deleteWorkshop.php?workshopID=' . $row['workshopID'] . ' ">delete</a></div>';
    }
    
    echo '<div class="border"> </div>';
    //echo"<pre>";
    //print_r( $row );
  endforeach;
}
?>

<article class="flex center">

    <div class="gridcontainer">

      <div class="griditem3 subnav">

        <?php get_venue_items(); ?>

      </div>

      <div id="gridheader"><h1>Co_lab.</h1><h3>Our upcoming events</h3></div>
      
      <div class="sessiondetails">

        <?php home_admin_greeting() ?>

      </div>

      <?php require('../controller/workshopsListController.php'); ?>

    </div>

  </article>