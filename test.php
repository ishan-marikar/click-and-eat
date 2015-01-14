<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/8/2015 at 2:32 PM
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
 require("includes/sms.class.php");
/*
	echo "[+] Sending message to shiyaz and ishan..";
	$sms = new sms();
	$result = $sms->sendSMS("94777830757");
	if($result){
		echo "[*] Success!";
	}
	else{
		echo "[!] Fail!";
		echo $sms->getError();
	}*/

	echo "<h1> Decryption Test </h1> <br>";
	$hideMe = "The treasure is no where to be found.";
	echo "<strong>Text to encrypt: </strong> " . $hideMe . "<br>";
	$encryptedText = CryptUtils::encrypt($hideMe);
	echo "<strong>Text Encrypted: </strong> " . $encryptedText . "<br>";
	echo "<strong>Text Decrypted: </strong> " . CryptUtils::decrypt($encryptedText) . "<br>";
