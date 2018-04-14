<?php
include("../scripts/header.php");
?>
    <h1>Add Student Information:</h1>
    <br/>
<?php
# connect to db
include("../../db/config.php");

$userMakingChanges = $_SESSION['loggedIn'];
$studentActiveFlag = 1;
$studentFirstName = $_POST['studentFirstName'];
$studentMiddleName = $_POST['studentMiddleName'];
$studentLastName = $_POST['studentLastName'];
$studentSuffix = $_POST['studentSuffix'];
$studentGender = $_POST['gender'];
$studentDob = $_POST['dob'];
$studentEthnicity = $_POST['ethnicity'];
$studentAddressOne = $_POST['studentAddressOne'];
$studentAddressTwo = $_POST['studentAddressTwo'];
$studentZip = intval($_POST['studentZip']);
$studentCity = $_POST['studentCity'];
$studentState = $_POST['studentState'];
$studentSchool = $_POST['studentSchool'];
$studentPermissionSlip = intval($_POST['permissionSlipCheckbox']);
$studentBirthCertificate = intval($_POST['birthCertificateCheckbox']);
$studentReducedLunchEligibility = intval($_POST['reducedLunchEligibilityCheckbox']);
$studentIep = intval($_POST['iepCheckbox']);
$medicalConcernName = $_POST['medicalConcernName'];
$medicalConcernType = $_POST['medicalConcernType'];
$medicalConcernNote = $_POST['medicalConcernNote'];

$contactActiveFlag = 1;
$contactFirstName = $_POST['contactFirstName'];
$contactLastName = $_POST['contactLastName'];
$contactPrimaryPhone = $_POST['contactPrimaryPhone'];
$contactSecondaryPhone = $_POST['contactSecondaryPhone'];
$contactAddressOne = $_POST['contactAddressOne'];
$contactAddressTwo = $_POST['contactAddressTwo'];
$contactCity = $_POST['contactCity'];
$contactState = $_POST['contactState'];
$contactZip = $_POST['contactZip'];
$contactEmail = $_POST['contactEmail'];
$contactRelationshipToStudent = $_POST['contactRelationToStudent'];
$lastContactInsertId = 0;

$stmtStudent = $db->prepare("INSERT INTO Students (Author_Username, Active_Student, First_Name , Middle_Name, Last_Name, Suffix, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, Ethnicity, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmtStudent->bind_param('sissssssssssissiiii', $userMakingChanges, $studentActiveFlag, $studentFirstName, $studentMiddleName, $studentLastName, $studentSuffix, $studentGender, $studentDob, $studentAddressOne, $studentAddressTwo, $studentCity, $studentState, $studentZip, $studentEthnicity, $studentSchool, $studentPermissionSlip, $studentBirthCertificate, $studentReducedLunchEligibility, $studentIep);
$stmtStudent->execute();
$lastStudentInsertId = $stmtStudent->insert_id;



if (($_POST['contactFirstName']) != ""){
    $stmtContact = $db->prepare("INSERT INTO Contacts (Author_Username, Active_Contact, First_Name, Last_Name, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmtContact->bind_param('sissssssssis', $userMakingChanges, $contactActiveFlag, $contactFirstName, $contactLastName, $contactPrimaryPhone, $contactSecondaryPhone, $contactAddressOne, $contactAddressTwo, $contactCity, $contactState, $contactZip, $contactEmail);
    $stmtContact->execute();
    $lastContactInsertId = $stmtContact->insert_id;
    if ($stmtContact->affected_rows == -1) {
        echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Contact could not be added to the database, please try again.
            </div>";
    } else {
        echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Contact has been successfully added to the database.
            </div>";
        $stmtStudent->close();
    }
}


if ($stmtStudent->affected_rows == -1) {
    echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Student could not be added to the database, please try again.
            </div>";
} else {
    echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Student has been successfully added to the database.
            </div>";
    $stmtStudent->close();
}

if($lastContactInsertId != null) {
    $stmtStudentToContact = $db->prepare("INSERT INTO Student_To_Contacts (Author_Username, Student_Id, Contact_Id, Relationship) VALUES (?,?,?,?)");
    $stmtStudentToContact->bind_param('siis',$userMakingChanges, $lastStudentInsertId, $lastContactInsertId, $contactRelationshipToStudent);
    $stmtStudentToContact->execute();
}

$query = 'SELECT * FROM Medical_Concerns WHERE Name = "' . $medicalConcernName . '" AND Type = "' . $medicalConcernType . '" AND Note = "' . $medicalConcernNote . '";';
$result = $db->query($query);
$row_aid = $result->fetch_assoc();


$stmt = $db->prepare("INSERT INTO Student_To_Medical_Concerns (Student_Id, Medical_Concern_Id) VALUES (?, ?)");
$stmt->bind_param('ii', $stmtStudent->insert_id, $row_aid);
$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Students to Allergies could not be added to the database, please try again.
            </div>";
} else {
    echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Students to Allergies has been successfully added to the database.
            </div>";
    $stmt->close();
}

include("../scripts/footer.php");
?>