<!-- Responsible for the navbar and navigating from page to page... -->
<nav class="navbar navbar-expand-lg  navbar-dark bg-transparent row">
  <a class="navbar-brand" href="index.php"><i class="fas fa-futbol"></i> Futbowl</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse navbar-dark bg-transparent flex-grow-1 text-right navbarSupportedContent" >
    <ul class="navbar-nav ">
      <li class="nav-item <?php  echo ($_SERVER['REQUEST_URI'] == '/Homeworks/final_project/index.php') ? 'active':'' ?>">
        <a class="nav-link " href="index.php">Home</a>
      </li>
      <li class="nav-item dropdown <?php  echo ($_SERVER['REQUEST_URI'] == '/Homeworks/final_project/players.php') ? 'active':'' ?>  <?php  echo ($_SERVER['REQUEST_URI'] == '/Homeworks/final_project/teams.php') ? 'active':'' ?>" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Search
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="players.php">Players</a>
          <a class="dropdown-item" href="#">Teams</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tournaments
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Tournament A</a>  
          <a class="dropdown-item" href="#">Tournament B</a>
        </div>
      </li>
    </ul>
  </div>
  <div class="navbar-collapse collapse w-100 order-3 text-right navbarSupportedContent ">

    <?php if( !isset($_SESSION["logged"]) || !$_SESSION["logged"]) : ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      </ul>
    <?php else: ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="profile.php" >Welcome <?php echo $_SESSION['username']?>!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    <?php endif;?>
  </div>
</nav>