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
$id = $_POST['testScoreId'];
$term = $_POST['term'];
$year = intval($_POST['year']);
$preTest = floatval($_POST['preTest']);
$postTest = floatval($_POST['postTest']);

$sql = "
UPDATE Student_Test_Scores SET 
  Author_Username = '$userMakingChanges',
  Last_Updated_Timestamp = NULL,
  Term = '$term', 
  School_Year = '$year', 
  Pre_Test = '$preTest', 
  Post_Test = '$postTest'  
  WHERE Id = $id;";

if ($db->query($sql) === TRUE) {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Test Scores has been successfully Updated.
        </div>";
} else {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Test Scores could not be updated, please try again.
        </div>";
}
include("../scripts/footer.php");
?>