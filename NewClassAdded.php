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
$className = $_POST['name'];
$volunteerId = intval($_POST['vid']);
$roomNum = $_POST['rnum'];
$srtTime = $_POST['stime'];
$endTime = $_POST['etime'];
$day = $_POST['day'];



$stmt = $db->prepare("INSERT INTO Class VALUES (?, ?, ?)");
$stmt->bind_param('isi', $id, $className, $volunteerId);
$stmt->execute();


if ($stmt->affected_rows == -1) {
    echo "<h2>Class could not be added to the database, please try again.</h2>";
}
else {
    echo "<h2>Class has been successfully added to the database.</h2>";
    $stmt->close();
}

$stmt = $db->prepare("INSERT INTO Schedule (Class_Id, Room_Number, Start_Time, End_Time, Day) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('issss', $id, $roomNum, $srtTime, $endTime, $day);
$stmt->execute();


if ($stmt->affected_rows == -1) {
    echo "<h2>Schedule could not be added to the database, please try again.</h2>";
}
else {
    echo "<h2>Schedule has been successfully added to the database.</h2>";
    $stmt->close();
}

?>
</body>
</html>
