<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/30/2014 at 12:34 PM
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
	require_once("includes/shoppingcart.class.php");
	$shoppingCart = new ShoppingCart();
	$webPage = new \FinalProject\WebPage("Shopping Cart");
	$headerContent = $webPage->addHeader();
	echo $headerContent;
// ---------------------------------------------
	if (isset($_SESSION['currentUserID'])) {
		$currentUserID = $_SESSION['currentUserID'];
		$cartItems = $shoppingCart->getAllItems($currentUserID);
		$shoppingCart->getUserCart($currentUserID);
	}

	if(isset($_REQUEST['action'])) {
		if($_REQUEST['action'] == "add") {
			if (isset($_REQUEST['product_id'])) {
				$productId = $_REQUEST['product_id'];
				$shoppingCart->addToCart($productId, 1);
			}
		}
		if($_REQUEST['action'] == "delete")
		{
			if(isset($_REQUEST['cart_item'])){
				$cartItems = $_REQUEST['cart_item'];
				$shoppingCart->removeFromCart($cartItems);
			}
		}

		if($_REQUEST['action'] == "update")
		{
			if(isset($_REQUEST['cart_item']) && $_REQUEST['quantity']){
				$cartItems = $_REQUEST['cart_item'];
				$quantity = $_REQUEST['quantity'];
				$shoppingCart->updateQuantity($cartItems, $quantity);
			}
		}

	}

?>
	<div class="container">
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Item ID</th>
			<th>Food Item</th>
			<th>Quantity</th>
			<th>Price</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
<?php if(!empty($cartItems)){
	$total = 0;
	foreach($cartItems as $item){?>
		<tr>
			<td><?php echo $item['meal_id']?></td>
			<td><?php echo $item['mealName'] ?></td>
			<td><?php echo("<input value='{$item['quantity']}'>")?></td>
			<td><?php $price =  $item['mealPrice'] * $item['quantity'];
					echo $price;
					$total = $total + $price;
				?></td>
			<td><a href="<?php echo("shoppingcart.php?action=delete&cart_item=".$item['cartItem_ID']); ?>">Delete</a></td>
			<td><a href="<?php echo("shoppingcart.php?action=update&cart_item=".$item['cartItem_ID']."?quantity=");?>">Update</a></td>
		</tr>
	<?php }?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><strong>Total: </strong></td>
		<td><?php echo $total ?></td>
	</tr>

		<?php }
	else {
		echo("<h4>No items in the shopping cart.</h4>");
	}?>
		</tbody>
		</table>

	</div>
<?php
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>