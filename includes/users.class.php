<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 11/29/2014 at 5:09 PM
 * Project name : WebApplicationDevelopment
 */
require_once("class.database.php");

class Users extends Database
{
	private $userId = '';
	private $firstName = '';
	private $lastName = '';
	private $email = '';
	private $password = '';
	private $isAdmin = 0;

	function __construct()
	{
		$this->email = '';
		$this->firstName = '';
		$this->isAdmin = 0;
		$this->lastName = '';
		$this->password = '';
	}

	/**
	 * @return string
	 */
	public function getUserId()
	{
		return $this->userId;
	}

	/**
	 * @param string $userId
	 */
	public function setUserId( $userId )
	{
		$this->userId = $userId;
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail( $email )
	{
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @param string $firstName
	 */
	public function setFirstName( $firstName )
	{
		$this->firstName = $firstName;
	}

	/**
	 * @return boolean
	 */
	public function isAdmin()
	{
		return $this->isAdmin;
	}

	/**
	 * @param boolean $isAdmin
	 */
	public function setIsAdmin( $isAdmin )
	{
		$this->isAdmin = $isAdmin;
	}

	/**
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * @param string $lastName
	 */
	public function setLastName( $lastName )
	{
		$this->lastName = $lastName;
	}

	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword( $password )
	{
		$this->password = md5($password);
	}

	public function registerUser()
	{
		$query = "INSERT INTO `users` VALUES (NULL, :firstName, :lastName, :email, :password, :isAdmin)";
		$queryParams = array(
			":firstName" => $this->getFirstName(),
			":lastName" => $this->getLastName(),
			":email" => $this->getEmail(),
			":password" => $this->getPassword(),
			":isAdmin" => $this->isAdmin()
		);
		try {
			$id = $this->insert($query, $queryParams);
			return $id;
		} catch (Exception $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function login( $email, $password )
	{
		$query = "SELECT * FROM users WHERE email=:emailAddress and password=:password";
		$queryParameters = array(
			':emailAddress' => $email,
			':password' => md5($password)
		);
		try {
			$data = $this->query($query, $queryParameters);
			if ($data) {
				$this->setUserId($data[0]['userID']);
				$this->setFirstName($data[0]["firstName"]);
				$this->setLastName($data[0]['lastName']);
				$this->setEmail($data[0]['email']);
				$this->setIsAdmin($data[0]['isAdmin']);

				return true;
			} else {
				return false;
			}

		} catch (\Exception $ex) {
			throw $ex;
			return false;
		}
	}

	public function getUserDetails( $userID )
	{
		$query = "SELECT * FROM users WHERE userID = :userID";
		$queryParameters = array(
			':userID' => $userID
		);
		try {
			$data = $this->query($query, $queryParameters);
			$this->setUserId($data[0]['userID']);
			$this->setFirstName($data[0]['firstName']);
			$this->setLastName($data[0]['lastName']);
			$this->setEmail($data[0]['email']);
			$this->getPassword($data[0]['password']);
			$this->setIsAdmin($data[0]['isAdmin']);
			return true;
		} catch (\Exception $ex) {
			throw $ex;
			return false;
		}
	}


}