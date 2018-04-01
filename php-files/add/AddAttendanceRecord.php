<?php
include("../scripts/header.php");
?>
    <h1>Add Attendance Record:</h1>
    <br/>

<?php
//connect to database
include("../../db/config.php");

$userMakingChanges = $_SESSION['loggedIn'];
$i = 0;

foreach ($_POST as $key){
    $i++;
    $studentId = $_POST['studentId'][$i];
    $programId = $_POST['programId'][$i];
    $checkboxValue = $_POST['attendanceCheckbox'][$i];
    $date = $_POST['attendanceDate'];

    $stmt = $db->prepare("INSERT INTO Attendance (Author_Username, Date, Student_Id, Program_Id, Attendance_Value) VALUES (?,?,?,?,?)");
    $stmt->bind_param('ssiii',$userMakingChanges, $date, $studentId, $programId, $checkboxValue);
    $stmt->execute();
}

include("../scripts/footer.php");
?>