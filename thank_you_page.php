<?php
	// retrieve and store variables from contact
	include 'Contact.php';
	// Get ID and retrieve info from database

	$contactID=$_GET['contactID'];

	$contact = Contact::Fetch($contactID);

	if (!$contact){
		die("Could not retrieve contact information.");	
	}

	echo "<html>";
	echo "	<link rel='stylesheet' type='text/css' href='thankyoupage.css'>";
	echo "	<body>";
	echo "		<div class='thank-you-style'>";
	echo "			<h1> Thank you FirstName</h1>";
	echo "			<h2> You have successfully been added to our database </h2>";
	echo "			<div id='cbox'>";
	echo "				<b>Contact Information: </b><br>";
	echo "				ID:     $contact->ID <br>";
	echo "				First Name:     $contact->FirstName  <br>";
	echo "				Last Name:     $contact->LastName  <br>";
	echo "				Email:     $contact->Email  <br>";
	echo "			</div>";
	echo "		</div>";
	echo "	</body>";
	echo "</html>";
?>
