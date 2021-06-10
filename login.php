<?php

require 'config/config.php';

//if user is logged in, don't show them this page, redirect
if( !isset($_SESSION['logged']) ||  !$_SESSION['logged']) {

  if ( isset($_POST['username']) && isset($_POST['password']) ) 
  {
    if ( empty($_POST['username']) || empty($_POST['password']) ) {

      $error = "Please enter username and password.";

    }
    else {

      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      if($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit();
      }     


      $password = hash("sha256", $_POST['password']);

      $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
      $statement->bind_param("ss", $_POST['username'], $password);

      $executed = $statement->execute();

      if(!$executed) {
        echo $mysqli->error;
        exit();
      }

      $results = $statement->get_result();
      
      if($results->num_rows > 0) {
          
        //log in success
        //set variable sessions
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['logged'] = true;

        //redirect logged in user to home page
        header("Location: index.php");
      }
      else {
        $error = "Invalid username or password.";
      }

      $statement->close();
      $mysqli->close();
    } 
  }
} else {

  //user is logged in so redirect
  header("Location: index.php");

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Futbowl</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <link rel="stylesheet" href="common/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@200&family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
  
  <div class="container-fluid">
    
    <?php include 'common/navbar.php'; ?>
    
    <!-- submitting the form to itself, way to reload page/refresh if user messes up password -->

     <div class="wrapper">
      <div class="overlay">
      </div>

        <div class="row mx-auto my-auto">

          <div class='col-sm-12 mx-auto text-center pt-5 pb-5'>
            <div>
              <h3><i class="fas fa-futbol mr-2"></i>Log in to Futbowl</h3>
            </div>
          </div>

        </div>

        <form action="login.php" method="POST">
          <div class="row mb-3">
            <div class=" font-weight-bold text-danger col-sm-9 ml-sm-auto">
              <!-- Show errors here. -->
              <?php
                if ( isset($error) && !empty($error) ) {
                  echo $error;
                }
              ?>
            </div>
          </div> <!-- .row -->
          
          <div class="form-group row">
            <label for="username-id" class="col-sm-3 col-form-label text-sm-right">Username:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="username-id" name="username">
            </div>
          </div> <!-- .form-group -->

          <div class="form-group row">
            <label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="password-id" name="password">
            </div>
          </div> <!-- .form-group -->

          <div class="form-group row">

            <div class='col-sm-1'></div>
            <div class="col-sm-7 mt-2 mx-auto">
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>

          </div>
          
          <div class="form-group row mx-auto text-center">
            <div class="col-sm-12">Don't have an account? 
              <a href="register.php">CREATE ACCOUNT</a>
            </div>
          </div>


          <div class="form-group row mx-auto text-center">
            <div class="col-sm-12">Forgot password? 
            <a href="register.php"><strong>RESET PASSWORD</strong></a>
            </div>
          </div>

        </form>
      

    </div> 

    <!-- Footer -->
  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3 pick-em">© 2021 Copyright:
      <a href="index.php"> futbowl.com</a>
    </div>
  </footer>
  </div> <!-- .container -->
  

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="common/main.js"></script>
</body>
</html>