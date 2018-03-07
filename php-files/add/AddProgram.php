<?php

include("../scripts/header.php");
?>

<h1>Add Program Information:</h1>
<br/>

<?php
//connect to database
include("../../db/config.php");

$userMakingChanges = $_SESSION['loggedIn'];
$programName = $_POST['name'];
$isActiveFlag = $_POST['activeFlag'];

$stmt = $db->prepare("INSERT INTO Programs (Author_Username, Active_Program, Program_Name) VALUES (?, ?, ?)");
$stmt->bind_param('sis', $userMakingChanges, $isActiveFlag, $programName);
$stmt->execute();


if ($stmt->affected_rows == -1) {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Class could not be added to the database, please try again.
        </div>";
} else {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Class has been successfully added to the database.
        </div>";
    $stmt->close();
}
include("../scripts/footer.php");
?>
