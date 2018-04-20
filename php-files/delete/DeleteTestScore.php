<?php
include("../../db/config.php");

$testScoreId = $_POST['TestScoreId'];

$queryForStudentTestScores = "DELETE FROM student_test_scores WHERE student_test_scores.Id = $testScoreId";

if(mysqli_query($db, $queryForStudentTestScores)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryForStudentTestScores. " . mysqli_error($db);
}
?>

