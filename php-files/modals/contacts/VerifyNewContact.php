<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$contactActiveFlag = 1;
$prefix = $_POST['contactPrefix'];
$studentId = $_POST['student'];
$firstName = $_POST['contactFirstName'];
$lastName = $_POST['contactLastName'];
$suffix = $_POST['suffix'];
$primaryPhone = $_POST['contactPrimaryPhone'];
$secondaryPhone = $_POST['contactSecondaryPhone'];
$addressOne = $_POST['contactAddressOne'];
$addressTwo = $_POST['contactAddressTwo'];
$city = $_POST['contactCity'];
$state = $_POST['contactState'];
$zip = intval($_POST['contactZip']);
$email = $_POST['contactEmail'];
$relationship = $_POST['relationToStudent'];
$addressToDisplay = $addressOne . " " . $addressTwo;

$queryForStudentName = "SELECT Students.First_Name, Students.Last_Name FROM Students WHERE Id = '$studentId';";
$studentNameResults = mysqli_query($db, $queryForStudentName);
$studentNameRow = mysqli_fetch_assoc($studentNameResults);
$nameToDisplay = $studentNameRow['First_Name'] . " " . $studentNameRow['Last_Name'];
?>


<div>
    First Name:  <?php echo $firstName; ?> <br/>
    Last Name:  <?php echo $lastName; ?> <br/>
    Student:  <?php echo $nameToDisplay; ?> <br/>
    Relationship to Student:  <?php echo $relationship; ?> <br/>
    Primary Phone:  <?php echo $primaryPhone; ?> <br/>
    Secondary Phone:  <?php echo $secondaryPhone; ?> <br/>
    Email:  <?php echo $email; ?> <br/>
    Address:  <?php echo $addressToDisplay; ?> <br/>
    City: <?php echo $city; ?> <br/>
    State: <?php echo $state; ?> <br/>
    Zip:  <?php echo $zip; ?> <br/>

</div>
