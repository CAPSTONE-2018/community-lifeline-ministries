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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h1>Update Volunteer/Employee Information:</h1>
    <br />


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

    session_start();

    $id = $_SESSION['testScoreId'];

    $term = $_POST['term'];
    $year = intval($_POST['year']);
    $preTest = floatval($_POST['pre_test']);
    $postTest = floatval($_POST['post_test']);





    $sql = "UPDATE School_Year SET Term = '$term', Year = '$year', Pre_Test = '$preTest', Post_Test = '$postTest'  WHERE Student_Id = '$id' ;";

    if ($db->query($sql) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Test Scores has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Test Scores could not be updated, please try again.
                      </div>";
    }




    ?>
</div>
</body>
</html>
