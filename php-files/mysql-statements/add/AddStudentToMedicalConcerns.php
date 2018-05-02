<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$lastStudentInsertID = $_SESSION['lastStudentInsertId'];
$medicalConcernName = $_POST['medicalConcernName'];
$medicalConcernType = $_POST['medicalConcernType'];
$medicalConcernNote = $_POST['medicalConcernNote'];

$stmt = $db->prepare("INSERT INTO Student_To_Medical_Concerns (Author_Username, Student_Id, Medical_Concern_Name, Medical_Type_Id, Note) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('sisis', $userMakingChanges, $lastStudentInsertID, $medicalConcernName, $medicalConcernType, $medicalConcernNote);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    $stmt->close();
} else {
    $stmt->close();
}
