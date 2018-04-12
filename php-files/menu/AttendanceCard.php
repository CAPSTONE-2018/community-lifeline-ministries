<?php
//connect to database
include("../../db/config.php");
include ("../widgets/TimeZoneFormat.php");
$queryForAllPrograms = "SELECT * FROM Programs ORDER BY Program_Name;";
$queryDoesAttendanceRecordExist = "SELECT DISTINCT Program_Id FROM Attendance WHERE Date = '$dateToSubmit'";
$programResults = mysqli_query($db, $queryForAllPrograms);
$resultsForEdit = mysqli_query($db, $queryForAllPrograms);
$attendanceRecordResult = mysqli_query($db, $queryDoesAttendanceRecordExist);
$programsWithAttendanceRecordArray = [];
while ($attendanceAssociation = mysqli_fetch_assoc($attendanceRecordResult)) {
    array_push($programsWithAttendanceRecordArray, $attendanceAssociation['Program_Id']);
}



$datePickerResult = null;
if(isset($_POST['datePickerResult'])){
    $datePickerResult = $_POST['datePickerResult'];
}
$queryForDatePicker = "SELECT Program_Id FROM attendance WHERE Date = '$datePickerResult'";

?>
<!--<link rel="stylesheet" href="../../css/pretty-dropdowns.css"/>-->

<div class="container-fluid col-sm-8">
    <div class="card text-center">
        <div class="card-header">
            Message On If Attendance Was Taken Today
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <div class="nav-item col-lg">
                <input id="datepicker" width="276" name="datePickerResult" method='POST'/>
                <script>
                    $('#datepicker').datepicker();
                </script>

                <?php
                    echo $datePickerResult;
                    echo " HELLO";
                ?>

            </div>
        </div>
        <div class="card-footer text-muted align-content-center">
            <div class="nav nav-pills card-header-pills align-content-center">
                <div class="nav-item col-sm-4">
                    <form id="attendanceProgramToSelect" action="../new/NewAttendanceRecord.php" method="POST">
                        <select onchange="this.form.submit()" name="programId">
                            <option data-prefix="<span aria-hidden='true' class='glyphicon glyphicon-plus'></span>"
                                    readonly selected> Start New Record
                            </option>

                            <?php
                            while ($programsRow = mysqli_fetch_assoc($programResults)) {
                                $programId = $programsRow['Id'];
                                $programNameToDisplay = $programsRow['Program_Name'];
                                $iconToDisplay = '';
                                if ($programId == 1) {
                                    $iconToDisplay = "fa fa-bolt";
                                } else if ($programId == 2) {
                                    $iconToDisplay = "fa fa-diamond";
                                } else if ($programId == 3) {
                                    $iconToDisplay = "fa fa-book";
                                }
                                if (in_array($programId, $programsWithAttendanceRecordArray)) { ?>
                                        <option disabled data-prefix="<span aria-hidden='true' class='<?php echo $iconToDisplay; ?>'></span>" class='custom-size program-select-buttons' value='<?php echo $programId; ?>'> <?php echo $programNameToDisplay; ?></option>
                                <?php
                                } else {?>
                                        <option data-prefix="<span aria-hidden='true' class='<?php echo $iconToDisplay; ?>'></span>" class='custom-size program-select-buttons' value='<?php echo $programId; ?>'> <?php echo $programNameToDisplay; ?></option>
                                <?php
                                }
                            } ?>
                        </select>
                        <noscript><input type="submit" value="Submit"></noscript>
                    </form>
                </div>

                <div class="nav-item col-sm-4">
                    <form id="attendanceProgramToEdit" action="../edit/EditAttendanceRecord.php" method="POST">
                        <select onchange="this.form.submit()" name="programIdToEdit">
                            <option data-prefix="<span aria-hidden='true' class='glyphicon glyphicon-pencil'></span>"
                                    readonly selected> Edit
                            </option>
                            <?php
                            while ($programsRowToEdit = mysqli_fetch_assoc($resultsForEdit)) {
                                $programIdToEdit = $programsRowToEdit['Id'];
                                $programEditNameToDisplay = $programsRowToEdit['Program_Name'];
                                $iconToDisplay = '';
                                if ($programIdToEdit == 1) {
                                    $iconToDisplay = "fa fa-bolt";
                                } else if ($programIdToEdit == 2) {
                                    $iconToDisplay = "fa fa-diamond";
                                } else if ($programIdToEdit == 3) {
                                    $iconToDisplay = "fa fa-book";
                                }
                                if (in_array($programIdToEdit, $programsWithAttendanceRecordArray)) {?>
                                    <option data-prefix="<span aria-hidden='true' class='<?php echo $iconToDisplay; ?>'></span>" class='custom-size program-select-buttons' value='<?php echo $programIdToEdit; ?>'> <?php echo $programEditNameToDisplay; ?></option>
                                    <?php
                                } else {?>
                                    <option disabled data-prefix="<span aria-hidden='true' class='<?php echo $iconToDisplay; ?>'></span>" class='custom-size program-select-buttons'  value='<?php echo $programIdToEdit; ?>'> <?php echo $programEditNameToDisplay; ?></option>
                                    <?php
                                }
                            } ?>
                        </select>
                        <noscript><input type="submit" value="Submit"></noscript>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>