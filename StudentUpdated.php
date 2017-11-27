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
    <h1>Update Student Information:</h1>
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

    $id = $_SESSION['studentId'];
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $ethnicity = $_POST['ethnicity'];
    $address = $_POST['address'];
    $zip = intval($_POST['zip']);
    $city = $_POST['city'];
    $state = $_POST['state'];
    $school = $_POST['school'];
    $program = $_POST['program'];
    $permission_slip = intval($_POST['permission_slip']);
    $birth_certificate = intval($_POST['birth_certificate']);
    $reduced_lunch_eligible = intval($_POST['reduced_lunch_eligible']);
    $iep = intval($_POST['iep']);


    $allergyType = $_POST['atype'];
    $allergyNote = $_POST['anote'];

    $sql = "UPDATE Student SET First_Name = '$fname', Last_Name = '$lname', Gender = '$gender', Birth_Date = '$dob', Address = '$address', City = '$city', State = '$state', Zip = '$zip', Ethnicity = '$ethnicity', School = '$school', Program = '$program', Permission_Slip = '$permission_slip', Birth_Certificate = '$birth_certificate', Reduced_Lunch_Eligible = '$reduced_lunch_eligible', IEP = '$iep' WHERE Id = '$id' ;";

    if ($db->query($sql) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Student has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Student could not be updated, please try again.
                      </div>";
    }





    $sql2 = "UPDATE Allergy SET Type = '$allergyType', Note = '$allergyNote' WHERE Student_Id = '$id';";
    if ($db->query($sql2) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Student Allergy has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Student Allergy could not be updated, please try again.
                      </div>";
    }


    ?>
</div>
</body>
</html>
