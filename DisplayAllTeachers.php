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
        
        <label><h2>Displaying All Teachers:</h2></label><br>

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
        $query = "SELECT * FROM Teachers;";
        $result = mysqli_query($db, $query);
        
        echo "<table>";
        echo "<tr><th>Teacher ID Number</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Address</th><th>City</th><th>Zip Code</th><th>Email</th></tr>";
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['teacher_id'];
            echo "</td><td>";
            echo $row['f_name'];
            echo "</td><td>";
            echo $row['l_name'];
            echo "</td><td>";
            echo $row['phone'];
            echo "</td><td>";
            echo $row['address'];
            echo "</td><td>";
            echo $row['city'];
            echo "</td><td>";
            echo $row['zipcode'];
            echo "</td><td>";
            echo $row['email'];
            echo "</td><td>";
        }
        
        //$row = mysqli_fetch_array($result);
        
        ?>
    </body>
</html>
