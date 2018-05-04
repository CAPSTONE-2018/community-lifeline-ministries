
<?php
//connect to database
include("../../db/config.php");

$volunteerId = intval($_POST['volunteerId']);
$mondayAvail = $_POST['monday'];
$tuesdayAvail = $_POST['tuesday'];
$wednesdayAvail = $_POST['wednesday'];
$thursdayAvail = $_POST['thursday'];
$fridayAvail = $_POST['friday'];

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

$queryVolunteerAvailabilityExist = "SELECT COUNT(Id) FROM volunteer_employees_availability WHERE volunteer_employees_availability.Volunteer_EmployeeId = ".$volunteerId;
$queryTypeVolunteers = "INSERT INTO Volunteer_employees_availability (Volunteer_EmployeeId, Monday_Available, Tuesday_Available, Wednesday_Available, Thursday_Available, Friday_Available ) VALUES ($volunteerId, $mondayAvail, $tuesdayAvail, $wednesdayAvail, $thursdayAvail, $fridayAvail)";
$queryUpdateVolunteers = "UPDATE Volunteer_employees_availability SET Monday_Available = '$mondayAvail', Tuesday_Available = '$tuesdayAvail', Wednesday_Available ='$wednesdayAvail', Thursday_Available = '$thursdayAvail', Friday_Available = '$fridayAvail' WHERE Volunteer_EmployeeId = ".$volunteerId;

$NumOfVolunteers = mysqli_query($db, $queryVolunteerAvailabilityExist);
$NumOfVolunteersResult = mysqli_fetch_row($NumOfVolunteers);
if($NumOfVolunteersResult[0] > 0){
    $volunteersCurrent = mysqli_query($db, $queryUpdateVolunteers);
}
else{
    $volunteersCurrent = mysqli_query($db, $queryTypeVolunteers);

}


?>
