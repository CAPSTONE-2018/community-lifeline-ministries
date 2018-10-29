<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../scripts/States.php");
//include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
$queryForMedicalConcernTypes = "SELECT Id, Type_Name, Note FROM Medical_Concern_Types;";
$medicalConcernTypesResult = mysqli_query($db, $queryForMedicalConcernTypes);
$queryForPrograms = "SELECT Id, Program_Name FROM Programs";
$queryForExistingContacts = "SELECT DISTINCT Id, First_Name, Last_Name FROM Contacts";
$existingContactsResult = mysqli_query($db, $queryForExistingContacts);
$existingProgramResults = mysqli_query($db, $queryForPrograms);
?>
<div id="showStudentModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-12">
                    <h5 class="modal-title" id="wizard-title">Verify Student Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div id="studentModalBody" class="modal-body">

                <div id="studentVerifyContent">
                    <div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#studentInfoPanel" role="tab">Student
                                    Info</a>
                            <li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#studentMedicalConcernsPanel" role="tab">Medical
                                    Concern</a>
                            <li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#studentContactInfoPanel" role="tab">Contact
                                    Info</a>
                            <li>
                        </ul>
                        <div class="tab-content mt-2">
                            <div class="tab-pane fade show active" id="studentInfoPanel" role="tabpanel">
                                <div id="placeHolderForVerifyStudentInfo" class="form-group"></div>
                                <button class="btn btn-secondary" id="infoContinue">Continue</button>
                            </div>
                            <div class="tab-pane fade" id="studentMedicalConcernsPanel" role="tabpanel">
                                <div id="placeHolderForVerifyMedicalConcernsInfo"></div>
                                <button class="btn btn-secondary" id="adsContinue">Continue</button>
                            </div>
                            <div class="tab-pane fade" id="studentContactInfoPanel" role="tabpanel">
                                <div id="placeHolderForStudentContactsInfo"></div>
                                <button class="btn btn-secondary" id="placementContinue">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress mt-5">
                    <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="20" aria-valuemin="0"
                         aria-valuemax="100">Step 1 of 3
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="sendNewStudentForm()">Submit Student</button>
            </div>
        </div>
    </div>
</div>

<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Add New Student</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> New Student</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a style="cursor: pointer" data-target="#studentInfo" data-toggle="tab" class="nav-link active">Student
                        Info</a>
                </li>
                <li class="nav-item">
                    <a style="cursor: pointer" data-target="#studentMedicalConcerns" data-toggle="tab" class="nav-link">Medical
                        Concerns</a>
                </li>
                <li class="nav-item">
                    <a style="cursor: pointer" data-target="#studentContact" data-toggle="tab" class="nav-link">Student
                        Contact</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <?php include("./student/StudentForm.php"); ?>
                <!-- Medical Concern Tab -->
                <?php include("./student/MedicalConcernForm.php"); ?>
                <!-- New Contact Tab -->
                <?php include("./student/ContactForm.php"); ?>
            </div>
        </div>
        <div class="card-footer">
            <button id="newStudentConfirmationButton" type="button" class="btn btn-primary btn-lg btn-block"
                    onclick="launchVerifyStudentInfoWizard()">
                Verify Info
            </button>
        </div>
    </div>
</div>

<script type="text/javascript">
    function sendNewStudentForm() {

        var allForms = $('#newStudentForm,#newStudentMedicalConcernsForm, #newStudentContactForm').serialize();
        $('#showStudentModal').modal('hide');
        $.ajax({
            url: "../mysql-statements/add/AddStudent.php",
            method: "POST",
            data: allForms,
            success: function (response) {
                if (response === 'fill-required-inputs') {
                    launchGenericRequiredInputsModal();
                }
                var parsedOutput = JSON.parse(response);
                var newStudentConfirmation = parsedOutput['student-confirmation'];
                var newContactConfirmation = parsedOutput['new-contact-confirmation'];
                var modalMessage = "The Student Was Added Successfully";
                var afterModalDisplaysRoute = "NewStudent.php";

                if (newStudentConfirmation === true) {
                    launchGenericSuccessfulEntryModal(modalMessage, afterModalDisplaysRoute)
                }
            }
        });
    }
</script>


<script type="text/javascript">
    var dynamicContactId = 0;
    $(document).ready(function () {
        $('#add-new-contact-dropdown-button').click(function () {
            dynamicContactId++;
            $.ajax({
                url: "../scripts/AjaxDynamicContactDropdown.php",
                method: "POST",
                data: {dynamicContactId: dynamicContactId},
                success: function (output) {
                    $('.add-new-contact-dropdown').slideDown().append(output);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    function launchVerifyStudentInfoWizard() {
        if(ErrorPromptCheck() === true){
            return;
        }
        var serializedStudentInfoForm = $('#newStudentForm').serialize();

        launchConfirmStudentEntriesModal(serializedStudentInfoForm);
        $('#modal').modal({
            backdrop: 'static'
        });
    }

    $(function () {
        $('#infoContinue').click(function (e) {
            var serializedMedicalConcernsForm = $('#newStudentMedicalConcernsForm').serialize();
            launchVerifyMedicalInfoForStudent(serializedMedicalConcernsForm);
            e.preventDefault();
            $('.progress-bar').css('width', '66%');
            $('.progress-bar').html('Step 2 of 3');
            $('#myTab a[href="#studentMedicalConcernsPanel"]').tab('show');

        });

        $('#adsContinue').click(function (e) {
            var serializedStudentContactForm = $('#newStudentContactForm').serialize();
            e.preventDefault();
            $('.progress-bar').css('width', '100%');
            $('.progress-bar').html('Step 3 of 3');
            $('#myTab a[href="#studentContactInfoPanel"]').tab('show');
            launchVerifyContactInfoForStudent(serializedStudentContactForm);
        });
    })
</script>
<script src="../../js/forms/ToggleSwitchValues.js">
<?php include("../app-shell/Footer.php"); ?>
