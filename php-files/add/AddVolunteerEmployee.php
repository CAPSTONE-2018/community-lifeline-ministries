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
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $suffix = $_POST['suffix'];
    $cellphone = $_POST['cellphone'];
    $homephone = $_POST['homephone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = intval($_POST['zip']);
    $email = $_POST['email'];
    $type = $_POST['type'];

    $stmt = $db->prepare("INSERT INTO Volunteer_Employee (Prefix, First_Name, Last_Name, Middle_Name, Suffix, Phone_Cell, Phone_Home, Address, City, State, Zip, Email, Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssssiss', $prefix, $fname, $lname, $mname, $suffix, $cellphone, $homephone, $address, $city, $state, $zip, $email, $type);
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
