<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("./program-functions/VolunteersToProgramModalShell.php");
include("./program-functions/StudentsToProgramModalShell.php");
include("./program-functions/EditProgramModalShell.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
$queryForPrograms = "SELECT * FROM Programs WHERE Active_Program = 1;";
$programResults = mysqli_query($db, $queryForPrograms);

$queryForStudentsAndEnrolledPrograms = "SELECT COUNT(Student_To_Programs.Program_Id) AS Enrolled_Programs FROM
                                          Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id GROUP BY Students.Id;";
$enrolledProgramResults = mysqli_query($db, $queryForStudentsAndEnrolledPrograms);
?>

<div class="app-title">
    <div>
        <h3><i class="fa fa-bookmark-o"></i> Programs</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> All Programs</li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        <div class="col-12 text-center">
            <h2><i class="fa fa-pencil"></i> All Programs</h2>
        </div>
    </div>
    <div class="container">
        <table id="showProgramsTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Program</th>
                <th class="text-center"># of Students</th>
                <th class="text-center"># of Volunteers</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($programsRow = mysqli_fetch_assoc($programResults)) {
                $numberOfProgramsRow = mysqli_fetch_array($enrolledProgramResults, MYSQLI_ASSOC);
                $programName = $programsRow['Program_Name'];
                $programId = $programsRow['Id'];
                $tableToLookUp = "Programs";

                $queryForAllVolunteersToProgram = "SELECT COUNT(Volunteer_To_Programs.Program_Id) AS Volunteers_To_Program FROM
  Volunteer_To_Programs JOIN Volunteer_Employees ON Volunteer_To_Programs.Volunteer_Id = Volunteer_Employees.Id WHERE Program_Id = '$programId' AND Volunteer_To_Programs.Active_Id = 1;";
                $volunteerNumberResults = mysqli_query($db, $queryForAllVolunteersToProgram);
                $numberOfVolunteersRow = mysqli_fetch_array($volunteerNumberResults, MYSQLI_ASSOC);
                ?>
                <tr>
                    <td class="text-center align-middle"></td>
                    <td class="text-center align-middle">
                        <?php echo $programName; ?>
                        <input type='hidden' value='<?php echo $programId; ?>'/>
                    </td>
                    <td class="text-center align-middle"><?php echo $numberOfProgramsRow['Enrolled_Programs']; ?></td>
                    <td class="text-center align-middle"><?php echo $numberOfVolunteersRow['Volunteers_To_Program'] ;?></td>
                    <td class="text-center align-middle">
                        <div class='left-action-buttons-container d-inline m-auto'>
                            <div class=' d-inline'>
                                <button type='button'
                                        class='btn program-action-buttons edit-button'
                                        onclick='launchEditProgramModal(<?php echo $programId; ?>)'
                                >
                                    <i class='fa fa-pencil'></i> Edit
                                </button>
                            </div>
                            <div class='d-inline'>
                                <button type='button'
                                        class='btn program-action-buttons delete-button'
                                        onclick='launchConfirmArchiveModal(
                                                "<?php echo $programId; ?>",
                                                "ArchiveProgram.php",
                                                "Program",
                                                "<?php echo $programName; ?>",
                                                "ShowPrograms.php"
                                                )'>
                                    <i class='fa fa-archive mr-0'></i> Archive
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
            $('#showProgramsTable').DataTable({
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

<?php
include("../app-shell/Footer.php");
?>
