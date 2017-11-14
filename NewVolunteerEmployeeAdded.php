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
            <h1>Add Test Score Information:</h1>
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
            $cellphone = $_POST['cellphone'];
            $homephone = $_POST['homephone'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = intval($_POST['zip']);
            $email = $_POST['email'];
            $type = $_POST['type'];
            $program = $_POST['program'];




            $stmt = $db->prepare("INSERT INTO Volunteer_Employee (First_Name, Last_Name, Phone_Cell, Phone_Home, Address, City, State, Zip, Email, Type, Program) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssssssisss', $fname, $lname, $cellphone, $homephone, $address, $city, $state, $zip, $email, $type, $program);
            $stmt->execute();


            if ($stmt->affected_rows == -1) {
                echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Volunteer/Employee could not be added to the database, please try again.
                      </div>";
            }
            else {
                echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Volunteer/Employee has been successfully added to the database.
                      </div>";
                $stmt->close();
            }
            ?>
        </div>
    </body>
</html>
