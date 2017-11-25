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



?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adding.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
    <body>
        
        <div id="form_wrapper">
        <form action="ScheduleSearched.php" method="POST" id="form2">
			<br>
			<label><h2>Search Schedule Information:</h2></label><br>
            <!--<label><h4>Student ID Number:</h4><input type="text" name="id_student"></label><br><br>-->
            
            <label class="control-label" for="studentid">Student ID Number For:</label>
            <!--<input id="studentid" class="form-control" placeholder="Student ID" type="text" name="id">-->
            <select id="studentid" class="form-control" name="id_student">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    //echo "<option value='".$row['Id']."'>'".$row['First_Name']."'</option>";
                    echo "<option value='" . $row['Id'] . "'>" . $row['First_Name'] . " " . $row['Last_Name'] . "</option>";
                }
            }
            ?>
            </select>
			<input id="submit" type="submit" value="Submit"><br><br>
		</form>
        </div>
    </body>

</html>
