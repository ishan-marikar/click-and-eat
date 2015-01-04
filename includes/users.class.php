<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 11/29/2014 at 5:09 PM
 * Project name : WebApplicationDevelopment
 */

	namespace FinalProject;

require_once("database.class.php");

class Users extends Database
{
	private $userId = '';
	private $fullName = '';
	private $email = '';
	private $password = '';

	function __construct()
	{
		$this->email = '';
		$this->fullName = '';
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
	public function getFullName()
	{
		return $this->fullName;
	}

	/**
	 * @param string $fullName
	 */
	public function setFullName( $fullName )
	{
		$this->fullName = $fullName;
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
		$query = "INSERT INTO `users` VALUES (NULL, :email, :firstName, :password, 1, 1, NULL)";
		$queryParams = array(
			":firstName" => $this->getFullName(),
			":email" => $this->getEmail(),
			":password" => $this->getPassword(),
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
				$this->setUserId($data[0]['id']);
				$this->setFullName($data[0]["fullName"]);
				$this->setEmail($data[0]['email']);

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
			$this->setUserId($data[0]['id']);
			$this->setFullName($data[0]['fullName']);
			$this->setEmail($data[0]['email']);
			$this->getPassword($data[0]['password']);
			return true;
		} catch (\Exception $ex) {
			throw $ex;
			return false;
		}
	}


}