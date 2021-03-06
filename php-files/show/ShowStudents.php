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
        <table id="showStudentsTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th class="text-center align-middle">#</th>
                <th class="align-middle">Student Name</th>
                <th class="text-center align-middle">Permission Slip</th>
                <th class="text-center align-middle">Actions</th>
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
                $buttonIcon = "";
                if (($activeStudentsRow['Permission_Slip'] == 1)) {
                    $buttonIcon = "green-check fa fa-check-square-o";
                } else {
                    $buttonIcon = "red-circle fa fa-ban";
                } ?>
                <tr>
                    <td class="text-center align-middle"></td>
                    <td class="align-middle">
                        <?php echo $studentName; ?>
                        <input type='hidden' name='studentId[<?php echo $dynamicRowId; ?>]'
                               value='<?php echo $studentIdToSearch; ?>'/>
                    </td>
                    <td class="text-center">
                        <button type="button"
                                onclick='launchDocumentsModal(<?php echo $studentIdToSearch; ?>)'
                                class='btn permission-slip-button'>
                            <i class='<?php echo $buttonIcon; ?> mr-0'></i>
                        </button>
                    </td>


                    <td class='text-center '>
                        <div class='left-action-buttons-container d-inline m-auto'>
                            <div class=' d-inline'>
                                <button type='button'
                                        class='btn large-action-buttons edit-button text-sm-center'
                                        onclick='launchEditStudentModal(<?php echo $studentIdToSearch; ?>)'
                                >
                                    <i class='fa fa-pencil mr-0'></i> Edit
                                </button>
                            </div>

                            <div class='d-inline'>
                                <button type='button' class='btn large-action-buttons delete-button text-sm-center'
                                        onclick='launchConfirmArchiveModal(
                                                "<?php echo $studentIdToSearch; ?>",
                                                "ArchiveStudent.php",
                                                "Student",
                                                "<?php echo $studentName; ?>",
                                                "ShowStudents.php"
                                                )'>
                                    <i class='fa fa-archive mr-0'></i> Archive
                                </button>
                            </div>
                        </div>

                        <div class='right-action-buttons-container d-inline'>
                            <span title='Test Scores' data-toggle='tooltip' class='small-action-buttons'>
                                <button type='button' class='btn small-action-buttons test-scores-button '
                                        onclick='launchTestScoresModal(<?php echo $studentIdToSearch; ?>)'>
                                    <i class='fa fa-bar-chart mr-0'></i>
                                </button>
                            </span>
                            <span title='Student Allergies' data-toggle='tooltip' class='small-action-buttons'>
                                <button type='button' class='btn small-action-buttons allergies-button'
                                        onclick='launchMedicalConcernsModal(<?php echo $studentIdToSearch; ?>)'>
                                    <i class='fa fa-warning mr-0'></i>
                                </button>
                            </span>
                            <span title='Student Contacts' data-toggle='tooltip' class='small-action-buttons'>
                                <button type='button' class='btn small-action-buttons contact-button'
                                        onclick='launchContactsModal(<?php echo $studentIdToSearch; ?>)'>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#showStudentsTable').DataTable({
                dom: '<lf<t>iBp>',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        });
    </script>
</div>

<script src="../../js/NumberTableRows.js"></script>
<?php
include("../app-shell/Footer.php");
?>
