<?php

//connect to database
include("../../db/config.php");

session_start();

$userMakingChanges = $_SESSION['loggedIn'];
$id = $_POST['id'];
$term = $_POST['term'];
$year = intval($_POST['schoolYear']);
$preTest = floatval($_POST['pre_Test']);
$postTest = floatval($_POST['post_Test']);

$sql = "
UPDATE Student_Test_Scores SET 
  Author_Username = '$userMakingChanges',
  Last_Updated_Timestamp = NOW(),
  Term = '$term', 
  School_Year = '$year', 
  Pre_Test = '$preTest', 
  Post_Test = '$postTest'  
  WHERE Id = $id;";

if(mysqli_query($db, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
?>