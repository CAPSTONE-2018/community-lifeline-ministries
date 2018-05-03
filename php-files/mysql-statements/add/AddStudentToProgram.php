<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$studentId = $_POST['studentId'];
$programId = $_POST['programId'];
$isActiveFlag = 1;
$queryForStudentToProgram = "SELECT * FROM Student_To_Programs WHERE Student_Id = '$studentId' AND Program_Id = '$programId';";
$existingStudentsToProgramsResults = mysqli_query($db, $queryForStudentToProgram);
$doesStudentToProgramExist = mysqli_num_rows($existingStudentsToProgramsResults);

if ($studentId !== '' && $programId !== '') {
    if ($doesStudentToProgramExist > 0) {
        echo "entry-exists";
    } else {
        $stmt = $db->prepare("INSERT INTO Student_To_Programs (Author_Username, Active_Id, Student_Id, Program_Id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('siii', $userMakingChanges, $isActiveFlag, $studentId, $programId);
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
