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
	if(empty($firstname) || empty($age) || empty($email)) {	
			
		if(empty($firstname)) {
			echo "<font color='red'>Firstname field is empty.</font><br/>";
		}
		
		if(empty($lastname)) {
			echo "<font color='red'>Lastname field is empty.</font><br/>";
		}
		
		if(empty($message)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET firstname='$firstname',lastname='$lastname',message='$message' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
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
	$email = $res['message'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>HVSYS Edit Data</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="/">HVSYS Project</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
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
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container" role="main">
			
			<br/><br/>

			<form action="edit.php" method="post" name="form1">
				<table width="25%" border="0">
					<tr> 
						<td>Firstname</td>
						<td><input type="text" name="firstname" value="<?php echo $firstname;?>"></td>
					</tr>
					<tr> 
						<td>Lastname</td>
						<td><input type="text" name="lastname" value="<?php echo $lastname;?>"></td>
					</tr>
					<tr> 
						<td>Message</td>
						<td><input type="text" name="email" value="<?php echo $message;?>"></td>
					</tr>
					<tr>
						<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
						<td><input type="submit" name="update" value="Update"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>


