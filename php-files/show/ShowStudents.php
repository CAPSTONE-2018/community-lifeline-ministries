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
                                            <input type='hidden' name='studentId[<?php echo $dynamicRowId; ?>]'
                                                   value=<?php echo $studentIdToSearch; ?>/>
                                        </td>
                                        <td class='col-sm-2 align-middle text-center text-align-middle'>
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
                                                        <i class='fa fa-bullhorn'></i>
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

    <script type="text/javascript" src="../../js/AddTableRows.js"></script>
    <script>
        function launchEditStudentModal(studentId) {
            alert(studentId);
            $('#exampleModal').modal("show");
        }
    </script>

    <script type="text/javascript">
        function launchTestScoresModal(studentId) {
            $.ajax({
                url: '../modals/ContactsModal.php',
                type: 'post',
                data: {studentId: studentId},
                success: function (response) {
                    $('#custom-title').removeClass('medical-concern-modal-header');
                    $('#custom-title').addClass('contact-modal-header');

                    $('#custom-icon').addClass('fa fa-address-card-o fa-2x');
                    $('.dynamic-title').text("Contact Info");
                    $('.modal-body').html(response);
                    $('#slideInModal').modal('show');
                }
            });
        }
    </script>

    <script type="text/javascript">
        function launchContactsModal(studentId) {
            $.ajax({
                url: '../modals/ContactsModal.php',
                type: 'post',
                data: {studentId: studentId},
                success: function (response) {
                    $('#custom-title').removeClass('medical-concern-modal-header');
                    $('#custom-title').addClass('contact-modal-header');

                    $('#custom-icon').addClass('fa fa-address-card-o fa-2x');
                    $('.dynamic-title').text("Contact Info");
                    $('.modal-body').html(response);
                    $('#slideInModal').modal('show');
                }
            });
        }
    </script>

    <script type="text/javascript">
        function launchMedicalConcernsModal(studentId) {
            $.ajax({
                url: '../modals/MedicalConcernsModal.php',
                type: 'post',
                data: {studentId: studentId},
                success: function (response) {
                    $('#custom-title').removeClass('contact-modal-header');
                    $('#custom-title').addClass('medical-concern-modal-header');
                    $('#custom-icon').addClass('fa fa-address-card-o fa-2x');
                    $('.dynamic-title').text("Medical Concerns");
                    $('.modal-body').html(response);
                    $('#slideInModal').modal('show');
                }
            });
        }
    </script>

<?php
include("../modals/EditStudentModal.php");
include("../scripts/footer.php");
?>