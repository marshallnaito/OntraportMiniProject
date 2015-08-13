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
	echo 		"You have successfully been added to our database<br><br>";
	echo 		"<b>Contact Information:</b><br>";
	echo 		"Name: $fName $lName<br>";
	echo 		"Email: $emailAddress<br>";
	echo 	"</body>";
	echo "</html>";
?>