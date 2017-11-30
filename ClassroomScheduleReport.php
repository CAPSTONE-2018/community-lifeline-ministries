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
    <script src="print.js"></script>
</head>

<body>
<?php
//Setting up variable to use for mysqli function
$server = "localhost";
$user = "clm_user";
$psw = "dbuser";
$database = "community_lifeline";

//Connecting to database
$db = mysqli_connect($server, $user, $psw, $database);
if (!$db) {
    print "Error - Could not connect to MySQL";
    exit;
}

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
	echo "<div>";
	echo '<form action="ExportClassroomScheduleReport.php" method="POST">';
	echo "<input type=\"hidden\" name=\"Records\" value=\"$serialized\"/>";
	echo '<input type="button" class="btn btn-primary btn-lg btn-block" onclick="printReport(\'print_div\')" value="Print" />';
	echo "<input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" name=\"submit\" value=\"Export\" />"; 
	echo '</form>';
	echo "</div>";
	
}
else {
    echo "0 results";
}

mysqli_close($db);
?>
</body>

</html>
