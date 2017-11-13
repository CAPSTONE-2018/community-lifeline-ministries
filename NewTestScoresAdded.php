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
            $term = $_POST['term'];
            $year = intval($_POST['year']);
            $preTest = floatval($_POST['pre_test']);
            $postTest = floatval($_POST['post_test']);



            $stmt = $db->prepare("INSERT INTO School_Year (Student_Id, Term, Year, Pre_Test, Post_Test) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('isidd', $id, $term, $year, $preTest, $postTest);
            $stmt->execute();


            if ($stmt->affected_rows == -1) {
                echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Test Scores could not be added to the database, please try again.
                      </div>";
            }
            else {
                echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Test Scores have been successfully added to the database.
                      </div>";
                $stmt->close();
            }
            ?>
        </div>
    </body>
</html>
