<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>HVSYS secure webserver</title>
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

		    <a href="add.html" class="btn btn-xs btn-success">Add New Data</a><br/><br/>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <table data-toggle="table" class="table table-striped">
                        <thead>
                            <tr>
                                <th data-sortable="true">Firstname</td>
                                <th data-sortable="true">Lastname</td>
                                <th data-sortable="true">Message</td>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($res = mysqli_fetch_array($result)) { 		
                                    echo "<tr>";
                                    echo "<td>".$res['firstname']."</td>";
                                    echo "<td>".$res['lastname']."</td>";
                                    echo "<td>".$res['message']."</td>";	
                                    echo "<td><a href=\"edit.php?id=$res[id]\" class="btn btn-xs btn-primary">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class="btn btn-xs btn-danger">Delete</a></td>";		
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <p class="mt-4">Project by Dominik Kainz, Mensur Bukarevic & Lukas Dworacek
            </p>
            <p>Copyright by <a href="https://www.fh-joanneum.at">www.fh-joanneum.at</a></p>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>