<?php
    include("../scripts/header.php");
?>

<h1>Add Volunteer/Employee:</h1>
<br />

<?php

    //connect to database
    include("../../db/config.php");


    $id = intval($_POST['id']);
    $prefix = $_POST['prefix'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $middleName = $_POST['middleName'];
    $suffix = $_POST['suffix'];
    $cellPhone = $_POST['cellPhone'];
    $homePhone = $_POST['homePhone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = intval($_POST['zip']);
    $email = $_POST['email'];
    $type = $_POST['type'];

    $stmt = $db->prepare("INSERT INTO Volunteer_Employees (Prefix, First_Name, Last_Name, Middle_Name, Suffix, Phone_Cell, Phone_Home, Address, City, State, Zip, Email, Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssssiss', $prefix, $firstName, $lastName, $middleName, $suffix, $cellPhone, $homePhone, $address, $city, $state, $zip, $email, $type);
    $stmt->execute();


    if ($stmt->affected_rows == -1) {
        echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Volunteer/Employee could not be added to the database, please try again.
            </div>";
    } else {
        echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Volunteer/Employee has been successfully added to the database.
            </div>";
        $stmt->close();
    }

    include("../scripts/footer.php");
?>
