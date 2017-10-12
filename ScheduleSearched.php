<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="add.css"/>
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
        
        if ($stmt = $db->prepare("SELECT * FROM Schedule WHERE id_student=?")) {
        
            $stmt->bind_param('s', $id_student);
            
            $stmt->execute();
            
            $stmt->bind_result($class_name, $teacher, $teacher_f, $teacher_l, $id_student, $studfirst, $studlast, $room_num, $class_time);
            $stmt->fetch();
            if ($id_student == null) {
                echo "<h2>Schedule could not be located in the database, please try again.</h2>";
            } else {
                echo "<h2>Class Name: $class_name<br> Teacher ID Number: $teacher<br> Teacher First Name: $teacher_f<br> Teacher Last Name: $teacher_l<br> Student ID Number: $id_student<br> Student First Name: $studfirst<br>  Student Last Name: $studlast<br> Room Number: $room_num<br> Class Time: $class_time</h2>";  
            }
            $stmt->close();
        }        
        ?>
    </body>
</html>
