<?php
include("../scripts/header.php");
?>

<h1>Add Volunteer/Employee:</h1>
<br/>

<?php

//connect to database
include("../../db/config.php");

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
$isActiveFlag = $_POST['volunteerActiveFlag'];

$stmt = $db->prepare("INSERT INTO Volunteer_Employees (Author_Username, Active_Volunteer, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email, Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sisssssssssssiss', $userMakingChanges, $isActiveFlag, $prefix, $firstName, $lastName, $middleName, $suffix, $primaryPhone, $secondaryPhone, $addressOne, $addressTwo, $city, $state, $zip, $email, $type);
$stmt->execute();


if ($stmt->affected_rows == -1) {
    echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Volunteer/Employee could not be added to the database, please try again.
            </div>";
} else {
    echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Volunteer/Employee has been successfully added to the database.
            </div>";
    $stmt->close();
}

include("../scripts/footer.php");
?>
