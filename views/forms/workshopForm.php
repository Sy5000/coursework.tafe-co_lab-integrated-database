
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"]); ?>" enctype="multipart/form-data">

    <input type="hidden" id="workshopID" name="workshopID" value="<?php echo $workshopID; ?> ">
    
    <!-- BUG FIX - retain same DB img record if no new image is uploaded (avoid blank insert/overwrite) -->
    <input type="hidden" id="workshopImageOld" name="workshopImageOld" value="<?php echo $row['workshopImage']; ?>">

    <label>Title :</label>
      <input type="text" id="workshopTitle" name="workshopTitle" value="<?php echo $row['workshopTitle'] ?? maintain_state($workshopTitle); ?>" />
 
    <span class="error"><?php echo $errors['workshopTitle'] ?? '' ?></span>

    <label>Description :</label>    
      <textarea id="workshopDescription" name="workshopDescription" value="" cols="48" rows="12" /><?php echo $row['workshopDescription'] ?? maintain_state($workshopDescription); ?></textarea>

    <span class="error"><?php echo $errors['workshopDescription'] ?? '' ?></span>

    <label>Select image to upload: </label>
      <span><?php echo '<strong>Current image : </strong>' . $row['workshopImage'] ?? ''; ?></span>
      <input type="file" id="workshopImage" name="workshopImage">
      <p><i> optimise 16:9 </i></p>
    <span class="error"><?php echo $errors['workshopImage'] ?? '' ?></span>

    <label>Timeslot :</label>
      <input type="datetime-local" id="workshopTimetable" name="workshopTimetable" value="<?php echo $row['workshopTimetable'] ?? maintain_state($workshopTimetable); ?>"/>

      <span class="error"><?php echo $errors['workshopTimetable'] ?? '' ?></span>  

    <label>Ticket price :</label>
      <input type="text" id="workshopCost" name="workshopCost" value="<?php echo $row['workshopCost'] ?? maintain_state($workshopCost); ?>" />
    
    <span class="error"><?php echo $errors['workshopCost'] ?? '' ?></span>

    <label>Choose a host :</label>
      <select id="hostID" name='hostID'>
        <option value=""> - please select - </option>

        <?php select_host($selectedHost, $hostID);?>

      </select>

    <span class="error"><?php echo $errors['hostID'] ?? '' ?></span>

    <!-- create a drop-down list populated by the categories/venues stored in the database -->
    <label>Venue options :</label>
      <select id="venueID" name="venueID">
        <option value=""> - please select - </option>
          
        <?php select_venue($selectedVenue, $venueID); ?>

      </select>

    <span class="error"><?php echo $errors['venueID'] ?? '' ?></span>
  
  <br>
  <button type="submit" > update </button>
  <br>

</form>