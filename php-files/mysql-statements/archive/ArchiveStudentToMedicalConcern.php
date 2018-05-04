<?php
include("../../../db/config.php");

$studentId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Student_To_Medical_Concerns SET Active_Id = 0 WHERE Student_Id = $studentId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
