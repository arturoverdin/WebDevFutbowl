

const settings = {
	"async": true,
	"crossDomain": true,
	"url": "https://api-football-v1.p.rapidapi.com/v3/fixtures?season=2020&next=8",
	"method": "GET",
	"headers": {
		"x-rapidapi-key": "84f7556e04mshfb972aa204701fcp11c89ajsn704a88bc4b77",
		"x-rapidapi-host": "api-football-v1.p.rapidapi.com"
	}
};



$.ajax(settings).done(function (response) 
{
	console.log(response);

	let results = response.response;
	let cards = document.querySelectorAll(".card");

	for(let i = 0; i < cards.length; i++) 
	{

		let datetime = new Date(results[i].fixture.date);
		let string_date = dateConverter(datetime);

		let team_name_1 = results[i].teams.home.name;
		let team_name_2 = results[i].teams.away.name;
		
		let league_name = results[i].league.name;

		cards[i].querySelector("h6").innerHTML = team_name_1 + " vs " + team_name_2;
		cards[i].querySelector("h7").innerHTML = league_name;
		cards[i].querySelector("p").innerHTML = string_date;

	}
});


const settings_2 = {
	"async": true,
	"crossDomain": true,
	"url": "https://api-football-v1.p.rapidapi.com/v3/players/topscorers?league=140&season=2020",
	"method": "GET",
	"headers": {
		"x-rapidapi-key": "84f7556e04mshfb972aa204701fcp11c89ajsn704a88bc4b77",
		"x-rapidapi-host": "api-football-v1.p.rapidapi.com"
	}
};

$.ajax(settings_2).done(function (response) {
	console.log(response);

	let results = response.response[0];
	
	let photo = results.player.photo;

	let player_name = results.player.name;
	let team = results.statistics[0].team.name;
	let league = results.statistics[0].league.name;
	let appear =  results.statistics[0].games.appearences;
	let goals =  results.statistics[0].goals.total;
	let assists =  results.statistics[0].goals.assists;

	$("#player-image").attr("src", photo);

	$("#player-name").html(player_name);

	$("#player-team").html(team);

	$("#player-league").html(league);

	$("#player-appear").html(appear + " appearences");

	$("#player-goals").html(goals + " goals");

	$("#player-assists").html(assists + " assists");

});


const settings_3 = {
	"async": true,
	"crossDomain": true,
	"url": "https://api-football-v1.p.rapidapi.com/v3/teams/statistics?league=2&season=2020&team=49",
	"method": "GET",
	"headers": {
		"x-rapidapi-key": "84f7556e04mshfb972aa204701fcp11c89ajsn704a88bc4b77",
		"x-rapidapi-host": "api-football-v1.p.rapidapi.com"
	}
};

$.ajax(settings_3).done(function (response) {
	console.log(response);

	let results = response.response;
	let league_name = results.league.name;
	let team_name = results.team.name;
	let team_logo = results.team.logo;
	let total_played = results.fixtures.played.total;
	let win = results.fixtures.wins.total;
	let draw = results.fixtures.draws.total;
	let loss = results.fixtures.loses.total;
	let clean = results.clean_sheet.total;
	let scored_penalty = results.penalty.scored.total;
	let total_penalty = results.penalty.total;

	$("#team-image").attr("src", team_logo);

	$("#team-name").html(team_name);

	$("#team-played").html("Played Games: " + total_played);

	$("#team-league").html(league_name);

	$("#team-record").html("W-D-L: " + win + "-" + draw + "-" + loss);

	$("#team-clean").html("Clean Sheets: " + clean);

	$("#team-penalty").html(scored_penalty + " penalties scored out of " + total_penalty);


});


const settings_4 = {
	"async": true,
	"crossDomain": true,
	"url": "https://api-football-v1.p.rapidapi.com/v3/fixtures?league=39&next=8&timezone=America%2FLos_Angeles",
	"method": "GET",
	"headers": {
		"x-rapidapi-key": "84f7556e04mshfb972aa204701fcp11c89ajsn704a88bc4b77",
		"x-rapidapi-host": "api-football-v1.p.rapidapi.com"
	}
};

$.ajax(settings_4).done(function (response) {

	console.log(response);

	let results = response.response;

	let i = 0;
	$(".fixture").each(function(index) 
	{

		let datetime = new Date(results[i].fixture.date);
		let string_date = dateConverter(datetime);

		let team_name_1 = results[i].teams.home.name;
		let team_name_2 = results[i].teams.away.name;
		
		let league_name = results[i].league.name;

		let p = "<p>" + string_date + "</p>";
		let h6 = "<h6>" + team_name_1 + " vs " + team_name_2;

		$(this).append(p);
		$(this).append(h6);

		i++;
	})


});



function dateConverter(date) {

	let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug", "Sep", "Oct", "Nov", "Dec"];
	let days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];


	let month = months[date.getMonth()];
	let num_date = date.getDate();
	let day = days[date.getDay()];
	let hour = date.getHours();
	let minute = (date.getMinutes() < 10 ? '0':'') + date.getMinutes();
	let am_pm = "am";

	if(hour > 12) 
	{
		am_pm = "pm";
		hour -= 12;

	} else if(hour == 0) {

		am_pm = "pm";
		hour += 12;

	}

	return (day + ' ' + month + " " +  num_date + ", " + "at " + hour + ":" + minute + am_pm + " pst");

}


$('#myCarousel').carousel({
  interval: false
});