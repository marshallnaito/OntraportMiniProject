<?php
class Contact3
{
	// variables
	public $ID=null;
	public $FirstName = '';
	public $LastName = '';
	public $Email = '';
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
		$config = parse_ini_file('user.credentials.ini');
		$link = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// check if link was established correctly
		if (mysqli_connect_errno()){
			header('Location: input_user.html');
			//header("Refresh: 3, url=input_user.html");
			die ("Unable to connect to our database.<br>" . mysqli_connect_error());
		}
		//add user into the database
		$query = "INSERT INTO {$config['tbname']} (firstname, lastname, email) VALUES ('$this->FirstName', '$this->LastName', '$this->Email')";
		// check if added to the database
		if (!mysqli_query($link, $query)){
			header('Location: input_user.html');
			//header("Refresh: 3, url=input_user.html");
			die ("ERROR: $query not added correctly.<br>" . mysqli_error($link));
		} else {
			$this->setValue("ID", mysqli_insert_id($link) );
		}
		mysqli_close($link);
	}
	
	// retrieve contact info from the database
	public function Fetch($cID){
		$config = parse_ini_file('user.credentials.ini');
		$link = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// check if link was established correctly
		if (mysqli_connect_errno()){
			header('Location: input_user.html');
			//header("Refresh: 3, url=input_user.html");
			die ("Unable to connect to our database.<br>" . mysqli_connect_error());
		}
		// get the relevant contact information from the database
		$qry = "SELECT firstname, lastname, email FROM {$config['tbname']} WHERE id=$cID";
		$result = mysqli_query($link, $qry) or die("Could not retrieve contact information");
		$info = mysqli_fetch_assoc($result);
		// read in table entries into class
		$this->ID = $cID;
	 	$this->FirstName = $info['firstname'];
	 	$this->LastName = $info['lastname'];
	 	$this->Email = $info['email'];
	 	//close connections
	 	mysqli_free_result($result);
		mysqli_close($link);
	}
	// table info:
			// create table user_info(
		    // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		    // firstname VARCHAR(30) NOT NULL,
		    // lastname VARCHAR(30) NOT NULL,
		    // email VARCHAR(60) NOT NULL,
		    // create_date TIMESTAMP
		    // )
}
?>