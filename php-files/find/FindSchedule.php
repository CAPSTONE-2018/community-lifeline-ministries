<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");


$studentId = $_POST['studentId'];

?>

<h1>Schedule Information:</h1>
<br/>

<?php

#todo add correct database query to get information on student and schedule

if ($stmt = $db->prepare("SELECT Student.Id, Student.First_Name, Student.Last_Name, Class.Class_Name, Schedule.Room_Number, Schedule.Start_Time, Schedule.End_Time, Schedule.Day
                                              FROM Student JOIN Enrolled ON
                                                Student.Id = Enrolled.Student_Id
                                                JOIN Class ON
                                                Enrolled.Class_Id = Class.Id
                                                JOIN Schedule ON
                                                Schedule.Class_Id = Class.Id
                                                WHERE Student.Id=?")
) {

    $stmt->bind_param('i', $studentId);

    $stmt->execute();


    $stmt->bind_result($studentId, $studentFirstName, $studentLastName, $className, $roomNumber, $startTime, $endTime, $day);

    $stmt->fetch();
    if ($studentId == null) {
        echo "<div class='alert alert-danger'>
                                    <strong>Failure! </strong>Schedule could not be located in the database, please try again.
                                  </div>";
    } else {
        echo "<table class=\"table table-condensed table-striped\">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Class Name</th>
                        <th>Room Number</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Day</th>
                    </tr>
                    </thead>
                    <tbody>";
        echo "<tr><td>";
        echo $studentId;
        echo "</td><td>";
        echo $studentFirstName;
        echo "</td><td>";
        echo $studentLastName;
        echo "</td><td>";
        echo $className;
        echo "</td><td>";
        echo $roomNumber;
        echo "</td><td>";
        echo $startTime;
        echo "</td><td>";
        echo $endTime;
        echo "</td><td>";
        echo $day;
        echo "</td></tr>";
        echo "</tbody>";
        echo "</table>";

    }
    $stmt->close();
}
include("../scripts/footer.php");
?>
