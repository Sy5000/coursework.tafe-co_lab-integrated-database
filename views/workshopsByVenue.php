<?php 
session_start(); 
$titleTag = '<title>Co_Lab | Workshops</title>';
$venueID = $_GET['venueID']; //'workshop_items_by_venue' func argument // get from subNav link->URL
?>

<?php include('elements/header.php'); ?>

<body>

  <?php include('elements/navigation.php'); ?>

  <?php include('elements/workshopsList.php');?>

  <?php include('elements/footer.php'); ?>

</body>
</html>
