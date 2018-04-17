<?php
include("../scripts/header.php");
?>

    <h1>Update Volunteer/Employee Information:</h1>
    <br/>

<?php

//connect to database
include("../../db/config.php");

session_start();

$userMakingChanges = $_SESSION['loggedIn'];
$id = $_POST['id'];
$term = $_POST['term'];
$year = intval($_POST['SchoolYear']);
$preTest = floatval($_POST['pre_Test']);
$postTest = floatval($_POST['post_Test']);

$sql = "
UPDATE Student_Test_Scores SET 
  Author_Username = '$userMakingChanges',
  Last_Updated_Timestamp = GETDATE(),
  Term = '$term', 
  School_Year = '$year', 
  Pre_Test = '$preTest', 
  Post_Test = '$postTest'  
  WHERE Id = $id;";
include("../scripts/footer.php");
?>