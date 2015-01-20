<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/10/2015 at 5:35 PM
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

	require_once("database.class.php");
class ShoppingCart extends \FinalProject\Database{
	private $cartId;
	private $userId;



	public function getAllItems($userId)
	{
		$sql = "SELECT cart.cartId,
				cart.userId,
				cart_items.cartItem_ID,
				meal.meal_id, meal.mealName,
				meal.mealDescription,
				cart_items.quantity,
				meal.mealPrice, meal.restaurantId
				from cart
				INNER JOIN cart_items
				ON cart.cartId = cart_items.cartId
				INNER JOIN meal
				ON cart_items.meal_id = meal.meal_id
				WHERE userId = :userId";
		$queryParameters = array(
			":userId" => $userId
		); // No parameters yet
		$result = $this->query($sql, $queryParameters);

		return $result;
	}

	public function addToCart($productId,$quanitity)
	{

		$query = "INSERT INTO cart_items VALUES (NULL, :mealId, :quantity, :cartId )";
		$queryParams = array(
			":mealId"    => $productId,
			":quantity" => $quanitity,
			":cartId" => $this->getRestaurantContact(),
		);
		try {
			$id = $this->insert($query, $queryParams);

			return $id;
		} catch (\Exception $ex) {
			$this->setError($ex->getMessage());

			return false;
		}
	}

	public function removeFromCart($cartItemId)
	{

		$query = "DELETE 'cart_items' WHERE cartItem_id = :id";
		$queryParameters = array(
			':id' => $cartItemId
		);
		try {
			$data = $this->delete($query, $queryParameters);
			return true;
		} catch (\Exception $ex) {
			throw $ex;
			return false;
		}
	}

	public function getUserCart($userId)
	{
		$sql = "SELECT * from cart	WHERE userID = :userId";
		$queryParameters = array(
			":userId" => $userId
		); // No parameters yet
		$result = $this->query($sql, $queryParameters);
		$this->cartId =  $result[0]['cartId'];
		return $result[0]['cartId'];
	}

	public function updateQuantity($cartItemId, $quantity){
		$query = "UPDATE `cart_items` SET `quantity`=:quantity WHERE  `cartItem_ID`=:cartItem ;";
		$queryParameters = array(
			":quantity" => $quantity,
			':cartItem' => $cartItemId
		);

		try {
			$data = $this->update($query, $queryParameters);
			return true;
		} catch (\Exception $ex) {
			throw $ex;
			return false;
		}
	}


} 