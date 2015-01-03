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
	include_once("includes/webpage.class.php");
	session_start();

	$webPage = new \FinalProject\WebPage("Shopping Cart");
	$headerContent = $webPage->addHeader();
	echo $headerContent;
// ---------------------------------------------
?>
	<div class="container wow fadeInRight" data-wow-delay="0.4s">
                <h1>Summary</h1>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Food</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>French Fries</td>
                        <td>Rs. 120</td>
                        <td><a href="">Add to Cart</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Submarine</td>
                        <td>Rs. 180</td>
                        <td><a href="">Add to Cart</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Chicken Bucket</td>
                        <td>Rs. 200</td>
                        <td><a href="">Add to Cart</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pizza</td>
                        <td>Rs. 400</td>
                        <td><a href="">Add to Cart</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>

<?php
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>