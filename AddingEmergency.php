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
        <form action="EmergencyAdded.php" method="POST" id="form2">
			<br>
			
			<label><h2>Add Emergency Contact Information:</h2></label><br>
			<label><h4>Student Name:</h4>
                <input placeholder="First" type="text" name="studf">
                <input placeholder="Last" type="text" name="studl">
            </label>
            <br><br>
            
            <label><h4>Student ID Number:</h4><input type="text" name="id"></label>
            <br><br>
            
			<label>
                <h4>Emergency Contact Name:</h4>
                <input placeholder="First" type="text" name="fname">
                <input placeholder="Last" type="text" name="lname">
            </label>
            <br><br>
            
			<label><h4>Relationship:</h4><input type="text" name="rel"></label>
			<br><br>
			
            <label><h4>Phone Number:</h4><input type="text" name="pnum"></label>
            <br><br>
            
			<input id="submit" type="submit" value="Submit"><br><br> 
        </form>
        </div>
    </body>

</html>
