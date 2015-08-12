<?php
	//echo info to the webpage
	echo "<html>";
	echo 	"<body>";
	echo 		"Administrative Form Results: <br> <br>";
	echo 		"<b>First Name: </b>".$_POST["firstName"]."<br>";
	echo 		"<b>Last Name: </b>".$_POST["lastName"]."<br>";
	echo 		"<b>Email: </b>".$_POST["email"]."<br> <br>";
	echo 	"</body>";
	echo "</html>";

	// check to see if user input is complete.
	if ( ($_POST["firstName"]==null) or ($_POST["lastName"]==null) or ($_POST["email"]==null)){
		die("ERROR: Please fill in all required fields.\n");
	}

	//declare variables for link
	$servername = "localhost"; 
	$username = "root";
	$password = "ko0plij";
	$dbname = "ontraport_users";
	$tbname = "user_info";

	$link = mysqli_connect($servername, $username, $password) or die ("Unable to connect to the database.");

	// access / create the database
	if (!mysqli_select_db($link, $dbname)) {
		$db_query = "CREATE DATABASE IF NOT EXISTS $dbname";
		if (!mysqli_query($link, $db_query)){
			echo "ERROR: Database not created - " . mysqli_error($link);
		}
	}

	if (mysqli_connect_errno()) {
		echo "ERROR: Could not connect to mysql -  " . mysqli_connect_errno();
	}

	mysqli_select_db($link, $dbname);

	// create a table if there isn't one already
	$db_query = "CREATE TABLE IF NOT EXISTS $tbname (firstname VARCHAR(20), lastname VARCHAR(20), email VARCHAR(40))";
	if (!mysqli_query($link, $db_query)){
		echo "ERROR: Table not created - " . mysqli_error($link);
	}

	//add user into the database($_POST["firstName"]==null)
	$first_name = mysqli_real_escape_string($link, $_POST['firstName']);
	$last_name = mysqli_real_escape_string($link, $_POST['lastName']);
	$email_address = mysqli_real_escape_string($link, $_POST['email']);
	$query = "INSERT INTO $tbname (firstname, lastname, email) VALUES ('$first_name', '$last_name', '$email_address')";

	// check if added to the database
	if (mysqli_query($link, $query)){
		echo "User info was successfully added to the database.";
	} else {
		echo "ERROR: $query not added correctly." . mysqli_error($link);

	}
	mysqli_close($link);
?>
