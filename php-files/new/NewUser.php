<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: index.html");
}
$account = $_SESSION['account'];

if ($account != "administrator") {
    ?>
    <script type="text/javascript">
        window.location.href = "../index-login/Main-Menu.php"
    </script>
    <?php
}
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");

$queryForActiveVolunteer = "SELECT * FROM Volunteer_Employees WHERE Active_Volunteer = 1;";
$volunteerResults = mysqli_query($db, $queryForActiveVolunteer);
?>
<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Add New User</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> New User</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-key"></i> Register User For Access</h1>
        </div>
        <div class="card-body">
            <form id="newUserForm" name="newUserForm">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="username" class="mdl-textfield__input" name="username" type="text"/>
                            <label class="mdl-textfield__label" for="username">Username</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="password" class="mdl-textfield__input" name="password"
                                   type="password"/>
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" id="accountType" readonly>
                            <input type="hidden" name="accountType">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="accountType" class="mdl-textfield__label">Account Type</label>
                            <ul for="accountType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" data-val="administrator">Administrator</li>
                                <li class="mdl-menu__item" data-val="employee">Employee</li>
                                <li class="mdl-menu__item" data-val="volunteer">Volunteer</li>
                                <li class="mdl-menu__item" data-val="report_user">Report User</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" id="volunteerName" readonly>
                            <input type="hidden" id="volunteerId" name="volunteerId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="volunteerName" class="mdl-textfield__label">First And Last Name</label>
                            <ul for="volunteerName" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php while ($volunteerRow = mysqli_fetch_assoc($volunteerResults)) {
                                    $volunteerName = $volunteerRow['First_Name'] . ' ' . $volunteerRow['Last_Name'];
                                    ?>
                                    <li class="mdl-menu__item"
                                        data-val="<?php echo $volunteerRow['Id']; ?>"><?php echo $volunteerName; ?></li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row col-sm-12">
                    <input id="submitButton" onclick="validateNewUser()" type="button" value="Enter"
                           class="btn btn-lg btn-primary btn-block"/>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateNewUser() {
        if(ErrorPromptCheck() == true){
            return;
        }
        var username = document.getElementById("username").value;
        var accountType = document.getElementById("accountType").value;
        var volunteerId = document.getElementById("volunteerId").value;
        var password = document.getElementById("password").value;
        var volunteerName = document.getElementById("volunteerName").value;
        var successModalMessage = "The username, " + username + " has been entered successfully.";
        var duplicateModalMessage = "the username, " + username + " for " + volunteerName + "already exists.";
        var afterModalDisplaysRoute = "../index-login/Main-Menu.php";

        $.ajax({
            url: "../mysql-statements/add/AddUser.php",
            method: "POST",
            data: {
                username: username,
                account: accountType,
                password: password,
                volunteer: volunteerId
            },
            success: function (response) {
                if (response === 'entry-exists') {
                    launchGenericDuplicateEntryModal(duplicateModalMessage);
                } else if (response === 'database-error') {
                    launchGenericDatabaseErrorModal();
                } else if (response === 'success') {
                    launchGenericSuccessfulEntryModal(successModalMessage, afterModalDisplaysRoute);
                } else if (response === 'fill-required-inputs') {
                    launchGenericRequiredInputsModal();
                }
            }
        });
    }
</script>
<?php include("../app-shell/Footer.php"); ?>
