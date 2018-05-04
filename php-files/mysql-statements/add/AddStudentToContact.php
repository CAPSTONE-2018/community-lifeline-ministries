<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$studentId = $_POST['studentId'];
$contactId = $_POST['contactId'];
$relationship = $_POST['relationship'];
$isActiveFlag = 1;
$queryForStudentToContact = "SELECT * FROM Student_To_Contacts WHERE Student_Id = '$studentId' AND Contact_Id = '$contactId';";
$existingStudentsToContactsResults = mysqli_query($db, $queryForStudentToContact);
$doesStudentToContactExist = mysqli_num_rows($existingStudentsToContactsResults);

if ($studentId !== '' && $contactId !== '') {
    if ($doesStudentToContactExist > 0) {
        echo "entry-exists";
    } else {
        $stmt = $db->prepare("INSERT INTO Student_To_Contacts (Author_Username, Active_Id, Student_Id, Contact_Id, Relationship) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('siiis', $userMakingChanges, $isActiveFlag, $studentId, $contactId, $relationship);
        $stmt->execute();

        if (mysqli_affected_rows($db) >= 1) {
            echo "success";
            $stmt->close();
        } else {
            echo "database-error";
            $stmt->close();
        }
    }
} else {
    echo "fill-required-inputs";
}
