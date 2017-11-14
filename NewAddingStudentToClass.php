<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location: login.html");
}
include("Header.php");
?>

<?php
//Setting up variable to use for mysqli function
$server = "localhost";
$user = "clm_user";
$psw = "dbuser";
$database = "community_lifeline";

//Connecting to database
$db = mysqli_connect($server, $user, $psw, $database);
if (!$db) {
    echo "Error - Could not connect to MySQL";
    exit;
}

$query = "SELECT * FROM Student ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);

$query2 = "SELECT * FROM  Class ORDER BY Class_Name;";
$result2 = mysqli_query($db, $query2);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="adding.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

    <body>

        <div class="container">
            <div id="form_wrapper">
                <form class="form-horizontal" action="NewStudentToClassAdded.php" method="POST" id="form2">

                    <h1>Add Student and Class Information:</h1>
                    <br />
                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label class="control-label" for="sid">Student ID:</label>
                                <!--<input id="sid" class="form-control" placeholder="Student ID" type="text" name="sid">-->
                                <select id="sid" class="form-control" name="sid">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            //echo "<option value='".$row['Id']."'>'".$row['First_Name']."'</option>";
                                            echo "<option value='" . $row['Id'] . "'>" . $row['First_Name'] . " " . $row['Last_Name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label" for="cid">Class ID:</label>
                                <!--<input id="cid" class="form-control" placeholder="Class ID" type="text" name="cid">-->
                                <select id="cid" class="form-control" name="cid">
                                    <?php
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row = mysqli_fetch_assoc($result2)) {
                                            //echo "<option value='".$row['Id']."'>'".$row['First_Name']."'</option>";
                                            echo "<option value='" . $row['Id'] . "'>" . $row['Class_Name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </body>

</html>
