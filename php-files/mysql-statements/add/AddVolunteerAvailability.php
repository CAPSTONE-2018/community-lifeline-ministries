
<?php
//connect to database
include("../../db/config.php");

$volunteerId = intval($_POST['volunteerId']);
$mondayAvail = $_POST['monday'];
$tuesdayAvail = $_POST['tuesday'];
$wednesdayAvail = $_POST['wednesday'];
$thursdayAvail = $_POST['thursday'];
$fridayAvail = $_POST['friday'];
$saturdayAvail = $_POST['saturday'];
$sundayAvail = $_POST['sunday'];

if($mondayAvail == "true"){
    $mondayAvail = 1;
}
else{
    $mondayAvail = 0;
}

if($tuesdayAvail == "true"){
    $tuesdayAvail = 1;
}
else{
    $tuesdayAvail = 0;
}

if($wednesdayAvail == "true"){
    $wednesdayAvail = 1;
}
else{
    $wednesdayAvail = 0;
}

if($thursdayAvail == "true"){
    $thursdayAvail = 1;
}
else{
    $thursdayAvail = 0;
}

if($fridayAvail == "true"){
    $fridayAvail = 1;
}
else{
    $fridayAvail = 0;
}

if($saturdayAvail == "true"){
    $saturdayAvail = 1;
}
else{
    $saturdayAvail = 0;
}

if($sundayAvail == "true"){
    $sundayAvail = 1;
}
else{
    $sundayAvail = 0;
}

$queryVolunteerAvailabilityExist = "SELECT COUNT(Id) FROM Volunteer_Employees WHERE Volunteer_Employees.Id = ".$volunteerId;
$queryTypeVolunteers = "INSERT INTO Volunteer_Employees (Id, Monday_Availability, Tuesday_Availability, Wednesday_Availability, Thursday_Availability, Friday_Availability, Saturday_Availability, Sunday_Availability ) VALUES ($volunteerId, $mondayAvail, $tuesdayAvail, $wednesdayAvail, $thursdayAvail, $fridayAvail)";
$queryUpdateVolunteers = "UPDATE Volunteer_Employees SET Monday_Availability = '$mondayAvail', Tuesday_Availability = '$tuesdayAvail', Wednesday_Availability ='$wednesdayAvail', Thursday_Availability = '$thursdayAvail', Friday_Availability = '$fridayAvail', Saturday_Availability = '$saturdayAvail', Sunday_Availability = '$sundayAvail' WHERE Id = ".$volunteerId;

$NumOfVolunteers = mysqli_query($db, $queryVolunteerAvailabilityExist);
$NumOfVolunteersResult = mysqli_fetch_row($NumOfVolunteers);
if($NumOfVolunteersResult[0] > 0){
    $volunteersCurrent = mysqli_query($db, $queryUpdateVolunteers);
}
else{
    $volunteersCurrent = mysqli_query($db, $queryTypeVolunteers);

}


?>
