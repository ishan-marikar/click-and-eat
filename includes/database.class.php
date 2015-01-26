<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 11/18/2014 at 11:35 AM
 * Project name : FinalProject
 *
 * You might be asking me why I used 'PDO' (PHP Data Objects) instead of the usual MySQLi commands,
 * Many PHP programmers learned how to access (MySQL) databases by using either the MySQL or MySQLi extensions.
 * As of PHP 5.1, there's a better way. PHP Data Objects (PDO) provide methods for prepared statements
 * and working with objects that will make you far more productive.
 * .. and also, because I was having problems with mysqli.
 *
 * This is a relatively simple class with a few basic core functions, and you a welcome to add more
 * Functionality to it.
 *
 * For more information, read:
 * http://code.tutsplus.com/tutorials/why-you-should-be-using-phps-pdo-for-database-access--net-12059
 *
 * Use, reproduction, distribution, and modification of this code is subject to the terms and
 * conditions of the MIT license, available at http://www.opensource.org/licenses/mit-license.php
 */
namespace FinalProject;

// Show errors on systems with error reporting disabled
include_once "errorreporting.php";

class Database
{
	private $error;

	private function createConnection()
	{
		require_once("database.config.inc");
		try {
			// If we connect to the database, the database link is stored in $db, or else, it returns false,
			// and throws an exception, as to where the catch statement is executed.
			$dsn = "mysql:host=".HOST.";dbname=".DATABASE;
			$database  = new \PDO($dsn, USERNAME, PASSWORD);
			$database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $database;
		} catch (\Exception $ex) {
			throw $ex;
		}
		// This statement configures PDO to throw exceptions when it encounters errors, so we
		// could trap them using the try catch statement.

	}

	public function query( $query, $queryParameters )
	{
		try {
			// Create le connection
			$connection = $this->createConnection();
			// Have they specified any parameters?
			if (empty($queryParameters)) {
				// Nope, they haven't, so we run the query.
				$preparedStatement = $connection->query($query);
			} else {
				// Yep they have, so we prepare the query with the parameters
				$preparedStatement = $connection->prepare($query);
			}
			if (!empty($queryParameters)) {
				// and if they've specified the parameters, we finally execute it.
				$preparedStatement->execute($queryParameters);
			}

			// and we get the data in the end, and return it back.
			$result = $preparedStatement->fetchAll();
			// Tada!
			return $result;
		} catch (\Exception $ex) {
			// Uh-oh. Something went wrong. Better alert mission control.
			$GLOBALS['error'] = $ex->getMessage();
			// Throw the exception back so the developer could handle it at
			// a higher level.
			throw $ex;
		}
	}

	// the below classes are basically the same thing, just different names.
	public function insert( $query, $queryParameters )
	{
		try {
			$connection = $this->createConnection();
			$preparedStatement = $connection->prepare($query);
			$result = $preparedStatement->execute($queryParameters);
			//return $result;
			return $connection->lastInsertId();
		} catch (\Exception $ex) {
			$GLOBALS['error'] = $ex->getMessage();
			throw $ex;

		}
	}

	public function delete( $query, $queryParameters )
	{
		try {
			$connection = $this->createConnection();
			$preparedStatement = $connection->prepare($query);
			$result = $preparedStatement->execute($queryParameters);
			return $result;
		} catch (\Exception $ex) {
			$GLOBALS['error'] = $ex->getMessage();
			throw $ex;

		}
	}

	public function update( $query, $queryParameters )
	{
		try {
			$connection = $this->createConnection();
			$preparedStatement = $connection->prepare($query);
			$result = $preparedStatement->execute($queryParameters);
			return $result;
		} catch (\Exception $ex) {
			$GLOBALS['error'] = $ex->getMessage();
			throw $ex;

		}
	}

	public function isExists( $query, $queryParameters )
	{
		try {
			$connection = $this->createConnection();
			$preparedStatement = $connection->prepare($query);
			$preparedStatement->execute($queryParameters);
			$numOfRows = $preparedStatement->rowCount();
			if ($numOfRows != 0) {
				return true;
			} else {
				return false;
			}

		} catch (\Exception $ex) {
			$GLOBALS['error'] = $ex->getMessage();
			throw $ex;
		}
	}

	public function getError()
	{
		return $this->error;
	}

	public function getLastInsertId()
	{
		$connection = $this->createConnection();
		return $connection->lastInsertId();
	}
} 