<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$programName = $_POST['programName'];
$programId = $_POST['programId'];

$queryForAllExistingPrograms = "SELECT * FROM Programs WHERE Program_Name = '$programName';";
$existingProgramResults = mysqli_query($db, $queryForAllExistingPrograms);
$doesProgramExist = mysqli_num_rows($existingProgramResults);

if (trim($programName) !== '') {
    if ($doesProgramExist > 0) {
        echo "entry-exists";
    } else {
        $sql = "UPDATE Programs SET Author_Username = '$userMakingChanges', Last_Updated_Timestamp = NULL, Program_Name = '$programName'
                  WHERE Id = '$programId';";
        if ($db->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "database-error";
        }
    }
} else {
    echo "fill-required-inputs";
}
