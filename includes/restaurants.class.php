<?php
	/**
	 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
	 * Started on   : 12/24/2014 at 9:09 AM
	 * Project name : FinalProjectClickAndEat
	 */

	namespace FinalProject;

	require_once("database.class.php");

	class Restaurants extends Database
	{


		private $restaurantID = "";
		private $restaurantName = "";
		private $restaurantAddress = "";
		private $restaurantContact = "";
		private $restaurantMenuId = "";
		private $restaurantRating = "";
		private $restaurantLogo = "";
		private $error = "";

		/**
		 * @return string
		 */
		public function getRestaurantID()
		{
			return $this->restaurantID;
		}

		/**
		 * @param string $restaurantID
		 */
		public function setRestaurantID( $restaurantID )
		{
			$this->restaurantID = $restaurantID;
		}

		/**
		 * @return string
		 */
		public function getRestaurantMenuId()
		{
			return $this->restaurantMenuId;
		}

		/**
		 * @param string $restaurantMenuId
		 */
		public function setRestaurantMenuId( $restaurantMenuId )
		{
			$this->restaurantMenuId = $restaurantMenuId;
		}

		public function getAllRestaurants()
		{
			$sql = "SELECT * from Restaurant";
			$queryParameters = ""; // No parameters yet
			$result = $this->query($sql, $queryParameters);

			return $result;
		}

		function getError()
		{
			return $this->error;
		}

		public function getRestaurantDetails( $restaurantId )
		{
			$sql = "SELECT * from Restaurant WHERE Restaurant_ID = :restaurantID";
			$queryParameters = array(
				':restaurantID' => $restaurantId
			);
			try {
				$result = $this->query($sql, $queryParameters);
				if ($result) {
					$this->setRestaurantID($result[0]['Restaurant_ID']);
					$this->setRestaurantName($result[0]['Restaurant_Name']);
					$this->setRestaurantAddress($result[0]['Address']);
					$this->setRestaurantContact($result[0]['Contact']);
					$this->setRestaurantMenuId($result[0]['Menu_No']);
					$this->setRestaurantRating($result[0]['rating']);
					$this->setRestaurantLogo($result[0]['restaurantLogo']);

					return true;
				}
			} catch (\Exception $ex) {
				$this->setError($ex->getMessage());

				return false;
			}
		}

		/**
		 * @param string $error
		 */
		private function setError( $error )
		{
			$this->error = $error;
		}

		public function createRestaurant()
		{
			$query = "INSERT INTO restaurant VALUES (NULL, :restaurantName, :restaurantAddress,:restaurantContact, NULL , :restaurantRating, :restaurantLogo)";
			$queryParams = array(
				":restaurantName"    => $this->getRestaurantName(),
				":restaurantAddress" => $this->getRestaurantAddress(),
				":restaurantContact" => $this->getRestaurantContact(),
				":restaurantRating"  => $this->getRestaurantRating(),
				":restaurantLogo"    => $this->getRestaurantLogo()
			);
			try {
				$id = $this->insert($query, $queryParams);

				return $id;
			} catch (\Exception $ex) {
				$this->setError($ex->getMessage());

				return false;
			}
		}

		/**
		 * @return string
		 */
		public function getRestaurantName()
		{
			return $this->restaurantName;
		}

		/**
		 * @param string $restaurantName
		 */
		public function setRestaurantName( $restaurantName )
		{
			$this->restaurantName = $restaurantName;
		}

		/**
		 * @return string
		 */
		public function getRestaurantAddress()
		{
			return $this->restaurantAddress;
		}

		/**
		 * @param string $restaurantAddress
		 */
		public function setRestaurantAddress( $restaurantAddress )
		{
			$this->restaurantAddress = $restaurantAddress;
		}

		/**
		 * @return string
		 */
		public function getRestaurantContact()
		{
			return $this->restaurantContact;
		}

		/**
		 * @param string $restaurantContact
		 */
		public function setRestaurantContact( $restaurantContact )
		{
			$this->restaurantContact = $restaurantContact;
		}

		/**
		 * @return string
		 */
		public function getRestaurantRating()
		{
			return $this->restaurantRating;
		}

		/**
		 * @param string $restaurantRating
		 */
		public function setRestaurantRating( $restaurantRating )
		{
			$this->restaurantRating = $restaurantRating;
		}

		/**
		 * @return string
		 */
		public function getRestaurantLogo()
		{
			return $this->restaurantLogo;
		}

		/**
		 * @param string $restaurantLogo
		 */
		public function setRestaurantLogo( $restaurantLogo )
		{
			$this->restaurantLogo = $restaurantLogo;
		}

		public function deleteRestaurant($restID){
			$query = "DELETE 'Restaurant' WHERE Restaurant_ID = :restID";
			$queryParameters = array(
				':userID' => $restID
			);
			try {
				$data = $this->query($query, $queryParameters);
				return true;
			} catch (\Exception $ex) {
				throw $ex;
				return false;
			}
		}

		public function updateRestaurant(Restaurants $rest){
			$query = "UPDATE [Restaurant] SET Restaurant_Name = :name, Address = :address, Contact = :contact, Rating = :rating , restaurantLogo = :logo WHERE Restaurant_ID = :restID;";
			$queryParameters = array(
				':restID' => $rest->getRestaurantID(),
				':name' => $rest->getRestaurantName(),
				':address' => $rest->getRestaurantAddress(),
				':contact' => $rest->getRestaurantContact(),
				':rating' => $rest->getRestaurantRating(),
				':logo' => $rest->getRestaurantLogo(),

			);
			try {
				$data = $this->query($query, $queryParameters);
				return true;
			} catch (\Exception $ex) {
				throw $ex;
				return false;
			}
		}

	}