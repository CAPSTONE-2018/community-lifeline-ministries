<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
include("../app-shell/TimeZoneFormat.php");
$programIdToSearch = $_POST['programId'];
$queryStudentsInProgram = "SELECT DISTINCT Student_To_Programs.Program_Id, Programs.Program_Name,
                            Student_To_Programs.Student_Id, Students.First_Name, Students.Last_Name FROM
                            (Student_To_Programs JOIN Students ON Student_To_Programs.Student_Id = Students.Id)
                            JOIN Programs ON Student_To_Programs.Program_Id = Programs.Id
                            WHERE Student_To_Programs.Program_Id = $programIdToSearch && Students.Active_Student = 1;";
$currentStudentsInProgram = mysqli_query($db, $queryStudentsInProgram);
$getInfo = mysqli_fetch_array($currentStudentsInProgram, MYSQLI_ASSOC);
$programNameToDisplay = $getInfo['Program_Name'];
$programId = $getInfo['Program_Id'];
$dynamicRowId = 0;
?>
    <div class="app-title">
        <div>
            <h3><i class="fa fa-plus"></i> New Attendance Record</h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"> New Attendance</li>
        </ul>
    </div>
    <div class="container-fluid">
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
                echo "<h3 class='card-title'><i class='$iconToDisplay'></i> Attendance for  $programNameToDisplay</h3>";
                echo "<h5>$dateToDisplay</h5>";
                ?>
            </div>

            <form class="container-fluid" name="newAttendanceRecordForm" id="newAttendanceRecordForm">
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
                        while ($row = mysqli_fetch_array($currentStudentsInProgram, MYSQLI_ASSOC)) {
                            $dynamicRowId++;
                            $firstRowId = md5(uniqid(rand(), true));
                            $secondRowId = md5(uniqid(rand(), true));
                            $thirdRowId = md5(uniqid(rand(), true));

                            $programId = $row['Program_Id'];
                            $studentIdToSearch = $row['Student_Id'];
                            $studentName = $row['First_Name'] . " " . $row['Last_Name']; ?>
                            <tr class="row">
                                <td class="col-1"></td>
                                <td class="col-3">
                                    <?php echo $studentName; ?>
                                    <input type='hidden' name='studentId[<?php echo $dynamicRowId; ?>]'
                                           value='<?php echo $studentIdToSearch; ?>'/>
                                    <input type='hidden' name='programId[<?php echo $dynamicRowId; ?>]'
                                           value='<?php echo $programId; ?>'/>
                                    <input type='hidden' name='attendanceDate' value='<?php echo $dateToSubmit; ?>'/>
                                </td>
                                <td class='radio-input-wrapper col-2 align-middle text-center'>
                                    <label class='radio-label' for='radio<?php echo $firstRowId; ?>'>
                                        <input type='radio' value='Present'
                                               name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]'
                                               id='radio<?php echo $firstRowId; ?>'/>
                                        <span class='custom-check-mark green-check'></span>
                                    </label>
                                </td>
                                <td class='radio-input-wrapper col-2 align-middle text-center'>
                                    <label class='radio-label' for='radio<?php echo $secondRowId; ?>'>
                                        <input type='radio' value='Absent'
                                               name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]'
                                               id='radio<?php echo $secondRowId; ?>'/>
                                        <span class='custom-check-mark red-check'></span>
                                    </label>
                                </td>
                                <td class='radio-input-wrapper col-2 align-middle text-center'>
                                    <label class='radio-label' for='radio<?php echo $thirdRowId; ?>'>
                                        <input type='radio' value='Tardy'
                                               name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]'
                                               id='radio<?php echo $thirdRowId; ?>'/>
                                        <span class='custom-check-mark blue-check'></span>
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
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="card-footer">
                <div class="text-center">
                    <button id="submitAttendance" type="button" onclick="validateAttendanceRows()"
                            class="btn btn-primary attendance-submit-button">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function validateAttendanceRows() {
            var attendanceForm = $("#newAttendanceRecordForm").serialize();

            alert(attendanceForm);
            var numberOfCheckBoxes = $('input[type="radio"]:checked').length;
            var numberOfTableRows = $("#newAttendanceRecordForm tr").length - 1;
            if (numberOfCheckBoxes < numberOfTableRows) {
                launchAttendanceWarningModal();
            } else {

                var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/new/NewProgram.php";
                var successModalMessage = "The Program, has been entered successfully.";
                $.ajax({
                    url: "/community-lifeline-ministries/php-files/mysql-statements/add/AddAttendanceRecord.php",
                    method: "POST",
                    data: {
                        formData: attendanceForm
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
        }
    </script>

    <script src="../../js/modals/attendance/AttendanceWarning.js"></script>

<?php
include("../app-shell/Footer.php");
?>