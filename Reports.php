<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="reports.css"/>
		<script src="ReportSelection.js"></script>
    </head>
	
	<body onload="onLoad()">
		<form align="right" name="form" action="menu.php" method="POST">
			<label class="home">
			<input name="submit" type="submit" id="home" value="Home">
			</label>
		</form>
		
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">
		
		<div class="selectReport">
			<button onclick="formSelector(1)">Teacher Classroom List</button><br /><br />
			<button onclick="formSelector(2)">All Students Enrolled</button><br /><br />
		</div>
		
		<form action="ClassroomStudentsReport.php" method="POST" display="none" id="classroomList">
			<label><h2>Volunteer/Employee Classroom List:</h2></label><br />
			<label><h4>Volunteer/Employee First Name:</h4></label>
			<input type="text" name="teacherFirstName" /><br />
			<label><h4>Volunteer/Employee Last Name:</h4></label>
			<input type="text" name="teacherLastName" /><br /></br />
            <label><h4>Volunteer/Employee Id:</h4></label>
            <input type="text" name="id" /><br /></br />
			<input type="submit" value="Generate" /><br />
        </form>
		
		<form action="StudentsEnrolledReport.php" method="POST" display="none" id="studentsEnrolled">
			<label><h2>Students Enrolled in Term:</h2></label><br />
			<label><h4>School Year:</h4></label>
			<input type="text" name="schoolYear" /><br /><br />
			<input type="submit" value="Generate" /><br />
        </form>
	
	</body>

</html>