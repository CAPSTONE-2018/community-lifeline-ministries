<?php
include("../scripts/header.php");
?>
<h1>Update Program Information:</h1>
<br />

<?php

//connect to database
include("../../db/config.php");

session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$id = $_SESSION['programId'];
$programName = $_POST['programName'];
$isActiveFlag = $_POST['activeFlag'];

$sql = "
UPDATE Programs SET 
  Author_Username = '$userMakingChanges',
  Last_Updated_Timestamp = NULL,
  Program_Name = '$programName',
  Active_Program = '$isActiveFlag'
  WHERE Id = '$id' ;";

if ($db->query($sql) === TRUE){
    echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Program Name has been successfully Updated.
            </div>";
}else{
    echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Program Name could not be updated, please try again.
            </div>";
}
include("../scripts/footer.php");
?>
