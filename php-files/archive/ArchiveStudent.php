<?php
include("../../db/config.php");

$studentId = $_POST['studentId'];
$updateSqlStatement = "UPDATE Students SET Active_Student = 0 WHERE Id = $studentId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo 0;
} else {
    echo 1;
}
?>