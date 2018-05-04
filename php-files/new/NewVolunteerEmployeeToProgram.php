<?php

include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");

$queryForActiveVolunteers = "SELECT * FROM Volunteer_Employees WHERE Active_Volunteer = 1 ORDER BY Last_Name, First_Name;";
$activeVolunteersResults = mysqli_query($db, $queryForActiveVolunteers);

$queryForActivePrograms = "SELECT * FROM  Programs WHERE Active_Program = 1 ORDER BY Program_Name;";
$activeProgramResults = mysqli_query($db, $queryForActivePrograms);
?>
<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Volunteer to Program</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> Volunteer to Program</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-pencil"></i> Add Volunteer to Program</h1>
        </div>

        <div class="card-body">
            <form id="newProgramForm">
                <div class="row">


                    <div class="col-12 col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" id="volunteerName" class="mdl-textfield__input" readonly>
                            <input type="hidden" id="volunteerId" name="volunteerId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="volunteerId" class="mdl-textfield__label">Volunteer</label>
                            <ul for="volunteerId" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php while ($volunteerRow = mysqli_fetch_assoc($activeVolunteersResults)) {
                                    $volunteerName = $volunteerRow['First_Name'] . ' ' . $volunteerRow['Last_Name'];
                                    ?>
                                    <li class="mdl-menu__item"
                                        data-val="<?php echo $volunteerRow['Id']; ?>"><?php echo $volunteerName; ?></li>

                                <?php } ?>

                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" id="programName" class="mdl-textfield__input" readonly>
                            <input type="hidden" id="programId" name="programId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="programId" class="mdl-textfield__label">Program</label>
                            <ul for="programId" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php while ($programsRow = mysqli_fetch_assoc($activeProgramResults)) {
                                    $programName = $programsRow['Program_Name'];
                                    ?>
                                    <li class="mdl-menu__item"
                                        data-val="<?php echo $programsRow['Id']; ?>"><?php echo $programName; ?></li>

                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-12">
                    <input id="submitButton" onclick="validateEmployeeToProgram()"
                           class="btn large-action-buttons edit-button"
                           type="button" value="Enter"/><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateEmployeeToProgram() {
        var volunteerId = document.getElementById("volunteerId").value;
        var programId = document.getElementById("programId").value;
        var programName = document.getElementById("programName").value;
        var volunteerName = document.getElementById("volunteerName").value;
        alert(volunteerName);
        var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/new/NewVolunteerEmployeeToProgram.php";
        var successModalMessage = "The Volunteer, " + volunteerName + " has been added to, " + programName + ".";
        var duplicateModalMessage = "the record for " + programName + ", and " + volunteerName + " already exist.";
        $.ajax({
            url: "/community-lifeline-ministries/php-files/mysql-statements/add/AddVolunteerEmployeeToProgram.php",
            method: "POST",
            data: {
                volunteerId: volunteerId,
                programId: programId
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
