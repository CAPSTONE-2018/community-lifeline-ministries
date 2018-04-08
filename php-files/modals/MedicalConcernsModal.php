<?php
include("../../db/config.php");
$dynamicRowId = 0;

$studentId = $_POST['studentId'];

$queryForStudentAllergies = "SELECT Medical_Concerns.Name, Medical_Concern_Types.Type  
                              FROM (Medical_Concerns JOIN Student_To_Medical_Concerns ON Medical_Concerns.Id = Student_To_Medical_Concerns.Medical_Concern_Id)
                              JOIN Medical_Concern_Types ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id WHERE Student_Id = 1;";
$studentMedicalConcernResults = mysqli_query($db, $queryForStudentAllergies);

$response = '';

while ($medicalConcernRow = mysqli_fetch_assoc($studentMedicalConcernResults)) {
    $dynamicRowId++;

    $medicalConcernName = $medicalConcernRow['Name'];
    $medicalConcernType = $medicalConcernRow['Type'];

    $response = '
<div class="medical-concern-modal">
    <div class="row form-group">
        <div class="col-2 text-center mt-auto mb-auto">
            <i class="fa fa-bullhorn"></i>
        </div>
        <div class="col-10">
            <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="contactName" class="mdl-textfield__input" readonly
                       value="' . $medicalConcernName . '"
                       type="text"/>
                <label class="mdl-textfield__label" for="contactName">Medical Concern</label>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-2 text-center mt-auto mb-auto">
            <i class="fa fa-phone"></i>
        </div>
        <div class="col-10">
            <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="contactPrimaryPhone" class="mdl-textfield__input" readonly
                       value="' . $medicalConcernType . '"
                       value="' . $medicalConcernType . '"
                       type="text"/>
                <label class="mdl-textfield__label" for="primaryPhone">Concern Type</label>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-2 text-center mt-auto mb-auto">
            <i class="fa fa-comments-o"></i>
        </div>
        <div class="col-10">
            <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="floatingContactEmail" class="mdl-textfield__input" readonly="readonly"
                       value="' . $contactEmail . '"
                       type="email"/>
                <label class="mdl-textfield__label" for="contactEmail">Notes</label>
            </div>
        </div>
    </div>

    <p>
        <button class="btn btn-outline" type="button" data-toggle="collapse"
                aria-controls="collapseAddress' . $dynamicRowId . '"
                data-target="#collapseAddress' . $dynamicRowId . '"
        >
            View Address Info <i class="fa fa-toggle-down"></i>
        </button>
    </p>

    <div class="collapse" id="collapseAddress' . $dynamicRowId . '">
        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-address-book-o"></i>
            </div>
            <div class="col-10">

                <div class="">
                    ' . $contactAddressOne . " " . $contactAddressTwo . '
                </div>
                <div class="">
                    ' . $contactCity . ", " . $contactState . '
                </div>
                <div class="">
                    ' . $contactZip . '
                </div>

            </div>
        </div>
    </div>
    <hr>
</div>';
}

echo $response;
exit;