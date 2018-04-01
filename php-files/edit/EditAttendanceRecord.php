<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

include("../TimeZoneFormat.php");

$programIdToSearch = $_POST['programId'];
$dateToSearch = $dateToSubmit;

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
<link rel="stylesheet" href="../../css/attendance-table-styles.css"/>
<link rel="stylesheet" href="../../css/radio-styles.css"/>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <?php

            echo "<h3 class='card-title'>Editing Attendance for $programNameToDisplay</h3>";
            echo "<h5>$dateToDisplay</h5>";

            ?>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form class="form-horizontal" method="POST" action="../update/UpdateAttendanceRecord.php"
                      name="editAttendanceRecordForm" id="editAttendanceRecordForm">

                    <input type='hidden' name='attendanceDate' value='<?php echo $dateToSubmit; ?>'/>
                    <table id="attendance-table" class="table table-condensed table-hover table-responsive">
                        <thead>

                        <tr>
                            <th>#</th>
                            <th class="left-column-title">Student Name</th>
                            <th class="centered-column-title">Present</th>
                            <th class="centered-column-title">Absent</th>
                            <th class="centered-column-title">Tardy</th>
                            <th class="centered-column-title">Actions</th>
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

                            if ($attendanceValue == 1) {
                                $presentCheckMark = "checked";
                            } else if ($attendanceValue == 2) {
                                $absentCheckMark = "checked";
                            } else {
                                $tardyCheckMark = "checked";
                            }


                            echo "<tr class='number-row'>
                                    <td></td> 
                                    <td class='student-name-column'>
                                        $studentName
                                    </td>
                                    <td class='hidden-row'>
                                        <input type='hidden' name='studentId[$dynamicRowId]' value=$studentIdToSearch />
                                        <input type='hidden' name='programId[$dynamicRowId]' value=$programId />
                                    </td>                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$firstRowId'>
                                            <input type='radio' name='attendanceCheckbox[$dynamicRowId]' $presentCheckMark value='1' id='radio$firstRowId' />
                                            <span class='custom-check-mark green-check'></span>
                                        </label>
                                    </td>
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$secondRowId'>
                                            <input class='hover-checkbox' type='radio' name='attendanceCheckbox[$dynamicRowId]' $absentCheckMark value='2' id='radio$secondRowId' />
                                            <span class='custom-check-mark red-check'></span>
                                        </label>
                                    </td>
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$thirdRowId'>
                                            <input type='radio' name='attendanceCheckbox[$dynamicRowId]' $tardyCheckMark value='3' id='radio$thirdRowId' />
                                            <span class='custom-check-mark blue-check'></span>
                                        </label>
                                    </td>

                                    
                                    <td class='check-mark-column'>
                                        <button type='button' data-toggle='collapse' data-target='.collapseRow$dynamicRowId' aria-expanded='false' aria-controls='collapseRow$dynamicRowId' class='student-info-button'><i class=\"glyphicon glyphicon-earphone\"></i>Contact</button>                         
                                    </td>
                                </tr>";
                            $studentIdToSearch = $row['Student_Id'];
                            $queryForContacts = "SELECT Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone
                                  FROM Student_To_Contacts JOIN Contacts On Student_To_Contacts.Contact_Id = Contacts.Id WHERE Student_Id = $studentIdToSearch";
                            $currentContactForStudent = mysqli_query($db, $queryForContacts);
                            while ($contactRow = mysqli_fetch_array($currentContactForStudent, MYSQLI_ASSOC)) {
                                $contactName = $contactRow['First_Name'] . " " . $contactRow['Last_Name'];
                                $contactPhone = $contactRow['Primary_Phone'];
                                echo "
                                    <tr class='collapse smooth collapseRow$dynamicRowId'>
                                    <td></td>
                                    <td colspan='12'>
                                        <span class='hidden-row-width'><i class='glyphicon glyphicon-user'></i> $contactName</span>
                                        <span class='hidden-row-width'><i class='glyphicon glyphicon-earphone'></i> $contactPhone</span>
                                    </td>
                                    
                                </tr>
                                
                                ";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>

            <div class="card-footer">
                <div>
                    <button id="submitAttendance" form="editAttendanceRecordForm" type="submit"
                            class="btn btn-right btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    var table = document.getElementsByTagName('table')[0],
        rows = table.getElementsByClassName('number-row'),
        text = 'textContent' in document ? 'textContent' : 'innerText';
    for (var i = 0, len = rows.length; i < len; i++) {
        var numberToDisplay = i + 1;
        rows[i].children[0][text] = numberToDisplay + ".";
    }
</script>

<?php
include("../scripts/footer.php");
?>
