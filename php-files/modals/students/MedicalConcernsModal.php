<?php
include("../../../db/config.php");
$dynamicRowId = 0;

$studentId = $_POST['studentId'];

$queryForStudentAllergies = "
SELECT Student_To_Medical_Concerns.Medical_Concern_Name, Medical_Concern_Types.Type_Name, Student_To_Medical_Concerns.Note FROM Medical_Concern_Types JOIN Student_To_Medical_Concerns ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id
WHERE Student_To_Medical_Concerns.Student_Id = '$studentId' AND Student_To_Medical_Concerns.Active_Id = 1;";
$studentMedicalConcernResults = mysqli_query($db, $queryForStudentAllergies);

while ($medicalConcernRow = mysqli_fetch_assoc($studentMedicalConcernResults)) {
    $medicalConcernName = $medicalConcernRow['Medical_Concern_Name'];
    $medicalConcernType = $medicalConcernRow['Type_Name'];
    $medicalConcernNotes = $medicalConcernRow['Note'];

    ?>
    <div class="medical-concern-modal">
        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-bullhorn"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="contactName" class="mdl-textfield__input" readonly
                           value="<?php echo $medicalConcernName; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="contactName">Medical Concern</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-pencil-square-o"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="contactPrimaryPhone" class="mdl-textfield__input" readonly
                           value="<?php echo $medicalConcernType; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="primaryPhone">Concern Type</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-comments-o"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea rows="4" id="floatingContactEmail" class="mdl-textfield__input" readonly="readonly"
                          type="text">
                    <?php echo $medicalConcernNotes; ?>
                </textarea>
                    <label class="mdl-textfield__label" for="contactEmail">Notes</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-6'>
                <button type='button' class='btn btn-secondary'
                        onclick='closeAndLaunchArchiveMedicalConcern()'
                >
                    <i class='fa fa-archive'></i> Archive Contact
                </button>
            </div>
        </div>
        <hr/>
    </div>
<?php } ?>


<script type="text/javascript">
    function closeAndLaunchArchiveMedicalConcern() {
        alert();
        $('#customModal').modal('hide').toggle( "slide" );
        setTimeout(function () {
            launchConfirmArchiveModal(
                "<?php echo $studentId; ?>",
                "ArchiveStudentToMedicalConcern.php",
                "Student Medical Concern",
                "<?php echo $medicalConcernName; ?>",
                "ShowStudents.php"
            )
        }, 1000);
        // reference to set timeout on success modals
        // setTimeout(function() {
        //     $('#customModal').modal('hide');
        // }, 100);
    }
</script>

