<?php
	// retrieve and store variables from contact
	include 'Contact3.php';

	// Get ID and retrieve info from database
	$contactID=$_GET['contactID'];
	$contact = new Contact();
	$contact->Fetch($contactID);

?>

<html>
	<link rel="stylesheet" type="text/css" href="thankyoupage.css">
	<body>
		<div class="thank-you-style">
			<h1> Thank you <?php echo $contact->FirstName; ?> </h1>
			<h1> You have successfully been added to our database </h1>
			<div id="cbox">
				<b>Contact Information: </b><br>
				ID:     <?php echo $contact->ID; ?> <br>
				First Name:     <?php echo $contact->FirstName; ?> <br>
				Last Name:     <?php echo $contact->LastName; ?> <br>
				Email:     <?php echo $contact->Email; ?> <br>
				<!-- <b>Contact Information: </b><br>
				ID:     Sample User <br>
				First Name:     Sample First Name  <br>
				Last Name:     Sample Last Name  <br>
				Email:     sample@email.com  <br> -->
			</div>
		</div>
	</body>
</html>