<?php
	// Create a session to store the variables
	
	include 'Contact.php';

	$contact = new Contact();

	$contact->setValue("FirstName", $_POST["firstName"]);
	$contact->setValue("LastName", $_POST["lastName"]);
	$contact->setValue("Email", $_POST["email"]);
	$contact->save();

	echo $contact->getValue("ID") . "<br>";
	echo $contact->getValue("FirstName") . "<br>";
	echo $contact->getValue("LastName") . "<br>";
	echo $contact->getValue("Email") . "<br>";

	$cID = $contact->getValue("ID");
	header("Location: thank_you_page.php?contactID=$cID");

	// session_start();
 //    $_SESSION['fName'] = $_POST["firstName"];
	// $_SESSION['lName'] = $_POST["lastName"];
	// $_SESSION['emailAddress'] = $_POST["email"];
	// $inputerror = false;

	// // check to see if all user-input fields are filled in
	// if ( ($_POST["firstName"]==null) or ($_POST["lastName"]==null) or ($_POST["email"]==null)){
	// 	header('Location: input_user.html');
	// 	die ("ERROR: Please fill in all required fields.");
	// }
		
	// // get credentials from user.credentials.ini
	// $config = parse_ini_file('user.credentials.ini');
	// $tablename = $config['tbname'];

	// // // connect to database
	// $link = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);

	// // check if link was established correctly
	// if (mysqli_connect_errno()){
	// 	//header('Location: input_user.html');
	// 	header("Refresh: 3, url=input_user.html");
	// 	die ("Unable to connect to our database.<br>" . mysqli_connect_error());
	// }

	// // table info:
	// // create table user_info(
 //    // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 //    // firstname VARCHAR(30) NOT NULL,
 //    // lastname VARCHAR(30) NOT NULL,
 //    // email VARCHAR(60) NOT NULL,
 //    // create_date TIMESTAMP
 //    // )

	// //add user into the database($_POST["firstName"]==null)
	// $first_name = mysqli_real_escape_string($link, $_POST['firstName']);
	// $last_name = mysqli_real_escape_string($link, $_POST['lastName']);
	// $email_address = mysqli_real_escape_string($link, $_POST['email']);
	// $query = "INSERT INTO {$config['tbname']} (firstname, lastname, email) VALUES ('$first_name', '$last_name', '$email_address')";


	// // check if added to the database
	// if (!mysqli_query($link, $query)){
	// 	//header('Location: input_user.html');
	// 	header("Refresh: 3, url=input_user.html");
	// 	die ("ERROR: $query not added correctly.<br>" . mysqli_error($link));
	// }
	// mysqli_close($link);

	// // Go to thank you page upon success
	// header('Location: thank_you_page.php');

?>
