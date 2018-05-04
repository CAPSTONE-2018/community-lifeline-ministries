<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$id = intval($_POST['id']);
$prefix = $_POST['volunteerPrefix'];
$firstName = $_POST['volunteerFirstName'];
$lastName = $_POST['volunteerLastName'];
$middleName = $_POST['volunteerMiddleName'];
$suffix = $_POST['volunteerSuffix'];
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
$isActiveFlag = $_POST['volunteerActiveFlag'];
$contactConfirmation = false;


if (isset($firstName)) {
    $stmt = $db->prepare("INSERT INTO Volunteer_Employees (Author_Username, Active_Volunteer, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email, User_Type, Monday_Availability, Tuesday_Availability, Wednesday_Availability, Thursday_Availability, Friday_Availability, Saturday_Availability, Sunday_Availability) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sisssssssssssissiiiiiii', $userMakingChanges, $isActiveFlag, $prefix, $firstName, $lastName, $middleName, $suffix, $primaryPhone, $secondaryPhone, $addressOne, $addressTwo, $city, $state, $zip, $email, $type, $mondayAvailability, $tuesdayAvailability, $wednesdayAvailability, $thursdayAvailability, $fridayAvailability, $saturdayAvailability, $sundayAvailability);
    $stmt->execute();

    if ($stmt->affected_rows == -1) {
        $contactConfirmation = false;
        $stmt->close();
    } else {
        $contactConfirmation = true;
        $stmt->close();
    }
}

$jsonConfirmation = array(
        'contact-confirmation' => $contactConfirmation
);

echo json_encode($jsonConfirmation);
