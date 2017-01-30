<?php

/* Infusionsoft OAuth2 Authentication
 * Crontab runs daily
 */

//Error Checking
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('UTC');

	require_once 'vendor/autoload.php';

	//Infusion Soft Client
	$infusionsoft = new Infusionsoft\Infusionsoft(array(
			'clientId'     => 'nwkq7y5mzjbr2cgwkj4ub6uy',
			'clientSecret' => '9qGdApUCU5',
			'redirectUri'  => 'https://register.hemeos.com/infusionsoft_token.php',
	));
	
	// Create database object
	$db = new Db();
	
	// Retrieve serialized token from database
	$result = $db -> select("SELECT `token` FROM `infusionsoft_token` WHERE `id_infusionsoft_token` = '1'");
	$oldtoken = $result[0]['token'];
	echo $oldtoken;

	$infusionsoft->setToken(unserialize( base64_decode($oldtoken)));
	$infusionsoft->refreshAccessToken();
	var_dump($infusionsoft);
	
	// Exchange the code for an access token
	if (isset($_GET['code']) and !$infusionsoft->getToken()) {
		$infusionsoft->requestAccessToken($_GET['code']);
	}
	
	if ($infusionsoft->getToken()) {
		// Save serialized token for subsequent requests
		$token =  base64_encode(serialize($infusionsoft->getToken()));
		echo 'Infusionsoft Token Successfully Received and Stored: ';

		$newtoken = $db -> query("UPDATE `infusionsoft_token` SET `token` = '" . $token . "' WHERE `id_infusionsoft_token` = '1'");		
		
		if($newtoken)
		{
				echo "Infusionsoft_token table successfully updated! ";
		}
		else
		{
				echo "Error: Insert to infusionsoft table";
				echo $db->error();
		}
	
	// Manual Infusionsoft Request
	} else {
		$url = $infusionsoft->getAuthorizationUrl();
		echo '<a href="' . $url . '">Click here to authorize</a>';
	}

	class Db {
	
		// Database connection
		protected static $connection;
	
		/**
		 * Connect to the database
		 *
		 * @return err on failure / mysqli MySQLi object instance on success
		 */
	
		public function connect() {
	
			// Connect to Hemeos Database
			if(!isset(self::$connection)) {
				// Load configuration as an array.
				$config = parse_ini_file('../config.ini');
				self::$connection = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname'],$config['port']);
				echo 'Connected to Hemeos Database, ';
			}
	
			// If connection was not successful, handle the error
			if(self::$connection === false) {
				// Handle error
				echo 'This Connection Failed, ';
				die();
			}
	
			return self::$connection;
		}
	
		public function finder() {
			// Connect to the database
			$connection = $this -> connect();
	
			// Find last ID
			$last_id = $connection -> insert_id;
	
			return $last_id;
		}
	
		/**
		 * Query the database
		 *
		 * @param $query The query string
		 * @return mixed The result of the mysqli::query() function
		 */
		public function query($query) {
			// Connect to the database
			$connection = $this -> connect();
	
			// Query the database
			$result = $connection -> query($query);
	
			return $result;
		}
	
		/**
		 * Fetch rows from the database (SELECT query)
		 *
		 * @param $query The query string
		 * @return error message on failure / array Database rows on success
		 */
		public function select($query) {
			$rows = array();
			$result = $this -> query($query);
			if($result === false) {
				//     echo 'Failed to retrieve rows from database';
			}
			//echo 'here';
			while ($row = $result -> fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}
	
		/**
		 * Fetch the last error from the database
		 *
		 * @return string Database error message
		 */
		public function error() {
			$connection = $this -> connect();
			return $connection -> error;
		}
	
		/**
		 * Quote and escape value for use in a database query
		 *
		 * @param string $value
		 * @return string The quoted and escaped string
		 */
		public function quote($value) {
			$connection = $this -> connect();
			//$connection -> strip_tags($value);
			return "'" . $connection -> real_escape_string($value) . "'";
		}
	}
?>