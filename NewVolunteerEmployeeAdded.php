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

<label><h3>Add Test Score Information:</h3></label><br>


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



$id = intval($_POST['id']);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cellphone = $_POST['cellphone'];
$homephone = $_POST['homephone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = intval($_POST['zip']);
$email = $_POST['email'];
$type = $_POST['type'];
$program = $_POST['program'];




$stmt = $db->prepare("INSERT INTO Volunteer_Employee VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('isssssssisss', $id, $fname, $lname, $cellphone, $homephone, $address, $city, $state, $zip, $email, $type, $program);
$stmt->execute();


if ($stmt->affected_rows == -1) {
    echo "<h2>Volunteer/Employee could not be added to the database, please try again.</h2>";
}
else {
    echo "<h2>Volunteer/Employee has been successfully added to the database.</h2>";
    $stmt->close();
}
?>
</body>
</html>
