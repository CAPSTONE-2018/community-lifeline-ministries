<?php
include("scripts/header.php");
?>

    <h1>Update Contact Information:</h1>
    <br />


    <?php

    //connect to database
    include("db/config.php");

    session_start();

    $id = $_SESSION['contactId'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cellphone = $_POST['cellphone'];
    $homephone = $_POST['homephone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = intval($_POST['zip']);
    $email = $_POST['email'];
    $relationship = $_POST['relationship'];


    $sql = "UPDATE Contact SET First_Name = '$fname', Last_Name = '$lname', Phone_Cell = '$cellphone', Phone_Home = '$homephone', Address = '$address', City = '$city', State = '$state', Zip = '$zip', Email = '$email', Relationship = '$relationship'  WHERE Id = '$id' ;";

    if ($db->query($sql) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Contact has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Contact could not be updated, please try again.
                      </div>";
    }



include("scripts/footer.php");
    ?>
