<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

?>

<div class="container-fluid col-sm-10">
    <div class="card text-center">
        <div class="card-header">
            <h1><i class="fa fa-warning"></i> Add New Medical Concern</h1>
        </div>

        <div class="card-body">
            <form action="../add/AddMedicalConcern.php" method="POST" id="newMedicalConcernForm">
                <h4 class="heading text-left"><i class="fa fa-bullhorn"></i> General Info</h4>
                <div class="blue-line-color"></div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="medicalConcernName" class="mdl-textfield__input" name="name" type="text"/>
                            <label class="mdl-textfield__label" for="medicalConcernName">Name</label>
                            <span class="mdl-textfield__error">Not A Valid Input Type</span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="medicalConcernType" class="mdl-textfield__input" name="type" type="text"/>
                            <label class="mdl-textfield__label" for="medicalConcernType">Type of Concern</label>
                            <span class="mdl-textfield__error">Last Name is Required</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea id="medicalConcernNote" class="mdl-textfield__input" name="note" type="text"></textarea>
                            <label class="mdl-textfield__label" for="medicalConcernNote">Note</label>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-12">
                    <input id="submitButton" class="btn large-action-buttons edit-student-button"
                           form="newMedicalConcernForm" type="submit" value="Enter"><br><br>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../scripts/footer.php"); ?>
