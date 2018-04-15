<?php
include("../../db/config.php");
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
$medicalConcernName = $_POST['medicalConcernName'];
$medicalConcernType = $_POST['medicalConcernType'];
$medicalConcernNote = $_POST['medicalConcernNote'];
$programId = $_POST['programToEnroll'];

$contactActiveFlag = 1;
$contactFirstName = $_POST['contactFirstName'];
$contactLastName = $_POST['contactLastName'];
$contactPrimaryPhone = $_POST['contactPrimaryPhone'];
$contactSecondaryPhone = $_POST['contactSecondaryPhone'];
$contactAddressOne = $_POST['contactAddressOne'];
$contactAddressTwo = $_POST['contactAddressTwo'];
$contactCity = $_POST['contactCity'];
$contactState = $_POST['contactState'];
$contactZip = $_POST['contactZip'];
$contactEmail = $_POST['contactEmail'];
$contactRelationshipToStudent = $_POST['contactRelationToStudent'];

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

if (($_POST['contactFirstName']) != "") {
    $stmtContact = $db->prepare("INSERT INTO Contacts (Author_Username, Active_Contact, First_Name, Last_Name, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmtContact->bind_param('sissssssssis', $userMakingChanges, $contactActiveFlag, $contactFirstName, $contactLastName, $contactPrimaryPhone, $contactSecondaryPhone, $contactAddressOne, $contactAddressTwo, $contactCity, $contactState, $contactZip, $contactEmail);
    $stmtContact->execute();
    $lastContactInsertId = $stmtContact->insert_id;
    if ($stmtContact->affected_rows == -1) {
        $contactConfirmation = false;
        $stmtContact->close();
    } else {
        $contactConfirmation = true;
        $stmtContact->close();
    }
}

if ($lastContactInsertId != null) {
    $stmtStudentToContact = $db->prepare("INSERT INTO Student_To_Contacts (Author_Username, Student_Id, Contact_Id, Relationship) VALUES (?,?,?,?)");
    $stmtStudentToContact->bind_param('siis', $userMakingChanges, $lastStudentInsertId, $lastContactInsertId, $contactRelationshipToStudent);
    $stmtStudentToContact->execute();

    if ($stmtStudentToContact->affected_rows == -1) {
        $studentToContactConfirmation = false;
        $stmtStudentToContact->close();
    } else {
        $studentToContactConfirmation = true;
        $stmtStudentToContact->close();
    }
}

if ($medicalConcernName != "") {
    $queryForMedicalConcerns = 'SELECT * FROM Medical_Concerns WHERE Name = "' . $medicalConcernName . '" AND Type = "' . $medicalConcernType . '" AND Note = "' . $medicalConcernNote . '";';
    $medicalConcernResult = $db->query($queryForMedicalConcerns);
    $medicalConcernRow = $medicalConcernResult->fetch_assoc();
    $medicalConcernId = $medicalConcernRow['Id'];

    $studentToMedicalStmt = $db->prepare("INSERT INTO Student_To_Medical_Concerns (Student_Id, Medical_Concern_Id) VALUES (?, ?)");
    $studentToMedicalStmt->bind_param('ii', $lastStudentInsertId, $row_aid);
    $studentToMedicalStmt->execute();

    if ($studentToMedicalStmt->affected_rows == -1) {
        $medicalConcernConfirmation = false;
        $studentToMedicalStmt->close();
    } else {
        $medicalConcernConfirmation = true;
        $studentToMedicalStmt->close();
    }
}

$jsonConfirmationObject = array(
    'student-confirmation' => $studentConfirmation,
    'program-confirmation' => $studentToProgramConfirmation,
    'new-contact-confirmation' => $contactConfirmation,
    'student-to-contact' => $studentToContactConfirmation
);

echo json_encode($jsonConfirmationObject);


?>