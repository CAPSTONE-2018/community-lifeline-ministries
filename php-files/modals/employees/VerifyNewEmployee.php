<?php
$prefix = $_POST['volunteerPrefix'];
$firstName = $_POST['volunteerFirstName'];
$lastName = $_POST['volunteerLastName'];
$primaryPhone = $_POST['volunteerPrimaryPhone'];
$secondaryPhone = $_POST['volunteerSecondaryPhone'];
$volunteerEmail = $_POST['volunteerEmail'];
$volunteerType = $_POST['volunteerType'];
$program = $_POST['volunteerProgram'];
$addressOne = $_POST['volunteerAddressOne'];
$addressTwo = $_POST['volunteerAddressTwo'];
$city = $_POST['volunteerCity'];
$state = $_POST['volunteerState'];
$zipCode = $_POST['volunteerZip'];
$monday = $_POST['mondayCheckBox'];
$tuesday = $_POST['tuesdayCheckBox'];
$wednesday = $_POST['wednesdayCheckBox'];
$thursday = $_POST['thursdayCheckBox'];
$friday = $_POST['fridayCheckBox'];
$saturday = $_POST['saturdayCheckBox'];
$sunday = $_POST['sundayCheckBox'];
$addressToDisplay = $addressOne . " " . $addressTwo;
$mondayAvailability = "";
$tuesdayAvailability = "";
$wednesdayAvailability = "";
$thursdayAvailability = "";
$fridayAvailability = "";
$saturdayAvailability = "";
$sundayAvailability = "";

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

if ($sunday == 1) {
    $sundayAvailability = 'Yes';
} else {
    $sundayAvailability = 'No';
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

    Availability:
    Monday: <?php echo $mondayAvailability; ?> <br/>
    Tuesday:  <?php echo $tuesdayAvailability; ?> <br/>
    Wednesday:  <?php echo $wednesdayAvailability; ?> <br/>
    Thursday:  <?php echo $thursdayAvailability; ?> <br/>
    Friday:  <?php echo $fridayAvailability; ?> <br/>
    Saturday:  <?php echo $saturdayAvailability; ?> <br/>
    Sunday:  <?php echo $sundayAvailability; ?> <br/>
</div>