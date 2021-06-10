<?php
require 'config/config.php';



if ( isset($_GET['player-search']) && isset($_GET['player-search'])) 
{
	if (empty($_GET['player-search']) || empty($_GET['league'])) {
     	$error = "Please enter a name and league.";
    }
    else {

      $location = "Location: players_results.php?player-search=" . $_GET['player-search'] . "&league=" . $_GET['league'];
      header($location);
    } 
 } 
		
//don't need to check for login, check for errors,
// -- STEP 1: Establish a DB connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// connect errno retuns the error code from the last db connection call
if($mysqli->connect_errno) {
	//there was an error
	echo $mysqli->connect_error;
	//terminates the php program. No subsequent code runs.
	exit();
}

// --- STEP 2: Generate and Submit SQL query
$sql_leagues = "SELECT * FROM leagues;";


// echo out sql statements to double check that statement is correct
// echo "<hr>" . $sql_genre . "<hr>";
$results_leagues = $mysqli->query($sql_leagues);


// quickly dump out results for error checking


// check for any SQL or result errors when we get results back. $mysqli->query() will return False if ther are any errors with the query or submitting the query

if(!$results_leagues) {
	echo $mysqli->error;
	//terminate the program. No subsequent code.
	exit();
}

// ---- STEP 3: Display Results : In HTML below

// ---- STEP 4: Close db connection
$mysqli->close();


?>
<!DOCTYPE html>
<html>
<head>
  <title>Futbowl</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <link rel="stylesheet" href="common/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@200&family=Roboto:wght@100&display=swap" rel="stylesheet">

</head>

<body>

<div class="container-fluid">

<?php include 'common/navbar.php'; ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 ">
				<h1>Search Players</h1>
				<p>Enter any player's name and the league they play in. Both are required.</p>
			</div>
		</div>
		<div class="row  mb-3">
			<form action="players.php" method="GET" class="col-12" id="search-form">

				<div class="form-row">
		            <div class=" font-weight-bold text-danger col-sm-9 ml-sm-auto">
		              <!-- Show errors here. -->
		              <?php
		                if ( isset($error) && !empty($error) ) {
		                  echo $error;
		                }
		              ?>
		            </div>
		          </div> <!-- .row -->


				<div class="form-row ">

					<div class="col-6 mt-3 col-sm-6 col-lg-6" >
						<label for="search-id" class="text-sm-left">Search Players:</label>
						<input name='player-search' type="text" class="form-control mx-auto" id="search-id" placeholder="Search...">
					</div>
					<div class="col-2 mt-5 col-sm-auto">
						<button type="submit" class="btn btn-primary btn-block mx-auto">Search</button>
					</div>
				</div>
				<div class="form-row">
					<div class="col-6 mt-4 col-sm-6 col-lg-6" >
						<label for="league-id" class="text-sm-left">League:</label>
						<select name="league" id="league-id" class="form-control">
							<option value="" selected>-- All --</option>

							<!-- Genre dropdown options here -->
							<?php while($row = $results_leagues->fetch_assoc()) :?>
								
								<option value="<?php echo $row['league_id'];?>"> 
									<?php echo $row["league_name"]; ?> 
								</option>
								
							<?php endwhile;?>
							</select>
					</div>
			</div> <!-- .form-group --> 
			</form>
		</div>
	</div> <!-- .container-fluid -->


  <!-- Footer -->
  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3 pick-em">© 2021 Copyright:
      <a href="index.php"> futbowl.com</a>
    </div>
  </footer>
 </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="common/main.js"></script>
</body>


