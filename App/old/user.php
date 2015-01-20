<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/14/2015 at 9:32 PM
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
				$response = array(
					'status' => 1 ,
					'message' => "You have logged in.",
					'userId' => $users->getUserId(),
					'fullName' => $users->getFullName(),
					'email' => $users->getEmail()
				);
				echo json_encode($response);
				exit();
			}
			else{
				$response = array(
					'status' => 0 ,
					'message' => "Your username or password is incorrect."
				);
				echo json_encode($response);
				exit();
			}
		}
		else{
			$response = array(
				'status' => 0 ,
				'message' => "You have not entered a username or password."
			);
			echo json_encode($response);
			exit();
		}
	}
