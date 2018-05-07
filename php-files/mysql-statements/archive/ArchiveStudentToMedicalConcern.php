<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$uniqueMedicalConcernId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Student_To_Medical_Concerns SET Active_Id = 0, Author_Username = '$userMakingChanges', Last_Updated_Timestamp = NULL WHERE Id = $uniqueMedicalConcernId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
