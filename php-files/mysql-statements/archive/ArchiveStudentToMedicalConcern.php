<?php
include("../../../db/config.php");

$uniqueMedicalConcernId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Student_To_Medical_Concerns SET Active_Id = 0 WHERE Id = $uniqueMedicalConcernId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
