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

  require_once("ShoppingCart.class.php");

  class Purchase extends ShoppingCart{
	  private $deliveryAddress;
	  private $contactNumber;
	  private $creditCardNumber;
	  private $ccn;
	  private $userId;
	  private $cartId;


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
	  public function getCcn()
	  {
		  return $this->ccn;
	  }

	  /**
	   * @param mixed $ccn
	   */
	  public function setCcn( $ccn )
	  {
		  $this->ccn = $ccn;
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



  }