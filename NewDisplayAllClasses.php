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
//Getting the query to search if the username and password are correct in the database
//Do not need prepared statements because there is NO user input for this query so there can be no sql injection attack


$query = "SELECT * FROM Class LEFT OUTER JOIN Schedule ON Class.Id = Schedule.Class_Id;";
$result = mysqli_query($db, $query);
?>

<html>
    <head>
        <!--<link rel="stylesheet" type="text/css" href="DisplayAll.css"/>-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="print.js"></script>
    </head>

    <body>
        <div class="container">

            <h1>Displaying All Classes:</h1>
            <br />

            <div id="print_div">
                <!--<link rel="stylesheet" type="text/css" href="DisplayAll.css"/>-->
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Class Name</th>
                            <th>Volunteer/Employee ID</th>
                            <th>Room Number</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Day</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo "<tr><td>";
                            echo $row['Class_Id']; //coming from Schedule table
                            echo "</td><td>";
                            echo $row['Class_Name']; //coming from Class table
                            echo "</td><td>";
                            echo $row['Volunteer_Id']; //coming from Class table
                            echo "</td><td>";
                            echo $row['Room_Number']; //coming from Schedule table
                            echo "</td><td>";
                            echo $row['Start_Time']; //coming from Schedule table
                            echo "</td><td>";
                            echo $row['End_Time']; //coming from Schedule table
                            echo "</td><td>";
                            echo $row['Day']; //coming from Schedule table
                            echo "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <input type="button" class="btn btn-primary btn-lg btn-block" onclick="printReport('print_div')" value="Print" />
        </div>
    </body>
</html>
