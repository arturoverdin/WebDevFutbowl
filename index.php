<?php
require 'config/config.php';

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
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>

  <!-- Responsible for schedule of played games and scores at the top, depending on how challenging
  can add the ability to show upcoming games also takes care of the navbar -->
  <div class="container-fluid">
  <div class='top'> 
     
    <?php include 'common/schedule.php';?>
    <?php include 'common/navbar.php'; ?>

  </div>


  <!-- Get into the actual page, player spotlight, small leaderboard of default league (favorite if signed in),
  pick em announcement and example  -->

 <div class='row mx-auto my-auto'>
  <div class=' col-lg-3 col-md-6 col-sm-12 d-flex align-items-strech'> 
    <div class="card mb-1" id="player-spot">
      <img class="card-img-top mx-auto w-50" id="player-image" src="https://via.placeholder.com/100x75" alt="Card image cap">
      <div class="card-body ">
        <h5 class="card-title">Player Spotlight</h5>
        <p class="card-text">Messi has had an unbelievable season as the top scorer in the league!</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item" id="player-name"></li>
        <li class="list-group-item" id="player-team"></li>
        <li class="list-group-item" id="player-league"></li>
        <li class="list-group-item" id="player-appear"></li>
        <li class="list-group-item" id="player-goals"></li>
        <li class="list-group-item" id="player-assists"></li>
      </ul>
      
    </div>
  </div>
  <div class='col-lg-6 col-md-6 col-sm-12 d-flex align-items-strech'> 
    <div class="card mb-1" id="team-spot">
      <div class="card-body ">
        <h5 class="card-title">Team of the Week</h5>
        <p class="card-text" id="team-name">Team Name</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center">
            
              <img class="card-img-top w-50" id="team-image" src="https://via.placeholder.com/100x75" alt="Card image cap">
            
          </li>
          <li class="list-group-item" id="team-league">League</li>
          <li class="list-group-item" id="team-played">Games Played</li>
          <li class="list-group-item" id="team-record">Wins, Draw, Losses</li>
          <li class="list-group-item" id="team-clean">Clean Sheet</li>
          <li class="list-group-item" id="team-penalty">Penalty Record</li>
        </ul>
      </div>
    </div>
  </div>
  <div class='col-lg-3 col-md-6 d-flex align-items-strech'> 
    <div class="card mb-1">
      <div class="card-body ">
        <h5 class="card-title">Fixtures</h5>
        <p class="card-text">Premier League</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="fixture list-group-item"></li>
        <li class="fixture list-group-item"></li>
        <li class="fixture list-group-item"></li>
        <li class="fixture list-group-item"></li>
        <li class="fixture list-group-item"></li>
      </ul>
     
    </div>
  </div>
 </div> <!-- ends the row --> 

 <!-- Pick ems announcement and 'example' -->
 <div class='row mx-auto my-auto pt-5'>
  <div class='col-md-5 col-sm-12 pick-em my-auto'>
    <h4>What is a pick em?</h4>
    <p class='pt-4'> The Futbowl Pick’em is a game where fans predict League match results to earn points. During each journey of the 2021 season, points will be tracked on a global leaderboard and the players with the most points can win prizes.</p>
  </div>

  <div class='col-md-7 col-sm-12'>
    <div class='row'>
      <div class='col my-auto'>
        <h4>How it works</h4>
        <img class='pick w-100' src='images/pick2.png'>
      </div>
      <div class='col my-auto'>
        <h4>Cast your prediction.</h4>
        <h4>Earn points.</h4>
        <h4>Win prizes</h4>
      </div>
    </div>
  </div>
 </div> <!-- end row -->

  <!-- Footer -->
  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3 pick-em">© 2021 Copyright:
      <a href="index.php"> futbowl.com</a>
    </div>
  </footer>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="common/main.js"></script>
</body>
</html>