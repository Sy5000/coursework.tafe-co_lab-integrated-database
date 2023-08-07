<nav class="menu">

  <ul class="menu-left">
    <li><strong><a href="home.php">Co_Lab</a></strong></li>
  </ul>

  <ul class="menu-right">

    <li><strong><a href="workshops.php">Workshops</a></strong></li>

      <?php if (!isset($_SESSION['loggedin'])) { //conditional - signup link only visible when NOT logged in  ?>
    <li><a href="createAccount.php">sign up</a></li>
      <?php } ?>


      <?php if (isset($_SESSION['loggedin'])) { //conditional - visible after session is created@login ?>
    <li><strong><a href="newWorkshop.php"> + new workshop</a></strong></li>

    <li><a href="../controller/logoutController.php">logout</a></li>
      <?php } ?>

  </ul>

</nav>
