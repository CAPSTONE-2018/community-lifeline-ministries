<?php
include("../../../db/config.php");
include("../../scripts/States.php");
$studentId = $_POST['studentId'];

$queryForStudentInfo = "SELECT * FROM Students WHERE Id = '$studentId';";
$studentInfoResults = mysqli_query($db, $queryForStudentInfo);
$dynamicRowId = 0;
while ($studentInfoRow = mysqli_fetch_assoc($studentInfoResults)) {
    $dynamicRowId++;

    $studentId = $studentInfoRow['Id'];
    $studentFirstName = $studentInfoRow['First_Name'];
    $studentLastName = $studentInfoRow['Last_Name'];
    $studentMiddleName = $studentInfoRow['Middle_Name'];
    $studentSuffix = $studentInfoRow['Suffix'];
    $studentDob = $studentInfoRow['Birth_Date'];
    $studentGender = $studentInfoRow['Gender'];
    $studentAddressOne = $studentInfoRow['Address_One'];
    $studentAddressTwo = $studentInfoRow['Address_Two'];
    $studentCity = $studentInfoRow['City'];
    $studentState = $studentInfoRow['State'];
    $studentZip = $studentInfoRow['Zip'];
    $studentEthnicity = $studentInfoRow['Ethnicity'];
    $studentSchool = $studentInfoRow['School'];
    $studentPermissionSlip = $studentInfoRow['Permission_Slip'];
    $studentBirthCertificate = $studentInfoRow['Birth_Certificate'];
    $studentReducedLunch = $studentInfoRow['Reduced_Lunch_Eligible'];
    $studentIep = $studentInfoRow['IEP'];

    if ($studentPermissionSlip == 0) {
        $permissionChecked = "";
    } else {
        $permissionChecked = "checked";
    }

    if ($studentReducedLunch == 0) {
        $reducedLunchChecked = "";
    } else {
        $reducedLunchChecked = "checked";
    }

    if ($studentBirthCertificate == 0) {
        $birthCertificateChecked = "";
    } else {
        $birthCertificateChecked = "checked";
    }

    if ($studentIep == 0) {
        $iepChecked = "";
    } else {
        $iepChecked = "checked";
    }

    if ($studentGender == "F") {
        $selectedStudentGender = "Female";
    } else {
        $selectedStudentGender = "Male";
    }

    $selectedStudentState = stateSelect($studentState);
    ?>
    <div>
        <form action="../../edit/EditStudent.php" method="POST" name="editStudentForm" id="editStudentForm">
            <div class="card">
                <div class="card-body">
                    <div class="form-content">
                        <div class="tab-content">
                            <div class="tab-pane active " id="studentInfo">
                                <h4 class="heading "><i class="fa fa-user"></i> Personal Info
                                </h4>
                                <div class="edit-blue-line-color"></div>
                                <div class="row">
                                    <input type="hidden" name="studentId" value="<?php echo $studentId; ?>"/>
                                    <div class="col-sm-6">
                                        <div id="floatingStudentFirstName"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentFirstName" class="mdl-textfield__input"
                                                   name="studentFirstName" type="text" readonly
                                                   value="<?php echo $studentFirstName; ?>"/>
                                            <label class="mdl-textfield__label" for="studentFirstName">First Name</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div id="floatingStudentLastName"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentLastName" class="mdl-textfield__input"
                                                   name="studentLastName" type="text" readonly
                                                   value="<?php echo $studentLastName; ?>"/>
                                            <label class="mdl-textfield__label" for="studentLastName">Last Name</label>
                                            <span class="mdl-textfield__error">Last Name is Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg">
                                        <div id="floatingStudentMiddleName"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentMiddleName" class="mdl-textfield__input" readonly
                                                   name="studentMiddleName" type="text"
                                                   value="<?php echo $studentMiddleName; ?>"/>
                                            <label class="mdl-textfield__label" for="studentMiddleName">Middle Name</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div id="floatingStudentSuffix"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentSuffix" class="mdl-textfield__input" readonly
                                                   name="studentSuffix" type="text"
                                                   value="<?php echo $studentSuffix; ?>"/>
                                            <label class="mdl-textfield__label" for="studentSuffix">Suffix</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div id="floatingDob"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="dob" class="mdl-textfield__input" readonly
                                                   name="dob" type="text" value="<?php echo $studentDob; ?>"/>
                                            <label class="mdl-textfield__label" for="dob">D.O.B.</label>
                                            <span class="mdl-textfield__error">Input is not a date!</span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div id="floatingEthnicity"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="ethnicity" class="mdl-textfield__input" readonly
                                                   name="ethnicity" type="text"
                                                   value="<?php echo $studentEthnicity; ?>"/>
                                            <label class="mdl-textfield__label"
                                                   for="ethnicity">Ethnicity</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div id="floatingGender"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                            <input type="text" value="<?php echo $selectedStudentGender; ?>"
                                                   class="mdl-textfield__input" id="gender"
                                                   readonly>
                                            <input type="hidden" value="<?php echo $studentGender; ?>" name="gender">
                                            <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                            <label for="gender" class="mdl-textfield__label">Gender</label>
                                            <ul for="gender" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <li class="mdl-menu__item" data-val="M">Male</li>
                                                <li class="mdl-menu__item" data-val="F">Female</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="heading"><i class="fa fa-home"></i> Address</h4>
                                <div class="edit-blue-line-color"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="floatingStudentAddressOne"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentAddressOne" class="mdl-textfield__input"
                                                   name="studentAddressOne" type="text"
                                                   value="<?php echo $studentAddressOne; ?>"/>
                                            <label class="mdl-textfield__label"
                                                   for="studentAddressOne">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="floatingStudentAddressTwo"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentAddressTwo" class="mdl-textfield__input"
                                                   name="studentAddressTwo" type="text"
                                                   value="<?php echo $studentAddressTwo; ?>"/>
                                            <label class="mdl-textfield__label"
                                                   for="studentAddressTwo">Apt/Suite</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">

                                        <div id="floatingStudentCity"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentCity" class="mdl-textfield__input"
                                                   name="studentCity" type="text" value="<?php echo $studentCity; ?>"/>
                                            <label class="mdl-textfield__label"
                                                   for="studentCity">City</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div id="floatingStudentState"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                            <input type="text" value="<?php echo $selectedStudentState; ?>"
                                                   class="mdl-textfield__input" id="studentState"
                                                   readonly>
                                            <input type="hidden" value="<?php echo $studentState; ?>"
                                                   name="studentState">
                                            <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                            <label for="studentState"
                                                   class="mdl-textfield__label">State</label>
                                            <ul id="studentState"
                                                class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <?php echo stateDropdown(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div id="floatingStudentZip"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentZip" class="mdl-textfield__input"
                                                   name="studentZip" type="text" value="<?php echo $studentZip; ?>"/>
                                            <label class="mdl-textfield__label" for="studentZip">Zip Code</label>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="heading"><i class="fa fa-file"></i> Documents</h4>
                                <div class="edit-blue-line-color"></div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div id="floatingStudentSchool"
                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input id="studentSchool" class="mdl-textfield__input"
                                                   name="studentSchool" type="text"
                                                   value="<?php echo $studentSchool; ?>"/>
                                            <label class="mdl-textfield__label" for="studentSchool">School Currently
                                                Attending</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="toggle-title">Reduced Lunch Eligible</div>
                                        <ul class="tg-list">
                                            <div class="toggle-side-label">No</div>
                                            <li class="tg-list-item">
                                                <input class="tgl tgl-flat" id="cb1"
                                                       name="reducedLunchEligibilityCheckbox"
                                                       type="checkbox" <?php echo $reducedLunchChecked; ?>/>
                                                <label class="tgl-btn" for="cb1"></label>
                                            </li>
                                            <div class="toggle-side-label">Yes</div>
                                        </ul>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="toggle-title">Permission Slip On File</div>
                                        <ul class="tg-list">
                                            <div class="toggle-side-label">No</div>
                                            <li class="tg-list-item">
                                                <input class="tgl tgl-flat" id="cb2"
                                                       name="permissionSlipCheckbox"
                                                       type="checkbox" <?php echo $permissionChecked; ?>/>
                                                <label class="tgl-btn" for="cb2"></label>
                                            </li>
                                            <div class="toggle-side-label">Yes</div>
                                        </ul>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="toggle-title">Birth Certificate on File</div>
                                        <ul class="tg-list">
                                            <div class="toggle-side-label">No</div>
                                            <li class="tg-list-item">
                                                <input class="tgl tgl-flat" id="cb3"
                                                       name="birthCertificateCheckbox"
                                                       type="checkbox" <?php echo $birthCertificateChecked; ?>/>
                                                <label class="tgl-btn" for="cb3"></label>
                                            </li>
                                            <div class="toggle-side-label">Yes</div>
                                        </ul>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="toggle-title">Emotional Problem</div>
                                        <ul class="tg-list">
                                            <div class="toggle-side-label">No</div>
                                            <li class="tg-list-item">
                                                <input class="tgl tgl-flat" id="cb4"
                                                       name="iepCheckbox"
                                                       type="checkbox" <?php echo $iepChecked; ?>/>
                                                <label class="tgl-btn" for="cb4"></label>
                                            </li>
                                            <div class="toggle-side-label">Yes</div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="button" onclick="sendEditStudentForm()" value="Submit" class="btn btn-primary btn-lg btn-block"/>
                </div>
            </div>
        </form>
    </div>

<?php } ?>

<script type="text/javascript">
    function sendEditStudentForm() {
        var serializedForm = $('#editStudentForm').serialize();
        launchEditStudentConfirmationModal(serializedForm);
    }
</script>
