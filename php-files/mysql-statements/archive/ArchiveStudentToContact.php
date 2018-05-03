<?php
include("../../../db/config.php");

$contactId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Student_To_Contacts SET Active_Id = 0 WHERE Contact_Id = $contactId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
?>