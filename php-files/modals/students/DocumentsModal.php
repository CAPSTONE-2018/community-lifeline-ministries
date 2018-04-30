<?php
include("../../../db/config.php");

$studentId = $_POST['studentId'];

$queryForStudentDocuments = "SELECT Birth_Certificate, Permission_Slip, Reduced_Lunch_Eligible, IEP 
                              FROM Students WHERE Id = '$studentId';";
$studentDocumentsResults = mysqli_query($db, $queryForStudentDocuments);

while ($documentsRow = mysqli_fetch_assoc($studentDocumentsResults)) {

    if ($documentsRow['Permission_Slip'] == 0) {
        $permissionChecked = "";
    } else {
        $permissionChecked = "checked";
    }

    if ($documentsRow['Reduced_Lunch_Eligible'] == 0) {
        $reducedLunchChecked = "";
    } else {
        $reducedLunchChecked = "checked";
    }

    if ($documentsRow['Birth_Certificate'] == 0) {
        $birthCertificateChecked = "";
    } else {
        $birthCertificateChecked = "checked";
    }

    if ($documentsRow['IEP'] == 0) {
        $iepChecked = "";
    } else {
        $iepChecked = "checked";
    }
    ?>
    <div class="documents-modal">
        <div class="form-group row">
            <div class="col-sm-6 m-auto">
                <div class="align-middle">
                    Birth Certificate on File
                </div>
            </div>
            <div class="d-inline col-sm-6">
                <ul class="tg-list">
                    <div class="toggle-side-label">No</div>
                    <li class="tg-list-item">
                        <input class="tgl tgl-flat" id="cb3"
                               name="birthCertificateCheckbox"
                               type="checkbox" disabled <?php echo $birthCertificateChecked; ?>/>
                        <label class="tgl-btn" for="cb3"></label>
                    </li>
                    <div class="toggle-side-label">Yes</div>
                </ul>
            </div>
        </div>
        <hr/>

        <div class="form-group row">
            <div class="col-sm-6 m-auto">
                <div class="align-middle">
                    Permission Slip On File
                </div>
            </div>
            <div class="d-inline col-sm-6">
                <ul class="tg-list">
                    <div class="toggle-side-label">No</div>
                    <li class="tg-list-item">
                        <input class="tgl tgl-flat" id="cb2"
                               name="permissionSlipCheckbox"
                               type="checkbox" disabled <?php echo $permissionChecked; ?> />
                        <label class="tgl-btn" for="cb2"></label>
                    </li>
                    <div class="toggle-side-label">Yes</div>
                </ul>
            </div>
        </div>
        <hr/>

        <div class="form-group row">
            <div class="col-sm-6 m-auto">
                <div class="align-middle">
                    Reduced Lunch Eligible
                </div>
            </div>
            <div class="d-inline col-sm-6">
                <ul class="tg-list">
                    <div class="toggle-side-label">No</div>
                    <li class="tg-list-item">
                        <input class="tgl tgl-flat" id="cb1"
                               name="reducedLunchEligibilityCheckbox"
                               type="checkbox" disabled <?php echo $reducedLunchChecked; ?> />
                        <label class="tgl-btn" for="cb1"></label>
                    </li>
                    <div class="toggle-side-label">Yes</div>
                </ul>
            </div>
        </div>
        <hr/>

        <div class="form-group row">
            <div class="col-sm-6 m-auto">
                <div class="align-middle">
                    Immediate Emotional Problem
                </div>
            </div>
            <div class="d-inline col-sm-6">
                <ul class="tg-list">
                    <div class="toggle-side-label">No</div>
                    <li class="tg-list-item">
                        <input class="tgl tgl-flat" id="cb4"
                               name="iepCheckbox"
                               type="checkbox" disabled <?php echo $iepChecked; ?> />
                        <label class="tgl-btn" for="cb4"></label>
                    </li>
                    <div class="toggle-side-label">Yes</div>
                </ul>
            </div>
        </div>
        <hr/>
    </div>
<?php } ?>


