<?php
//variables $_POST['userEmail'],$_POST['userPassword'],$_POST['userFullName']
	include_once("../includes/restaurants.class.php");
	if (isset($_POST['userEmail']) && isset($_POST['userPassword']) && isset($_POST['userFullName'])) {
		$email = $_POST['userEmail'];
		$password = $_POST['userPassword'];
		$fullName = $_POST['userFullName'];

		$users = new \FinalProject\Users();
		$users->setFullName($fullName);
		$users->setEmail($email);
		$users->setPassword($password);
		$status = $users->registerUser();
		if ($status) {
			echo "true";
		} else {
			echo "false";
		}
	}
