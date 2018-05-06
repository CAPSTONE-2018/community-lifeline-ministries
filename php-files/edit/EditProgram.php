<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("./program-functions/RemoveVolunteerFromProgramModalShell.php");
//connect to database
include("../../db/config.php");
$programId = $_POST['programId'];
$dynamicButtonId = 0;
$queryForProgram = "SELECT * FROM Programs WHERE Id = '$programId'";
$programResults = mysqli_query($db, $queryForProgram);
$programRow = mysqli_fetch_assoc($programResults);
$programName = $programRow['Program_Name'];
$programId = $programRow['Id'];
$queryForVolunteerInfo = "SELECT Volunteer_Employees.Id, Volunteer_Employees.First_Name, Volunteer_Employees.Last_Name FROM Volunteer_Employees 
                          JOIN Volunteer_To_Programs ON Volunteer_Employees.Id = Volunteer_To_Programs.Volunteer_Id
                          WHERE Volunteer_To_Programs.Program_Id = '$programId' AND Active_Id = 1;";
$volunteerInfoResults = mysqli_query($db, $queryForVolunteerInfo);

?>

<div class="app-title">
    <div>
        <h3><i class="fa fa-pencil"></i> Edit Program</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> Edit Program</li>
    </ul>
</div>

<div class="card">
    <form name="programForm" id="programForm">
        <div class="card-body">
            <div class="row col-sm-12">
                <input type="hidden" id="programId" value="<?php echo $programId; ?>"/>

                <div class="col-6 d-inline">
                    <div class="col-12">
                        <h4 class="heading "><i class="fa fa-pencil"></i> Edit Program Info</h4>
                        <div class="edit-blue-line-color"></div>
                    </div>

                    <div class="col-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="programName" class="mdl-textfield__input"
                                   value="<?php echo $programName; ?>" name="name" type="text"/>
                            <label class="mdl-textfield__label" for="programName">Program Name</label>
                        </div>
                    </div>
                </div>

                <div class="col-6 d-inline">
                    <div class="col-12">
                        <h4 class="heading "><i class="fa fa-star"></i> Volunteers</h4>
                        <div class="edit-blue-line-color"></div>
                    </div>

                    <?php while ($volunteerRow = mysqli_fetch_assoc($volunteerInfoResults)) {
                        $volunteerName = $volunteerRow['First_Name'] . ' ' . $volunteerRow['Last_Name'];
                        $volunteerId = $volunteerRow['Id'];
                        $dynamicButtonId++;
                        ?>
                        <div id="dynamicVolunteerRow<?php echo $dynamicButtonId; ?>" class="row col-12">
                            <div class="col-10">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="volunteerName" class="mdl-textfield__input"
                                           value="<?php echo $volunteerName; ?>" name="volunteerName" type="text"
                                           readonly/>
                                    <input type="hidden" id="volunteerId" value="<?php echo $volunteerId; ?>"/>
                                    <label class="mdl-textfield__label" for="volunteerName">Volunteer</label>

                                </div>
                            </div>
                            <span title='Remove Volunteer' data-toggle='tooltip' class="col-2 m-auto">
                                    <button class="btn btn-danger d-inline remove-volunteer-from-program" type="button"
                                            id="<?php echo $dynamicButtonId; ?>"
                                            onclick="archiveVolunteerFromProgramMessageModal(<?php echo $dynamicButtonId; ?>)"
                                    >
                                        x
                                    </button>
                            </span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" form="programForm" value="Edit Program Info" class="btn btn-primary btn-lg btn-block"/>
        </div>

    </form>
</div>

<script type="text/javascript">

    var buttonIdToRemove;

    function archiveVolunteerFromProgramMessageModal(dynamicButtonId) {
        buttonIdToRemove = dynamicButtonId;
        event.preventDefault();
        var volunteerName = document.getElementById("volunteerName").value;
        var programName = document.getElementById("programName").value;
        var archiveUserMessage = "Are You Sure You Want To Archive " + volunteerName;
        var archiveFromProgramMessage = "From The Program " + programName + "?";
        $('#userToDisplay').html(archiveUserMessage);
        $('#programToDisplay').html(archiveFromProgramMessage);
        $('#archiveVolunteerFromProgram').modal({show: true});
    }

    function removeVolunteerFromProgram() {
        var volunteerId = document.getElementById("volunteerId").value;
        var programId = document.getElementById("programId").value;
        alert(volunteerId);
        alert(programId);
        $.ajax({
            url: "/community-lifeline-ministries/php-files/mysql-statements/archive/ArchiveVolunteerToProgram.php",
            type: "POST",
            data: {
                volunteerId: volunteerId,
                programId: programId
            },
            success: function(response) {
                $('#archiveVolunteerFromProgram').modal('hide');
                alert(response);
                launchGenericSuccessfulArchive();
                $('#dynamicVolunteerRow'+buttonIdToRemove).remove();
            }
        });
    }


</script>

<script type="text/javascript">
    function validateEditProgramInfo() {


        var programName = document.getElementById("programName").value;
        var volunteerId = document.getElementById("volunteerId").value;
        var submissionType = "Program";
        var viewAllRoute = "../../php-files/show/ShowPrograms.php";
        var viewAllButtonTitle = "View All Programs";
        var newEntryRoute = "../../php-files/new/NewProgram.php";
        var newEntryButtonTitle = "New Program";
        $.ajax({
            url: "",
            method: "POST",
            data: {

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

