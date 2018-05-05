<?php
include("../../../db/config.php");

$volunteerId = $_POST['volunteerId'];

$queryForVolunteerToProgram = "SELECT Programs.Program_Name FROM Programs
JOIN Volunteer_To_Programs Program on Programs.Id = Program.Program_Id WHERE Volunteer_Id = '$volunteerId' AND Active_Id = 1;";

$studentContactResults = mysqli_query($db, $queryForVolunteerToProgram);
$dynamicRowId = 0;

while ($volunteerRow = mysqli_fetch_assoc($studentContactResults)) {
    $dynamicRowId++;
    $programName = $volunteerRow['Program_Name'];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-user"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="contactName" class="mdl-textfield__input" readonly
                           value="<?php echo $programName; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="contactName">Program</label>
                </div>
            </div>
        </div>
        <hr>
    </div>
<?php } ?>

<script type="text/javascript">
    function closeAndLaunchArchiveStudentContact() {
        $('#customModal').modal('hide').toggle( "slide" );
        setTimeout(function () {
            launchConfirmArchiveModal(
                "<?php echo $contactId; ?>",
                "ArchiveStudentToContact.php",
                "Student Contact",
                "<?php echo $contactName; ?>",
                "ShowStudents.php"
            )
        }, 1000);
        // reference to set timeout on success modals
        // setTimeout(function() {
        //     $('#customModal').modal('hide');
        // }, 100);
    }
</script>
