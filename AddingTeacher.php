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
        <form action="TeacherAdded.php" method="POST" id="form2">
			<br>
			<label><h2>Add Teacher Information:</h2></label><br>
			<label><h4>Teacher Name:</h4>
                <input placeholder="First" type="text" name="f_name">
                <input placeholder="Last" type="text" name="l_name">
            </label>
            <br><br>
            
            <label><h4>Teacher ID Number:</h4><input type="text" name="teacher_id"></label>
            <br><br>			
			
            <label><h4>Address:</h4><input type="text" name="address"></label>
            <label><h4>City:</h4><input type="text" name="city"></label>
            <label><h4>Zipcode:</h4><input type="text" name="zipcode"></label>
            <br><br>
            
            <label><h4>Phone Number:</h4><input type="text" name="phone"></label>
            <label><h4>Email:</h4><input type="text" name="email"></label>
            <br><br>
            
			<input id="submit" type="submit" value="Submit"><br><br>
        </form>
        </div>
        
    </body>
</html>
