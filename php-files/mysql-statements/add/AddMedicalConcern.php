<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$medicalConcernName = $_POST['name'];
$medicalConcernType = $_POST['type'];
$medicalConcernNote = $_POST['note'];

$stmt = $db->prepare("INSERT INTO Medical_Concerns (Author_Username, Name, Type, Note) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $userMakingChanges, $medicalConcernName, $medicalConcernType, $medicalConcernNote);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Medical Concern could not be added to the database, please try again.
        </div>";
} else {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Medical Concern has been successfully added to the database.
        </div>";
    $stmt->close();
}
