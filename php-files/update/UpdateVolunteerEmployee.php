<?php
include("../scripts/header.php");
?>

<h1>Update Volunteer/Employee Information:</h1>
<br/>

<?php

//connect to database
include("../../db/config.php");

session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$id = $_SESSION['volunteerId'];
$prefix = $_POST['prefix'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$suffix = $_POST['suffix'];
$primaryPhone = $_POST['primaryPhone'];
$secondaryPhone = $_POST['secondaryPhone'];
$addressOne = $_POST['addressOne'];
$addressTwo = $_POST['addressTwo'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = intval($_POST['zip']);
$email = $_POST['email'];
$type = $_POST['type'];

$sql = "
UPDATE Volunteer_Employees SET 
  Author_Username = '$userMakingChanges',
  Last_Updated_Timestamp = NULL,
  Prefix = '$prefix',
  First_Name = '$firstName', 
  Last_Name = '$lastName', 
  Middle_Name = '$middleName', 
  Suffix = '$suffix',
  Primary_Phone = '$primaryPhone', 
  Secondary_Phone = '$secondaryPhone', 
  Address_One = '$addressOne', 
  Address_One = '$addressTwo', 
  City = '$city', 
  State = '$state', 
  Zip = '$zip', 
  Email = '$email', 
  Type = '$type'  
  WHERE Id = '$id' ;";

if ($db->query($sql) === TRUE) {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Volunteer/Employee has been successfully Updated.
        </div>";
} else {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Volunteer/Employee could not be updated, please try again.
        </div>";
}
include("../scripts/footer.php");
?>
