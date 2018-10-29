<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../../db/config.php");
$dynamicRowId = 0;
$monday = '';
$tuesday = '';
$wednesday = '';
$thursday = '';
$friday = '';
$saturday = '';
$sunday = '';
$queryForNumOfVolunteers = "SELECT COUNT(Volunteer_Employees.Id) FROM Volunteer_Employees WHERE Volunteer_Employees.Active_Volunteer = 1";
$NumOfVolunteers = mysqli_query($db, $queryForNumOfVolunteers);
$NumOfVolunteersResult = mysqli_fetch_row($NumOfVolunteers);

$queryForVolunteerAvailability = "SELECT Volunteer_Employees.First_Name, Volunteer_Employees.Last_Name, Volunteer_Employees.Monday_Availability,Volunteer_Employees.Tuesday_Availability,
                              Volunteer_Employees.Wednesday_Availability,Volunteer_Employees.Thursday_Availability, Volunteer_Employees.Friday_Availability, 
                              Volunteer_Employees.Saturday_Availability, Volunteer_Employees.Sunday_Availability FROM Volunteer_Employees WHERE Active_Volunteer = 1;";
$volunteerAvailabilityResults = mysqli_query($db, $queryForVolunteerAvailability);
?>
<div class="app-title">
    <div>
        <h5><i class="fa fa-bookmark-o"></i> Volunteer Availability</h5>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> Availability</li>
    </ul>
</div>
<div class="card">
    <div class="card-header">
        <h3 class='card-title text-center'><i class="fa fa-star-o"></i> Volunteer Availability</h3>
    </div>
    <div class="container">
        <table id="employeeAvailabilityTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th class="text-center small">#</th>
                <th class="text-center small">Volunteer</th>
                <th class="text-center small">Sunday</th>
                <th class="text-center small">Monday</th>
                <th class="text-center small">Tuesday</th>
                <th class="text-center small">Wednesday</th>
                <th class="text-center small">Thursday</th>
                <th class="text-center small">Friday</th>
                <th class="text-center small">Saturday</th>
            </tr>
            </thead>

            <tbody>
            <?php
            while ($availabilityRow = mysqli_fetch_array($volunteerAvailabilityResults, MYSQLI_ASSOC)) {
                $dynamicRowId++;
                $nameToDisplay = $availabilityRow['First_Name'] . ' ' . $availabilityRow['Last_Name'];

                if ($availabilityRow['Sunday_Availability'] == 1) {
                    $sunday = "green-check fa fa-check-square-o";
                } else {
                    $sunday = "red-circle fa fa-ban";
                }
                if ($availabilityRow['Monday_Availability'] == 1) {
                    $monday = "green-check fa fa-check-square-o";
                } else {
                    $monday = "red-circle fa fa-ban";
                }
                if ($availabilityRow['Tuesday_Availability'] == 1) {
                    $tuesday = "green-check fa fa-check-square-o";
                } else {
                    $tuesday = "red-circle fa fa-ban";
                }
                if ($availabilityRow['Wednesday_Availability'] == 1) {
                    $wednesday = "green-check fa fa-check-square-o";
                } else {
                    $wednesday = "red-circle fa fa-ban";
                }
                if ($availabilityRow['Thursday_Availability'] == 1) {
                    $thursday = "green-check fa fa-check-square-o";
                } else {
                    $thursday = "red-circle fa fa-ban";
                }
                if ($availabilityRow['Friday_Availability'] == 1) {
                    $friday = "green-check fa fa-check-square-o";
                } else {
                    $friday = "red-circle fa fa-ban";
                }
                if ($availabilityRow['Saturday_Availability'] == 1) {
                    $saturday = "green-check fa fa-check-square-o";
                } else {
                    $saturday = "red-circle fa fa-ban";
                } ?>

                <tr>
                    <td class="text-center"></td>
                    <td class="text-center">
                        <?php echo $nameToDisplay; ?>
                        <input id='VolunteerId<?php echo $dynamicRowId; ?>' type='hidden'
                               name='VolunteerId[<?php echo $dynamicRowId; ?>]'
                               value='<?php echo $row['Id']; ?>'/>
                    </td>

                    <td class="text-center">
                        <button type="button"
                                class='btn permission-slip-button'>
                            <i class='<?php echo $sunday ?> mr-0'></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button"
                                class='btn permission-slip-button'>
                            <i class='<?php echo $monday ?> mr-0'></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button"
                                class='btn permission-slip-button'>
                            <i class='<?php echo $tuesday ?> mr-0'></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button"
                                class='btn permission-slip-button'>
                            <i class='<?php echo $wednesday ?> mr-0'></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button"
                                class='btn permission-slip-button'>
                            <i class='<?php echo $thursday ?> mr-0'></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button"
                                class='btn permission-slip-button'>
                            <i class='<?php echo $friday ?> mr-0'></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button"
                                class='btn permission-slip-button'>
                            <i class='<?php echo $saturday ?> mr-0'></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript">
    function ChangeVolunteerAvailability() {
        if(ErrorPromptCheck() == true){
            return;
        }
        var mondayInput, tuesdayInput, wednesdayInput, thursdayInput, fridayInput = 0;

        for (var i = 1; i < <?php echo $dynamicRowId; ?>+1; i++) {
            var volunteerId = document.getElementById('VolunteerId' + i).value;
            var monday = document.getElementById('Monday' + i).checked;
            var tuesday = document.getElementById('Tuesday' + i).checked;
            var wednesday = document.getElementById('Wednesday' + i).checked;
            var thursday = document.getElementById('Thursday' + i).checked;
            var friday = document.getElementById('Friday' + i).checked;
            var saturday = document.getElementById('Saturday' + i).checked;
            var sunday = document.getElementById('Sunday' + i).checked;

            $.ajax({
                url: "../add/AddVolunteerAvailability.php",
                method: "POST",
                data: {
                    volunteerId: volunteerId,
                    sunday: sunday,
                    monday: monday,
                    tuesday: tuesday,
                    wednesday: wednesday,
                    thursday: thursday,
                    friday: friday,
                    saturday: saturday
                },
                success: function (output) {

                }
            });
        }
    }
</script>

<script src="../../js/NumberTableRows.js"></script>
<?php include("../app-shell/Footer.php"); ?>
<!--$studentIdToSearch = $row['Student_Id'];-->
<!--$queryForContacts = "SELECT Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone-->
<!--FROM Student_To_Contacts JOIN Contacts On Student_To_Contacts.Contact_Id = Contacts.Id WHERE Student_Id = $studentIdToSearch";-->
<!--$currentContactForStudent = mysqli_query($db, $queryForContacts);-->
<!--while ($contactRow = mysqli_fetch_array($currentContactForStudent, MYSQLI_ASSOC)) {-->
<!--$contactName = $contactRow['First_Name'] . " " . $contactRow['Last_Name'];-->
<!--$contactPhone = $contactRow['Primary_Phone'];-->