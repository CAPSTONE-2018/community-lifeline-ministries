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
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="col-12 text-center">
                <h2><i class="fa fa-graduation-cap"></i> All Students</h2>
            </div>
            <div class="row">
                <div class="search-input-wrapper col-6">
                    <input id="search-input" type="text" placeholder="Search" onkeyup="FilterFields()">
                    <i class="align-middle fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                </div>

                <div class="align-middle m-auto text-right col-6">
                    <div class="btn-group btn-toggle">
                        <span title='All Students' data-toggle='tooltip'>
                            <button class="btn btn-default" onclick="toggleActiveStudents()">
                                <i class="fa fa-graduation-cap"></i>
                            </button>
                        </span>

                        <span title='G.E.M.' data-toggle='tooltip'>
                            <button class="btn btn-default" onclick="toggleGem()">
                                <i class="fa fa-diamond"></i>
                            </button>
                        </span>

                        <span title='Sons of Thunder' data-toggle='tooltip'>
                            <button class="btn btn-default" onclick="toggleSonsOfThunder()">
                                <i class="fa fa-bolt"></i>
                            </button>
                        </span>

                        <span title='Blessing Table' data-toggle='tooltip'>
                            <button class="btn btn-default" onclick="toggleBlessingTable()">
                                <i class="fa fa-book"></i>
                            </button>
                        </span>

                        <span title='Past Students' data-toggle='tooltip'>
                            <button class="btn btn-default" onclick="toggleInactiveStudents()">
                                <i class="fa fa-folder-open"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <form class="container-fluid" method="POST" action="#" name="activeStudentsTable" id="activeStudentsTable">
            <div class="table-responsive col-sm-12">
                <table id="search-table" class="table table-striped table-condensed table-hover">
                    <thead>
                    <tr class="row">
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-3">Student Name</th>
                        <th class="col-sm-1">Programs</th>
                        <th class="col-sm-2 text-center">Permission Slip</th>
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
                        <tr class='row'>
                            <td class='col-sm-1 align-middle'></td>
                            <td class='col-sm-3 align-middle'>
                                <?php echo $studentName; ?>
                                <input type='hidden' name='studentId[<?php echo $dynamicRowId; ?>]'
                                       value='<?php echo $studentIdToSearch; ?>'/>
                            </td>
                            <td class='col-sm-1 align-middle text-center text-align-middle'>
                                <?php echo $numberOfPrograms ?>
                            </td>

                            <?php
                            if (($activeStudentsRow['Permission_Slip'] == 1)) { ?>
                                <td class='col-sm-2 align-middle text-center'>
                                    <button type="button"
                                            onclick='launchDocumentsModal(<?php echo $studentIdToSearch; ?>)'
                                            class='btn permission-slip-button'>
                                        <i class='green-check fa fa-check-square-o mr-0'></i>
                                    </button>
                                </td>
                            <?php } else { ?>
                                <td class='col-sm-2 align-middle text-center'>
                                    <button type="button"
                                            onclick='launchDocumentsModal(<?php echo $studentIdToSearch; ?>)'
                                            class='btn permission-slip-button'>
                                        <i class='red-circle fa fa-ban mr-0'></i>
                                    </button>
                                </td>
                            <?php } ?>
                            <td class='col-sm-5 text-center'>
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
                                                onclick='launchArchiveStudentModal(
                                                        "<?php echo $studentIdToSearch; ?>",
                                                        "<?php echo $studentName; ?>"
                                                        )'>
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
                </table>
            </div>
        </form>
        <div class="card-footer">

        </div>
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
