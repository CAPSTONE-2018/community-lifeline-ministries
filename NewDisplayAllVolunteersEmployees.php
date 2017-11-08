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
    <script src="print.js"></script>
</head>

<body>

<label><h2>Displaying All Volunteer/Employee:</h2></label><br>

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
$query = "SELECT * FROM Volunteer_Employee;";
$result = mysqli_query($db, $query);

echo "<div id=\"print_div\">";
echo '<link rel="stylesheet" type="text/css" href="DisplayAll.css"/>';
echo "<table>";
echo "<tr><th>ID Number</th><th>First Name</th><th>Last Name</th><th>Cell Phone</th><th>Home Phone</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Email</th><th>Type</th><th>Program</th></tr>";

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr><td>";
    echo $row['Id'];
    echo "</td><td>";
    echo $row['First_Name'];
    echo "</td><td>";
    echo $row['Last_Name'];
    echo "</td><td>";
    echo $row['Phone_Cell'];
    echo "</td><td>";
    echo $row['Phone_Home'];
    echo "</td><td>";
    echo $row['Address'];
    echo "</td><td>";
    echo $row['City'];
    echo "</td><td>";
    echo $row['State'];
    echo "</td><td>";
    echo $row['Zip'];
    echo "</td><td>";
    echo $row['Email'];
    echo "</td><td>";
    echo $row['Type'];
    echo "</td><td>";
    echo $row['Program'];
    echo "</td><td>";
}

//$row = mysqli_fetch_array($result);
echo "</table>";
echo "</div>";
echo "<br />";
echo '<input type="button" onclick="printReport(\'print_div\')" value="Print" />';
?>
</body>
</html>
