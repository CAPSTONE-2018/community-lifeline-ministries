<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$queryForMedicalConcerns = "SELECT * FROM medical_concern_types;";
$medicalConcernsResults = mysqli_query($db, $queryForMedicalConcerns);
?>
<div class="print_div">
    <div class="card">
        <div class="card-header">
            <div class="col-12 text-center">
                <h3><i class="fa fa-warning"></i> All Medical Concerns</h3>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form method="POST" action="#" name="allProgramsTable"
                      id="allProgramsTable">
                    <div class="table-responsive">
                        <table id="search-table" class="table table-striped table-condensed table-hover">
                            <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-3">Medical Concerns</th>
                                <th class="col-sm-2 text-center">Students With Concern</th>
                                <th class="col-sm-4 text-center">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            while ($medicalConcernsRow = mysqli_fetch_assoc($medicalConcernsResults)) {
                                $medicalConcernId = $medicalConcernsRow['Id'];
                                $medicalConcernName = $medicalConcernsRow['Type_Name'];
                                $queryForStudentsWithMedicalConcerns = "SELECT COUNT(Medical_Type_Id) as Count from Student_To_Medical_Concerns Where Medical_Type_Id = ".$medicalConcernId;
                                $studentsWithMedicalConcernsResults = mysqli_query($db, $queryForStudentsWithMedicalConcerns);
                                $studentTotals = '';
                                while($studentsWithMedicalConcernsRow = mysqli_fetch_assoc($studentsWithMedicalConcernsResults)) {
                                    $studentTotals = $studentsWithMedicalConcernsRow['Count'];
                                }
                                ?>
                                <tr class='number-row'>
                                    <td class='col-sm-1 align-middle'></td>
                                    <td class='col-sm-3 align-middle'><?php echo $medicalConcernName; ?></td>
                                    <td class='col-sm-2 text-center align-middle'><?php echo $studentTotals; ?></td>
                                    <td class='col-sm-4 text-center'>
                                        <div class='left-action-buttons-container d-inline m-auto'>
                                            <div class=' d-inline'>
                                                <button type='button'
                                                        class='btn large-action-buttons edit-button'
                                                        onclick='launchEditMedicalConcernsModal(<?php echo $medicalConcernId; ?>)'
                                                >
                                                    <i class='fa fa-pencil'></i> Edit
                                                </button>
                                            </div>
                                        </div>

                                        <div class='right-action-buttons-container d-inline'>
                                            <span title='Students With Concern' data-toggle='tooltip' class='small-action-buttons'>
                                                <button type='button'
                                                        onclick='launchStudentsWithMedicalConcernsModal(<?php echo $medicalConcernId; ?>)'
                                                        class='btn small-action-buttons test-scores-button'>
                                                        <i class='fa fa-graduation-cap'></i>
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
<?php
include("../scripts/footer.php");
?>