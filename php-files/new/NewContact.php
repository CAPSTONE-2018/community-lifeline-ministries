<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");

include("../../db/config.php");
include("../scripts/States.php");
$query = "SELECT DISTINCT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name, First_Name;";
$studentsResult = mysqli_query($db, $query);
?>
<div id="showContactModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-12">
                    <h5 class="modal-title" id="wizard-title">Verify Contact Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div id="contactModalBody" class="modal-body">
                <div id="contactVerifyContent">
                    <div id="placeHolderForVerifyContactInfo" class="form-group"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block btn-group-lg" data-dismiss="modal">Cancel
                </button>
                <button type="button" class="btn btn-primary btn-block btn-group-lg" onclick="sendSerializedNewContactForm()">
                    Submit Contact
                </button>
            </div>
        </div>
    </div>
</div>

<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Add New Contact</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> New Contact</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="header"><i class="fa fa-address-card-o"></i> Contact Info</div>
            <h4 class="heading"><i class="fa fa-graduation-cap"></i> Student Contact</h4>
            <div class="blue-line-color"></div>
            <?php include("./contact/NewContactForm.php"); ?>
        </div>

        <div class="card-footer">
            <div class="right-align">
                <!--   Button trigger modal -->
                <button type="button" class="btn btn-primary btn-block btn-lg" onclick="launchVerifyContactWizard()">
                    Verify Info
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function sendSerializedNewContactForm() {
        $('#showContactModal').modal('hide');
        var serializedContactInfoForm = $('#newContactForm').serialize();
        $.ajax({
            url: "/community-lifeline-ministries/php-files/mysql-statements/add/AddContact.php",
            method: "POST",
            data: serializedContactInfoForm,
            success: function (response) {
                if (response === 'fill-required-inputs') {
                    launchGenericRequiredInputsModal();
                }
                var parsedOutput = JSON.parse(response);
                var newContactConfirmation = parsedOutput['contact-confirmation'];
                var newStudentToContactConfirmation = parsedOutput['student-to-contact-confirmation'];
                var modalMessage = "The Contact Was Added Successfully";
                var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/new/NewContact.php";
                if (newContactConfirmation === true) {
                    launchGenericSuccessfulEntryModal(modalMessage, afterModalDisplaysRoute)
                } else {
                    launchGenericDatabaseErrorModal();
                }
            }
        });
    }
</script>

<script type="text/javascript">
    function launchVerifyContactWizard() {
        var serializedContactInfoForm = $('#newContactForm').serialize();
        $('#modal').modal({
            backdrop: 'static'
        });
        $.ajax({
            url: "/community-lifeline-ministries/php-files/modals/contacts/VerifyNewContact.php",
            method: "POST",
            data: serializedContactInfoForm,
            success: function (response) {
                $('#placeHolderForVerifyContactInfo').html(response);
                $('#showContactModal').modal({show: true});
            }
        })
    }
</script>
<?php include("../app-shell/Footer.php") ?>
