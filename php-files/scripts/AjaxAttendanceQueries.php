<?php
include("../../db/config.php");

$queryForActiveSonsOfThunderStudents =  "SELECT Students.Id, Students.First_Name, Students.Last_Name, Student_To_Programs.Program_Id
FROM Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id WHERE Program_Id = 1 AND Students.Active_Student = 1;";

$queryForActiveGemStudents =  "SELECT Students.Id, Students.First_Name, Students.Last_Name, Student_To_Programs.Program_Id
FROM Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id WHERE Program_Id = 2 AND Students.Active_Student = 1;";

$queryForActiveBlessingTableStudents =  "SELECT Students.Id, Students.First_Name, Students.Last_Name, Student_To_Programs.Program_Id
FROM Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id WHERE Program_Id = 3 AND Students.Active_Student = 1;";

$sonsOfThunderResults = mysqli_query($db, $queryForActiveSonsOfThunderStudents);
$gemResults = mysqli_query($db, $queryForActiveGemStudents);
$blessingTableResults = mysqli_query($db, $queryForActiveBlessingTableStudents);