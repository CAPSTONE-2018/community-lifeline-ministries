<?php

include("../scripts/header.php");
?>

<h1>Add Test Score Information:</h1>
<br/>

<?php
//connect to database
include("../../db/config.php");

$className = $_POST['name'];

$stmt = $db->prepare("INSERT INTO Classes (Class_Name) VALUES (?)");
$stmt->bind_param('s', $className);
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
