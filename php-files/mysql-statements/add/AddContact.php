<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$contactActiveFlag = 1;
$lastContactInsertId = 0;
$prefix = $_POST['contactPrefix'];
$firstName = $_POST['contactFirstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['contactLastName'];
$suffix = $_POST['suffix'];
$primaryPhone = $_POST['primaryPhone'];
$secondaryPhone = $_POST['secondaryPhone'];
$addressOne = $_POST['contactAddressOne'];
$addressTwo = $_POST['contactAddressTwo'];
$city = $_POST['contactCity'];
$state = $_POST['contactState'];
$zip = intval($_POST['contactZip']);
$email = $_POST['contactEmail'];
$studentId = $_POST['student'];
$relationToStudent = $_POST['relationToStudent'];
$queryForExistingContact = "SELECT First_Name, Last_Name, Birth_Date FROM Students WHERE First_Name = '$studentFirstName' AND Last_Name = '$studentLastName' AND Birth_Date = '$studentDob';";
$existingContactsResults = mysqli_query($db, $queryForExistingContact);
$doesContactExist = mysqli_num_rows($existingContactsResults);

$contactConfirmation = false;
$studentToContactConfirmation = false;

if (trim($firstName) !== '') {
    if($doesContactExist > 0) {
        echo "entry-exists";
    } else {
        $stmt = $db->prepare("INSERT INTO Contacts (Author_Username, Active_Contact, Prefix, First_Name, Middle_Name, Last_Name, Suffix , Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sisssssssssssis', $userMakingChanges, $contactActiveFlag, $prefix, $firstName, $middleName, $lastName, $suffix, $primaryPhone, $secondaryPhone, $addressOne, $addressTwo, $city, $state, $zip, $email);
        $stmt->execute();
        $lastContactInsertId = $stmt->insert_id;

        if ($stmt->affected_rows == -1) {
            $contactConfirmation = false;
            $stmt->close();
        } else {
            $contactConfirmation = true;
            $stmt->close();
        }

        if ($studentId !== '') {
            $stmtContactToStudent = $db->prepare("INSERT INTO Student_To_Contacts (Author_Username, Active_Id, Student_Id, Contact_Id, Relationship) VALUES (?,?,?,?,?)");
            $stmtContactToStudent->bind_param('siiis', $userMakingChanges, $contactActiveFlag, $studentId, $lastContactInsertId, $relationToStudent);
            $stmtContactToStudent->execute();

        }


        if ($stmtContactToStudent->affected_rows == -1) {
            $studentToContactConfirmation = false;
            $stmtContactToStudent->close();
        } else {
            $studentToContactConfirmation = true;
            $stmtContactToStudent->close();
        }

        $jsonConfirmationObject = array(
            'contact-confirmation' => $contactConfirmation,
            'student-to-contact-confirmation' => $studentToContactConfirmation
        );

        echo json_encode($jsonConfirmationObject);
    }
} else {
    echo "fill-required-inputs";
}

