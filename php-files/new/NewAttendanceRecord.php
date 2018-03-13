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
$programName = $getInfo['Program_Name'];
$checkboxNameId = 0;
?>
<link rel="stylesheet" href="../../css/attendance-table-styles.css"/>
<link rel="stylesheet" href="../../css/radio-styles.css"/>

<div class="container-fluid">
    <div class="card col-lg-12">
        <form class="form-horizontal" action="../add/AddAttendanceRecord.php" method="POST"
              name="newAttendanceRecordForm"
              id="newAttendanceRecordForm">
            <div class="card-body">
                <div class="header">
                    <?php
                    echo "<h3 class=\"card-title\">$programName Attendance</h3>";
                    ?>
                </div>
                <div class="card-content">
                    <div>
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
                                $checkboxNameId++;
                                $randomId = random_int(100,500);
                                $firstRowId = $randomId + 1;
                                $secondRowId = $randomId + 2;
                                $thirdRowId = $randomId + 3;

                                $studentName = $row['First_Name'] . " " . $row['Last_Name'];
                                $studentId = mysqli_fetch_array($row['Student_Id'], MYSQLI_ASSOC);

                                echo "
                                <tr>
                                    <td></td>
                                    <td class='student-name-column'>$studentName</td>
                                    
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$firstRowId'>
                                            <input type='radio' name='attendanceCheckbox$checkboxNameId' id='radio$firstRowId' />
                                            <span class='custom-check-mark green-check'></span>
                                        </label>
                                    </td>
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$secondRowId'>
                                            <input class='hover-checkbox' type='radio' name='attendanceCheckbox$checkboxNameId' id='radio$secondRowId' />
                                            <span class='custom-check-mark red-check'></span>
                                        </label>
                                    </td>
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$thirdRowId'>
                                            <input type='radio' name='attendanceCheckbox$checkboxNameId' id='radio$thirdRowId' />
                                            <span class='custom-check-mark blue-check'></span>
                                        </label>
                                    </td>

                                    
                                    <td class='check-mark-column'>
                                        <button type='button' data-toggle='collapse' data-target='#collapseRow$checkboxNameId' aria-expanded='false' aria-controls='collapseRow$checkboxNameId' class='student-info-button'>Info</button>                         
                                    </td>
                                </tr>";

                                $studentIdToSearch = $row['Student_Id'];
                                $queryForContacts = "SELECT Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone
                                  FROM Student_To_Contacts JOIN Contacts On Student_To_Contacts.Contact_Id = Contacts.Id WHERE Student_Id = $studentIdToSearch";
                                $currentContactForStudent = mysqli_query($db, $queryForContacts);
                                while($contactRow = mysqli_fetch_array($currentContactForStudent, MYSQLI_ASSOC))  {
                                    $contactName = $contactRow['First_Name']. " " . $contactRow['Last_Name'];
                                    $contactPhone = $contactRow['Primary_Phone'];
                                    echo "<tr class='collapse smooth' id='collapseRow$checkboxNameId' >
                                    <td></td>
                                    <td colspan='12'>
                                        <span class='hidden-row-width'><i class='glyphicon glyphicon-user'></i> $contactName</span>
                                        <span class='hidden-row-width'><i class='glyphicon glyphicon-earphone'></i> $contactPhone</span>
                                    </td>
                                    
                                </tr>";
                                }}
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <div>
                        <button id="buttonTrigger" type="button" class="btn btn-right btn-primary"
                                data-toggle="modal" data-target="#exampleModalCenter">
                            Verify Info
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        $('.student-info-button').click(function () {
            var infoId = $(this).val();
            $.ajax({
                success:function () {
                    alert("hello");
                    $('#hidden-row' + infoId).toggle();
                }
            });
        });
    });


</script>

<script type="text/javascript">

    var table = document.getElementsByTagName('table')[0],
        rows = table.getElementsByTagName('tr'),
        text = 'textContent' in document ? 'textContent' : 'innerText';
    console.log(text);

    for (var i = 1, len = rows.length; i < len; i++) {
        rows[i].children[0][text] = i + ".";
    }
</script>

<?php
include("../scripts/footer.php");
?>
