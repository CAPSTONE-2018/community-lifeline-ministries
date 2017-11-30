<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

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
#This will get the text from the add a schedule fields
$id_student = $_POST['id_student'];
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="add.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">

            <h1>Search Schedule Information:</h1>
            <br />

           <?php

            if ($stmt = $db->prepare("SELECT Student.Id, Student.First_Name, Student.Last_Name, Class.Class_Name, Schedule.Room_Number, Schedule.Start_Time, Schedule.End_Time, Schedule.Day
                                              FROM Student JOIN Enrolled ON
                                                Student.Id = Enrolled.Student_Id
                                                JOIN Class ON
                                                Enrolled.Class_Id = Class.Id
                                                JOIN Schedule ON 
                                                Schedule.Class_Id = Class.Id
                                                WHERE Student.Id=?")) {

                $stmt->bind_param('i', $id_student);

                $stmt->execute();


                $stmt->bind_result($id_student, $studfirst, $studlast, $classname, $roomnum, $starttime, $endtime, $day);

                $stmt->fetch();
                if ($id_student == null) {
                    echo "<div class='alert alert-danger'>
                                    <strong>Failure! </strong>Schedule could not be located in the database, please try again.
                                  </div>";
                } else {
                    echo "<h2> Schedule Information: </h2><br>";

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
                    echo $id_student;
                    echo "</td><td>";
                    echo $studfirst;
                    echo "</td><td>";
                    echo $studlast;
                    echo "</td><td>";
                    echo $classname;
                    echo "</td><td>";
                    echo $roomnum;
                    echo "</td><td>";
                    echo $starttime;
                    echo "</td><td>";
                    echo $endtime;
                    echo "</td><td>";
                    echo $day;
                    echo "</td></tr>";
                    echo "</tbody>";
                    echo "</table>";

                }
                $stmt->close();
            }
            ?>
        </div>
    </body>
</html>
