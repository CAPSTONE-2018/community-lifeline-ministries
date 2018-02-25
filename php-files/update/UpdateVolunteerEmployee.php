<?php
include("../scripts/header.php");
?>

    <h1>Update Volunteer/Employee Information:</h1>
    <br />


    <?php

    //connect to database
    include("../../db/config.php");

    session_start();

    $id = $_SESSION['VolunteerEmployeeId'];

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


    $sql = "UPDATE Volunteer_Employee SET Prefix = '$prefix',First_Name = '$fname', Last_Name = '$lname', Middle_Name = '$mname', Suffix = '$suffix',Phone_Cell = '$cellphone', Phone_Home = '$homephone', Address = '$address', City = '$city', State = '$state', Zip = '$zip', Email = '$email', Type = '$type'  WHERE Id = '$id' ;";

    if ($db->query($sql) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Volunteer/Employee has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Volunteer/Employee could not be updated, please try again.
                      </div>";
    }

    include("../scripts/footer.php");


    ?>
