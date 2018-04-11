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

$studentTableToLookUp = "Students";
?>
    <div class="print_div">
        <div class="card">
            <div class="card-header">
                <div class="col-12 text-center">
                    <h3>All Students</h3>
                </div>

                <div class="row">
                    <div class="search-input-wrapper col-6">
                        <input id="search-input" type="text" placeholder="Search" onkeyup="FilterFields()">
                        <i class="align-middle fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                    </div>

                    <div class="align-middle m-auto text-right col-6">
                        <div class="btn-group btn-toggle">
                            <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible2">
                                Show All
                            </button>

                            <span title='G.E.M.' data-toggle='tooltip'>
                                <button class="btn btn-default">
                                    <i class="fa fa-diamond"></i>
                                </button>
                            </span>

                            <span title='Sons of Thunder' data-toggle='tooltip'>
                                <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible">
                                    <i class="fa fa-bolt"></i>
                                </button>
                            </span>

                            <span title='Blessing Table' data-toggle='tooltip'>
                                <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible">
                                    <i class="fa fa-book"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-content">
                    <form class="form-horizontal" method="POST" action="#" name="allStudentsTable"
                          id="allStudentsTable">
                        <div class="table-responsive">
                            <table id="search-table" class="table table-striped table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-3">Student Name</th>
                                    <th class="col-sm-1 text-center">Programs</th>
                                    <th class="col-sm-1 text-center">Documents</th>
                                    <th class="col-sm-6 text-center">Actions</th>
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
                                            <input type='hidden' name='studentId[<?php echo $dynamicRowId; ?>]'
                                                   value=<?php echo $studentIdToSearch; ?>/>
                                        </td>
                                        <td class='col-sm-1 align-middle text-center text-align-middle'>
                                            <?php echo $numberOfPrograms ?>
                                        </td>
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
                                                <a data-toggle='collapse' data-target='.collapseDocumentsRow$dynamicRowId'>
                                                    <i class='red-circle fa fa-ban'></i>
                                                </a>
                                            </td>";
                                        }

                                        ?>
                                        <td class='col-sm-6 text-center'>
                                            <div class='left-action-buttons-container d-inline m-auto'>
                                                <div class=' d-inline'>
                                                    <button type='button'
                                                            class='btn large-action-buttons edit-student-button'
                                                            onclick='launchEditStudentModal(<?php echo $studentIdToSearch; ?>)'
                                                    >
                                                        <i class='fa fa-pencil'></i> Edit
                                                    </button>
                                                </div>

                                                <div class='d-inline'>
                                                    <button type='button'
                                                            class='btn large-action-buttons delete-student-button'
                                                            onclick='launchArchiveUserModal(
                                                                    "<?php echo $studentIdToSearch; ?>",
                                                                    "<?php echo $studentTableToLookUp; ?>",
                                                                    "<?php echo $studentName; ?>"
                                                                    )'
                                                    >
                                                        <i class='fa fa-archive'></i> Archive
                                                    </button>
                                                </div>
                                            </div>

                                            <div class='right-action-buttons-container d-inline'>
                                                <span title='Test Scores' data-toggle='tooltip'
                                                      class='small-action-buttons'>
                                                    <button type='button'
                                                            onclick='launchTestScoresModal(<?php echo $studentIdToSearch; ?>)'
                                                            class='btn small-action-buttons test-scores-button'
                                                    >
                                                        <i class='fa fa-bar-chart'></i>
                                                    </button>
                                                </span>
                                                <span title='Student Allergies' data-toggle='tooltip'
                                                      class='small-action-buttons'>
                                                    <button type='button'
                                                            onclick='launchMedicalConcernsModal(<?php echo $studentIdToSearch; ?>)'
                                                            class='btn small-action-buttons view-allergies-button'
                                                    >
                                                        <i class='fa fa-warning'></i>
                                                    </button>
                                                </span>
                                                <span title='Student Contacts' data-toggle='tooltip'
                                                      class='small-action-buttons'>
                                                    <button type='button'
                                                            onclick='launchContactsModal(<?php echo $studentIdToSearch; ?>)'
                                                            class='btn small-action-buttons student-contact-button'
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
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

    <!--    <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>-->
    <!--    <script src="../../scripts/print.js"></script>-->

<!--    <script type="text/javascript" src="../../js/NumberTableRows.js"></script>-->
<!--    <script type="text/javascript" src="../../js/modals/ShowStudentsModalScripts.js"></script>-->
<!--    <script src="../../js/new-student-scripts/AjaxDynamicInputStyles.js"></script>-->
<!--    <script src="../../js/new-student-scripts/ToggleSwitchValues.js"></script>-->
<!--    <script type="text/javascript" src="../../js/modals/ArchiveUserModals.js"></script>-->

<?php
include("../scripts/footer.php");
?>