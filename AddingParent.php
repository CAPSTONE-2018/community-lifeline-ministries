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
        <form action="ParentAdded.php" method="POST" id="form2">
			<br>
			
			<label><h2>Add Parent Information:</h2></label><br>
			<label><h4>Student Name:</h4>
                <input placeholder="First" type="text" name="childf">
                <input placeholder="Last" type="text" name="childl">
            </label>
            <br><br>
            
            <label><h4>Student ID Number:</h4><input type="text" name="id"></label>
            <br><br>
            
			<label><h4>Parent Name:</h4>
                <input placeholder="First" type="text" name="fname">
                <input placeholder="Last" type="text" name="lname">
            </label>
            <br><br>
            
            <label><h4>Phone Number:</h4><input type="text" name="phone"></label>
            <br><br>
            
			<label><h4>Income:</h4><input type="text" name="income"></label>
			<br><br>
			
			<input id="submit" type="submit" value="Submit"><br><br>
        </form>
        </div>
    </body>

</html>
