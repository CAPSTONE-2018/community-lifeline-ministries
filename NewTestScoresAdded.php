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
$term = $_POST['term'];
$year = intval($_POST['year']);
$preTest = floatval($_POST['pre_test']);
$postTest = floatval($_POST['post_test']);



$stmt = $db->prepare("INSERT INTO School_Year VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('isidd', $id, $term, $year, $preTest, $postTest);
$stmt->execute();


if ($stmt->affected_rows == -1) {
    echo "<h2>Test Scores could not be added to the database, please try again.</h2>";
}
else {
    echo "<h2>Test Scores have been successfully added to the database.</h2>";
    $stmt->close();
}
?>
</body>
</html>
