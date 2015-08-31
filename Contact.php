<?php

class Contact
{
	// database variables
	private static $tname;
	private static $db;
	private static $connection;
	private static $instance;

	// table variables
	public static $ID=null;
	public static $FirstName;
	public static $LastName;
	public static $Email;

	// private function __construct() {
	// 	$config = parse_ini_file('user.credentials.ini');
	// 	$this->tname=$config['tbname'];
	// 	$this->connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
	// }

	private function __destruct() {
		mysqli_close($this->connection);
	}

	// Establishes and Returns a MySqli connection if one is not already present.
	public static function getConnection() {
		if (self::$connection==null){
			$config = parse_ini_file('user.credentials.ini');
			self::$tname=$config['tbname'];
			self::$connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			if (mysqli_connect_errno()){
				return false;
			} else {
				return self::$connection;
			}
		}
	}

	// setter
	public function setValue($field,$newValue)
	{
		$this->$field=$newValue;
	}

	// getter
	public function getValue($field)
	{
		return $this->$field;
	}

	public function save()
	{
		// connect to the database if not already connected
		$conn = self::getConnection();
		if (!$conn)
		{
			return false;
		}
		else {
			//add user into the database
			$query = "INSERT INTO " . self::$tname . " (firstname, lastname, email) VALUES ('$this->FirstName', '$this->LastName', '$this->Email')";
			if (!mysqli_query($conn, $query)){
				return false;
			} else {
				$this->setValue("ID", mysqli_insert_id($conn) );
				return true;
			}
		}
	}

	// Checks to see if there is an instance of the class already. Creates one if absent.
	public static function getInstance() {
		if(!self::$instance) {
			self::$instance = new static();
		}
		return self::$instance;
	}

	// Fetches the Contact's Values given an ID number
	// Returns a Class instance if the information was retrieved correctly, otherwise false
	public static function Fetch($cID){
		// create a static instance of the class
		$inst = self::getInstance();

		// establish connection and make the query
		$conn = self::getConnection();
		$qry = "SELECT firstname, lastname, email FROM " . self::$tname . " WHERE id=" . $cID;
		$result = mysqli_query($conn, $qry);

		// check to see if it is a valid query
		if (!$result){
			return false;
		} else {
			$info = mysqli_fetch_assoc($result);
			// // read in table entries into class
			$inst->ID = $cID;
		 	$inst->FirstName = $info['firstname'];
		 	$inst->LastName = $info['lastname'];
		 	$inst->Email = $info['email'];
		 	return $inst;
	 	}
	}

	// table info:
			// create table user_info(
		 //    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		 //    firstname VARCHAR(30) NOT NULL,
		 //    lastname VARCHAR(30) NOT NULL,
		 //    email VARCHAR(60) NOT NULL,
		 //    create_date TIMESTAMP
		 //    )
}
?>