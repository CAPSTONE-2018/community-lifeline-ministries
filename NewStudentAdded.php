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
            <h1>Add Student Information:</h1>
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

            $id = intval($_POST['id']);
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


            #Adding student records based on the information the user added into the "add" fields
            $stmt = $db->prepare("INSERT INTO Student VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('isssssssisssiiii', $id, $fname, $lname, $gender, $dob, $address, $city, $state, $zip, $ethnicity, $school, $program, $permission_slip, $birth_certificate, $reduced_lunch_eligible, $iep);
            $stmt->execute();


            if ($stmt->affected_rows == -1) {
                echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Student could not be added to the database, please try again.
                      </div>";
            }
            else {
                echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Student has been successfully added to the database.
                      </div>";
                $stmt->close();
            }




            $stmt = $db->prepare("INSERT INTO Allergy (Student_Id, Type, Note) VALUES (?, ?, ?)");
            $stmt->bind_param('iss', $id, $allergyType, $allergyNote);
            $stmt->execute();


            if ($stmt->affected_rows == -1) {
                echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Allergies could not be added to the database, please try again.
                      </div>";
            }
            else {
                echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Allergies has been successfully added to the database.
                      </div>";
                $stmt->close();
            }
            ?>
        </div>
    </body>
</html>
