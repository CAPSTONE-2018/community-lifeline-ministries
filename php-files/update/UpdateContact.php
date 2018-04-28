<?php
include("../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$isActiveFlag = $_POST['activeFlag'];
$id = $_POST['contactId'];
$prefix = $_POST['contactPrefix'];
$firstName = $_POST['contactFirstName'];
$lastName = $_POST['contactLastName'];
$middleName = $_POST['middleName'];
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

$contactUpdateConfirmation = false;

$updateContactQuery = "
UPDATE Contacts SET 
  Last_Updated_Timestamp = NULL,
  Author_Username = '$userMakingChanges',
  First_Name = '$firstName', 
  Last_Name = '$lastName', 
  Middle_Name = '$middleName', 
  Suffix='$suffix',
  Primary_Phone = '$primaryPhone', 
  Secondary_Phone = '$secondaryPhone', 
  Address_One = '$addressOne', 
  Address_Two = '$addressTwo', 
  City = '$city', 
  State = '$state', 
  Zip = '$zip', 
  Email = '$email'  

  WHERE Id = '$id' ;";

if ($db->query($updateContactQuery) === TRUE) {
    $contactUpdateConfirmation = true;
} else {
    $contactUpdateConfirmation = false;
}


$jsonConfirmationObject = array(
    'contact-confirmation' => $contactUpdateConfirmation

);

echo json_encode($jsonConfirmationObject);