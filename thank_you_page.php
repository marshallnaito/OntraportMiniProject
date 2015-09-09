<?php
	// retrieve and store variables from contact
	include 'Contact.php';

	// Get ID and retrieve info from database
	$contactID=$_GET['contactID'];
	$contact = Contact::Fetch($contactID);

	if (!$contact){
		die("Error: Could not retrieve contact information.");
	}

	echo "<html>";
	echo "	<link rel='stylesheet' type='text/css' href='thankyoupage.css'>";
	echo "	<body>";
	echo "		<div class='thank-you-style'>";
	echo "			<h1> Thank you $contact->FirstName</h1>";
	echo "			<h3> You have successfully been added to our database </h3>";
	echo "			<div id='cbox'>";
	echo "				<dl>";
	echo "					<h2> Contact Information: </h2>";
	
	echo "					<dt>ID:</dt>";
	echo "					<dd> $contact->ID </dd>";

	echo "					<dt>First Name:</dt>";
	echo "					<dd> $contact->FirstName </dd>";

	echo "					<dt>Last Name:</dt>";
	echo "					<dd> $contact->LastName </dd>";

	echo "					<dt>Email:</dt>";
	echo "					<dd> $contact->Email</dd>";
	echo "				</dl>";
	echo "			</div>";
	echo "		</div>";
	echo "	</body>";
	echo "</html>";

?>
