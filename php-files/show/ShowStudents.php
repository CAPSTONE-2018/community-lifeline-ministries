<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");


$queryForAllActiveStudents = "SELECT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name";
$queryForAllInactiveStudents = "SELECT * FROM Students WHERE Active_Student = 0";

$queryForStudentsAndEnrolledPrograms = "SELECT Students.First_Name, Students.Last_Name, Students.Id, COUNT(Student_To_Programs.Program_Id) AS Enrolled_Programs FROM
  Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id GROUP BY Students.Id;";

$activeStudentResults = mysqli_query($db, $queryForAllActiveStudents);
$inactiveStudentResults = mysqli_query($db, $queryForAllInactiveStudents);
$enrolledProgramResults = mysqli_query($db, $queryForStudentsAndEnrolledPrograms);
$dynamicRowId = 0;
?>
    <link rel="stylesheet" href="../../css/show-all-students-styles.css"/>
    <div class="print_div">
        <div class="card">
            <div class="card-header">
                <h3>Displaying All Students:</h3>
            </div>
            <div class="card-body">
                <div class="card-content">
                    <form class="form-horizontal" method="POST" action="#" name="allStudentsTable"
                          id="allStudentsTable">
                        <div class="table-responsive">
                            <table id="all-students-table" class="table table-striped table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-3">Student Name</th>
                                    <th class="col-sm-2 text-center">Programs</th>
                                    <th class="col-sm-1 text-center">Documents</th>
                                    <th class="col-sm-5 text-center">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                while ($activeStudentsRow = mysqli_fetch_array($activeStudentResults, MYSQLI_ASSOC)) {
                                    $numberOfProgramsRow = mysqli_fetch_array($enrolledProgramResults, MYSQLI_ASSOC);
                                    $studentDocumentFlag = false;
                                    $dynamicRowId++;
                                    $studentIdToSearch = $activeStudentsRow['Id'];
                                    $studentName = $activeStudentsRow['First_Name'] . " " . $activeStudentsRow['Last_Name'];
                                    $numberOfPrograms = $numberOfProgramsRow['Enrolled_Programs'];
                                    ?>
                                    <tr class='number-row'>
                                        <td class='col-sm-1 align-middle'></td>
                                        <td class='col-sm-3 align-middle'><?php echo $studentName; ?></td>
                                        <td class='hidden align-middle'>
                                            <input type='hidden' name='studentId[$dynamicRowId]'
                                                   value=$studentIdToSearch/>
                                            <input type='hidden' name='programId[$dynamicRowId]' value=$programId/>
                                        </td>
                                        <td class='col-sm-2 align-middle text-center text-align-middle'><?php echo $numberOfPrograms ?></td>
                                        <?php
                                        if (($activeStudentsRow['Permission_Slip'] == 1) &&
                                            ($activeStudentsRow['Birth_Certificate'] == 1) &&
                                            ($activeStudentsRow['Reduced_Lunch_Eligible'] == 1) &&
                                            ($activeStudentsRow['IEP'] == 1)
                                        ) {
                                            echo "<td class='col-sm-1 align-middle text-center'>
                                                <i class='green-check fa fa-check-square-o'></i>
                                            </td>";
                                        } else {
                                            echo "
                                            <td class='col-sm-1 align-middle text-center'>
                                                <a data-toggle='collapse' data-target='.collapseDocumentsRow$dynamicRowId'><i class='red-circle fa fa-ban'></i></a>
                                            </td>";
                                        }

                                        ?>
                                        <td class='col-5'>
                                            <div class='left-action-buttons-container d-inline m-auto'>
                                                <div class=' d-inline'>
                                                    <button type='button'
                                                            class='btn large-action-buttons edit-student-button'
                                                            onclick='launchEditStudentModal(<?php echo $studentIdToSearch; ?>)'>
                                                        <i class='fa fa-pencil'></i> Edit
                                                    </button>
                                                </div>

                                                <div class='d-inline'>
                                                    <button type='button'
                                                            class='btn large-action-buttons delete-student-button'>
                                                        <i class='fa fa-trash-o'></i> Delete
                                                    </button>
                                                </div>
                                            </div>

                                            <div class='right-action-buttons-container d-inline'>
                                                <span title='Test Scores' data-toggle='tooltip'
                                                      class='small-action-buttons'>
                                                    <button type='button' id='studentTestScoresButton'
                                                            class='btn small-action-buttons test-scores-button'
                                                            data-toggle='collapse'
                                                            data-target='.collapseTestScoresRow$dynamicRowId'>
                                                        <i class='fa fa-bar-chart'></i>
                                                    </button>
                                                </span>
                                                <span title='Student Allergies' data-toggle='tooltip'
                                                      class='small-action-buttons'>
                                                    <button type='button' id='studentAllergiesButton'
                                                            class='btn small-action-buttons view-allergies-button'
                                                            data-toggle='modal'>
                                                        <i class='fa fa-bullhorn'></i>
                                                    </button>
                                                </span>
                                                <span title='Student Contacts' data-toggle='tooltip'
                                                      class='small-action-buttons'>
                                                    <button type='button'
                                                            class='btn small-action-buttons student-contact-button'
                                                            value='<?php echo $studentIdToSearch; ?>'
                                                            >
                                                            <i class='fa fa-phone'></i>
                                                    </button>
                                                </span>
                                            </div>

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div id="show-class-info"></div>

                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

    <!--    <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>-->
    <!--    <script src="../../scripts/print.js"></script>-->

    <script type="text/javascript">
        var table = document.getElementsByTagName('table')[0],
            rows = table.getElementsByClassName('number-row'),
            text = 'textContent' in document ? 'textContent' : 'innerText';
        for (var i = 0, len = rows.length; i < len; i++) {
            var numberToDisplay = i + 1;
            rows[i].children[0][text] = numberToDisplay + ".";
        }
    </script>
    <script>
        function launchEditStudentModal(studentId) {
            alert(studentId);
            $('#exampleModal').modal("show");
        }
    </script>

    <script type="text/javascript">
        function launchMedicalConcernsModal(studentIdToSearch) {
            alert(studentIdToSearch);
            $.ajax({
                type: "POST",
                url: "../modals/ContactsModal.php",
                data: {studentIdToSearch: studentIdToSearch},
                success: function () {
                    $('#showContactModal').modal("show");
                }
            });
        }
    </script>


<script>
    $(document).ready(function () {
        $('.student-contact-button').click(function () {
            var classId = $(this).val();
            alert(classId);
            $.ajax({
                url:"../scripts/AjaxUpdateClass.php",
                method:"POST",
                data:{classId:classId},
                success:function (output) {
                    alert(output);
                    $('#show-class-info').slideDown().html(output);
                    $('#show-all-button').show();
                    $('.table-wrapper').slideUp();
                }
            });
        });
    });
</script>

<?php
include("../modals/EditStudentModal.php");
include("../modals/ContactsModal.php");
//include("../modals/MedicalConcernsModal.php");
include("../scripts/footer.php");
?>
<!---->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $('.student-contact-button').click(function () {-->
<!--            var studentIdToSearch = $(this).val();-->
<!--            alert(studentIdToSearch);-->
<!--            $.ajax({-->
<!--                url: "../scripts/ContactsModal.php",-->
<!--                method:"POST",-->
<!--                data:{studentIdToSearch:studentIdToSearch},-->
<!--                success:function () {-->
<!--                    $('#showContactModal').modal("show");-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->





<script type="text/javascript">
    function launchContactModal(studentIdToSearch) {
        $.ajax({
            url: "../modals/ContactsModal.php",
            method:"POST",
            data: {studentIdToSearch: studentIdToSearch},
            success:function () {
                $('#showContactModal').modal("show");
            }
        });
    }
</script>
