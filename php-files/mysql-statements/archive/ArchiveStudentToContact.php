<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$contactId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Student_To_Contacts SET Active_Id = 0, Author_Username = '$userMakingChanges', Last_Updated_Timestamp = NULL WHERE Contact_Id = $contactId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
?>