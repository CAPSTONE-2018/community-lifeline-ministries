<?php

include("../scripts/header.php");
?>

<h1>Update Student Information:</h1>
<br/>

<?php

//connect to database
include("../../db/config.php");

session_start();

$id = $_SESSION['studentId'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$suffix = $_POST['suffix'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$ethnicity = $_POST['ethnicity'];
$address = $_POST['address'];
$zip = intval($_POST['zip']);
$city = $_POST['city'];
$state = $_POST['state'];
$school = $_POST['school'];
$permissionSlip = intval($_POST['permissionSlip']);
$birthCertificate = intval($_POST['birthCertificate']);
$reducedLunchEligibility = intval($_POST['reducedLunchEligibility']);
$iep = intval($_POST['iep']);

$allergyName = $_POST['allergyName'];
$allergyType = $_POST['allergyType'];
$allergyNote = $_POST['allergyNote'];

$sql = "UPDATE Students SET First_Name = '$firstName', Last_Name = '$lastName', Middle_Name = '$middleName', Suffix = '$suffix',Gender = '$gender', Birth_Date = '$dob', Address = '$address', City = '$city', State = '$state', Zip = '$zip', Ethnicity = '$ethnicity', School = '$school', Permission_Slip = '$permissionSlip', Birth_Certificate = '$birthCertificate', Reduced_Lunch_Eligible = '$reducedLunchEligibility', IEP = '$iep' WHERE Id = '$id' ;";

if ($db->query($sql) === TRUE) {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Student has been successfully Updated.
        </div>";
} else {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Student could not be updated, please try again.
        </div>";
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

include("../scripts/footer.php");
?>
