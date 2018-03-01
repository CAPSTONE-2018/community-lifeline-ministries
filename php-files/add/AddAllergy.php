<?php

include("../scripts/header.php");
?>

<h1>Add Allergy Information:</h1>
<br/>

<?php
//connect to database
include("../../db/config.php");

$allergyName = $_POST['allergyName'];
$allergyType = $_POST['allergyType'];
$allergyNote = $_POST['allergyNote'];

$stmt = $db->prepare("INSERT INTO Allergies (Name, Type, Note) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $allergyName, $allergyType, $allergyNote);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "
        <div class='alert alert-danger'>
            <strong>Failure! </strong>Allergy could not be added to the database, please try again.
        </div>";
} else {
    echo "
        <div class='alert alert-success'>
            <strong>Success! </strong>Allergy has been successfully added to the database.
        </div>";
    $stmt->close();
}
include("../scripts/footer.php");
?>
