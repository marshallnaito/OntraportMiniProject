<?php

	// create a session to store variables for future reference
	session_start();
    $_SESSION['fName'] = $_POST["firstName"];
	$_SESSION['lName'] = $_POST["lastName"];
	$_SESSION['emailAddress'] = $_POST["email"];
	$inputerror = false;

	// check to see if all user-input fields are filled in
	if ( ($_POST["firstName"]==null) or ($_POST["lastName"]==null) or ($_POST["email"]==null)){
		$inputerror = true;
		header('Refresh: 2; url=input_admin.html');
		die ("ERROR: Please fill in all required fields.");
	}

	if($inputerror==false){
		//declare variables for link
		$servername = "localhost"; 
		$username = "root";
		$password = "ko0plij";
		$dbname = "ontraport_users";
		$tbname = "user_info";

		// connect to database
		$link = mysqli_connect($servername, $username, $password);
		
		// access / create the database
		if (!mysqli_select_db($link, $dbname)) {
			$db_query = "CREATE DATABASE IF NOT EXISTS $dbname";
			if (!mysqli_query($link, $db_query)){
				$inputerror = true;
				header('Refresh: 3; url=input_admin.html');
				die ("ERROR: Database not created - " . mysqli_error($link));
			}
		}

		// check to see if connection was established correctly
		if (mysqli_connect_errno()){
			$inputerror = true;
			header('Refresh: 3; url=input_admin.html');
			die ("Unable to connect to our database.\n" . mysqli_connect_error());
		}

		mysqli_select_db($link, $dbname);

		// create a table if there isn't one already
		$db_query = "CREATE TABLE IF NOT EXISTS $tbname (firstname VARCHAR(20), lastname VARCHAR(20), email VARCHAR(40))";
		if (!mysqli_query($link, $db_query)){
			$inputerror = true;
			header('Refresh: 3; url=input_admin.html');
			die ("ERROR: Table not created - " . mysqli_error($link));
		}

		//add user into the database($_POST["firstName"]==null)
		$first_name = mysqli_real_escape_string($link, $_POST['firstName']);
		$last_name = mysqli_real_escape_string($link, $_POST['lastName']);
		$email_address = mysqli_real_escape_string($link, $_POST['email']);
		$query = "INSERT INTO $tbname (firstname, lastname, email) VALUES ('$first_name', '$last_name', '$email_address')";

		// check if added to the database
		if (!mysqli_query($link, $query)){
			$inputerror = true;
			header('Refresh: 3; url=input_admin.html');
			die ("ERROR: $query not added correctly.\n" . mysqli_error($link));
		}
		mysqli_close($link);

		// check to see if no errors along the way
		if ($inputerror==false){
			header('Location: thank_you_page.php');
		}

	}

?>
