<link rel="stylesheet" href="../../css/toggle-switch.css"/>
<link rel="stylesheet" href="../../css/edit-student-modal.css"/>
<?php
include("../../db/config.php");

$studentId = $_POST['studentId'];

$queryForStudentInfo = "SELECT * FROM Students WHERE Id = '$studentId';";
$studentInfoResults = mysqli_query($db, $queryForStudentInfo);

$response = '';

while ($studentInfoRow = mysqli_fetch_assoc($studentInfoResults)) {
    $dynamicRowId++;

    $studentFirstName = $studentInfoRow['First_Name'];

    $response = '   
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="form-content">
                <div class="tab-content">
                    <div class="tab-pane active " id="studentInfo">
                        <h4 class="heading"><i class="glyphicon glyphicon-user"></i> Personal Info
                        </h4>
                        <div class="blue-line-color"></div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div id="floatingStudentFirstName" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="firstName" class="mdl-textfield__input"
                                            onblur="addStudentFirstNameFocus()" onfocus="removeStudentFirstNameFocus()"
                                           name="studentFirstName" type="text" value="' . $studentFirstName . '"/>
                                    <label class="mdl-textfield__label" for="firstName">First Name</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="lastName" class="mdl-textfield__input"
                                           name="studentLastName"
                                           type="text"/>
                                    <label class="mdl-textfield__label" for="lastName">Last
                                        Name</label>
                                    <span class="mdl-textfield__error">Last Name is Required</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-lg">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="middleName" class="mdl-textfield__input"
                                           name="studentMiddleName" type="text"/>
                                    <label class="mdl-textfield__label" for="middleName">Middle
                                        Name</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="suffix" class="mdl-textfield__input"
                                           name="studentSuffix"
                                           type="text"/>
                                    <label class="mdl-textfield__label" for="suffix">Suffix</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-4">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="dob" class="mdl-textfield__input" name="dob"
                                           type="text"/>
                                    <label class="mdl-textfield__label" for="dob">D.O.B.</label>
                                    <span class="mdl-textfield__error">Input is not a date!</span>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="ethnicity" class="mdl-textfield__input"
                                           name="ethnicity"
                                           type="text"/>
                                    <label class="mdl-textfield__label"
                                           for="ethnicity">Ethnicity</label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input type="text" value="" class="mdl-textfield__input"
                                           id="gender" readonly>
                                    <input type="hidden" value="" name="gender">
                                    <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                    <label for="gender" class="mdl-textfield__label">Gender</label>
                                    <ul for="gender"
                                        class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li class="mdl-menu__item" data-val="M">Male</li>
                                        <li class="mdl-menu__item" data-val="F">Female</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <h4 class="heading"><i class="glyphicon glyphicon-home"></i> Address</h4>
                        <div class="blue-line-color"></div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="studentAddressOne" class="mdl-textfield__input"
                                           name="studentAddressOne" type="text"/>
                                    <label class="mdl-textfield__label"
                                           for="studentAddressOne">Address</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="studentAddressTwo" class="mdl-textfield__input"
                                           name="studentAddressTwo" type="text"/>
                                    <label class="mdl-textfield__label"
                                           for="studentAddressTwo">Apt/Suite</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="studentCity" class="mdl-textfield__input"
                                           name="studentCity"
                                           type="text"/>
                                    <label class="mdl-textfield__label"
                                           for="studentCity">City</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input type="text" value="" class="mdl-textfield__input"
                                           id="studentState" readonly>
                                    <input type="hidden" value="" name="studentState">
                                    <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                    <label for="studentState"
                                           class="mdl-textfield__label">State</label>
                                    <ul id="studentState"
                                        class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <?php include("../scripts/States.php");
                                        echo stateDropdown("studentState")
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="studentZip" class="mdl-textfield__input"
                                           name="studentZip"
                                           type="text"/>
                                    <label class="mdl-textfield__label" for="studentZip">Zip
                                        Code</label>
                                </div>
                            </div>
                        </div>

                        <h4 class="heading"><i class="glyphicon glyphicon-file"></i> Documents</h4>
                        <div class="blue-line-color"></div>
                        <div class="form-group">
                            <div class="col-sm-10">

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="studentSchool" class="mdl-textfield__input"
                                           name="studentSchool" type="text"/>
                                    <label class="mdl-textfield__label" for="studentSchool">School
                                        Currently
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
                                               type="checkbox"
                                        />
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
                                               type="checkbox"/>
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
                                        <input class="tgl tgl-flat" id="cb4" name="iepCheckbox"
                                               type="checkbox"/>
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
    </div>
</div>';}
echo $response;
?>