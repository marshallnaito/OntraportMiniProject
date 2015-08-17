<?php
	// Create a session to store the variables
	session_start();
    $_SESSION['fName'] = $_POST["firstName"];
	$_SESSION['lName'] = $_POST["lastName"];
	$_SESSION['emailAddress'] = $_POST["email"];
	$inputerror = false;

	// check to see if all user-input fields are filled in
	if ( ($_POST["firstName"]==null) or ($_POST["lastName"]==null) or ($_POST["email"]==null)){
		$inputerror = true;
		header('Refresh: 2; url=input_user.html');
		die ("ERROR: Please fill in all required fields.");
	}

	// make sure there wasn't an error in user input
	if($inputerror==false){
		
		// get credentials from user.credentials.ini
		$config = parse_ini_file('user.credentials.ini');
		$tablename = $config['tbname'];

		// // connect to database
		$link = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);

		// check if link was established correctly
		if (mysqli_connect_errno()){
			$inputerror = true;
			header('Refresh: 3; url=input_user.html');
			die ("Unable to connect to our database.\n" . mysqli_connect_error());
		}

		//add user into the database($_POST["firstName"]==null)
		$first_name = mysqli_real_escape_string($link, $_POST['firstName']);
		$last_name = mysqli_real_escape_string($link, $_POST['lastName']);
		$email_address = mysqli_real_escape_string($link, $_POST['email']);
		$query = "INSERT INTO $tablename (firstname, lastname, email) VALUES ('$first_name', '$last_name', '$email_address')";

		// check if added to the database
		if (!mysqli_query($link, $query)){
			$inputerror = true;
			header('Refresh: 3; url=input_user.html');
			die ("ERROR: $query not added correctly.\n" . mysqli_error($link));
		}
		mysqli_close($link);

		// check to see if there were no errors along the way
		if ($inputerror==false){
			header('Location: thank_you_page.php');
		}
	}

?>
