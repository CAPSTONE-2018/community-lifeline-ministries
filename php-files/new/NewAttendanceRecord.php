<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");
$programIdToSearch = $_POST['programId'];
$queryStudentsInProgram = "SELECT DISTINCT Student_To_Programs.Program_Id, Programs.Program_Name,
                            Student_To_Programs.Student_Id, Students.First_Name, Students.Last_Name FROM
                            (Student_To_Programs JOIN Students ON Student_To_Programs.Student_Id = Students.Id)
                            JOIN Programs ON Student_To_Programs.Program_Id = Programs.Id
                            WHERE Student_To_Programs.Program_Id = $programIdToSearch;";

$currentStudentsInProgram = mysqli_query($db, $queryStudentsInProgram);
$getInfo = mysqli_fetch_array($currentStudentsInProgram, MYSQLI_ASSOC);
$programId = $getInfo['Program_Name'];
$dynamicRowId = 0;
?>
<link rel="stylesheet" href="../../css/attendance-table-styles.css"/>
<link rel="stylesheet" href="../../css/radio-styles.css"/>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <?php
            $dateToDisplay = date('l F jS');
            echo "<h3 class='card-title'>Attendance for $programId</h3>";
            echo "<h5>$dateToDisplay</h5>";

            ?>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form class="form-horizontal" method="POST" action="../add/AddAttendanceRecord.php" name="newAttendanceRecordForm" id="newAttendanceRecordForm">

                    <input type='hidden' name='attendanceDate' value='<?php echo date("m/d/Y"); ?>'/>
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
                        while ($row = mysqli_fetch_array($currentStudentsInProgram, MYSQLI_ASSOC)) {
                            $dynamicRowId++;
                            $firstRowId = md5(uniqid(rand(), true));
                            $secondRowId = md5(uniqid(rand(), true));
                            $thirdRowId = md5(uniqid(rand(), true));

                            $programId = $row['Program_Id'];
                            $studentIdToSearch = $row['Student_Id'];
                            $studentName = $row['First_Name'] . " " . $row['Last_Name'];
//                            $studentId = mysqli_fetch_array($row['Student_Id'], MYSQLI_ASSOC);

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
                                            <input type='radio' name='attendanceCheckbox[$dynamicRowId]' value='1' id='radio$firstRowId' />
                                            <span class='custom-check-mark green-check'></span>
                                        </label>
                                    </td>
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$secondRowId'>
                                            <input class='hover-checkbox' type='radio' name='attendanceCheckbox[$dynamicRowId]' value='2' id='radio$secondRowId' />
                                            <span class='custom-check-mark red-check'></span>
                                        </label>
                                    </td>
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$thirdRowId'>
                                            <input type='radio' name='attendanceCheckbox[$dynamicRowId]' value='3' id='radio$thirdRowId' />
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
                    <button id="submitAttendance" form="newAttendanceRecordForm" type="submit" class="btn btn-right btn-primary">
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
