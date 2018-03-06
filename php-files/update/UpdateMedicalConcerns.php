<?php
include("../scripts/header.php");
?>
<h1>Update Allergy Information:</h1>
<br />

<?php

//connect to database
include("../../db/config.php");

session_start();
$id = $_SESSION['allergyId'];
$medicalConcernName = $_POST['name'];
$medicalConcernType = $_POST['allergyType'];
$medicalConcernNote = $_POST['allergyNote'];

$sql = "UPDATE Medical_Concerns SET Name = '$medicalConcernName', Type = '$medicalConcernType', Note = '$medicalConcernNote' WHERE Id = '$id' ;";

if ($db->query($sql) === TRUE){
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Allergy Name has been successfully Updated.
        </div>";
}else{
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Allergy Name could not be updated, please try again.
        </div>";
}

include("../scripts/footer.php");
?>
