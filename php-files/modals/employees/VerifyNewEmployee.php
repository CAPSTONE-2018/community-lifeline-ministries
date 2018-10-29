<?php
$volunteerType = $_POST['volunteerType'];
$prefix = $_POST['volunteerPrefix'];
$firstName = $_POST['volunteerFirstName'];
$lastName = $_POST['volunteerLastName'];
$primaryPhone = $_POST['volunteerPrimaryPhone'];
$secondaryPhone = $_POST['volunteerSecondaryPhone'];
$email = $_POST['volunteerEmail'];
$program = $_POST['volunteerProgram'];
$addressOne = $_POST['volunteerAddressOne'];
$addressTwo = $_POST['volunteerAddressTwo'];
$city = $_POST['volunteerCity'];
$state = $_POST['volunteerState'];
$zipCode = $_POST['volunteerZip'];
$sunday = isset($_POST['sundayCheckBox']);
$monday = isset($_POST['mondayCheckBox']);
$tuesday = isset($_POST['tuesdayCheckBox']);
$wednesday = isset($_POST['wednesdayCheckBox']);
$thursday = isset($_POST['thursdayCheckBox']);
$friday = isset($_POST['fridayCheckBox']);
$saturday = isset($_POST['saturdayCheckBox']);
$addressToDisplay = $addressOne . " " . $addressTwo;
$mondayAvailability = "";
$tuesdayAvailability = "";
$wednesdayAvailability = "";
$thursdayAvailability = "";
$fridayAvailability = "";
$saturdayAvailability = "";
$sundayAvailability = "";


if ($sunday == 1) {
    $sundayAvailability = 'Yes';
} else {
    $sundayAvailability = 'No';
}

if ($monday == 1) {
    $mondayAvailability = 'Yes';
} else {
    $mondayAvailability = 'No';
}

if ($tuesday == 1) {
    $tuesdayAvailability = 'Yes';
} else {
    $tuesdayAvailability = 'No';
}

if ($wednesday == 1) {
    $wednesdayAvailability = 'Yes';
} else {
    $wednesdayAvailability = 'No';
}

if ($thursday == 1) {
    $thursdayAvailability = 'Yes';
} else {
    $thursdayAvailability = 'No';
}

if ($friday == 1) {
    $fridayAvailability = 'Yes';
} else {
    $fridayAvailability = 'No';
}

if ($saturday == 1) {
    $saturdayAvailability = 'Yes';
} else {
    $saturdayAvailability = 'No';
}

?>

<div>
    Volunteer Type:  <?php echo $volunteerType; ?> <br/>
    First Name: <?php echo $firstName; ?> <br/>
    Last Name: <?php echo $lastName; ?> <br/>
    Primary Phone: <?php echo $primaryPhone; ?> <br/>
    Secondary Phone: <?php echo $secondaryPhone; ?> <br/>
    Email:  <?php echo $email; ?> <br/>
    Address:  <?php echo $addressToDisplay; ?> <br/>
    City: <?php echo $city; ?> <br/>
    State: <?php echo $state; ?> <br/>
    Zip:  <?php echo $zipCode; ?> <br/>

    <br/>
    <i>Availability: </i><br/>
    <ul>
        <li>&emsp;Sunday: <?php echo $sundayAvailability; ?> </li>
        <li>&emsp;Monday: <?php echo $mondayAvailability; ?> </li>
        <li>&emsp;Tuesday: <?php echo $tuesdayAvailability; ?> </li>
        <li>&emsp;Wednesday: <?php echo $wednesdayAvailability; ?> </li>
        <li>&emsp;Thursday: <?php echo $thursdayAvailability; ?> </li>
        <li>&emsp;Friday: <?php echo $fridayAvailability; ?> </li>
        <li>&emsp;Saturday: <?php echo $saturdayAvailability; ?> </li>
    </ul>
</div>