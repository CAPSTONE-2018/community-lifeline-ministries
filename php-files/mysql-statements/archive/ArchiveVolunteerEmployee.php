<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$volunteerId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Volunteer_Employees SET Active_Volunteer = 0, Author_Username = '$userMakingChanges', Last_Updated_Timestamp = NULL WHERE Id = $volunteerId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}