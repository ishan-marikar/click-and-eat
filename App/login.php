<?php
	include_once("../includes/restaurants.class.php");
	if (isset($_POST['userEmail']) && isset($_POST['userPassword'])) {
		$email = $_POST['userEmail'];
		$password = $_POST['userPassword'];
		$users = new \FinalProject\Users();
		$status = $users->login($email, $password);
		if($status){
			echo "true";
		}
		else{
			echo "false";
		}
	}
