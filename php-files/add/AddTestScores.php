<?php
include("../scripts/header.php");
?>

<h1>Add Test Score Information:</h1>
<br/>

<?php

    //connect to database
    include("../../db/config.php");

    $id = intval($_POST['testScoreId']);
    $term = $_POST['term'];
    $year = intval($_POST['year']);
    $preTest = floatval($_POST['preTest']);
    $postTest = floatval($_POST['postTest']);

    $stmt = $db->prepare("INSERT INTO Student_Test_Scores (Student_Id, School_Year, Term, Pre_Test, Post_Test) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('iisii', $id, $year, $term, $preTest, $postTest);
    $stmt->execute();


    if ($stmt->affected_rows == -1) {
        echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Test Scores could not be added to the database, please try again.
            </div>";
    } else {
        echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Test Scores have been successfully added to the database.
            </div>";
        $stmt->close();
    }
    include("../scripts/footer.php");
?>
