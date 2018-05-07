<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");

session_start();
$account = $_SESSION['account'];
if ($account != "administrator") {
    ?>
    <script type="text/javascript">
        window.location.href = "../index-login/Main-Menu.php"
    </script>
    <?php
} else {
    $queryForActiveUserAccounts = "SELECT Account_Login.Username, Account_Login.Account_Type, Volunteer_Employees.First_Name, Volunteer_Employees.Last_Name FROM Volunteer_Employees JOIN Account_Login on Account_Login.Employee_Id = Volunteer_Employees.Id WHERE Active_Id = 1;";
    $activeUserResults = mysqli_query($db, $queryForActiveUserAccounts);
    ?>
    <div class="app-title">
        <div>
            <h3><i class="fa fa-bookmark-o"></i> Users</h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"> All Account Users</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="col-12 text-center">
                <h2><i class="fa fa-user-secret"></i> All Users</h2>
            </div>
        </div>
        <div class="container">
            <table id="showUsersTable" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                <tr>
                    <th class="align-middle text-center">#</th>
                    <th class="align-middle">Employee</th>
                    <th class="align-middle text-center">Account Type</th>
                    <th class="align-middle text-center">Username</th>
                    <th class="align-middle text-center">Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php
                while ($usersRow = mysqli_fetch_assoc($activeUserResults)) {
                    $firstAndLastName = $usersRow['First_Name'] . $usersRow['Last_Name'];
                    $username = $usersRow['Username'];
                    $accountType = $usersRow['Account_Type'];
                    ?>
                    <tr>
                        <td class='align-middle'></td>
                        <td class='align-middle'>
                            <?php echo $firstAndLastName; ?>
                        </td>
                        <td class='align-middle text-center'>
                            <?php echo $accountType; ?>
                        </td>

                        <td class='align-middle text-center'>
                            <?php echo $username; ?>
                        </td>
                        <td class='align-middle text-center'>
                            <div class='left-action-buttons-container d-inline m-auto'>
                                <div class=' d-inline'>
                                    <button type='button'
                                            class='btn show-contacts-action-buttons edit-button'
                                            onclick='launchEditUserModal(<?php echo $programId; ?>)'
                                    >
                                        <i class='fa fa-pencil'></i> Edit
                                    </button>
                                </div>
                                <div class='d-inline'>
                                    <button type='button'
                                            class='btn show-contacts-action-buttons delete-button'
                                            onclick='launchConfirmArchiveModal(
                                                    "<?php echo $programId; ?>",
                                                    "ArchiveProgram.php",
                                                    "Program",
                                                    "<?php echo $firstAndLastName; ?>",
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
            $(document).ready(function() {
                $('#showContactsTable').DataTable({
                    dom: '<lf<t>iBp>',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ]
                });
            } );
        </script>
    </div>


    <?php
    include("../app-shell/Footer.php");
}
?>
