<?php
/**
 * Developed by : -Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/30/2014 at 5:23 PM
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

	$webPage = new \FinalProject\WebPage("404");
	$headerContent = $webPage->addHeader();
	echo $headerContent;
	// ---------------------------------------------
	if(isset($errorCode))
	{
		$errorCode = $_REQUEST['error'];
	}

	?>
	<div class="container">
		<img style="padding-left: 25%;" class="img-circle" src="../images/404.jpg">
		<h1 class="text-center">Houston. We have a problem.</h1>
		<h4 class="text-center" style="padding-bottom: 15%"> Something went wrong. It is possible that internet is broken,
			or that the world is coming to an end. <br>
			Either way, our experienced staff of technical monkeys are busy investigating the problem.
			<br>
			<br>
			<?php
			if(isset($errorCode))
			{
				echo "<p>Error Code: {$errorCode}.</p>";
			}
			?>

		</h4>
	</div>

	<?php
	// ---------------------------------------------
		$footerContent = $webPage->addFooter();
		echo $footerContent;
	?>