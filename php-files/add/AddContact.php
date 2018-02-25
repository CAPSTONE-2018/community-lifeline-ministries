<?php
    include("../scripts/header.php");
?>
<h1>Add Contact Information:</h1>
<br />

<?php

    //connect to database
    include("../../db/config.php");

    $prefix = $_POST['prefix'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $cellphone = $_POST['cellphone'];
    $homephone = $_POST['homephone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = intval($_POST['zip']);
    $email = $_POST['email'];

    $stmt = $db->prepare("INSERT INTO Contact (Prefix, First_Name, Middle_Name, Last_Name, Suffix ,Phone_Cell, Phone_Home, Address, City, State, Zip, Email) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssssis', $prefix, $fname, $mname ,$lname, $suffix,$cellphone, $homephone, $address, $city, $state, $zip, $email);
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