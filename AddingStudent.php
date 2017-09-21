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
        
        <form action="StudentAdded.php" method="POST" id="form2">
			<br>
			<label><h2>Add Student Information:</h2></label><br>
			<label><h4>Student First Name:</h4><input type="text" name="fname"></label><br><br>
            <label><h4>Student Last Name:</h4><input type="text" name="lname"></label><br><br>
            <label><h4>Student ID Number:</h4><input type="text" name="id"></label><br><br>
			<label><h4>Date of Birth (YYYY/MM/DD):</h4><input type="text" name="dob"></label><br><br>
			<label><h4>Age:</h4><input type="text" name="age"></label><br><br>
			<label><h4>Gender (M or F):</h4><input type="text" name="gender"></label><br><br>
            <label><h4>Ethnicity:</h4><input type="text" name="ethnicity"></label><br><br>
            <label><h4>Address:</h4><input type="text" name="address"></label><br><br>
            <label><h4>City:</h4><input type="text" name="city"></label><br><br>
            <label><h4>Zip Code:</h4><input type="text" name="zip"></label><br><br>
            <label><h4>School:</h4><input type="text" name="school"></label><br><br>
            <label><h4>Program Name:</h4><input type="text" name="program"></label><br><br>
            <label><h4>Permission Slip on File (Y or N):</h4><input type="text" name="permission_slip"></label><br><br>
            <label><h4>Birth Certificate on File (Y or N):</h4><input type="text" name="birth_certificate"></label><br><br>
            <label><h4>School Year:</h4><input type="text" name="school_year"></label><br><br>
            <label><h4>Pre-Test Score:</h4><input type="text" name="pre_test"></label><br><br>
            <label><h4>Post-Test Score:</h4><input type="text" name="post_test"></label><br><br>
            <input type="submit" value="Submit"><br><br>
        </form>
        
    </body>

</html>