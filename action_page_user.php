<?php
	//echo info to the webpage
	echo "<html>";
	echo 	"<body>";
	echo 		"Form Results: <br> <br>";
	echo 		"<b>First Name: </b>".$_POST["firstName"]."<br>";
	echo 		"<b>Last Name: </b>".$_POST["lastName"]."<br>";
	echo 		"<b>Email: </b>".$_POST["email"]."<br> <br>";
	echo 	"</body>";
	echo "</html>";

	// check to see if all user-input fields are filled in
	if ( ($_POST["firstName"]==null) or ($_POST["lastName"]==null) or ($_POST["email"]==null)){
		die("ERROR: Please fill in all required fields.\n");
	}

	// declare variables for link
	$servername = "localhost"; 
	$username = "root";
	$password = "ko0plij";
	$dbname = "ontraport_users";
	$tbname = "user_info";

	// try and connect to database, otherwise exit
	$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Unable to connect to the database.");

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
