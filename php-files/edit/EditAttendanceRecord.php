<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
include("../app-shell/TimeZoneFormat.php");

$programIdToSearch = $_POST['programIdToEdit'];
$dateToSearch = $_POST['programDateToSearch'];

$queryForProgramName = "SELECT Program_Name From Programs WHERE Id = $programIdToSearch;";

$queryForStudentsAttendanceRecord = "SELECT Attendance.Student_Id, Attendance.Program_Id,
                                            Attendance.Attendance_Value, Attendance.TardyTime,
                                            Attendance.Note, Programs.Program_Name, Students.First_Name, Students.Last_Name 
                                     FROM (Attendance JOIN Programs ON Programs.Id = Attendance.Program_Id)
                                        JOIN Students ON Students.Id = Attendance.Student_Id WHERE Date = '$dateToSearch' AND Attendance.Program_Id = $programIdToSearch;";

$programNameResult = mysqli_query($db, $queryForProgramName);
$attendanceRecordResults = mysqli_query($db, $queryForStudentsAttendanceRecord);

$getInfo = mysqli_fetch_array($programNameResult, MYSQLI_ASSOC);
$programNameToDisplay = $getInfo['Program_Name'];
$dynamicRowId = 0;

?>
    <div class="app-title">
        <div>
            <h3><i class="fa fa-plus"></i> Edit Attendance Record</h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"> Edit Attendance</li>
        </ul>
    </div>
    <div class="container-fluid">
        <input type='hidden' value='<?php echo $programNameToDisplay; ?>' id='programNameToDisplay'/>
        <div class="card">
            <div class="card-header text-center">
                <?php
                if ($programId == 1) {
                    $iconToDisplay = "fa fa-bolt";
                } else if ($programId == 2) {
                    $iconToDisplay = "fa fa-diamond";
                } else {
                    $iconToDisplay = "fa fa-book";
                }
                echo "<h3 class='card-title'><i class='$iconToDisplay'></i> Editing Attendance for $programNameToDisplay</h3>";
                echo "<h5>$dateToDisplay</h5>";

                ?>
            </div>

            <form class="container-fluid" name="editAttendanceRecordForm" id="editAttendanceRecordForm">
                <div class="table-responsive col-sm-12">
                    <table id="attendance-table" class="table table-striped table-hover">
                        <thead>
                        <tr class="row">
                            <th class="col-1">#</th>
                            <th class="col-3">Student Name</th>
                            <th class="col-2 text-center">Present</th>
                            <th class="col-2 text-center">Absent</th>
                            <th class="col-2 text-center">Tardy</th>
                            <th class="col-2 text-center">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($attendanceRecordResults)) {
                            $dynamicRowId++;
                            $firstRowId = md5(uniqid(rand(), true));
                            $secondRowId = md5(uniqid(rand(), true));
                            $thirdRowId = md5(uniqid(rand(), true));

                            $attendanceValue = $row['Attendance_Value'];
                            $programId = $row['Program_Id'];
                            $studentIdToSearch = $row['Student_Id'];
                            $studentName = $row['First_Name'] . " " . $row['Last_Name'];
                            $presentCheckMark = '';
                            $absentCheckMark = '';
                            $tardyCheckMark = '';

                            if ($attendanceValue === "Present") {
                                $presentCheckMark = "checked";
                            } else if ($attendanceValue === "Absent") {
                                $absentCheckMark = "checked";
                            } else {
                                $tardyCheckMark = "checked";
                            } ?>
                            <tr class='row'>
                                <td class='col-1'></td>
                                <td class='col-3'>
                                    <?php echo $studentName; ?>
                                    <input type='hidden' name='studentId[<?php echo $dynamicRowId; ?>]'
                                           value='<?php echo $studentIdToSearch; ?>'/>
                                    <input type='hidden' name='programId[<?php echo $dynamicRowId; ?>]'
                                           value='<?php echo $programId; ?>'/>
                                    <input type='hidden' name='attendanceDate[<?php echo $dynamicRowId; ?>]'
                                           value='<?php echo $dateToSubmit; ?>'/>
                                </td>
                                <td class='radio-input-wrapper col-2 align-middle text-center'>
                                    <label class='radio-label' for='<?php echo $firstRowId; ?>'>
                                        <input type='radio'
                                               name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]' <?php echo $presentCheckMark; ?>
                                               value='Present' id='<?php echo $firstRowId; ?>'/>
                                        <span class='custom-check-mark green-check align-middle'></span>
                                    </label>
                                </td>

                                <td class='radio-input-wrapper col-2 align-middle text-center'>
                                    <label class='radio-label' for='<?php echo $secondRowId; ?>'>
                                        <input class='hover-checkbox' type='radio'
                                               name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]' <?php echo $absentCheckMark; ?>
                                               value='Absent' id='<?php echo $secondRowId; ?>'/>
                                        <span class='custom-check-mark red-check align-middle'></span>
                                    </label>
                                </td>

                                <td class='radio-input-wrapper col-2 align-middle text-center'>
                                    <label class='radio-label' for='<?php echo $thirdRowId; ?>'>
                                        <input type='radio'
                                               name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]' <?php echo $tardyCheckMark; ?>
                                               value='Tardy' id='<?php echo $thirdRowId; ?>'/>
                                        <span class='custom-check-mark blue-check align-middle'></span>
                                    </label>
                                </td>

                                <td class="col-2 text-center">
                                    <button type='button'
                                            onclick='launchContactsModal(<?php echo $studentIdToSearch; ?>)'
                                            class='btn attendance-contact-button'>
                                        <i class='fa fa-phone'></i>
                                    </button>
                                </td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="card-footer">
                <div class="text-center">
                    <button id="submitAttendance" type="button"
                            onclick="sendEditAttendanceRecord()"
                            class="btn btn-primary attendance-submit-button">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function sendEditAttendanceRecord() {
            var attendanceForm = $("#editAttendanceRecordForm").serialize();
            var programName = document.getElementById("programNameToDisplay").value;
            var numberOfTableRows = $("#editAttendanceRecordForm tr").length - 1;
            var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/index-login/Main-Menu.php";
            var successModalMessage = "The Attendance Record for, " + programName + " has been updated successfully.";
            $.ajax({
                url: "/community-lifeline-ministries/php-files/mysql-statements/update/UpdateAttendanceRecord.php",
                method: "POST",
                data: {
                    formData: attendanceForm,
                    numberOfStudentsToSubmit: numberOfTableRows
                },
                success: function (response) {
                    alert(response);
                    if (response === 'database-error') {
                        launchGenericDatabaseErrorModal();
                    } else if (response === 'success') {
                        launchGenericSuccessfulEntryModal(successModalMessage, afterModalDisplaysRoute);
                    }
                }
            });
        }

    </script>

    <script src="../../js/modals/attendance/AttendanceWarning.js"></script>
<?php
include("../app-shell/Footer.php");
?>