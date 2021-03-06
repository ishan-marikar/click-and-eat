<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/3/2015 at 11:33 AM
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

	include_once("includes/webpage.class.php");

	$webPage = new \FinalProject\WebPage("Management");
	$headerContent = $webPage->addHeader();
	echo $headerContent;
	// ---------------------------------------------
?>



<?php
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>