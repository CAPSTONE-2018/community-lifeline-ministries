<?php

include("../scripts/header.php");
?>

<h1>Add Volunteer to Program Information:</h1>
<br/>

<?php
//connect to database
include("../../db/config.php");

$studentId = intval($_POST['$studentId']);
$classId = $_POST['$classId'];

$stmt = $db->prepare("INSERT INTO Volunteer_To_Programs (Volunteer_Id, Program_Id) VALUES (?, ?)");
$stmt->bind_param('ii', $studentId, $classId);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>Volunteer could not be added to the class, please try again.
                      </div>";
} else {
    echo "<div class='alert alert-success'>
                        <strong>Success! </strong>Volunteer has been successfully added to the class.
                      </div>";
    $stmt->close();
}
include("../scripts/footer.php");
?>
