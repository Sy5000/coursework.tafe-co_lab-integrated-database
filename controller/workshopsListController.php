<?php
      if(isset($venueID)){// if var is set sort by venue
            $data = get_workshop_items_by_venue($venueID); //Model
            render_workshopList($data); //View
      }
      if(!isset($venueID)){//unsorted 
            $data = get_workshop_items(); //Model
            render_workshopList($data); //View
      }
?>