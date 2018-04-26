<?php
include("../../../db/config.php");

$queryForActiveSonsOfThunderStudents = "SELECT * FROM Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id 
                                WHERE Student_To_Programs.Program_Id = 1 && Students.Active_Student = 1;";
$sonsOfThunderResults = mysqli_query($db, $queryForActiveSonsOfThunderStudents);
$dynamicRowId = 0;

?>
<div id="inactiveStudentsCard" class="card-body">
    <div class="card-content">
        <form method="POST" action="#" name="inactiveStudentsTable"
              id="inactiveStudentsTable">
            <div class="table-responsive">
                <table id="search-table" class="table table-striped table-condensed table-hover">
                    <thead>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-2">Student Name</th>
                        <th class="col-sm-1 text-center">Programs</th>
                        <th class="col-sm-2 text-center">Permission Slip</th>
                        <th class="col-sm-6 text-center">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    while ($sonsOfThunderRow = mysqli_fetch_array($sonsOfThunderResults, MYSQLI_ASSOC)) {
                        $numberOfProgramsRow = mysqli_fetch_array($enrolledProgramResults, MYSQLI_ASSOC);
                        $studentDocumentFlag = false;
                        $dynamicRowId++;
                        $studentIdToSearch = $sonsOfThunderRow['Id'];
                        $studentName = $sonsOfThunderRow['First_Name'] . " " . $sonsOfThunderRow['Last_Name'];
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
                            if (($sonsOfThunderRow['Permission_Slip'] == 1)) { ?>
                                <td class='col-sm-1 align-middle text-center'>
                                    <button type="button"
                                            onclick='launchDocumentsModal(<?php echo $studentIdToSearch; ?>)'
                                            class='btn permission-slip-button'>
                                        <i class='green-check fa fa-check-square-o'></i>
                                    </button>
                                </td>
                            <?php } else { ?>
                                <td class='col-sm-1 align-middle text-center'>
                                    <button type="button"
                                            onclick='launchDocumentsModal(<?php echo $studentIdToSearch; ?>)'
                                            class='btn permission-slip-button'>
                                        <i class='red-circle fa fa-ban'></i>
                                    </button>
                                </td>
                            <?php } ?>
                            <td class='col-sm-6 text-center'>
                                <div class='left-action-buttons-container d-inline m-auto'>
                                    <div class=' d-inline'>
                                        <button type='button'
                                                class='btn large-action-buttons edit-button'
                                                onclick='launchEditStudentModal(<?php echo $studentIdToSearch; ?>)'
                                        >
                                            <i class='fa fa-pencil'></i> Edit
                                        </button>
                                    </div>

                                    <div class='d-inline'>
                                        <button type='button'
                                                class='btn large-action-buttons delete-button'
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
                                    <span title='Test Scores' data-toggle='tooltip' class='small-action-buttons'>
                                        <button type='button'
                                                onclick='launchTestScoresModal(<?php echo $studentIdToSearch; ?>)'
                                                class='btn small-action-buttons test-scores-button'>
                                            <i class='fa fa-bar-chart'></i>
                                        </button>
                                    </span>
                                    <span title='Student Allergies' data-toggle='tooltip' class='small-action-buttons'>
                                        <button type='button'
                                                onclick='launchMedicalConcernsModal(<?php echo $studentIdToSearch; ?>)'
                                                class='btn small-action-buttons allergies-button'>
                                            <i class='fa fa-warning'></i>
                                        </button>
                                    </span>
                                    <span title='Student Contacts' data-toggle='tooltip' class='small-action-buttons'>
                                        <button type='button'
                                                onclick='launchContactsModal(<?php echo $studentIdToSearch; ?>)'
                                                class='btn small-action-buttons contact-button'>
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
</div>
