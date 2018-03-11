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
$rowId = 0;
?>
<link rel="stylesheet" href="../../css/attendance-table-styles.css"/>
<link rel="stylesheet" href="../../css/check-mark-styles.css"/>

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
                                    $rowId ++;
                                    $studentName = $row['First_Name'] . " " . $row['Last_Name'];
                                    $studentId = mysqli_fetch_array($row['Student_Id'], MYSQLI_ASSOC);

                                    $studentRow = "
                                <tr>
                                    <td></td>
                                    <td class='student-name-column'>$studentName</td>
                                    <td class='check-mark-column'>
                                        <input id='presentCheckBox' name='presentCheckbox' type='checkbox'>
                                    </td>
                                    <td class='check-mark-column'>
                                        <input id='absentCheckbox' name='absentCheckbox' type='checkbox'>                                   
                                    </td>
                                    <td class='check-mark-column'>
                                        <input id='tardyCheckbox' name='tardyCheckbox' type='checkbox'>
                                    </td>
                                    <td class='check-mark-column'>
                                        <button type='button' data-toggle='collapse' data-target='#collapseRow$rowId' aria-expanded='false' aria-controls='collapseRow$rowId' class='student-info-button'>Info</button>                         
                                    </td>
                                    
                                    
                              
                                </tr>
                                
                                <tr >
                                
                                
                                
                                    <td class='collapse' id='collapseRow$rowId' colspan='12'>
                                    
                                        <card>Hello</card>
                                    
                                    </td>
                                </tr>
                                </div>";

                                    echo $studentRow; }
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


    $(document).ready(function () {
        $('.studentInfoButton').click(function () {
            var rowId = $(this).val();
            alert(rowId);
        });

        $('input[type="checkbox"]').on('change', function() {
            $(this).siblings('input[type="checkbox"]').prop('checked', false);
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

<div id="showProgramInfo"></div>

<?php
include("../scripts/footer.php");
?>
