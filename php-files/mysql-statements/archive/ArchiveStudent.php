<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$studentId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Students SET Active_Student = 0 WHERE Id = $studentId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
