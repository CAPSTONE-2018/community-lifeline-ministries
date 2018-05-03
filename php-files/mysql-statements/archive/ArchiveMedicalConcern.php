<?php
include("../../../db/config.php");

$medicalConcernId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Medical_Concern_Types SET Active_Id = 0 WHERE Id = $medicalConcernId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}