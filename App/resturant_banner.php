<?php
	$resID = $_GET['resID'];

	include_once("../includes/restaurants.class.php");
	$restaurantsInstance = new \FinalProject\Restaurants();

	if (isset($_GET['resID'])) {
		$restaurantID = $_GET['resID'];
		$restaurantsInstance->getRestaurantDetails($restaurantID);
		$file = "http://www.clickandeat.biz" . $restaurantsInstance->getRestaurantLogo();
		header('Content-Type: image/jpeg');
		header('Content-Length: ' . filesize($file));
		echo file_get_contents($file);
	}

