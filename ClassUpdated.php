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
    <h1>Update Class Information:</h1>
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

    $id = $_SESSION['classId'];

    $className = $_POST['name'];
    $roomNum = $_POST['rnum'];
    $srtTime = $_POST['stime'];
    $endTime = $_POST['etime'];
    $day = $_POST['day'];




    $sql = "UPDATE Class SET Class_Name = '$className' WHERE Id = '$id' ;";

    if ($db->query($sql) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Class Name has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Class Name could not be updated, please try again.
                      </div>";
    }





    $sql2 = "UPDATE Schedule SET Room_Number = '$roomNum', Start_Time = '$srtTime', End_Time = '$endTime', Day = '$day' WHERE Class_Id = '$id';";
    if ($db->query($sql2) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Class Schedule has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Class Schedule could not be updated, please try again.
                      </div>";
    }


    ?>
</div>
</body>
</html>
