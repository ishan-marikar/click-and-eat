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
	private $active = '';
	private $permissions = '';
	function __construct()
	{
		$this->email = '';
		$this->fullName = '';
		$this->password = '';
		$this->active = '';
	}

	/**
	 * @return string
	 */
	public function getPermissions()
	{
		return $this->permissions;
	}

	/**
	 * @param string $permissions
	 */
	public function setPermissions( $permissions )
	{
		$this->permissions = $permissions;
	}



	/**
	 * @return string
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * @param string $active
	 */
	public function setActive( $active )
	{
		$this->active = $active;
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

	/**
	 * @return bool|void
	 */
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

	public function deleteUser($userID){
		$query = "DELETE 'Users' WHERE userID = :userID";
		$queryParameters = array(
			':userID' => $userID
		);
		try {
			$data = $this->delete($query, $queryParameters);
			return true;
		} catch (\Exception $ex) {
			throw $ex;
			return false;
		}
	}

	public function updateUser(Users $user){
		$query = "UPDATE [users] SET fullName = :name, email = :email, password = :password WHERE userID = :userID;";
		$queryParameters = array(
			':userID' => $user->getUserId(),
			':fullName' => $user->getFullName(),
			':email' => $user->getEmail(),
			':password' => $user->getPassword(),

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