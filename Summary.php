<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/3/2015 at 11:29 AM
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
if(isset($_SESSION['isLogged']))
{
	$page = 'Summary';

// or use $_SERVER['PHP_SELF']

	include ( 'includes/libraries/counter/counter.php');
	addinfo($page);
	include_once("includes/webpage.class.php");
	$webPage = new \FinalProject\WebPage("Payment Details");

		if (isset($_SESSION['currentUserID'])) {
		$currentUserID = $_SESSION['currentUserID'];

		$cartItems = $shoppingCart->getAllItems($currentUserID);
		$shoppingCart->getUserCart($currentUserID);

		$purchaseDetails = new Purchase($currentUserID);
		$purchaseItems = $purchaseDetails -> getUserPaymentDetails($userId);

		$users = new Users();
		$userDetails = $users->getUserDetails($currentUserID);
	}
		$headerContent = $webPage->addHeader();
	echo $headerContent;

// ---------------------------------------------
?>
	<div class="container wow fadeInRight" data-wow-delay="0.4s">

	<strong><p>Name: <?php echo $userDetails['fullName'] ?> </p> <br></strong>
	<strong><p>Billing Address: <?echo $purchaseItems['deliveryAddress'] ?></p> <br></strong>
	<strong><p>Contact Number: <?echo $purchaseItems['contactNo'] ?></p> <br></strong>
	<strong><p>Credit Card Number: <? $creditcardNo ?></p></strong>
	<strong><p>Items: </p> <br></strong>

	<button href="index.php" onclick="alert('Thank you for ordering with us!');">Finalise</button>

<?php
}
else
{ ?>
<div class="container">
	<div class="row"><h1 class="lead text-center"> You have not logged in. Please continue to to <a href="login.php?redirect=<?php echo $_SERVER['PHP_SELF'] ?>"> login </a></h1></div>
</div>
<? }
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>