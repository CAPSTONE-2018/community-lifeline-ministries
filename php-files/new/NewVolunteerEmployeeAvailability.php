<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../../db/config.php");

$queryVolunteers = "SELECT * FROM volunteer_employees WHERE volunteer_employees.Active_Volunteer = 1";

$volunteers = mysqli_query($db, $queryVolunteers);
$dynamicRowId = 0;

$queryForNumOfVolunteers = "SELECT COUNT(volunteer_employees.Id) FROM volunteer_employees WHERE volunteer_employees.Active_Volunteer = 1";

$NumOfVolunteers = mysqli_query($db, $queryForNumOfVolunteers);
$NumOfVolunteersResult = mysqli_fetch_row($NumOfVolunteers);
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <?php

            echo "<h3 class='card-title'> Volunteer Availability</h3>";

            ?>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form class="form-horizontal container-fluid" method="POST" action="../add/AddAttendanceRecord.php"
                      name="newAttendanceRecordForm" id="newAttendanceRecordForm">

                    <table id="attendance-table" class="table table-condensed table-hover table-responsive">
                        <thead>

                        <tr>
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-3">Volunteer Name</th>
                            <th class="col-sm-2 text-center">Monday</th>
                            <th class="col-sm-2 text-center">Tuesday</th>
                            <th class="col-sm-2 text-center">Wednesday</th>
                            <th class="col-sm-2 text-center">Thursday</th>
                            <th class="col-sm-2 text-center">Friday</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($volunteers, MYSQLI_ASSOC)) {
                            $dynamicRowId++;

                            $monday = '';
                            $tuesday = '';
                            $wednesday = '';
                            $thursday = '';
                            $friday = '';

                            $queryTypeVolunteers = "SELECT volunteer_employees_availability.Monday_Available,volunteer_employees_availability.Tuesday_Available,
      volunteer_employees_availability.Wednesday_Available,volunteer_employees_availability.Thursday_Available, volunteer_employees_availability.Friday_Available FROM  volunteer_employees_availability WHERE volunteer_employees_availability.Volunteer_EmployeeId = ".$row['Id'];
                            $volunteersCurrent = mysqli_query($db, $queryTypeVolunteers);
                            $row2 = mysqli_fetch_array($volunteersCurrent, MYSQLI_ASSOC);
                            $rowCount = mysqli_num_rows($volunteersCurrent);
                            if($rowCount > 0) {
                                if ($row2['Monday_Available'] == 1) {
                                    $monday = "checked = 'checked'";
                                } else {
                                    $monday = '';
                                }

                                if ($row2['Tuesday_Available'] == 1) {
                                    $tuesday = "checked = 'checked'";
                                } else {
                                    $tuesday = '';
                                }

                                if ($row2['Wednesday_Available'] == 1) {
                                    $wednesday = "checked = 'checked'";
                                } else {
                                    $wednesday = '';
                                }

                                if ($row2['Thursday_Available'] == 1) {
                                    $thursday = "checked = 'checked'";
                                } else {
                                    $thursday = '';
                                }

                                if ($row2['Friday_Available'] == 1) {
                                    $friday = "checked = 'checked'";
                                } else {
                                    $friday = '';
                                }
                            }
                            $studentName = $row['First_Name'] . " " . $row['Last_Name']; ?>
                            <tr class='number-row'>
                                <td class='col-sm-1 align-middle'></td>
                                <td class='col-sm-4 align-middle'>
                                    <?php echo $studentName; ?>
                                </td>
                                <td class='hidden align-middle'>
                                    <input id = 'VolunteerId<?php echo $dynamicRowId; ?>'type='hidden' name='VolunteerId[<?php echo $dynamicRowId; ?>]'
                                           value='<?php echo $row['Id']; ?>'/>
                                </td>
                                <td class='radio-input-wrapper col-sm-1 align-middle text-center'>
                                    <label class='radio-label' for='Monday<?php echo $dynamicRowId; ?>'>
                                        <input type='checkbox' name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]1'
                                               value='1' <?php echo $monday ?>
                                               id='Monday<?php echo $dynamicRowId; ?>'/>
                                        <span class='custom-check-mark blue-check'></span>
                                    </label>
                                </td>

                                <td class='radio-input-wrapper col-sm-1 align-middle text-center'>
                                    <label class='radio-label' for='Tuesday<?php echo $dynamicRowId; ?>'>
                                        <input class='hover-checkbox' type='checkbox'
                                               name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]2' value='2'
                                               id='Tuesday<?php echo $dynamicRowId; ?>' <?php echo $tuesday ?>/>
                                        <span class='custom-check-mark blue-check'></span>
                                    </label>
                                </td>

                                <td class='radio-input-wrapper col-sm-1 align-middle text-center'>
                                    <label class='radio-label' for='Wednesday<?php echo $dynamicRowId; ?>'>
                                        <input type='checkbox' name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]3'
                                               value='3' <?php echo $wednesday ?>
                                               id='Wednesday<?php echo $dynamicRowId; ?>'/>
                                        <span class='custom-check-mark blue-check'></span>
                                    </label>
                                </td>
                                <td class='radio-input-wrapper col-sm-1 align-middle text-center'>
                                    <label class='radio-label' for='Thursday<?php echo $dynamicRowId; ?>'>
                                        <input type='checkbox' name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]4'
                                               value='4' <?php echo $thursday ?>
                                               id='Thursday<?php echo $dynamicRowId; ?>'/>
                                        <span class='custom-check-mark blue-check'></span>
                                    </label>
                                </td>
                                <td class='radio-input-wrapper col-sm-1 align-middle text-center'>
                                    <label class='radio-label countForRows' for='Friday<?php echo $dynamicRowId; ?>'>
                                        <input type='checkbox' name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]5'
                                               value='5' <?php echo $friday ?>
                                               id='Friday<?php echo $dynamicRowId; ?>'/>
                                        <span class='custom-check-mark blue-check'></span>
                                    </label>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>

            <div class="card-footer">
                <div>
                    <button id="submitAttendance" form="newAttendanceRecordForm" type="button"
                            onclick="ChangeVolunteerAvailability()"
                            class="btn btn-right btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    function ChangeVolunteerAvailability() {
        var mondayInput, tuesdayInput, wednesdayInput, thursdayInput, fridayInput =0;

        for(var i =1; i < <?php echo $dynamicRowId; ?>+1; i++){
            var volunteerId = document.getElementById('VolunteerId'+i).value;
            var monday = document.getElementById('Monday'+i).checked;
            var tuesday = document.getElementById('Tuesday'+i).checked;
            var wednesday = document.getElementById('Wednesday'+i).checked;
            var thursday = document.getElementById('Thursday'+i).checked;
            var friday = document.getElementById('Friday'+i).checked;

            $.ajax({
                url: "../add/AddVolunteerAvailability.php",
                method: "POST",
                data: {volunteerId: volunteerId,monday:monday,tuesday:tuesday,wednesday:wednesday,thursday:thursday,friday:friday},
                success: function (output) {
                }
            });
        }
    }
</script>

<?php include("../app-shell/Footer.php"); ?>
<!--$studentIdToSearch = $row['Student_Id'];-->
<!--$queryForContacts = "SELECT Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone-->
<!--FROM Student_To_Contacts JOIN Contacts On Student_To_Contacts.Contact_Id = Contacts.Id WHERE Student_Id = $studentIdToSearch";-->
<!--$currentContactForStudent = mysqli_query($db, $queryForContacts);-->
<!--while ($contactRow = mysqli_fetch_array($currentContactForStudent, MYSQLI_ASSOC)) {-->
<!--$contactName = $contactRow['First_Name'] . " " . $contactRow['Last_Name'];-->
<!--$contactPhone = $contactRow['Primary_Phone'];-->