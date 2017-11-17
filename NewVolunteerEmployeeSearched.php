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
    <script src="print.js"></script>
</head>

<body>

<br><label><h3>Search Volunteer/Employee Information:</h3></label><br>

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
#This will get the text from the add a teacher fields
$lname = $_POST['name'];
$id = $_POST['ID'];

if ($stmt = $db->prepare("SELECT * FROM Volunteer_Employee
                                  WHERE Last_Name=? AND Id=?")) {

    $stmt->bind_param('ss', $lname, $id);

    $stmt->execute();

    $stmt->bind_result($id, $firstName, $lastName, $cellphone, $homephone, $address, $city, $state, $zip, $email, $type, $program);
    $stmt->fetch();
    if ($lname == null or $id == null) {
        echo "<h2>Volunteer/Employee could not be located in the database, please try again.</h2>";
    } else {
        echo '<div id="print_div">';
        echo '<link rel="stylesheet" type="text/css" href="add.css"/>';
        echo "<h2>ID Number: $id<br> First Name: $firstName<br> Last Name: $lastName<br> Cell Phone: $cellphone<br> Home Phone: $homephone<br> Address: $address<br> City: $city<br> State: $state<br> Zipcode: $zip<br>Email: $email<br> Type: $type<br>Program: $program</h2>";
        echo '</div>';
        echo '<input type="button" onclick="printReport(\'print_div\')" value="Print" />';
    }
    $stmt->close();
}
?>
</body>
</html>
