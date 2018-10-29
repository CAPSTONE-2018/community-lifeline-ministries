<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");

$medicalConcernTypeId = "";
$uniqueIdToArchive = "";
$studentId = "";
$medicalConcernName = "";
$medicalConcernType = "";
$studentWithAllergy = "";
$dynamicId = 0;
$queryForMedicalConcerns = "SELECT Medical_Concern_Types.Id AS 'Medical_Concerns_Type_Id', Student_To_Medical_Concerns.Medical_Concern_Name, Medical_Concern_Types.Type_Name, Student_To_Medical_Concerns.Id AS 'Unique_Medical_Id', Students.First_Name, Students.Last_Name FROM Medical_Concern_Types
JOIN Student_To_Medical_Concerns ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id
    JOIN Students ON Student_To_Medical_Concerns.Student_Id = Students.Id WHERE Medical_Concern_Types.Active_Id = 1 AND Student_To_Medical_Concerns.Active_Id = 1;";
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

<div class="card">
    <div class="card-header">
        <div class="col-12 text-center">
            <h2><i class="fa fa-warning"></i> All Medical Concern Types</h2>
        </div>
    </div>

    <div class="container">
        <table id="showMedicalConcernsTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Medical Concerns</th>
                <th class="text-center">Concern Type</th>
                <th class="text-center">Students With Concern</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>

            <tbody>
            <?php
            while ($medicalConcernsRow = mysqli_fetch_assoc($medicalConcernsResults)) {
                $dynamicId++;
                $uniqueIdToArchive = $medicalConcernsRow['Unique_Medical_Id'];
                $medicalConcernTypeId = $medicalConcernsRow['Medical_Concerns_Type_Id'];
                $medicalConcernName = $medicalConcernsRow['Medical_Concern_Name'];
                $medicalConcernType = $medicalConcernsRow['Type_Name'];
                $studentWithAllergy = $medicalConcernsRow['First_Name'] . " " . $medicalConcernsRow['Last_Name'];
                ?>
                <tr>
                    <td class='align-middle'></td>
                    <td class='text-center align-middle'><?php echo $medicalConcernName; ?></td>
                    <td class='text-center align-middle'><?php echo $medicalConcernType; ?></td>
                    <td class='text-center align-middle'><?php echo $studentWithAllergy; ?></td>
                    <td class='text-center'>
                        <div class='left-action-buttons-container d-inline m-auto'>
                            <div class=' d-inline'>
                                <button type='button'
                                        onclick="launchEditMedicalConcernsModal(<?php echo $medicalConcernTypeId; ?>)"
                                        formtarget="medicalConcerntypeForm<?php echo $dynamicId; ?>"
                                        class='btn medical-concerns-table-action-buttons edit-button'>
                                    <i class='fa fa-pencil'></i> Edit
                                </button>
                            </div>
                            <div class='d-inline'>
                                <button type='button'
                                        class='btn medical-concerns-table-action-buttons delete-button'
                                        onclick='launchConfirmArchiveModal(
                                                "<?php echo $uniqueIdToArchive; ?>",
                                                "ArchiveStudentToMedicalConcern.php",
                                                "Medical Concern For Student",
                                                "<?php echo $medicalConcernName; ?>",
                                                "ShowMedicalConcerns.php")'
                                >
                                    <i class='fa fa-archive'></i> Archive
                                </button>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#showMedicalConcernsTable').DataTable({
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

<script type="text/javascript">
    function editMedicalConcernType() {
        var medicalConcernTypeId = document.getElementById("medicalConcernTypeId");
        $.ajax({
            url: "../edit/EditMedicalConcern.php",
            method: "POST",
            data: medicalConcernTypeId,
            success: function() {
                window.location = "../edit/EditMedicalConcern.php"
            }
        });
        document.getElementsByTagName("form")[0].submit();
    }
</script>

<script src="../../js/NumberTableRows.js"></script>
<?php
include("../app-shell/Footer.php");
?>
