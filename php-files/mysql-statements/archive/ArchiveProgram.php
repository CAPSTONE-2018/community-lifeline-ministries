<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$programId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Programs SET Author_Username = '$userMakingChanges', Active_Program = 0, Last_Updated_Timestamp = NULL WHERE Id = $programId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
