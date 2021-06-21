<?php
	// including the database connection file
	include_once("config.php");

	if(isset($_POST['update']))
	{	

		$id = mysqli_real_escape_string($mysqli, $_POST['id']);
						
		$firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
		$message = mysqli_real_escape_string($mysqli, $_POST['message']);
		
		// checking empty fields
		if(empty($firstname) || empty($age) || empty($message)) {	
			if(empty($firstname)) {
				echo "<font color='red'>Firstname field is empty.</font><br/>";
			}
									
			if(empty($lastname)) {
				echo "<font color='red'>Lastname field is empty.</font><br/>";
			}
									
			if(empty($message)) {
				echo "<font color='red'>Message field is empty.</font><br/>";
			}	
		} else {
			//updating the table
			$result = mysqli_query($mysqli, "UPDATE users SET firstname='$firstname',lastname='$lastname',message='$message' WHERE id=$id");
			echo "haha";
			header("Location: guestbook.php");
		}
	
	}

?>

<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$firstname = $res['firstname'];
	$lastname = $res['lastname'];
	$message = $res['message'];
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>HVSYS Edit Data</title>
    </head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-xl">
                <a class="navbar-brand" href="/">HVSYS_Project_1_15</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample07XL">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/guestbook.php">Guestbook</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/snake.html">Snake Game JS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/domiK66/hvsys">Github</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container" role="main">
			<br/><br/>
			<h1>Edit Data</h1>

			<form action="" method="post" name="form1">
				<table border="0">
					<tr> 
						<td>Firstname</td>
						<td><input class="form-control" type="text" name="firstname" value="<?php echo $firstname;?>"></td>
					</tr>
					<tr> 
						<td>Lastname</td>
						<td><input class="form-control" type="text" name="lastname" value="<?php echo $lastname;?>"></td>
					</tr>
					<tr> 
						<td>Message</td>
						<td><input class="form-control" type="text" name="message" value="<?php echo $message;?>"></td>
					</tr>
					<tr>
						<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
						<td>
							<input class="btn btn-success mt-4" type="submit" name="update" value="Update">
							<a class="btn btn-primary mt-4" href="guestbook.php">Back</a>
						</td>
					</tr>
				</table>
			</form>

			<p class="mt-4">Project by Dominik Kainz, Mensur Bukarevic & Lukas Dworacek</p>
            <p>Copyright by <a href="https://www.fh-joanneum.at">www.fh-joanneum.at</a></p>

		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	</body>
</html>


