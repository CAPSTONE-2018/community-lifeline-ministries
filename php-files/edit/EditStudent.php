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
//$studentIdToSearch = $_POST['studentId'];

$studentIdToSearch = $_POST['studentId'];
$queryForStudentInfo = "SELECT * FROM Students WHERE Id = '$studentIdToSearch';";
$studentInfoResults = mysqli_query($db, $queryForStudentInfo);

while ($studentInfoRow = mysqli_fetch_assoc($studentInfoResults)) {
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
    <div id="showEditStudentModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
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
                <div id="editStudentModalBody" class="modal-body">

                    <div id="studentVerifyContent">
                        <div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#studentInfoPanel" role="tab">Student
                                        Info</a>
                                <li>
                            </ul>
                            <div class="tab-content mt-2">
                                <div class="tab-pane fade show active" id="studentInfoPanel" role="tabpanel">
                                    <div id="placeHolderForVerifyEditStudentInfo" class="form-group"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="sendEditStudentForm()">Submit Student</button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-title">
        <div>
            <h3><i class="fa fa-pencil"></i> Edit Student</h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"> Edit Student</li>
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
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="studentInfo">
                        <form id="editStudentForm" name="editStudentForm">
                            <div class="header"><i class="fa fa-graduation-cap"></i> Edit Student Info</div>
                            <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
                            <div class="blue-line-color"></div>
                            <div class="row">
                                <input type="hidden" name="studentId" value="<?php echo $studentId; ?>"/>
                                <div class="col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="firstName" class="mdl-textfield__input"
                                               name="studentFirstName" type="text"
                                               onkeypress="return suppressEnter()"
                                               value="<?php echo $studentFirstName; ?>"
                                               pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                        <label class="mdl-textfield__label" for="firstName">First Name</label>
                                        <span class="mdl-textfield__error">Invalid First Name Data Entered</span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="lastName" class="mdl-textfield__input" name="studentLastName"
                                               type="text" onkeypress="return suppressEnter()"
                                               value="<?php echo $studentLastName; ?>"
                                               pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                        <label class="mdl-textfield__label" for="lastName">Last Name</label>
                                        <span class="mdl-textfield__error">Invalid Last Name Data Entered</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="middleName" class="mdl-textfield__input"
                                               name="studentMiddleName" type="text"
                                               value="<?php echo $studentMiddleName; ?>"
                                               pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                        <label class="mdl-textfield__label" for="middleName">Middle Name</label>
                                        <span class="mdl-textfield__error">Invalid Middle Name Data Entered</span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="suffix" class="mdl-textfield__input" name="studentSuffix"
                                               type="text" onkeypress="return suppressEnter()"
                                               value="<?php echo $studentSuffix; ?>"
                                               pattern="^[A-Z](([ \.]|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                                        <label class="mdl-textfield__label" for="suffix">Suffix</label>
                                        <span class="mdl-textfield__error">Invalid Suffix Data Entered</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="dob" class="mdl-textfield__input" name="dob" type="text"
                                               onkeypress="return suppressEnter()"
                                               value="<?php echo $studentDob; ?>"
                                               pattern="^((0[1-9])|(1[0-2]))\/((0[1-9])|([1-2][0-9])|(3[0-1]))\/[1-9][0-9]{3}$"/>
                                        <label class="mdl-textfield__label" for="dob">D.O.B.</label>
                                        <span class="mdl-textfield__error">Invalid D.O.B. Data Entered</span>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-4">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="ethnicity" class="mdl-textfield__input" name="ethnicity"
                                               type="text" onkeypress="return suppressEnter()"
                                               value="<?php echo $studentEthnicity; ?>"
                                               pattern="^[A-Z](([ \-|(\, )])?[a-zA-Z]+)*$"/>
                                        <label class="mdl-textfield__label" for="ethnicity">Ethnicity</label>
                                        <span class="mdl-textfield__error">Invalid Ethnicity Data Entered</span>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-4">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                        <input type="text" class="mdl-textfield__input" id="gender"
                                               value="<?php echo $selectedStudentGender; ?>"
                                               readonly>
                                        <input type="hidden" value="<?php echo $studentGender; ?>" name="gender">
                                        <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                                        <label for="gender" class="mdl-textfield__label">Gender</label>
                                        <ul for="gender" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="M">Male</li>
                                            <li class="mdl-menu__item" data-val="F">Female</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <h4 class="heading"><i class="fa fa-home"></i> Address</h4>
                            <div class="blue-line-color"></div>
                            <div class="row">
                                <div class="col-8 col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="studentAddressOne" class="mdl-textfield__input"
                                               name="studentAddressOne" type="text"
                                               onkeypress="return suppressEnter()"
                                               value="<?php echo $studentAddressOne; ?>"
                                               pattern="^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z0-9]+)*\.?$"/>
                                        <label class="mdl-textfield__label"
                                               for="studentAddressOne">Address</label>
                                        <span class="mdl-textfield__error">Invalid Address Data Entered</span>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="studentAddressTwo" class="mdl-textfield__input"
                                               name="studentAddressTwo" type="text"
                                               value="<?php echo $studentAddressTwo; ?>"
                                               onkeypress="return suppressEnter()"
                                               pattern="^[a-zA-Z0-9]+(([\- \.]|(\. ))[a-zA-Z0-9]+)*$"/>
                                        <label class="mdl-textfield__label"
                                               for="studentAddressTwo">Apt/Suite</label>
                                        <span class="mdl-textfield__error">Invalid Apt/Suite Data Entered</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="studentCity" class="mdl-textfield__input" name="studentCity"
                                               type="text" onkeypress="return suppressEnter()"
                                               value="<?php echo $studentCity; ?>"
                                               pattern="^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                                        <label class="mdl-textfield__label" for="studentCity">City</label>
                                        <span class="mdl-textfield__error">Invalid City Data Entered</span>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                        <input type="text" class="mdl-textfield__input"
                                               value="<?php echo $selectedStudentState; ?>"
                                               id="studentState" readonly>
                                        <input type="hidden" value="<?php echo $studentState; ?>" name="studentState">
                                        <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                        <label for="studentState" class="mdl-textfield__label">State</label>
                                        <ul id="studentState"
                                            class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <?php echo stateDropdown(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="studentZip" class="mdl-textfield__input" name="studentZip"
                                               type="text" onkeypress="return suppressEnter()"
                                               value="<?php echo $studentZip; ?>"
                                               pattern="^[0-9]{5}(-[0-9]{4})?$"/>
                                        <label class="mdl-textfield__label" for="studentZip">Zip Code</label>
                                        <span class="mdl-textfield__error">Invalid Zip Code Data Entered</span>
                                    </div>
                                </div>
                            </div>

                            <h4 class="heading"><i class="fa fa-file"></i> Documents</h4>
                            <div class="blue-line-color"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="studentSchool" class="mdl-textfield__input"
                                               name="studentSchool" type="text"
                                               value="<?php echo $studentSchool; ?>"
                                               onkeypress="return suppressEnter()"/>
                                        <label class="mdl-textfield__label" for="studentSchool">School Currently
                                            Attending</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="toggle-title">Permission Slip On File</div>
                                    <ul class="tg-list">
                                        <div class="toggle-side-label">No</div>
                                        <li class="tg-list-item">
                                            <input class="tgl tgl-flat" id="cb2" name="permissionSlipCheckbox"
                                                <?php echo $permissionChecked; ?>
                                                   type="checkbox"/>
                                            <label class="tgl-btn" for="cb2"></label>
                                        </li>
                                        <div class="toggle-side-label">Yes</div>
                                    </ul>
                                </div>

                                <div class="col-sm-3">
                                    <div class="toggle-title">Birth Certificate on
                                        File
                                    </div>
                                    <ul class="tg-list">
                                        <div class="toggle-side-label">No</div>
                                        <li class="tg-list-item">
                                            <input class="tgl tgl-flat" id="cb3"
                                                   name="birthCertificateCheckbox"
                                                <?php echo $birthCertificateChecked; ?>
                                                   type="checkbox"/>
                                            <label class="tgl-btn" for="cb3"></label>
                                        </li>
                                        <div class="toggle-side-label">Yes</div>
                                    </ul>
                                </div>

                                <div class="col-sm-3">
                                    <div class="toggle-title">Reduced Lunch Eligible</div>
                                    <ul class="tg-list">
                                        <div class="toggle-side-label">No</div>
                                        <li class="tg-list-item">
                                            <input class="tgl tgl-flat" id="cb1"
                                                   name="reducedLunchEligibilityCheckbox"
                                                   type="checkbox" <?php echo $reducedLunchChecked; ?>
                                            />
                                            <label class="tgl-btn" for="cb1"></label>
                                        </li>
                                        <div class="toggle-side-label">Yes</div>
                                    </ul>
                                </div>

                                <div class="col-sm-3">
                                    <div class="toggle-title">Emotional Problem</div>
                                    <ul class="tg-list">
                                        <div class="toggle-side-label">No</div>
                                        <li class="tg-list-item">
                                            <input class="tgl tgl-flat" id="cb4" name="iepCheckbox"
                                                <?php echo $iepChecked; ?> type="checkbox"/>
                                            <label class="tgl-btn" for="cb4"></label>
                                        </li>
                                        <div class="toggle-side-label">Yes</div>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="newStudentConfirmationButton" type="button" class="btn btn-primary btn-block btn-lg"
                        onclick="launchVerifyEditStudentInfoWizard()">
                    Verify Info
                </button>
            </div>
        </div>
    </div>

<?php } ?>

<script type="text/javascript">
    function sendEditStudentForm() {
        var editStudentForm = $('#editStudentForm').serialize();
        $('#showEditStudentModal').modal('hide');
        $.ajax({
            url: "/community-lifeline-ministries/php-files/mysql-statements/update/UpdateStudent.php",
            method: "POST",
            data: editStudentForm,
            success: function (response) {

                var parsedOutput = JSON.parse(response);
                var newStudentConfirmation = parsedOutput['student-confirmation'];
                var modalMessage = "The Student Was Updated Successfully";
                var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/show/ShowStudents.php";

                if (response === 'fill-required-inputs') {
                    launchGenericRequiredInputsModal();
                }

                if (newStudentConfirmation === true) {
                    launchGenericSuccessfulEntryModal(modalMessage, afterModalDisplaysRoute)
                }
            }
        });
    }
</script>

<script type="text/javascript">
    function launchVerifyEditStudentInfoWizard() {
        var serializedStudentInfoForm = $('#editStudentForm').serialize();

        launchConfirmEditStudentEntriesModal(serializedStudentInfoForm);
        $('#modal').modal({
            backdrop: 'static'
        });
    }
</script>
<?php include("../app-shell/Footer.php"); ?>
