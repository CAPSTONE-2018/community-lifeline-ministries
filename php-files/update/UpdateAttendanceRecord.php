<?php
include("../scripts/header.php");
?>
<h1>Update Attendance:</h1>
<br/>

<?php

include("../../db/config.php");
$userMakingChanges = $_SESSION['loggedIn'];
$i = 0;

foreach ($_POST as $key){
    $i++;
    $studentId = $_POST['studentId'][$i];
    $programId = $_POST['programId'][$i];
    $checkboxValue = $_POST['attendanceCheckbox'][$i];
    $date = $_POST['attendanceDate'];


    $updateStatement = $db->prepare("UPDATE Attendance SET Author_Username = '$userMakingChanges', Last_Updated_Timestamp = NULL, 
                    Date = '$date', Student_Id = '$studentId', Program_Id = '$programId', Attendance_Value = '$checkboxValue'
                    WHERE Student_Id = '$studentId' AND Program_Id = '$programId' AND Date = '$date'
                    ");
    $updateStatement->execute();
}

include("../scripts/footer.php");
?>
