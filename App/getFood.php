<?php
	/**
	 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
	 * Started on   : 1/22/2015 at 9:34 PM
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
	include_once("../includes/restaurants.class.php");
	$allFood = array();
	$restaurantsInstance = new \FinalProject\Restaurants();
	header("Content-type: application/json");

	if(isset($_REQUEST['resId'])) {
		$restaurantID = $_REQUEST['resId'];
		$menu = $restaurantsInstance->getRestaurantMenu($restaurantID);
		if (!empty($menu)) {
			foreach ($menu as $food) {
				$singleRestaurant = array(
					"foodID" => $food['mealId'],
					"foodName" => $food['mealName'],
					"image" => "http://www.clickandeat.biz" . $food['foodImage'],
					"foodPrice" => $food['mealPrice'],
					"foodDes" => $food['mealDesciption']
				);
				array_push($allRestaurantsJson, $restaurantOnce);
			}
			echo json_encode($allRestaurantsJson);
		}
		else{
			$message = array(
				"status"  => (int)"0",
				"message" => "No results found."
			);
			echo json_encode($message);
		}


	}
	else {
		$message = array(
			"status"  => (int)"0",
			"message" => "You have not specified any location."
		);
		echo json_encode($message);
	}
