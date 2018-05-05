<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$i = 0;
parse_str($_POST['formData'], $searchArray);
for ($i = 0; $i <= sizeof($searchArray); $i++) {

    $studentId = $searchArray['studentId'][$i];
    $programId = $searchArray['programId'][$i];
    $checkboxValue = $searchArray['attendanceCheckbox'][$i];
    $date = $searchArray['attendanceDate'];

    $stmt = $db->prepare("INSERT INTO Attendance (Author_Username, Date, Student_Id, Program_Id, Attendance_Value) VALUES (?,?,?,?,?)");
    $stmt->bind_param('ssiis', $userMakingChanges, $date, $studentId, $programId, $checkboxValue);
    $stmt->execute();
}
//
//if (mysqli_affected_rows($db) == sizeof($searchArray)) {
//    echo "success";
//    $stmt->close();
//} else {
//    echo "database-error";
//    $stmt->close();
//}
