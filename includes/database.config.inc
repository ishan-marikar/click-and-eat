<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 11/18/2014 at 11:57 AM
 * Project name : Database Class
 */
$isProduction = false;
if(!($_SERVER['HTTP_HOST']== "finalproject.local"))
{
	$isProduction = true;
}
if($isProduction) {
	define('HOST', 'localhost'); // The location of your database server
	define('DATABASE', 'clickand_database'); // What database do you need to connect to?
	define('USERNAME', 'clickand_shiyaz');  // The username you may need to connect to the database
	define('PASSWORD', '123icbt'); // The password you may need to connect to the database
}
	else{
		define('HOST', 'localhost'); // The location of your database server
		define('DATABASE', 'cne-database'); // What database do you need to connect to?
		define('USERNAME', 'root');  // The username you may need to connect to the database
		define('PASSWORD', ''); // The password you may need to connect to the database
	}