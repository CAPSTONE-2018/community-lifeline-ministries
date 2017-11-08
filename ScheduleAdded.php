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
        
        <label><h3>Add Schedule Information:</h3></label><br>

        
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
        #This will get the text from the add a schedule information fields
        
        #Adding schedule information based on the information the user added into the "add" fields
        $stmt = $db->prepare("INSERT INTO Schedule VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
       
        $stmt->bind_param('sssssssss',  $class_name, $teacher, $teacher_f, $teacher_l, $id_student, $studfirst, $studlast, $room_num, $class_time);
		
        $class_name = $_POST['class_name'];
		$teacher = $_POST['teacher'];
		$teacher_f = $_POST['teacher_f'];
		$teacher_l = $_POST['teacher_l'];
        $id_student = $_POST['id_student'];
        $studfirst = $_POST['studfirst'];
        $studlast = $_POST['studlast'];
        $room_num = $_POST['room_num'];
        $class_time = $_POST['class_time'];

        $stmt->execute();
        
        if ($stmt->affected_rows == -1) {
            echo "<h2>Schedule could not be added to the database, please try again.</h2>";
        } else {
            echo "<h2>Schedule successfully added to the database.</h2>";        
            $stmt->close();
        }
        ?>
    </body>
</html>
