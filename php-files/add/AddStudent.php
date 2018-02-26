<?php
include("../scripts/header.php");
?>

    <h1>Add Student Information:</h1>
    <br />

<?php
    # connect to db
    include("../../db/config.php");

    $firstName = $_POST['$firstName'];
    $middleName = $_POST['$middleName'];
    $lastName = $_POST['$lastName'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $ethnicity = $_POST['ethnicity'];
    $address = $_POST['address'];
    $zip = intval($_POST['zip']);
    $city = $_POST['city'];
    $state = $_POST['state'];
    $school = $_POST['school'];
    $permissionSlip = intval($_POST['$permissionSlip']);
    $birthCertificate = intval($_POST['$birthCertificate']);
    $reducedLunchEligibility = intval($_POST['$reducedLunchEligibility']);
    $iep = intval($_POST['iep']);
    $allergyName = $_POST['allergyName'];
    $allergyType = $_POST['allergyType'];
    $allergyNote = $_POST['allergyNote'];
    #Adding student records based on the information the user added into the "add" fields

    $stmt = $db->prepare("INSERT INTO Students (First_Name , Middle_Name, Last_Name, Suffix, Gender, Birth_Date, Address, City, State, Zip, Ethnicity, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssssissiiii', $firstName, $middleName, $lastName, $suffix, $gender, $dob, $address, $city, $state, $zip, $ethnicity, $school, $permissionSlip, $birthCertificate, $reducedLunchEligibility, $iep);
    $stmt->execute();

    if ($stmt->affected_rows == -1) {
        echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Student could not be added to the database, please try again.
            </div>";
    } else {
        echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Student has been successfully added to the database.
            </div>";
        $stmt->close();
}
    //query to get id of Student just added
    $query = 'SELECT * FROM Students WHERE First_Name = "' .$firstName. '" AND Last_Name = "'.$lastName. '";';
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    $stmt = $db->prepare("INSERT INTO Allergies (Name, Type, Note) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $allergyName, $allergyType, $allergyNote);
    $stmt->execute();
    if ($stmt->affected_rows == -1) {
        echo "
            <div class='alert alert-danger'>
                <strong>Failure! </strong>Allergies could not be added to the database, please try again.
            </div>";
    } else {
        echo "
            <div class='alert alert-success'>
                <strong>Success! </strong>Allergies has been successfully added to the database.
            </div>";
        $stmt->close();
}
    //query to get id of Student just added
    $query = 'SELECT * FROM Students WHERE First_Name = "' .$firstName. '" AND Last_Name = "'.$lastName. '";';
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    $query = 'SELECT * FROM Allergies WHERE Name = "' .$allergyName. '" AND Type = "' .$allergyType. '" AND Note = "' .$allergyNote. '";';
    $result = $db->query($query);
    $row_aid = $result->fetch_assoc();
    $stmt = $db->prepare("INSERT INTO student_to_allergy (Id, Student_Id,Allergy_Id) VALUES (?, ?, ?)");
    $stmt->bind_param('iii',$id ,$row, $row_aid);
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