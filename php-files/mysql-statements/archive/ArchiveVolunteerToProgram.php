<?php
include("../../../db/config.php");
session_start();
$programId = $_POST['programId'];
$volunteerId = $_POST['volunteerId'];
$updateSqlStatement = "UPDATE Volunteer_To_Programs SET Active_Id = 0 WHERE Volunteer_Id = '$volunteerId' AND Program_Id = '$programId';";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
