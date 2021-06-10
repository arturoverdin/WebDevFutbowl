<?php
require 'config/config.php';

$search = $_GET['player-search'];
$curl = curl_init();

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);



curl_setopt_array($curl, [
	CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v3/players?league=" . $_GET['league'] . "&search=" . $search,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: api-football-v1.p.rapidapi.com",
		"x-rapidapi-key: 84f7556e04mshfb972aa204701fcp11c89ajsn704a88bc4b77"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

$data = json_decode($response, true);

$final_data = $data['response'];
$num_results = count($final_data);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;
}

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
			<div class="col-12">
				<h1>Search Results</h1>
			</div>
		</div>
		<div class="row">
			<div class="row mb-4">
				<div class="col-12 mt-4">
					<a href="players.php" role="button" class="btn btn-primary">Back to Form</a>
				</div> <!-- .col -->
			</div> <!-- .row -->
			<div class="col-12">
				<p>Showing results: </p>
			</div> <!-- .col -->
			<div class="col-12">
				<table class="table table-hover table-responsive mt-4">
					<thead>
						<tr>
						<?php if( !isset($_SESSION["logged"]) || !$_SESSION["logged"]) : ?>
						<?php else: ?>
							<th>Unbookmark</th>
							<th>Bookmark Player </th>
						<?php endif;?>
							<th>Image</th>
							<th>Player</th>
							<th>Team</th>
							<th>League</th>
							<th>Nationality</th>
						</tr>
					</thead>
					<tbody>	
					<?php foreach($final_data as $value): ?>
						<tr>
						  <?php if( !isset($_SESSION["logged"]) || !$_SESSION["logged"]) : ?>

						  <?php else: ?>
								<td>
								<!-- Confirm returns true on ok and false on cancel -->
									<a onclick="return confirm('Are you sure you want to unbookmark this?');" href="#" class="btn btn-danger delete-btn">
									Unbookmark
									</a>
								</td>
								<td>
								<!-- Confirm returns true on ok and false on cancel -->
								<a onclick="return confirm('Are you sure you want to bookmark this?');" href="#" class="btn btn-primary save-btn">
									Bookmark
								</a>
							</td>  
						  <?php endif;?>
							<td>	
								<img src=" <?php echo $value['player']['photo'] ?>"/>
							</td>
							<td>
								<?php echo $value['player']['name']; ?>
							</td>
							<td>
								<?php echo $value['statistics'][0]['team']['name']; ?>
							</td>
							<td>
								<?php echo $value['statistics'][0]['league']['name']; ?>
							</td>
							<td>
								<?php echo $value['player']['nationality']; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div> <!-- .col -->

			<div class="col-12">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item">
							<a class="page-link" href="#">First</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">Previous</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">Current</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">Last</a>
						</li>
					</ul>
				</nav>
			</div> <!-- .col -->

		</div> <!-- .row -->
		
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


