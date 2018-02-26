<?php
include("../scripts/header.php");
?>
    <h1>Add Contact Information:</h1>
    <br/>

<?php
//connect to database
include("../../db/config.php");

$prefix = $_POST['prefix'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$suffix = $_POST['suffix'];
$cellPhone = $_POST['cellPhone'];
$homePhone = $_POST['homePhone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = intval($_POST['zip']);
$email = $_POST['email'];

$stmt = $db->prepare("INSERT INTO Contacts (Prefix, First_Name, Middle_Name, Last_Name, Suffix ,Phone_Cell, Phone_Home, Address, City, State, Zip, Email) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssssssssis', $prefix, $firstName, $middleName, $lastName, $suffix, $cellPhone, $homePhone, $address, $city, $state, $zip, $email);
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