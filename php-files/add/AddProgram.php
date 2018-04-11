<?php
//connect to database
include("../../db/config.php");

$userMakingChanges = $_SESSION['loggedIn'];
$programName = $_POST['programName'];
$isActiveFlag = $_POST['activeFlag'];
$queryForAllExistingPrograms = "SELECT * FROM Programs WHERE Program_Name = '$programName';";
$existingProgramResults = mysqli_query($db, $queryForAllExistingPrograms);
$doesProgramExist = mysqli_num_rows($existingProgramResults);

if ($doesProgramExist > 0) {
    echo 1;
} else {
    $stmt = $db->prepare("INSERT INTO Programs (Author_Username, Active_Program, Program_Name) VALUES (?, ?, ?)");
    $stmt->bind_param('sis', $userMakingChanges, $isActiveFlag, $programName);
    $stmt->execute();
    if ($stmt->affected_rows == -1) {
        echo 001;
    } else {
        echo 0;
        $stmt->close();
    }
}