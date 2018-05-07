<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$contactId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Contacts SET Author_Username = $userMakingChanges, Active_Contact = 0, Last_Updated_Timestamp = NULL WHERE Id = $contactId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}