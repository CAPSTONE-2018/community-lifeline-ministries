<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
$query = "SELECT * FROM Volunteer_Employees ORDER BY Last_Name, First_Name;";
$volunteerResults = mysqli_query($db, $query);
?>
<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Add New Program</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> New Program</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-pencil"></i> New Program Info</h1>
        </div>

        <div class="card-body">
            <form id="newProgramForm">
                <div class="row">
                    <div class="col-12 col-sm-6 m-auto">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="programName" class="mdl-textfield__input" name="name" type="text"/>
                            <label class="mdl-textfield__label" for="programName">Program Name</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" readonly>
                            <input type="hidden" id="volunteerId" name="volunteerId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="volunteerId" class="mdl-textfield__label">Volunteer</label>
                            <ul for="volunteerId" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
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
                    <input id="submitButton" onclick="validateProgramName()"
                           class="btn btn-lg large-action-buttons edit-button"
                           type="button" value="Enter"/><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateProgramName() {
        if(ErrorPromptCheck() == true){
            return;
        }
        var programName = document.getElementById("programName").value;
        var volunteerId = document.getElementById("volunteerId").value;
        var successModalMessage = "The Program, " + programName + " has been entered successfully.";
        var duplicateModalMessage = "the Program, " + programName + " already exists.";
        var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/new/NewProgram.php";
        $.ajax({
            url: "/community-lifeline-ministries/php-files/mysql-statements/add/AddProgram.php",
            method: "POST",
            data: {
                programName: programName,
                volunteerId: volunteerId
            },
            success: function (response) {
                if (response === 'entry-exists') {
                    launchGenericDuplicateEntryModal(duplicateModalMessage);
                } else if (response === 'database-error') {
                    launchGenericDatabaseErrorModal();
                } else if (response === 'success') {
                    launchGenericSuccessfulEntryModal(successModalMessage, afterModalDisplaysRoute);
                } else if (response === 'fill-inputs-required') {
                    launchGenericRequiredInputsModal();
                }
            }
        });
    }
</script>

<?php include("../app-shell/Footer.php"); ?>
