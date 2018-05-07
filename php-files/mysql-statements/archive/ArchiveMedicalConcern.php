<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$medicalConcernId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Medical_Concern_Types SET Author_Username = '$userMakingChanges', Last_Updated_Timestamp = NULL, Active_Id = 0 WHERE Id = $medicalConcernId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}