<?php

class Contact
{
	// db variables
	private static $tname;
	private static $db;
	private static $connection;

	private static $instance;

	// tb variables
	public static $ID=null;
	public static $FirstName;
	public static $LastName;
	public static $Email;

	// private function __construct() {
	// 	$config = parse_ini_file('user.credentials.ini');
	// 	$this->tblname=$config['tbname'];
	// 	$this->connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
	// }

	private function __destruct() {
		//$this->connection->close();
		mysqli_close($this->connection);
	}

	public function checkConnection() {
		if ($this->connection==null){
			$config = parse_ini_file('user.credentials.ini');
			$this->tname=$config['tbname'];
			$this->connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			if (mysqli_connect_errno()){
				return false;
			} else {
				return true;
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

	// push Contact info into the db.
	public function save()
	{
		$this->checkConnection();
		//add user into the database
		$query = "INSERT INTO $this->tname (firstname, lastname, email) VALUES ('$this->FirstName', '$this->LastName', '$this->Email')";
		// check if added to the database
		if (!mysqli_query($this->connection, $query)){
			header('Location: input_user.html');
			//header("Refresh: 3, url=input_user.html");
			die ("ERROR: $query not added correctly.<br>" . mysqli_error($this->connection));
		} else {
			$this->setValue("ID", mysqli_insert_id($this->connection) );
		}

		mysqli_close($this->connection);
	}

	
	// retrieve contact info from the database
	public function Fetch($cID){
		$this->checkConnection();
		// get the relevant contact information from the database
		$qry = "SELECT firstname, lastname, email FROM $this->tname WHERE id=$cID";
		$result = mysqli_query($this->connection, $qry) or die("Could not retrieve contact information");
		$info = mysqli_fetch_assoc($result);

		// read in table entries into class
		$this->ID = $cID;
	 	$this->FirstName = $info['firstname'];
	 	$this->LastName = $info['lastname'];
	 	$this->Email = $info['email'];

	 	//close connections
	 	mysqli_free_result($result);
	 	mysqli_close($this->connection);

	}

	public static function Fetcher($cID){
		if (self::$instance==null){
			self::$instance = new self();
		}
		return self::instance;
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