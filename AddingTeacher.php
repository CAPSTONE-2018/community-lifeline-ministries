<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adding.css"/>
    </head>
    
    <body>
        <form align="right" name="form" action="menu.php" method="POST">
            <label class="home">
            <input name="submit" type="submit" id="home" value="Home">
            </label>
        </form>
        
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">
        
        <form action="TeacherAdded.php" method="POST" id="form2">
			<br>
			<label><h2>Add Teacher Information:</h2></label><br>
            <label><h4>Teacher ID Number:</h4><input type="text" name="teacher_id"></label><br><br>
			<label><h4>Teacher First Name:</h4><input type="text" name="f_name"></label><br><br>
			<label><h4>Teacher Last Name:</h4><input type="text" name="l_name"></label><br><br>
			<label><h4>Phone Number:</h4><input type="text" name="phone"></label><br><br>
            <label><h4>Address:</h4><input type="text" name="address"></label><br><br>
            <label><h4>City:</h4><input type="text" name="city"></label><br><br>
            <label><h4>Zipcode:</h4><input type="text" name="zipcode"></label><br><br>
            <label><h4>Email:</h4><input type="text" name="email"></label><br><br>
			<input type="submit" value="Submit"><br><br>
        </form> 
        
    </body>
</html>