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
        
        <form action="ParentAdded.php" method="POST" id="form2">
			<br>
			<label><h2>Add Parent Information:</h2></label><br>
			<label><h4>Student ID Number:</h4><input type="text" name="id"></label><br><br>
			<label><h4>Student First Name:</h4><input type="text" name="childf"></label><br><br>
            <label><h4>Student Last Name:</h4><input type="text" name="childl"></label><br><br>
			<label><h4>Parent First Name:</h4><input type="text" name="fname"></label><br><br>
            <label><h4>Parent Last Name:</h4><input type="text" name="lname"></label><br><br>
            <label><h4>Phone Number:</h4><input type="text" name="phone"></label><br><br>
			<label><h4>Income:</h4><input type="text" name="income"></label><br><br>
			<input type="submit" value="Submit"><br><br>
        </form>
        
    </body>

</html>