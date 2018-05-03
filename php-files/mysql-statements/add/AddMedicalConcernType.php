<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$medicalConcernTypeName = $_POST['name'];
$medicalConcernNote = $_POST['note'];
$isActiveFlag = 1;

$queryForAllExistingMedicalConcernTypes = "SELECT * FROM Medical_Concern_Types WHERE Type_Name = '$medicalConcernTypeName';";
$existingMedicalConcernsResults = mysqli_query($db, $queryForAllExistingMedicalConcernTypes);
$doesConcernExist = mysqli_num_rows($existingMedicalConcernsResults);

if (trim($medicalConcernTypeName) !== '') {
    if ($doesConcernExist > 0) {
        echo "entry-exists";
    } else {

        $stmt = $db->prepare("INSERT INTO Medical_Concern_Types (Author_Username, Active_Id, Type_Name, Note) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('siss', $userMakingChanges, $isActiveFlag, $medicalConcernTypeName, $medicalConcernNote);
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
    echo "need to fill generic modal";
}
