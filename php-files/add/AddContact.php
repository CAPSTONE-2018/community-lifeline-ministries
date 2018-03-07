<?php
include("../scripts/header.php");
?>
    <h1>Add Contact Information:</h1>
    <br/>

<?php
//connect to database
include("../../db/config.php");

$userMakingChanges = $_SESSION['loggedIn'];
$prefix = $_POST['prefix'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$suffix = $_POST['suffix'];
$primaryPhone = $_POST['primaryPhone'];
$secondaryPhone = $_POST['secondaryPhone'];
$addressOne = $_POST['addressOne'];
$addressTwo = $_POST['addressTwo'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = intval($_POST['zip']);
$email = $_POST['email'];
$isActiveFlag = $_POST['activeFlag'];

$stmt = $db->prepare("INSERT INTO Contacts (Author_Username, Active_Contact, Prefix, First_Name, Middle_Name, Last_Name, Suffix , Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sisssssssssssis', $userMakingChanges, $isActiveFlag, $prefix, $firstName, $middleName, $lastName, $suffix, $primaryPhone, $secondaryPhone, $addressOne, $addressTwo, $city, $state, $zip, $email);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Contact could not be added to the database, please try again.
        </div>";
} else {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Contact has been successfully added to the database.
        </div>";
    $stmt->close();
}
include("../scripts/footer.php");
?>