<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adding.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
    <body>
        
        <div id="form_wrapper">
        <form action="NewVolunteerEmployeeSearched.php" method="POST" id="form2">
			<br>
			<label><h2>Search Volunteer/Employee Information:</h2></label><br>
			<label><h4>Volunteer/Employee Last Name:</h4><input type="text" name="name"></label><br><br>
			<label><h4>Volunteer/Employee ID Number:</h4><input type="text" name="ID"></label><br><br>
			<input id="submit" type="submit" value="Submit"><br><br>
		</form>
        </div>
    </body>

</html>
