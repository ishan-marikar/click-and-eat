<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/30/2014 at 1:13 PM
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

namespace FinalProject;

require_once("database.class.php");

class Analytics extends Database {


	public function getTotalUsers(){
		return $this->queryTotalFromTable("users", null);
	}
	public function getTotalActivatedUsers(){
		return $this->queryTotalFromTable("users", "active = '1'");
	}

	public function getTotalRegisteredRestaurants(){
		return $this->queryTotalFromTable("restaurant", null);
	}

	public function getTotalProducts(){
		return $this->queryTotalFromTable("products", null);
	}
	public function getTotalCarts(){
		return $this->queryTotalFromTable("products", null);
	}
	public function getTotalCartsPurchased(){
		return $this->queryTotalFromTable("products", "purchased = '1'");
	}

	private function queryTotalFromTable($table, $condition)
	{
		if(is_null($condition)) {
			$query = "SELECT COUNT(*) FROM " . $table;
			$queryParameters = null;
		}
		else{
			$query = "SELECT COUNT(*) FROM " . $table. " WHERE ". $condition;
			$queryParameters = null;
		}
		try {
			$data = $this->query($query, $queryParameters);
			return $data[0][0];
		} catch (\Exception $ex) {
			throw $ex;
			return false;
		}
	}
} 