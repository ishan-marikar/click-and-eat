<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/5/2015 at 5:42 AM
 * Project name : FinalProjectClickAndEat
 *
 * "When I wrote this, only God and I understood what I was doing.
 * Now, God only knows." -Karl Weierstrass
 *
 * For the brave souls who get this far: You are the chosen ones,
 * the valiant knights of programming who toil away, without rest,
 * fixing our most awful code. To you, true saviors, kings of men,
 * I say this: never gonna give you up, never gonna let you down,
 * never gonna run around and desert you. Never gonna make you cry,
 * never gonna say goodbye. Never gonna tell a lie and hurt you.
 *
 */

require_once("database.class.php");

  $database = new FinalProject\Database();
  $sql = "SELECT DISTINCT(Address) from Restaurant";
  $sqlParam = '';
  $results = $database->query($sql, $sqlParam);

  $location = array();
  if(!empty($results))
  {
    for ($i=0; $i < sizeof($results); $i++) {
      array_push($location, $results[$i][0]);
    }
  }

  echo json_encode($location);

?>