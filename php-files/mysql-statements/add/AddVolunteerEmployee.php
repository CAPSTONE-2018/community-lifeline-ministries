<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$prefix = $_POST['volunteerPrefix'];
$firstName = $_POST['volunteerFirstName'];
$lastName = $_POST['volunteerLastName'];
$primaryPhone = $_POST['volunteerPrimaryPhone'];
$secondaryPhone = $_POST['volunteerSecondaryPhone'];
$addressOne = $_POST['volunteerAddressOne'];
$addressTwo = $_POST['volunteerAddressTwo'];
$city = $_POST['volunteerCity'];
$state = $_POST['volunteerState'];
$zip = intval($_POST['volunteerZip']);
$email = $_POST['volunteerEmail'];
$type = $_POST['volunteerType'];
$mondayAvailability = $_POST['mondayCheckBox'];
$tuesdayAvailability = $_POST['tuesdayCheckBox'];
$wednesdayAvailability = $_POST['wednesdayCheckBox'];
$thursdayAvailability = $_POST['thursdayCheckBox'];
$fridayAvailability = $_POST['fridayCheckBox'];
$saturdayAvailability = $_POST['saturdayCheckBox'];
$sundayAvailability = $_POST['sundayCheckBox'];
$isActiveFlag = 1;
$volunteerConfirmation = false;
$lastVolunteerInsertId = 0;
$programId = $_POST['volunteerProgram'];

if (trim($firstName) !== '') {
    $stmt = $db->prepare("INSERT INTO Volunteer_Employees (Author_Username, Active_Volunteer, Prefix, First_Name, Last_Name, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email, User_Type, Monday_Availability, Tuesday_Availability, Wednesday_Availability, Thursday_Availability, Friday_Availability, Saturday_Availability, Sunday_Availability) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sisssssssssissiiiiiii', $userMakingChanges, $isActiveFlag, $prefix, $firstName, $lastName, $primaryPhone, $secondaryPhone, $addressOne, $addressTwo, $city, $state, $zip, $email, $type, $mondayAvailability, $tuesdayAvailability, $wednesdayAvailability, $thursdayAvailability, $fridayAvailability, $saturdayAvailability, $sundayAvailability);
    $stmt->execute();
    $lastVolunteerInsertId = $stmt->insert_id;

    if ($programId !== '') {
        $volunteerToProgramStmt = $db->prepare("INSERT INTO Volunteer_To_Programs (Author_Username, Active_Id, Volunteer_Id, Program_Id) VALUES (?, ?, ?, ?)");
        $volunteerToProgramStmt->bind_param('siii', $userMakingChanges, $isActiveFlag, $lastVolunteerInsertId, $programId);
        $volunteerToProgramStmt->execute();
    }

    if ($stmt->affected_rows == -1) {
        $volunteerConfirmation = false;
        $stmt->close();
    } else {
        $volunteerConfirmation = true;
        $stmt->close();
    }

    $jsonConfirmation = array(
        'volunteer-confirmation' => $volunteerConfirmation
    );

    echo json_encode($jsonConfirmation);

} else {
    echo "fill-required-inputs";
}

