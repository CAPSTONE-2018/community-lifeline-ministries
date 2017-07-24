<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
?>

<html>
    
    <head>
        <link rel="stylesheet" type="text/css" href="menu.css"/>
    </head>
    
    <body>
        <form align="right" name="form" action="logout.php" method="POST">
            <label class="logout">
            <input name="submit" type="submit" id="logout" value="Logout">
            </label>
        </form>
        
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">
        
        <form action="AddingStudent.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Add Student:</h3></label><br>
            <input type="submit" value="Add"><br>
        </form> 
        
        <form action="AddingParent.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Add Parent:</h3></label><br>
            <input type="submit" value="Add"><br>
        </form> 
        
        <form action="AddingEmergency.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Add Emergency Information:</h3></label><br>
            <input type="submit" value="Add"><br>
        </form> 
        
        <form action="AddingTeacher.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Add Teacher:</h3></label><br>
            <input type="submit" value="Add"><br>
        </form> 
        
        <form action="AddingSchedule.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Add Schedule:</h3></label><br>
            <input type="submit" value="Add"><br>
        </form>
        
        <form action="SearchingInfo.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Search Student/Parent/Emergency Contact Information:</h3></label><br>
            <input type="submit" value="Search"><br>
        </form> 
        
        <form action="SearchingTeacher.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Search Teacher:</h3></label><br>
            <input type="submit" value="Search"><br>
        </form> 

        <form action="SearchingSchedule.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Search Schedule:</h3></label><br>
            <input type="submit" value="Search"><br>
        </form> 
        
        <form action="DisplayAllStudents.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Display All Students:</h3></label><br>
            <input type="submit" value="Display"><br>
        </form> 
        
        <form action="DisplayAllTeachers.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Display All Teachers:</h3></label><br>
            <input type="submit" value="Display"><br>
        </form> 
        
        <form action="DisplayAllSchedules.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Display All Schedules:</h3></label><br>
            <input type="submit" value="Display"><br>
        </form>
        
        <form action="Register.php" method="POST" class="selection" id="form">
            <br>
            <label><h3>Register Somone:</h3></label><br>
            <input type="submit" value="Register"><br>
        </form>
    </body>

</html>