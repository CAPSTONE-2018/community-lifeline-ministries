<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
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
$studentActiveFlag = 1;
$programActiveFlag = 1;
$lastContactInsertId = 0;
$lastStudentInsertId = 0;
// End of student information

// Student Medical Concerns
$medicalConcernName = $_POST['medicalConcernName'];
$medicalConcernTypeId = $_POST['medicalConcernType'];
$medicalConcernNote = $_POST['medicalConcernNote'];
$medicalActiveFlag = 1;
// End of Student Medical Concerns


// Student Contact Info
$contactPrefix = $_POST['contactPrefix'];
$contactFirstName = $_POST['contactFirstName'];
$contactMiddleName = $_POST['middleName'];
$contactLastName = $_POST['contactLastName'];
$contactSuffix = $_POST['suffix'];
$contactPrimaryPhone = $_POST['contactPrimaryPhone'];
$contactSecondaryPhone = $_POST['contactSecondaryPhone'];
$contactAddressOne = $_POST['contactAddressOne'];
$contactAddressTwo = $_POST['contactAddressTwo'];
$contactCity = $_POST['contactCity'];
$contactState = $_POST['contactState'];
$contactZip = intval($_POST['contactZip']);
$contactEmail = $_POST['contactEmail'];
$relationToStudent = $_POST['contactRelationToStudent'];
$contactActiveFlag = 1;
$studentToContactActiveFlag = 1;
// Confirmation Objects To Send Back

$newStudentConfirmation = false;
$newContactConfirmation = false;
$studentToProgramConfirmation = false;
$studentToContactConfirmation = false;
$studentToMedicalConcernConfirmation = false;

$queryForExistingStudent = "SELECT First_Name, Last_Name, Birth_Date FROM Students WHERE First_Name = '$studentFirstName' AND Last_Name = '$studentLastName' AND Birth_Date = '$studentDob';";
$existingStudentResults = mysqli_query($db, $queryForExistingStudent);
$doesStudentExist = mysqli_num_rows($existingStudentResults);

if (trim($studentFirstName) !== '') {
    if($doesStudentExist > 0) {
        echo "entry-exists";
    } else {

        if ($studentFirstName !== '') {
            $studentStmt = $db->prepare("INSERT INTO Students (Author_Username, Active_Student, First_Name , Middle_Name, Last_Name, Suffix, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, Ethnicity, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $studentStmt->bind_param('sissssssssssissiiii', $userMakingChanges, $studentActiveFlag, $studentFirstName, $studentMiddleName, $studentLastName, $studentSuffix, $studentGender, $studentDob, $studentAddressOne, $studentAddressTwo, $studentCity, $studentState, $studentZip, $studentEthnicity, $studentSchool, $studentPermissionSlip, $studentBirthCertificate, $studentReducedLunchEligibility, $studentIep);
            $studentStmt->execute();
            $lastStudentInsertId = $studentStmt->insert_id;
            if ($studentStmt->affected_rows == -1) {
                $newStudentConfirmation = false;
                $studentStmt->close();
            } else {
                $newStudentConfirmation = true;
                $studentStmt->close();

                if ($lastStudentInsertId != 0 && isset($programId)) {
                    $programStmt = $db->prepare("INSERT INTO Student_To_Programs (Author_Username, Active_Id, Student_Id, Program_Id) VALUES (?, ?, ?, ?)");
                    $programStmt->bind_param('siii', $userMakingChanges, $programActiveFlag, $lastStudentInsertId, $programId);
                    $programStmt->execute();

                    if ($programStmt->affected_rows == -1) {
                        $studentToProgramConfirmation = false;
                        $programStmt->close();
                    } else {
                        $studentToProgramConfirmation = true;
                        $programStmt->close();
                    }
                }

                if (trim($contactFirstName !== '' )) {
                    $contactStmt = $db->prepare("INSERT INTO Contacts (Author_Username, Active_Contact, Prefix, First_Name, Middle_Name, Last_Name, Suffix , Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $contactStmt->bind_param('sisssssssssssis', $userMakingChanges, $contactActiveFlag, $contactPrefix, $contactFirstName, $contactMiddleName, $contactLastName, $contactSuffix, $contactPrimaryPhone, $contactSecondaryPhone, $contactAddressOne, $contactAddressTwo, $contactCity, $contactState, $contactZip, $contactEmail);
                    $contactStmt->execute();
                    $lastContactInsertId = $contactStmt->insert_id;
                    if ($contactStmt->affected_rows == -1) {
                        $newContactConfirmation = false;
                        $contactStmt->close();
                    } else {
                        $newContactConfirmation = true;
                        $contactStmt->close();


                        if ($lastContactInsertId !== NULL) {
                            $studentToContactStmt = $db->prepare("INSERT INTO Student_To_Contacts (Author_Username, Active_Id, Student_Id, Contact_Id, Relationship) VALUES (?, ?, ?, ?, ?)");
                            $studentToContactStmt->bind_param('siiis', $userMakingChanges, $studentToContactActiveFlag, $lastStudentInsertId, $lastContactInsertId, $relationship);
                            $studentToContactStmt->execute();

                            if ($studentToContactStmt->affected_rows == -1) {
                                $studentToContactConfirmation = false;
                                $contactStmt->close();
                            } else {
                                $studentToContactConfirmation = true;
                                $contactStmt->close();
                            }
                        }

                    }
                }

                if (trim($medicalConcernName !== '')) {
                    $studentToMedicalStmt = $db->prepare("INSERT INTO Student_To_Medical_Concerns (Author_Username, Active_Id, Student_Id, Medical_Concern_Name, Medical_Type_Id, Note) VALUES (?, ?, ?, ?, ?, ?)");
                    $studentToMedicalStmt->bind_param('siisis', $userMakingChanges, $medicalActiveFlag, $lastStudentInsertId, $medicalConcernName, $medicalConcernTypeId, $medicalConcernNote);
                    $studentToMedicalStmt->execute();

                    if ($studentToMedicalStmt->affected_rows == -1) {
                        $studentToMedicalConcernConfirmation = false;
                        $studentToMedicalStmt->close();
                    } else {
                        $studentToMedicalConcernConfirmation = true;
                        $studentToMedicalStmt->close();
                    }
                }


            }


        }






        $jsonConfirmationObject = array(
            'student-confirmation' => $newStudentConfirmation,
            'program-confirmation' => $studentToProgramConfirmation,
            'new-contact-confirmation' => $newContactConfirmation,
            'student-to-contact-confirmation' => $studentToContactConfirmation,
            'student-to-medical-confirmation' => $studentToMedicalConcernConfirmation
        );
        echo json_encode($jsonConfirmationObject);






    }

} else {
    echo "fill-required-inputs";
}

