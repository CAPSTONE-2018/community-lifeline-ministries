<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="DisplayAll.css"/>
    </head>
    
    <body>
        
        <label><h2>Displaying All Schedules:</h2></label><br>

        
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
        //Getting the query to search if the username and password are correct in the database
        //Do not need prepared statements because there is NO user input for this query so there can be no sql injection attack
        $query = "SELECT * FROM Schedule;";
        $result = mysqli_query($db, $query);
        
        echo "<table>";
        echo "<tr><th>Class Name</th><th>Teacher ID Number</th><th>Student ID Number</th><th>Room Number</th><th>Class Time</th></tr>";
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['class_name'];
            echo "</td><td>";
            echo $row['teacher'];
            echo "</td><td>";
            echo $row['id_student'];
            echo "</td><td>";
            echo $row['room_num'];
            echo "</td><td>";
            echo $row['class_time'];
            echo "</td><td>";
        }
        
        //$row = mysqli_fetch_array($result);
        
        ?>
    </body>
</html>
