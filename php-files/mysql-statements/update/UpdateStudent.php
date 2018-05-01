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
$permissionSlip = intval($_POST['permissionSlipCheckbox']);
$birthCertificate = intval($_POST['birthCertificateCheckbox']);
$reducedLunchEligibility = intval($_POST['reducedLunchEligibilityCheckbox']);
$iep = intval($_POST['iepCheckbox']);

$medicalConcernName = $_POST['medicalConcernName'];
$medicalConcernType = $_POST['medicalConcernType'];
$medicalConcernNote = $_POST['medicalConcernNote'];

$studentUpdateConfirmation = false;

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
  Permission_Slip = '$permissionSlip', 
  Birth_Certificate = '$birthCertificate', 
  Reduced_Lunch_Eligible = '$reducedLunchEligibility', 
  IEP = '$iep' 
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
