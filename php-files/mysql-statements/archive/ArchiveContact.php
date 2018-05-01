<?php
include("../../../db/config.php");

$contactId = $_POST['contactId'];
$updateSqlStatement = "UPDATE Contacts SET Active_Contact = 0 WHERE Id = $contactId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo 0;
} else {
    echo 1;
}