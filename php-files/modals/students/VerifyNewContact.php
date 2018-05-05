<?php
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$contactActiveFlag = 1;
$prefix = $_POST['contactPrefix'];
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

?>


<div>
    prefix: <?php echo $prefix; ?> <br/>
    first Name:  <?php echo $firstName; ?> <br/>
</div>
