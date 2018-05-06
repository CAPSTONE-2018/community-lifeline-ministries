<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
//connect to database
include("../../db/config.php");
$programId = $_GET['programId'];

$queryForProgram = "SELECT * FROM Programs WHERE Id = '$programId'";
$programResults = mysqli_query($db, $queryForProgram);
$programRow = mysqli_fetch_assoc($programResults);
$programName = $programRow['Program_Name'];
$queryForVolunteerInfo = "SELECT * FROM Volunteer_Employees 
                          JOIN Volunteer_To_Programs ON Volunteer_Employees.Id = Volunteer_To_Programs.Volunteer_Id
                          WHERE Volunteer_To_Programs.Program_Id = '$programId';";
$volunteerResults = mysqli_query($db, $queryForVolunteerInfo);
?>
<div class="container-fluid col-sm-10">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-pencil"></i>  Edit Program Info</h1>
        </div>

        <div class="card-body">
            <form id="newProgramForm">

                <div class="form-group">
                    <div class="col-sm-6 m-auto">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="programName" class="mdl-textfield__input" name="name"
                                   value="<?php echo $programName; ?>" type="text"/>
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
                           type="button" value="Update Program"><br><br>
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
        var viewAllRoute = "../../php-files/show/ShowPrograms.php";
        var viewAllButtonTitle = "View All Programs";
        var newEntryRoute = "../../php-files/new/NewProgram.php";
        var newEntryButtonTitle = "New Program";
        $.ajax({
            url: "../add/AddProgram.php",
            method: "POST",
            data: {
                programName: programName,
                volunteerId: volunteerId
            },
            success: function (data) {
                if (data === 1) {
                    launchDuplicateEntryModal(programName, submissionType);
                } else if (data === 001) {
                    alert("something went wrong with the database");
                } else if (data === 0) {
                    launchSuccessfulEntryModal(programName, submissionType,
                        viewAllRoute, viewAllButtonTitle, newEntryRoute, newEntryButtonTitle);
                }
            }
        });
    }
</script>

<?php include("../app-shell/Footer.php"); ?>

