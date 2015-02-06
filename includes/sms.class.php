<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/8/2015 at 2:01 PM
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
	require("includes/libraries/clockwork/class-Clockwork.php");
	require("includes/crypt.functions.php");
	require("includes/analytics.class.php");
	class sms {

	private  $error;

	/**
	 * @return mixed
	 */
	public function getError()
	{
		return $this->error;
	}

	public  function sendSMS($number)
	{
		try{
			$options = array( 'ssl' => false );
			$appId = CryptUtils::decrypt("Urj7Uuc0h8y4jPJcvcCKsh49f6TG1evU7pewBVqgMt7DHIGuBCpKgUywEOlJk/PaueOJ8fF0Juz9Rjkitsia1Q==");
			$clockwork = new Clockwork( $appId, $options );

			$messageText = "Thank you for placing your order on Click&Eat. Your order will arrive shortly. " .
				           "Please call 0777830757 for inquiries.";
			// Setup and send a message
			$message = array(
				'to' => $number,
				'message' => $messageText,
				'from' => 'ClickAndEat'
			);
			$result = $clockwork->send( $message );

			// Check if the send was successful
			if($result['success']) {
				echo 'message sent';
				return true;
			} else {
				echo $result['error_message'];
				$this->error = $result['error_message'];
			}
		}
		catch (ClockworkException $e)
		{
			$this->error = $e->getMessage();
		}
	}

	public function viewBalance(){
			$options = array( 'ssl' => false );
			$appId = CryptUtils::decrypt("Urj7Uuc0h8y4jPJcvcCKsh49f6TG1evU7pewBVqgMt7DHIGuBCpKgUywEOlJk/PaueOJ8fF0Juz9Rjkitsia1Q==");
			$clockwork = new Clockwork( $appId, $options );

		return $clockwork->checkBalance();
	}


} 