<?php
	/**
	 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
	 * Started on   : 1/18/2015 at 2:11 AM
	 * Project name : FinalProjectClickAndEat
	 * "When I wrote this, only God and I understood what I was doing.
	 * Now, God only knows." -Karl Weierstrass
	 * For the brave souls who get this far: You are the chosen ones,
	 * the valiant knights of programming who toil away, without rest,
	 * fixing our most awful code. To you, true saviors, kings of men,
	 * I say this: never gonna give you up, never gonna let you down,
	 * never gonna run around and desert you. Never gonna make you cry,
	 * never gonna say goodbye. Never gonna tell a lie and hurt you.

	 */
	include_once("../includes/restaurants.class.php");
	$allRestaurantsJson = array();
	$restaurantsInstance = new \FinalProject\Restaurants();
	header("Content-type: application/json");
	if (isset($_REQUEST['query'])) {
		$location = $_REQUEST['query'];
		$allRestaurants = $restaurantsInstance->getRestaurantsByLocation($location);
		if (!empty($allRestaurants)) {
			foreach ($allRestaurants as $restaurant) {
				$restaurantOnce = array(
					"resID"   => $restaurant['Restaurant_ID'],
					"resName" => $restaurant['Restaurant_Name'],
					"image"   => "http://www.clickandeat.biz" . $restaurant['restaurantLogo'],
					"rating"  => (int)$restaurant['rating'],
					"resCon"  => $restaurant['Contact'],
					"resLoc"  => $restaurant['Address']
				);
				array_push($allRestaurantsJson, $restaurantOnce);
			}
			echo json_encode($allRestaurantsJson);
		} else {
			$message = array(
				"status"  => (int)"0",
				"message" => "No results found."
			);
			echo json_encode($message);
		}
	} else {
		$message = array(
			"status"  => (int)"0",
			"message" => "You have not specified any location."
		);
		echo json_encode($message);
	}

