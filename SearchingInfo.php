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
        
        <form action="InfoSearched.php" method="POST" id="form2">
			<br>
			<label><h2>Search Student/Parent/Emergency Contact Information:</h2></label><br>
			<label><h4>Student Last Name:</h4><input type="text" name="name"></label><br><br>
			<label><h4>Student ID Number:</h4><input type="text" name="child_id"></label><br><br>
			
            <input type="submit" value="Submit"><br><br>
		</form>

    </body>

</html>