<?php
include("../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$contactActiveFlag = 1;
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

$lastInsertId = 0;
$studentId = $_POST['student'];
$relationToStudent = $_POST['relationToStudent'];

$contactConfirmation = false;

$stmt = $db->prepare("INSERT INTO Contacts (Author_Username, Active_Contact, Prefix, First_Name, Middle_Name, Last_Name, Suffix , Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sisssssssssssis', $userMakingChanges, $contactActiveFlag, $prefix, $firstName, $middleName, $lastName, $suffix, $primaryPhone, $secondaryPhone, $addressOne, $addressTwo, $city, $state, $zip, $email);
$stmt->execute();
$lastInsertId = $stmt->insert_id;

if ($stmt->affected_rows == -1) {
    $contactConfirmation = false;
    $stmt->close();
} else {
    $contactConfirmation = true;
    $stmt->close();
}

if ($studentId != null) {
    $stmtContactToStudent = $db->prepare("INSERT INTO Student_To_Contacts (Author_Username, Student_Id, Contact_Id, Relationship) VALUES (?,?,?,?)");
    $stmtContactToStudent->bind_param('siis', $userMakingChanges, $studentId, $lastInsertId, $relationToStudent);
    $stmtContactToStudent->execute();
}

$jsonConfirmationObject = array(
        'contact-confirmation' => $contactConfirmation
);

echo json_encode($jsonConfirmationObject);