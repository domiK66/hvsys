<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
	$message = mysqli_real_escape_string($mysqli, $_POST['message']);
		
	// checking empty fields
	if(empty($firstname) || empty($lastname) || empty($message)) {
				
		if(empty($firstname)) {
			echo "<font color='red'>Firstname field is empty.</font><br/>";
		}
		
		if(empty($lastname)) {
			echo "<font color='red'>Lastname field is empty.</font><br/>";
		}
		
		if(empty($message)) {
			echo "<font color='red'>Message field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(firstname,lastname,message) VALUES('$firstname','$lastname','$message')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='guestbook.php'>View Results</a>";
	}
}
?>
</body>
</html>
