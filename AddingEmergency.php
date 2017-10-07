<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adding.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    </head>
    
    <body>
        <form align="right" name="form" action="menu.php" method="POST">
            <label class="home">
            <input name="submit" type="submit" id="home" value="Home">
            </label>
        </form>
        
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">

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
