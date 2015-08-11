<?php

	//echo info to the webpage
	echo "<html>";
	echo 	"<body>";
	echo 		"Results: <br> <br>";
	echo 		"First Name: ".$_POST["firstName"]."<br>";
	echo 		"Last Name: ".$_POST["lastName"]."<br>";
	echo 		"Email: ".$_POST["email"]."<br>";
	echo 	"</body>";
	echo "</html>";

	//declare variables for link
	$servername = "localhost"; 
	$username = "root";
	$password = "ko0plij";
	$databasename = "ontraport_users";

	// connect to the mysql database
	$link_id = mysqli_connect($servername, $username, $password, $databasename);
	if ($link_id== false){
		die( "ERROR: Could not connect. ". mysqli_connect_error() );
	}

	//add user into the database
	$first_name = mysqli_real_escape_string($link_id, $_POST['firstName']);
	$last_name = mysqli_real_escape_string($link_id, $_POST['lastName']);
	$email_address = mysqli_real_escape_string($link_id, $_POST['email']);
	$sql = "INSERT INTO userinfo (firstname, lastname, email) VALUES ('$first_name', '$last_name', '$email_address')";

	// check if added to the database
	if (mysqli_query($link_id, $sql)){
		echo "User info was successfully added to the database.";
	} else {
		echo "ERROR: $sql not added correctly." . mysqli_error($link_id);

	}
	mysql_close($link_id);
?>
