<form method="post" action="../controller/workshopDeleteController.php">
<!-- create as a function  -->
<?php 

?>

<input type="hidden" id="workshopID" name="workshopID" value="<?php echo $result['workshopID']; ?>"/ >

<?php echo "<b>" . $result['workshopTitle'] . " - " . $result['workshopID'] . "</b>"; ?>

<p>would you like to remove '<?php echo $result['workshopTitle']; ?>  ' from the database</p>

<button type="submit" > remove workshop </button>
</form>
<?php  ?>