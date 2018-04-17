<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

include("../widgets/TimeZoneFormat.php");

$programIdToSearch = $_POST['programId'];
$queryStudentsInProgram = "SELECT DISTINCT Student_To_Programs.Program_Id, Programs.Program_Name,
                            Student_To_Programs.Student_Id, Students.First_Name, Students.Last_Name FROM
                            (Student_To_Programs JOIN Students ON Student_To_Programs.Student_Id = Students.Id)
                            JOIN Programs ON Student_To_Programs.Program_Id = Programs.Id
                            WHERE Student_To_Programs.Program_Id = $programIdToSearch;";

$currentStudentsInProgram = mysqli_query($db, $queryStudentsInProgram);
$getInfo = mysqli_fetch_array($currentStudentsInProgram, MYSQLI_ASSOC);
$programNameToDisplay = $getInfo['Program_Name'];
$programId = $getInfo['Program_Id'];
$dynamicRowId = 0;
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
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
        <div class="card-body">
            <div class="card-content">
                <form class="form-horizontal container-fluid" method="POST" action="../add/AddAttendanceRecord.php"
                      name="newAttendanceRecordForm" id="newAttendanceRecordForm">

                    <input type='hidden' name='attendanceDate' value='<?php echo $dateToSubmit; ?>'/>
                    <table id="attendance-table" class="table table-condensed table-hover table-responsive">
                        <thead>

                        <tr>
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-3">Student Name</th>
                            <th class="col-sm-2 text-center">Present</th>
                            <th class="col-sm-2 text-center">Absent</th>
                            <th class="col-sm-2 text-center">Tardy</th>
                            <th class="col-sm-2 text-center">Actions</th>
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
                            <tr class='number-row'>
                                <td class='col-sm-1 align-middle'></td>
                                <td class='col-sm-4 align-middle'>
                                    <?php echo $studentName; ?>
                                </td>
                                <td class='hidden align-middle'>
                                    <input type='hidden' name='studentId[<?php echo $dynamicRowId; ?>]'
                                           value=<?php echo $studentIdToSearch; ?>/>
                                    <input type='hidden' name='programId[<?php echo $dynamicRowId; ?>]'
                                           value=<?php echo $programId; ?>/>
                                </td>
                                <td class='radio-input-wrapper col-sm-1 align-middle text-center'>
                                    <label class='radio-label' for='radio<?php echo $firstRowId; ?>'>
                                        <input type='radio' name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]'
                                               value='1'
                                               id='radio<?php echo $firstRowId; ?>'/>
                                        <span class='custom-check-mark green-check'></span>
                                    </label>
                                </td>

                                <td class='radio-input-wrapper col-sm-1 align-middle text-center'>
                                    <label class='radio-label' for='radio<?php echo $secondRowId; ?>'>
                                        <input class='hover-checkbox' type='radio'
                                               name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]' value='2'
                                               id='radio<?php echo $secondRowId; ?>'/>
                                        <span class='custom-check-mark red-check'></span>
                                    </label>
                                </td>

                                <td class='radio-input-wrapper col-sm-1 align-middle text-center'>
                                    <label class='radio-label' for='radio<?php echo $thirdRowId; ?>'>
                                        <input type='radio' name='attendanceCheckbox[<?php echo $dynamicRowId; ?>]'
                                               value='3'
                                               id='radio<?php echo $thirdRowId; ?>'/>
                                        <span class='custom-check-mark blue-check'></span>
                                    </label>
                                </td>


                                <td class='align-middle'>
                                    <div class="right-action-buttons-container">
                                    <span title='Student Contacts' data-toggle='tooltip'>
                                        <button type='button'
                                                onclick='launchContactsModal(<?php echo $studentIdToSearch; ?>)'
                                                class='btn attendance-contact-button'>
                                            <i class='fa fa-phone'></i>
                                        </button>
                                    </span>
                                    </div>
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
                            onclick="validateAttendanceRows()"
                            class="btn btn-right btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    function validateAttendanceRows() {

        var numberOfCheckBoxes = $('input[type="radio"]:checked').length;
        var numberOfTableRows = $("#newAttendanceRecordForm tr").length - 1;
        if (numberOfCheckBoxes < numberOfTableRows) {
            alert("NEED MODAL STATING NOT EVERY KID WAS SELECTED");
        } else {
            document.forms["newAttendanceRecordForm"].submit();
        }
    }
</script>

<?php
include("../scripts/footer.php");
?>
<!--$studentIdToSearch = $row['Student_Id'];-->
<!--$queryForContacts = "SELECT Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone-->
<!--FROM Student_To_Contacts JOIN Contacts On Student_To_Contacts.Contact_Id = Contacts.Id WHERE Student_Id = $studentIdToSearch";-->
<!--$currentContactForStudent = mysqli_query($db, $queryForContacts);-->
<!--while ($contactRow = mysqli_fetch_array($currentContactForStudent, MYSQLI_ASSOC)) {-->
<!--$contactName = $contactRow['First_Name'] . " " . $contactRow['Last_Name'];-->
<!--$contactPhone = $contactRow['Primary_Phone'];-->