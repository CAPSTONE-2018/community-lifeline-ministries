<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$studentId = $_POST['StudentId'];
$schoolYear = $_POST['NewYear'];
$term = $_POST['NewTerm'];
$preTest = $_POST['NewPre_Test'];
$postTest = $_POST['NewPost_Test'];

$stmt = $db->prepare("INSERT INTO Student_Test_Scores (Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test) VALUES (?,?,?,?,?,?)");
$stmt->bind_param('siisii',$userMakingChanges, $studentId, $schoolYear, $term, $preTest, $postTest);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "ERROR:  Not able to submit new student test score";
} else {
    echo "success";
}
