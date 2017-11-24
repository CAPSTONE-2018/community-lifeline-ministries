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
            <h1>Add Contact Information:</h1>
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
            $relationship = $_POST['relationship'];




            $stmt = $db->prepare("INSERT INTO Contact (Student_Id, First_Name, Last_Name, Phone_Cell, Phone_Home, Address, City, State, Zip, Email, Relationship) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('isssssssiss', $id, $fname, $lname, $cellphone, $homephone, $address, $city, $state, $zip, $email, $relationship);
            $stmt->execute();


            if ($stmt->affected_rows == -1) {
                echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Contact could not be added to the database, please try again.
                      </div>";
            }
            else {
                echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Contact has been successfully added to the database.
                      </div>";
                $stmt->close();
            }
            ?>
        </div>
    </body>
</html>
