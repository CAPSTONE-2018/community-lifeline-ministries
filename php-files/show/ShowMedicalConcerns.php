<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
$queryForMedicalConcerns = "SELECT Medical_Concern_Types.Id, Student_To_Medical_Concerns.Medical_Concern_Name, Medical_Concern_Types.Type_Name FROM Medical_Concern_Types 
JOIN Student_To_Medical_Concerns ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id
WHERE Medical_Concern_Types.Active_Id = 1;";

$queryForMedicalConcerns = "SELECT Medical_Concern_Types.Id, Student_To_Medical_Concerns.Medical_Concern_Name, Medical_Concern_Types.Type_Name FROM Medical_Concern_Types 
JOIN Student_To_Medical_Concerns ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id
WHERE Medical_Concern_Types.Active_Id = 1;";

$medicalConcernsResults = mysqli_query($db, $queryForMedicalConcerns);
?>
    <div class="app-title">
        <div>
            <h3><i class="fa fa-bookmark-o"></i> Medical Concerns</h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"> Medical Concerns</li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="col-12 text-center">
                    <h2><i class="fa fa-warning"></i> All Medical Concern Types</h2>
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

            <form class="container-fluid" method="POST" action="#" name="allProgramsTable" id="allProgramsTable">
                <div class="table-responsive col-sm-12">
                    <table id="search-table" class="table table-striped table-hover">
                        <thead>
                        <tr class="row">
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-3">Medical Concerns</th>
                            <th class="col-sm-2 text-center">Concern Type</th>
                            <th class="col-sm-2 text-center">Students With Concern</th>
                            <th class="col-sm-4 text-center">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        while ($medicalConcernsRow = mysqli_fetch_assoc($medicalConcernsResults)) {
                            $medicalConcernTypeId = $medicalConcernsRow['Id'];
                            $medicalConcernName = $medicalConcernsRow['Medical_Concern_Name'];
                            $medicalConcernType = $medicalConcernsRow['Type_Name'];
//                            $queryForStudentsWithMedicalConcerns = ("SELECT COUNT(Medical_Concern_Id) as Count from Student_To_Medical_Concerns Where Medical_Concern_Id = $medicalConcernId;");
//                            $studentsWithMedicalConcernsResults = mysqli_query($db, $queryForStudentsWithMedicalConcerns);
                            $studentTotals = '';
                            while ($studentsWithMedicalConcernsRow = mysqli_fetch_assoc($studentsWithMedicalConcernsResults)) {
                                $studentTotals = $studentsWithMedicalConcernsRow['Count'];
                            }
                            ?>
                            <tr class='row'>
                                <td class='col-sm-1 align-middle'></td>
                                <td class='col-sm-3 align-middle'><?php echo $medicalConcernName; ?></td>
                                <td class='col-sm-2 text-center align-middle'><?php echo $medicalConcernType; ?></td>
                                <td class='col-sm-2 text-center align-middle'><?php echo $studentTotals; ?></td>
                                <td class='col-sm-4 text-center'>
                                    <div class='left-action-buttons-container d-inline m-auto'>
                                        <div class=' d-inline'>
                                            <button type='button'
                                                    class='btn large-action-buttons edit-button'
                                                    onclick='launchEditMedicalConcernsModal(<?php echo $medicalConcernTypeId; ?>)'
                                            >
                                                <i class='fa fa-pencil'></i> Edit
                                            </button>
                                        </div>
                                        <div class='d-inline'>
                                            <button type='button'
                                                    class='btn large-action-buttons delete-button'
                                                    onclick='launchConfirmArchiveModal(
                                                        "<?php echo $medicalConcernTypeId; ?>",
                                                        "ArchiveMedicalConcern.php",
                                                        "Medical Concern Type",
                                                        "<?php echo $medicalConcernType; ?>",
                                                        "ShowMedicalConcerns.php")'
                                            >
                                                <i class='fa fa-archive'></i> Archive
                                            </button>
                                        </div>
                                    </div>
                        <tbody>
                        <?php
                        while ($medicalConcernsRow = mysqli_fetch_assoc($medicalConcernsResults)) {
                            $medicalConcernTypeId = $medicalConcernsRow['Id'];
                            $medicalConcernName = $medicalConcernsRow['Medical_Concern_Name'];
                            $medicalConcernType = $medicalConcernsRow['Type_Name'];
//                            $queryForStudentsWithMedicalConcerns = ("SELECT COUNT(Medical_Concern_Id) as Count from Student_To_Medical_Concerns Where Medical_Concern_Id = $medicalConcernId;");
//                            $studentsWithMedicalConcernsResults = mysqli_query($db, $queryForStudentsWithMedicalConcerns);
                            $studentTotals = '';
                            while ($studentsWithMedicalConcernsRow = mysqli_fetch_assoc($studentsWithMedicalConcernsResults)) {
                                $studentTotals = $studentsWithMedicalConcernsRow['Count'];
                            }
                            ?>
                            <tr class='row'>
                                <td class='col-sm-1 align-middle'></td>
                                <td class='col-sm-3 align-middle'><?php echo $medicalConcernName; ?></td>
                                <td class='col-sm-2 text-center align-middle'><?php echo $medicalConcernType; ?></td>
                                <td class='col-sm-2 text-center align-middle'><?php echo $studentTotals; ?></td>
                                <td class='col-sm-4 text-center'>
                                    <div class='left-action-buttons-container d-inline m-auto'>
                                        <div class=' d-inline'>
                                            <button type='button'
                                                    class='btn large-action-buttons edit-button'
                                                    onclick='launchEditMedicalConcernsModal(<?php echo $medicalConcernTypeId; ?>)'
                                            >
                                                <i class='fa fa-pencil'></i> Edit
                                            </button>
                                        </div>
                                        <div class='d-inline'>
                                            <button type='button'
                                                    class='btn large-action-buttons delete-button'
                                                    onclick='launchConfirmArchiveModal(
                                                            "<?php echo $medicalConcernTypeId; ?>",
                                                            "ArchiveMedicalConcern.php",
                                                            "Medical Concern Type",
                                                            "<?php echo $medicalConcernType; ?>",
                                                            "ShowMedicalConcerns.php")'
                                            >
                                                <i class='fa fa-archive'></i> Archive
                                            </button>
                                        </div>
                                    </div>

                                    <div class='right-action-buttons-container d-inline'>
                                            <span title='Students With Concern' data-toggle='tooltip'
                                                  class='small-action-buttons'>
                                                <button type='button'
                                                        onclick='launchStudentsWithMedicalConcernsModal(<?php echo $medicalConcernId; ?>)'
                                                        class='btn small-action-buttons test-scores-button'>
                                                        <i class='fa fa-graduation-cap mr-0'></i>
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
<?php
include("../app-shell/Footer.php");
?>