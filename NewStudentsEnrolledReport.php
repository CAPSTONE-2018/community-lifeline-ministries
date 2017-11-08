<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location: login.html");
}
include("Header.php");
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="reports.css"/>
</head>

<body>

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

$schoolYear = $_POST['schoolYear'];

$stmt = "SELECT Student.Id, Student.First_Name, Student.Last_Name  
          FROM Student JOIN School_Year ON 
          Student.Id = School_Year.Student_Id 
          WHERE School_Year.Year = '$schoolYear'";
$result = mysqli_query($db, $stmt);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Student ID: " . $row["Id"] . " Student Name: " . $row["First_Name"] . " " . $row["Last_Name"] . "<br />";
    }
}
else{
    echo "0 results";
}

mysqli_close($db);
?>
</body>

</html>