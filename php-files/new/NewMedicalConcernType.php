<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");
?>
<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Medical Concern Type</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> New Concern Type</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h2><i class="fa fa-warning"></i> Add New Medical Concern Type</h2>
        </div>

        <div class="card-body">
            <form method="POST" id="newMedicalConcernForm">
                <h4 class="heading text-left"><i class="fa fa-bullhorn"></i> General Info</h4>
                <div class="blue-line-color"></div>
                <div class="row">
                    <div class="col-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="medicalConcernType" class="mdl-textfield__input" name="type" type="text"/>
                            <label class="mdl-textfield__label" for="medicalConcernType">Type of Concern</label>
                            <span class="mdl-textfield__error">Type Name is Required</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea id="medicalConcernNote" class="mdl-textfield__input" name="note" type="text"></textarea>
                            <label class="mdl-textfield__label" for="medicalConcernNote">Note</label>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-12">
                    <input type="button" class="btn large-action-buttons edit-button"
                           onclick="validateMedicalType()" value="Enter"><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateMedicalType() {
        if(ErrorPromptCheck() == true){
            return;
        }
        var medicalTypeName = document.getElementById("medicalConcernType").value;
        var successModalMessage = "Medical Concern Type, " + medicalTypeName + " has been entered successfully.";
        var duplicateModalMessage = "Medical Concern Type, " + medicalTypeName + " already exists.";
        var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/new/NewMedicalConcernType.php";

        $.ajax({
            url: "/community-lifeline-ministries/php-files/mysql-statements/add/AddMedicalConcernType.php",
            method: "POST",
            data: {name: medicalTypeName},
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
