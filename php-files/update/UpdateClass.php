<?php
    include("../scripts/header.php");
?>
<h1>Update Class Information:</h1>
<br />

<?php

    //connect to database
    include("../../db/config.php");

    session_start();
    $id = $_SESSION['classid'];
    $className = $_POST['name'];

    $sql = "UPDATE Classes SET Class_Name = '$className' WHERE Id = '$id' ;";

    if ($db->query($sql) === TRUE){
        echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Class Name has been successfully Updated.
            </div>";
    }else{
        echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Class Name could not be updated, please try again.
            </div>";
    }

    $sql2 = "UPDATE Schedule SET Room_Number = '$roomNum', Start_Time = '$srtTime', End_Time = '$endTime', Day = '$day' WHERE Class_Id = '$id';";
    if ($db->query($sql2) === TRUE){
        echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Class Schedule has been successfully Updated.
                      </div>";
    }else{
        echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Class Schedule could not be updated, please try again.
                      </div>";
    }

      include("../scripts/footer.php");
?>
