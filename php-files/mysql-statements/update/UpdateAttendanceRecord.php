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
        $updateStatement = $db->prepare("UPDATE Attendance SET Author_Username = '$userMakingChanges', Last_Updated_Timestamp = NULL, 
                    Date = '$date', Student_Id = '$studentId', Program_Id = '$programId', Attendance_Value = '$checkboxValue'
                    WHERE Student_Id = '$studentId' AND Program_Id = '$programId' AND Date = '$date'
                    ");
        $updateStatement->execute();

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
