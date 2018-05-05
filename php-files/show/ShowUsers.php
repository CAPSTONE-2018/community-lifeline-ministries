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


    $queryForActiveUserAccounts = "SELECT Account_Login.Username, Account_Login.Account_Type, Volunteer_Employees.First_Name, Volunteer_Employees.Last_Name
FROM Volunteer_Employees JOIN Account_Login on Account_Login.Employee_Id = Volunteer_Employees.Id WHERE Active_Id = 1;";
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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="col-12 text-center">
                    <h2><i class="fa fa-user-secret"></i> All Users</h2>
                </div>

                <div class="row">
                    <div class="search-input-wrapper col-6">
                        <input id="search-input" type="text" placeholder="Search" onkeyup="FilterFields()">
                        <i class="align-middle fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                    </div>

                    <div class="align-middle m-auto text-right col-6">
                        <div class="btn-group btn-toggle">
                            <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible2">
                                Active
                            </button>

                            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapsible2">
                                In-Active
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
                            <th class="col-sm-3">Employee</th>
                            <th class="col-sm-2 text-center">Account Type</th>
                            <th class="col-sm-2 text-center">Username</th>
                            <th class="col-sm-4 text-center">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        while ($usersRow = mysqli_fetch_assoc($activeUserResults)) {
                            $firstAndLastName = $usersRow['First_Name'] . $usersRow['Last_Name'];
                            $username = $usersRow['Username'];
                            $accountType = $usersRow['Account_Type'];
                            ?>
                            <tr class='row'>
                                <td class='col-sm-1 align-middle'></td>
                                <td class='col-sm-3 align-middle'>
                                    <?php echo $firstAndLastName; ?>
                                </td>
                                <td class='col-sm-2 align-middle text-center'>
                                    <?php echo $accountType; ?>
                                </td>

                                <td class='col-sm-2 align-middle text-center'>
                                    <?php echo $username; ?>
                                </td>
                                <td class='col-sm-4 text-center'>
                                    <div class='left-action-buttons-container d-inline m-auto'>
                                        <div class=' d-inline'>
                                            <button type='button'
                                                    class='btn large-action-buttons edit-button'
                                                    onclick='launchEditProgramModal(<?php echo $programId; ?>)'
                                            >
                                                <i class='fa fa-pencil'></i> Edit
                                            </button>
                                        </div>
                                        <div class='d-inline'>
                                            <button type='button'
                                                    class='btn large-action-buttons delete-button'
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

                                    <div class='right-action-buttons-container d-inline'>
                                    <span title='Account Passwords' data-toggle='tooltip' class='small-action-buttons'>
                                        <button type='button'
                                                onclick='launchVolunteersInProgramModal(<?php echo $programId; ?>)'
                                                class='btn small-action-buttons test-scores-button'
                                        >
                                            <i class='fa fa-star mr-0'></i>
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
            <div class="card-footer"></div>
        </div>
    </div>

    <?php
    include("../app-shell/Footer.php");
}
?>
