<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$volunteerId = $_POST['volunteerId'];
$programId = $_POST['programId'];
$isActiveFlag = 1;

$queryForAllExistingVolunteersToPrograms = "SELECT * FROM Volunteer_To_Programs WHERE Volunteer_Id = '$volunteerId' AND Program_Id = '$programId';";
$existingVolunteerToProgramResults = mysqli_query($db, $queryForAllExistingVolunteersToPrograms);
$doesVolunteerToProgramExist = mysqli_num_rows($existingVolunteerToProgramResults);

if ($volunteerId !== '' && $programId !== '') {
    if ($doesVolunteerToProgramExist > 0) {
        echo "entry-exists";
    } else {
        $stmt = $db->prepare("INSERT INTO Volunteer_To_Programs (Author_Username, Active_Id, Volunteer_Id, Program_Id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('siii', $userMakingChanges, $isActiveFlag, $volunteerId, $programId);
        $stmt->execute();

        if (mysqli_affected_rows($db) >= 1) {
            echo "success";
            $stmt->close();
        } else {
            echo "database-error";
            $stmt->close();
        }
    }
} else {
    echo "fill-required-inputs";
}