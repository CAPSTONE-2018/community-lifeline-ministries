<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$id = $_POST['studentId'];
$firstName = $_POST['studentFirstName'];
$lastName = $_POST['studentLastName'];
$middleName = $_POST['studentMiddleName'];
$suffix = $_POST['studentSuffix'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$ethnicity = $_POST['ethnicity'];
$addressOne = $_POST['studentAddressOne'];
$addressTwo = $_POST['studentAddressTwo'];
$zip = intval($_POST['studentZip']);
$city = $_POST['studentCity'];
$state = $_POST['studentState'];
$school = $_POST['studentSchool'];
if (isset($_POST["permissionSlipCheckbox"]))
{
    $studentPermissionSlip = intval($_POST['permissionSlipCheckbox']);
}
else
{
    $studentPermissionSlip = 0;
}
if (isset($_POST["birthCertificateCheckbox"]))
{
    $studentBirthCertificate = intval($_POST['birthCertificateCheckbox']);
}
else
{
    $studentBirthCertificate = 0;
}
if (isset($_POST["reducedLunchEligibilityCheckbox"]))
{
    $studentReducedLunchEligibility = intval($_POST['reducedLunchEligibilityCheckbox']);
}
else
{
    $studentReducedLunchEligibility = 0;
}
if (isset($_POST["iepCheckbox"]))
{
    $studentIep = intval($_POST['iepCheckbox']);
}
else
{
    $studentIep = 0;
}

$studentUpdateConfirmation = false;

if (trim($state) !== '' && trim($gender) !== '') {
    $sql = "
UPDATE Students SET 
  Author_Username = '$userMakingChanges',
  Last_Updated_Timestamp = NULL,
  First_Name = '$firstName', 
  Last_Name = '$lastName', 
  Middle_Name = '$middleName', 
  Suffix = '$suffix',
  Gender = '$gender', 
  Birth_Date = '$dob', 
  Address_One = '$addressOne', 
  Address_Two = '$addressTwo', 
  City = '$city', 
  State = '$state', 
  Zip = '$zip', 
  Ethnicity = '$ethnicity', 
  School = '$school', 
  Permission_Slip = '$studentPermissionSlip', 
  Birth_Certificate = '$studentBirthCertificate', 
  Reduced_Lunch_Eligible = '$studentReducedLunchEligibility', 
  IEP = '$studentIep' 
  WHERE Id = '$id' ;";
    if ($db->query($sql) === TRUE) {
        $studentUpdateConfirmation = true;
    } else {
        $studentUpdateConfirmation = false;
    }
//
//
//$sql2 = "UPDATE Allergies SET Name = '$allergyName', Type = '$allergyType', Note = '$allergyNote' WHERE Id = '$id';";
//if ($db->query($sql2) === TRUE) {
//    echo "<div class='alert alert-success'>
//                        <strong>Success! </strong>Student Allergy has been successfully Updated.
//                      </div>";
//} else {
//    echo "
//        <div class='alert alert-danger'>
//            <strong>Failure! </strong>Student Allergy could not be updated, please try again.
//        </div>";
//}
    $jsonConfirmationObject = array(
        'student-confirmation' => $studentUpdateConfirmation
    );

    echo json_encode($jsonConfirmationObject);

} else {
    echo "fill-required-inputs";
}

