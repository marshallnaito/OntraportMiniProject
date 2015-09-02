<?php
	// retrieve and store variables from contact
	include 'Contact.php';
	// Get ID and retrieve info from database

	$contactID=$_GET['contactID'];

	$contact = Contact::Fetch($contactID);

	if (!$contact){
		die("Could not retrieve contact information.");	
	}

	// echo "<html>";
	// echo "	<link rel='stylesheet' type='text/css' href='thankyoupage.css'>";
	// echo "	<body>";
	// echo "		<div class='thank-you-style'>";
	// echo "			<h1> Thank you FirstName</h1>";
	// echo "			<h3> You have successfully been added to our database </h3>";
	// echo "			<div id='cbox'>";
	// echo "				<h2><b>Contact Information: </b></h2><br>";
	// echo "				ID:     <b>$contact->ID </b><br>";
	// echo "				First Name:     <b>$contact->FirstName  </b><br>";
	// echo "				Last Name:     <b>$contact->LastName  </b><br>";
	// echo "				Email:     <b>$contact->Email  </b><br>";
	// echo "			</div>";
	// echo "		</div>";
	// echo "	</body>";
	// echo "</html>";


	// echo "<html>";
	// echo "	<link rel='stylesheet' type='text/css' href='thankyoupage.css'>";
	// echo "	<body>";
	// echo "		<div class='thank-you-style'>";
	// echo "			<h1> Thank you FirstName</h1>";
	// echo "			<h3> You have successfully been added to our database </h3>";
	// echo "			<div id='cbox'>";
	// echo "				<ul>";
	// echo "					<li>";
	// echo "						<label for='cinfo'><h2><b>Contact Information: </b></h2></label>";
	// echo "					</li>";
	// echo "					<li>";
	// echo "						<label for='id'><b>$contact->ID </b></label>";
	// echo "						<input type='text' name='firstName' maxlength='40' required>";
	// echo "					</li>";
	// echo "					<li>";
	// echo "						<label for='firstname'><b>$contact->FirstName</label>";
	// echo "					</li>";
	// echo "					<li>";
	// echo "						<label for='lastname'><b>$contact->LastName</label>";
	// echo "					</li>";
	// echo "					<li>";
	// echo "						<label for='email'><b>$contact->Email</label>";
	// echo "					</li>";
	// echo "				</ul>";
	// echo "			</div>";
	// echo "		</div>";
	// echo "	</body>";
	// echo "</html>";

	echo "<html>";
	echo "	<link rel='stylesheet' type='text/css' href='thankyoupage.css'>";
	echo "	<body>";
	echo "		<div class='thank-you-style'>";
	echo "			<h1> Thank you FirstName</h1>";
	echo "			<h3> You have successfully been added to our database </h3>";
	echo "			<div id='cbox'>";
	echo "				<dl>";
	// echo "					<dt>Field:</dt>";
	// echo "					<dd>Info:</dd>";
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
