$queryForStudentAllergies = "SELECT Medical_Concerns.Name, Medical_Concern_Types.Type
FROM (Medical_Concerns JOIN Student_To_Medical_Concerns ON Medical_Concerns.Id = Student_To_Medical_Concerns.Medical_Concern_Id)
JOIN Medical_Concern_Types ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id WHERE Student_Id = 1;";
$studentMedicalConcernResults = mysqli_query($db, $queryForStudentAllergies);