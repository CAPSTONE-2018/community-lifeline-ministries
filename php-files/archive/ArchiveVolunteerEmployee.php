<?php
include("../../db/config.php");

$volunteerId = $_POST['volunteerId'];
$updateSqlStatement = "UPDATE Volunteer_Employees SET Active_Volunteer = 0 WHERE Id = $volunteerId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo 0;
} else {
    echo 1;
}