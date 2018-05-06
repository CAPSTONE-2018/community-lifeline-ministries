<?php
session_start();
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
$addressToDisplay = $studentAddressOne . " " . $studentAddressTwo;
$printPermissionSlipOnFile = "";
$printBirthCertificateOnFile = "";
$printReducedLunchEligibility = "";
$printIep = "";

if ($studentPermissionSlip === 0) {
    $printPermissionSlipOnFile = "No";
} else {
    $printPermissionSlipOnFile = "Yes";
}

if ($studentBirthCertificate === 0) {
    $printBirthCertificateOnFile = "No";
} else {
    $printBirthCertificateOnFile = "Yes";
}

if ($studentReducedLunchEligibility === 0) {
    $printReducedLunchEligibility = "No";
} else {
    $printReducedLunchEligibility = "Yes";
}

if ($studentIep === 0) {
    $printIep = "No";
} else {
    $printIep = "Yes";
}
?>

<div>
    First Name: <?php echo $studentFirstName; ?> <br/>
    Last Name: <?php echo $studentLastName; ?> <br/>
    Middle Name: <?php echo $studentMiddleName; ?> <br/>
    Suffix: <?php echo $studentSuffix; ?> <br/>
    Date of Birth: <?php echo $studentDob; ?> <br/>
    Ethnicity: <?php echo $studentEthnicity; ?> <br/>
    Gender: <?php echo $studentGender; ?> <br/>
    Address: <?php echo $addressToDisplay; ?> <br/>
    City: <?php echo $studentCity; ?> <br/>
    State: <?php echo $studentState; ?> <br/>
    Zip Code: <?php echo $studentZip; ?> <br/>
    School: <?php echo $studentSchool; ?> <br/>
    Program: <br/>
    Permission Slip on File: <?php echo $printPermissionSlipOnFile; ?> <br/>
    Birth Certificate on File: <?php echo $printBirthCertificateOnFile; ?> <br/>
    Reduced Lunch Eligibility: <?php echo $printReducedLunchEligibility; ?> <br/>
    IEP: <?php echo $printIep; ?> <br/>
</div>
