<?php
//connect to database
include("../../db/config.php");
include("../widgets/TimeZoneFormat.php");
$queryForAllPrograms = "SELECT * FROM Programs ORDER BY Program_Name;";
$queryDoesAttendanceRecordExist = "SELECT DISTINCT Program_Id FROM Attendance WHERE Date = '$dateToSubmit'";
$programResults = mysqli_query($db, $queryForAllPrograms);
$resultsForEdit = mysqli_query($db, $queryForAllPrograms);
$attendanceRecordResult = mysqli_query($db, $queryDoesAttendanceRecordExist);
$programsWithAttendanceRecordArray = [];
while ($attendanceAssociation = mysqli_fetch_assoc($attendanceRecordResult)) {
    array_push($programsWithAttendanceRecordArray, $attendanceAssociation['Program_Id']);
} ?>

<div class="container-fluid col-sm-8">
    <div class="card text-center">
        <div class="card-header">
            Attendance Center
        </div>

        <div class="card-body col-sm-12">
            <div class="form-group row text-center">
                <div class="col-sm-6 m-auto">
                    <input id="datePicker" name="datePicker" onchange="checkForDate()" placeholder="Search By Date" />
                </div>
            </div>
            <div class="form-group row text-center">
                <div id="programsToDisplay" class="m-auto"></div>
            </div>
        </div>
        <div class="card-footer text-muted align-content-center">
            <div class="nav nav-pills card-header-pills align-content-center">
                <div class="nav-item col-sm-6">
                    <form id="attendanceProgramToSelect" action="../../new/NewAttendanceRecord.php" method="POST">
                        <select onchange="this.form.submit()" name="programId">
                            <option data-prefix="<span aria-hidden='true' class='fa fa-plus'></span>"
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
                                    <option disabled
                                            data-prefix="<span aria-hidden='true' class='<?php echo $iconToDisplay; ?>'></span>"
                                            class='custom-size program-select-buttons'
                                            value='<?php echo $programId; ?>'> <?php echo $programNameToDisplay; ?></option>
                                    <?php
                                } else { ?>
                                    <option data-prefix="<span aria-hidden='true' class='<?php echo $iconToDisplay; ?>'></span>"
                                            class='custom-size program-select-buttons'
                                            value='<?php echo $programId; ?>'> <?php echo $programNameToDisplay; ?></option>
                                    <?php
                                }
                            } ?>
                        </select>
                        <noscript><input type="submit" value="Submit"></noscript>
                    </form>
                </div>

                <div class="nav-item col-sm-6">
                    <form id="attendanceProgramToEdit" action="../../edit/EditAttendanceRecord.php" method="POST">
                        <input type="hidden" name="programDateToSearch" value="<?php echo $dateToSubmit; ?>"/>
                        <select onchange="this.form.submit()" name="programIdToEdit">
                            <option data-prefix="<span aria-hidden='true' class='fa fa-pencil'></span>"
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
                                if (in_array($programIdToEdit, $programsWithAttendanceRecordArray)) { ?>
                                    <option data-prefix="<span aria-hidden='true' class='<?php echo $iconToDisplay; ?>'></span>"
                                            class='custom-size program-select-buttons'
                                            value='<?php echo $programIdToEdit; ?>'> <?php echo $programEditNameToDisplay; ?></option>
                                    <?php
                                } else { ?>
                                    <option disabled
                                            data-prefix="<span aria-hidden='true' class='<?php echo $iconToDisplay; ?>'></span>"
                                            class='custom-size program-select-buttons'
                                            value='<?php echo $programIdToEdit; ?>'> <?php echo $programEditNameToDisplay; ?></option>
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

<script>
    $('#datePicker').datepicker();

    function checkForDate() {
        var dateToSearch = $('#datePicker').val();  //grabs value from calendar
        $.ajax({
            url: "../scripts/AjaxDatePicker.php",
            method: "Post",
            data: {dateToSearch: dateToSearch},
            success: function (output) {
                $('#programsToDisplay').slideDown().html(output);
            }

        });
    }

</script>