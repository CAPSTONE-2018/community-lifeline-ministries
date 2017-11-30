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

        <h1>Search Volunteer/Employee Information:</h1>
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
        #This will get the text from the add a teacher fields
        //$lname = $_POST['name'];
        $id = $_POST['ID'];
        //if ($stmt = $db->prepare("SELECT * FROM Volunteer_Employee WHERE Last_Name=? AND Id=?")) {
        if ($stmt = $db->prepare("SELECT * FROM Volunteer_Employee WHERE Id = ?")){
            //$stmt->bind_param('ss', $lname, $id);

            $stmt->bind_param("i", $id);

            $stmt->execute();

            $stmt->bind_result($id, $firstName, $lastName, $cellphone, $homephone, $address, $city, $state, $zip, $email, $type, $program);
            $stmt->fetch();
            if ($id == null) {
                echo "<div class='alert alert-danger'>
                                    <strong>Failure! </strong>Volunteer/Employee could not be located in the database, please try again.
                                  </div>";
            } else {
                echo "<h2> Volunteer/Employee Information: </h2><br>";


                echo "<table class=\"table table-condensed table-striped\">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Cell Phone</th>
                        <th>Home Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Program</th>
                    </tr>
                    </thead>
                    <tbody>";
                echo "<tr><td>";
                echo $id;
                echo "</td><td>";
                echo $firstName;
                echo "</td><td>";
                echo $lastName;
                echo "</td><td>";
                echo $cellphone;
                echo "</td><td>";
                echo $homephone;
                echo "</td><td>";
                echo $address;
                echo "</td><td>";
                echo $city;
                echo "</td><td>";
                echo $state;
                echo "</td><td>";
                echo $zip;
                echo "</td><td>";
                echo $email;
                echo "</td><td>";
                echo $type;
                echo "</td><td>";
                echo $program;
                echo "</td></tr>";
                echo "</tbody>";
                echo "</table>";

            }
            $stmt->close();
        }
        ?>
        </div>
    </body>
</html>
