<?php
	// retrieve and store variables from contact
	include 'Contact.php';

	// Get ID and retrieve info from database
	$contactID=$_GET['contactID'];
	$contact = new Contact();
	$contact->Fetch($contactID);

	// echo thank you message
	echo "<html>";
	//echo "<link rel="stylesheet" type="text/css" href="thankyoupage.css">";
	echo 	"<body>";
	//echo 		"<div class="thank-you-style">";
	echo 				"Thank you $contact->FirstName.<br>";
	echo 				"You have successfully been added to our database<br><br>";
	echo 				"<b>Contact Information:</b><br>";
	echo 				"ID Number: $contact->ID<br>";
	echo 				"First Name: $contact->FirstName<br>";
	echo 				"Last Name: $contact->LastName<br>";
	echo 				"Email: $contact->Email<br>";
	//echo 		"</div>";
	echo 	"</body>";
	echo "</html>";
?>