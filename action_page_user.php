<?php

	include 'Contact.php';

	// Create an instance of the Contact Class and add it to the database
	$contact = new Contact();
	$contact->setValue("FirstName", $_POST["firstName"]);
	$contact->setValue("LastName", $_POST["lastName"]);
	$contact->setValue("Email", $_POST["email"]);

	if (!$contact->save()) {
		die ("Sorry. Contact Information was not correctly added to the database.");
	}
	else {
		// retrieve the contact ID and send it ot the thank you page
		$cID = $contact->getValue("ID");
		//header("Location: thankyoupage.php?contactID=$cID");
		//header("Location: thankyoupage.html");
		header("Location: thank_you_page.php?contactID=$cID");
	}

?>
