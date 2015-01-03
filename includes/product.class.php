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

namespace FinalProject;


class Product {


	protected $itemID;
	protected $itemName;
	protected $itemPrice;

	/**
	 * @return mixed
	 */
	public function getItemID()
	{
		return $this->itemID;
	}

	/**
	 * @param mixed $itemID
	 */
	public function setItemID( $itemID )
	{
		$this->itemID = $itemID;
	}

	/**
	 * @return mixed
	 */
	public function getItemName()
	{
		return $this->itemName;
	}

	/**
	 * @param mixed $itemName
	 */
	public function setItemName( $itemName )
	{
		$this->itemName = $itemName;
	}

	/**
	 * @return mixed
	 */
	public function getItemPrice()
	{
		return $this->itemPrice;
	}

	/**
	 * @param mixed $itemPrice
	 */
	public function setItemPrice( $itemPrice )
	{
		$this->itemPrice = $itemPrice;
	}

	public function __construct($id, $name, $price)	{
		$this->itemID = $id;
		$this->itemName = $name;
		$this->itemPrice = $price;
	}


} 