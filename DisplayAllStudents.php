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
        
        <label><h2>Displaying All Students:</h2></label><br>

        
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
        $query = "SELECT * FROM Students;";
        $result = mysqli_query($db, $query);
        
        echo "<table>";
        echo "<tr><th>Student ID Number</th><th>Last Name</th><th>First Name</th><th>Age</th><th>Gender</th><th>Birth Date</th><th>Address</th><th>Zip Code</th>
        <th>City</th><th>School</th><th>Program</th><th>Ethnicity</th><th>Permission Slip</th><th>Birth Certificate</th><th>School Year</th><th>Reduced Lunch Eligible</th><th>Pre-Test Score</th><th>Post-Test Score</th></tr>";
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['student_id'];
            echo "</td><td>";
            echo $row['l_Name'];
            echo "</td><td>";
            echo $row['f_name'];
            echo "</td><td>";
            echo $row['age'];
            echo "</td><td>";
            echo $row['gender'];
            echo "</td><td>";
            echo $row['birth_date'];
            echo "</td><td>";
            echo $row['address'];
            echo "</td><td>";
            echo $row['zip_code'];
            echo "</td><td>";
            echo $row['city'];
            echo "</td><td>";
            echo $row['school'];
            echo "</td><td>";
            echo $row['program'];
            echo "</td><td>";
            echo $row['ethnicity'];
            echo "</td><td>";
            echo $row['permission_slip'];
            echo "</td><td>";
            echo $row['birth_certificate'];
            echo "</td><td>";
            echo $row['school_year'];
            echo "</td><td>";
            echo $row['reduced_lunch_eligible'];
            echo "</td><td>";
            echo $row['pre_test'];
            echo "</td><td>";
            echo $row['post_test'];
            echo "</td><td>";
        }
        
        //$row = mysqli_fetch_array($result);
        
        ?>
    </body>
</html>
