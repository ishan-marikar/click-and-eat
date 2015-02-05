<?php
if(isset($_POST['userId']) && isset($_POST['cartString']))
{
  require_once("../includes/shoppingcart.class.php");
  $shoppingCart = new ShoppingCart();
  $user_id = $_POST['userId'];
	$cart_string = $_POST['cartString'];
  $cartData = json_decode($cart_string, true);
  $shoppingCart->getUserCart($user_id);
  
  foreach ($cartData as $item) {
      $shoppingCart->addToCart($item['itemID'], $item['itemQty']);
      //also part of the array, just remember = $item['itemTotal']
  }

}
