<?php
include("../scripts/header.php");
?>

<h1>Add Test Score Information:</h1>
<br/>

<?php

    //connect to database
    include("../../db/config.php");

    $id = intval($_POST['id']);
    $term = $_POST['term'];
    $year = intval($_POST['year']);
    $preTest = floatval($_POST['pre_test']);
    $postTest = floatval($_POST['post_test']);

    $stmt = $db->prepare("INSERT INTO Test_Score_To_Students (Student_Id, School_Year_Id, Pre_Test, Post_Test) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('iiii', $id, $year, $preTest, $postTest);
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
