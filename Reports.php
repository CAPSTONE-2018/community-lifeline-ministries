<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="reports.css"/>
		<script src="ReportSelection.js"></script>
    </head>
	
	<body onload="onLoad()">
		
		<div class="selectReport">
			<button type ="button" class="btn btn-primary btn-lg" onclick="formSelector(1)">Volunteer/Employee Classroom List</button>
			<button type ="button" class="btn btn-primary btn-lg" onclick="formSelector(2)">All Students Enrolled</button><br /><br />
		</div>
		
		<form action="ClassroomScheduleReport.php" method="POST" display="none" id="classroomList">
			<label><h2>Volunteer/Employee Classroom List:</h2></label><br />
            <label><h4>Volunteer/Employee Id:</h4></label>
            <input type="text" name="id" /><br /></br />
			<input type="submit" value="Generate" /><br />
        </form>
		
		<form action="NewStudentsEnrolledReport.php" method="POST" display="none" id="studentsEnrolled">
			<label><h2>Students Enrolled in Term:</h2></label><br />
			<label><h4>School Year:</h4></label>
			<input type="text" name="schoolYear" /><br /><br />
			<input type="submit" value="Generate" /><br />
        </form>
	
	</body>

</html>
