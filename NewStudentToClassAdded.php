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

<label><h3>Add Student to Class Information:</h3></label><br>


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

$studentId = intval($_POST['sid']);
$classId = $_POST['cid'];




$stmt = $db->prepare("INSERT INTO Enrolled (Student_Id, Class_Id) VALUES (?, ?)");
$stmt->bind_param('ii', $studentId, $classId);
$stmt->execute();


if ($stmt->affected_rows == -1) {
    echo "<h2>Student could not be added to the class, please try again.</h2>";
}
else {
    echo "<h2>Student has been successfully added to the class.</h2>";
    $stmt->close();
}

?>
</body>
</html>
