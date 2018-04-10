<?php
//connect to database
include("../../db/config.php");
$queryForAllPrograms = "SELECT * FROM Programs ORDER BY Program_Name;";
$queryDoesAttendanceRecordExist = "SELECT DISTINCT Program_Id FROM Attendance WHERE Date = CURDATE();";
$programResults = mysqli_query($db, $queryForAllPrograms);
$resultsForEdit = mysqli_query($db, $queryForAllPrograms);
$attendanceRecordResult = mysqli_query($db, $queryDoesAttendanceRecordExist);
$programsWithAttendanceRecordArray = [];
while ($attendanceAssociation = mysqli_fetch_assoc($attendanceRecordResult)) {
    array_push($programsWithAttendanceRecordArray, $attendanceAssociation['Program_Id']);
}
$selectedDate = "";
?>
<link rel="stylesheet" href="../../node_modules/pretty-dropdowns/dist/css/prettydropdowns.css"/>

<div class="container-fluid col-sm-8">
    <div class="card text-center">
        <div class="card-header">
            Message On If Attendance Was Taken Today
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer text-muted align-content-center">
            <div class="nav nav-pills card-header-pills align-content-center">
                <div class="nav-item col-sm-4">
                    <form id="attendanceProgramToSelect" action="../new/NewAttendanceRecord.php" method="POST">
                        <select onchange="this.form.submit()" name="programId">
                            <option data-prefix="<span aria-hidden='true' class='glyphicon glyphicon-plus'></span>"
                                    disabled selected> Start New Record
                            </option>

                            <?php
                            while ($programsRow = mysqli_fetch_assoc($programResults)) {
                                $programId = $programsRow['Id'];
                                $programNameToDisplay = $programsRow['Program_Name'];

                                if (in_array($programId, $programsWithAttendanceRecordArray)) {
                                    echo "<option class='custom-size program-select-buttons' disabled value='$programId'>$programNameToDisplay</option>";
                                } else {
                                    echo "<option class='custom-size program-select-buttons' value='$programId'>$programNameToDisplay</option>";
                                }
                            }
                            ?>
                        </select>
                        <noscript><input type="submit" value="Submit"></noscript>
                    </form>
                </div>

                <div class="nav-item col-sm">
                    <form id="???" action="???" method="POST">
                        <input id="datepicker" name="dateToSearch" width="276" type="text" class="form-control"/>
                    </form>
                </div>


                <div class="nav-item col-sm-4">
                    <form id="attendanceProgramToEdit" action="../edit/EditAttendanceRecord.php" method="POST">
                        <select onchange="this.form.submit()" name="programId">
                            <option data-prefix="<span aria-hidden='true' class='glyphicon glyphicon-pencil'></span>"
                                    disabled selected> Edit
                            </option>
                            <?php
                            while ($programsRowToEdit = mysqli_fetch_assoc($resultsForEdit)) {
                                $programIdToEdit = $programsRowToEdit['Id'];
                                $programEditNameToDisplay = $programsRowToEdit['Program_Name'];

                                if (in_array($programIdToEdit, $programsWithAttendanceRecordArray)) {
                                    echo "<option class='custom-size program-select-buttons' value='$programIdToEdit'>$programEditNameToDisplay</option>";
                                } else {
                                    echo "<option class='custom-size program-select-buttons' disabled value='$programIdToEdit'>$programEditNameToDisplay</option>";
                                }
                            }
                            ?>
                        </select>
                        <noscript><input type="submit" value="Submit"></noscript>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>