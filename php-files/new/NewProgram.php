<?php
include("../app-shell/header.php");
include("../app-shell/sidebar.php");


//connect to database
include("../../db/config.php");


$query = "SELECT * FROM Volunteer_Employees ORDER BY Last_Name, First_Name;";
$volunteerResults = mysqli_query($db, $query);
?>

<div class="container-fluid col-sm-10">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-pencil"></i>  New Program Info</h1>
        </div>

        <div class="card-body">
            <form id="newProgramForm">

                <div class="form-group">
                    <div class="col-sm-6 m-auto">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="programName" class="mdl-textfield__input" name="name" type="text"/>
                            <label class="mdl-textfield__label" for="programName">Program Name</label>
                        </div>
                    </div>

                    <div class="col-sm-6 ">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" readonly>
                            <input type="hidden" id="volunteerId" name="volunteerId">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="volunteerId" class="mdl-textfield__label">Volunteer</label>
                            <ul for="volunteerId" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php while($volunteerRow = mysqli_fetch_assoc($volunteerResults)) {
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
                           class="btn large-action-buttons edit-button"
                           type="button" value="Enter"><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateProgramName() {
        var programName = document.getElementById("programName").value;
        var volunteerId = document.getElementById("volunteerId").value;
        var submissionType = "Program";
        var viewAllRoute = "routeToViewAllPrograms()";
        var viewAllButtonTitle = "View All Programs";
        var newEntryRoute = "routeToNewProgram()";
        var newEntryButtonTitle = "New Program";
        $.ajax({
            url: "../mysql-statements/add/AddProgram.php",
            method: "POST",
            data: {
                programName: programName,
                volunteerId: volunteerId
            },
            success: function (data) {
                if (data == 1) {
                    launchDuplicateProgramEntryModal(programName, submissionType);
                } else if (data == 001) {
                    alert("something went wrong with the database");
                } else if (data == 0) {
                    launchSuccessfulProgramEntryModal(programName, submissionType,
                        viewAllRoute, viewAllButtonTitle, newEntryRoute, newEntryButtonTitle);
                }
            }
        });
    }
</script>

<?php include("../app-shell/footer.php"); ?>
