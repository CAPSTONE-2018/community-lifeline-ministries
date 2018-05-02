<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../scripts/States.php");
include("../../db/config.php");
$queryForMedicalConcernTypes = "SELECT Id, Type_Name, Note FROM Medical_Concern_Types;";
$medicalConcernTypesResult = mysqli_query($db, $queryForMedicalConcernTypes);
$queryForPrograms = "SELECT Id, Program_Name FROM Programs";
//$medicalConcernTypeRow = mysqli_fetch_array($medicalConcernTypesResult);
$queryForExistingContacts = "SELECT DISTINCT Id, First_Name, Last_Name FROM Contacts";
$existingContactsResult = mysqli_query($db, $queryForExistingContacts);
$existingProgramResults = mysqli_query($db, $queryForPrograms);
?>
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
                    <a style="cursor: pointer"  data-target="#studentInfo" data-toggle="tab" class="nav-link active">Student Info</a>
                </li>
                <li class="nav-item">
                    <a style="cursor: pointer"  data-target="#studentMedicalConcerns" data-toggle="tab" class="nav-link">Medical Concerns</a>
                </li>
                <li class="nav-item">
                    <a style="cursor: pointer"  data-target="#studentContact" data-toggle="tab" class="nav-link">Student Contact</a>
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
            <div class="right-align">
                <button data-izimodal-open="#newStudentConfirmationModal" id="newStudentConfirmationButton" type="button" class="btn btn-right btn-primary">
                    Verify Info
                </button>
            </div>
        </div>
    </div>
</div>

<div id="newStudentConfirmationModal"
     data-izimodal-group="group1"
     data-izimodal-loop=""
     data-izimodal-title=""
     data-izimodal-subtitle="">


    <p><br></p>
</div>
<script type="text/javascript">
    // $(document).on('click', '#newStudentConfirmationButton', function(event) {
    //     event.preventDefault();
    //     $('#newStudentConfirmationModal').iziModal('open');
    // });
    $('#newStudentConfirmationModal').iziModal({

        headerColor: '#26A69A',
        width: '50%',
        overlayColor: 'rgba(0, 0, 0, 0.5)',
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOutDown',


        onOpening: function(modal){

            modal.startLoading();

            $.get('./NewUser.php', function(data) {
                $("#newStudentConfirmationModal .iziModal-content").html(data);
                modal.stopLoading();
            });
        }

    });



    var dynamicMedicalConcernId = 0;
    $(document).ready(function () {
        $('#add-new-medical-concern-button').click(function () {
            dynamicMedicalConcernId++;
            $.ajax({
                url: "../scripts/AjaxDynamicMedicalConcern.php",
                method: "POST",
                data: {dynamicMedicalConcernId: dynamicMedicalConcernId},
                success: function (output) {
                    $('.new-medical-concern-layer').append(output);
                    componentHandler.upgradeDom();
                }
            })
        });
    });

    $(document).on('click', '.remove-medical-concern', function (event) {
        event.preventDefault();
        var button_id = this.id;
        $('#dynamic-medical-concern' + button_id).remove();
    });
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

<?php include("../app-shell/Footer.php"); ?>
