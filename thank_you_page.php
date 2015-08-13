<?php
	// retrieve and store variables from the session
	session_start();
	$fName = $_SESSION['fName'];
	$lName = $_SESSION['lName'];
	$emailAddress = $_SESSION['emailAddress'];
	session_destroy();

	// echo thank you message
	echo "<html>";
	echo 	"<body>";
	echo 		"Thank you $fName.<br>";
	echo 		"You have been successfully added to our database.<br>";
	echo 	"</body>";
	echo "</html>";
?>