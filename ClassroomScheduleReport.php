<?php
include("scripts/header.php");

//connect to database
include("db/config.php");

//need to confirm where this is coming from
$volunteerId = $_POST['id'];

$stmt = "SELECT Volunteer_Employee.First_Name, Volunteer_Employee.Last_Name, Class.Class_Name, Schedule.Room_Number, Schedule.Start_Time, Schedule.End_Time, Schedule.Day
                FROM Volunteer_Employee
                JOIN Class ON
                Volunteer_Employee.Id = Class.Volunteer_Id
                JOIN Schedule ON
                Class.Id = Schedule.Class_Id
                WHERE Volunteer_Employee.Id ='$volunteerId'";

$result = mysqli_query($db, $stmt);
$records = array();
$header = array("Class Name", "Room Number", "Start Time", "End Time", "Day");
array_push($records, $header);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">
            <div id="print_div">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>Class Name</th>
						<th>Room Number</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Day</th>
                    </tr>
                    </thead>
                    <tbody>';

    while($row = mysqli_fetch_assoc($result)) {
        $line = array($row["Class_Name"], $row["Room_Number"], $row["Start_Time"],
						$row["End_Time"], $row["Day"]);
		array_push($records, $line);
        echo "<tr>";
		echo "<td>" . $row["Class_Name"] . "</td>";
		echo "<td>" . $row["Room_Number"] . "</td>";
		echo "<td>" . $row["Start_Time"] . "</td>";
		echo "<td>" . $row["End_Time"] . "</td>";
		echo "<td>" . $row["Day"] . "</td>";
		echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "<br />";

	$serialized =htmlspecialchars(serialize($records));
  ?>
  <form class="form-horizontal" action="scripts/exportReport.php" method="POST">
    <input type="hidden" name="Records" value="<?php echo $serialized ?>"/>
    <input type="hidden" name="filename"  value="Classroom_Schedule_Report"/>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
                <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
            </div>
          </div>
      </div>
      <div class="row">
          <div class="form-group">
            <div class="col-lg-12">
              <input type="submit" class="btn btn-primary pull-right" name="submit" value="Export" />
            </div>
        </div>
    </div>
  </form>


<script src="scripts/print.js"></script>
<?php

}
else {
    echo "0 results";
}

mysqli_close($db);
include("scripts/footer.php");
?>
