<?php

/**
 * NCAA Scoreboard Challenge
 *
 * This program reads the NCAA JSON file and sorts it by Game State, then Start Time
 *
 * @author  Veronique Topping
 *
 */


/** GET & SAVE THE JSON FILE **/

$ncaa_file_str = file_get_contents("http://ncaa-cssu.s3.amazonaws.com/webdev/coding-challenge/scoreboard.json");

/** DECODE THE JSON STRING & SAVE IT AS A PHP OBJECT **/

$ncaa_scbd = json_decode($ncaa_file_str, true);

/** SET THE GAME STATE SORT WEIGHT **/

$weights = array('live','pre','final');


/** SORT THE JSON FILE BY GAME STATE **
 * @param  	array $comp1 
 * @param  	array $comp2
 * @return  	integer $ret_val
 */
usort($ncaa_scbd['games'], function ($comp1, $comp2) use($weights) {
$ret_val = array_search($comp1['game']['gameState'], $weights) - array_search($comp2['game']['gameState'], $weights);

if(!$ret_val) 
	$ret_val = strcmp($comp1['game']['startTime'], $comp2['game']['startTime']);
return $ret_val;
});

?>
