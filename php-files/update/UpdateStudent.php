<?php

include("../scripts/header.php");
?>

    <h1>Update Student Information:</h1>
    <br />


    <?php

    //connect to database
    include("../../db/config.php");

    session_start();

    $id = $_SESSION['studentId'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $ethnicity = $_POST['ethnicity'];
    $address = $_POST['address'];
    $zip = intval($_POST['zip']);
    $city = $_POST['city'];
    $state = $_POST['state'];
    $school = $_POST['school'];
    $permission_slip = intval($_POST['permission_slip']);
    $birth_certificate = intval($_POST['birth_certificate']);
    $reduced_lunch_eligible = intval($_POST['reduced_lunch_eligible']);
    $iep = intval($_POST['iep']);

    $allergyName = $_POST['aname'];
    $allergyType = $_POST['atype'];
    $allergyNote = $_POST['anote'];

    $sql = "UPDATE Student SET First_Name = '$fname', Last_Name = '$lname', Middle_Name = '$mname', Suffix = '$suffix',Gender = '$gender', Birth_Date = '$dob', Address = '$address', City = '$city', State = '$state', Zip = '$zip', Ethnicity = '$ethnicity', School = '$school', Permission_Slip = '$permission_slip', Birth_Certificate = '$birth_certificate', Reduced_Lunch_Eligible = '$reduced_lunch_eligible', IEP = '$iep' WHERE Id = '$id' ;";

    if ($db->query($sql) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Student has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Student could not be updated, please try again.
                      </div>";
    }





    $sql2 = "UPDATE Allergy SET Name = '$allergyName', Type = '$allergyType', Note = '$allergyNote' WHERE Id = '$id';";
    if ($db->query($sql2) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Student Allergy has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Student Allergy could not be updated, please try again.
                      </div>";
    }

    include("../scripts/footer.php");
    ?>
