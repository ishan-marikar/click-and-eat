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
		var_dump($currentUserID);
		var_dump($cartItems);
		var_dump($shoppingCart);
	}
		$headerContent = $webPage->addHeader();
	echo $headerContent;

// ---------------------------------------------
?>
	<div class="container wow fadeInRight" data-wow-delay="0.4s">

	<strong><p>Name: </p> <br></strong>
	<strong><p>Billing Address: </p> <br></strong>
	<strong><p>Items: </p> <br></strong>
	<strong><p>Name on Credit Card:</p></strong>
	<strong><p>Credit Card Number:</p></strong>

<div class="container">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>Item ID</th>
		<th>Food Item</th>
		<th>Price per unit</th>
		<th>Quantity</th>
		<th>Total Price</th>
		<th></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
		<?php if (!empty($cartItems)) {
		$total = 0;
		foreach ($cartItems as $item) {
		?>
		<tr>
			<td><?php echo $item['meal_id'] ?></td>
			<td><?php echo $item['mealName'] ?></td>
			<td><?php echo "Rs. " . $item['mealPrice'] ?></td>
				<td><?php echo($item['quantity']); ?></td>
				<td><?php $price = $item['mealPrice'] * $item['quantity'];
						echo "Rs. " . $price;
						$total = $total + $price;
					?>
				</td>

		</tr>
		<?php }
		} ?>
        <tr>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td class="lead"><strong>Total:</strong></td>
	        <td class="lead"><strong>Rs. <?php echo $total ?></strong></td>
        </tr>
	</tbody>
	</table>
	</div>
	</div>
	<button href="index.php">Finalise</button>

<?php
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>