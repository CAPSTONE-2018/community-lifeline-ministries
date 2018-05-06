<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");

$queryForAllActiveStudents = "SELECT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name";
$queryForStudentsAndEnrolledPrograms = "SELECT COUNT(Student_To_Programs.Program_Id) AS Enrolled_Programs FROM
                                          Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id GROUP BY Students.Id;";

$activeStudentResults = mysqli_query($db, $queryForAllActiveStudents);
$enrolledProgramResults = mysqli_query($db, $queryForStudentsAndEnrolledPrograms);
$dynamicRowId = 0;
$studentTableToLookUp = "Students";
?>


<div class="app-title">
    <div>
        <h3><i class="fa fa-bookmark-o"></i> Students</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> All Students</li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        <div class="col-12 text-center">
            <h2><i class="fa fa-graduation-cap"></i> All Students</h2>
        </div>
    </div>

    <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Programs</th>
                <th>Permission Slip</th>
                <th>Actions</th>
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
            <tr>
                <td></td>
                <td>
                    <?php echo $studentName; ?>
                    <input type='hidden' name='studentId[<?php echo $dynamicRowId; ?>]'
                           value='<?php echo $studentIdToSearch; ?>'/>
                </td>
                <td>
                    <?php echo $numberOfPrograms ?>
                </td>
                <?php
                if (($activeStudentsRow['Permission_Slip'] == 1)) { ?>
                <td>
                    <button type="button"
                            onclick='launchDocumentsModal(<?php echo $studentIdToSearch; ?>)'
                            class='btn permission-slip-button'>
                        <i class='green-check fa fa-check-square-o mr-0'></i>
                    </button>
                    <?php } else { ?>
                    <button type="button"
                            onclick='launchDocumentsModal(<?php echo $studentIdToSearch; ?>)'
                            class='btn permission-slip-button'>
                        <i class='red-circle fa fa-ban mr-0'></i>
                    </button>
                </td>
                <?php } ?>

                <td class='text-center'>
                    <div class='left-action-buttons-container d-inline m-auto'>
                        <div class=' d-inline'>
                            <button type='button'
                                    class='btn large-action-buttons edit-button'
                                    onclick='launchEditStudentModal(<?php echo $studentIdToSearch; ?>)'
                            >
                                <i class='fa fa-pencil mr-0'></i> Edit
                            </button>
                        </div>

                        <div class='d-inline'>
                            <button type='button'
                                    class='btn large-action-buttons delete-button'
                                    onclick='launchConfirmArchiveModal(
                                            "<?php echo $studentIdToSearch; ?>",
                                            "ArchiveStudent.php",
                                            "Student",
                                            "<?php echo $studentName; ?>",
                                            "ShowStudents.php"
                                            )'
                            >
                                <i class='fa fa-archive mr-0'></i> Archive
                            </button>
                        </div>
                    </div>

                    <div class='right-action-buttons-container d-inline'>
                                    <span title='Test Scores' data-toggle='tooltip' class='small-action-buttons'>
                                        <button type='button'
                                                onclick='launchTestScoresModal(<?php echo $studentIdToSearch; ?>)'
                                                class='btn small-action-buttons test-scores-button'
                                        >
                                            <i class='fa fa-bar-chart mr-0'></i>
                                        </button>
                                    </span>
                        <span title='Student Allergies' data-toggle='tooltip' class='small-action-buttons'>
                                        <button type='button'
                                                onclick='launchMedicalConcernsModal(<?php echo $studentIdToSearch; ?>)'
                                                class='btn small-action-buttons allergies-button'
                                        >
                                            <i class='fa fa-warning mr-0'></i>
                                        </button>
                                    </span>
                        <span title='Student Contacts' data-toggle='tooltip' class='small-action-buttons'>
                                        <button type='button'
                                                onclick='launchContactsModal(<?php echo $studentIdToSearch; ?>)'
                                                class='btn small-action-buttons contact-button'
                                        >
                                            <i class='fa fa-phone mr-0'></i>
                                        </button>
                                    </span>
                    </div>
                </td>

            </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th>Student Name</th>
                <th>Programs</th>
                <th>Permission Slip</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>
    </div>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>


    <div class="card-footer">

    </div>
</div>


<script>
    function EditTestScores() {
        $(".testScores").prop('readonly', false);
        document.getElementById('updateButton').disabled = false;
    }

    function UpdateTestScores() {
        var numItems = $('.testScores').length;
        numItems /= 4;
        var studentId = document.getElementById('hdnStudentId').value;
        for (var i = 1; i < numItems + 1; i++) {
            $.ajax({
                url: "../update/UpdateTestScores.php",
                method: "POST",
                data: {
                    id: document.getElementById('testId' + i).value,
                    schoolYear: document.getElementById('schoolYear' + i).value,
                    term: document.getElementById('term' + i).value,
                    pre_Test: document.getElementById('pre_test' + i).value,
                    post_Test: document.getElementById('post_test' + i).value
                },
                success: function (output) {
                    $('.currentTestScores').remove();
                    $('.addTestScores').remove();

                    $.ajax({
                        url: '../modals/students/TestScoresModal.php',
                        type: 'post',
                        data: {studentId: studentId},
                        success: function (response) {
                            $('.modal-body').html(response);
                        }
                    });
                }
            });
        }
    }

    function NewTestScore() {
        document.getElementById('addTestScore').style.display = "";

        var divsToHide = document.getElementsByClassName("currentTestScores");
        for (var i = 0; i < divsToHide.length; i++) {
            divsToHide[i].style.display = "none";
        }
        $('.deleteButton').remove();
    }

    function AddTestScore() {
        var divsToHide = document.getElementsByClassName("currentTestScores");
        var studentId = document.getElementById('hdnStudentId').value;
        var newYear = document.getElementById('newSchoolYear').value;
        var newTerm = document.getElementById('newTerm').value;
        var newpre_test = document.getElementById('newPre_test').value;
        var newpost_test = document.getElementById('newPost_test').value;

        var parsedTerm = "'" + newTerm + "'";
        $.ajax({
            url: "../new/newTestScores.php",
            method: "POST",
            data: {
                StudentId: studentId,
                NewYear: newYear,
                NewTerm: parsedTerm,
                NewPre_Test: newpre_test,
                NewPost_Test: newpost_test
            },
            success: function (output) {
                document.getElementById('addTestScore').style.display = "none";
                for (var i = 0; i < divsToHide.length; i++) {
                    divsToHide[i].style.display = "";
                }


                $('.currentTestScores').remove();
                $('.addTestScores').remove();

                $.ajax({
                    url: '../modals/students/TestScoresModal.php',
                    type: 'post',
                    data: {studentId: studentId},
                    success: function (response) {
                        $('.modal-body').html(response);
                    }
                });
            }
        });
    }

    function DeleteTestScore(TestScoreId) {
        $.ajax({
            url: "../Delete/DeleteTestScore.php",
            method: "POST",
            data: {TestScoreId: TestScoreId},
            success: function (output) {

            }
        });
    }
</script>
<?php
include("../app-shell/Footer.php");
?>
