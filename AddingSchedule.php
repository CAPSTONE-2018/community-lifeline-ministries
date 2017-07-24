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
        
        <form action="ScheduleAdded.php" method="POST" id="form2">
			<br>
			<label><h2>Add Schedule Information:</h2></label><br>
			<label><h4>Class Name:</h4><input type="text" name="class_name"></label><br><br>
			<label><h4>Teacher ID Number:</h4><input type="text" name="teacher"></label><br><br>
			<label><h4>Teacher First Name:</h4><input type="text" name="teacher_f"></label><br><br>
			<label><h4>Teacher Last Name:</h4><input type="text" name="teacher_l"></label><br><br>
            <label><h4>Student ID Number:</h4><input type="text" name="id_student"></label><br><br>
            <label><h4>Student First Name:</h4><input type="text" name="studfirst"></label><br><br>
            <label><h4>Student Last Name:</h4><input type="text" name="studlast"></label><br><br>
            <label><h4>Room Number:</h4><input type="text" name="room_num"></label><br><br>
            <label><h4>Class Time (HH:MMAM/PM):</h4><input type="text" name="class_time"></label><br><br>

            <input type="submit" value="Submit"><br><br>
        </form> 
    
    </body>

</html>