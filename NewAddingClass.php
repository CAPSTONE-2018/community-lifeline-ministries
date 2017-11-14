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

$query = "SELECT * FROM Volunteer_Employee ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="adding.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

    <body>
        <div class="container">

            <div id="form_wrapper">

                <form class="form-horizontal" action="NewClassAdded.php" method="POST" id="form2">


                    <h1>Add Class Information:</h1>
                    <br />

                    <div class="row">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label" for="name">Class Name:</label>
                                <input id="name" class="form-control" placeholder="Class Name" type="text" name="name">
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="cid">Class ID:</label>
                                <input id="cid" class="form-control" placeholder="Class ID" type="text" name="id">
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="veid">Volunteer/Employee ID For:</label>
                                <!--<input id="veid" class="form-control" placeholder="Volunteer/Employee ID" type="text" name="vid">-->
                                <select id="veid" class="form-control" name="vid">
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
                            <div class="col-lg-3">
                                <label class="control-label" for="roomnum">Room Number:</label>
                                <input id="roomnum" class="form-control" placeholder="Room Number" type="text" name="rnum">
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group">

                            <div class="col-lg-4">
                                <label class="control-label" for="day">Day:</label>
                                <select id="day" class="form-control" name="day">
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="stime">Start Time:</label>
                                <input id="stime" class="form-control" placeholder="Start Time" type="text" name="stime">
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="etime">End Time:</label>
                                <input id="etime" class="form-control" placeholder="End Time" type="text" name="etime">
                            </div>
                        </div>
                    </div>

                    <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
                </form>
            </div>
        </div>
    </body>

</html>
