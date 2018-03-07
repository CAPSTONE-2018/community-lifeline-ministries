<?php
include("../scripts/header.php");
?>
<h1>Update Allergy Information:</h1>
<br />

<?php

//connect to database
include("../../db/config.php");

session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$id = $_SESSION['medicalConcernId'];
$medicalConcernName = $_POST['name'];
$medicalConcernType = $_POST['type'];
$medicalConcernNote = $_POST['note'];


$sql = "
UPDATE Medical_Concerns SET 
  Last_Updated_Timestamp = NULL, 
  Author_Username = '$userMakingChanges',
  Name = '$medicalConcernName', 
  Type = '$medicalConcernType', 
  Note = '$medicalConcernNote' 
  WHERE Id = '$id' ;";

if ($db->query($sql) === TRUE){
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Medical Concern has been successfully Updated.
        </div>";
}else{
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Medical Concern could not be updated, please try again.
        </div>";
}

include("../scripts/footer.php");
?>
