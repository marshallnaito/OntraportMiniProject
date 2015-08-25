<?php
	// retrieve and store variables from contact
	include 'Contact.php';
	// Get ID and retrieve info from database
	$contactID=$_GET['contactID'];
	$contact = new Contact();
	$contact->Fetch($contactID);

	
	// // if ($contact->Fetch($contactID)==false){
	// // 	header('Location: input_user.html');
	// // 	//header("Refresh: 3, url=input_user.html");
	// // 	die ("Unable to connect to our database.<br>" . mysqli_connect_error());
	// // } else {
	// // 	$contact->Fetch($contactID);
	// // }

	// $contact->Fetch($contactID);

	//$contact = Fetcher($contactID);





	// $contact = Contact::Fetcher($_GET['contactID']);


	// echo thank you message
	echo "<html>";
	echo 	"<body>";
	echo 		"Thank you $contact->FirstName.<br>";
	echo 		"You have successfully been added to our database<br><br>";
	echo 		"<b>Contact Information:</b><br>";
	echo 		"ID Number: $contact->ID<br>";
	echo 		"First Name: $contact->FirstName<br>";
	echo 		"Last Name: $contact->LastName<br>";
	echo 		"Email: $contact->Email<br>";
	echo 	"</body>";
	echo "</html>";
?>