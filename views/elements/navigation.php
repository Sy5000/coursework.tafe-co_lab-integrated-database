<div class="header">
  <nav class="navbar">
    <a href="home.php" class="nav-logo"><strong>Co_Lab.</strong></a>
  
    <ul class="nav-menu">
      <li class="nav-item">
        <a href="workshops.php" class="nav-link">workshops</a>
      </li>
      
      <?php if (!isset($_SESSION['loggedin'])) { ?>
      <li class="nav-item">
        <a href="createAccount.php" class="nav-link">Sign up</a>
      </li>
      <?php } ?>
      
      <?php if (isset($_SESSION['loggedin'])) { ?>
      <li class="nav-item">
        <a href="newWorkshop.php" class="nav-link"><strong>+ new workshop</strong></a>
      </li>

      <li class="nav-item">
        <a href="../controller/logoutController.php" class="nav-link">logout</a>
      </li>
      <?php } ?>

    </ul>

    <button class="hamburger">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>

  </nav>
</div>
