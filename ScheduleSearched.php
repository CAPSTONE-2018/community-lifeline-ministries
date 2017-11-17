<?php


/*******************************************
 * Where are the variables coming from in bind stmt
 *
 *
 *
 */
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="add.css"/>
        <script src="print.js"></script>
    </head>
    
    <body>
        
        <br><label><h3>Search Schedule Information:</h3></label><br>

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

            //old
            //$stmt->bind_result($class_name, $teacher, $teacher_f, $teacher_l, $id_student, $studfirst, $studlast, $room_num, $class_time);
            $stmt->bind_result($id_student, $studfirst, $studlast, $classname, $roomnum, $starttime, $endtime, $day);

            $stmt->fetch();
            if ($id_student == null) {
                echo "<h2>Schedule could not be located in the database, please try again.</h2>";
            } else {
                echo '<div id="print_div">';
                echo '<link rel="stylesheet" type="text/css" href="add.css"/>';
                echo "<h2>Student Id: $id_student<br> Student First Name: $studfirst<br> Student Last Name: $studlast<br> Class Name: $classname<br> Room Number: $roomnum<br> Start Time: $starttime<br>  End Time: $endtime<br> Day: $day</h2>";
                echo '</div>';
                echo '<input type="button" onclick="printReport(\'print_div\')" value="Print" />';
            }
            $stmt->close();
        }        
        ?>
    </body>
</html>
