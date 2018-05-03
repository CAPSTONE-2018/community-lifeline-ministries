<?php
include("../../../db/config.php");
$passedInStudentId = $_POST['studentId'];

session_start();
if (isset($passedInStudentId)) {
    $_SESSION['lastStudentInsertId'] = $passedInStudentId;
}
$userMakingChanges = $_SESSION['loggedIn'];
$lastStudentInsertID = $_SESSION['lastStudentInsertId'];
$medicalConcernName = $_POST['medicalConcernName'];
$medicalConcernTypeId = $_POST['medicalConcernTypeId'];
$medicalConcernNote = $_POST['medicalConcernNote'];
$isActiveFlag = 1;

$queryForExistingStudentToMedicalConcern = "SELECT * FROM Student_To_Medical_Concerns WHERE Student_Id = '$lastStudentInsertID' AND Medical_Concern_Name = '$medicalConcernName';";
$existingMedicalConcernsResults = mysqli_query($db, $queryForExistingStudentToMedicalConcern);
$doesConcernExist = mysqli_num_rows($existingMedicalConcernsResults);

if (trim($medicalConcernName) !== '') {
    if ($doesConcernExist > 0) {
        echo "entry-exists";
    } else {

        $stmt = $db->prepare("INSERT INTO Student_To_Medical_Concerns (Author_Username, Active_Id, Student_Id, Medical_Concern_Name, Medical_Type_Id, Note) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('siisis', $userMakingChanges, $isActiveFlag, $lastStudentInsertID, $medicalConcernName, $medicalConcernTypeId, $medicalConcernNote);
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
