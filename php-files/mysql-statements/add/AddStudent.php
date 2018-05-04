<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$studentActiveFlag = 1;
$studentFirstName = $_POST['studentFirstName'];
$studentMiddleName = $_POST['studentMiddleName'];
$studentLastName = $_POST['studentLastName'];
$studentSuffix = $_POST['studentSuffix'];
$studentGender = $_POST['gender'];
$studentDob = $_POST['dob'];
$studentEthnicity = $_POST['ethnicity'];
$studentAddressOne = $_POST['studentAddressOne'];
$studentAddressTwo = $_POST['studentAddressTwo'];
$studentZip = intval($_POST['studentZip']);
$studentCity = $_POST['studentCity'];
$studentState = $_POST['studentState'];
$studentSchool = $_POST['studentSchool'];
$studentPermissionSlip = intval($_POST['permissionSlipCheckbox']);
$studentBirthCertificate = intval($_POST['birthCertificateCheckbox']);
$studentReducedLunchEligibility = intval($_POST['reducedLunchEligibilityCheckbox']);
$studentIep = intval($_POST['iepCheckbox']);
$programId = $_POST['programToEnroll'];
$lastContactInsertId = 0;
$lastStudentInsertId = 0;
$studentConfirmation = false;
$contactConfirmation = false;
$studentToProgramConfirmation = false;
$studentToContactConfirmation = false;
$medicalConcernConfirmation = false;

if ($studentFirstName != "") {
    $stmtStudent = $db->prepare("INSERT INTO Students (Author_Username, Active_Student, First_Name , Middle_Name, Last_Name, Suffix, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, Ethnicity, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmtStudent->bind_param('sissssssssssissiiii', $userMakingChanges, $studentActiveFlag, $studentFirstName, $studentMiddleName, $studentLastName, $studentSuffix, $studentGender, $studentDob, $studentAddressOne, $studentAddressTwo, $studentCity, $studentState, $studentZip, $studentEthnicity, $studentSchool, $studentPermissionSlip, $studentBirthCertificate, $studentReducedLunchEligibility, $studentIep);
    $stmtStudent->execute();
    $lastStudentInsertId = $stmtStudent->insert_id;
    $_SESSION['lastStudentInsertId'] = $lastStudentInsertId;
    if ($stmtStudent->affected_rows == -1) {
        $studentConfirmation = false;
        $stmtStudent->close();
    } else {
        $studentConfirmation = true;
        $stmtStudent->close();
    }
}

if ($lastStudentInsertId != null && isset($programId)) {
    $programStmt = $db->prepare("INSERT INTO Student_To_Programs (Author_Username, Student_Id, Program_Id) VALUES (?, ?, ?)");
    $programStmt->bind_param('sii', $userMakingChanges, $lastStudentInsertId, $programId);
    $programStmt->execute();

    if ($programStmt->affected_rows == -1) {
        $studentToProgramConfirmation = false;
        $programStmt->close();
    } else {
        $studentToProgramConfirmation = true;
        $programStmt->close();
    }
}

$jsonConfirmationObject = array(
    'student-confirmation' => $studentConfirmation,
    'program-confirmation' => $studentToProgramConfirmation
);

echo json_encode($jsonConfirmationObject);