<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$programId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Programs SET Active_Program = 0 WHERE Id = $programId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
