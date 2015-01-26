<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/5/2015 at 1:53 AM
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
	session_start();
	require_once("users.class.php");

	if(isset($_GET['action'])) {
		$function = $_GET['action'];
		switch($function)
		{
			case "logout":
				logOut();
				break;
			case "register":
				register();
				break;
			case "signin":
				signIn();
				break;
			default: echo "Oops!";
					break;
		}
	}


	function register(){
		if(isset($_REQUEST["firstName"])
			and isset($_REQUEST["lastName"])
			and isset($_REQUEST["emailAddress"])
			and isset($_REQUEST["password"])
			and isset($_REQUEST["confirmPassword"]))
		{
			$email = $_REQUEST["emailAddress"];
			$password = $_REQUEST["password"];
			$fullName =  $_REQUEST["firstName"] . " " . $_REQUEST["lastName"];
			// Add the data to the database
			$users = new \FinalProject\Users();
			$users->setFullName($fullName);
			$users->setEmail($email);
			$users->setPassword($password);
			$status = $users->registerUser();
			if($status){
				header("Location: ../index.php");
			}
			else{
				echo "Uh-oh. Something went wrong: ";
				echo $users->getError();
			}
		}
	}
	function logOut(){
		$_SESSION['isLogged'] = false;
		session_unset();
		session_destroy();
		header("Location: /");
	}

	function signIn(){
		if(isset($_REQUEST["email"]) and isset($_REQUEST["password"]))
		{
			$email = $_REQUEST["email"];
			$password = $_REQUEST["password"];
			$users = new \FinalProject\Users();
			$status = $users->login($email, $password);
			if($status){
				$_SESSION['isLogged'] = true;
				$_SESSION['email'] = $users->getEmail();
				$_SESSION['fullName']= $users->getFullName();
				$_SESSION['currentUserID']= $users->getUserId();
				header("Location: /");
			}
			else{
				header("Location: 404.php");
				echo "Uh-oh";
			}
		}
	}