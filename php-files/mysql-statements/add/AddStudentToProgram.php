<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$studentId = intval($_POST['studentId']);
$programId = $_POST['programId'];

$stmt = $db->prepare("INSERT INTO Student_To_Programs (Author_Username, Student_Id, Program_Id) VALUES (?, ?, ?)");
$stmt->bind_param('sii', $userMakingChanges, $studentId, $programId);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Student could not be added to the class, please try again.
        </div>";
} else {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Student has been successfully added to the class.
        </div>";
    $stmt->close();
}