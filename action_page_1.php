<html>
	<body>
		<!-- echo the results -->
		Results:<br><br>
		First Name: <?php echo $_POST["firstName"]; ?><br>
		Last Name: <?php echo $_POST["lastName"]; ?><br>
		Email: <?php echo $_POST["email"]; ?> <br> <br>
		<?php
			//assign variables
			$servername = "localhost";
			$username = "root";
			$password = "ko0plij";
			$databasename = "ontraportminidatabase";
			$link = mysqli_connect($servername, $username, $password, $databasename);
			// Check mysql connection
			if($link === false){
			    die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			//create variables for table entries
			$first_name = mysqli_real_escape_string($link, $_POST['firstName']);
			$last_name = mysqli_real_escape_string($link, $_POST['lastName']);
			$email_address = mysqli_real_escape_string($link, $_POST['email']);

			//insert info into table
			$sql = "INSERT INTO userinfo (firstname, lastname, email) VALUES ('$first_name', '$last_name', '$email_address')";
			
			//check to see if info was added
			if(mysqli_query($link, $sql)){
			    echo "User info was successfully added to database.";
			} else{
			    echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
			}
			mysqli_close($link);
		?>
	</body>
</html>