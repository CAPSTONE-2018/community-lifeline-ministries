<?php

    include("scripts/header.php");
?>

		<script src="scripts/reportSelection.js"></script>

	<body onload="onLoad()">

		<div class="selectReport">
			<button type ="button" class="btn btn-primary btn-lg" onclick="formSelector(1)">Volunteer/Employee Classroom List</button>
			<button type ="button" class="btn btn-primary btn-lg" onclick="formSelector(2)">All Students Enrolled</button><br /><br />
		</div>

		<form class="form-horizontal" action="classroomScheduleReport.php" method="POST" display="none" id="classroomList">
      <div class="row">
          <div class="form-group">
            <div class="col-lg-4">
                <label><h2>Volunteer/Employee Id:</h2></label><br />
                <input id="id" class="form-control" placeholder="id" type="text" name="id">
            </div>
        </div>
      </div>
			<input type="submit" class="btn btn-primary" value="Generate" /><br />
        </form>

		<form class="form-horizontal" action="studentsEnrolledReport.php" method="POST" display="none" id="studentsEnrolled">
      <div class="row">
          <div class="form-group">
            <div class="col-lg-8">
              <label><h2>Students Enrolled in Term:</h2></label><br />
              <input id="id" class="form-control" placeholder="school year" type="text" name="schoolYear">
            </div>
        </div>
      </div>
      <input type="submit" class="btn btn-primary" value="Generate" /><br />
      </form>

	<?php include("scripts/footer.php"); ?>
