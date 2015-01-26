<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/21/2015 at 3:06 AM
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
	header("Content-type: application/json");
	require("./users.class.php");
if(isset($_REQUEST['type'])){
	if($_REQUEST['type']=="email")
	{
		$email = $_REQUEST['value'];
		$users = new FinalProject\Users();
		$response = $users->userExists($email);

		$data = array(
			"exists" => $response
		);
		echo json_encode($data);
	}
}

