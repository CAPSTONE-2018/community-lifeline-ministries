<?php

include("../scripts/header.php");
?>

<h1>Add Student to Class Information:</h1>
<br/>

<?php
//connect to database
include("../../db/config.php");

$userMakingChanges = $_SESSION['loggedIn'];
$studentId = intval($_POST['studentId']);
$classId = $_POST['classId'];

$stmt = $db->prepare("INSERT INTO Student_To_Classes (Author_Username, Student_Id, Class_Id) VALUES (?, ?, ?)");
$stmt->bind_param('sii', $userMakingChanges, $studentId, $classId);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Student could not be added to the class, please try again.
        </div>";
} else {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Student has been successfully added to the class.
        </div>";
    $stmt->close();
}
include("../scripts/footer.php");
?>
