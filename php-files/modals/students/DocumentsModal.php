<?php
include("../../../db/config.php");

$studentId = $_POST['studentId'];

$queryForStudentDocuments = "SELECT Birth_Certificate, Permission_Slip, Reduced_Lunch_Eligible, IEP 
                              FROM Students WHERE Id = '$studentId'";
$studentDocumentsResults = mysqli_query($db, $queryForStudentDocuments);


?>