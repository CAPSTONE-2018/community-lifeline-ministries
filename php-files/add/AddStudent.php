<?php
include("../scripts/header.php");
?>

    <h1>Add Student Information:</h1>
    <br />

<?php
    # connect to db
    include("../../db/config.php");

    $userName = $_SESSION['loggedIn'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $ethnicity = $_POST['ethnicity'];
    $address_one = $_POST['addressOne'];
    $address_two = $_POST['addressTwo'];
    $zip = intval($_POST['zip']);
    $city = $_POST['city'];
    $state = $_POST['state'];
    $school = $_POST['school'];
    $permissionSlip = intval($_POST['permissionSlip']);
    $birthCertificate = intval($_POST['birthCertificate']);
    $reducedLunchEligibility = intval($_POST['reducedLunchEligibility']);
    $iep = intval($_POST['iep']);
    $medicalConcernName = $_POST['medicalConcernName'];
    $medicalConcernType = $_POST['medicalConcernType'];
    $medicalConcernNote = $_POST['medicalConcernNote'];
    #Adding student records based on the information the user added into the "add" fields

    $stmtStudent = $db->prepare("INSERT INTO Students (Author_Username, First_Name , Middle_Name, Last_Name, Suffix, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, Ethnicity, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmtStudent->bind_param('sssssssssssissiiii', $username, $firstName, $middleName, $lastName, $suffix, $gender, $dob, $address_one, $address_two, $city, $state, $zip, $ethnicity, $school, $permissionSlip, $birthCertificate, $reducedLunchEligibility, $iep);
    $stmtStudent->execute();

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
//    //query to get id of Student just added
//    $query = 'SELECT * FROM Students WHERE First_Name = "' .$firstName. '" AND Last_Name = "'.$lastName. '";';
//    $result = $db->query($query);
//    $row = $result->fetch_assoc();
//
//    $stmt = $db->prepare("INSERT INTO Allergies (Name, Type, Note) VALUES (?, ?, ?)");
//    $stmt->bind_param('sss', $medicalConcernName, $medicalConcernType, $medicalConcernNote);
//    $stmt->execute();
//    if ($stmt->affected_rows == -1) {
//        echo "
//            <div class='alert alert-danger'>
//                <strong>Failure! </strong>Allergies could not be added to the database, please try again.
//            </div>";
//    } else {
//        echo "
//            <div class='alert alert-success'>
//                <strong>Success! </strong>Allergies has been successfully added to the database.
//            </div>";
//        $stmt->close();
//}
    //query to get id of Student just added
//    $query = 'SELECT * FROM Students WHERE First_Name = "'.$firstName.'" AND Last_Name = "'.$lastName. '";';
//    $result = $db->query($query);
//    $row = $result->fetch_assoc();


//    $query = 'SELECT * FROM Medical_Concerns WHERE Name = "' .$medicalConcernName. '" AND Type = "' .$medicalConcernType. '" AND Note = "' .$medicalConcernNote. '";';
//    $result = $db->query($query);
//    $row_aid = $result->fetch_assoc();


    $stmt = $db->prepare("INSERT INTO Student_To_Medical_Concerns (Student_Id, Medical_Concern_Id) VALUES (?, ?)");
    $stmt->bind_param('ii' , $stmtStudent->insert_id, $row_aid);
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