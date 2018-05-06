<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
$queryForActiveVolunteers = "SELECT * FROM Volunteer_Employees WHERE Active_Volunteer = 1;";
$activeVolunteerResults = mysqli_query($db, $queryForActiveVolunteers);
?>
    <div class="app-title">
        <div>
            <h3><i class="fa fa-bookmark-o"></i> Volunteers</h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"> All Volunteers</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="col-12 text-center">
                <h3><i class="fa fa-star"></i> All Volunteers</h3>
            </div>
        </div>


        <div class="container">
            <table id="showVolunteerEmployeesTable" class="table table-striped table-bordered table-hover"
                   style="width:100%">
                <thead>
                <tr>
                    <th class="align-middle text-center">#</th>
                    <th class="align-middle">Name</th>
                    <th class="align-middle text-center">Email</th>
                    <th class="align-middle text-center">Phone</th>
                    <th class="align-middle text-center">Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php
                while ($activeVolunteersRow = mysqli_fetch_assoc($activeVolunteerResults)) {
                    $volunteerId = $activeVolunteersRow['Id'];
                    $nameToDisplay = $activeVolunteersRow['First_Name'] . ' ' . $activeVolunteersRow['Last_Name'];
                    $volunteerEmail = $activeVolunteersRow['Email'];
                    $volunteerPhoneNumber = $activeVolunteersRow['Primary_Phone'];
                    ?>
                    <tr>
                        <td class='text-center align-middle'></td>
                        <td class='align-middle'>
                            <?php echo $nameToDisplay; ?>
                            <input type='hidden' value='<?php echo $volunteerId; ?>'/>
                        </td>
                        <td class='align-middle text-center'><?php echo $volunteerEmail; ?></td>
                        <td class='align-middle text-center'><?php echo $volunteerPhoneNumber; ?></td>
                        <td class='align-middle text-center'>
                            <div class='left-action-buttons-container d-inline m-auto'>
                                <div class=' d-inline'>
                                    <button type='button'
                                            class='btn large-action-buttons edit-button'
                                            onclick=''
                                    >
                                        <i class='fa fa-pencil'></i> Edit
                                    </button>
                                </div>
                                <div class='d-inline'>
                                    <button type='button'
                                            class='btn large-action-buttons delete-button'
                                            onclick='launchConfirmArchiveModal(
                                                    "<?php echo $volunteerId; ?>",
                                                    "ArchiveVolunteerEmployee.php",
                                                    "Volunteer",
                                                    "<?php echo $nameToDisplay; ?>",
                                                    "ShowVolunteerEmployees.php"
                                                    )'
                                    >
                                        <i class='fa fa-archive'></i> Archive
                                    </button>
                                </div>
                            </div>

                            <div class='right-action-buttons-container d-inline'>
                                        <span title='Availability' data-toggle='tooltip' class='small-action-buttons'>
                                            <button type='button' onclick=''
                                                    class='btn small-action-buttons test-scores-button'>
                                                <i class='fa fa-star mr-0'></i>
                                            </button>
                                        </span>
                                <span title='Programs' data-toggle='tooltip'
                                      class='small-action-buttons'>
                                            <button type='button'
                                                    onclick='launchProgramsForVolunteerModal(<?php echo $volunteerId; ?>)'
                                                    class='btn small-action-buttons contact-button'>
                                                <i class='fa fa-pencil mr-0'></i>
                                            </button>
                                        </span>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th class="align-middle text-center">#</th>
                    <th class="align-middle">Name</th>
                    <th class="align-middle text-center">Email</th>
                    <th class="align-middle text-center">Phone</th>
                    <th class="align-middle text-center">Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#showVolunteerEmployeesTable').DataTable();
            });
        </script>
    </div>
<?php
include("../app-shell/Footer.php");
