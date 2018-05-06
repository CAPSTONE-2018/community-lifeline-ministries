<?php
include("../../../db/config.php");
$dynamicRowId = 0;
$uniqueMedicalConcernId = "";
$medicalConcernName = "";
$medicalConcernType = "";
$medicalConcernNotes = "";
$studentId = $_POST['studentId'];

$queryForStudentName = "SELECT Students.First_Name, Students.Last_Name FROM Students WHERE Id = '$studentId';";
$studentNameResults = mysqli_query($db, $queryForStudentName);
$studentNameRow = mysqli_fetch_assoc($studentNameResults);
$nameToDisplay = $studentNameRow['First_Name'] . " " . $studentNameRow['Last_Name'];
$queryForStudentAllergies = "
SELECT Student_To_Medical_Concerns.Id, Student_To_Medical_Concerns.Medical_Concern_Name, Medical_Concern_Types.Type_Name, Student_To_Medical_Concerns.Note FROM Medical_Concern_Types JOIN Student_To_Medical_Concerns ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id
WHERE Student_To_Medical_Concerns.Student_Id = '$studentId' AND Student_To_Medical_Concerns.Active_Id = 1;";
$studentMedicalConcernResults = mysqli_query($db, $queryForStudentAllergies);

while ($medicalConcernRow = mysqli_fetch_assoc($studentMedicalConcernResults)) {
    $uniqueMedicalConcernId = $medicalConcernRow['Id'];
    $medicalConcernName = $medicalConcernRow['Medical_Concern_Name'];
    $medicalConcernType = $medicalConcernRow['Type_Name'];
    $medicalConcernNotes = $medicalConcernRow['Note'];

    ?>
    <div class="medical-concern-modal">
        <div class="row">
            <input type="hidden" id="studentNameToDisplay" value="<?php echo $nameToDisplay; ?>" />
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-bullhorn"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="medicalConcernName" class="mdl-textfield__input" readonly
                           value="<?php echo $medicalConcernName; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="medicalConcernName">Medical Concern</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-pencil-square-o"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="medicalConcernType" class="mdl-textfield__input" readonly
                           value="<?php echo $medicalConcernType; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="medicalConcernType">Concern Type</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-comments-o"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea rows="4" id="medicalConcernNote" class="mdl-textfield__input" readonly="readonly"
                          type="text">
                    <?php echo $medicalConcernNotes; ?>
                </textarea>
                    <label class="mdl-textfield__label" for="medicalConcernNote">Notes</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-6'>
                <button type='button' class='btn btn-secondary'
                        onclick='closeAndLaunchArchiveMedicalConcern()'>
                    <i class='fa fa-archive'></i> Archive Medical Concern
                </button>
            </div>
        </div>
        <hr/>
    </div>
<?php } ?>


<script type="text/javascript">
    function closeAndLaunchArchiveMedicalConcern() {

        var studentName = document.getElementById("studentNameToDisplay").value;
        var medicalConcernName = document.getElementById("medicalConcernName").value;

        var messageToDisplay = "Medical Concern, " + medicalConcernName + " for ";

        $('#customModal').modal('hide').toggle( "slide" );
        setTimeout(function () {
            launchConfirmArchiveModal(
                "<?php echo $uniqueMedicalConcernId; ?>",
                "ArchiveStudentToMedicalConcern.php",
                messageToDisplay,
                studentName,
                "ShowStudents.php"
            )
        }, 1000);
        // reference to set timeout on success modals
        // setTimeout(function() {
        //     $('#customModal').modal('hide');
        // }, 100);
    }
</script>

