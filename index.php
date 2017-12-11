<?php

include 'includes/scoreboard.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>NCAA Scoreboard Challenge</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<meta charset="utf-8">
<meta name="robots" content="noindex,nofollow">
<meta name="viewport" content="width=device-width,initial-scale=1">
</head>

<body>

<div class="main-box">

<div class="main-hdr">NCAA SCOREBOARD CHALLENGE</div>

<?php foreach ($ncaa_scbd['games'] as $key => $val) {
 
	/* SET THE GAMESTATE COLOR & WINNER INDICATOR */

	if ($val['game']['gameState'] == "live") $game_color = "#009933";  /* GREEN */
	elseif ($val['game']['gameState'] == "pre") $game_color = "#003399";  /* BLUE */
	else $game_color = "#777";  /* GRAY */

	$game_away_win_ind = $game_home_win_ind = "";
	if ($val['game']['away']['winner'])
		$game_away_win_ind = "font-weight:bold";
	if ($val['game']['home']['winner'] == "true")
 		$game_home_win_ind = "font-weight:bold";
?>

	<!-- SCORE BOX SECTION -->

	<div class="score-box" style="border:2px solid <?php echo($game_color); ?>">

		<!-- SCORE BOX HEADER SECTION -->

		<div class="score-box-hdr">

			<div class="score-box-hdr-title">
			<a target="_blank" href="http://www.ncaa.com<?php echo($val['game']['url']); ?>"><?php echo($val['game']['away']['names']['char6'] . " at " . $val['game']['home']['names']['char6']); ?></a>   
			
			<?php echo(" - " . substr($val['game']['startTime'],0,7));
			if (($val['game']['gameState']) == "live")
				echo(" | " . $val['game']['currentPeriod']); ?>&nbsp;

			<?php if (!(empty($val['game']['network']))) 
				echo(" | " . $val['game']['network']); ?>
			</div>

			<div class="score-box-hdr-gmst">
			<span class="score-box-hdr-gmst-ind" style="background-color:<?php echo($game_color); ?>"><?php echo(strtoupper($val['game']['gameState'])); ?></span>
			</div>

		</div>

		<div class="div-clr"></div>

		<!-- SCORE BOX TEAM & SCORE SECTION -->

		<div class="score-box-team">
		<div class="score-box-team-nm">
		<span id="team-away" style="<?php echo($game_away_win_ind); ?>;"><?php echo($val['game']['away']['names']['short']); ?><br></span>
		<span id="team-away-code" style="<?php echo($game_away_win_ind); ?>;"><?php echo($val['game']['away']['names']['char6']); ?><br></span>
		<span id="team-home" style="<?php echo($game_home_win_ind); ?>;"><?php echo($val['game']['home']['names']['short']); ?></span>
		<span id="team-home-code" style="<?php echo($game_home_win_ind); ?>;"><?php echo($val['game']['home']['names']['char6']); ?></span>
		</div>

		<div class="score-box-team-sc">
		<span style="<?php echo($game_away_win_ind); ?>;"><?php echo($val['game']['away']['score']); ?></span><br>
		<span style="<?php echo($game_home_win_ind); ?>;"><?php echo($val['game']['home']['score']); ?></span><br>
		</div>
		</div>



	</div>

<?php } ?>

</div>

</body>
</html>