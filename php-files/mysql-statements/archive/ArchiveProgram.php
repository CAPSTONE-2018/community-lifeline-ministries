<?php
include("../../../db/config.php");

$programId = $_POST['idToArchive'];
$updateSqlStatement = "UPDATE Programs SET Active_Program = 0 WHERE Id = $programId;";

if ($db->query($updateSqlStatement) === TRUE) {
    echo "success";
} else {
    echo "database-error";
}
