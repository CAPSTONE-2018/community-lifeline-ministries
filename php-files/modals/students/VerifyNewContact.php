<?php
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$contactActiveFlag = 1;
if (isset($_POST["contactPrefix"]))
{
    $prefix = $_POST['contactPrefix'];
}
else
{
    $prefix = null;
}
$firstName = $_POST['contactFirstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['contactLastName'];
$suffix = $_POST['suffix'];
$primaryPhone = $_POST['primaryPhone'];
$secondaryPhone = $_POST['secondaryPhone'];
$addressOne = $_POST['contactAddressOne'];
$addressTwo = $_POST['contactAddressTwo'];
$city = $_POST['contactCity'];
$state = $_POST['contactState'];
$zip = intval($_POST['contactZip']);
$email = $_POST['contactEmail'];
$relationship = $_POST['relationship'];
$addressToDisplay = $addressOne . " " . $addressTwo;
?>


<div>
    First Name:  <?php echo $firstName; ?> <br/>
    Last Name:  <?php echo $lastName; ?> <br/>
    Primary Phone:  <?php echo $primaryPhone; ?> <br/>
    Secondary Phone:  <?php echo $secondaryPhone; ?> <br/>
    Email:  <?php echo $email; ?> <br/>
    Relationship to Student:  <?php echo $relationship; ?> <br/>
    Address:  <?php echo $addressToDisplay; ?> <br/>
    City: <?php echo $city; ?> <br/>
    State: <?php echo $state; ?> <br/>
    Zip:  <?php echo $zip; ?> <br/>
</div>
