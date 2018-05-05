<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$i = 0;
$affectedRows = "";
$numberOfSubmissions = $_POST['numberOfStudentsToSubmit'];
parse_str($_POST['formData'], $searchArray);

for ($i = 0; $i <= sizeof($searchArray); $i++) {

    $studentId = $searchArray['studentId'][$i];
    $programId = $searchArray['programId'][$i];
    $checkboxValue = $searchArray['attendanceCheckbox'][$i];
    $date = $searchArray['attendanceDate'][$i];

    if (isset($studentId) && isset($programId)) {
        $stmt = $db->prepare("INSERT INTO Attendance (Author_Username, Date, Student_Id, Program_Id, Attendance_Value) VALUES (?,?,?,?,?)");
        $stmt->bind_param('ssiis', $userMakingChanges, $date, $studentId, $programId, $checkboxValue);
        $stmt->execute();

        $affectedRows += mysqli_affected_rows($db);
    }
}

if ($affectedRows == $numberOfSubmissions) {
    echo "success";
    $stmt->close();
} else {
    echo "database-error";
    $stmt->close();
}
