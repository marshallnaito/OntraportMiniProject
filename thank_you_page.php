<?php
	// retrieve and store variables from contact
	include 'Contact.php';

	$contactID=$_GET['contactID'];
	echo "$contactID <br>";

	$contact = new Contact();
	$contact->Fetch($contactID);

	// echo thank you message
	echo "<html>";
	echo 	"<body>";
	echo 		"Thank you $fName.<br>";
	echo 		"You have successfully been added to our database<br><br>";
	echo 		"<b>Contact Information:</b><br>";
	echo 		"ID Number: $contact->ID<br>";
	echo 		"First Name: $contact->FirstName<br>";
	echo 		"Last Name: $contact->LastName<br>";
	echo 		"Email: $contact->Email<br>";
	echo 	"</body>";
	echo "</html>";
?>