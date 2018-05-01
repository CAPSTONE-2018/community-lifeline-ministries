<?php
include("../../db/config.php");


$StudentId = $_POST['StudentId'];
$NewYear = $_POST['NewYear'];
$NewTerm = $_POST['NewTerm'];
$NewPre_Test = $_POST['NewPre_Test'];
$NewPost_Test = $_POST['NewPost_Test'];

$queryForStudentTestScores = "INSERT INTO Student_Test_Scores(Student_Id, School_Year, Term, Pre_Test, Post_Test, Created_Timestamp, Last_Updated_Timestamp, Author_Username)
VALUES ($StudentId,$NewYear,$NewTerm,$NewPre_Test,$NewPost_Test,NOW(),NOW(),'Developer')";

if (mysqli_query($db, $queryForStudentTestScores)) {
    echo "Records inserted successfully.";
} else {
    echo "ERROR: Could not able to execute $queryForStudentTestScores. " . mysqli_error($db);
}
?>

