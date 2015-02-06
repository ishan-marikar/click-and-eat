<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/29/2014 at 8:22 PM
 * Project name : FinalProjectClickAndEat
 *
 * When I wrote this, only God and I understood what I was doing.
 * Now, God only knows.
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
	require_once("ShoppingCart.class.php");
	require_once("sms.class.php");

  class Purchase extends Database{
	  private $deliveryAddress;
	  private $contactNumber;
	  private $creditCardNumber;
	  private $cvc;
	  private $userId;
	  private $cartId;
	  private $cardName;

	  function __construct( $userId )
	  {
		  $this->userId = $userId;
		  $shoppingCart = new ShoppingCart();
		  $this->cartId = $shoppingCart->getUserCart($userId);
	  }


	  /**
	   * @return mixed
	   */
	  public function getCardName()
	  {
		  return $this->cardName;
	  }

	  /**
	   * @param mixed $cardName
	   */
	  public function setCardName( $cardName )
	  {
		  $this->cardName = $cardName;
	  }


	  /**
	   * @return mixed
	   */
	  public function getDeliveryAddress()
	  {
		  return $this->deliveryAddress;
	  }

	  /**
	   * @param mixed $deliveryAddress
	   */
	  public function setDeliveryAddress( $deliveryAddress )
	  {
		  $this->deliveryAddress = $deliveryAddress;
	  }

	  /**
	   * @return mixed
	   */
	  public function getCvc()
	  {
		  return $this->cvc;
	  }

	  /**
	   * @param mixed $ccn
	   */
	  public function setCvc( $ccn )
	  {
		  $this->cvc = $ccn;
	  }

	  /**
	   * @return mixed
	   */
	  public function getContactNumber()
	  {
		  // TODO: Validate phone number. Make sure number is in format: 94777830757
		  return $this->contactNumber;
	  }

	  /**
	   * @param mixed $contactNumber
	   */
	  public function setContactNumber( $contactNumber )
	  {
		  $this->contactNumber = $contactNumber;
	  }

	  /**
	   * @return mixed
	   */
	  public function getCreditCardNumber()
	  {
		  return $this->creditCardNumber;
	  }

	  /**
	   * @param mixed $creditCardNumber
	   */
	  public function setCreditCardNumber( $creditCardNumber )
	  {
		  // TODO: Validate Credit Card Number
		  $this->creditCardNumber = $creditCardNumber;
	  }

	  public function getUserPaymentDetails($userId){
		  $query = "SELECT * FROM payment WHERE userId= :userID LIMIT 1";
		  $queryParameters = array(
			":userID" => $userId
		  );
		  try {
			  $data = $this->query($query, $queryParameters);
			  return $data[0];
		  } catch (\Exception $ex) {
			  throw $ex;
		  }
	  }

	  public function save()
	  {
	  	$sql = "INSERT INTO `payment` (`user_id`, `cart_id`, `deliveryAddress`, `contactNo`, `creditcardNo`, `ccn`) VALUES (:userid, :cartid, :address, :contactNo, :creditCard, :ccn)";
	  	$params = array(
	  			":userid"=> $this->userId,
	  			":cartid" => $this->cartid,
	  			":address"=> $this->getDeliveryAddress(),
	  			":contactNo" => $this->getContactNumber(),
	  			":creditCard" => $this->getCreditCardNumber(),
	  			":ccn" => $this->getCvc()
	  		);
	  	$this->query($sql, $params);
	  	$sms = new sms();
	  	$fullNumber = "94".$this->getContactNumber;
	  	$sms->sendSMS($fullNumber);

	  }



  }