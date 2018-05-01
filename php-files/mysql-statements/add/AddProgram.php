<?php
//connect to database
include("../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$programName = $_POST['programName'];
$volunteerIdToProgram = $_POST['volunteerId'];
$isActiveFlag = 1;
$queryForAllExistingPrograms = "SELECT * FROM Programs WHERE Program_Name = '$programName';";
$existingProgramResults = mysqli_query($db, $queryForAllExistingPrograms);
$doesProgramExist = mysqli_num_rows($existingProgramResults);

if ($doesProgramExist > 0) {
    echo 1;
} else {
    $stmtPrograms = $db->prepare("INSERT INTO Programs (Author_Username, Active_Program, Program_Name) VALUES (?, ?, ?)");
    $stmtPrograms->bind_param('sis', $userMakingChanges, $isActiveFlag, $programName);
    $stmtPrograms->execute();
    $lastProgramInsertId = $stmtPrograms->insert_id;


    $stmtVolunteers = $db->prepare("INSERT INTO Volunteer_To_Programs (Author_Username, Program_Id, Volunteer_Id) VALUES (?, ?, ?)");
    $stmtVolunteers->bind_param('sii', $userMakingChanges, $lastProgramInsertId, $volunteerIdToProgram);
    $stmtVolunteers->execute();


    if ($stmtPrograms->affected_rows == -1) {
        echo 001;
        $stmtPrograms->close();
    } else {
        echo 0;
        $stmtPrograms->close();
    }
}