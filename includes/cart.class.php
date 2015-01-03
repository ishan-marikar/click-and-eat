<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/29/2014 at 8:18 PM
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

class Cart extends Database {

	protected $items = array();
	public function __construct($userID)
	{
		if (session_id() == '') {
			session_start();
		}
	}

	public function AddItem(Product $item)
	{

	}

	public function RemoveItem(Product $item)
	{

	}

	public function IsEmpty(){
		return (empty($this->items));
	}

	public function ViewAll()
	{

	}

	public function GetTotal(){

	}
}